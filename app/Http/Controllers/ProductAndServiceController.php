<?php

namespace App\Http\Controllers;

use App\Models\Calculator;
use App\Models\CalculatorAdditionalCoverage;
use App\Models\CalculatorBuildingConstruction;
use App\Models\CalculatorBuildingConstructionRoof;
use App\Models\CalculatorCargoProduct;
use App\Models\CalculatorCountry;
use App\Models\CalculatorCountryVisit;
use App\Models\CalculatorInsuranceDistrict;
use App\Models\CalculatorInterestType;
use App\Models\CalculatorMarineInterest;
use App\Models\CalculatorMemberAssociation;
use App\Models\CalculatorPeoplePersonalAccident;
use App\Models\CalculatorPropertyOrOccupationType;
use App\Models\CalculatorRiskCover;
use App\Models\CalculatorVehicleCategory;
use App\Models\CitizenCharter;
use App\Models\Claim;
use App\Models\ClaimMoney;
use App\Models\ItInfrastructure;
use App\Models\ProductServices;
use App\Models\Reinsurance;
use App\Models\ReinsuranceBroker;
use App\Models\ReinsuranceCoverage;
use App\Models\ReinsuranceType;
use App\Models\Underwriting;
use Illuminate\Http\Request;

class ProductAndServiceController extends Controller
{
    public function putSessionPeopleNumber(Request $request)
    {
        session()->put('people_number', $request->people);
    }

    public function productAndService()
    {
        $data = [];
        $data['fire'] = Calculator::first();

        return view('frontend.product-and-service.index', $data);
    }

    public function onlineInsurance()
    {
        return view('frontend.insurance.online_insurance');
    }

    public function fire()
    {
        $data = [];
        $data['fire'] = Calculator::where('id', 1)->with('calculatorPropertyLocation')->first();

        return view('frontend.product-and-service.fire_insurance', $data);
    }

    public function marineCargo()
    {
        $data = [];
        $data['marin'] = Calculator::where('id', 2)->first();

        return view('frontend.product-and-service.marine_cargo', $data);
    }

    public function overseasMediclaim()
    {
        $data = [];
        $data['mediclaim'] = Calculator::where('id', 4)->first();
        $data['countries'] = CalculatorCountry::where('status', 1)->get();

        return view('frontend.product-and-service.overseas_mediclaim', $data);
    }

    public function bangabandhuBima()
    {
        $data = [];
        $data['calculator'] = Calculator::where('id', 7)->first();
        $data['item'] = Calculator::where('id', 7)->where('status', 1)->with('calculatorBangabandhuSurakshaBima')->first();
        session()->put('bongo', $data);
        session()->put('calculationType', 'bongo');

        return view('frontend.product-and-service.bangabandhu_surokkha_bima', $data);
    }

    public function personalAccident()
    {
        $data = [];
        $data['personal'] = Calculator::where('id', 5)->with('calculatorPropertyOrOccupationType')->first();

        return view('frontend.product-and-service.personal_accident_insurance', $data);
    }

    public function motorInsurance()
    {
        $data = [];
        $data['vehicle_category'] = CalculatorVehicleCategory::get();
        $data['motor'] = Calculator::where('id', 3)->with('calculatorRiskCover')->first();

        return view('frontend.product-and-service.motor_insurance', $data);
    }

    public function cashInTransit()
    {
        $data = [];
        $data['cash'] = Calculator::where('id', 10)->where('status', 1)->first();

        return view('frontend.product-and-service.cash_in_transit_insurance', $data);
    }

    public function peoplePersonalAccident()
    {
        $data = [];
        $data['calculator'] = Calculator::where('id', 6)->first();
        $data['people'] = Calculator::where('id', 6)->where('status', 1)->with('calculatorPeoplePersonalAccident')->first();
        session()->put('type', 1);
        session()->put('people', $data);
        session()->put('calculationType', 'people');

        return view('frontend.product-and-service.people_personal_accident_insurance', $data);
    }

    public function cashInSafe()
    {
        $data = [];
        $data['safe'] = Calculator::find(9);

        return view('frontend.product-and-service.cash_in_safe_insurance', $data);
    }

    public function cashOnCounter()
    {
        $data = [];
        $data['cash_on_counter'] = Calculator::where('id', 11)->where('status', 1)->first();

        return view('frontend.product-and-service.cash_on_counter_insurance', $data);
    }

    public function boilerInsurance()
    {
        $data = [];
        $data['boiler'] = Calculator::where('id', 12)->first();

        return view('frontend.product-and-service.boiler_insurance', $data);
    }

    public function flatApartmentInsurance()
    {
        $data = [];
        // $data['fire']           = Calculator::where('id', 8)->with('calculatorPropertyLocation')->first();
        $data['flat_apartment'] = Calculator::where('id', 8)->first();
        $data['districts'] = CalculatorInsuranceDistrict::where('status', 1)->get();

        return view('frontend.product-and-service.flat_apartment_owner_insurance', $data);
    }

    public function underwriting()
    {
        $data['underwriting'] = Underwriting::first();

        return view('frontend.product-and-service.underwriting', $data);
    }

