<!-- ***** All jQuery Plugins ***** -->

<!-- jQuery(necessary for all JavaScript plugins) -->
<script src="{{ asset('frontend/assets/js/jquery/jquery-3.3.1.min.js') }}"></script>

<!-- Bootstrap js -->
<script src="{{ asset('frontend/assets/js/bootstrap/popper.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/bootstrap/bootstrap.min.js') }}"></script>

<!-- Plugins js -->
<script src="{{ asset('frontend/assets/js/plugins/plugins.min.js') }}"></script>

<!-- Active js -->
<script src="{{ asset('frontend/assets/js/active.js') }}"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
@auth
<script>

    document.addEventListener("DOMContentLoaded", function() {
        var pickupLocationSelect = document.getElementById('pickup_location');
        var customLocationCheckbox = document.getElementById('custom_location_checkbox');

        customLocationCheckbox.addEventListener('change', function() {
            if (this.checked) {
                // If checkbox is checked, enable the dropdown for pickup location
                pickupLocationSelect.disabled = false;
                // Set the dropdown value to the default vehicle location

                // Remove the hidden input field for custom pickup location if it exists
                var customPickupLocationInput = document.getElementById('custom_pickup_location');
                if (customPickupLocationInput) {
                    customPickupLocationInput.parentNode.removeChild(customPickupLocationInput);
                }
            } else {
                @if(!empty($vehicle))

                // If checkbox is unchecked, disable the dropdown for pickup location
                pickupLocationSelect.value = '{{ $vehicle->vehiclelocation->address }}';

                pickupLocationSelect.disabled = true;
                // Create and append a hidden input field for custom pickup location
                var input = document.createElement("input");
                input.setAttribute("type", "hidden");
                input.setAttribute("id", "custom_pickup_location");
                input.setAttribute("name", "pickup_location");
                input.setAttribute("value", '{{ $vehicle->vehiclelocation->address }}');
                var form = document.getElementById('booking-form');
                form.appendChild(input);
                @endif

            }
        });
        @if(!empty($vehicle))
        var rentalPricingModel = '{{ $vehicle->rental_pricing_model }}';
        var amount = 0;

        function calculateAmount() {

            console.log(rentalPricingModel);
                if (rentalPricingModel == 'Per Hour') {
                    // Calculate amount based on hours
                    var startDate = new Date(document.getElementById('start_date').value);
                    var endDate = new Date(document.getElementById('end_date').value);
                    var hoursDifference = Math.abs(endDate - startDate) / 36e5; // Difference in hours
                    amount = hoursDifference * {{ $vehicle->price }}; // Multiply hours with price per hour
                    // console.log('amount dhaval');

                } else if (rentalPricingModel == 'Per Day') {
                    // Calculate amount based on days
                    var startDate = new Date(document.getElementById('start_date').value);
                    var endDate = new Date(document.getElementById('end_date').value);
                    var daysDifference = Math.ceil((endDate - startDate) / (1000 * 60 * 60 * 24)); // Difference in days
                    amount = daysDifference * {{ $vehicle->price }}; // Multiply days with price per day
                } else {
                    // Default calculation for other pricing models
                    amount = {{ $vehicle->price }}; // Default price
                    // if (customLocationCheckbox.checked) {
                    //     amount += 2000; // Add 20 to the amount if checkbox is checked
                    // }
                }
                return amount * 100; // Convert amount to paisa for Razorpay
            }
            // var amount = {{ $vehicle->price * 100 }}; // Initial amount without any modifications

            // Function to handle checkbox change
            function handleCheckboxChange() {
                if (customLocationCheckbox.checked) {
                    amount += 2000; // Add 20 to the amount if checkbox is checked
                } else {
                    amount = amount; // Reset amount if checkbox is unchecked
                }
            }
            document.getElementById('rzp-button').onclick = function(e) {

                var amount = calculateAmount();
                handleCheckboxChange();
                console.log('amount',amount);
                // Validate form fields
                var pickupLocation = document.getElementById('pickup_location');
                var startDate = document.getElementById('start_date');
                var endDate = document.getElementById('end_date');

                var isValid = true;

                if (!pickupLocation.checkValidity()) {
                    document.getElementById('pickup-location-error').classList.remove('d-none');
                    isValid = false;
                } else {
                    document.getElementById('pickup-location-error').classList.add('d-none');
                }

                if (!startDate.checkValidity()) {
                    document.getElementById('start-date-error').classList.remove('d-none');
                    isValid = false;
                } else {
                    document.getElementById('start-date-error').classList.add('d-none');
                }

                if (!endDate.checkValidity()) {
                    document.getElementById('end-date-error').classList.remove('d-none');
                    isValid = false;
                } else {
                    document.getElementById('end-date-error').classList.add('d-none');
                }

                if (!isValid) {
                    e.preventDefault();
                    return;
                }
                var razorpayOptions = {
                key: '{{ env('RAZORPAY_KEY') }}',
                amount: amount, // Payment amount in paisa
                currency: 'INR',
                name: 'Curious Wheels',
                description: 'Payment for {{ $vehicle->make }} {{ $vehicle->model }}', // Modify as needed
                image: '{{ $vehicle->image_url }}', // Your company logo URL
                prefill: {
                    name: '{{ auth()->user()->name }}', // Prefill customer name with logged-in user's name
                    email: '{{ auth()->user()->email }}', // Prefill customer email with logged-in user's email
                    contact: '{{ auth()->user()->phone }}' // Prefill customer phone with logged-in user's phone (if available)
                },
                handler: function(response) {
                    document.getElementById('payment_id').value = response.razorpay_payment_id;
                    // On successful payment, submit the form data to the backend
                    var form = document.getElementById('booking-form');
                    form.submit();
                }
            };
                // Open Razorpay checkout popup
                var rzp = new Razorpay(razorpayOptions);
                rzp.open();
                e.preventDefault();
            };
        @else
            // Handle case when $vehicle is empty
            // You may want to display an error message or take alternative actions
        @endif
    });

    </script>
@else
    <script>
        document.getElementById('rzp-button').onclick = function(e) {
            if (confirm('You must be logged in to proceed with the payment.')) {
                // alert('Thanks for confirming');
                window.location.replace("http://127.0.0.1:8000/login");

            } else {
                // alert('Why did you press cancel? You should have confirmed');
            }
        };
    </script>
@endauth
</body>

</html>
