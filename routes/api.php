<?php

use App\Http\Controllers\Api\AuthenticationController;
use App\Http\Controllers\Api\CalculationController;
use App\Http\Controllers\Api\InvoiceDraftController;
use App\Http\Controllers\Api\PremiumCalculatorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return response()->json([
        'status' => true,
        'user' => $request->user(),
    ]);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/invoice-draft', [InvoiceDraftController::class, 'invoice_draft'])->name('add.invoice_draft');
    Route::post('/invoice-draft/{id}', [InvoiceDraftController::class, 'invoice_draft_get'])->name('add.invoice_draft_get');
});

//Route::get('/invoice-draft', [InvoiceDraftController::class, 'invoice_draft'])->name('add.invoice_draft');

Route::controller(PremiumCalculatorController::class)->group(function () {
    //fire insurance
    Route::get('/get-district-list', 'getDistrict');
    Route::get('/get-insurance', 'getInsurance');
    Route::get('/get-country', 'getCountry');
    Route::get('/get-property-occupation-member/{calculator_id}', 'getPropertyOccupationMember');
    Route::get('/get-member-by-property-occupation/{calculator_id}/{occupation_id}', 'getMemberByPropertyOccupation');
    Route::get('/get-building-construction-type/{calculator_id}', 'getBuildingConstructionType');
    // Route::get('/get-building-construction-roof-type/{calculator_id}/{calculator_building_construction_id}', 'getBuildingConstructionRoofType');
    Route::get('/get-interest-type/{calculator_id}', 'getInterestType');
    Route::get('/get-additianal-coverage/{calculator_id}', 'getAdditionalCoverage');
    Route::get('/get-bangabandhu-surokkha-bima/{calculator_id}', 'getBangabandhuSurokkhaBima');
    Route::get('/get-cargo-products/{calculator_id}', 'getCargoProducts');
    Route::get('/get-carried-by/{calculator_id}', 'getCarriedBy');
    Route::get('/get-country-visit/{calculator_id}', 'getCountryVisit');
    Route::get('/get-engin-capacity/{calculator_id}/{calculator_vehicle_category_id}', 'getEnginCapacity');
    Route::get('/get-institution-type/{calculator_id}', 'getInstitutionType');
    Route::get('/get-insurance-district/{calculator_id}', 'getInsuranceDistrict');
    Route::get('/get-insurance-sub-type/{calculator_id}', 'getInsuranceSubType');
    Route::get('/get-member-association/{calculator_id}', 'getMemberAssociation');
    Route::get('/get-motor-insurance/{calculator_id}', 'getMotorInsurance');
    Route::get('/get-people-personal-accident/{calculator_id}', 'getPeoplePersonalAccident');
    Route::get('/get-property-location/{calculator_id}', 'getPropertyLocation');
    Route::get('/get-property-or-occupation-type/{calculator_id}', 'getPropertyOrOccupationType');
    Route::get('/get-risk-cover/{calculator_id}', 'getRiskCover');
    Route::get('/get-strike-riot-civil-commotion/{calculator_id}', 'getStrikeRiotCivilCommotion');
    Route::get('/get-tariff-type/{calculator_id}', 'getTariffType');
    Route::get('/get-vehicle-category/{calculator_id}', 'getVehicleCategory');
    Route::get('/get-vehicle-type/{calculator_id}/{calculator_vehicle_category_id}', 'getVehicleType');

    Route::post('/marine-risk-coverage', 'marineRiskCoverage')->name('marineRiskCoverage');
    //calculation

});

Route::controller(CalculationController::class)->prefix('/calculation')->group(function () {
    Route::post('/fire', 'fire');
    Route::post('/marin', 'marin');
    Route::post('/overseas-mediclaim', 'overseasMediclaimUpdate');
    //Route::post('/overseas-mediclaim', 'overseasMediclaim');
    Route::post('/personal-accident', 'personalAccident');
    Route::post('/flat', 'flat');
    Route::post('/cash-in-safe', 'cashInSafe');
    Route::post('/cash-in-transit', 'cashInTransit');
    Route::post('/cash-on-counter', 'cashOnCounter');
    Route::post('/boiler', 'boiler');
    Route::post('/check-district/{additional_coverage_id}', 'checkDistrict');
    Route::post('/certificate-details', 'certificateDetails')->middleware('auth:sanctum');
});

Route::controller(AuthenticationController::class)->prefix('/auth')->group(function () {
    Route::delete('/delete-account', 'deleteAccount')->middleware('auth:sanctum');
    Route::post('/register', 'register');
    Route::post('/verify-otp', 'verifyOtp');
    Route::post('/login', 'login');
    Route::post('/store-forgot-password', 'storeForgotPassword');
    Route::post('/reset-password', 'resetPassword');
    Route::post('/resend-otp', 'resendOTP');
    Route::post('/logout', 'logout')->middleware('auth:sanctum');
    Route::post('/dashboard', 'dashboard')->middleware('auth:sanctum');
    Route::post('/dashboard/draft', 'dashboard_draft')->middleware('auth:sanctum');
});

Route::post('/ciis/{calculator_id}', [AuthenticationController::class, 'ciis']);
Route::post('/calculator', [AuthenticationController::class, 'calculator']);
