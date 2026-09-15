<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Peoples Personal Accident Insurance</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        @media print {
            #printPageButton {
                display: none;
            }
        }
    </style>
</head>

<body>
    <a href="{{ route('ps.productAndService') }}" class="btn btn-info">Go to premium calculator</a>
    <button id="printPageButton"
        style="background: #0a53be;
    float: right;
    padding: 8px 25px;
    color: #ffffff;
    border: none;
    border-radius: 3px;
    margin-top: 15px;"
        onClick="window.print();">Print</button>
    <div class="invoice_area" id="invoice_area" style="width: 100%;">
        <div class="invioce_header" style="padding-left: 10%; padding-right: 10%; text-align:center;">
            <div class="header_logo" style="display: inline-block">
                <img src="{{ asset('images/website/invoice_logo.png') }}" alt="">
            </div>
            <div class="header_info"
                style="display: inline-block; margin-left: 30px; text-align:center; padding-top: 30px; padding-bottom: 30px;">
                <h3 style="color: #000000; font-weight: 700; font-size: 24px; margin: 0px;">CoverSure Insurance Company
                    Limited</h3>
                <p style="color: rgba(0, 0, 0, 0.8); font-size: 18px; font-weight: 500; margin: 0px;">Head Office: 13
                    Demo Business District, Dhaka, Bangladesh</p>
            </div>
            <h2 style="margin: 0px;">PREMIUM BILL Peoples Personal Accident Insurance
            </h2>
            <span style="width: 200px; border: 1px solid #000000; display: inline-block;"></span>
        </div>
        <div class="top_user_info"
            style=" display:flex; justify-content:safe; padding-left: 5%; padding-right: 5%; margin-top: 50px;">
            <div class="user_left_info" style="width: 68%;">
                <p
                    style="margin: 0px; margin-bottom: 10px; display: inline-block; color: rgba(0, 0, 0, 0.8); font-size: 20px;">
                    Bill No :
                </p>
                <p
                    style="margin: 0px; display: inline-block; color: rgba(0, 0, 0, 0.8); font-size: 20px; font-weight: bold;">
                    {{ $order_details->transaction_id }}
                </p> <br>
                <span style="color: rgba(0, 0, 0, 0.8); font-size: 20px;">Name & Address : </span>
                <p style="margin: 0px; display: inline-block; color: rgba(0, 0, 0, 0.8); font-size: 20px;">
                    {{ $order_details->insured_full_name }} {{ $order_details->insured_permanent_address }}</p>
            </div>
            {{--            <div class="user_right_info" style="width: 30%;"> --}}
            {{--                <p style="margin: 0px; margin-bottom: 10px; display: inline-block; color: rgba(0, 0, 0, 0.8); font-size: 20px;">Branch Name: --}}
            {{--                </p> --}}
            {{--                <p style="margin: 0px; display: inline-block; color: rgba(0, 0, 0, 0.8); font-size: 20px;">Principal Office</p> --}}
            {{--            </div> --}}
        </div>
        <div class="table_area" style="padding-left: 5%; padding-right: 5%; margin-top: 30px;">
            <table class="table table-bordered" style="width: 100%; border: 1px solid rgba(0, 0, 0, 0.3);">
                <tr style="text-align: center; border: 1px solid rgba(0, 0, 0, 0.3);">
                    <th style="width: 20%;; font-size: 22px;">Date</th>
                    <th style="width: 50%; font-size: 22px;">Description</th>
                    <th style="width: 30%; font-size: 22px;">Amount</th>
                </tr>
                <tr>
                    <td style="text-align: center; color: rgba(0, 0, 0, 0.8); font-weight: bold; font-size: 20px;">
                        {{ date('Y-m-d H:i a', strtotime($order_details->created_at)) }}</td>
                    <td>

                        <p style="display: inline-block; margin: 0px; margin-bottom: 10px; font-size: 20px;">
                            {{ $order_details->people_personal_id == 1 ? 'Individual('.$order_details->dob.')' : 'Group('.$order_details->people_number_of_people.')' }}</p> <br>

                        <div class="inside_info_box" style=" padding-left: 100px; display: flow-root;">
                            <div class="inside_left_info" style="float: left; margin-top: 10px; font-size: 18px;">Insured Amount</div>
                            <div class="inside_right_info" style="float: right; margin-top: 10px; font-size: 18px;">Tk.
                                {{ $order_details->insured_amount }}</div>
                        </div>
                        <div class="inside_info_box" style=" padding-left: 100px; display: flow-root;">
                            <div class="inside_left_info" style="float: left; margin-top: 10px; font-size: 18px;">Net
                                Premium</div>
                            <div class="inside_right_info" style="float: right; margin-top: 10px; font-size: 18px;">Tk.
                                {{ $order_details->net_premium }}</div>
                        </div>

                        <div class="inside_info_box" style=" padding-left: 100px; display: flow-root;">
                            <div class="inside_left_info" style="float: left; margin-top: 10px; font-size: 18px;">Vat
                                (15%)</div>
                            <div class="inside_right_info" style="float: right; margin-top: 10px; font-size: 18px;">Tk.
                                {{ $order_details->vat }}</div>
                        </div>

                        <div class="inside_info_box" style=" padding-left: 100px; display: flow-root;">
                            <div class="inside_left_info" style="float: left; margin-top: 10px; font-size: 18px;">Total
                                Premium</div>
                            <div class="inside_right_info" style="float: right; margin-top: 10px; font-size: 18px;">Tk.
                                {{ GET_VAT_AMOUNT($order_details->net_premium, $order_details->vat) + $order_details->net_premium }}
                            </div>
                        </div>
                    </td>
                    <td style="text-align: center; color: rgba(0, 0, 0, 0.8); font-weight: bold; font-size: 20px;">Tk.
                        {{ GET_VAT_AMOUNT($order_details->net_premium, $order_details->vat) + $order_details->net_premium }}
                    </td>
                </tr>
            </table>
            <div class="summation_box"
                style="width: 100%; border: 1px solid rgba(0, 0, 0, 0.3); display: flow-root; margin-top: 5px; padding-bottom: 15px;">
                <div class=""
                    style="float: left; margin-top: 10px; padding-left: 10px; font-size: 20px; color: rgba(0, 0, 0, 0.8);">
                    {{ (GET_VAT_AMOUNT($order_details->net_premium, $order_details->vat) + $order_details->net_premium) }}
                </div>
                <div class=""
                    style="float: right; margin-top: 10px; display:block; padding-right: 10px; font-size: 20px; ">Tk.
                    {{ GET_VAT_AMOUNT($order_details->net_premium, $order_details->vat) + $order_details->net_premium }}
                </div>
            </div>
            <div class="footer" style=" display:flex; justify-content:safe; margin-top: 50px;">
                <div class="footer_left" style="width: 60%;">
                    <p
                        style="margin:0px; margin-bottom: 20px; color: rgba(0, 0, 0, 0.8); display:inline-block; font-size: 20px;">
                        Prepared by</p> <span
                        style="border: 0.5px solid rgba(0, 0, 0, 0.3); width: 150px; display:inline-block; margin-top: 10px;"></span>
                    <br>
                    <p
                        style="margin:0px; margin-bottom: 20px; color: rgba(0, 0, 0, 0.8); display:inline-block; font-size: 20px;">
                        Checked by</p> <span
                        style="border: 0.5px solid rgba(0, 0, 0, 0.3); width: 150px; display:inline-block; margin-top: 10px;"></span>
                    <br>
                    <p
                        style="margin:0px; margin-bottom: 20px; color: rgba(0, 0, 0, 0.8); display:inline-block; font-size: 20px;">
                        Print Date :</p>
                    <p
                        style="margin:0px; margin-bottom: 20px; color: rgba(0, 0, 0, 0.8); display:inline-block; font-size: 20px;">
                        03/04/2023</p> <br>
                </div>
                <div class="footer_right" style="width: 40%; text-align: center;">
                    <p style="margin: 0px; font-size: 22px; margin-bottom: 20px; color: rgba(0, 0, 0, 0.8);">For and on
                        behalf of</p>
                    <h2 style="margin: 0px; font-size: 26px; margin-bottom: 80px; color: #000000;">CoverSure Insurance
                        Company Limited</h2>
                    <p style="margin: 0px; font-size: 24px; margin-bottom: 20px; color: rgba(0, 0, 0, 0.8);">Authorised
                        Officer</p>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>
