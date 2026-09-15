<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Calculator;
use App\Models\CalculatorBuildingConstruction;
use App\Models\CalculatorCountry;
use App\Models\CalculatorEnginCapacity;
use App\Models\CalculatorInsuranceDistrict;
use App\Models\CalculatorMarineInterest;
use App\Models\CalculatorMemberAssociation;
use App\Models\CalculatorPropertyOrOccupationType;
use App\Models\CalculatorVehicleType;
use Illuminate\Http\Request;

class PremiumCalculatorController extends Controller
{
    public function getDistrict()
    {

        $data = CalculatorInsuranceDistrict::where('status', 1)->get();

        if ($data) {
            return response()->json([
                'status' => true,
                'message' => 'Data found',
                'data' => $data,
            ]);
        } else {
            return response()->json([
                'status' => true,
                'message' => 'Data not found',
                'data' => $data,
            ]);
        }
    }

    public function getInsurance()
    {
        $data = Calculator::where('status', 1)->with(
            'calculatorBangabandhuSurakshaBima',
            'calculatorPropertyLocation',
            'calculatorPropertyOrOccupationType',
            'calculatorMemberAssociation',
            'calculatorBuildingConstruction',
            'calculatorInterestType',
            'calculatorAdditionalCoverage.fireCoverageList',
            'calculatorAdditionalCoverage.fireCoverageDistrictList',
            'calculatorBuildingConstructionRoof',
            'calculatorCargoProduct',
            'calculatorTariffType',
            'calculatorCarriedBy',
            'calculatorCountryVisit',
            'calculatorInsuranceSubType',
            'calculatorMotorInsurance',
            'calculatorVehicleCategory.CalculatorVehicleType.CalculatorEnginCapacity',
            'calculatorInstitutionType',
            'calculatorPeoplePersonalAccident',
            'calculatorStrikeRiotCivilCommotion',
            'calculatorCarriedBy.calculatorRiskCoverage.calculatorMarineInterestType',
            'calculatorRiskCover',
            'calculatorInsuranceDistrict'
        )->get();

        if ($data) {
            return response()->json([
                'status' => true,
                'message' => 'Data found',
                'data' => $data,
            ]);
        } else {
            return response()->json([
                'status' => true,
                'message' => 'Data not found',
                'data' => $data,
            ]);
        }

    }

    public function getCountry()
    {
        $data = CalculatorCountry::get();

        if ($data) {
            return response()->json([
                'status' => true,
                'message' => 'Data found',
                'data' => $data,
            ]);
        } else {
            return response()->json([
                'status' => true,
                'message' => 'Data not found',
                'data' => $data,
            ]);
        }

    }

    public function getPropertyOccupationMember($calculator_id)
    {
        $data = [];
        $data['occupation'] = CalculatorPropertyOrOccupationType::where('calculator_id', $calculator_id)->where('status', 1)->get();
        $data['member'] = CalculatorMemberAssociation::where('calculator_id', $calculator_id)->where('status', 1)->get();
        $data['fire'] = Calculator::where('id', $calculator_id)->with('calculatorPropertyLocation')->first();

        return response()->json([
            'status' => true,
            'message' => 'Data found',
            'data' => $data,
        ]);
    }

// public function getMemberByPropertyOccupation($calculator_id,$occupation_id)

// {

//     $data=
    // }

    public function getBuildingConstructionType($calculator_id)
    {
        $data = [];
        $data['buiding_construction'] = CalculatorBuildingConstruction::where('calculator_id', $calculator_id)->where('status', 1)->with('calculatorBuildingConstructionRoof')->get();

        if ($data) {
            return response()->json([
                'status' => true,
                'message' => 'Data found',
                'data' => $data,
            ]);
        } else {
            return response()->json([
                'status' => true,
                'message' => 'Data not found',
                'data' => $data,
            ]);
        }

    }

    public function getInterestType($calculator_id)
    {
        $data = [];
        $data['interest_type'] = Calculator::where('id', $calculator_id)->with('calculatorInterestType')->first();

        if ($data) {
            return response()->json([
                'status' => true,
                'message' => 'Data found',
                'data' => $data,
            ]);
        } else {
            return response()->json([
                'status' => true,
                'message' => 'Data not found',
                'data' => $data,
            ]);
        }

    }

