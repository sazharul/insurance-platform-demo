<?php

namespace App\Http\Controllers;

use App\Models\CalculationPersonalInfoValidation;
use App\Models\Calculator;
use App\Models\CalculatorInsuredCity;
use App\Models\CalculatorSellDetail;
use App\Models\InvoiceSession;
use App\Models\Order;
use Carbon\Carbon;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ApiOrderController extends Controller
{
    public function get_city_list(Request $request)
    {
        $city_list = CalculatorInsuredCity::get();

        if (isset($city_list)) {
            return response()->json([
                'status' => true,
                'message' => 'Data found',
                'data' => $city_list,
            ]);
        } else {
            return response()->json([
                'status' => true,
                'message' => 'Not found',
                'data' => $city_list,
            ]);
        }

    }

    public function place_order_draft(Request $request)
    {

//        DB::beginTransaction();
//
//        try {

        $auth_user = Auth::user();
        $data['invoice_info'] = $invoice_info = InvoiceSession::where('user_id', $auth_user->id)
            ->where('id', $request->invoice_id)
            ->first();

        $invoice_info->update(['status' => 'Paid']);

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
                return response()->json([
                    'status' => false,
                    'data' => [],
                    'message' => 'Age must be grater than 18 years',
                ], 200);

//                session()->flash('message', 'Age must be grater than 18 years');
//                return 'Age must be grater than 18 years';
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

                return response()->json([
                    'status' => false,
                    'data' => [],
                    'message' => 'Age must be less than ' . $pv->age . ' years',
                ], 200);
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
                    'status' => 'Processing',
                ]);
        }

        return response()->json([
            'status' => true,
            'data' => [],
            'message' => "Payment Created Successfully",
        ], 200);

