<?php

namespace App\Http\Controllers\Backend;

use App\Helper\ImageUpload;
use App\Http\Controllers\Controller;
use App\Models\CalculationFireAdditionalCoverage;
use App\Models\CalculationFireAdditionalSubcoverage;
use App\Models\CalculationFireInterestTeriff;
use App\Models\Calculator;
use App\Models\CalculatorAdditionalCoverage;
use App\Models\CalculatorBangabandhuSurakshaBima;
use App\Models\CalculatorBoilerTeriff;
use App\Models\CalculatorBuildingConstruction;
use App\Models\CalculatorBuildingConstructionRoof;
use App\Models\CalculatorCargoProduct;
use App\Models\CalculatorCarriedBy;
use App\Models\CalculatorCashInSafeTeriff;
use App\Models\CalculatorCountry;
use App\Models\CalculatorCountryVisit;
use App\Models\CalculatorEnginCapacity;
use App\Models\CalculatorFlatTeriff;
use App\Models\CalculatorInstitutionType;
use App\Models\CalculatorInsuranceDistrict;
use App\Models\CalculatorInsuranceSubType;
use App\Models\CalculatorInsuredCity;
use App\Models\CalculatorInterestType;
use App\Models\CalculatorMarineInterest;
use App\Models\CalculatorMemberAssociation;
use App\Models\CalculatorMotorInsurance;
use App\Models\CalculatorPeoplePersonalAccident;
use App\Models\CalculatorPersonalAccidentTeriff;
use App\Models\CalculatorPropertyLocation;
use App\Models\CalculatorPropertyOrOccupationType;
use App\Models\CalculatorRiskCover;
use App\Models\CalculatorStrikeRiotCivilCommotion;
use App\Models\CalculatorTariffType;
use App\Models\CalculatorVehicleCategory;
use App\Models\CalculatorVehicleType;
use App\Models\MerinTeriff;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PremiumCalculatorManagementController extends Controller {
    //fire additional subcoverage Starts

    public function createFireAdditionalSubcoverage() {
        $data                        = [];
        $data['additional_coverage'] = CalculatorAdditionalCoverage::where('calculator_id', 1)->get();
        $data['district']            = CalculatorInsuranceDistrict::where('calculator_id', 1)->where('status', 1)->get();

        return view('backend.calculator.fire-additional-subcoverage.create', $data);
    }

    public function indexFireAdditionalSubcoverage() {
        $data            = [];
        $data['teriffs'] = CalculationFireAdditionalSubcoverage::all();

        return view('backend.calculator.fire-additional-subcoverage.index', $data);
    }

    public function StoreFireAdditionalSubcoverage(Request $request) {

        $calculator                         = new CalculationFireAdditionalSubcoverage();
        $calculator->additional_coverage_id = $request->additional_coverage_id;
        $calculator->en_name                = $request->en_name;
        $calculator->bn_name                = $request->bn_name;
        $calculator->type                   = $request->type;
        $calculator->is_fixed               = $request->is_fixed;
        $calculator->district_id            = $request->district_id;

        $calculator->save();

        return to_route('admin.calculator.indexFireAdditionalSubcoverage.index')->with('message', 'Data Inserted Successfully');
    }

    public function editFireAdditionalSubcoverage($id) {
        $data                        = [];
        $data['teriff']              = CalculationFireAdditionalSubcoverage::where('id', $id)->first();
        $data['additional_coverage'] = CalculatorAdditionalCoverage::where('calculator_id', 1)->get();
        $data['district']            = CalculatorInsuranceDistrict::where('calculator_id', 1)->where('status', 1)->get();

        return view('backend.calculator.fire-additional-subcoverage.edit', $data);
    }

    public function updateFireAdditionalSubcoverage(Request $request, $id) {
        $calculator                         = CalculationFireAdditionalSubcoverage::find($id);
        $calculator->additional_coverage_id = $request->additional_coverage_id;
        $calculator->en_name                = $request->en_name;
        $calculator->bn_name                = $request->bn_name;
        $calculator->type                   = $request->type;
        $calculator->is_fixed               = $request->is_fixed;
        $calculator->district_id            = $request->district_id;

        $calculator->save();

        return to_route('admin.calculator.indexFireAdditionalSubcoverage.index')->with('message', 'Data Updated Successfully');
    }

    public function statusFireAdditionalSubcoverage($id) {
        $changeStatus         = CalculationFireAdditionalSubcoverage::find($id);
        $changeStatus->status = $changeStatus->status == 1 ? '0' : '1';
        $changeStatus->save();

        return back()->with('message', 'Status Changed Successfully');
    }

    public function defaultFireAdditionalSubcoverage($id) {
        $changeStatus           = CalculationFireAdditionalSubcoverage::find($id);
        $changeStatus->is_fixed = $changeStatus->is_fixed == 1 ? '0' : '1';
        $changeStatus->save();

        return back()->with('message', 'Status Changed Successfully');
    }

    public function detailsFireAdditionalSubcoverage($id) {
        $data               = [];
        $data['calculator'] = Calculator::find($id);

        return view('backend.calculator.cash-in-safe-teriff.details', $data);
    }

//fire ADDITIONAL subcoverage ends

    //fire additional coverage Starts

    public function createFireAdditionalCoverage() {
        $data                        = [];
        $data['additional_coverage'] = CalculatorAdditionalCoverage::where('calculator_id', 1)->get();
        $data['property_location']   = CalculatorPropertyLocation::where('calculator_id', 1)->where('status', 1)->get();
        $data['building']            = CalculatorBuildingConstruction::where('calculator_id', 1)->where('status', 1)->get();
        $data['member']              = CalculatorMemberAssociation::where('calculator_id', 1)->where('status', 1)->get();
        $data['district']            = CalculatorInsuranceDistrict::where('status', 1)->get();

        return view('backend.calculator.fire-additional-coverage.create', $data);
    }

    public function indexFireAdditionalCoverage() {
        $data            = [];
        $data['teriffs'] = CalculationFireAdditionalCoverage::all();

        return view('backend.calculator.fire-additional-coverage.index', $data);
    }

    public function StoreFireAdditionalCoverage(Request $request) {

        $calculator                            = new CalculationFireAdditionalCoverage();
        $calculator->additional_coverage_id    = $request->additional_coverage_id;
        $calculator->location_id               = $request->location_id;
        $calculator->building_construction_id  = $request->building_construction_id;
        $calculator->member_id                 = $request->member_id;
        $calculator->value                     = $request->value;
        $calculator->additional_subcoverage_id = $request->additional_subcoverage_id;
        $calculator->district_id               = $request->district_id;

        $calculator->save();

        return to_route('admin.calculator.indexFireAdditionalCoverage.index')->with('message', 'Data Inserted Successfully');
    }

    public function editFireAdditionalCoverage($id) {
        $data                        = [];
        $data['teriff']              = $t              = CalculationFireAdditionalCoverage::where('id', $id)->first();
        $data['additional_coverage'] = CalculatorAdditionalCoverage::where('calculator_id', 1)->get();
        $data['property_location']   = CalculatorPropertyLocation::where('calculator_id', 1)->where('status', 1)->get();
        $data['building']            = CalculatorBuildingConstruction::where('calculator_id', 1)->where('status', 1)->get();
        $data['member']              = CalculatorMemberAssociation::where('calculator_id', 1)->where('status', 1)->get();
        $data['subcoverage']         = CalculationFireAdditionalSubcoverage::where('additional_coverage_id', $t->additional_coverage_id)->where('status', 1)->get();
        $data['district']            = CalculatorInsuranceDistrict::where('status', 1)->get();

        return view('backend.calculator.fire-additional-coverage.edit', $data);
    }

    public function updateFireAdditionalCoverage(Request $request, $id) {
        $calculator                            = CalculationFireAdditionalCoverage::find($id);
        $calculator->additional_coverage_id    = $request->additional_coverage_id;
        $calculator->location_id               = $request->location_id;
        $calculator->building_construction_id  = $request->building_construction_id;
        $calculator->member_id                 = $request->member_id;
        $calculator->value                     = $request->value;
        $calculator->additional_subcoverage_id = $request->additional_subcoverage_id;
        $calculator->district_id               = $request->district_id;

        $calculator->save();

        return to_route('admin.calculator.indexFireAdditionalCoverage.index')->with('message', 'Data Updated Successfully');
    }

    public function statusFireAdditionalCoverage($id) {
        $changeStatus         = CalculationFireAdditionalCoverage::find($id);
        $changeStatus->status = $changeStatus->status == 1 ? '0' : '1';
        $changeStatus->save();

        return back()->with('message', 'Status Changed Successfully');
    }

    public function fireAdditionalSubcoverage($id) {
        $data = CalculationFireAdditionalSubcoverage::where('additional_coverage_id', $id)->where('status', 1)->get();

        $html = '';

        foreach ($data as $item) {
            $html .= '<option value="' . $item->id . '">' . $item->en_name . '</option>';
        }

        return $html;
    }

    public function detailsFireAdditionalCoverage($id) {
        $data               = [];
        $data['calculator'] = Calculator::find($id);

        return view('backend.calculator.cash-in-safe-teriff.details', $data);
    }

//fire ADDITIONAL coverage ends

    //fire interest teriff Starts

    public function createFireInterestTeriff() {
        $data                       = [];
        $data['property_location']  = CalculatorPropertyLocation::where('calculator_id', 1)->where('status', 1)->get();
        $data['property_type']      = CalculatorPropertyOrOccupationType::where('calculator_id', 1)->where('status', 1)->get();
        $data['building']           = CalculatorBuildingConstruction::where('calculator_id', 1)->where('status', 1)->get();
        $data['interest']           = CalculatorInterestType::where('status', 1)->get();
        $data['member_association'] = CalculatorMemberAssociation::where('calculator_id', 1)->get();

        return view('backend.calculator.fire-interest-teriff.create', $data);
    }

    public function indexFireInterestTeriff() {
        $data            = [];
        $data['teriffs'] = CalculationFireInterestTeriff::all();

        return view('backend.calculator.fire-interest-teriff.index', $data);
    }

    public function StoreFireInterestTeriff(Request $request) {

        $calculator                           = new CalculationFireInterestTeriff();
        $calculator->location_id              = $request->location_id;
        $calculator->member_association_id    = $request->member_association_id;
        $calculator->building_construction_id = $request->building_construction_id;
        $calculator->interest_id              = $request->interest_id;
        $calculator->value                    = $request->value;

        $calculator->save();

        return to_route('admin.calculator.indexFireInterestTeriff.index')->with('message', 'Data Inserted Successfully');
    }

    public function editFireInterestTeriff($id) {
        $data                       = [];
        $data['teriff']             = CalculationFireInterestTeriff::where('id', $id)->first();
        $data['property_location']  = CalculatorPropertyLocation::where('calculator_id', 1)->where('status', 1)->get();
        $data['occupation_type']    = CalculatorPropertyOrOccupationType::where('calculator_id', 1)->where('status', 1)->get();
        $data['type']               = CalculationFireInterestTeriff::find($id);
        $data['building']           = CalculatorBuildingConstruction::where('calculator_id', 1)->where('status', 1)->get();
        $data['interest']           = CalculatorInterestType::where('status', 1)->get();
        $data['member_association'] = CalculatorMemberAssociation::where('calculator_id', 1)->get();

        return view('backend.calculator.fire-interest-teriff.edit', $data);
    }

    public function updateFireInterestTeriff(Request $request, $id) {
        $calculator                           = CalculationFireInterestTeriff::find($id);
        $calculator->location_id              = $request->location_id;
        $calculator->member_association_id    = $request->member_association_id;
        $calculator->building_construction_id = $request->building_construction_id;
        $calculator->interest_id              = $request->interest_id;
        $calculator->value                    = $request->value;

        $calculator->save();

        return to_route('admin.calculator.indexFireInterestTeriff.index')->with('message', 'Data Updated Successfully');
    }

    public function statusFireInterestTeriff($id) {
        $changeStatus         = CalculationFireInterestTeriff::find($id);
        $changeStatus->status = $changeStatus->status == 1 ? '0' : '1';
        $changeStatus->save();

        return back()->with('message', 'Status Changed Successfully');
    }

    public function fireInterestType($id) {
        $data = CalculatorInterestType::where('occupation_id', $id)->where('status', 1)->get();

        $html = '';

        foreach ($data as $item) {
            $html .= '<option value="' . $item->id . '">' . $item->en_name . '</option>';
        }

        return $html;
    }

    public function detailsFireInterestTeriff($id) {
        $data               = [];
        $data['calculator'] = Calculator::find($id);

        return view('backend.calculator.cash-in-safe-teriff.details', $data);
    }

//fire interest teriff ends

    //merin teriff Starts

    public function createMarineInterest() {
        $data                  = [];
        $data['risk_coverage'] = CalculatorRiskCover::where('calculator_id', 2)->where('status', 1)->get();

        return view('backend.calculator.marine-interest.create', $data);
    }

    public function indexMarineInterest() {
        $data            = [];
        $data['teriffs'] = CalculatorMarineInterest::where('calculator_id', 2)->get();

        return view('backend.calculator.marine-interest.index', $data);
    }

    public function StoreMarineInterest(Request $request) {

        $calculator                   = new CalculatorMarineInterest();
        $calculator->calculator_id    = $request->calculator_id;
        $calculator->risk_coverage_id = $request->risk_coverage_id;
        $calculator->en_name          = $request->en_name;
        $calculator->bn_name          = $request->bn_name;
        $calculator->value            = $request->value;

        $calculator->save();

        return to_route('admin.calculator.indexMarineInterest.index')->with('message', 'Data Inserted Successfully');
    }

    public function editMarineInterest($id) {
        $data                  = [];
        $data['teriff']        = CalculatorMarineInterest::where('id', $id)->first();
        $data['risk_coverage'] = CalculatorRiskCover::where('calculator_id', 2)->where('status', 1)->get();

        return view('backend.calculator.marine-interest.edit', $data);
    }

    public function updateMarineInterest(Request $request, $id) {
        $calculator                   = CalculatorMarineInterest::find($id);
        $calculator->calculator_id    = $request->calculator_id;
        $calculator->risk_coverage_id = $request->risk_coverage_id;
        $calculator->en_name          = $request->en_name;
        $calculator->bn_name          = $request->bn_name;
        $calculator->value            = $request->value;

        $calculator->save();

        return to_route('admin.calculator.indexMarineInterest.index')->with('message', 'Data Updated Successfully');
    }

    public function statusMarineInterest($id) {
        $changeStatus         = CalculatorMarineInterest::find($id);
        $changeStatus->status = $changeStatus->status == 1 ? '0' : '1';
        $changeStatus->save();

        return back()->with('message', 'Status Changed Successfully');
    }

    public function detailsMarineInterest($id) {
        $data               = [];
        $data['calculator'] = Calculator::find($id);

        return view('backend.calculator.personal-accident-teriff.details', $data);
    }

    //merin teriff Starts

    public function createMarineTeriff() {
        $data                       = [];
        $data['cargo_product']      = CalculatorCargoProduct::where('calculator_id', 2)->where('status', 1)->get();
        $data['member_association'] = CalculatorMemberAssociation::where('calculator_id', 2)->where('status', 1)->get();
        $data['teriff_type']        = CalculatorTariffType::where('calculator_id', 2)->where('status', 1)->get();
        $data['carried_by']         = CalculatorCarriedBy::where('calculator_id', 2)->where('status', 1)->get();

        return view('backend.calculator.marine-teriff.create', $data);
    }

    public function indexMarineTeriff() {
        $data            = [];
        $data['teriffs'] = MerinTeriff::get();

        return view('backend.calculator.marine-teriff.index', $data);
    }

    public function StoreMarineTeriff(Request $request) {

        $calculator                   = new MerinTeriff();
        $calculator->cargo_product_id = $request->cargo_product_id;
        $calculator->member_id        = $request->member_id;
        $calculator->teriff_id        = $request->teriff_id;
        $calculator->carried_by_id    = $request->carried_by_id;
        $calculator->risk_cover_id    = $request->risk_cover_id;
        $calculator->interest_type_id = $request->interest_type_id;
        $calculator->status           = $request->status;
        $calculator->value            = $request->value;

        $calculator->save();

        return to_route('admin.calculator.indexMarineTeriff.index')->with('message', 'Data Inserted Successfully');
    }

    public function editMarineTeriff($id) {
        $data                       = [];
        $data['teriff']             = $rr             = MerinTeriff::where('id', $id)->first();
        $data['cargo_product']      = CalculatorCargoProduct::where('calculator_id', 2)->where('status', 1)->get();
        $data['member_association'] = CalculatorMemberAssociation::where('calculator_id', 2)->where('status', 1)->get();
        $data['teriff_type']        = CalculatorTariffType::where('calculator_id', 2)->where('status', 1)->get();
        $data['carried_by']         = CalculatorCarriedBy::where('calculator_id', 2)->where('status', 1)->get();
        $data['risk_cover']         = CalculatorRiskCover::where('carried_by_id', $rr->carried_by_id)->where('status', 1)->get();
        $data['interest_type']      = CalculatorMarineInterest::where('risk_coverage_id', $rr->risk_cover_id)->where('status', 1)->get();

        return view('backend.calculator.marine-teriff.edit', $data);
    }

    public function updateMarineTeriff(Request $request, $id) {
        $calculator                   = MerinTeriff::find($id);
        $calculator->cargo_product_id = $request->cargo_product_id;
        $calculator->member_id        = $request->member_id;
        $calculator->teriff_id        = $request->teriff_id;
        $calculator->carried_by_id    = $request->carried_by_id;
        $calculator->risk_cover_id    = $request->risk_cover_id;
        $calculator->interest_type_id = $request->interest_type_id;
        $calculator->status           = $request->status;
        $calculator->value            = $request->value;

        $calculator->save();

        return to_route('admin.calculator.indexMarineTeriff.index')->with('message', 'Data Updated Successfully');
    }

    public function statusMarineTeriff($id) {
        $changeStatus         = MerinTeriff::find($id);
        $changeStatus->status = $changeStatus->status == 1 ? '0' : '1';
        $changeStatus->save();

        return back()->with('message', 'Status Changed Successfully');
    }

    public function detailsMarineTeriff($id) {
        $data               = [];
        $data['calculator'] = Calculator::find($id);

        return view('backend.calculator.personal-accident-teriff.details', $data);
    }

//personal accident teriff ends

    //personal teriff Starts

    public function createPersonalAccidentTeriff() {
        $data                  = [];
        $data['occupation']    = CalculatorPropertyOrOccupationType::where('calculator_id', 5)->where('status', 1)->get();
        $data['risk_coverage'] = CalculatorRiskCover::where('calculator_id', 5)->where('status', 1)->get();

        return view('backend.calculator.personal-accident-teriff.create', $data);
    }

    public function indexPersonalAccidentTeriff() {
        $data            = [];
        $data['teriffs'] = CalculatorPersonalAccidentTeriff::where('calculator_id', 5)->get();

        return view('backend.calculator.personal-accident-teriff.index', $data);
    }

    public function StorePersonalAccidentTeriff(Request $request) {

        $calculator                   = new CalculatorPersonalAccidentTeriff();
        $calculator->calculator_id    = $request->calculator_id;
        $calculator->occupation_id    = $request->occupation_id;
        $calculator->risk_coverage_id = $request->risk_coverage_id;
        $calculator->medical_benefits = $request->medical_benefits;
        $calculator->value            = $request->value;
        $calculator->price_limit      = $request->price_limit;
        $calculator->amount_limit     = $request->amount_limit;
        $calculator->next_price_limit = $request->next_price_limit;
        $calculator->next_amount      = $request->next_amount;
        $calculator->teriff_code      = $request->teriff_code;

        $calculator->save();

        return to_route('admin.calculator.indexPersonalAccidentTeriff.index')->with('message', 'Data Inserted Successfully');
    }

    public function editPersonalAccidentTeriff($id) {
        $data                  = [];
        $data['teriff']        = CalculatorPersonalAccidentTeriff::where('id', $id)->first();
        $data['occupation']    = CalculatorPropertyOrOccupationType::where('calculator_id', 5)->where('status', 1)->get();
        $data['risk_coverage'] = CalculatorRiskCover::where('calculator_id', 5)->where('status', 1)->get();

        return view('backend.calculator.personal-accident-teriff.edit', $data);
    }

    public function updatePersonalAccidentTeriff(Request $request, $id) {
        $calculator                   = CalculatorPersonalAccidentTeriff::find($id);
        $calculator->calculator_id    = $request->calculator_id;
        $calculator->occupation_id    = $request->occupation_id;
        $calculator->risk_coverage_id = $request->risk_coverage_id;
        $calculator->medical_benefits = $request->medical_benefits;
        $calculator->value            = $request->value;
        $calculator->price_limit      = $request->price_limit;
        $calculator->amount_limit     = $request->amount_limit;
        $calculator->next_price_limit = $request->next_price_limit;
        $calculator->next_amount      = $request->next_amount;
        $calculator->teriff_code      = $request->teriff_code;

        $calculator->save();

        return to_route('admin.calculator.indexPersonalAccidentTeriff.index')->with('message', 'Data Updated Successfully');
    }

    public function statusPersonalAccidentTeriff($id) {
        $changeStatus         = CalculatorPersonalAccidentTeriff::find($id);
        $changeStatus->status = $changeStatus->status == 1 ? '0' : '1';
        $changeStatus->save();

        return back()->with('message', 'Status Changed Successfully');
    }

    public function detailsPersonalAccidentTeriff($id) {
        $data               = [];
        $data['calculator'] = Calculator::find($id);

        return view('backend.calculator.personal-accident-teriff.details', $data);
    }

//personal accident teriff ends

    //flat teriff Starts

    public function createFlatTeriff() {
        $data                  = [];
        $data['district']      = CalculatorInsuranceDistrict::where('status', 1)->get();
        $data['location']      = CalculatorPropertyLocation::where('calculator_id', 8)->where('status', 1)->get();
        $data['risk_coverage'] = CalculatorRiskCover::where('calculator_id', 8)->where('status', 1)->get();

        return view('backend.calculator.flat-teriff.create', $data);
    }

    public function indexFlatTeriff() {
        $data            = [];
        $data['teriffs'] = CalculatorFlatTeriff::where('calculator_id', 8)->get();

        return view('backend.calculator.flat-teriff.index', $data);
    }

    public function StoreFlatTeriff(Request $request) {

        $calculator                   = new CalculatorFlatTeriff();
        $calculator->calculator_id    = $request->calculator_id;
        $calculator->district_id      = $request->district_id;
        $calculator->location_id      = $request->location_id;
        $calculator->risk_coverage_id = $request->risk_coverage_id;
        $calculator->value            = $request->value;
        $calculator->teriff_code      = $request->teriff_code;

        $calculator->save();

        return to_route('admin.calculator.indexFlatTeriff.index')->with('message', 'Data Inserted Successfully');
    }

    public function editFlatTeriff($id) {
        $data                  = [];
        $data['teriff']        = CalculatorFlatTeriff::where('id', $id)->first();
        $data['district']      = CalculatorInsuranceDistrict::where('status', 1)->get();
        $data['location']      = CalculatorPropertyLocation::where('calculator_id', 8)->where('status', 1)->get();
        $data['risk_coverage'] = CalculatorRiskCover::where('calculator_id', 8)->where('status', 1)->get();

        return view('backend.calculator.flat-teriff.edit', $data);
    }

    public function updateFlatTeriff(Request $request, $id) {
        $calculator                   = CalculatorFlatTeriff::find($id);
        $calculator->calculator_id    = $request->calculator_id;
        $calculator->district_id      = $request->district_id;
        $calculator->location_id      = $request->location_id;
        $calculator->risk_coverage_id = $request->risk_coverage_id;
        $calculator->value            = $request->value;
        $calculator->teriff_code      = $request->teriff_code;

        $calculator->save();

        return to_route('admin.calculator.indexFlatTeriff.index')->with('message', 'Data Updated Successfully');
    }

    public function statusFlatTeriff($id) {
        $changeStatus         = CalculatorFlatTeriff::find($id);
        $changeStatus->status = $changeStatus->status == 1 ? '0' : '1';
        $changeStatus->save();

        return back()->with('message', 'Status Changed Successfully');
    }

    public function detailsFlatTeriff($id) {
        $data               = [];
        $data['calculator'] = Calculator::find($id);

        return view('backend.calculator.personal-accident-teriff.details', $data);
    }

//personal accident teriff ends
    //cash in safe teriff Starts

    public function createCashInSafeTeriff() {
        $data                      = [];
        $data['institution']       = CalculatorInstitutionType::where('calculator_id', 9)->where('status', 1)->get();
        $data['property_location'] = CalculatorPropertyLocation::where('calculator_id', 9)->where('status', 1)->get();
        $data['srcc']              = CalculatorStrikeRiotCivilCommotion::where('calculator_id', 9)->where('status', 1)->get();
        $data['building']          = CalculatorBuildingConstruction::where('calculator_id', 9)->where('status', 1)->get();

        return view('backend.calculator.cash-in-safe-teriff.create', $data);
    }

    public function indexCashInSafeTeriff() {
        $data            = [];
        $data['teriffs'] = CalculatorCashInSafeTeriff::where('calculator_id', 9)->get();

        return view('backend.calculator.cash-in-safe-teriff.index', $data);
    }

    public function StoreCashInSafeTeriff(Request $request) {

        $calculator                                      = new CalculatorCashInSafeTeriff();
        $calculator->calculator_id                       = $request->calculator_id;
        $calculator->calculator_institute_type_id        = $request->calculator_institute_type_id;
        $calculator->calculator_property_location_id     = $request->calculator_property_location_id;
        $calculator->srcc_id                             = $request->srcc_id;
        $calculator->calculator_building_construction_id = $request->calculator_building_construction_id;
        $calculator->value                               = $request->value;

        $calculator->save();

        return to_route('admin.calculator.indexCashInSafeTeriff.index')->with('message', 'Data Inserted Successfully');
    }

    public function editCashInSafeTeriff($id) {
        $data                      = [];
        $data['teriff']            = CalculatorCashInSafeTeriff::where('id', $id)->first();
        $data['institution']       = CalculatorInstitutionType::where('calculator_id', 9)->where('status', 1)->get();
        $data['property_location'] = CalculatorPropertyLocation::where('calculator_id', 9)->where('status', 1)->get();
        $data['srcc']              = CalculatorStrikeRiotCivilCommotion::where('calculator_id', 9)->where('status', 1)->get();
        $data['building']          = CalculatorBuildingConstruction::where('calculator_id', 9)->where('status', 1)->get();

        return view('backend.calculator.cash-in-safe-teriff.edit', $data);
    }

    public function updateCashInSafeTeriff(Request $request, $id) {
        $calculator                                      = CalculatorCashInSafeTeriff::find($id);
        $calculator->calculator_id                       = $request->calculator_id;
        $calculator->calculator_institute_type_id        = $request->calculator_institute_type_id;
        $calculator->calculator_property_location_id     = $request->calculator_property_location_id;
        $calculator->srcc_id                             = $request->srcc_id;
        $calculator->calculator_building_construction_id = $request->calculator_building_construction_id;
        $calculator->value                               = $request->value;

        $calculator->save();

        return to_route('admin.calculator.indexCashInSafeTeriff.index')->with('message', 'Data Updated Successfully');
    }

    public function statusCashInSafeTeriff($id) {
        $changeStatus         = CalculatorCashInSafeTeriff::find($id);
        $changeStatus->status = $changeStatus->status == 1 ? '0' : '1';
        $changeStatus->save();

        return back()->with('message', 'Status Changed Successfully');
    }

    public function detailsCashInSafeTeriff($id) {
        $data               = [];
        $data['calculator'] = Calculator::find($id);

        return view('backend.calculator.cash-in-safe-teriff.details', $data);
    }

//cash in safe teriff ends

    //cash in transit teriff Starts

    public function createCashInTransitTeriff() {
        $data                = [];
        $data['institution'] = CalculatorInstitutionType::where('calculator_id', 10)->where('status', 1)->get();
        $data['srcc']        = CalculatorStrikeRiotCivilCommotion::where('calculator_id', 10)->where('status', 1)->get();

        return view('backend.calculator.cash-in-transit-teriff.create', $data);
    }

    public function indexCashInTransitTeriff() {
        $data            = [];
        $data['teriffs'] = CalculatorCashInSafeTeriff::where('calculator_id', 10)->get();

        return view('backend.calculator.cash-in-transit-teriff.index', $data);
    }

    public function StoreCashInTransitTeriff(Request $request) {

        $calculator                               = new CalculatorCashInSafeTeriff();
        $calculator->calculator_id                = $request->calculator_id;
        $calculator->calculator_institute_type_id = $request->calculator_institute_type_id;
        $calculator->srcc_id                      = $request->srcc_id;
        $calculator->turnover_up_to               = $request->turnover_up_to;
        $calculator->turnover_up_to_value         = $request->turnover_up_to_value;
        $calculator->turnover_for_over            = $request->turnover_for_over;
        $calculator->turnover_for_over_value      = $request->turnover_for_over_value;
        $calculator->armored                      = $request->armored;

        $calculator->save();

        return to_route('admin.calculator.indexCashInTransitTeriff.index')->with('message', 'Data Inserted Successfully');
    }

    public function editCashInTransitTeriff($id) {
        $data                = [];
        $data['teriff']      = CalculatorCashInSafeTeriff::where('id', $id)->first();
        $data['institution'] = CalculatorInstitutionType::where('calculator_id', 10)->where('status', 1)->get();
        $data['srcc']        = CalculatorStrikeRiotCivilCommotion::where('calculator_id', 10)->where('status', 1)->get();

        return view('backend.calculator.cash-in-transit-teriff.edit', $data);
    }

    public function updateCashInTransitTeriff(Request $request, $id) {
        $calculator                               = CalculatorCashInSafeTeriff::find($id);
        $calculator->calculator_id                = $request->calculator_id;
        $calculator->calculator_institute_type_id = $request->calculator_institute_type_id;
        $calculator->srcc_id                      = $request->srcc_id;
        $calculator->turnover_up_to               = $request->turnover_up_to;
        $calculator->turnover_up_to_value         = $request->turnover_up_to_value;
        $calculator->turnover_for_over            = $request->turnover_for_over;
        $calculator->turnover_for_over_value      = $request->turnover_for_over_value;
        $calculator->armored                      = $request->armored;

        $calculator->save();

        return to_route('admin.calculator.indexCashInTransitTeriff.index')->with('message', 'Data Updated Successfully');
    }

    public function statusCashInTransitTeriff($id) {
        $changeStatus         = CalculatorCashInSafeTeriff::find($id);
        $changeStatus->status = $changeStatus->status == 1 ? '0' : '1';
        $changeStatus->save();

        return back()->with('message', 'Status Changed Successfully');
    }

    public function detailsCashInTransitTeriff($id) {
        $data               = [];
        $data['calculator'] = Calculator::find($id);

        return view('backend.calculator.cash-in-transit-teriff.details', $data);
    }

//cash in transit teriff ends

    //cash in counter teriff Starts

    public function createCashInCounterTeriff() {
        $data                      = [];
        $data['institution']       = CalculatorInstitutionType::where('calculator_id', 11)->where('status', 1)->get();
        $data['property_location'] = CalculatorPropertyLocation::where('calculator_id', 11)->where('status', 1)->get();
        $data['srcc']              = CalculatorStrikeRiotCivilCommotion::where('calculator_id', 11)->where('status', 1)->get();
        $data['building']          = CalculatorBuildingConstruction::where('calculator_id', 11)->where('status', 1)->get();

        return view('backend.calculator.cash-in-counter-teriff.create', $data);
    }

    public function indexCashInCounterTeriff() {
        $data            = [];
        $data['teriffs'] = CalculatorCashInSafeTeriff::where('calculator_id', 11)->get();

        return view('backend.calculator.cash-in-counter-teriff.index', $data);
    }

    public function StoreCashInCounterTeriff(Request $request) {

        $calculator                                      = new CalculatorCashInSafeTeriff();
        $calculator->calculator_id                       = $request->calculator_id;
        $calculator->calculator_institute_type_id        = $request->calculator_institute_type_id;
        $calculator->srcc_id                             = $request->srcc_id;
        $calculator->calculator_building_construction_id = $request->calculator_building_construction_id;
        $calculator->value                               = $request->value;

        $calculator->save();

        return to_route('admin.calculator.indexCashInCounterTeriff.index')->with('message', 'Data Inserted Successfully');
    }

    public function editCashInCounterTeriff($id) {
        $data                      = [];
        $data['teriff']            = CalculatorCashInSafeTeriff::where('id', $id)->first();
        $data['institution']       = CalculatorInstitutionType::where('calculator_id', 11)->where('status', 1)->get();
        $data['property_location'] = CalculatorPropertyLocation::where('calculator_id', 11)->where('status', 1)->get();
        $data['srcc']              = CalculatorStrikeRiotCivilCommotion::where('calculator_id', 11)->where('status', 1)->get();
        $data['building']          = CalculatorBuildingConstruction::where('calculator_id', 11)->where('status', 1)->get();

        return view('backend.calculator.cash-in-counter-teriff.edit', $data);
    }

    public function updateCashInCounterTeriff(Request $request, $id) {
        $calculator                                      = CalculatorCashInSafeTeriff::find($id);
        $calculator->calculator_id                       = $request->calculator_id;
        $calculator->calculator_institute_type_id        = $request->calculator_institute_type_id;
        $calculator->srcc_id                             = $request->srcc_id;
        $calculator->calculator_building_construction_id = $request->calculator_building_construction_id;
        $calculator->value                               = $request->value;

        $calculator->save();

        return to_route('admin.calculator.indexCashInCounterTeriff.index')->with('message', 'Data Updated Successfully');
    }

    public function statusCashInCounterTeriff($id) {
        $changeStatus         = CalculatorCashInSafeTeriff::find($id);
        $changeStatus->status = $changeStatus->status == 1 ? '0' : '1';
        $changeStatus->save();

        return back()->with('message', 'Status Changed Successfully');
    }

    public function detailsCashInCounteritTeriff($id) {
        $data               = [];
        $data['calculator'] = Calculator::find($id);

        return view('backend.calculator.cash-in-counter-teriff.details', $data);
    }

//cash in counter teriff ends

    //Premium Calculator Starts

    public function createCalculator() {
        return view('backend.calculator.premium_calculator.create');
    }

    public function indexCalculator() {
        $data                = [];
        $data['calculators'] = Calculator::all();

        return view('backend.calculator.premium_calculator.index', $data);
    }

    public function StoreCalculator(Request $request) {
        $validator = Validator::make($request->all(), [
            'en_name' => 'required|unique:calculators',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $calculator              = new Calculator();
        $calculator->en_name     = $request->en_name;
        $calculator->bn_name     = $request->bn_name;
        $calculator->color_image = ImageUpload::imageUpload($request->file('color_image'), 'backend/img/premium-calculator-color-image/');
        $calculator->white_image = ImageUpload::imageUpload($request->file('white_image'), 'backend/img/premium-calculator-white-image/');
        $calculator->age_limit   = $request->age_limit;
        $calculator->notice      = $request->notice;
        $calculator->buyable     = $request->buyable;
        $calculator->status      = $request->status;

        $calculator->save();

        return to_route('admin.calculator.index')->with('message', 'Premium Calculator Data Inserted Successfully');
    }

    public function editCalculator($id) {
        $data               = [];
        $data['calculator'] = Calculator::find($id);

        return view('backend.calculator.premium_calculator.edit', $data);
    }

    public function updateCalculator(Request $request, $id) {
        $calculator              = Calculator::find($id);
        $calculator->en_name     = $request->en_name;
        $calculator->bn_name     = $request->bn_name;
        $calculator->color_image = ImageUpload::imageUpload($request->file('color_image'), 'backend/img/premium-calculator-color-image/', isset($id) ? Calculator::find($id)->color_image : null);
        $calculator->white_image = ImageUpload::imageUpload($request->file('white_image'), 'backend/img/premium-calculator-white-image/', isset($id) ? Calculator::find($id)->white_image : null);
        $calculator->age_limit   = $request->age_limit;
        $calculator->notice      = $request->notice;
        $calculator->buyable     = $request->buyable;
        $calculator->status      = $request->status;

        $calculator->save();

        return to_route('admin.calculator.index')->with('message', 'Premium Calculator Data Updated Successfully');
    }

    public function statusCalculator($id) {
        $changeStatus         = Calculator::find($id);
        $changeStatus->status = $changeStatus->status == 1 ? '0' : '1';
        $changeStatus->save();

        return back()->with('message', 'Premium Calculator Status Changed Successfully');
    }

    public function detailsCalculator($id) {
        $data               = [];
        $data['calculator'] = $c = Calculator::where('id', $id)->first();
        $data['orders']     = Order::where('calculator_id', $c->id)->orderBy('id', 'desc')->paginate();

        return view('backend.calculator.premium_calculator.details', $data);
    }

    public function acceptCalculatorInsurane($id) {
        $changeStatus          = Order::find($id);
        $changeStatus->mark_as = 1;
        $changeStatus->save();

        return back()->with('message', 'Insurance accepted successfully.');
    }

    public function invoiceCalculatorInsurane($id) {
        $data          = [];
        $data['order'] = Order::where('id', $id)->first();

        return view('backend.calculator.premium_calculator.invoice', $data);
    }

    public function invoiceCalculatorInsuraneEdit($id) {
        $data          = [];
        $data['order'] = Order::where('id', $id)->first();

        return view('backend.calculator.premium_calculator.invoice_edit', $data);
    }

    public function invoiceCalculatorInsuraneEditUpdate(Request $request, $id) {
        $file1 = ImageUpload::imageUpload($request->file('file1'), 'backend/img/premium-calculator-color-image/', null);
        $file2 = ImageUpload::imageUpload($request->file('file2'), 'backend/img/premium-calculator-color-image/', null);
        $file3 = ImageUpload::imageUpload($request->file('file3'), 'backend/img/premium-calculator-color-image/', null);
        $file4 = ImageUpload::imageUpload($request->file('file4'), 'backend/img/premium-calculator-color-image/', null);

        Order::updateOrCreate(
            ['id' => $id],
            [
                'code'  => $request->code,
                'file1' => $file1 ?? '',
                'file2' => $file2 ?? '',
                'file3' => $file3 ?? '',
                'file4' => $file4 ?? '',
            ]
        );

        return back();
    }

    //Select Property Location Starts

    public function createLocation() {
        $data                = [];
        $data['calculators'] = Calculator::latest()->get();

        return view('backend.calculator.select-property-location.create', $data);
    }

    public function indexLocation() {
        $data                       = [];
        $data['property_locations'] = CalculatorPropertyLocation::latest()->get();

        return view('backend.calculator.select-property-location.index', $data);
    }

    public function StoreLocation(Request $request) {
        $validator = Validator::make($request->all(), []);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $propertyLocation                = new CalculatorPropertyLocation();
        $propertyLocation->calculator_id = $request->calculator_id;
        $propertyLocation->en_name       = $request->en_name;
        $propertyLocation->bn_name       = $request->bn_name;
        $propertyLocation->status        = $request->status;
        $propertyLocation->save();

        return to_route('admin.calculator.property.index')->with('message', 'Property Location Data Inserted Successfully');
    }

    public function editLocation($id) {
        $data                      = [];
        $data['calculators']       = Calculator::latest()->get();
        $data['property_location'] = CalculatorPropertyLocation::find($id);

        return view('backend.calculator.select-property-location.edit', $data);
    }

    public function updateLocation(Request $request, $id) {
        $propertyLocation                = CalculatorPropertyLocation::find($id);
        $propertyLocation->calculator_id = $request->calculator_id;
        $propertyLocation->en_name       = $request->en_name;
        $propertyLocation->bn_name       = $request->bn_name;
        $propertyLocation->status        = $request->status;
        $propertyLocation->save();

        return redirect(route('admin.calculator.property.index'))->with('message', 'Property Location Data Updated Successfully');
    }

    public function statusLocation($id) {
        $changeStatus         = CalculatorPropertyLocation::find($id);
        $changeStatus->status = $changeStatus->status == 1 ? '0' : '1';
        $changeStatus->save();

        return back()->with('message', 'Property Location Status Changed Successfully');
    }

    //Type of Property Occupation Starts

    public function createOccupation() {
        $data                = [];
        $data['calculators'] = Calculator::all();

        return view('backend.calculator.type-of-property-occupation.create', $data);
    }

    public function indexOccupation() {
        $data                         = [];
        $data['property_occupations'] = CalculatorPropertyOrOccupationType::all();

        return view('backend.calculator.type-of-property-occupation.index', $data);
    }

    public function StoreOccupation(Request $request) {
        $validator = Validator::make($request->all(), []);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $calculator                = new CalculatorPropertyOrOccupationType();
        $calculator->calculator_id = $request->calculator_id;
        $calculator->en_name       = $request->en_name;
        $calculator->bn_name       = $request->bn_name;
        $calculator->en_title      = $request->en_title;
        $calculator->bn_title      = $request->bn_title;
        $calculator->color_image   = ImageUpload::imageUpload($request->file('color_image'), 'backend/img/type-of-property-occupation-color-image/');
        $calculator->white_image   = ImageUpload::imageUpload($request->file('white_image'), 'backend/img/type-of-property-occupation-white-image/');
        $calculator->value         = $request->value;
        $calculator->status        = $request->status;

        $calculator->save();

        return redirect(route('admin.calculator.occupation.index'))->with('message', 'Type of Property Or Occupation Data Inserted Successfully');
    }

    public function editOccupation($id) {
        $data                        = [];
        $data['calculators']         = Calculator::all();
        $data['property_occupation'] = CalculatorPropertyOrOccupationType::find($id);

        return view('backend.calculator.type-of-property-occupation.edit', $data);
    }

    public function updateOccupation(Request $request, $id) {
        $calculator                = CalculatorPropertyOrOccupationType::find($id);
        $calculator->calculator_id = $request->calculator_id;
        $calculator->en_name       = $request->en_name;
        $calculator->bn_name       = $request->bn_name;
        $calculator->en_title      = $request->en_title;
        $calculator->bn_title      = $request->bn_title;
        $calculator->color_image   = ImageUpload::imageUpload($request->file('color_image'), 'backend/img/type-of-property-occupation-color-image/', isset($id) ? CalculatorPropertyOrOccupationType::find($id)->color_image : null);
        $calculator->white_image   = ImageUpload::imageUpload($request->file('white_image'), 'backend/img/type-of-property-occupation-white-image/', isset($id) ? CalculatorPropertyOrOccupationType::find($id)->white_image : null);
        $calculator->status        = $request->status;
        $calculator->value         = $request->value;

        $calculator->save();

        return redirect(route('admin.calculator.occupation.index'))->with('message', 'Type of Property Or Occupation Data Updated Successfully');
    }

    public function statusOccupation($id) {
        $changeStatus         = CalculatorPropertyOrOccupationType::find($id);
        $changeStatus->status = $changeStatus->status == 1 ? '0' : '1';
        $changeStatus->save();

        return back()->with('message', 'Type of Property Or Occupation Status Changed Successfully');
    }

    //Member of Association Starts

    public function createAssociation() {
        $data                = [];
        $data['calculators'] = Calculator::latest()->get();

        return view('backend.calculator.member-of-association.create', $data);
    }

    public function indexAssociation() {
        $data                 = [];
        $data['associations'] = CalculatorMemberAssociation::latest()->get();

        return view('backend.calculator.member-of-association.index', $data);
    }

    public function StoreAssociation(Request $request) {
        $validator = Validator::make($request->all(), []);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $propertyAssociation                = new CalculatorMemberAssociation();
        $propertyAssociation->calculator_id = $request->calculator_id;
        $propertyAssociation->en_name       = $request->en_name;
        $propertyAssociation->bn_name       = $request->bn_name;
        $propertyAssociation->status        = $request->status;
        $propertyAssociation->save();

        return redirect(route('admin.calculator.associations.index'))->with('message', 'Member of Association Data Inserted Successfully');
    }

    public function editAssociation($id) {
        $data                = [];
        $data['calculators'] = Calculator::latest()->get();
        $data['association'] = CalculatorMemberAssociation::find($id);

        return view('backend.calculator.member-of-association.edit', $data);
    }

    public function updateAssociation(Request $request, $id) {
        $propertyAssociation                = CalculatorMemberAssociation::find($id);
        $propertyAssociation->calculator_id = $request->calculator_id;
        $propertyAssociation->en_name       = $request->en_name;
        $propertyAssociation->bn_name       = $request->bn_name;
        $propertyAssociation->status        = $request->status;
        $propertyAssociation->save();

        return redirect(route('admin.calculator.associations.index'))->with('message', 'Member of Association Data Updated Successfully');
    }

    public function statusAssociation($id) {
        $changeStatus         = CalculatorMemberAssociation::find($id);
        $changeStatus->status = $changeStatus->status == 1 ? '0' : '1';
        $changeStatus->save();

        return back()->with('message', 'Member of Association Status Changed Successfully');
    }

    //Building Construction Starts

    public function createBuildConst() {
        $data                = [];
        $data['calculators'] = Calculator::all();

        return view('backend.calculator.building-constructions.create', $data);
    }

    public function indexBuildConst() {
        $data                  = [];
        $data['constructions'] = CalculatorBuildingConstruction::all();

        return view('backend.calculator.building-constructions.index', $data);
    }

    public function StoreBuildConst(Request $request) {
        $validator = Validator::make($request->all(), []);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $calculator                 = new CalculatorBuildingConstruction();
        $calculator->calculator_id  = $request->calculator_id;
        $calculator->en_class_title = $request->en_class_title;
        $calculator->bn_class_title = $request->bn_class_title;
        $calculator->en_hero_title  = $request->en_hero_title;
        $calculator->bn_hero_title  = $request->bn_hero_title;
        $calculator->status         = $request->status;

        $calculator->save();

        return redirect(route('admin.calculator.building-constructions.index'))->with('message', ' Data Inserted Successfully');
    }

    public function editBuildConst($id) {
        $data                = [];
        $data['calculators'] = Calculator::all();
        $data['const']       = CalculatorBuildingConstruction::find($id);

        return view('backend.calculator.building-constructions.edit', $data);
    }

    public function updateBuildConst(Request $request, $id) {
        $calculator                 = CalculatorBuildingConstruction::find($id);
        $calculator->calculator_id  = $request->calculator_id;
        $calculator->en_class_title = $request->en_class_title;
        $calculator->bn_class_title = $request->bn_class_title;
        $calculator->en_hero_title  = $request->en_hero_title;
        $calculator->bn_hero_title  = $request->bn_hero_title;
        $calculator->status         = $request->status;

        $calculator->save();

        return redirect(route('admin.calculator.building-constructions.index'))->with('message', 'Data Updated Successfully');
    }

    public function statusBuildConst($id) {
        $changeStatus         = CalculatorBuildingConstruction::find($id);
        $changeStatus->status = $changeStatus->status == 1 ? '0' : '1';
        $changeStatus->save();

        return back()->with('message', 'Construction Status Changed Successfully');
    }

    //Building Construction Roofs Starts

    public function createRoofs() {
        $data                = [];
        $data['calculators'] = Calculator::latest()->get();

        return view('backend.calculator.building-construction-roofs.create', $data);
    }

    public function indexRoofs() {
        $data          = [];
        $data['roofs'] = CalculatorBuildingConstructionRoof::latest()->get();

        return view('backend.calculator.building-construction-roofs.index', $data);
    }

    public function StoreRoofs(Request $request) {
        $validator = Validator::make($request->all(), []);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $insType                                      = new CalculatorBuildingConstructionRoof();
        $insType->calculator_id                       = $request->calculator_id;
        $insType->calculator_building_construction_id = $request->calculator_building_construction_id;
        $insType->en_name                             = $request->en_name;
        $insType->bn_name                             = $request->bn_name;
        $insType->status                              = $request->status;
        $insType->save();

        return redirect(route('admin.calculator.construction-roofs.index'))->with('message', 'Data Inserted Successfully');
    }

    public function editRoofs($id) {
        $data                  = [];
        $data['calculators']   = Calculator::latest()->get();
        $data['roof']          = $r          = CalculatorBuildingConstructionRoof::find($id);
        $data['constructions'] = CalculatorBuildingConstruction::get();

        return view('backend.calculator.building-construction-roofs.edit', $data);
    }

    public function updateRoofs(Request $request, $id) {
        $insType                                      = CalculatorBuildingConstructionRoof::find($id);
        $insType->calculator_id                       = $request->calculator_id;
        $insType->calculator_building_construction_id = $request->calculator_building_construction_id;
        $insType->en_name                             = $request->en_name;
        $insType->bn_name                             = $request->bn_name;
        $insType->status                              = $request->status;
        $insType->save();

        return redirect(route('admin.calculator.construction-roofs.index'))->with('message', 'Data Updated Successfully');
    }

    public function statusRoofs($id) {
        $changeStatus         = CalculatorBuildingConstructionRoof::find($id);
        $changeStatus->status = $changeStatus->status == 1 ? '0' : '1';
        $changeStatus->save();

        return back()->with('message', 'Status Changed Successfully');
    }

    //Interest Type Starts

    public function createInterest() {
        $data               = [];
        $data['occupation'] = CalculatorPropertyOrOccupationType::where('calculator_id', 1)->get();

        return view('backend.calculator.interest-type.create', $data);
    }

    public function indexInterest() {
        $data              = [];
        $data['ins_types'] = CalculatorInterestType::latest()->get();

        return view('backend.calculator.interest-type.index', $data);
    }

    public function StoreInterest(Request $request) {
        $validator = Validator::make($request->all(), []);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $insType                = new CalculatorInterestType();
        $insType->calculator_id = $request->calculator_id;
        $insType->occupation_id = $request->occupation_id;
        $insType->en_name       = $request->en_name;
        $insType->bn_name       = $request->bn_name;
        $insType->status        = $request->status;
        $insType->save();

        return redirect(route('admin.calculator.interest-type.index'))->with('message', 'Data Inserted Successfully');
    }

    public function editInterest($id) {
        $data               = [];
        $data['occupation'] = CalculatorPropertyOrOccupationType::where('calculator_id', 1)->get();
        $data['ins_type']   = CalculatorInterestType::find($id);

        return view('backend.calculator.interest-type.edit', $data);
    }

    public function updateInterest(Request $request, $id) {
        $insType                = CalculatorInterestType::find($id);
        $insType->calculator_id = $request->calculator_id;
        $insType->occupation_id = $request->occupation_id;
        $insType->en_name       = $request->en_name;
        $insType->bn_name       = $request->bn_name;
        $insType->status        = $request->status;
        $insType->save();

        return redirect(route('admin.calculator.interest-type.index'))->with('message', 'Data Updated Successfully');
    }

    public function statusInterest($id) {
        $changeStatus         = CalculatorInterestType::find($id);
        $changeStatus->status = $changeStatus->status == 1 ? '0' : '1';
        $changeStatus->save();

        return back()->with('message', 'Status Changed Successfully');
    }

    //Additional Coverage Starts

    public function createAdditional() {
        $data                = [];
        $data['calculators'] = Calculator::latest()->get();

        return view('backend.calculator.additional-coverage.create', $data);
    }

    public function indexAdditional() {
        $data                  = [];
        $data['add_coverages'] = CalculatorAdditionalCoverage::all();

        return view('backend.calculator.additional-coverage.index', $data);
    }

    public function StoreAdditional(Request $request) {
        $validator = Validator::make($request->all(), []);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $calculator                = new CalculatorAdditionalCoverage();
        $calculator->calculator_id = $request->calculator_id;
        $calculator->en_name       = $request->en_name;
        $calculator->bn_name       = $request->bn_name;
        $calculator->color_image   = ImageUpload::imageUpload($request->file('color_image'), 'backend/img/additional-coverage-color-image/');
        $calculator->white_image   = ImageUpload::imageUpload($request->file('white_image'), 'backend/img/additional-coverage-white-image/');
        $calculator->status        = $request->status;
        $calculator->value         = $request->value;

        $calculator->save();

        return redirect(route('admin.calculator.additional-coverage.index'))->with('message', 'Additional Coverage Data Inserted Successfully');
    }

    public function editAdditional($id) {
        $data                 = [];
        $data['add_coverage'] = CalculatorAdditionalCoverage::find($id);
        $data['calculators']  = Calculator::latest()->get();

        return view('backend.calculator.additional-coverage.edit', $data);
    }

    public function updateAdditional(Request $request, $id) {
        $calculator                = CalculatorAdditionalCoverage::find($id);
        $calculator->calculator_id = $request->calculator_id;
        $calculator->en_name       = $request->en_name;
        $calculator->bn_name       = $request->bn_name;
        $calculator->color_image   = ImageUpload::imageUpload($request->file('color_image'), 'backend/img/additional-coverage-color-image/', isset($id) ? CalculatorAdditionalCoverage::find($id)->color_image : null);
        $calculator->white_image   = ImageUpload::imageUpload($request->file('white_image'), 'backend/img/additional-coverage-white-image/', isset($id) ? CalculatorAdditionalCoverage::find($id)->white_image : null);
        $calculator->status        = $request->status;
        $calculator->value         = $request->value;

        $calculator->save();

        return redirect(route('admin.calculator.additional-coverage.index'))->with('message', 'Additional Coverage Data Updated Successfully');
    }

    public function statusAdditional($id) {
        $changeStatus         = CalculatorAdditionalCoverage::find($id);
        $changeStatus->status = $changeStatus->status == 1 ? '0' : '1';
        $changeStatus->save();

        return back()->with('message', 'Additional Coverage Status Changed Successfully');
    }

    //Cargo Products Starts

    public function createCargo() {
        $data                = [];
        $data['calculators'] = Calculator::latest()->get();

        return view('backend.calculator.cargo-products.create', $data);
    }

    public function indexCargo() {
        $data             = [];
        $data['products'] = CalculatorCargoProduct::get();

        return view('backend.calculator.cargo-products.index', $data);
    }

    public function StoreCargo(Request $request) {
        $validator = Validator::make($request->all(), []);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $insType                = new CalculatorCargoProduct();
        $insType->calculator_id = $request->calculator_id;
        $insType->en_name       = $request->en_name;
        $insType->bn_name       = $request->bn_name;
        $insType->status        = $request->status;
        $insType->member        = $request->member;
        $insType->save();

        return redirect(route('admin.calculator.cargo-products.index'))->with('message', 'Data Inserted Successfully');
    }

    public function editCargo($id) {
        $data                = [];
        $data['calculators'] = Calculator::latest()->get();
        $data['product']     = CalculatorCargoProduct::find($id);

        return view('backend.calculator.cargo-products.edit', $data);
    }

    public function updateCargo(Request $request, $id) {
        $insType                = CalculatorCargoProduct::find($id);
        $insType->calculator_id = $request->calculator_id;
        $insType->en_name       = $request->en_name;
        $insType->bn_name       = $request->bn_name;
        $insType->status        = $request->status;
        $insType->member        = $request->member;
        $insType->save();

        return redirect(route('admin.calculator.cargo-products.index'))->with('message', 'Data Updated Successfully');
    }

    public function statusCargo($id) {
        $changeStatus         = CalculatorCargoProduct::find($id);
        $changeStatus->status = $changeStatus->status == 1 ? '0' : '1';
        $changeStatus->save();

        return back()->with('message', 'Status Changed Successfully');
    }

    //tariff system starts

    public function createTariff() {
        $data                = [];
        $data['calculators'] = Calculator::latest()->get();

        return view('backend.calculator.tariff-types.create', $data);
    }

    public function indexTariff() {
        $data            = [];
        $data['tariffs'] = CalculatorTariffType::latest()->get();

        return view('backend.calculator.tariff-types.index', $data);
    }

    public function StoreTariff(Request $request) {
        $validator = Validator::make($request->all(), []);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $insType                = new CalculatorTariffType();
        $insType->calculator_id = $request->calculator_id;
        $insType->en_name       = $request->en_name;
        $insType->bn_name       = $request->bn_name;
        $insType->status        = $request->status;
        $insType->value         = $request->value;
        $insType->save();

        return redirect(route('admin.calculator.tariff-types.index'))->with('message', 'Data Inserted Successfully');
    }

    public function editTariff($id) {
        $data                = [];
        $data['calculators'] = Calculator::latest()->get();
        $data['tariff']      = CalculatorTariffType::find($id);

        return view('backend.calculator.tariff-types.edit', $data);
    }

    public function updateTariff(Request $request, $id) {
        $insType                = CalculatorTariffType::find($id);
        $insType->calculator_id = $request->calculator_id;
        $insType->en_name       = $request->en_name;
        $insType->bn_name       = $request->bn_name;
        $insType->status        = $request->status;
        $insType->value         = $request->value;
        $insType->save();

        return redirect(route('admin.calculator.tariff-types.index'))->with('message', 'Data Updated Successfully');
    }

    public function statusTariff($id) {
        $changeStatus         = CalculatorTariffType::find($id);
        $changeStatus->status = $changeStatus->status == 1 ? '0' : '1';
        $changeStatus->save();

        return back()->with('message', 'Status Changed Successfully');
    }

    //boiler teriff system starts

    public function createBoilerTeriff() {
        $data                = [];
        $data['calculators'] = Calculator::latest()->get();

        return view('backend.calculator.boiler-teriff.create', $data);
    }

    public function indexBoilerTeriff() {
        $data            = [];
        $data['tariffs'] = CalculatorBoilerTeriff::all();

        return view('backend.calculator.boiler-teriff.index', $data);
    }

    public function StoreBoilerTeriff(Request $request) {
        $validator = Validator::make($request->all(), []);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $insType                = new CalculatorBoilerTeriff();
        $insType->calculator_id = $request->calculator_id;
        $insType->year_from     = $request->year_from;
        $insType->year_to       = $request->year_to;
        $insType->value         = $request->value;
        $insType->status        = $request->status;
        $insType->save();

        return redirect(route('admin.calculator.boilerTeriff.index'))->with('message', 'Data Inserted Successfully');
    }

    public function editBoilerTeriff($id) {
        $data                = [];
        $data['calculators'] = Calculator::latest()->get();
        $data['tariff']      = CalculatorBoilerTeriff::find($id);

        return view('backend.calculator.boiler-teriff.edit', $data);
    }

    public function updateBoilerTeriff(Request $request, $id) {
        $insType                = CalculatorBoilerTeriff::find($id);
        $insType->calculator_id = $request->calculator_id;
        $insType->year_from     = $request->year_from;
        $insType->year_to       = $request->year_to;
        $insType->value         = $request->value;
        $insType->status        = $request->status;
        $insType->save();

        return redirect(route('admin.calculator.boilerTeriff.index'))->with('message', 'Data Updated Successfully');
    }

    public function statusBoilerTeriff($id) {
        $changeStatus         = CalculatorBoilerTeriff::find($id);
        $changeStatus->status = $changeStatus->status == 1 ? '0' : '1';
        $changeStatus->save();

        return back()->with('message', 'Status Changed Successfully');
    }

    //Carried By Starts

    public function createCarried() {
        $data                = [];
        $data['calculators'] = Calculator::all();

        return view('backend.calculator.carried-by.create', $data);
    }

    public function indexCarried() {
        $data            = [];
        $data['carries'] = CalculatorCarriedBy::all();

        return view('backend.calculator.carried-by.index', $data);
    }

    public function StoreCarried(Request $request) {
        $validator = Validator::make($request->all(), []);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $calculator                   = new CalculatorCarriedBy();
        $calculator->calculator_id    = $request->calculator_id;
        $calculator->en_name          = $request->en_name;
        $calculator->bn_name          = $request->bn_name;
        $calculator->color_image      = ImageUpload::imageUpload($request->file('color_image'), 'backend/img/carried-by-color-image/');
        $calculator->white_image      = ImageUpload::imageUpload($request->file('white_image'), 'backend/img/carried-by-white-image/');
        $calculator->charge_type      = $request->charge_type;
        $calculator->price_limit      = $request->price_limit;
        $calculator->amount           = $request->amount;
        $calculator->next_price_limit = $request->next_price_limit;
        $calculator->next_amount      = $request->next_amount;
        $calculator->status           = $request->status;

        $calculator->save();

        return redirect(route('admin.calculator.carried-bies.index'))->with('message', ' Data Inserted Successfully');
    }

    public function editCarried($id) {
        $data                = [];
        $data['calculators'] = Calculator::all();
        $data['carry']       = CalculatorCarriedBy::find($id);

        return view('backend.calculator.carried-by.edit', $data);
    }

    public function updateCarried(Request $request, $id) {
        $calculator                   = CalculatorCarriedBy::find($id);
        $calculator->calculator_id    = $request->calculator_id;
        $calculator->en_name          = $request->en_name;
        $calculator->bn_name          = $request->bn_name;
        $calculator->color_image      = ImageUpload::imageUpload($request->file('color_image'), 'backend/img/carried-by-color-image/', isset($id) ? CalculatorCarriedBy::find($id)->color_image : null);
        $calculator->white_image      = ImageUpload::imageUpload($request->file('white_image'), 'backend/img/carried-by-white-image/', isset($id) ? CalculatorCarriedBy::find($id)->white_image : null);
        $calculator->charge_type      = $request->charge_type;
        $calculator->price_limit      = $request->price_limit;
        $calculator->amount           = $request->amount;
        $calculator->next_price_limit = $request->next_price_limit;
        $calculator->next_amount      = $request->next_amount;
        $calculator->status           = $request->status;

        $calculator->save();

        return redirect(route('admin.calculator.carried-bies.index'))->with('message', 'Data Updated Successfully');
    }

    public function statusCarried($id) {
        $changeStatus         = CalculatorCarriedBy::find($id);
        $changeStatus->status = $changeStatus->status == 1 ? '0' : '1';
        $changeStatus->save();

        return back()->with('message', 'Carried Status Changed Successfully');
    }

    //Insurance Sub Type Starts

    public function createSubInsType() {
        $data                = [];
        $data['calculators'] = Calculator::all();

        return view('backend.calculator.insurance-sub-type.create', $data);
    }

    public function indexSubInsType() {
        $data                  = [];
        $data['ins_sub_types'] = CalculatorInsuranceSubType::all();

        return view('backend.calculator.insurance-sub-type.index', $data);
    }

    public function StoreSubInsType(Request $request) {
        $validator = Validator::make($request->all(), []);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $calculator                = new CalculatorInsuranceSubType();
        $calculator->calculator_id = $request->calculator_id;
        $calculator->en_name       = $request->en_name;
        $calculator->bn_name       = $request->bn_name;
        $calculator->color_image   = ImageUpload::imageUpload($request->file('color_image'), 'backend/img/insurance-sub-type-color-image/');
        $calculator->white_image   = ImageUpload::imageUpload($request->file('white_image'), 'backend/img/insurance-sub-type-white-image/');
        $calculator->status        = $request->status;

        $calculator->save();

        return redirect(route('admin.calculator.insurance-sub-type.index'))->with('message', ' Data Inserted Successfully');
    }

    public function editSubInsType($id) {
        $data                 = [];
        $data['calculators']  = Calculator::all();
        $data['ins_sub_type'] = CalculatorInsuranceSubType::find($id);

        return view('backend.calculator.insurance-sub-type.edit', $data);
    }

    public function updateSubInsType(Request $request, $id) {
        $calculator                = CalculatorInsuranceSubType::find($id);
        $calculator->calculator_id = $request->calculator_id;
        $calculator->en_name       = $request->en_name;
        $calculator->bn_name       = $request->bn_name;
        $calculator->color_image   = ImageUpload::imageUpload($request->file('color_image'), 'backend/img/insurance-sub-type-color-image/', isset($id) ? CalculatorInsuranceSubType::find($id)->color_image : null);
        $calculator->white_image   = ImageUpload::imageUpload($request->file('white_image'), 'backend/img/insurance-sub-type-white-image/', isset($id) ? CalculatorInsuranceSubType::find($id)->white_image : null);
        $calculator->status        = $request->status;

        $calculator->save();

        return redirect(route('admin.calculator.insurance-sub-type.index'))->with('message', 'Data Updated Successfully');
    }

    public function statusSubInsType($id) {
        $changeStatus         = CalculatorInsuranceSubType::find($id);
        $changeStatus->status = $changeStatus->status == 1 ? '0' : '1';
        $changeStatus->save();

        return back()->with('message', 'Insurance Sub Type status Changed Successfully');
    }

    //Countries to be Visited Starts

    public function createCountry() {
        $data = [];

        return view('backend.calculator.country.create', $data);
    }

    public function indexCountry() {
        $data              = [];
        $data['countries'] = CalculatorCountry::all();

        return view('backend.calculator.country.index', $data);
    }

    public function StoreCountry(Request $request) {
        $validator = Validator::make($request->all(), []);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $calculator          = new CalculatorCountry();
        $calculator->en_name = $request->en_name;
        $calculator->bn_name = $request->bn_name;
        $calculator->type    = $request->type;
        $calculator->status  = $request->status;

        $calculator->save();

        return redirect(route('admin.calculator.country.index'))->with('message', ' Data Inserted Successfully');
    }

    public function editCountry($id) {
        $data            = [];
        $data['country'] = CalculatorCountry::find($id);

        return view('backend.calculator.country.edit', $data);
    }

    public function updateCountry(Request $request, $id) {
        $calculator          = CalculatorCountry::find($id);
        $calculator->en_name = $request->en_name;
        $calculator->bn_name = $request->bn_name;
        $calculator->type    = $request->type;
        $calculator->status  = $request->status;

        $calculator->save();

        return redirect(route('admin.calculator.country.index'))->with('message', 'Data Updated Successfully');
    }

    public function statusCountry($id) {
        $changeStatus         = CalculatorCountry::find($id);
        $changeStatus->status = $changeStatus->status == 1 ? '0' : '1';
        $changeStatus->save();

        return back()->with('message', 'Status Changed Successfully');
    }

    //Countries to be Visited Starts

    public function createCountryVisit() {
        $data                 = [];
        $data['calculators']  = Calculator::all();
        $data['countries']    = CalculatorInsuranceSubType::all();
        $data['allcountries'] = CalculatorCountry::all();

        return view('backend.calculator.country-visits.create', $data);
    }

    public function indexCountryVisit() {
        $data                  = [];
        $data['ins_sub_types'] = CalculatorCountryVisit::all();

        return view('backend.calculator.country-visits.index', $data);
    }

    public function StoreCountryVisit(Request $request) {
        $validator = Validator::make($request->all(), []);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $calculator                        = new CalculatorCountryVisit();
        $calculator->calculator_id         = $request->calculator_id;
        $calculator->country_type_id       = $request->country_type_id;
        $calculator->Insurance_sub_type_id = $request->Insurance_sub_type_id;
        $calculator->status                = $request->status;
        $calculator->age_from              = $request->age_from;
        $calculator->age_to                = $request->age_to;
        $calculator->day_from              = $request->day_from;
        $calculator->day_to                = $request->day_to;
        $calculator->amount                = $request->amount;
        $calculator->price_limit           = $request->price_limit;
        $calculator->amount_limit          = $request->amount_limit;
        $calculator->next_price_limit      = $request->next_price_limit;
        $calculator->next_amount           = $request->next_amount;
        $calculator->teriff_code           = $request->teriff_code;

        $calculator->save();

        return redirect(route('admin.calculator.country-visits.index'))->with('message', ' Data Inserted Successfully');
    }

    public function editCountryVisit($id) {
        $data                 = [];
        $data['calculators']  = Calculator::all();
        $data['countries']    = CalculatorInsuranceSubType::all();
        $data['ins_sub_type'] = CalculatorCountryVisit::find($id);
        $data['allcountries'] = CalculatorCountry::all();

        return view('backend.calculator.country-visits.edit', $data);
    }

    public function updateCountryVisit(Request $request, $id) {
        $calculator                        = CalculatorCountryVisit::find($id);
        $calculator->calculator_id         = $request->calculator_id;
        $calculator->country_id            = $request->country_id;
        $calculator->country_type_id       = $request->country_type_id;
        $calculator->Insurance_sub_type_id = $request->Insurance_sub_type_id;
        $calculator->status                = $request->status;
        $calculator->age_from              = $request->age_from;
        $calculator->age_to                = $request->age_to;
        $calculator->day_from              = $request->day_from;
        $calculator->day_to                = $request->day_to;
        $calculator->amount                = $request->amount;
        $calculator->price_limit           = $request->price_limit;
        $calculator->amount_limit          = $request->amount_limit;
        $calculator->next_price_limit      = $request->next_price_limit;
        $calculator->next_amount           = $request->next_amount;
        $calculator->teriff_code           = $request->teriff_code;

        $calculator->save();

        return redirect(route('admin.calculator.country-visits.index'))->with('message', 'Data Updated Successfully');
    }

    public function statusCountryVisit($id) {
        $changeStatus         = CalculatorCountryVisit::find($id);
        $changeStatus->status = $changeStatus->status == 1 ? '0' : '1';
        $changeStatus->save();

        return back()->with('message', 'Status Changed Successfully');
    }

    //Bangabandhu Suraksha Bima Starts

    public function createSurakshaBima() {
        $data                = [];
        $data['calculators'] = Calculator::all();

        return view('backend.calculator.bangabandhu-suraksha-bima.create', $data);
    }

    public function indexSurakshaBima() {
        $data                  = [];
        $data['suraksha_bima'] = CalculatorBangabandhuSurakshaBima::all();

        return view('backend.calculator.bangabandhu-suraksha-bima.index', $data);
    }

    public function StoreSurakshaBima(Request $request) {
        $validator = Validator::make($request->all(), []);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $calculator                      = new CalculatorBangabandhuSurakshaBima();
        $calculator->calculator_id       = $request->calculator_id;
        $calculator->en_title            = $request->en_title;
        $calculator->bn_title            = $request->bn_title;
        $calculator->en_subtitle         = $request->en_subtitle;
        $calculator->bn_subtitle         = $request->bn_subtitle;
        $calculator->en_hero_title1      = $request->en_hero_title1;
        $calculator->bn_hero_title1      = $request->bn_hero_title1;
        $calculator->en_hero_subtitle1   = $request->en_hero_subtitle1;
        $calculator->bn_hero_subtitle1   = $request->bn_hero_subtitle1;
        $calculator->en_hero_title2      = $request->en_hero_title2;
        $calculator->bn_hero_title2      = $request->bn_hero_title2;
        $calculator->en_hero_subtitle2   = $request->en_hero_subtitle2;
        $calculator->bn_hero_subtitle2   = $request->bn_hero_subtitle2;
        $calculator->en_hero_title3      = $request->en_hero_title3;
        $calculator->bn_hero_title3      = $request->bn_hero_title3;
        $calculator->en_hero_subtitle3   = $request->en_hero_subtitle3;
        $calculator->bn_hero_subtitle3   = $request->bn_hero_subtitle3;
        $calculator->en_hero_title4      = $request->en_hero_title4;
        $calculator->bn_hero_title4      = $request->bn_hero_title4;
        $calculator->en_hero_subtitle4   = $request->en_hero_subtitle4;
        $calculator->bn_hero_subtitle4   = $request->bn_hero_subtitle4;
        $calculator->capital_sum_insured = $request->capital_sum_insured;
        $calculator->net_premium         = $request->net_premium;
        $calculator->vat                 = $request->vat;
        $calculator->teriff_code         = $request->teriff_code;

        $calculator->save();

        return redirect(route('admin.calculator.bangabandhu-suraksha-bima.index'))->with('message', ' Data Inserted Successfully');
    }

    public function editSurakshaBima($id) {
        $data                = [];
        $data['calculators'] = Calculator::all();
        $data['suraksha']    = CalculatorBangabandhuSurakshaBima::find($id);

        return view('backend.calculator.bangabandhu-suraksha-bima.edit', $data);
    }

    public function updateSurakshaBima(Request $request, $id) {

        $calculator                      = CalculatorBangabandhuSurakshaBima::find($id);
        $calculator->calculator_id       = $request->calculator_id;
        $calculator->en_title            = $request->en_title;
        $calculator->bn_title            = $request->bn_title;
        $calculator->en_subtitle         = $request->en_subtitle;
        $calculator->bn_subtitle         = $request->bn_subtitle;
        $calculator->en_hero_title1      = $request->en_hero_title1;
        $calculator->bn_hero_title1      = $request->bn_hero_title1;
        $calculator->en_hero_subtitle1   = $request->en_hero_subtitle1;
        $calculator->bn_hero_subtitle1   = $request->bn_hero_subtitle1;
        $calculator->en_hero_title2      = $request->en_hero_title2;
        $calculator->bn_hero_title2      = $request->bn_hero_title2;
        $calculator->en_hero_subtitle2   = $request->en_hero_subtitle2;
        $calculator->bn_hero_subtitle2   = $request->bn_hero_subtitle2;
        $calculator->en_hero_title3      = $request->en_hero_title3;
        $calculator->bn_hero_title3      = $request->bn_hero_title3;
        $calculator->en_hero_subtitle3   = $request->en_hero_subtitle3;
        $calculator->bn_hero_subtitle3   = $request->bn_hero_subtitle3;
        $calculator->en_hero_title4      = $request->en_hero_title4;
        $calculator->bn_hero_title4      = $request->bn_hero_title4;
        $calculator->en_hero_subtitle4   = $request->en_hero_subtitle4;
        $calculator->bn_hero_subtitle4   = $request->bn_hero_subtitle4;
        $calculator->capital_sum_insured = $request->capital_sum_insured;
        $calculator->net_premium         = $request->net_premium;
        $calculator->vat                 = $request->vat;
        $calculator->teriff_code         = $request->teriff_code;

        $calculator->save();

        return redirect(route('admin.calculator.bangabandhu-suraksha-bima.index'))->with('message', 'Data Updated Successfully');
    }

    //Risk Cover Starts

    public function createRiskCover() {
        $data                = [];
        $data['calculators'] = Calculator::all();

        return view('backend.calculator.risk-cover.create', $data);
    }

    public function indexRiskCover() {
        $data                = [];
        $data['risk_covers'] = CalculatorRiskCover::all();

        return view('backend.calculator.risk-cover.index', $data);
    }

    public function StoreRiskCover(Request $request) {
        $validator = Validator::make($request->all(), []);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $calculator                = new CalculatorRiskCover();
        $calculator->calculator_id = $request->calculator_id;
        $calculator->en_name       = $request->en_name;
        $calculator->bn_name       = $request->bn_name;
        $calculator->en_title      = $request->en_title;
        $calculator->bn_title      = $request->bn_title;
        $calculator->en_subtitle   = $request->en_subtitle;
        $calculator->bn_subtitle   = $request->bn_subtitle;
        $calculator->value         = $request->value;
        $calculator->status        = $request->status;

        $calculator->save();

        return redirect(route('admin.calculator.risk-cover.index'))->with('message', ' Data Inserted Successfully');
    }

    public function editRiskCover($id) {
        $data                = [];
        $data['calculators'] = Calculator::all();
        $data['risk_cover']  = CalculatorRiskCover::find($id);

        return view('backend.calculator.risk-cover.edit', $data);
    }

    public function updateRiskCover(Request $request, $id) {
        $calculator                = CalculatorRiskCover::find($id);
        $calculator->calculator_id = $request->calculator_id;
        $calculator->en_name       = $request->en_name;
        $calculator->bn_name       = $request->bn_name;
        $calculator->en_title      = $request->en_title;
        $calculator->bn_title      = $request->bn_title;
        $calculator->en_subtitle   = $request->en_subtitle;
        $calculator->bn_subtitle   = $request->bn_subtitle;
        $calculator->value         = $request->value;
        $calculator->status        = $request->status;

        $calculator->save();

        return redirect(route('admin.calculator.risk-cover.index'))->with('message', 'Data Updated Successfully');
    }

    public function statusRiskCover($id) {
        $changeStatus         = CalculatorRiskCover::find($id);
        $changeStatus->status = $changeStatus->status == 1 ? '0' : '1';
        $changeStatus->save();

        return back()->with('message', 'Status Changed Successfully');
    }

    //Motor Insurance Starts

    public function createMotorInsurance() {
        $data                = [];
        $data['calculators'] = Calculator::all();

        return view('backend.calculator.motor-insurance.create', $data);
    }

    public function indexMotorInsurance() {
        $data               = [];
        $data['insurances'] = CalculatorMotorInsurance::all();

        return view('backend.calculator.motor-insurance.index', $data);
    }

    public function StoreMotorInsurance(Request $request) {
        $validator = Validator::make($request->all(), []);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $calculator                = new CalculatorMotorInsurance();
        $calculator->calculator_id = $request->calculator_id;
        $calculator->en_name       = $request->en_name;
        $calculator->bn_name       = $request->bn_name;
        $calculator->color_image   = ImageUpload::imageUpload($request->file('color_image'), 'backend/img/calculator-motor-insurance-color-image/');
        $calculator->white_image   = ImageUpload::imageUpload($request->file('white_image'), 'backend/img/calculator-motor-insurance-white-image/');
        $calculator->status        = $request->status;

        $calculator->save();

        return redirect(route('admin.calculator.motor-insurance.index'))->with('message', ' Data Inserted Successfully');
    }

    public function editMotorInsurance($id) {
        $data                = [];
        $data['calculators'] = Calculator::all();
        $data['ins']         = CalculatorMotorInsurance::find($id);

        return view('backend.calculator.motor-insurance.edit', $data);
    }

    public function updateMotorInsurance(Request $request, $id) {
        $calculator                = CalculatorMotorInsurance::find($id);
        $calculator->calculator_id = $request->calculator_id;
        $calculator->en_name       = $request->en_name;
        $calculator->bn_name       = $request->bn_name;
        $calculator->color_image   = ImageUpload::imageUpload($request->file('color_image'), 'backend/img/calculator-motor-insurance-color-image/', isset($id) ? CalculatorMotorInsurance::find($id)->color_image : null);
        $calculator->white_image   = ImageUpload::imageUpload($request->file('white_image'), 'backend/img/calculator-motor-insurance-white-image/', isset($id) ? CalculatorMotorInsurance::find($id)->white_image : null);
        $calculator->status        = $request->status;

        $calculator->save();

        return redirect(route('admin.calculator.motor-insurance.index'))->with('message', 'Data Updated Successfully');
    }

    public function statusMotorInsurance($id) {
        $changeStatus         = CalculatorMotorInsurance::find($id);
        $changeStatus->status = $changeStatus->status == 1 ? '0' : '1';
        $changeStatus->save();

        return back()->with('message', 'Status Changed Successfully');
    }

    //Vehicle Category Starts

    public function createVehicleCategory() {
        $data                = [];
        $data['calculators'] = Calculator::all();

        return view('backend.calculator.vehicle-category.create', $data);
    }

    public function indexVehicleCategory() {
        $data               = [];
        $data['categories'] = CalculatorVehicleCategory::all();

        return view('backend.calculator.vehicle-category.index', $data);
    }

    public function StoreVehicleCategory(Request $request) {
        $validator = Validator::make($request->all(), []);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $calculator                = new CalculatorVehicleCategory();
        $calculator->calculator_id = $request->calculator_id;
        $calculator->en_name       = $request->en_name;
        $calculator->bn_name       = $request->bn_name;
        $calculator->color_image   = ImageUpload::imageUpload($request->file('color_image'), 'backend/img/calculator-vehicle-category-color-image/');
        $calculator->white_image   = ImageUpload::imageUpload($request->file('white_image'), 'backend/img/calculator-vehicle-category-white-image/');
        $calculator->status        = $request->status;

        $calculator->save();

        return redirect(route('admin.calculator.vehicle-category.index'))->with('message', ' Data Inserted Successfully');
    }

    public function editVehicleCategory($id) {
        $data                = [];
        $data['calculators'] = Calculator::all();
        $data['cate']        = CalculatorVehicleCategory::find($id);

        return view('backend.calculator.vehicle-category.edit', $data);
    }

    public function updateVehicleCategory(Request $request, $id) {
        $calculator                = CalculatorVehicleCategory::find($id);
        $calculator->calculator_id = $request->calculator_id;
        $calculator->en_name       = $request->en_name;
        $calculator->bn_name       = $request->bn_name;
        $calculator->color_image   = ImageUpload::imageUpload($request->file('color_image'), 'backend/img/calculator-vehicle-category-color-image/', isset($id) ? CalculatorVehicleCategory::find($id)->color_image : null);
        $calculator->white_image   = ImageUpload::imageUpload($request->file('white_image'), 'backend/img/calculator-vehicle-category-white-image/', isset($id) ? CalculatorVehicleCategory::find($id)->white_image : null);
        $calculator->status        = $request->status;

        $calculator->save();

        return redirect(route('admin.calculator.vehicle-category.index'))->with('message', 'Data Updated Successfully');
    }

    public function statusVehicleCategory($id) {
        $changeStatus         = CalculatorVehicleCategory::find($id);
        $changeStatus->status = $changeStatus->status == 1 ? '0' : '1';
        $changeStatus->save();

        return back()->with('message', 'Status Changed Successfully');
    }

    //Vehicle Type Starts

    public function createVehicleType() {
        $data                = [];
        $data['calculators'] = Calculator::all();
        $data['categories']  = CalculatorVehicleCategory::all();

        return view('backend.calculator.vehicle-types.create', $data);
    }

    public function indexVehicleType() {
        $data             = [];
        $data['vehicles'] = CalculatorVehicleType::all();

        return view('backend.calculator.vehicle-types.index', $data);
    }

    public function StoreVehicleType(Request $request) {
        $validator = Validator::make($request->all(), []);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $calculator                                 = new CalculatorVehicleType();
        $calculator->calculator_id                  = $request->calculator_id;
        $calculator->calculator_vehicle_category_id = $request->calculator_vehicle_category_id;
        $calculator->en_name                        = $request->en_name;
        $calculator->bn_name                        = $request->bn_name;
        $calculator->value                          = $request->value;
        $calculator->color_image                    = ImageUpload::imageUpload($request->file('color_image'), 'backend/img/calculator-vehicle-types-color-image/');
        $calculator->white_image                    = ImageUpload::imageUpload($request->file('white_image'), 'backend/img/calculator-vehicle-types-white-image/');
        $calculator->weight                         = $request->weight;
        $calculator->status                         = $request->status;

        $calculator->save();

        return redirect(route('admin.calculator.vehicle-types.index'))->with('message', ' Data Inserted Successfully');
    }

    public function editVehicleType($id) {
        $data                = [];
        $data['calculators'] = Calculator::all();
        $data['categories']  = CalculatorVehicleCategory::all();
        $data['vehicle']     = CalculatorVehicleType::find($id);

        return view('backend.calculator.vehicle-types.edit', $data);
    }

    public function updateVehicleType(Request $request, $id) {
        $calculator                                 = CalculatorVehicleType::find($id);
        $calculator->calculator_id                  = $request->calculator_id;
        $calculator->calculator_vehicle_category_id = $request->calculator_vehicle_category_id;
        $calculator->en_name                        = $request->en_name;
        $calculator->bn_name                        = $request->bn_name;
        $calculator->value                          = $request->value;
        $calculator->color_image                    = ImageUpload::imageUpload($request->file('color_image'), 'backend/img/calculator-vehicle-types-color-image/', isset($id) ? CalculatorVehicleType::find($id)->color_image : null);
        $calculator->white_image                    = ImageUpload::imageUpload($request->file('white_image'), 'backend/img/calculator-vehicle-types-white-image/', isset($id) ? CalculatorVehicleType::find($id)->white_image : null);
        $calculator->weight                         = $request->weight;
        $calculator->status                         = $request->status;

        $calculator->save();

        return redirect(route('admin.calculator.vehicle-types.index'))->with('message', 'Data Updated Successfully');
    }

    public function statusVehicleType($id) {
        $changeStatus         = CalculatorVehicleType::find($id);
        $changeStatus->status = $changeStatus->status == 1 ? '0' : '1';
        $changeStatus->save();

        return back()->with('message', 'Status Changed Successfully');
    }

    // Engine Capacity Starts

    public function createEngineCapacity() {
        $data                = [];
        $data['calculators'] = Calculator::all();
        $data['categories']  = CalculatorVehicleCategory::all();

        return view('backend.calculator.engine-capacity.create', $data);
    }

    public function indexEngineCapacity() {
        $data               = [];
        $data['capacities'] = CalculatorEnginCapacity::all();

        return view('backend.calculator.engine-capacity.index', $data);
    }

    public function StoreEngineCapacity(Request $request) {
        $validator = Validator::make($request->all(), []);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $calculator                                 = new CalculatorEnginCapacity();
        $calculator->calculator_vehicle_category_id = $request->calculator_vehicle_category_id;
        $calculator->calculator_vehicle_type_id     = $request->calculator_vehicle_type_id;
        $calculator->status                         = $request->status;

        $calculator->save();

        return redirect(route('admin.calculator.engine-capacity.index'))->with('message', ' Data Inserted Successfully');
    }

    public function editEngineCapacity($id) {
        $data                = [];
        $data['calculators'] = Calculator::all();
        $data['categories']  = CalculatorVehicleCategory::all();
        $data['capacity']    = CalculatorEnginCapacity::find($id);

        return view('backend.calculator.engine-capacity.edit', $data);
    }

    public function updateEngineCapacity(Request $request, $id) {
        $calculator                                 = CalculatorEnginCapacity::find($id);
        $calculator->calculator_vehicle_category_id = $request->calculator_vehicle_category_id;
        $calculator->status                         = $request->status;
        $calculator->calculator_vehicle_type_id     = $request->calculator_vehicle_type_id;
        $calculator->status                         = $request->status;

        $calculator->save();

        return redirect(route('admin.calculator.engine-capacity.index'))->with('message', 'Data Updated Successfully');
    }

    public function statusEngineCapacity($id) {
        $changeStatus         = CalculatorEnginCapacity::find($id);
        $changeStatus->status = $changeStatus->status == 1 ? '0' : '1';
        $changeStatus->save();

        return back()->with('message', 'Status Changed Successfully');
    }

    public function deleteEngineCapacity($id) {
        $changeStatus = CalculatorEnginCapacity::find($id);
        $changeStatus->delete();

        return back()->with('message', 'Status Changed Successfully');
    }

    //Peoples Personal Accident Insurance Starts

    public function createPPAccident() {
        $data                = [];
        $data['calculators'] = Calculator::all();

        return view('backend.calculator.people-personal-accident.create', $data);
    }

    public function indexPPAccident() {
        $data              = [];
        $data['accidents'] = CalculatorPeoplePersonalAccident::all();

        return view('backend.calculator.people-personal-accident.index', $data);
    }

    public function StorePPAccident(Request $request) {
        $validator = Validator::make($request->all(), []);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $calculator                      = new CalculatorPeoplePersonalAccident();
        $calculator->calculator_id       = $request->calculator_id;
        $calculator->hero_image          = ImageUpload::imageUpload($request->file('hero_image'), 'backend/img/calculator-peoples-personal-accident-hero-image/');
        $calculator->en_hero_title       = $request->en_hero_title;
        $calculator->bn_hero_title       = $request->bn_hero_title;
        $calculator->en_hero_subtitle    = $request->en_hero_subtitle;
        $calculator->bn_hero_subtitle    = $request->bn_hero_subtitle;
        $calculator->en_plan_type_name   = $request->en_plan_type_name;
        $calculator->bn_plan_type_name   = $request->bn_plan_type_name;
        $calculator->color_image         = ImageUpload::imageUpload($request->file('color_image'), 'backend/img/calculator-peoples-personal-accident-color-image/');
        $calculator->white_image         = ImageUpload::imageUpload($request->file('white_image'), 'backend/img/calculator-peoples-personal-accident-white-image/');
        $calculator->capital_sum_insured = $request->capital_sum_insured;
        $calculator->net_premium         = $request->net_premium;
        $calculator->vat                 = $request->vat;
        $calculator->teriff_code         = $request->teriff_code;
        $calculator->status              = $request->status;

        $calculator->save();

        return redirect(route('admin.calculator.peoples-personal-accident.index'))->with('message', ' Data Inserted Successfully');
    }

    public function editPPAccident($id) {
        $data                = [];
        $data['calculators'] = Calculator::all();
        $data['accident']    = CalculatorPeoplePersonalAccident::find($id);

        return view('backend.calculator.people-personal-accident.edit', $data);
    }

    public function updatePPAccident(Request $request, $id) {
        $calculator                      = CalculatorPeoplePersonalAccident::find($id);
        $calculator->calculator_id       = $request->calculator_id;
        $calculator->hero_image          = ImageUpload::imageUpload($request->file('hero_image'), 'backend/img/calculator-peoples-personal-accident-hero-image/', isset($id) ? CalculatorPeoplePersonalAccident::find($id)->hero_image : null);
        $calculator->en_hero_title       = $request->en_hero_title;
        $calculator->bn_hero_title       = $request->bn_hero_title;
        $calculator->en_hero_subtitle    = $request->en_hero_subtitle;
        $calculator->bn_hero_subtitle    = $request->bn_hero_subtitle;
        $calculator->en_plan_type_name   = $request->en_plan_type_name;
        $calculator->bn_plan_type_name   = $request->bn_plan_type_name;
        $calculator->color_image         = ImageUpload::imageUpload($request->file('color_image'), 'backend/img/calculator-peoples-personal-accident-color-image/', isset($id) ? CalculatorPeoplePersonalAccident::find($id)->color_image : null);
        $calculator->white_image         = ImageUpload::imageUpload($request->file('white_image'), 'backend/img/calculator-peoples-personal-accident-white-image/', isset($id) ? CalculatorPeoplePersonalAccident::find($id)->white_image : null);
        $calculator->capital_sum_insured = $request->capital_sum_insured;
        $calculator->net_premium         = $request->net_premium;
        $calculator->vat                 = $request->vat;
        $calculator->teriff_code         = $request->teriff_code;
        $calculator->status              = $request->status;

        $calculator->save();

        return redirect(route('admin.calculator.peoples-personal-accident.index'))->with('message', 'Data Updated Successfully');
    }

    public function statusPPAccident($id) {
        $changeStatus         = CalculatorPeoplePersonalAccident::find($id);
        $changeStatus->status = $changeStatus->status == 1 ? '0' : '1';
        $changeStatus->save();

        return back()->with('message', 'Status Changed Successfully');
    }

    //Type of Institution Starts

    public function createInstitutionType() {
        $data                = [];
        $data['calculators'] = Calculator::all();

        return view('backend.calculator.institution-types.create', $data);
    }

    public function indexInstitutionType() {
        $data                 = [];
        $data['institutions'] = CalculatorInstitutionType::all();

        return view('backend.calculator.institution-types.index', $data);
    }

    public function StoreInstitutionType(Request $request) {
        $validator = Validator::make($request->all(), []);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $calculator                = new CalculatorInstitutionType();
        $calculator->calculator_id = $request->calculator_id;
        $calculator->en_name       = $request->en_name;
        $calculator->bn_name       = $request->bn_name;
        $calculator->color_image   = ImageUpload::imageUpload($request->file('color_image'), 'backend/img/calculator-institution-types-color-image/');
        $calculator->white_image   = ImageUpload::imageUpload($request->file('white_image'), 'backend/img/calculator-institution-types-white-image/');
        $calculator->status        = $request->status;

        $calculator->save();

        return redirect(route('admin.calculator.institution-types.index'))->with('message', ' Data Inserted Successfully');
    }

    public function editInstitutionType($id) {
        $data                = [];
        $data['calculators'] = Calculator::all();
        $data['institution'] = CalculatorInstitutionType::find($id);

        return view('backend.calculator.institution-types.edit', $data);
    }

    public function updateInstitutionType(Request $request, $id) {
        $calculator                = CalculatorInstitutionType::find($id);
        $calculator->calculator_id = $request->calculator_id;
        $calculator->en_name       = $request->en_name;
        $calculator->bn_name       = $request->bn_name;
        $calculator->color_image   = ImageUpload::imageUpload($request->file('color_image'), 'backend/img/calculator-institution-types-color-image/', isset($id) ? CalculatorInstitutionType::find($id)->color_image : null);
        $calculator->white_image   = ImageUpload::imageUpload($request->file('white_image'), 'backend/img/calculator-institution-types-white-image/', isset($id) ? CalculatorInstitutionType::find($id)->white_image : null);
        $calculator->status        = $request->status;

        $calculator->save();

        return redirect(route('admin.calculator.institution-types.index'))->with('message', 'Data Updated Successfully');
    }

    public function statusInstitutionType($id) {
        $changeStatus         = CalculatorInstitutionType::find($id);
        $changeStatus->status = $changeStatus->status == 1 ? '0' : '1';
        $changeStatus->save();

        return back()->with('message', 'Status Changed Successfully');
    }

    //Strike Riot Civil Commotion (SRCC) Type Starts

    public function createRiot() {
        $data                = [];
        $data['calculators'] = Calculator::all();

        return view('backend.calculator.strike-riot-civil-commotions.create', $data);
    }

    public function indexRiot() {
        $data                 = [];
        $data['institutions'] = CalculatorStrikeRiotCivilCommotion::all();

        return view('backend.calculator.strike-riot-civil-commotions.index', $data);
    }

    public function StoreRiot(Request $request) {
        $validator = Validator::make($request->all(), []);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $calculator                = new CalculatorStrikeRiotCivilCommotion();
        $calculator->calculator_id = $request->calculator_id;
        $calculator->en_name       = $request->en_name;
        $calculator->bn_name       = $request->bn_name;
        $calculator->status        = $request->status;

        $calculator->save();

        return redirect(route('admin.calculator.strike-riot-civil-commotions.index'))->with('message', ' Data Inserted Successfully');
    }

    public function editRiot($id) {
        $data                = [];
        $data['calculators'] = Calculator::all();
        $data['institution'] = CalculatorStrikeRiotCivilCommotion::find($id);

        return view('backend.calculator.strike-riot-civil-commotions.edit', $data);
    }

    public function updateRiot(Request $request, $id) {
        $calculator                = CalculatorStrikeRiotCivilCommotion::find($id);
        $calculator->calculator_id = $request->calculator_id;
        $calculator->en_name       = $request->en_name;
        $calculator->bn_name       = $request->bn_name;
        $calculator->status        = $request->status;

        $calculator->save();

        return redirect(route('admin.calculator.strike-riot-civil-commotions.index'))->with('message', 'Data Updated Successfully');
    }

    public function statusRiot($id) {
        $changeStatus         = CalculatorStrikeRiotCivilCommotion::find($id);
        $changeStatus->status = $changeStatus->status == 1 ? '0' : '1';
        $changeStatus->save();

        return back()->with('message', 'Status Changed Successfully');
    }

    //Insurance District Starts

    public function createInsDistricts() {
        $data                = [];
        $data['calculators'] = Calculator::all();

        return view('backend.calculator.insurance-districts.create', $data);
    }

    public function indexInsDistricts() {
        $data                 = [];
        $data['institutions'] = CalculatorInsuranceDistrict::all();

        return view('backend.calculator.insurance-districts.index', $data);
    }

    public function StoreInsDistricts(Request $request) {
        $validator = Validator::make($request->all(), []);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $calculator                = new CalculatorInsuranceDistrict();
        $calculator->calculator_id = $request->calculator_id;
        $calculator->en_name       = $request->en_name;
        $calculator->bn_name       = $request->bn_name;
        $calculator->status        = $request->status;

        $calculator->save();

        return redirect(route('admin.calculator.insurance-districts.index'))->with('message', ' Data Inserted Successfully');
    }

    public function editInsDistricts($id) {
        $data                = [];
        $data['calculators'] = Calculator::all();
        $data['institution'] = CalculatorInsuranceDistrict::find($id);

        return view('backend.calculator.insurance-districts.edit', $data);
    }

    public function updateInsDistricts(Request $request, $id) {
        $calculator                = CalculatorInsuranceDistrict::find($id);
        $calculator->calculator_id = $request->calculator_id;
        $calculator->en_name       = $request->en_name;
        $calculator->bn_name       = $request->bn_name;
        $calculator->status        = $request->status;

        $calculator->save();

        return redirect(route('admin.calculator.insurance-districts.index'))->with('message', 'Data Updated Successfully');
    }

    public function statusInsDistricts($id) {
        $changeStatus         = CalculatorInsuranceDistrict::find($id);
        $changeStatus->status = $changeStatus->status == 1 ? '0' : '1';
        $changeStatus->save();

        return back()->with('message', 'Status Changed Successfully');
    }

    //?Insured city Starts

    public function createInsuredCity() {
        $data = [];

        return view('backend.calculator.insured-city.create', $data);
    }

    public function indexInsuredCity() {
        $data                 = [];
        $data['institutions'] = CalculatorInsuredCity::all();

        return view('backend.calculator.insured-city.index', $data);
    }

    public function StoreInsuredCity(Request $request) {
        $validator = Validator::make($request->all(), []);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $calculator          = new CalculatorInsuredCity();
        $calculator->en_name = $request->en_name;
        $calculator->bn_name = $request->bn_name;
        $calculator->status  = $request->status;

        $calculator->save();

        return redirect(route('admin.calculator.insured-city.index'))->with('message', ' Data Inserted Successfully');
    }

    public function editInsuredCity($id) {
        $data                = [];
        $data['institution'] = CalculatorInsuredCity::find($id);

        return view('backend.calculator.insured-city.edit', $data);
    }

    public function updateInsuredCity(Request $request, $id) {
        $calculator          = CalculatorInsuredCity::find($id);
        $calculator->en_name = $request->en_name;
        $calculator->bn_name = $request->bn_name;
        $calculator->status  = $request->status;

        $calculator->save();

        return redirect(route('admin.calculator.insured-city.index'))->with('message', 'Data Updated Successfully');
    }

    public function statusInsuredCity($id) {
        $changeStatus         = CalculatorInsuredCity::find($id);
        $changeStatus->status = $changeStatus->status == 1 ? '0' : '1';
        $changeStatus->save();

        return back()->with('message', 'Status Changed Successfully');
    }

    //ajax request
    public function buildingConstructionType($id) {
        $data = CalculatorBuildingConstruction::where('calculator_id', $id)->get();

        return json_encode($data);
    }

    public function riskCover($id) {
        $data = CalculatorRiskCover::where('carried_by_id', $id)->where('status', 1)->get();

        return json_encode($data);
    }

    public function interestType($id) {
        $data = CalculatorMarineInterest::where('risk_coverage_id', $id)->where('status', 1)->get();

        return json_encode($data);
    }

}