    public function getAdditionalCoverage($calculator_id)
    {
        $data = [];
        $data['additional_coverage'] = Calculator::where('id', $calculator_id)->with('calculatorAdditionalCoverage')->get();

        if ($data) {
            return response()->json([
                'status' => true,
                'message' => 'Data found',
                'data' => $data,
            ]);
        } else {
            return response()->json([
                'status' => true,
                'message' => 'Data not found',
                'data' => $data,
            ]);
        }

    }

    public function getBangabandhuSurokkhaBima($calculator_id)
    {
        $data = [];
        $data['bangabandhu'] = Calculator::where('id', $calculator_id)->with('calculatorBangabandhuSurakshaBima')->first();

        if ($data) {
            return response()->json([
                'status' => true,
                'message' => 'Data found',
                'data' => $data,
            ]);
        } else {
            return response()->json([
                'status' => true,
                'message' => 'Data not found',
                'data' => $data,
            ]);
        }

    }

    public function getCargoProducts($calculator_id)
    {
        $data = [];
        $data['cargo_products'] = Calculator::where('id', $calculator_id)->with('calculatorCargoProduct')->get();

        if ($data) {
            return response()->json([
                'status' => true,
                'message' => 'Data found',
                'data' => $data,
            ]);
        } else {
            return response()->json([
                'status' => true,
                'message' => 'Data not found',
                'data' => $data,
            ]);
        }

    }

    public function getCarriedBy($calculator_id)
    {
        $data = [];
        $data['carried_by'] = Calculator::where('id', $calculator_id)->with('calculatorCarriedBy')->first();

        if ($data) {
            return response()->json([
                'status' => true,
                'message' => 'Data found',
                'data' => $data,
            ]);
        } else {
            return response()->json([
                'status' => true,
                'message' => 'Data not found',
                'data' => $data,
            ]);
        }

    }

    public function getCountryVisit($calculator_id)
    {
        $data = [];
        $data['country_visit'] = Calculator::where('id', $calculator_id)->with('calculatorCountryVisit')->get();

        if ($data) {
            return response()->json([
                'status' => true,
                'message' => 'Data found',
                'data' => $data,
            ]);
        } else {
            return response()->json([
                'status' => true,
                'message' => 'Data not found',
                'data' => $data,
            ]);
        }

    }

    public function getEnginCapacity($calculator_id, $calculator_vehicle_category_id)
    {
        $data = [];
        $data['engine_capacity'] = CalculatorEnginCapacity::where('calculator_vehicle_category_id', $calculator_vehicle_category_id)->with('calculatorVehicleCategory')->get();
        $data['service_calculator'] = Calculator::where('id', $calculator_id)->with('calculatorVehicleCategory')->get();

        return response()->json([
            'status' => true,
            'message' => 'Data found',
            'data' => $data,
        ]);
    }

    public function getInstitutionType($calculator_id)
    {
        $data = [];
        $data['service_calculator'] = Calculator::where('id', $calculator_id)->with('calculatorInstitutionType')->get();

        if ($data) {
            return response()->json([
                'status' => true,
                'message' => 'Data found',
                'data' => $data,
            ]);
        } else {
            return response()->json([
                'status' => true,
                'message' => 'Data not found',
                'data' => $data,
            ]);
        }

    }

    public function getInsuranceDistrict($calculator_id)
    {
        $data = [];
        $data['insurance_districts'] = Calculator::where('id', $calculator_id)->with('calculatorInsuranceDistrict')->get();

        if ($data) {
            return response()->json([
                'status' => true,
                'message' => 'Data found',
                'data' => $data,
            ]);
        } else {
            return response()->json([
                'status' => true,
                'message' => 'Data not found',
                'data' => $data,
            ]);
        }

    }

    public function getInsuranceSubType($calculator_id)
    {
        $data = [];
        $data['insurance_sub_type'] = Calculator::where('id', $calculator_id)->with('calculatorInsuranceSubType')->get();

        if ($data) {
            return response()->json([
                'status' => true,
                'message' => 'Data found',
                'data' => $data,
            ]);
        } else {
            return response()->json([
                'status' => true,
                'message' => 'Data not found',
                'data' => $data,
            ]);
        }

    }

    public function getMemberAssociation($calculator_id)
    {
        $data = [];
        $data['member_association'] = Calculator::where('id', $calculator_id)->with('calculatorMemberAssociation')->get();

        if ($data) {
            return response()->json([
                'status' => true,
                'message' => 'Data found',
                'data' => $data,
            ]);
        } else {
            return response()->json([
                'status' => true,
                'message' => 'Data not found',
                'data' => $data,
            ]);
        }

    }