//            DB::commit();
//
//            return response()->json([
//                'status' => true,
//                'data' => $paymentVoucherCreate,
//                'message' => "Payment Created Successfully",
//            ], 200);
//
//        } catch (\Throwable $th) {
//            DB::rollBack();
//
//            return response()->json([
//                'status' => false,
//                'message' => "Something Is Wrong To Create Payment Successfully",
//            ], 200);
//        }
    }

    public function place_order(Request $request)
    {

        $post_data = [];
        $calculator_info = Calculator::where('id', $request->calculator_id)->first();

        $post_data['calculator_id'] = $request->calculator_id;
        $post_data['total_amount'] = $request->total_amount; # You cant not pay less than 10
        $post_data['currency'] = "BDT";
        $post_data['tran_id'] = uniqid();
        $post_data['product_category'] = $request->calculator_id;

        # CUSTOMER INFORMATION
        $post_data['insured_full_name'] = $request->insured_full_name;
        $post_data['insured_nid'] = $request->insured_nid;
        $post_data['insured_permanent_address'] = $request->insured_permanent_address;
        $post_data['insured_permanent_city'] = $request->insured_permanent_city;
        $post_data['nominee_nid_or_birth_certificate'] = $request->nominee_nid_or_birth_certificate;
        $post_data['insured_present_address'] = $request->insured_present_address;
        $post_data['insured_mailing_address'] = $request->insured_mailing_address;
        $post_data['insured_mailing_city'] = $request->insured_mailing_city;
        $post_data['insured_mobile_number'] = $request->insured_mobile_number;
        $post_data['insured_email_address'] = $request->insured_email_address;
        $post_data['insured_father_name'] = $request->insured_father_name;
        $post_data['insured_mother_name'] = $request->insured_mother_name;

        #individual insurance info
        $post_data['flat_district_id'] = $request->flat_district_id;
        $post_data['flat_location_id'] = $request->flat_location_id;
        $post_data['flat_risk_coverage'] = $request->flat_risk_coverage;
        $post_data['net_premium'] = $request->net_premium;
        $post_data['vat'] = $request->vat;
        $post_data['insured_amount'] = $request->insured_amount;
        $post_data['dob'] = $request->dob;
        $post_data['status'] = $request->status;
        $post_data['people_number_of_people'] = $request->people_number_of_people;
        $post_data['people_personal_id'] = $request->people_personal_id;
        $post_data['personal_medical_benifit'] = $request->personal_medical_benifit;
        $post_data['occupation_id'] = $request->occupation_id;
        $post_data['risk_coverage_id'] = $request->risk_coverage_id;
        $post_data['stamp_charge'] = $request->stamp_charge;
        $post_data['insurance_sub_type_id'] = $request->insurance_sub_type_id;
        $post_data['user_visit_country'] = $request->user_visit_country;
        $post_data['user_date_of_departure'] = $request->user_date_of_departure;
        $post_data['user_return_date'] = $request->user_return_date;
        $post_data['cirtificate_registration'] = $request->cirtificate_registration;

        # NOMINEE INFORMATION
        $post_data['nominee_full_name'] = $request->nominee_full_name;
        $post_data['nominee_relationship'] = $request->nominee_relationship;
        $post_data['nominee_address'] = $request->nominee_address;
        $post_data['nominee_mobile_number'] = $request->nominee_mobile_number;

        #POLICY DATE
        $post_data['policy_start_date'] = $request->policy_start_date;
        $post_data['policy_end_date'] = $request->policy_end_date;

        #Vehicle Information
        $post_data['motor_vehicle_brand_make'] = $request->motor_vehicle_brand_make;
        $post_data['motor_year_of_manufacture'] = $request->motor_year_of_manufacture;
        $post_data['motor_metro'] = $request->motor_metro;
        $post_data['motor_mark'] = $request->motor_mark;
        $post_data['motor_reg_number'] = $request->motor_reg_number;
        $post_data['motor_registration_date'] = $request->motor_registration_date;
        $post_data['motor_engin_number'] = $request->motor_engin_number;
        $post_data['motor_chasis_number'] = $request->motor_chasis_number;
        $post_data['own_damage'] = $request->own_damage;
        $post_data['teriff_code'] = $request->teriff_code;

        if ($request->hasFile('nominee_nid')) {

            $image_file = $request->file('nominee_nid');

            if ($image_file) {

                $img_gen = hexdec(uniqid());
                $image_url = 'file/cirtificate/';
                $image_ext = strtolower($image_file->getClientOriginalExtension());

                $img_name = $img_gen . '.' . $image_ext;
                $final_name1 = $image_url . $img_gen . '.' . $image_ext;

                $image_file->move($image_url, $img_name);
            }

        }

        if ($request->hasFile('insured_nid_file')) {

            $image_file = $request->file('insured_nid_file');

            if ($image_file) {

                $img_gen = hexdec(uniqid());
                $image_url = 'file/nid/';
                $image_ext = strtolower($image_file->getClientOriginalExtension());

                $img_name = $img_gen . '.' . $image_ext;
                $final_name2 = $image_url . $img_gen . '.' . $image_ext;

                $image_file->move($image_url, $img_name);
            }

        }

        $post_data['nominee_nid'] = $final_name1 ?? '';
        $post_data['insured_nid_file'] = $final_name2 ?? '';

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
            ->where('transaction_id', $post_data['tran_id'])
            ->updateOrInsert([
                'calculator_id' => $post_data['calculator_id'],
                'amount' => $post_data['total_amount'],
                'currency' => $post_data['currency'],
                'transaction_id' => $post_data['tran_id'],
                'insured_full_name' => $post_data['insured_full_name'],
                'insured_nid' => $post_data['insured_nid'],
                'insured_permanent_address' => $post_data['insured_permanent_address'],
                'insured_present_address' => $post_data['insured_present_address'],
                'insured_permanent_city' => $post_data['insured_permanent_city'],
                'insured_mailing_address' => $post_data['insured_mailing_address'],
                'insured_mailing_city' => $post_data['insured_mailing_city'],
                'insured_mobile_number' => $post_data['insured_mobile_number'],
                'insured_email_address' => $post_data['insured_email_address'],
                'insured_father_name' => $post_data['insured_father_name'],
                'insured_mother_name' => $post_data['insured_mother_name'],
                'nominee_full_name' => $post_data['nominee_full_name'],
                'nominee_relationship' => $post_data['nominee_relationship'],
                'nominee_address' => $post_data['nominee_address'],
                'nominee_mobile_number' => $post_data['nominee_mobile_number'],
                'policy_start_date' => $post_data['policy_start_date'],
                'policy_end_date' => $post_data['policy_end_date'],
                'cirtificate_registration' => $post_data['cirtificate_registration'] ?? '',
                'nid_file' => $post_data['nid_file'] ?? '',
                'status' => $post_data['status'],
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
                'own_damage' => $post_data['own_damage'],
                'nominee_nid' => $post_data['nominee_nid'],
                'insured_nid_file' => $post_data['insured_nid_file'],
            ]);

        $order = Order::where('transaction_id', $post_data['tran_id'])->first();

        if (isset($order)) {

// $invoice_details = InvoiceDetails::where('order_id', $order->id)->first();

// if (!isset($invoice_details)) {

//     $invoice_details = InvoiceDetails::create([

//         'order_id'        => $order->id,

//         'invoice_details' => $request->invoice_details,

//         'insurance_type'  => $calculator_info->en_name,

//     ]);

// } else {

//     $invoice_details = $invoice_details->update([

//         'invoice_details' => $request->invoice_details,

//         'insurance_type'  => $calculator_info->en_name,

//     ]);
            // }

            $invoice_details = CalculatorSellDetail::create([
                'order_id' => $order->id,
                'details' => json_decode($request->data),
            ]);

            return response()->json([
                'status' => true,
                'data' => $order,
                'invoice_details' => $invoice_details,
            ]);
        }

    }

}
