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
        var checked_value = 0;

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
                checked_value = 1;
            } else {
                checked_value = 0;

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
        var rentalPricingModel = document.querySelector('input[name="rental_pricing_model"]:checked').value;
        var amount = 0;

        function calculateAmount() {
        var rentalPricingModel = document.querySelector('input[name="rental_pricing_model"]:checked').value;

            console.log(rentalPricingModel);
                if (rentalPricingModel == 'Per Hour') {
                    // Calculate amount based on hours
                var startDate = new Date(document.getElementById('start_date').value);
                // console.log(startDate);
                var endDate = new Date(document.getElementById('end_date').value);
                // console.log(endDate);
                var hoursDifference = Math.abs(endDate - startDate) / 36e5;

                console.log(hoursDifference);

                amount = hoursDifference * {{ $vehicle->price }}; // Multiply hours with price per hour
                    // console.log('amount dhaval');

                } else if (rentalPricingModel == 'Per Day') {
                    // Calculate amount based on days
                    var startDate = new Date(document.getElementById('start_date').value);
                    console.log(startDate);

                    var endDate = new Date(document.getElementById('end_date').value);
                    console.log(endDate);

                    var daysDifference = Math.ceil((endDate - startDate) / (1000 * 60 * 60 * 24)); // Difference in days

                    console.log(daysDifference);

                    amount = daysDifference * {{ $vehicle->price_perday }}; // Multiply days with price per day
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
            function handleCheckboxChange(checked_value,amount) {
                if (checked_value) {
                    amount += 2000; // Add 20 to the amount if checkbox is checked
                } else {
                    amount = amount; // Reset amount if checkbox is unchecked
                }
                return amount ; // Convert amount to paisa for Razorpay

            }
            document.getElementById('rzp-button').onclick = function(e) {

                var amount = calculateAmount();
                amount  = handleCheckboxChange(checked_value,amount);

                document.getElementById('total_cost').value = amount;
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
                    console.log(response);
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

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
  // Function to open modal when either input field is clicked
  document.getElementById('start_date').addEventListener('click', openModal);
  document.getElementById('end_date').addEventListener('click', openModal);

  function openModal() {
    $('#exampleModal').modal('show');
  }
  document.addEventListener('DOMContentLoaded', function() {

    @if(isset($formattedBookedDates))
        var bookedDates = @json($formattedBookedDates);
    @else
        var bookedDates = [];
    @endif
    // Rest of your Flatpickr initialization code with `disable` option:

    var fp = flatpickr("#flatpickr-datetime-range", {
        mode: "range",
        enableTime: true,
        inline: true,
        dateFormat: "Y-m-d",
        minDate: new Date().setDate(new Date().getDate() + 1), // Minimum date is tomorrow
        disable: bookedDates, // Use the formatted bookedDates array
        onChange: function(selectedDates, dateStr, instance) {
            // ... your code for handling selected dates
        }
    });

    // Clear input fields when Clear button is clicked
    document.getElementById('clearBtn').addEventListener('click', function() {
      document.getElementById('startDateInput').value = '';
      document.getElementById('endDateInput').value = '';
      fp.clear(); // Clear Flatpickr selection
      $('#exampleModal').modal('hide'); // Hide modal
    });

    // Update input fields when Apply button is clicked
    document.getElementById('applyBtn').addEventListener('click', function() {
      var selectedDates = fp.selectedDates;
      if (selectedDates[1]) { // Check if end date is selected
        document.getElementById('start_date').value = selectedDates[0] ? fp.formatDate(selectedDates[0], 'd M Y H:i') : '';
        document.getElementById('end_date').value = selectedDates[1] ? fp.formatDate(selectedDates[1], 'd M Y H:i') : '';
        $('#exampleModal').modal('hide'); // Hide modal
      } else {
        alert("Please select an end date."); // Display error message
      }
    });
  });
</script>
</body>

</html>