    public function getMotorInsurance($calculator_id)
    {
        $data = [];
        $data['motor_insurance'] = Calculator::where('id', $calculator_id)->with('calculatorMotorInsurance')->get();

        if ($data) {
            return response()->json([
                'status' => true,
                'message' => 'Data found',
                'data' => $data,
            ]);
        } else {
            return response()->json([
                'status' => true,
                'message' => 'Data not found',
                'data' => $data,
            ]);
        }

    }

    public function getPeoplePersonalAccident($calculator_id)
    {
        $data = [];
        $data['people_personal_accident'] = Calculator::where('id', $calculator_id)->with('calculatorPeoplePersonalAccident')->get();

        if ($data) {
            return response()->json([
                'status' => true,
                'message' => 'Data found',
                'data' => $data,
            ]);
        } else {
            return response()->json([
                'status' => true,
                'message' => 'Data not found',
                'data' => $data,
            ]);
        }

    }

    public function getPropertyLocation($calculator_id)
    {
        $data = [];
        $data['peoperty_location'] = Calculator::where('id', $calculator_id)->with('calculatorPropertyLocation')->get();

        if ($data) {
            return response()->json([
                'status' => true,
                'message' => 'Data found',
                'data' => $data,
            ]);
        } else {
            return response()->json([
                'status' => true,
                'message' => 'Data not found',
                'data' => $data,
            ]);
        }

    }

    public function getPropertyOrOccupationType($calculator_id)
    {
        $data = [];
        $data['property_or_occupation'] = Calculator::where('id', $calculator_id)->with('calculatorPropertyOrOccupationType')->get();

        if ($data) {
            return response()->json([
                'status' => true,
                'message' => 'Data found',
                'data' => $data,
            ]);
        } else {
            return response()->json([
                'status' => true,
                'message' => 'Data not found',
                'data' => $data,
            ]);
        }

    }

    public function getRiskCover($calculator_id)
    {
        $data = [];
        $data['risk_cover'] = Calculator::where('id', $calculator_id)->with('calculatorRiskCover')->get();

        if ($data) {
            return response()->json([
                'status' => true,
                'message' => 'Data found',
                'data' => $data,
            ]);
        } else {
            return response()->json([
                'status' => true,
                'message' => 'Data not found',
                'data' => $data,
            ]);
        }

    }

    public function getStrikeRiotCivilCommotion($calculator_id)
    {
        $data = [];
        $data['strike_riot_civil_commotion'] = Calculator::where('id', $calculator_id)->with('calculatorStrikeRiotCivilCommotion')->get();

        if ($data) {
            return response()->json([
                'status' => true,
                'message' => 'Data found',
                'data' => $data,
            ]);
        } else {
            return response()->json([
                'status' => true,
                'message' => 'Data not found',
                'data' => $data,
            ]);
        }

    }

    public function getTariffType($calculator_id)
    {
        $data = [];
        $data['tarrif_type'] = Calculator::where('id', $calculator_id)->with('calculatorTariffType')->get();

        if ($data) {
            return response()->json([
                'status' => true,
                'message' => 'Data found',
                'data' => $data,
            ]);
        } else {
            return response()->json([
                'status' => true,
                'message' => 'Data not found',
                'data' => $data,
            ]);
        }

    }

    public function getVehicleCategory($calculator_id)
    {
        $data = [];
        $data['vehicle_category'] = Calculator::where('id', $calculator_id)->with('calculatorVehicleCategory')->first();

        if ($data) {
            return response()->json([
                'status' => true,
                'message' => 'Data found',
                'data' => $data,
            ]);
        } else {
            return response()->json([
                'status' => true,
                'message' => 'Data not found',
                'data' => $data,
            ]);
        }

    }

    public function getVehicleType($calculator_id, $calculator_vehicle_category_id)
    {
        $data = [];
        $data['vehicle_type'] = CalculatorVehicleType::where('calculator_vehicle_category_id', $calculator_vehicle_category_id)->with('calculatorVehicleCategory')->get();
        $data['service_calculator'] = Calculator::where('id', $calculator_id)->with('calculatorVehicleCategory')->get();

        return response()->json([
            'status' => true,
            'message' => 'Data found',
            'data' => $data,
        ]);
    }

    public function marineRiskCoverage(Request $request)
    {
        $data = CalculatorMarineInterest::where('calculator_id', $request->calculator_id)->where('risk_coverage_id', $request->risk_id)->where('status', 1)->get();

        return response()->json([
            'status' => true,
            'message' => 'Data found',
            'data' => $data,
        ]);

    }

}
