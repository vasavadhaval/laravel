<html lang="en">

<head>
    <meta charset="UTF-8">


    <style>
        .top_rw {
            background-color: #f4f4f4;
        }

        .td_w {}

        button {
            padding: 5px 10px;
            font-size: 14px;
        }

        .invoice-box {
            max-width: 890px;
            margin: auto;
            padding: 10px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, .15);
            font-size: 14px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
            border-bottom: solid 1px #ccc;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: middle;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: left;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
            font-size: 12px;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .rtl table {
            text-align: left;
        }

        .rtl table tr td:nth-child(2) {
            text-align: left;
        }
    </style>

    <script>
        window.console = window.console || function(t) {};
    </script>



</head>

<body translate="no">
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tbody>
                <tr class="top_rw">
                    <td colspan="2">
                        <h2 style="margin-bottom: 4px;">{{ config('app.name') }} Invoice</h2></br>
                    </td>
                    <td style="width:30%; margin-left: 10px;">
                        Booking ID: {{ $booking->id }}<br>
                        Booking Date: {{ date('d F, Y', strtotime($booking->created_at)) }}
                    </td>

                </tr>

                <tr class="top">
                    <td colspan="3">
                        <table>
                            <tbody>
                                <tr>
                                    <td>
                                        <b> Invoice By: Curious Wheels </b> <br>
                                        Street Address: 123 Main Street <br>
                                        City: Surat <br>
                                        State: Gujarat <br>
                                        PIN Code: 395001 <br>
                                        Country: India <br>
                                        GSTIN: 27AALFN0535C1ZK <br>
                                    </td>

                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr class="information">
                    <td colspan="3">
                        <table>
                            <tbody>
                                <tr>
                                    <td colspan="2">
                                        @php
                                            $vehicle = App\Models\Vehicle::find($booking->vehicle_id);

                                            function calculateAmount($start_date, $end_date, $price, $rental_pricing_model) {
                                                $start_date = strtotime($start_date);
                                                $end_date = strtotime($end_date);

                                                $daysDifference = ceil(abs($end_date - $start_date) / 86400); // Difference in days

                                                if ($rental_pricing_model == 'Per Hour') {
                                                    $hoursDifference = ceil(abs($end_date - $start_date) / 3600); // Difference in hours
                                                    $amount = $hoursDifference * $price; // Multiply hours with price per hour
                                                } elseif ($rental_pricing_model == 'Per Day') {
                                                    $amount = $daysDifference * $price; // Multiply days with price per day
                                                }

                                                return $amount;
                                            }
                                            function getIndianCurrency(float $number)
{
    $decimal = round($number - ($no = floor($number)), 2) * 100;
    $hundred = null;
    $digits_length = strlen($no);
    $i = 0;
    $str = array();
    $words = array(0 => '', 1 => 'one', 2 => 'two',
        3 => 'three', 4 => 'four', 5 => 'five', 6 => 'six',
        7 => 'seven', 8 => 'eight', 9 => 'nine',
        10 => 'ten', 11 => 'eleven', 12 => 'twelve',
        13 => 'thirteen', 14 => 'fourteen', 15 => 'fifteen',
        16 => 'sixteen', 17 => 'seventeen', 18 => 'eighteen',
        19 => 'nineteen', 20 => 'twenty', 30 => 'thirty',
        40 => 'forty', 50 => 'fifty', 60 => 'sixty',
        70 => 'seventy', 80 => 'eighty', 90 => 'ninety');
    $digits = array('', 'hundred','thousand','lakh', 'crore');
    while( $i < $digits_length ) {
        $divider = ($i == 2) ? 10 : 100;
        $number = floor($no % $divider);
        $no = floor($no / $divider);
        $i += $divider == 10 ? 1 : 2;
        if ($number) {
            $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
            $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
            $str [] = ($number < 21) ? $words[$number].' '. $digits[$counter]. $plural.' '.$hundred:$words[floor($number / 10) * 10].' '.$words[$number % 10]. ' '.$digits[$counter].$plural.' '.$hundred;
        } else $str[] = null;
    }
    $Rupees = implode('', array_reverse($str));
    $paise = ($decimal > 0) ? "." . ($words[$decimal / 10] . " " . $words[$decimal % 10]) . ' Paise' : '';
    return ($Rupees ? $Rupees . 'Rupees ' : '') . $paise;
}
                                        @endphp
                                        <b> Vehicle Information : {{ $vehicle->make }} {{ $vehicle->model }} </b> <br>
                                        Year: {{ $vehicle->year }} <br>
                                        Type: {{ $vehicle->vehicleType->name }} <br>
                                        Capacity: {{ $vehicle->capacity }} <br>
                                        Description: {{ $vehicle->description }} <br>
                                        Fuel Type: {{ $vehicle->fuel_type }} <br>
                                        Transmission: {{ $vehicle->transmission }}

                                    </td>

                                    <td>
                                        <b> User Information: {{ $booking->user->name }} </b><br>
                                        {{ $booking->user->email }}<br><br>
                                        Pickup Location: {{ $booking->pickup_location }}

                                    </td>

                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <table cellspacing="0px" cellpadding="2px">
                            <tbody>
                                <tr class="heading">
                                    <td style="width:20%;">Title</td>
                                    <td style="width:15%;">Start Date</td>
                                    <td style="width:15%;">End Date</td>
                                    <td style="width:20%;">Payment Status</td>
                                    <td style="width:15%;">Payment ID</td>
                                    <td style="width:20%; text-align:left;">Cost (INR)</td>
                                </tr>
                                @php
                                    $additional_charge = 0.00;
                                    if($booking->is_custom_location == 1) {
                                        $additional_charge = 20.00;
                                    }
                                @endphp

                            <tr class="item">
                                <td>{{ $booking->vehicle->make }} {{ $booking->vehicle->model }}</td>
                                <td>{{ $booking->start_date }}</td>
                                <td>{{ $booking->end_date }}</td>
                                <td>{{ $booking->payment_status }}</td>
                                <td>{{ $booking->payment_id }}</td>
                                <td style="text-align:left;">{{ number_format(calculateAmount($booking->start_date, $booking->end_date, $vehicle->price, $vehicle->rental_pricing_model), 2) }}</td>
                            </tr>
                            <tr class="item">
                                <td colspan="5" style="text-align:left;"><b>Additional Charge</b>
                                    @if($booking->is_custom_location == 1)
                                    Custom Location
                                @else
                                    No additional charge
                                @endif
                            </td>
                                <td style="text-align:left;">
                                    {{ number_format($additional_charge, 2) }}
                                </td>
                            </tr>
                            <tr class="item">
                                <td colspan="5" style="text-align:left;"><b>Grand Total</b></td>
                                <td style="text-align:left;">{{ number_format(calculateAmount($booking->start_date, $booking->end_date, $vehicle->price, $vehicle->rental_pricing_model) + $additional_charge, 2) }}</td>
                            </tr>
                            </tbody>
                        </table>

                    </td>
                </tr>
                <tr class="total">
                    <td colspan="3" align="right"> Total Amount in Words : <b>
                        {{ getIndianCurrency(calculateAmount($booking->start_date, $booking->end_date, $vehicle->price, $vehicle->rental_pricing_model) + $additional_charge) }} Only
                    </b></td>
                </tr>

                <tr>
                    <td colspan="3">
                        <table cellspacing="0px" cellpadding="2px">
                            <tbody>
                                <tr>
                                    <td>
                                        <h4 class="mb-2 text-title font-700 text-border"> Return Policy : </h4>

                                        This is an electronic generated receipt so doesn't require any signature.
                                    </td>

                                </tr>                                <tr>

                                    <td>
                                        <h4 class="mb-2 text-title font-700 text-border"> Terms & Conditions : </h4>


                                        If you want to cancel the booking please inform us before 3 days, otherwise, you will not get any refund. Invoice was created on a computer and is valid without the signature and seal.
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>






</body>

</html>
