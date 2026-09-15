<?php

namespace App\Http\Controllers;

use App\Models\CalculationFireAdditionalCoverage;
use App\Models\CalculationFireInterestTeriff;
use App\Models\CalculationPersonalInfoValidation;
use App\Models\Calculator;
use App\Models\CalculatorAdditionalCoverage;
use App\Models\CalculatorBoilerTeriff;
use App\Models\CalculatorBuildingConstruction;
use App\Models\CalculatorCargoProduct;
use App\Models\CalculatorCarriedBy;
use App\Models\CalculatorCashInSafeTeriff;
use App\Models\CalculatorCountry;
use App\Models\CalculatorCountryVisit;
use App\Models\CalculatorFlatTeriff;
use App\Models\CalculatorInstitutionType;
use App\Models\CalculatorInsuranceSubType;
use App\Models\CalculatorMemberAssociation;
use App\Models\CalculatorPersonalAccidentTeriff;
use App\Models\CalculatorPropertyLocation;
use App\Models\CustomSession;
use App\Models\InvoiceSession;
use App\Models\MerinTeriff;
use App\Models\Order;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CalculationController extends Controller
{
    public function invoice(Request $request)
    {

        $post_data = $request->except('nominee_nid', 'insured_nid_file');



        if ($request->cirtificate_registration) {
            $cc_order = Order::where('code', $request->cirtificate_registration)->first();
        }

        if ($request->hasFile('insured_nid_file')) {

            $image_file = $request->file('insured_nid_file');

            if ($image_file) {

                $img_gen = hexdec(uniqid());
                $image_url = 'file/nid/';
                $image_ext = strtolower($image_file->getClientOriginalExtension());

                $img_name = $img_gen . '.' . $image_ext;
                $final_name1 = $image_url . $img_gen . '.' . $image_ext;

                $image_file->move($image_url, $img_name);
            }
        } elseif ($request->cirtificate_registration != null) {
            $final_name1 = $cc_order->insured_nid_file;
        }

        if ($request->hasFile('nominee_nid')) {

            $image_file = $request->file('nominee_nid');

            if ($image_file) {

                $img_gen = hexdec(uniqid());
                $image_url = 'file/nid/';
                $image_ext = strtolower($image_file->getClientOriginalExtension());

                $img_name = $img_gen . '.' . $image_ext;
                $final_name2 = $image_url . $img_gen . '.' . $image_ext;

                $image_file->move($image_url, $img_name);
            }
        } elseif ($request->cirtificate_registration != null) {
            $final_name2 = $cc_order->nominee_nid;
        }

        $post_data['insured_nid_file'] = $final_name1 ?? '';
        $post_data['nominee_nid'] = $final_name2 ?? '';

        $auth_user = Auth::user();

        if ($request->calculator_id == 3) {

            $details = Session::get('invoice_details');
            $motor = Session::get('motor');
            $type = Session::get('calculationType');

            $find_session = InvoiceSession::create([
                'user_id' => $auth_user->id,
                'calculator_id' => $request->calculator_id,
                'email' => $auth_user->email,
                'phone' => $auth_user->phone,
                'calculator_name' => $details['calculator']->en_name,
                'data' => json_encode($details),
                'data1' => json_encode($post_data),
                'data2' => json_encode($motor),
                'calculationType' => $type,
            ]);

            return redirect()->route('motor_invoice', $find_session->id);
        }

        if ($request->calculator_id == 4) {

            $data = Session::get('medaclaim');
            $type = Session::get('calculationType');

            $find_session = InvoiceSession::create([
                'user_id' => $auth_user->id,
                'calculator_id' => $request->calculator_id,
                'email' => $auth_user->email,
                'phone' => $auth_user->phone,
                'calculator_name' => $data['calculator']->en_name,
                'data' => json_encode($data),
                'data1' => json_encode($post_data),
                'calculationType' => $type,
            ]);

            return redirect()->route('medical_invoice', $find_session->id);
        }

        if ($request->calculator_id == 5) {

            $data = Session::get('personal');
            $type = Session::get('calculationType');

            $find_session = InvoiceSession::create([
                'user_id' => $auth_user->id,
                'calculator_id' => $request->calculator_id,
                'email' => $auth_user->email,
                'phone' => $auth_user->phone,
                'calculator_name' => $data['calculator']->en_name,
                'data' => json_encode($data),
                'data1' => json_encode($post_data),
                'calculationType' => $type,
            ]);

            return redirect()->route('personal_invoice', $find_session->id);
        }

        if ($request->calculator_id == 6) {

            $type_number = Session::get('type');
            $data = Session::get('people');
            $type = Session::get('calculationType');

            $find_session = InvoiceSession::create([
                'user_id' => $auth_user->id,
                'calculator_id' => $request->calculator_id,
                'email' => $auth_user->email,
                'phone' => $auth_user->phone,
                'calculator_name' => $data['calculator']->en_name,
                'data' => json_encode($data),
                'data1' => json_encode($post_data),
                'data2' => $type_number,
                'calculationType' => $type,
            ]);

            return redirect()->route('people_personal_invoice', $find_session->id);
        }

        if ($request->calculator_id == 7) {

            $data = Session::get('bongo');
            $type = Session::get('calculationType');

            $find_session = InvoiceSession::create([
                'user_id' => $auth_user->id,
                'calculator_id' => $request->calculator_id,
                'email' => $auth_user->email,
                'phone' => $auth_user->phone,
                'calculator_name' => $data['calculator']->en_name,
                'data' => json_encode($data),
                'data1' => json_encode($post_data),
                'calculationType' => $type,
            ]);

            return redirect()->route('bongobondhu_invoice', $find_session->id);
        }

        if ($request->calculator_id == 8) {

            $data = Session::get('flat');
            $type = Session::get('calculationType');

            $find_session = InvoiceSession::create([
                'user_id' => $auth_user->id,
                'calculator_id' => $request->calculator_id,
                'email' => $auth_user->email,
                'phone' => $auth_user->phone,
                'calculator_name' => $data['calculator']->en_name,
                'data' => json_encode($data),
                'data1' => json_encode($post_data),
                'calculationType' => $type,
            ]);

            return redirect()->route('flat_invoice', $find_session->id);
        }
    }

    public function fire(Request $request)
    {
        // return $request->all();
        $data = [];
        $data['calculator'] = Calculator::find($request->calculator_id);
        $net_premium = 0;
        $data['location'] = CalculatorPropertyLocation::find($request->property_location_id);
        $data['building'] = CalculatorBuildingConstruction::find($request->building_construction_id);

        $data['alert_message'] = null;
        $data['isMinimum'] = null;

        if ($request->member_association_id) {
            $data['fire_terif_details'] = $fire_teriff = CalculationFireInterestTeriff::where('location_id', $request->property_location_id)
                ->where('member_association_id', $request->member_association_id)
                ->where('building_construction_id', $request->building_construction_id)
                ->where('status', 1)
                ->first();

            if (!$fire_teriff) {
                $data['alert_message'] = "No insurance found";

                return view('frontend.product-and-service.calculation.fire', $data);
            }

            $interest_premium = round(($request->total_amount * $fire_teriff->value) / 100);

            if ($interest_premium < 500) {
                $net_premium = 500;
                $data['isMinimum'] = 'minimum';
            } else {
                $net_premium = $interest_premium;
            }

            $coverage_data = [];
            $total_coverage_amount = 0;

            if (!is_null($request->coverage) && count($request->coverage) > 0) {

                foreach ($request->coverage as $c_item) {

                    if ($c_item['coverage_amount'] > 0) {

                        if ($c_item['c_sub_id']) {

                            if ($c_item['district_id']) {
                                $coverage = CalculationFireAdditionalCoverage::where('additional_coverage_id', $c_item['coverage_id'])->where('additional_subcoverage_id', $c_item['c_sub_id'])->where('district_id', $c_item['district_id'])->first();
                            } else {
                                $coverage = CalculationFireAdditionalCoverage::where('additional_coverage_id', $c_item['coverage_id'])->where('additional_subcoverage_id', $c_item['c_sub_id'])->whereNull('district_id')->first();
                            }

                            if (!$coverage) {
                                $data['alert_message'] = "No insurance found";

                                return view('frontend.product-and-service.calculation.fire', $data);
                            }

                            if ($coverage) {
                                // $coverage = $coverage;
                                $cac = $coverage->additionalCoverage;
                                $claus = (int)round(($coverage->value * $c_item['coverage_amount']) / 100);

                                if ($coverage->additional_coverage_id == 11) {

                                    if ($claus > 500) {
                                        $claus = $claus;
                                    } else {
                                        $claus = 500;
                                    }
                                }

                                $c_amount = $total_amount = $claus;
                                $total_coverage_amount += $total_amount;
                                $coverage_data[] = ['coverage' => $coverage, 'cac' => $cac, 'c_amount' => $c_amount, 'coverage_amount' => $c_item['coverage_amount']];
                            }
                        } else {
                            $coverage = CalculationFireAdditionalCoverage::where('additional_coverage_id', $c_item['coverage_id'])->where('building_construction_id', $request->building_construction_id)->where('location_id', $request->property_location_id)->where('member_id', $request->member_association_id)->where('status', 1)->first();

                            if (!$coverage) {
                                $data['alert_message'] = "No insurance found";

                                return view('frontend.product-and-service.calculation.fire', $data);
                            }

                            if ($coverage) {
                                // $coverage = $coverage;
                                $cac = $coverage->additionalCoverage;
                                $claus = (int)round(($coverage->value * $c_item['coverage_amount']) / 100);

                                if ($coverage->additional_coverage_id == 11) {

                                    if ($claus > 500) {
                                        $claus = $claus;
                                    } else {
                                        $claus = 500;
                                    }
                                }

                                $c_amount = $total_amount = $claus;
                                $total_coverage_amount += $total_amount;
                                $coverage_data[] = ['coverage' => $coverage, 'cac' => $cac, 'c_amount' => $c_amount, 'coverage_amount' => $c_item['coverage_amount']];
                            }
                        }
                    }
                }
            }
        } else {
            $coverage_data = [];

            $total_coverage_amount = 0;

            if (!is_null($request->coverage) && count($request->coverage) > 0) {

                foreach ($request->coverage as $c_item) {

                    if ($c_item['coverage_amount'] > 0) {

                        if ($c_item['c_sub_id']) {

                            if ($c_item['district_id']) {
                                $coverage = CalculationFireAdditionalCoverage::where('additional_coverage_id', $c_item['coverage_id'])->where('additional_subcoverage_id', $c_item['c_sub_id'])->where('district_id', $c_item['district_id'])->whereNull('member_id')->first();
                            } else {
                                $coverage = CalculationFireAdditionalCoverage::where('additional_coverage_id', $c_item['coverage_id'])->where('additional_subcoverage_id', $c_item['c_sub_id'])->whereNull('member_id')->first();
                            }

                            if (!$coverage) {
                                $data['alert_message'] = "No insurance found";

                                return view('frontend.product-and-service.calculation.fire', $data);
                            }

                            if ($coverage) {
                                // $coverage_data['coverage'] = $coverage;
                                $cac = $coverage->additionalCoverage;
                                $claus = (int)round(($coverage->value * $c_item['coverage_amount']) / 100);

                                if ($coverage->additional_coverage_id == 11) {

                                    if ($claus > 500) {
                                        $claus = $claus;
                                    } else {
                                        $claus = 500;
                                    }
                                }

                                $c_amount = $total_amount = $claus;

                                $total_coverage_amount += $total_amount;
                                $coverage_data[] = ['coverage' => $coverage, 'cac' => $cac, 'c_amount' => $c_amount, 'coverage_amount' => $c_item['coverage_amount']];
                            }
                        } else {

                            $coverage = CalculationFireAdditionalCoverage::where('additional_coverage_id', $c_item['coverage_id'])->where('building_construction_id', $request->building_construction_id)->where('location_id', $request->property_location_id)->whereNull('member_id')->where('status', 1)->first();

                            if (!$coverage) {
                                $data['alert_message'] = "No insurance found";

                                return view('frontend.product-and-service.calculation.fire', $data);
                            }

                            if ($coverage) {
                                // $coverage_data['coverage'] = $coverage;
                                $cac = $coverage->additionalCoverage;
                                $claus = (int)round(($coverage->value * $c_item['coverage_amount']) / 100);

                                if ($coverage->additional_coverage_id == 11) {

                                    if ($claus > 500) {
                                        $claus = $claus;
                                    } else {
                                        $claus = 500;
                                    }
                                }

                                $c_amount = $total_amount = $claus;

                                $total_coverage_amount += $total_amount;
                                $coverage_data[] = ['coverage' => $coverage, 'cac' => $cac, 'c_amount' => $c_amount, 'coverage_amount' => $c_item['coverage_amount']];
                            }
                        }
                    }
                }
            }

            $data['fire_terif_details'] = $fire_teriff = CalculationFireInterestTeriff::where('location_id', $request->property_location_id)
                ->where('building_construction_id', $request->building_construction_id)
                ->where('interest_id', $request->interest_type_id)
                ->where('status', 1)
                ->first();

            if (!$fire_teriff) {
                $data['alert_message'] = "No insurance found";

                return view('frontend.product-and-service.calculation.fire', $data);
            }

            $interest_premium = round(($request->total_amount * $fire_teriff->value) / 100);

            if ($interest_premium < 500) {
                $net_premium = 500;
                $data['isMinimum'] = 'minimum';
            } else {
                $net_premium = $interest_premium;
            }
        }

        // return ($coverage_data);
        $data['fire_interest'] = $net_premium;
        $data['coverage_data'] = $coverage_data;
        $net_premium = $net_premium + $total_coverage_amount;
        $data['net_premium'] = $net_premium;
        $vat = 0;

        if ($request->member_association_id) {
            $data['vat'] = $vat = 0;
        } else {
            $data['vat'] = $vat = round(($net_premium * 15) / 100);
        }

        $data['total_premium'] = $vat + $net_premium;
        $data['total_amount'] = $request->total_amount;
        // dd($data);

        return view('frontend.product-and-service.calculation.fire', $data);
    }

    public function marin(Request $request)
    {
        $marin_carried_by = json_decode($request->marin_carried_by);
        // dd($request->all(), $marin_carried_by);
        $data = [];
        $data['calculator'] = Calculator::find($request->calculator_id);
        $data['cargo_product'] = CalculatorCargoProduct::find($request->cargo_product_id);
        $data['member_association'] = CalculatorMemberAssociation::find($request->member_association_id);
        $carried_by = CalculatorCarriedBy::find($request->carried_id);

        $data['alert_message'] = null;

        // return $marin_carried_by;
        $max = -100;
        $check_stamp_charge = -100;
        $data['is_minimum'] = null;
        $most_interest = null;

        foreach ($marin_carried_by as $key => $mcb) {

            if ($request->member_association_id == null) {
                $interest = MerinTeriff::where('status', 1)
                    ->where('cargo_product_id', $request->cargo_product_id)
                    ->where('teriff_id', $request->tariff_id)
                    ->whereNull('member_id')
                    ->where('carried_by_id', $mcb->carried_by)
                    ->where('risk_cover_id', $mcb->carried_risk_id)
                    ->where('interest_type_id', $mcb->marine_interest_id)
                    ->first();

                if (!$interest) {

                    $data['alert_message'] = 'No available insurance!!';

                    return view('frontend.product-and-service.calculation.marin_calculation', $data);
                }

                if ($interest->value > $max) {
                    $max = $interest->value;
                    $most_interest = $interest;
                }

                $carried_by = CalculatorCarriedBy::find($mcb->carried_by);

                if ($carried_by->charge_type == 2 && $request->total_sum_insured > $carried_by->price_limit) {
                    $stamp_charge = (ceil(($request->total_sum_insured - $carried_by->price_limit) / $carried_by->next_price_limit) * $carried_by->next_amount) + $carried_by->amount;
                } else {
                    $stamp_charge = $carried_by->amount;
                }

                if ($stamp_charge > $check_stamp_charge) {
                    $check_stamp_charge = $stamp_charge;
                }

                $stamp_charge = $check_stamp_charge;
            } else {
                $interest = MerinTeriff::where('status', 1)
                    ->where('cargo_product_id', $request->cargo_product_id)
                    ->where('member_id', $request->member_association_id)
                    ->where('teriff_id', $request->tariff_id)
                    ->where('carried_by_id', $mcb->carried_by)
                    ->where('risk_cover_id', $mcb->carried_risk_id)
                    ->where('interest_type_id', $mcb->marine_interest_id)
                    ->first();

                if (!$interest) {

                    $data['alert_message'] = 'No available insurance!!';

                    return view('frontend.product-and-service.calculation.marin_calculation', $data);
                }

                if ($interest->value > $max) {
                    $max = $interest->value;
                    $most_interest = $interest;
                }

                $carried_by = CalculatorCarriedBy::find($mcb->carried_by);

                if ($carried_by->charge_type == 2 && $request->total_sum_insured > $carried_by->price_limit) {
                    $stamp_charge = (ceil(($request->total_sum_insured - $carried_by->price_limit) / $carried_by->next_price_limit) * $carried_by->next_amount) + $carried_by->amount;
                } else {
                    $stamp_charge = $carried_by->amount;
                }

                if ($stamp_charge > $check_stamp_charge) {
                    $check_stamp_charge = $stamp_charge;
                }

                $stamp_charge = $check_stamp_charge;
            }
        }

        if (!$most_interest) {

            $data['alert_message'] = 'No available insurance!!';

            return view('frontend.product-and-service.calculation.marin_calculation', $data);
        }

        $data['interest'] = $most_interest;
        $interest_amount = round(($request->total_sum_insured * $most_interest->value) / 100);

        if ($interest_amount < 500) {
            $interest_amount = 500;
            $data['is_minimum'] = 'minimum';
        } else {
            $interest_amount = $interest_amount;
        }

        $data['interest_amount'] = $interest_amount;
        $data['stamp_charge'] = $stamp_charge;

        $additional_coverage_amount = 0;
        $data['additional_coverage'] = null;

        if ($request->additional_coverage_id != null) {
            $data['additional_coverage'] = $additional_coverage = CalculatorAdditionalCoverage::find($request->additional_coverage_id);
            $additional_coverage_amount = round(($request->total_sum_insured * $additional_coverage->value) / 100);
        }

        $data['additional_coverage_amount'] = $additional_coverage_amount;
        $net_premium = $additional_coverage_amount + $interest_amount;

        if (is_null($request->member_association_id)) {
            $total = $net_premium;
            $vat = round(($total * 15) / 100);
        } else {
            $vat = 0;
        }

        $data['vat'] = $vat;
        $data['all_requested_value'] = $request->all();
        $data['net_premium'] = $net_premium;
        $data['total_premium'] = $net_premium + $vat + $stamp_charge;

        return view('frontend.product-and-service.calculation.marin_calculation', $data);
    }

    public function mediclaim(Request $request)
    {
        $birthDate = $request->user_date_of_birth;
        $tz = new DateTimeZone('Asia/Dhaka');

        $year = DateTime::createFromFormat('d/m/Y', $birthDate, $tz)
            ->diff(new DateTime('now', $tz))
            ->y;
        $month = '.' . DateTime::createFromFormat('d/m/Y', $birthDate, $tz)
            ->diff(new DateTime('now', $tz))
            ->m;

        $visit_day = $request->travel_duration_value;

        $data['calculator'] = Calculator::find($request->calculator_id);
        $data['insurance_subtype'] = CalculatorInsuranceSubType::find($request->insurance_sub_type_id);
        $data['user_date_of_departure'] = $request->user_date_of_departure;
        $data['user_return_date'] = $request->user_return_date;

        $country_type = CalculatorCountry::whereIn('id', explode(',', $request->user_visit_country))->get();

        $is_schengen = 0;
        $is_including = 0;
        $country_type_id = 1;

        foreach ($country_type as $c_type) {

            if ($c_type->type == 2) {
                $is_schengen = 1;
                break;
            }
        }

        foreach ($country_type as $c_type) {

            if ($c_type->en_name == 'Canada' || $c_type->en_name == 'USA') {
                $is_including = 1;
                break;
            }
        }

        if ($is_schengen == 0 && $is_including == 0) {
            $country_type_id = 1;
        } elseif ($is_schengen == 1 && $is_including == 0) {
            $country_type_id = 2;
        } elseif ($is_schengen == 0 && $is_including == 1) {
            $country_type_id = 3;
        } elseif ($is_schengen == 1 && $is_including == 1) {
            $country_type_id = 4;
        }

        $country = CalculatorCountryVisit::where('insurance_sub_type_id', $request->insurance_sub_type_id)->where('country_type_id', $country_type_id)->where('day_from', '<=', $visit_day)->where('day_to', '>=', $visit_day);

        if ($year > 0) {
            $country = $country->where('age_from', '<=', $year)->where('age_to', '>=', $year);
        } else {
            $country = $country->where('age_from', '<=', $month)->where('age_to', '>=', $month);
        }

        $data['is_schengen'] = $is_schengen;
        $data['is_including'] = $is_including;
        $data['country_type_id'] = $country_type_id;

        $data['country'] = $country = $country->first();
        // return gettype($country);
        $data['alert_message'] = '';

        if (!$country || $country == null) {
            $data['alert_message'] = 'No available insurance!!';

            return view('frontend.product-and-service.calculation.mediclaim', $data);
        }

        if ($country->amount > $country->price_limit) {
            $stamp_amount = (round(($country->amount - $country->price_limit) / $country->next_price_limit) * $country->next_amount) + $country->amount_limit;
        } else {
            $stamp_amount = $country->amount_limit;
        }

        $data['stamp_amount'] = $stamp_amount;
        $data['all_country'] = CalculatorCountry::whereIn('id', explode(',', $request->user_visit_country))->get();

        $data['net_premium'] = $country->amount;
        $data['vat'] = $vat = round((($country->amount) * 15) / 100);
        $data['total_premium'] = $country->amount + $stamp_amount + $vat;
        $data['visit_day'] = $visit_day;
        $data['request_all'] = $request->all();
        $data['age'] = $year > 0 ? $year : $month;

        Session::put('medaclaim', $data);
        Session::put('calculationType', 'medaclaim');

        return view('frontend.product-and-service.calculation.mediclaim', $data);
    }

    public function buyMotor(Request $request)
    {
        $data = [];
        $data['request_all'] = $request->all();
        $data['calculator'] = Calculator::find($request->calculator_id);

        if ($request->certificate_number) {
            $data['order'] = Order::where('code', $request->certificate_number)->first();
        }

        return view('frontend.product-and-service.form.motor', $data);
    }

    public function buyMediclaim(Request $request)
    {
        $data = [];
        $data['request_all'] = $request->all();
        $data['calculator'] = Calculator::find($request->calculator_id);

        // dd($data);

        return view('frontend.product-and-service.form.mediclaim', $data);
    }

    public function flat(Request $request)
    {
        // return $request->all();
        $data = [];
        $data['calculator'] = Calculator::find($request->calculator_id);

        if ($request->user_visit_country == null) {
            $visit = $request->default_fire;
        } else {
            $visit = $request->default_fire . ',' . $request->user_visit_country;
        }

        $locations = explode(',', $visit);

        $net_premium = 0;

        $cal = [];

        foreach ($locations as $location) {
            $teriff = CalculatorFlatTeriff::where('risk_coverage_id', $location)
                ->where('location_id', $request->location_id)
                ->where('district_id', $request->district_id)
                ->with(
                    'calculator',
                    'district',
                    'location',
                    'riskCoverage'
                )
                ->first();

            if ($teriff) {
                $self_value = round(($request->total_amount * $teriff->value) / 100);

                $net_premium += $self_value;

                $teriff['self_value'] = $self_value;
                $cal[] = $teriff;
            }
        }

        $data['alert_message'] = null;

        if (!$net_premium) {
            $data['alert_message'] = 'No available insurance!!';

            return view('frontend.product-and-service.calculation.flat', $data);
        }

        //return $cal[0];
        $data['criteria'] = $cal[0];

        $data['request_all'] = $request->all();
        $data['cal'] = $cal;
        $data['net_premium'] = $net_premium;

        $data['vat'] = $vat = round(($net_premium * 15) / 100);
        $data['total_premium'] = $net_premium + $vat;

        $data['district'] = $cal[0]->district;
        $data['location'] = $cal[0]->location;
        Session::put('flat', $data);
        session()->put('isLogin', true);
        session()->put('calculationType', 'flat');

        return view('frontend.product-and-service.calculation.flat', $data);
    }

    public function personalAccident(Request $request)
    {
        // return $request->all();
        $data = [];
        $data['calculator'] = Calculator::find($request->calculator_id);
        $teriff = CalculatorPersonalAccidentTeriff::where('calculator_id', $request->calculator_id)
            ->where('occupation_id', $request->occupation_id)
            ->where('risk_coverage_id', $request->risk_coverage_id)
            ->where('status', 1)
            ->first();

        $data['alert_message'] = null;

        if (!$teriff) {
            $data['alert_message'] = 'No available insurance!!';

            return view('frontend.product-and-service.calculation.personal-accident', $data);
        }

        $data['teriff'] = $teriff;
        $data['pa'] = $pa = round(($request->total_amount * $teriff->value) / 100);

        if ($request->medical_benifit == true) {
            $data['medical_amount'] = $medical_amount = round(($pa * 10) / 100);
        } else {
            $data['medical_amount'] = $medical_amount = 0;
        }

        $data['net_premium'] = $net_premium = round($pa + $medical_amount);

        if ($net_premium > $teriff->price_limit) {
            $stamp_amount = (round(($net_premium - $teriff->price_limit) / $teriff->next_price_limit) * $teriff->next_amount) + $teriff->amount_limit;
        } else {
            $stamp_amount = $teriff->amount_limit;
        }

        $data['stamp_charge'] = $stamp_amount;
        $data['vat'] = $vat = round((($net_premium) * 15) / 100);
        $data['total_premium'] = $net_premium + $stamp_amount + $vat;
        $data['risk'] = $teriff->riskCoverage;
        $data['occupation'] = $teriff->occupation;
        $data['request_all'] = $request->all();
        Session::put('personal', $data);
        session()->put('calculationType', 'personal');

        return view('frontend.product-and-service.calculation.personal-accident', $data);
    }

    public function buyPersonalAccident(Request $request)
    {
        $data = [];
        $data['request_all'] = $request->all();
        $data['calculator'] = Calculator::find($request->calculator_id);

        return view('frontend.product-and-service.form.personal-accident', $data);
    }

    public function buyPeoplePersonalAccident(Request $request)
    {
        $data = [];
        $data['request_all'] = $request->all(); //number_of_people
        $data['calculator'] = Calculator::find($request->calculator_id);
        $data['people'] = null;

        // dd($data);

        return view('frontend.product-and-service.form.people-personal-accident', $data);
    }

    public function buyBongoBunduSurokhaBima(Request $request)
    {
        $request = request();
        // dd($request->calculator_id);
        $data = [];
        $data['request_all'] = $request->all();
        $data['calculator'] = Calculator::find($request->calculator_id);

        return view('frontend.product-and-service.form.bango-bondu-surokha-bima', $data);
    }

    public function buyFlat(Request $request)
    {
        $data = [];
        $data['request_all'] = $request->all();
        $data['calculator'] = Calculator::find($request->calculator_id);

        return view('frontend.product-and-service.form.flat', $data);
    }

    public function cashInSafeAndTransitTeriff(Request $request)
    {

        $data = [];

        if ($request->srcc_id) {
            $teriff = CalculatorCashInSafeTeriff::where('calculator_id', $request->calculator_id)
                ->where('calculator_institute_type_id', $request->institute_type_id)
                ->where('calculator_property_location_id', $request->property_location_id)
                ->where('calculator_building_construction_id', $request->building_construction_id)
                ->where('srcc_id', $request->srcc_id)
                ->where('status', 1)->first();
        } else {
            $teriff = CalculatorCashInSafeTeriff::where('calculator_id', $request->calculator_id)
                ->where('calculator_institute_type_id', $request->institute_type_id)
                ->where('calculator_property_location_id', $request->property_location_id)
                ->where('calculator_building_construction_id', $request->building_construction_id)
                ->whereNull('srcc_id')
                ->where('status', 1)->first();
        }

        $teriff = $teriff;
        $data['calculator'] = Calculator::find($request->calculator_id);
        $data['teriff'] = $teriff;
        $data['request_all'] = $request->all();
        $data['alert_message'] = null;

        if (!$teriff) {
            $data['alert_message'] = 'No available insurance!!';

            return view('frontend.product-and-service.calculation.cash-in-safe', $data);
        }

        $data['net_premium'] = $net_premium = round(($teriff->value * $request->yearly_turnover) / 100);
        $data['vat'] = $vat = round(($net_premium * 15) / 100);
        $data['total_premium'] = $net_premium + $vat;

        return view('frontend.product-and-service.calculation.cash-in-safe', $data);
    }

    public function cashInTransit(Request $request)
    {
        // return $request->all();
        $data = [];

        $institute = CalculatorInstitutionType::find($request->institute_type_id);

        $armored = 0;

        if ($request->armored == 1) {
            $armored = 1;
        }

        if ($institute->en_name == 'Bank' || $institute->en_name = 'Industrial') {

            if ($request->srcc_id) {
                $teriff = CalculatorCashInSafeTeriff::where('calculator_id', $request->calculator_id)
                    ->where('calculator_institute_type_id', $request->institute_type_id)
                    ->where('srcc_id', $request->srcc_id)
                    ->where('status', 1)
                    ->where('armored', $armored)
                    ->first();
            } else {
                $teriff = CalculatorCashInSafeTeriff::where('calculator_id', $request->calculator_id)
                    ->where('calculator_institute_type_id', $request->institute_type_id)
                    ->whereNull('srcc_id')
                    ->where('status', 1)
                    ->where('armored', $armored)
                    ->first();
            }
        } else {

            if ($request->srcc_id) {
                $teriff = CalculatorCashInSafeTeriff::where('calculator_id', $request->calculator_id)
                    ->where('calculator_institute_type_id', $request->institute_type_id)
                    ->where('srcc_id', $request->srcc_id)
                    ->where('status', 1)
                    ->first();
            } else {
                $teriff = CalculatorCashInSafeTeriff::where('calculator_id', $request->calculator_id)
                    ->where('calculator_institute_type_id', $request->institute_type_id)
                    ->whereNull('srcc_id')
                    ->where('status', 1)
                    ->first();
            }
        }

        $teriff = $teriff;
        $data['calculator'] = Calculator::find($request->calculator_id);
        $data['teriff'] = $teriff;
        $data['request_all'] = $request->all();
        $data['alert_message'] = null;

        if (!$teriff) {
            $data['alert_message'] = 'No available insurance!!';

            return view('frontend.product-and-service.calculation.cash-in-transit', $data);
        }

        $primary_amount = $request->yearly_turnover - $teriff->turnover_up_to;

        if ($primary_amount <= 0) {
            $net_premium = round(($request->yearly_turnover * $teriff->turnover_up_to_value) / 100);
        } else {
            $net_premium = round(($primary_amount * $teriff->turnover_up_to_value) / 100);
        }

        $next_amount = $request->yearly_turnover - $teriff->turnover_up_to;

        if ($next_amount > 0) {
            $net_premium += round(($next_amount * $teriff->turnover_for_over_value) / 100);
        }

        $data['net_premium'] = $net_premium;
        $data['vat'] = $vat = round(($net_premium * 15) / 100);
        $data['total_premium'] = $net_premium + $vat;
        $data['turn_over_rate'] = 0;
        $data['yearly_turnover'] = $request->yearly_turnover;

        return view('frontend.product-and-service.calculation.cash-in-transit', $data);
    }

    public function cashOnCounterTeriff(Request $request)
    {
        // return $request->all();
        $data = [];

        $teriff = CalculatorCashInSafeTeriff::where('calculator_id', $request->calculator_id)
            ->where('calculator_institute_type_id', $request->institute_type_id)
            ->where('calculator_building_construction_id', $request->building_construction_id)
            ->where('status', 1)
            ->first();

        $teriff = $teriff;
        $data['calculator'] = Calculator::find($request->calculator_id);
        $data['teriff'] = $teriff;
        $data['request_all'] = $request->all();
        $data['alert_message'] = null;

        if (!$teriff) {
            $data['alert_message'] = 'No available insurance!!';

            return view('frontend.product-and-service.calculation.cash-on-counter', $data);
        }

        $data['net_premium'] = $net_premium = round(($teriff->value * $request->yearly_turnover) / 100);
        $data['vat'] = $vat = round(($net_premium * 15) / 100);
        $data['total_premium'] = $net_premium + $vat;

        return view('frontend.product-and-service.calculation.cash-on-counter', $data);
    }

    public function boilerTeriff(Request $request)
    {
        // dd($request->all());
        $data = [];
        $data['calculator'] = Calculator::find($request->calculator_id);

        $boiler = CalculatorBoilerTeriff::where('calculator_id', $request->calculator_id)
            ->where('year_to', '>=', $request->boiler_age)
            ->where('year_from', '<=', $request->boiler_age)
            ->where('status', 1)
            ->first();

        $data['alert_message'] = null;

        if (!$boiler) {
            $data['alert_message'] = 'No available insurance!!';

            return view('frontend.product-and-service.calculation.boiler', $data);
        }

        $data['boiler'] = $boiler;
        $net_premium = round(($request->total_amount * $boiler->value) / 100);

        if ($net_premium > 5000) {
            $net = $net_premium;
        } else {
            $net = 5000;
        }

        $data['bpv'] = $net;

        if ($request->spp != null) {
            $spp = round(((int)$request->spp * 2) / 100);
        } else {
            $spp = 0;
        }

        $data['spp'] = $spp;
        $data['net_premium'] = $net + $spp;
        $data['vat'] = $vat = round((($net + $spp) * 15) / 100);
        $data['total_premium'] = $net + $vat + $spp;
        $data['boiler_age'] = (int)$request->boiler_age;
        $data['total_request_amount'] = $request->total_amount;
        $data['spp_value'] = $request->spp;

        return view('frontend.product-and-service.calculation.boiler', $data);
    }

    public function checkLogin()
    {

        if (Auth::check()) {
            return response()->json(['status' => true]);
        } else {
            return response()->json(['status' => false]);
        }
    }

    public function certificateDetails(Request $request)
    {
        $order = Order::with('sellDetails')->whereNull('cirtificate_registration')->where('user_id', Auth::id())->where('code', $request->c_number)->first();

        if ($order) {
            return response()->json(['status' => true, 'order' => $order]);
        }

        return response()->json(['status' => false]);
    }

    public function bongoDob(Request $request)
    {
        session()->put('bongo_dob', $request->dob);

        return session('bongo_dob');
    }
}
