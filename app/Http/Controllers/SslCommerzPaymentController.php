<?php

namespace App\Http\Controllers;

use App\Library\SslCommerz\SslCommerzNotification;
use App\Models\CalculationPersonalInfoValidation;
use App\Models\Calculator;
use App\Models\CalculatorCountry;
use App\Models\CalculatorCountryVisit;
use App\Models\CalculatorInsuranceSubType;
use App\Models\CalculatorSellDetail;
use App\Models\InvoiceSession;
use App\Models\Order;
use Carbon\Carbon;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SslCommerzPaymentController extends Controller
{

    public function exampleEasyCheckout()
    {
        return view('exampleEasycheckout');
    }

    public function exampleHostedCheckout()
    {
        return view('exampleHosted');
    }

    public function index(Request $request)
    {

        $auth_user = Auth::user();
        $data['invoice_info'] = $invoice_info = InvoiceSession::where('user_id', $auth_user->id)
            ->where('id', $request->invoice_id)
            ->first();

        if (!isset($invoice_info)) {
            session()->flash('message', 'Something went wrong.');
            return redirect()->back();
        }

        $requestData = json_decode($invoice_info->data1);

        // Bangobandhu Suroksha Bima start
        if ($invoice_info->calculator_id == 7) {
            $birthDate = $requestData->dob;

            $tz = new DateTimeZone('Asia/Dhaka');


            $findDate = DateTime::createFromFormat('d/m/Y', $birthDate, $tz);
            if ($findDate) {
                $diff_date = $findDate;
            } else {
                $diff_date = Carbon::now();
            }

            $year = $diff_date
                ->diff(new DateTime('now', $tz))
                ->y;

            if ($year < 18) {
                session()->flash('message', 'Age must be grater than 18 years');
                return 'Age must be grater than 18 years';
                //return to_route('ps.bangabandhu_surokkha_bima');
            }

        }
        // Bangobandhu Suroksha Bima end

        // Personal Accident Insurance start
        if ($invoice_info->calculator_id == 5) {
            $birthDate = $requestData->dob;
            $tz = new DateTimeZone('Asia/Dhaka');

            $findDate = DateTime::createFromFormat('d/m/Y', $birthDate, $tz);
            if ($findDate) {
                $diff_date = $findDate;
            } else {
                $diff_date = Carbon::now();
            }

            $year = $diff_date
                ->diff(new DateTime('now', $tz))
                ->y;

            $pv = CalculationPersonalInfoValidation::find(1);

            if ($year > $pv->age) {
                session()->flash('message', 'Age must be less than ' . $pv->age . ' years');

                $message = 'Age must be less than ' . $pv->age . ' years';
                session()->put('message', $message);
                $data = session('personal');

                return view('frontend.product-and-service.form.personal-accident', $data);
            }
        }
        // Personal Accident Insurance end


        // dd($request->all());

        $post_data = [];
        $post_data['calculator_id'] = $requestData->calculator_id;
        $post_data['total_amount'] = $requestData->total_amount; # You cant not pay less than 10
        $post_data['currency'] = "BDT";

        if (isset($request->tran_id)) {
            $post_data['tran_id'] = $request->tran_id;
        } else {
            $post_data['tran_id'] = uniqid();
        }

        $post_data['product_category'] = $requestData->calculator_id;

        # CUSTOMER INFORMATION
        $post_data['insured_full_name'] = $requestData->insured_full_name;
        $post_data['insured_nid'] = $requestData->insured_nid;
        $post_data['insured_permanent_address'] = $requestData->insured_permanent_address;
        $post_data['insured_permanent_city'] = $requestData->insured_permanent_city;
        $post_data['insured_mailing_address'] = $requestData->insured_mailing_address;
        $post_data['insured_present_address'] = $requestData->insured_present_address;
        $post_data['insured_mailing_city'] = $requestData->insured_mailing_city;
        $post_data['insured_mobile_number'] = $requestData->insured_mobile_number;
        $post_data['insured_email_address'] = $requestData->insured_email_address;
        $post_data['insured_father_name'] = $requestData->insured_father_name ?? '';
        $post_data['insured_mother_name'] = $requestData->insured_mother_name ?? '';
        $post_data['insured_occupation'] = $requestData->insured_occupation ?? '';
        $post_data['insured_passport_number'] = $requestData->insured_passport_number ?? '';
        $post_data['cirtificate_registration'] = $requestData->cirtificate_registration ?? '';

        #individual insurance info
        $post_data['flat_district_id'] = $requestData->flat_district_id ?? '';
        $post_data['flat_location_id'] = $requestData->flat_location_id ?? '';
        $post_data['flat_risk_coverage'] = $requestData->flat_risk_coverage ?? '';
        $post_data['net_premium'] = $requestData->net_premium;
        $post_data['vat'] = $requestData->vat;
        $post_data['insured_amount'] = $requestData->insured_amount ?? '';
        $post_data['dob'] = $requestData->dob ?? '';
        $post_data['people_number_of_people'] = $requestData->people_number_of_people ?? '';
        $post_data['people_personal_id'] = $requestData->people_personal_id ?? '';
        $post_data['personal_medical_benifit'] = $requestData->personal_medical_benifit ?? '';
        $post_data['occupation_id'] = $requestData->occupation_id ?? '';
        $post_data['risk_coverage_id'] = $requestData->risk_coverage_id ?? '';
        $post_data['stamp_charge'] = $requestData->stamp_charge ?? '';
        $post_data['insurance_sub_type_id'] = $requestData->insurance_sub_type_id ?? '';
        $post_data['user_visit_country'] = $requestData->user_visit_country ?? '';
        $post_data['user_date_of_departure'] = $requestData->user_date_of_departure ?? '';
        $post_data['user_return_date'] = $requestData->user_return_date ?? '';

        # NOMINEE INFORMATION
        $post_data['nominee_full_name'] = $requestData->nominee_full_name ?? '';
        $post_data['nominee_relationship'] = $requestData->nominee_relationship ?? '';
        $post_data['nominee_address'] = $requestData->nominee_address ?? '';
        $post_data['nominee_mobile_number'] = $requestData->nominee_mobile_number ?? '';
        $post_data['nominee_nid_or_birth_certificate'] = $requestData->nominee_nid_or_birth_certificate ?? '';

        #POLICY DATE
        $post_data['policy_start_date'] = $requestData->policy_start_date ?? '';
        $post_data['policy_end_date'] = date('Y-m-d', strtotime($requestData->policy_start_date ?? 1 . ' + 1 year'));

        #Vehicle Information
        $post_data['motor_vehicle_brand_make'] = $requestData->motor_vehicle_brand_make ?? '';
        $post_data['motor_year_of_manufacture'] = $requestData->motor_year_of_manufacture ?? '';
        $post_data['motor_metro'] = $requestData->motor_metro ?? '';
        $post_data['motor_mark'] = $requestData->motor_mark ?? '';
        $post_data['motor_reg_number'] = $requestData->motor_reg_number ?? '';
        $post_data['motor_registration_date'] = $requestData->motor_registration_date ?? '';
        $post_data['motor_engin_number'] = $requestData->motor_engin_number ?? '';
        $post_data['motor_chasis_number'] = $requestData->motor_chasis_number ?? '';
        $post_data['teriff_code'] = $requestData->teriff_code ?? '';

        if (isset($requestData->cirtificate_registration)) {
            $cc_order = Order::where('code', $requestData->cirtificate_registration)->first();
        }

        $post_data['insured_nid_file'] = $requestData->insured_nid_file ?? '';
        $post_data['nominee_nid'] = $requestData->nominee_nid ?? '';

        #Before  going to initiate the payment order status need to insert or update as Pending.
        $post_data['cus_name'] = 'Customer Name';
        $post_data['cus_email'] = 'customer@mail.com';
        $post_data['cus_add1'] = 'Customer Address';
        $post_data['cus_add2'] = "";
        $post_data['cus_city'] = "";
        $post_data['cus_state'] = "";
        $post_data['cus_postcode'] = "";
        $post_data['cus_country'] = "Bangladesh";
        $post_data['cus_phone'] = '8801XXXXXXXXX';
        $post_data['cus_fax'] = "";

        $post_data['shipping_method'] = "NO";
        $post_data['product_name'] = "Computer";
        $post_data['product_category'] = "Goods";
        $post_data['product_profile'] = "physical-goods";

        $update_product = DB::table('orders')
            ->where('transaction_id', $post_data['tran_id'])->first();

        if (isset($update_product)) {
            $update_product = DB::table('orders')
                ->where('transaction_id', $post_data['tran_id'])
                ->update([
                    'user_id' => Auth::id(),
                    'invoice_sessions' => $invoice_info->id,
                    'calculator_id' => $post_data['calculator_id'],
                    'amount' => $post_data['total_amount'],
                    'currency' => $post_data['currency'],
                    'transaction_id' => $post_data['tran_id'],
                    'insured_full_name' => $post_data['insured_full_name'],
                    'insured_nid' => $post_data['insured_nid'],
                    'insured_permanent_address' => $post_data['insured_permanent_address'],
                    'insured_permanent_city' => $post_data['insured_permanent_city'],
                    'insured_mailing_address' => $post_data['insured_mailing_address'],
                    'insured_present_address' => $post_data['insured_present_address'],
                    'insured_mailing_city' => $post_data['insured_mailing_city'],
                    'insured_mobile_number' => $post_data['insured_mobile_number'],
                    'insured_email_address' => $post_data['insured_email_address'],
                    'insured_father_name' => $post_data['insured_father_name'],
                    'insured_mother_name' => $post_data['insured_mother_name'],
                    'insured_occupation' => $post_data['insured_occupation'],
                    'insured_passport_number' => $post_data['insured_passport_number'],
                    'nominee_full_name' => $post_data['nominee_full_name'],
                    'nominee_relationship' => $post_data['nominee_relationship'],
                    'nominee_address' => $post_data['nominee_address'],
                    'nominee_mobile_number' => $post_data['nominee_mobile_number'],
                    'nominee_nid_or_birth_certificate' => $post_data['nominee_nid_or_birth_certificate'],
                    'policy_start_date' => $post_data['policy_start_date'],
                    'policy_end_date' => $post_data['policy_end_date'],
                    'nominee_nid' => $post_data['nominee_nid'],
                    'insured_nid_file' => $post_data['insured_nid_file'],
                    'cirtificate_registration' => $post_data['cirtificate_registration'],
                    'status' => 'Pending',
                    'created_at' => now(),
                    'net_premium' => $post_data['net_premium'],
                    'vat' => $post_data['vat'],
                    'flat_district_id' => $post_data['flat_district_id'],
                    'flat_location_id' => $post_data['flat_location_id'],
                    'flat_risk_coverage' => $post_data['flat_risk_coverage'],
                    'dob' => $post_data['dob'],
                    'insured_amount' => $post_data['insured_amount'],
                    'people_number_of_people' => $post_data['people_number_of_people'],
                    'people_personal_id' => $post_data['people_personal_id'],
                    'occupation_id' => $post_data['occupation_id'],
                    'risk_coverage_id' => $post_data['risk_coverage_id'],
                    'personal_medical_benifit' => $post_data['personal_medical_benifit'],
                    'stamp_charge' => $post_data['stamp_charge'],
                    'insurance_sub_type_id' => $post_data['insurance_sub_type_id'],
                    'user_visit_country' => $post_data['user_visit_country'],
                    'user_date_of_departure' => $post_data['user_date_of_departure'],
                    'user_return_date' => $post_data['user_return_date'],

                    'motor_vehicle_brand_make' => $post_data['motor_vehicle_brand_make'],
                    'motor_year_of_manufacture' => $post_data['motor_year_of_manufacture'],
                    'motor_metro' => $post_data['motor_metro'],
                    'motor_mark' => $post_data['motor_mark'],
                    'motor_reg_number' => $post_data['motor_reg_number'],
                    'motor_registration_date' => $post_data['motor_registration_date'],
                    'motor_engin_number' => $post_data['motor_engin_number'],
                    'motor_chasis_number' => $post_data['motor_chasis_number'],
                    'teriff_code' => $post_data['teriff_code'],
                ]);
        } else {
            $update_product = DB::table('orders')
                //->where('transaction_id', $post_data['tran_id'])
                ->insert([
                    'user_id' => Auth::id(),
                    'invoice_sessions' => $invoice_info->id,
                    'calculator_id' => $post_data['calculator_id'],
                    'amount' => $post_data['total_amount'],
                    'currency' => $post_data['currency'],
                    'transaction_id' => $post_data['tran_id'],
                    'insured_full_name' => $post_data['insured_full_name'],
                    'insured_nid' => $post_data['insured_nid'],
                    'insured_permanent_address' => $post_data['insured_permanent_address'],
                    'insured_permanent_city' => $post_data['insured_permanent_city'],
                    'insured_mailing_address' => $post_data['insured_mailing_address'],
                    'insured_present_address' => $post_data['insured_present_address'],
                    'insured_mailing_city' => $post_data['insured_mailing_city'],
                    'insured_mobile_number' => $post_data['insured_mobile_number'],
                    'insured_email_address' => $post_data['insured_email_address'],
                    'insured_father_name' => $post_data['insured_father_name'],
                    'insured_mother_name' => $post_data['insured_mother_name'],
                    'insured_occupation' => $post_data['insured_occupation'],
                    'insured_passport_number' => $post_data['insured_passport_number'],
                    'nominee_full_name' => $post_data['nominee_full_name'],
                    'nominee_relationship' => $post_data['nominee_relationship'],
                    'nominee_address' => $post_data['nominee_address'],
                    'nominee_mobile_number' => $post_data['nominee_mobile_number'],
                    'nominee_nid_or_birth_certificate' => $post_data['nominee_nid_or_birth_certificate'],
                    'policy_start_date' => $post_data['policy_start_date'],
                    'policy_end_date' => $post_data['policy_end_date'],
                    'nominee_nid' => $post_data['nominee_nid'],
                    'insured_nid_file' => $post_data['insured_nid_file'],
                    'cirtificate_registration' => $post_data['cirtificate_registration'],
                    'status' => 'Pending',
                    'created_at' => now(),
                    'net_premium' => $post_data['net_premium'],
                    'vat' => $post_data['vat'],
                    'flat_district_id' => $post_data['flat_district_id'],
                    'flat_location_id' => $post_data['flat_location_id'],
                    'flat_risk_coverage' => $post_data['flat_risk_coverage'],
                    'dob' => $post_data['dob'],
                    'insured_amount' => $post_data['insured_amount'],
                    'people_number_of_people' => $post_data['people_number_of_people'],
                    'people_personal_id' => $post_data['people_personal_id'],
                    'occupation_id' => $post_data['occupation_id'],
                    'risk_coverage_id' => $post_data['risk_coverage_id'],
                    'personal_medical_benifit' => $post_data['personal_medical_benifit'],
                    'stamp_charge' => $post_data['stamp_charge'],
                    'insurance_sub_type_id' => $post_data['insurance_sub_type_id'],
                    'user_visit_country' => $post_data['user_visit_country'],
                    'user_date_of_departure' => $post_data['user_date_of_departure'],
                    'user_return_date' => $post_data['user_return_date'],

                    'motor_vehicle_brand_make' => $post_data['motor_vehicle_brand_make'],
                    'motor_year_of_manufacture' => $post_data['motor_year_of_manufacture'],
                    'motor_metro' => $post_data['motor_metro'],
                    'motor_mark' => $post_data['motor_mark'],
                    'motor_reg_number' => $post_data['motor_reg_number'],
                    'motor_registration_date' => $post_data['motor_registration_date'],
                    'motor_engin_number' => $post_data['motor_engin_number'],
                    'motor_chasis_number' => $post_data['motor_chasis_number'],
                    'teriff_code' => $post_data['teriff_code'],
                ]);
        }


        if (config('app.demo_mode')) {
            DB::table('orders')
                ->where('transaction_id', $post_data['tran_id'])
                ->update(['status' => 'Success', 'updated_at' => now()]);

            session()->flash('message', 'DEMO_MODE: Payment bypassed — policy order completed.');

            return redirect()->route('user.dashboard');
        }

        $sslc = new SslCommerzNotification();
        # initiate(Transaction Data , false: Redirect to SSLCOMMERZ gateway/ true: Show all the Payement gateway here )
        $payment_options = $sslc->makePayment($post_data, 'hosted');

        if (!is_array($payment_options)) {
            print_r($payment_options);
            $payment_options = [];
        }

    }

    public function success(Request $request)
    {
        //echo "Transaction is Successful";

        $tran_id = $request->input('tran_id');
        $amount = $request->input('amount');
        $currency = $request->input('currency');

        $sslc = new SslCommerzNotification();

        #Check order status in order tabel against the transaction id or order id.
        $order_details = DB::table('orders')
            ->where('transaction_id', $tran_id)
            ->first();

        if ($order_details->status == 'Pending') {
            $validation = $sslc->orderValidate($request->all(), $tran_id, $amount, $currency);

            if ($validation) {
                /*
                That means IPN did not work or IPN URL was not set in your merchant panel. Here you need to update order status
                in order table as Processing or Complete.
                Here you can also sent sms or email for successfull transaction to customer
                 */
                $update_product = DB::table('orders')
                    ->where('transaction_id', $tran_id)
                    ->update(['status' => 'Processing']);

                InvoiceSession::where('id', $order_details->invoice_sessions)->update(['status' => 'Paid']);

                if ($order_details->calculator_id == 3) {
                    $data = session('invoice_details');
                    CalculatorSellDetail::create([
                        'order_id' => $order_details->id,
                        'details' => $data,
                    ]);

                    return view('frontend.payment.motor', compact('order_details'));
                } else {
                    if ($order_details->calculator_id == 4) {

                        $data = [];

                        $data['calculator'] = Calculator::find($order_details->calculator_id);

                        $data['insurance_sub_type'] = CalculatorInsuranceSubType::find($order_details->insurance_sub_type_id);

                        $visit = explode(',', $order_details->user_visit_country);
                        $data['all_country'] = CalculatorCountry::whereIn('id', explode(',', $order_details->user_visit_country))->get();

                        $data['country'] = CalculatorCountryVisit::whereIn('id', $visit)->get();
                        CalculatorSellDetail::create([
                            'order_id' => $order_details->id,
                            'details' => $data,
                        ]);

                        return view('frontend.payment.mediclaim', compact('order_details'));

                    } else {
                        if ($order_details->calculator_id == 8) {
                            $update = [];
                            $data = session('flat');
                            $update['district'] = $data['district'];
                            $update['location'] = $data['location'];
                            $update['coverage'] = $data['cal'];

                            CalculatorSellDetail::create([
                                'order_id' => $order_details->id,
                                'details' => $update,
                            ]);

                            return view('frontend.payment.flat', compact('order_details'));
                        } else {
                            if ($order_details->calculator_id == 7) {

                                return view('frontend.payment.bongo', compact('order_details'));
                            } else {
                                if ($order_details->calculator_id == 6) {
                                    return view('frontend.payment.people', compact('order_details'));
                                } else {
                                    if ($order_details->calculator_id == 5) {
                                        $data = session('personal');
                                        CalculatorSellDetail::create([
                                            'order_id' => $order_details->id,
                                            'details' => $data,
                                        ]);
                                        session()->forget('mesage');

                                        return view('frontend.payment.personal', compact('order_details'));
                                    }
                                }
                            }
                        }
                    }
                }
            }

        } else {
            if ($order_details->status == 'Processing' || $order_details->status == 'Complete') {
                /*
                That means through IPN Order status already updated. Now you can just show the customer that transaction is completed. No need to udate database.
                 */

                //echo "Transaction is successfully Completed";

                InvoiceSession::where('id', $order_details->invoice_sessions)->update(['status' => 'Paid']);

                if ($order_details->calculator_id == 3) {
                    $data = session('invoice_details');
                    CalculatorSellDetail::create([
                        'order_id' => $order_details->id,
                        'details' => $data,
                    ]);

                    return view('frontend.payment.motor', compact('order_details'));
                } else {
                    if ($order_details->calculator_id == 4) {

                        $data = [];

                        $data['calculator'] = Calculator::find($order_details->calculator_id);

                        $data['insurance_sub_type'] = CalculatorInsuranceSubType::find($order_details->insurance_sub_type_id);

                        $visit = explode(',', $order_details->user_visit_country);
                        $data['all_country'] = CalculatorCountry::whereIn('id', explode(',', $order_details->user_visit_country))->get();

                        $data['country'] = CalculatorCountryVisit::whereIn('id', $visit)->get();
                        CalculatorSellDetail::create([
                            'order_id' => $order_details->id,
                            'details' => $data,
                        ]);
                        // dd($order_details->id, $data);

                        return view('frontend.payment.mediclaim', compact('order_details'));
                    } else {
                        if ($order_details->calculator_id == 8) {
                            $update = [];
                            $data = session('flat');
                            $update['district'] = $data['district'];
                            $update['location'] = $data['location'];
                            $update['coverage'] = $data['cal'];
                            CalculatorSellDetail::create([
                                'order_id' => $order_details->id,
                                'details' => $update,
                            ]);

                            return view('frontend.payment.flat', compact('order_details'));
                        } else {
                            if ($order_details->calculator_id == 7) {

                                return view('frontend.payment.bongo', compact('order_details'));
                            } else {
                                if ($order_details->calculator_id == 6) {
                                    return view('frontend.payment.people', compact('order_details'));
                                } else {
                                    if ($order_details->calculator_id == 5) {
                                        $data = session('personal');

                                        CalculatorSellDetail::create([
                                            'order_id' => $order_details->id,
                                            'details' => $data,
                                        ]);

                                        return view('frontend.payment.personal', compact('order_details'));
                                    }
                                }
                            }
                        }
                    }
                    if ($order_details->status == 'Processing' || $order_details->status == 'Complete') {
                        /*
                        That means through IPN Order status already updated. Now you can just show the customer that transaction is completed. No need to udate database.
                         */

                        //echo "Transaction is successfully Completed";
                        if ($order_details->calculator_id == 3) {
                            $data = session('invoice_details');
                            CalculatorSellDetail::create([
                                'order_id' => $order_details->id,
                                'details' => $data,
                            ]);

                            return view('frontend.payment.motor', compact('order_details'));
                        } else {
                            if ($order_details->calculator_id == 4) {

                                $data = [];

                                $data['calculator'] = Calculator::find($order_details->calculator_id);

                                $data['insurance_sub_type'] = CalculatorInsuranceSubType::find($order_details->insurance_sub_type_id);

                                $visit = explode(',', $order_details->user_visit_country);
                                $data['all_country'] = CalculatorCountry::whereIn('id', explode(',', $order_details->user_visit_country))->get();

                                $data['country'] = CalculatorCountryVisit::whereIn('id', $visit)->get();
                                CalculatorSellDetail::create([
                                    'order_id' => $order_details->id,
                                    'details' => $data,
                                ]);
                                // dd($order_details->id, $data);

                                return view('frontend.payment.mediclaim', compact('order_details'));
                            } else {
                                if ($order_details->calculator_id == 8) {
                                    $update = [];
                                    $data = session('flat');
                                    $update['district'] = $data['district'];
                                    $update['location'] = $data['location'];
                                    $update['coverage'] = $data['cal'];
                                    CalculatorSellDetail::create([
                                        'order_id' => $order_details->id,
                                        'details' => $update,
                                    ]);

                                    return view('frontend.payment.flat', compact('order_details'));
                                } else {
                                    if ($order_details->calculator_id == 7) {

                                        return view('frontend.payment.bongo', compact('order_details'));
                                    } else {
                                        if ($order_details->calculator_id == 6) {
                                            return view('frontend.payment.people', compact('order_details'));
                                        } else {
                                            if ($order_details->calculator_id == 5) {
                                                $data = session('personal');

                                                CalculatorSellDetail::create([
                                                    'order_id' => $order_details->id,
                                                    'details' => $data,
                                                ]);

                                                return view('frontend.payment.personal', compact('order_details'));
                                            }
                                        }
                                    }
                                }
                            }
                        }

                    } else {
                        #That means something wrong happened. You can redirect customer to your product page.
                        echo "Invalid Transaction";
                    }
                }

            } else {
                #That means something wrong happened. You can redirect customer to your product page.
                $button = '<br> Return to  <a href="/user/dashboard">Dashboard</a>';
                echo "Invalid Transaction" . $button;
            }
        }


    }

    public function fail(Request $request)
    {
        $tran_id = $request->input('tran_id');

        $order_details = DB::table('orders')
            ->where('transaction_id', $tran_id)
            ->select('invoice_sessions', 'transaction_id', 'status', 'currency', 'amount')->first();

        if ($order_details->status == 'Pending') {
            $update_product = DB::table('orders')
                ->where('transaction_id', $tran_id)
                ->update(['status' => 'Failed']);
            InvoiceSession::where('id', $order_details->invoice_sessions)->update(['status' => 'Failed']);
            $button = '<br> Return to  <a href="/user/dashboard">Dashboard</a>';
            echo "Transaction is Falied " . $button;
        } else

            if ($order_details->status == 'Processing' || $order_details->status == 'Complete') {
                InvoiceSession::where('id', $order_details->invoice_sessions)->update(['status' => 'Paid']);
                $button = '<br> Return to  <a href="/user/dashboard">Dashboard</a>';
                echo "Transaction is already Successful " . $button;
            } else {
                InvoiceSession::where('id', $order_details->invoice_sessions)->update(['status' => 'Invalid']);
                $button = '<br> Return to  <a href="/user/dashboard">Dashboard</a>';
                echo "Transaction is Invalid " . $button;
            }

    }

    public function cancel(Request $request)
    {
        $tran_id = $request->input('tran_id');

        $order_details = DB::table('orders')
            ->where('transaction_id', $tran_id)
            ->select('invoice_sessions', 'transaction_id', 'status', 'currency', 'amount')->first();

        if ($order_details->status == 'Pending') {
            $update_product = DB::table('orders')
                ->where('transaction_id', $tran_id)
                ->update(['status' => 'Canceled']);

            InvoiceSession::where('id', $order_details->invoice_sessions)->update(['status' => 'Canceled']);

            $button = '<br> Return to  <a href="/user/dashboard">Dashboard</a>';
            echo "Transaction is Cancel " . $button;
        } else

            if ($order_details->status == 'Processing' || $order_details->status == 'Complete') {
                InvoiceSession::where('id', $order_details->invoice_sessions)->update(['status' => 'Paid']);
                $button = '<br> Return to  <a href="/user/dashboard">Dashboard</a>';
                echo "Transaction is already Successful " . $button;
            } else {
                InvoiceSession::where('id', $order_details->invoice_sessions)->update(['status' => 'Failed']);
                $button = '<br> Return to  <a href="/user/dashboard">Dashboard</a>';
                echo "Transaction is Invalid " . $button;
            }

    }

    public function ipn(Request $request)
    {

        if ($request->input('tran_id')) {

            $tran_id = $request->input('tran_id');

            #Check order status in order tabel against the transaction id or order id.
            $order_details = DB::table('orders')
                ->where('transaction_id', $tran_id)
                ->select('transaction_id', 'status', 'currency', 'amount')->first();

            if ($order_details->status == 'Pending') {
                $sslc = new SslCommerzNotification();
                $validation = $sslc->orderValidate($request->all(), $tran_id, $order_details->amount, $order_details->currency);

                if ($validation == TRUE) {
                    /*
                    That means IPN worked. Here you need to update order status
                    in order table as Processing or Complete.
                    Here you can also sent sms or email for successful transaction to customer
                     */
                    $update_product = DB::table('orders')
                        ->where('transaction_id', $tran_id)
                        ->update(['status' => 'Processing']);

                    $button = '<br> Return to  <a href="/user/dashboard">Dashboard</a>';
                    echo "Transaction is successfully Completed " . $button;
                }

            } else

                if ($order_details->status == 'Processing' || $order_details->status == 'Complete') {

                    #That means Order status already updated. No need to udate database.
                    $button = '<br> Return to  <a href="/user/dashboard">Dashboard</a>';
                    echo "Transaction is already successfully Completed " . $button;
                } else {
                    #That means something wrong happened. You can redirect customer to your product page.
                    $button = '<br> Return to  <a href="/user/dashboard">Dashboard</a>';
                    echo "Invalid Transaction " . $button;
                }

        } else {
            $button = '<br> Return to  <a href="/user/dashboard">Dashboard</a>';
            echo "Invalid Data " . $button;
        }

    }

}