    public function reinsurance()
    {
        $data['reinsurance'] = Reinsurance::first();
        $data['reinsurance_type'] = ReinsuranceType::get();
        $data['reinsurance_coverage_first'] = ReinsuranceCoverage::take(10)->get();
        $data['reinsurance_coverage_last'] = ReinsuranceCoverage::skip(10)->take(9)->get();
        $data['reinsurance_broker'] = ReinsuranceBroker::get();

        return view('frontend.product-and-service.reinsurance', $data);
    }

    public function claim()
    {
        $data['claim'] = Claim::first();
        $data['claim_money'] = ClaimMoney::get();

        return view('frontend.product-and-service.claim', $data);
    }

    public function citizenCharter()
    {
        $data = [];
        $data['citizen_charter'] = CitizenCharter::first();

        return view('frontend.product-and-service.citizen_charter', $data);
    }

    public function itInfrastructure()
    {

        $data = [];
        $data['it_infrastructure'] = ItInfrastructure::first();

        return view('frontend.product-and-service.it_infrastructure', $data);
    }

    public function miscellaneousInsurance()
    {
        $data = [];
        $data['product_service'] = ProductServices::where('id', 16)->with('coverage')->first();

        return view('frontend.insurance.miscellaneous-details', $data);
    }

    public function engineeringInsurance()
    {
        $data = [];
        $data['product_service'] = ProductServices::where('id', 15)->with('coverage')->first();

        return view('frontend.insurance.engineering-details', $data);
    }

    public function fireInsurance()
    {
        $data = [];
        $data['product_service'] = ProductServices::where('id', 2)->with('coverage')->first();

        return view('frontend.insurance.fire-details', $data);
    }

    public function motorInsuranceDetails()
    {
        $data = [];
        $data['product_service'] = ProductServices::where('id', 14)->with('coverage')->first();

        return view('frontend.insurance.motor-details', $data);
    }

    public function marineInsurance()
    {
        $data = [];
        $data['product_service'] = ProductServices::where('id', 3)->with('coverage')->first();
        $data['product_service_twice'] = ProductServices::where('id', 4)->first();

        return view('frontend.insurance.marine-cargo-details', $data);
    }

    public function insurance()
    {
        $data = [];
        $data['product_service'] = ProductServices::all();

        return view('frontend.product-and-service.insurance', $data);
    }

    //ajax request method
    public function propertyOrOccupationAndMember(Request $request)
    {
        $data = [];
        $data['occupation'] = CalculatorPropertyOrOccupationType::where('calculator_id', $request->calculator_id)->where('status', 1)->get();
        $data['member'] = CalculatorMemberAssociation::where('calculator_id', $request->calculator_id)->where('status', 1)->get();
        $data['fire'] = Calculator::where('id', 1)->with('calculatorPropertyLocation')->first();

        return view('frontend.product-and-service.ajax_request.property_occupation_member', $data);

    }

    public function getInterestType(Request $request)
    {
        $interest = CalculatorInterestType::where('calculator_id', $request->calculator_id)->where('occupation_id', $request->property_occupation_id)->where('status', 1)->get();

        return view('frontend.product-and-service.ajax_request.interest-type', compact('interest'));
    }

    public function constructionType(Request $request)
    {
        $data = [];
        $data['construction'] = CalculatorBuildingConstruction::where('calculator_id', $request->calculator_id)->where('status', 1)->with('calculatorBuildingConstructionRoof')->get();
        $data['interest'] = CalculatorInterestType::where('calculator_id', $request->calculator_id)->where('status', 1)->get();
        $data['coverage'] = CalculatorAdditionalCoverage::where('calculator_id', $request->calculator_id)->where('status', 1)->get();

        return view('frontend.product-and-service.ajax_request.construction_type', $data);

    }

    public function constructionRoofType(Request $request)
    {
        $construction = CalculatorBuildingConstructionRoof::where('calculator_id', $request->calculator_id)->where('calculator_building_construction_id', $request->construction_id)->get();

        return view('frontend.product-and-service.ajax_request.roof_type', compact('construction'));
    }

    public function carriedbyRiskCover(Request $request)
    {
        $risk = CalculatorRiskCover::where('calculator_id', $request->calculator_id)->where('carried_by_id', $request->carriedby_id)->get();

        return view('frontend.product-and-service.ajax_request.carried_by_risk_coverage', compact('risk'));
    }

    public function omCountries()
    {
        $country = CalculatorCountryVisit::where('calculator_id', 4)->where('status', 1)->get();

        return $country;
    }

    public function marineRiskCoverage(Request $request)
    {
        $data = CalculatorMarineInterest::where('calculator_id', $request->calculator_id)->where('risk_coverage_id', $request->risk_id)->where('status', 1)->get();

        if ($data->count() > 0) {
            return view('frontend.product-and-service.ajax_request.marine-interest', compact('data'));
        } else {
            return;
        }

    }

    public function ajaxPeoplePersonalAccident(Request $request)
    {
        $people = CalculatorPeoplePersonalAccident::find($request->id);
        $data = Calculator::find(6);
        session()->put('type', 2);

        return view('frontend.product-and-service.ajax_request.personal-accident', compact('people', 'data'));
    }

    public function getCargoProductDetails($id)
    {
        $data = CalculatorCargoProduct::find($id);

        return $data;
    }

}
