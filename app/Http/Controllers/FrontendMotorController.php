<?php

namespace App\Http\Controllers;

use App\Models\Calculator;
use App\Models\CalculatorEnginCapacity;
use App\Models\CalculatorMotorTariffPrice;
use App\Models\CalculatorRiskCover;
use App\Models\CalculatorVehicleType;
use App\Models\PassengerPrice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FrontendMotorController extends Controller
{
    public function admin_get_vehicle_type(Request $request, $id)
    {
        $vehicle_type_list = CalculatorVehicleType::where('calculator_vehicle_category_id', $id)->get();
        $data = '';
        $data .= '<option value="" selected disabled>Please Select</option>';

        foreach ($vehicle_type_list as $item) {
            $data .= '<option value="' . $item->id . '">' . $item->en_name . '</option>';
        }

        return $data;
    }

    public function admin_get_engine_capacity(Request $request, $id)
    {
        $vehicle_type_list = CalculatorEnginCapacity::where('calculator_vehicle_type_id', $id)->get();
        $data = '';

        foreach ($vehicle_type_list as $item) {
            $data .= '<option value="' . $item->id . '">' . $item->capacity_from . ' - ' . $item->capacity_to . '   ' . $item->tons . '</option>';
        }

        return $data;
    }

    public function get_vehicle_type(Request $request, $id)
    {
        $vehicle_type_list = CalculatorVehicleType::where('calculator_vehicle_category_id', $id)->get();

        return view('frontend.product-and-service.motor.vehicle_type', compact('vehicle_type_list'));
    }

    public function get_vehicle_type_renewal(Request $request, $id, $type_id)
    {
        $vehicle_type_list = CalculatorVehicleType::where('calculator_vehicle_category_id', $id)->get();
        $engine_capacity_ton = CalculatorEnginCapacity::where('calculator_vehicle_type_id', $type_id)->where('tons', '!=', null)->get();
        $engine_capacity_cc = CalculatorEnginCapacity::where('calculator_vehicle_type_id', $type_id)->where('capacity_from', '!=', null)->get();

        if ($vehicle_type_list) {
            return response()->json([
                'status' => true,
                'type' => $vehicle_type_list,
                'engine_capacity_cc' => $engine_capacity_cc,
                'engine_capacity_ton' => $engine_capacity_ton,
            ]);
        } else {
            return response()->json(['status' => true]);
        }

    }

    public function get_engine_capacity(Request $request)
    {

        $data['weight'] = $request->weight;

        return view('frontend.product-and-service.motor.engine_capacity', $data);
    }

    public function add_one_year(Request $request)
    {
        $date = date('Y-m-d', strtotime($request->present_date));

        // return gettype();
        // return Date($date, strtotime('+3 days'));
    }

    public function get_motor_tariff_web(Request $request)
    {
        // return $request->all();
        $data = [];
        $data['calculator'] = Calculator::find($request->calculator_id);
        $tariff = CalculatorMotorTariffPrice::where('insurance_type', $request->selected_insurance_type)
            ->where('vehicle_category_id', $request->vehicle_category_id)
            ->where('vehicle_type_id', $request->vehicle_type_id)
            ->where('capacity_from', '<=', $request->engine_capacity_cc)
            ->where('capacity_to', '>=', $request->engine_capacity_cc);

        if ($request->vehicle_weight_ton) {

            $tariff = $tariff->where('weight_from', '<=', $request->vehicle_weight_ton)
                ->where('weight_to', '>=', $request->vehicle_weight_ton);
        }

        $tariff = $tariff->where('status', 1)
            ->with('calculatorVehicleCategory', 'calculatorVehicleType')
            ->first();

        $vehicle_type_details = CalculatorVehicleType::where('id', $request->vehicle_type_id)->first();

        $data['covarage_amount'] = 0;

        if ($request->selected_insurance_type != "Act Liability" && $request->covarage != null) {
            $data['risk_cover'] = CalculatorRiskCover::whereIn('id', $request->covarage)->get();
            $risk_cover = 0;

            foreach ($data['risk_cover'] as $risk_value) {
                $risk_cover += $risk_value->value;
            }

            $data['covarage_amount'] = round((($request->vehicle_price) * $risk_cover) / 100);
        }

        $data['alert_message'] = null;

        if (!$tariff || !$vehicle_type_details) {
            return 'No available insurance!!';
        }

        $passanger_driver_price = PassengerPrice::first();

        $data['vehicle_price'] = $request->vehicle_price;
        $data['engine_capacity_cc'] = $request->engine_capacity_cc;
        $data['vehicle_weight_ton'] = $request->vehicle_weight_ton;

        $data['tariff'] = $tariff;

        $data['basic_premium'] = 0;

        if ($request->selected_insurance_type != "Act Liability") {
            $data['basic_premium'] = $tariff->price;
        }

        $data['fiv_amount'] = 0;

        if ($request->selected_insurance_type != "Act Liability") {
            $data['fiv'] = $vehicle_type_details->value . '%';
            $data['fiv_amount'] = round((($request->vehicle_price) * $vehicle_type_details->value) / 100);
        }

        $data['own_damage'] = $own_damage = $data['basic_premium'] + $data['fiv_amount'];
        $data['passenger'] = $request->passanger;
        $data['single_passenger_price'] = $passanger_driver_price->passenger_price;
        $data['passenger_price'] = (int)$passanger_driver_price->passenger_price * (int)$request->passanger;

        $data['driver'] = 1;
        $data['driver_type'] = $request->driver_type;

        if ($request->driver_type == 'self') {
            $data['driver_price'] = 1 * $tariff->self_driver;
        } else {
            $data['driver_price'] = 1 * $tariff->paid_driver;
        }

        if ($request->vtss == 'yes') {
            $vts_discounted_amount = 0;

            if ($own_damage > 0) {
                $vts_discounted_amount = $own_damage - $data['covarage_amount'];
            } else {
                $vts_discounted_amount = 1;
            }

            $data['vtss'] = $passanger_driver_price->vts_meter . '%';
            $data['vtss_amount'] = round((($vts_discounted_amount) * $passanger_driver_price->vts_meter) / 100);
        } else {
            $data['vtss'] = 0;
            $data['vtss_amount'] = 0;
        }

        if ($request->tachometer == 'yes') {
            $tac_discounted_amount = 0;

            if ($own_damage > 0) {
                $tac_discounted_amount = $own_damage - $data['covarage_amount'];
            } else {
                $tac_discounted_amount = 1;
            }

            $data['tachometer'] = $passanger_driver_price->tacometer . '%';
            $data['tachometer_amount'] = round((($tac_discounted_amount) * $passanger_driver_price->tacometer) / 100);
        } else {
            $data['tachometer'] = 0;
            $data['tachometer_amount'] = 0;
        }

        $data['certificate_number'] = $request->certificate_number;

        $data['ncb'] = 0;
        $data['loading'] = 0;
        $data['selected_insurance_type'] = $request->selected_insurance_type;
        $data['insurance_first'] = $request->insurance_first;

        if ($request->insurance_first == 'Renewal Insurance') {
            $p_ncb = round(($own_damage * $request->ncb) / 100);
            $p_loading = round(($own_damage * $request->loading) / 100);

            $data['ncb'] = $p_ncb;
            $data['loading'] = $p_loading;
            $data['request_ncb'] = $request->ncb;
            $data['request_loading'] = $request->loading;
        }

        $data['act'] = 0;

        $data['act'] = $tariff->act_liability;

        $data['vat'] = '15%';
        $data['net_premium'] = round($data['own_damage'] - $data['covarage_amount'] + $data['passenger_price'] + $data['driver_price'] - $data['vtss_amount'] - $data['tachometer_amount'] - $data['ncb'] + $data['loading']) + $data['act'];

        $data['vat_amount'] = $vat = round((($data['net_premium']) * 15) / 100);
        $data['vat'] = $vat;
        $data['total_premium'] = $data['net_premium'] + $vat;
        $data['policy_start_date'] = $request->policy_start_date;

        // return $data;
        Session::put('invoice_details', $data);
        Session::put('motor', $data);
        session()->put('calculationType', 'motor');

        return view('frontend.product-and-service.motor.calculator_details', $data);
    }

    public function get_motor_tariff(Request $request)
    {
        // dd($request->all());
        $data = [];
        $data['calculator'] = Calculator::find($request->calculator_id);

        $tariff = CalculatorMotorTariffPrice::where('insurance_type', $request->selected_insurance_type)
            ->where('vehicle_category_id', $request->vehicle_category_id)
            ->where('vehicle_type_id', $request->vehicle_type_id)
            ->where('capacity_from', '<=', $request->engine_capacity_cc)
            ->where('capacity_to', '>=', $request->engine_capacity_cc);

        if ($request->vehicle_weight_ton) {

            $tariff = $tariff->where('weight_from', '<=', $request->vehicle_weight_ton)
                ->where('weight_to', '>=', $request->vehicle_weight_ton);
        }

        $tariff = $tariff->where('status', 1)
            ->with('calculatorVehicleCategory', 'calculatorVehicleType')
            ->first();

        $vehicle_type_details = CalculatorVehicleType::where('id', $request->vehicle_type_id)->first();

        $data['alert_message'] = null;

        if (!$tariff || !$vehicle_type_details) {
            return response()->json([
                'status' => false,
                'message' => 'No available insurance!!',
            ]);
        }

        $data['vehicle_price'] = $request->vehicle_price;
        $data['engine_capacity_cc'] = $request->engine_capacity_cc;
        $data['vehicle_weight_ton'] = $request->vehicle_weight_ton;

        $data['covarage_amount'] = 0;
        $data['basic_premium'] = 0;
        $data['fiv_amount'] = 0;

        if ($request->selected_insurance_type != "Act Liability" && $request->covarage != null) {
            $covarage_list = json_decode($request->covarage);

            $data['risk_cover'] = CalculatorRiskCover::whereIn('id', $covarage_list)->get();

            $risk_cover = 0;

            foreach ($data['risk_cover'] as $risk_value) {
                $risk_cover += $risk_value->value;
            }

            $data['covarage_amount'] = round((($request->vehicle_price) * $risk_cover) / 100);
            $data['basic_premium'] = $tariff->price;
            $data['fiv'] = $vehicle_type_details->value . '%';
            $data['fiv_amount'] = $own_damage = round((($request->vehicle_price) * $vehicle_type_details->value) / 100);
        }

        $passanger_driver_price = PassengerPrice::first();

        $data['tariff'] = $tariff;

        $data['own_damage'] = $own_damage = $data['basic_premium'] + $data['fiv_amount'];

        $data['passenger'] = $request->passanger;
        $data['single_passenger_price'] = $passanger_driver_price->passenger_price;
        $data['passenger_price'] = (int)$passanger_driver_price->passenger_price * (int)$request->passanger;

        $data['driver'] = 1;
        $data['driver_type'] = $request->driver_type;

        if ($request->driver_type == 'self') {
            $data['driver_price'] = 1 * $tariff->self_driver;
        } else {
            $data['driver_price'] = 1 * $tariff->paid_driver;
        }

        if ($request->vtss == 'yes') {
            $vts_discounted_amount = 0;

            if ($own_damage > 0) {
                $vts_discounted_amount = $own_damage - $data['covarage_amount'];
            } else {
                $vts_discounted_amount = 1;
            }

            $data['vtss'] = $passanger_driver_price->vts_meter . '%';
            $data['vtss_amount'] = round((($vts_discounted_amount) * $passanger_driver_price->vts_meter) / 100);
        } else {
            $data['vtss'] = 0;
            $data['vtss_amount'] = 0;
        }

        if ($request->tachometer == 'yes') {
            $tac_discounted_amount = 0;

            if ($own_damage > 0) {
                $tac_discounted_amount = $own_damage - $data['covarage_amount'];
            } else {
                $tac_discounted_amount = 1;
            }

            $data['tachometer'] = $passanger_driver_price->tacometer . '%';
            $data['tachometer_amount'] = round((($tac_discounted_amount) * $passanger_driver_price->tacometer) / 100);
        } else {
            $data['tachometer'] = 0;
            $data['tachometer_amount'] = 0;
        }

        $data['certificate_number'] = $request->certificate_number;

        $data['ncb'] = 0;
        $data['loading'] = 0;
        $data['selected_insurance_type'] = $request->selected_insurance_type;
        $data['insurance_first'] = $request->insurance_first;

        if ($request->insurance_first == 'Renewal Insurance') {
            $p_ncb = round(($own_damage * $request->ncb) / 100);
            $p_loading = round(($own_damage * $request->loading) / 100);

            $data['ncb'] = $p_ncb;
            $data['loading'] = $p_loading;
            $data['request_ncb'] = $request->ncb;
            $data['request_loading'] = $request->loading;
        }

        $data['act'] = 0;

        $data['act'] = $tariff->act_liability;

        $data['vat'] = '15%';
        $data['net_premium'] = round($data['own_damage'] - $data['covarage_amount'] + $data['passenger_price'] + $data['driver_price'] - $data['vtss_amount'] - $data['tachometer_amount'] - $data['ncb'] + $data['loading'] + $data['act']);

        $data['vat_amount'] = $vat = round((($data['net_premium']) * 15) / 100);
        $data['vat'] = $vat;
        $data['total_premium'] = $data['net_premium'] + $vat;
        $data['policy_start_date'] = $request->policy_start_date;

        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => $data,
        ]);

    }

}
