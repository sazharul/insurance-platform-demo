<?php

if (!function_exists('parseLocale')) {
    function parseLocale()
    {
        $locale = request()->segment(1);

        if (in_array($locale, ['js', 'css'])) {
            return $locale;
        }

        if (array_key_exists($locale, config('languages'))) {
            app()->setLocale($locale);

            return $locale;
        }

        app()->setLocale('en'); // this default locale

        return '/';
    }
}

use App\Http\Controllers\BackendController;
use App\Http\Controllers\Backend\PremiumCalculatorManagementController;
use App\Http\Controllers\CalculationController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductAndServiceController;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Http\Controllers\UserAuthenticationController;
use Illuminate\Support\Facades\Route;

Route::prefix(parseLocale())->group(function () {
    Route::controller(ProductAndServiceController::class)->prefix('products-and-services')->name('ps.')->group(function () {
        Route::get('/', 'productAndService')->name('productAndService');
        Route::get('/fire-insurance', 'fire')->name('fire_insurance');
        Route::get('/marine-cargo-insurance', 'marineCargo')->name('marine_cargo_insurance');
        Route::get('/overseas-mediclaim-insurance', 'overseasMediclaim')->name('overseas_mediclaim_insurance');
        Route::get('/bangabandhu-surokkha-bima', 'bangabandhuBima')->name('bangabandhu_surokkha_bima');
        Route::get('/personal-accident-insurance', 'personalAccident')->name('personal_accident_insurance');
        Route::get('/motor-insurance', 'motorInsurance')->name('motor_insurance');
        Route::get('/cash-in-transit-insurance', 'cashInTransit')->name('cash_in_transit_insurance');
        Route::get('/people-personal-accident-insurance', 'peoplePersonalAccident')->name('people_personal_accident_insurance');
        Route::get('/cash-in-safe-insurance', 'cashInSafe')->name('cash_in_safe_insurance');
        Route::get('/cash-on-counter-insurance', 'cashOnCounter')->name('cash_on_counter_insurance');
        Route::get('/boiler-insurance', 'boilerInsurance')->name('boiler_insurance');
        Route::get('/flat-apartment-owner-insurance', 'flatApartmentInsurance')->name('flat_apartment_owner_insurance');
        Route::get('/underwriting', 'underwriting')->name('underwriting');
        Route::get('/reinsurance', 'reinsurance')->name('reinsurance');
        Route::get('/claim', 'claim')->name('claim');
        Route::get('/citizen-charter', 'citizenCharter')->name('citizen_charter');
        Route::get('/it-infrastructure', 'itInfrastructure')->name('it_infrastructure');

        Route::get('/product-and-services-insurance-details', 'insurance')->name('insurance.details');
        Route::get('/fire-insurance-details', 'fireInsurance')->name('fire.insurance.details');
        Route::get('/motor-insurance-details', 'motorInsuranceDetails')->name('motor.insurance.details');
        Route::get('/marine-cargo-insurance-details', 'marineInsurance')->name('marine.cargo.insurance.details');
        Route::get('/miscellaneous-insurance-details', 'miscellaneousInsurance')->name('miscellaneous.insurance.details');
        Route::get('/engineering-insurance-details', 'engineeringInsurance')->name('engineering.insurance.details');
        Route::get('/online-insurance', 'onlineInsurance')->name('online.insurance');
        //personal validated
        //ajax request
        Route::post('/property_or_occupation_and_member', 'propertyOrOccupationAndMember')->name('propertyOrOccupationAndMember');
        Route::post('/get-interest-type', 'getInterestType')->name('getInterestType');
        Route::post('/construction_type', 'constructionType')->name('constructionType');
        Route::post('/construction_roof_type', 'constructionRoofType')->name('constructionRoofType');
        Route::post('/carriedby_risk_cover', 'carriedbyRiskCover')->name('carriedbyRiskCover');
        Route::get('/om-countries', 'omCountries')->name('omCountries');
        Route::post('/marine-risk-coverage', 'marineRiskCoverage')->name('marineRiskCoverage');
        Route::post('/ajax-people-personal-accident', 'ajaxPeoplePersonalAccident')->name('ajaxPeoplePersonalAccident');
        Route::get('/cargo-product-details/{id}', 'getCargoProductDetails')->name('getCargoProductDetails');
        Route::post('/put-session-people-number', 'putSessionPeopleNumber')->name('putSessionPeopleNumber');
    });

    //user authentication -- users table
    Route::controller(UserAuthenticationController::class)->middleware('guest')->prefix('/user')->name('user.')->group(function () {
        Route::get('/register', 'register')->name('register');
        Route::post('/register-store', 'registerStore')->name('registerStore');
        Route::get('/verify-otp', 'verifyOTP')->name('verifyOTP');
        Route::post('/otp', 'OTP')->name('OTP');
        Route::post('/resend-otp', 'resendOTP')->name('resendOTP');
        Route::get('/login', 'login')->name('login');
        Route::post('/login-store', 'loginStore')->name('loginStore');
        Route::get('/forgot-password', 'forgotPassword')->name('forgotPassword');
        Route::post('/forgot-password-store', 'forgotPasswordStore')->name('forgotPasswordStore');
        Route::get('/reset-password', 'resetPassword')->name('resetPassword');
        Route::post('/reset-password-store', 'resetPasswordStore')->name('resetPasswordStore');
    });

    Route::controller(UserAuthenticationController::class)->middleware('auth')->prefix('/user')->name('user.')->group(function () {
        //authenticated route
        Route::get('/dashboard', 'dashboard')->name('dashboard');
        Route::get('/dashboard/draft', 'dashboard_draft')->name('dashboard_draft');
        Route::get('/change-password', 'change_password')->name('change_password');
        Route::post('/update-password', 'update_password')->name('update_password');
        Route::get('/logout', 'logout')->name('logout');
    });

    Route::middleware('auth')->group(function () {
        Route::get('/invoice-details/{id}', [InvoiceController::class, 'medical_invoice'])->name('medical_invoice');
        Route::get('/invoice-details-motor/{id}', [InvoiceController::class, 'motor_invoice'])->name('motor_invoice');
        Route::get('/invoice-details-personal/{id}', [InvoiceController::class, 'personal_invoice'])->name('personal_invoice');
        Route::get('/invoice-details-people-personal/{id}', [InvoiceController::class, 'people_personal_invoice'])->name('people_personal_invoice');
        Route::get('/invoice-details-bongobondhu/{id}', [InvoiceController::class, 'bongobondhu_invoice'])->name('bongobondhu_invoice');
        Route::get('/invoice-details-flat/{id}', [InvoiceController::class, 'flat_invoice'])->name('flat_invoice');
    });




    Route::controller(CalculationController::class)->prefix('/calculation')->name('calculation.')->group(function () {

        Route::post('/invoice', 'invoice')->name('invoice');

        Route::post('/fire', 'fire')->name('fire');
        Route::post('/marin', 'marin')->name('marin');
        Route::post('/motor', 'motor')->name('motor');

        Route::post('/mediclaim', 'mediclaim')->name('mediclaim');
        Route::post('/buy-mediclaim', 'buyMediclaim')->name('buyMediclaim')->middleware('auth');
        Route::post('/buy-motor', 'buyMotor')->name('buyMotor')->middleware('auth');

        Route::post('/personal-accident', 'personalAccident')->name('personalAccident');
        Route::post('/buy-personal-accident', 'buyPersonalAccident')->name('buyPersonalAccident')->middleware('auth');
        Route::post('/buy-people-personal-accident', 'buyPeoplePersonalAccident')->name('buyPeoplePersonalAccident')->middleware('auth');
        Route::post('/buy-bango-bondu-surokha-bima', 'buyBongoBunduSurokhaBima')->name('buyBongoBunduSurokhaBima')->middleware('auth');

        Route::post('/flat', 'flat')->name('flat');
        Route::post('/buy-flat', 'buyFlat')->name('buyFlat')->middleware('auth');

        Route::post('/cash-in-safe-and-transit-teriff', 'cashInSafeAndTransitTeriff')->name('cashInSafeAndTransitTeriff');
        Route::post('/cash-in-transit-transit-teriff', 'cashInTransit')->name('cashInTransitTransitTeriff');
        Route::post('/cash-on-counter-teriff', 'cashOnCounterTeriff')->name('cashOnCounterTeriff');
        Route::post('/boiler-teriff', 'boilerTeriff')->name('boilerTeriff');

        Route::post('/check-login', 'checkLogin')->name('checkLogin');
        Route::post('/certificate-details', 'certificateDetails')->name('certificateDetails');
        Route::post('/bongo-dob', 'bongoDob')->name('bongoDob');
    });
});

Route::middleware('auth:admin')->prefix('/admin')->name('admin.')->group(function () {

    Route::get('/personal-info', [BackendController::class, 'personalInfo'])->name('personal_info');
    Route::post('/save-personal-info', [BackendController::class, 'savePersonalInfo'])->name('save_personal_info');

    Route::controller(PremiumCalculatorManagementController::class)->prefix('/calculator')->name('calculator.')->group(function () {
        //fire fire additional coverage
        Route::get('/fire-additional-subcoverage-create', 'createFireAdditionalSubcoverage')->name('createFireAdditionalSubcoverage.create');
        Route::post('/fire-additional-subcoverage-store', 'StoreFireAdditionalSubcoverage')->name('StoreFireAdditionalSubcoverage.store');
        Route::get('/fire-additional-subcoverage-manage', 'indexFireAdditionalSubcoverage')->name('indexFireAdditionalSubcoverage.index');
        Route::get('/fire-additional-subcoverage-edit/{id}', 'editFireAdditionalSubcoverage')->name('editFireAdditionalSubcoverage.edit');
        Route::get('/fire-additional-subcoverage-details/{id}', 'detailsFireAdditionalSubcoverage')->name('detailsFireAdditionalSubcoverage.details');
        Route::get('/fire-additional-subcoverage-status/{id}', 'statusFireAdditionalSubcoverage')->name('statusFireAdditionalSubcoverage.status');
        Route::get('/fire-additional-subcoverage-default/{id}', 'defaultFireAdditionalSubcoverage')->name('defaultFireAdditionalSubcoverage.default');
        Route::get('/fire-additional-subcoverage/{id}', 'fireAdditionalSubcoverage')->name('fireAdditionalSubcoverage');
        Route::post('/fire-additional-subcoverage-update/{id}', 'updateFireAdditionalSubcoverage')->name('updateFireAdditionalSubcoverage.update');

        //fire fire additional coverage
        Route::get('/fire-additional-coverage-create', 'createFireAdditionalCoverage')->name('createFireAdditionalCoverage.create');
        Route::post('/fire-additional-coverage-store', 'StoreFireAdditionalCoverage')->name('StoreFireAdditionalCoverage.store');
        Route::get('/fire-additional-coverage-manage', 'indexFireAdditionalCoverage')->name('indexFireAdditionalCoverage.index');
        Route::get('/fire-additional-coverage-edit/{id}', 'editFireAdditionalCoverage')->name('editFireAdditionalCoverage.edit');
        Route::get('/fire-additional-coverage-details/{id}', 'detailsFireAdditionalCoverage')->name('detailsFireAdditionalCoverage.details');
        Route::get('/fire-additional-coverage-status/{id}', 'statusFireAdditionalCoverage')->name('statusFireAdditionalCoverage.status');
        Route::get('/fire-additional-coverage-default-status/{id}', 'defaultFireAdditionalCoverage')->name('defaultFireAdditionalCoverage.default');
        Route::post('/fire-additional-coverage-update/{id}', 'updateFireAdditionalCoverage')->name('updateFireAdditionalCoverage.update');

        //fire interest type teriff
        Route::get('/interest-type-create', 'createFireInterestTeriff')->name('createFireInterestTeriff.create');
        Route::post('/interest-type-store', 'StoreFireInterestTeriff')->name('StoreFireInterestTeriff.store');
        Route::get('/interest-type-manage', 'indexFireInterestTeriff')->name('indexFireInterestTeriff.index');
        Route::get('/interest-type-edit/{id}', 'editFireInterestTeriff')->name('editFireInterestTeriff.edit');
        Route::get('/interest-type-details/{id}', 'detailsFireInterestTeriff')->name('detailsFireInterestTeriff.details');
        Route::get('/interest-type-status/{id}', 'statusFireInterestTeriff')->name('statusFireInterestTeriff.status');
        Route::get('/fire-interest-type/{id}', 'fireInterestType')->name('fireInterestType');
        Route::post('/interest-type-update/{id}', 'updateFireInterestTeriff')->name('updateFireInterestTeriff.update');

        //marine interest insurance
        Route::get('/marine-interest-create', 'createMarineInterest')->name('createMarineInterest.create');
        Route::post('/marine-interest-store', 'StoreMarineInterest')->name('StoreMarineInterest.store');
        Route::get('/marine-interest-manage', 'indexMarineInterest')->name('indexMarineInterest.index');
        Route::get('/marine-interest-edit/{id}', 'editMarineInterest')->name('editMarineInterest.edit');
        Route::get('/marine-interest-details/{id}', 'detailsMarineInterest')->name('detailsMarineInterest.details');
        Route::get('/marine-interest-status/{id}', 'statusMarineInterest')->name('statusMarineInterest.status');
        Route::post('/marine-interest-update/{id}', 'updateMarineInterest')->name('updateMarineInterest.update');

        //marine interest insurance
        Route::get('/marine-teriff-create', 'createMarineTeriff')->name('createMarineTeriff.create');
        Route::post('/marine-teriff-store', 'StoreMarineTeriff')->name('StoreMarineTeriff.store');
        Route::get('/marine-teriff-manage', 'indexMarineTeriff')->name('indexMarineTeriff.index');
        Route::get('/marine-teriff-edit/{id}', 'editMarineTeriff')->name('editMarineTeriff.edit');
        Route::get('/marine-teriff-details/{id}', 'detailsMarineTeriff')->name('detailsMarineTeriff.details');
        Route::get('/marine-teriff-status/{id}', 'statusMarineTeriff')->name('statusMarineTeriff.status');
        Route::post('/marine-teriff-update/{id}', 'updateMarineTeriff')->name('updateMarineTeriff.update');

        //flat/apartment insurance
        Route::get('/flat-apartment-insurance-create', 'createFlatTeriff')->name('createFlatTeriff.create');
        Route::post('/flat-apartment-insurance-store', 'StoreFlatTeriff')->name('StoreFlatTeriff.store');
        Route::get('/flat-apartment-insurance-manage', 'indexFlatTeriff')->name('indexFlatTeriff.index');
        Route::get('/flat-apartment-insurance-edit/{id}', 'editFlatTeriff')->name('editFlatTeriff.edit');
        Route::get('/flat-apartment-insurance-details/{id}', 'detailsFlatTeriff')->name('detailsFlatTeriff.details');
        Route::get('/flat-apartment-insurance-status/{id}', 'statusFlatTeriff')->name('statusFlatTeriff.status');
        Route::post('/flat-apartment-insurance-update/{id}', 'updateFlatTeriff')->name('updateFlatTeriff.update');

        //personal accident insurance
        Route::get('/personal-accident-insurance-create', 'createPersonalAccidentTeriff')->name('createPersonalAccidentTeriff.create');
        Route::post('/personal-accident-insurance-store', 'StorePersonalAccidentTeriff')->name('StorePersonalAccidentTeriff.store');
        Route::get('/personal-accident-insurance-manage', 'indexPersonalAccidentTeriff')->name('indexPersonalAccidentTeriff.index');
        Route::get('/personal-accident-insurance-edit/{id}', 'editPersonalAccidentTeriff')->name('editPersonalAccidentTeriff.edit');
        Route::get('/personal-accident-insurance-details/{id}', 'detailsPersonalAccidentTeriff')->name('detailsPersonalAccidentTeriff.details');
        Route::get('/personal-accident-insurance-status/{id}', 'statusPersonalAccidentTeriff')->name('statusPersonalAccidentTeriff.status');
        Route::post('/personal-accident-insurance-update/{id}', 'updatePersonalAccidentTeriff')->name('updatePersonalAccidentTeriff.update');

        //cash in safe teriff
        Route::get('/cash-in-safe-teriff-create', 'createCashInSafeTeriff')->name('createCashInSafeTeriff.create');
        Route::post('/cash-in-safe-teriff-store', 'StoreCashInSafeTeriff')->name('StoreCashInSafeTeriff.store');
        Route::get('/cash-in-safe-teriff-manage', 'indexCashInSafeTeriff')->name('indexCashInSafeTeriff.index');
        Route::get('/cash-in-safe-teriff-edit/{id}', 'editCashInSafeTeriff')->name('editCashInSafeTeriff.edit');
        Route::get('/cash-in-safe-teriff-details/{id}', 'detailsCashInSafeTeriff')->name('detailsCashInSafeTeriff.details');
        Route::get('/cash-in-safe-teriff-status/{id}', 'statusCashInSafeTeriff')->name('statusCashInSafeTeriff.status');
        Route::post('/cash-in-safe-teriff-update/{id}', 'updateCashInSafeTeriff')->name('updateCashInSafeTeriff.update');

        //cash in transit
        Route::get('/cash-in-transit-teriff-create', 'createCashInTransitTeriff')->name('createCashInTransitTeriff.create');
        Route::post('/cash-in-transit-teriff-store', 'StoreCashInTransitTeriff')->name('StoreCashInTransitTeriff.store');
        Route::get('/cash-in-transit-teriff-manage', 'indexCashInTransitTeriff')->name('indexCashInTransitTeriff.index');
        Route::get('/cash-in-transit-teriff-edit/{id}', 'editCashInTransitTeriff')->name('editCashInTransitTeriff.edit');
        Route::get('/cash-in-transit-teriff-details/{id}', 'detailsCashInTransitTeriff')->name('detailsCashInTransitTeriff.details');
        Route::get('/cash-in-transit-teriff-status/{id}', 'statusCashInTransitTeriff')->name('statusCashInTransitTeriff.status');
        Route::post('/cash-in-transit-teriff-update/{id}', 'updateCashInTransitTeriff')->name('updateCashInTransitTeriff.update');

        //cash in counter
        Route::get('/cash-in-counter-teriff-create', 'createCashInCounterTeriff')->name('createCashInCounterTeriff.create');
        Route::post('/cash-in-counter-teriff-store', 'StoreCashInCounterTeriff')->name('StoreCashInCounterTeriff.store');
        Route::get('/cash-in-counter-teriff-manage', 'indexCashInCounterTeriff')->name('indexCashInCounterTeriff.index');
        Route::get('/cash-in-counter-teriff-edit/{id}', 'editCashInCounterTeriff')->name('editCashInCounterTeriff.edit');
        Route::get('/cash-in-counter-teriff-details/{id}', 'detailsCashInCounterTeriff')->name('detailsCashInCounterTeriff.details');
        Route::get('/cash-in-counter-teriff-status/{id}', 'statusCashInCounterTeriff')->name('statusCashInCounterTeriff.status');
        Route::post('/cash-in-counter-teriff-update/{id}', 'updateCashInCounterTeriff')->name('updateCashInCounterTeriff.update');

        Route::get('/premium-calculator-create', 'createCalculator')->name('create');
        Route::post('/premium-calculator-store', 'StoreCalculator')->name('store');
        Route::get('/premium-calculator-manage', 'indexCalculator')->name('index');
        Route::get('/premium-calculator-edit/{id}', 'editCalculator')->name('edit');
        Route::get('/premium-calculator-details/{id}', 'detailsCalculator')->name('details');
        Route::get('/premium-calculator-status/{id}', 'statusCalculator')->name('status');
        Route::post('/premium-calculator-update/{id}', 'updateCalculator')->name('update');
        Route::post('/premium-calculator-accept/{id}', 'acceptCalculatorInsurane')->name('acceptCalculatorInsurance');
        Route::get('/premium-calculator-invoice/{id}', 'invoiceCalculatorInsurane')->name('invoiceCalculatorInsurane');
        Route::get('/premium-calculator-invoice-edit/{id}', 'invoiceCalculatorInsuraneEdit')->name('invoiceCalculatorInsuraneEdit');
        Route::post('/premium-calculator-invoice-edit-update/{id}', 'invoiceCalculatorInsuraneEditUpdate')->name('invoiceCalculatorInsuraneEditUpdate');

        //Select Property Location Starts

        Route::get('/premium-calculator-property-create', 'createLocation')->name('property.create');
        Route::post('/premium-calculator-property-store', 'StoreLocation')->name('property.store');
        Route::get('/premium-calculator-property-manage', 'indexLocation')->name('property.index');
        Route::get('/premium-calculator-property-edit/{id}', 'editLocation')->name('property.edit');
        Route::get('/premium-calculator-property-status/{id}', 'statusLocation')->name('property.status');
        Route::post('/premium-calculator-property-update/{id}', 'updateLocation')->name('property.update');

        //Type of Property Or Occupation Starts

        Route::get('/premium-calculator-occupation-create', 'createOccupation')->name('occupation.create');
        Route::post('/premium-calculator-occupation-store', 'StoreOccupation')->name('occupation.store');
        Route::get('/premium-calculator-occupation-manage', 'indexOccupation')->name('occupation.index');
        Route::get('/premium-calculator-occupation-edit/{id}', 'editOccupation')->name('occupation.edit');
        Route::get('/premium-calculator-occupation-status/{id}', 'statusOccupation')->name('occupation.status');
        Route::post('/premium-calculator-occupation-update/{id}', 'updateOccupation')->name('occupation.update');

        //member of association

        Route::get('/premium-calculator-member-associations-create', 'createAssociation')->name('associations.create');
        Route::post('/premium-calculator-member-associations-store', 'StoreAssociation')->name('associations.store');
        Route::get('/premium-calculator-member-associations-manage', 'indexAssociation')->name('associations.index');
        Route::get('/premium-calculator-member-associations-edit/{id}', 'editAssociation')->name('associations.edit');
        Route::get('/premium-calculator-member-associations-status/{id}', 'statusAssociation')->name('associations.status');
        Route::post('/premium-calculator-member-associations-update/{id}', 'updateAssociation')->name('associations.update');

        //building construction
        Route::get('/premium-calculator-building-constructions-create', 'createBuildConst')->name('building-constructions.create');
        Route::post('/premium-calculator-building-constructions-store', 'StoreBuildConst')->name('building-constructions.store');
        Route::get('/premium-calculator-building-constructions-manage', 'indexBuildConst')->name('building-constructions.index');
        Route::get('/premium-calculator-building-constructions-edit/{id}', 'editBuildConst')->name('building-constructions.edit');
        Route::get('/premium-calculator-building-constructions-status/{id}', 'statusBuildConst')->name('building-constructions.status');
        Route::post('/premium-calculator-building-constructions-update/{id}', 'updateBuildConst')->name('building-constructions.update');

        //Building Construction roofs Starts

        Route::get('/premium-calculator-building-construction-roofs-create', 'createRoofs')->name('construction-roofs.create');
        Route::post('/premium-calculator-building-construction-roofs-store', 'StoreRoofs')->name('construction-roofs.store');
        Route::get('/premium-calculator-building-construction-roofs-manage', 'indexRoofs')->name('construction-roofs.index');
        Route::get('/premium-calculator-building-construction-roofs-edit/{id}', 'editRoofs')->name('construction-roofs.edit');
        Route::get('/premium-calculator-building-construction-roofs-status/{id}', 'statusRoofs')->name('construction-roofs.status');
        Route::post('/premium-calculator-building-construction-roofs-update/{id}', 'updateRoofs')->name('construction-roofs.update');

        //Interest Type Starts
        Route::get('/premium-calculator-interest-type-create', 'createInterest')->name('interest-type.create');
        Route::post('/premium-calculator-interest-type-store', 'StoreInterest')->name('interest-type.store');
        Route::get('/premium-calculator-interest-type-manage', 'indexInterest')->name('interest-type.index');
        Route::get('/premium-calculator-interest-type-edit/{id}', 'editInterest')->name('interest-type.edit');
        Route::get('/premium-calculator-interest-type-status/{id}', 'statusInterest')->name('interest-type.status');
        Route::post('/premium-calculator-interest-type-update/{id}', 'updateInterest')->name('interest-type.update');

        //Additional Coverage Starts

        Route::get('/premium-calculator-additional-coverage-create', 'createAdditional')->name('additional-coverage.create');
        Route::post('/premium-calculator-additional-coverage-store', 'StoreAdditional')->name('additional-coverage.store');
        Route::get('/premium-calculator-additional-coverage-manage', 'indexAdditional')->name('additional-coverage.index');
        Route::get('/premium-calculator-additional-coverage-edit/{id}', 'editAdditional')->name('additional-coverage.edit');
        Route::get('/premium-calculator-additional-coverage-status/{id}', 'statusAdditional')->name('additional-coverage.status');
        Route::post('/premium-calculator-additional-coverage-update/{id}', 'updateAdditional')->name('additional-coverage.update');

        //Cargo Product Starts

        Route::get('/premium-calculator-cargo-products-create', 'createCargo')->name('cargo-products.create');
        Route::post('/premium-calculator-cargo-products-store', 'StoreCargo')->name('cargo-products.store');
        Route::get('/premium-calculator-cargo-products-manage', 'indexCargo')->name('cargo-products.index');
        Route::get('/premium-calculator-cargo-products-edit/{id}', 'editCargo')->name('cargo-products.edit');
        Route::get('/premium-calculator-cargo-products-status/{id}', 'statusCargo')->name('cargo-products.status');
        Route::post('/premium-calculator-cargo-products-update/{id}', 'updateCargo')->name('cargo-products.update');

        //        Tariff Type Starts

        Route::get('/premium-calculator-tariff-type-create', 'createTariff')->name('tariff-types.create');
        Route::post('/premium-calculator-tariff-type-store', 'StoreTariff')->name('tariff-types.store');
        Route::get('/premium-calculator-tariff-type-manage', 'indexTariff')->name('tariff-types.index');
        Route::get('/premium-calculator-tariff-type-edit/{id}', 'editTariff')->name('tariff-types.edit');
        Route::get('/premium-calculator-tariff-type-status/{id}', 'statusTariff')->name('tariff-types.status');
        Route::post('/premium-calculator-tariff-type-update/{id}', 'updateTariff')->name('tariff-types.update');

        Route::get('/premium-calculator-boiler-tariff-type-create', 'createBoilerTeriff')->name('boilerTeriff.create');
        Route::post('/premium-calculator-boiler-tariff-type-store', 'StoreBoilerTeriff')->name('boilerTeriff.store');
        Route::get('/premium-calculator-boiler-tariff-type-manage', 'indexBoilerTeriff')->name('boilerTeriff.index');
        Route::get('/premium-calculator-boiler-tariff-type-edit/{id}', 'editBoilerTeriff')->name('boilerTeriff.edit');
        Route::get('/premium-calculator-boiler-tariff-type-status/{id}', 'statusBoilerTeriff')->name('boilerTeriff.status');
        Route::post('/premium-calculator-boiler-tariff-type-update/{id}', 'updateBoilerTeriff')->name('boilerTeriff.update');

        //       Tariff Type Ends

        //Carried By Starts

        Route::get('/premium-calculator-carried-by-create', 'createCarried')->name('carried-bies.create');
        Route::post('/premium-calculator-carried-by-store', 'StoreCarried')->name('carried-bies.store');
        Route::get('/premium-calculator-carried-by-manage', 'indexCarried')->name('carried-bies.index');
        Route::get('/premium-calculator-carried-by-edit/{id}', 'editCarried')->name('carried-bies.edit');
        Route::get('/premium-calculator-carried-by-status/{id}', 'statusCarried')->name('carried-bies.status');
        Route::post('/premium-calculator-carried-by-update/{id}', 'updateCarried')->name('carried-bies.update');

        //Insurance Sub Type Starts

        Route::get('/premium-calculator-insurance-sub-type-create', 'createSubInsType')->name('insurance-sub-type.create');
        Route::post('/premium-calculator-insurance-sub-type-store', 'StoreSubInsType')->name('insurance-sub-type.store');
        Route::get('/premium-calculator-insurance-sub-type-manage', 'indexSubInsType')->name('insurance-sub-type.index');
        Route::get('/premium-calculator-insurance-sub-type-edit/{id}', 'editSubInsType')->name('insurance-sub-type.edit');
        Route::get('/premium-calculator-insurance-sub-type-status/{id}', 'statusSubInsType')->name('insurance-sub-type.status');
        Route::post('/premium-calculator-insurance-sub-type-update/{id}', 'updateSubInsType')->name('insurance-sub-type.update');

        //Countries to be Visited Starts

        Route::get('/premium-calculator-country-visits-create', 'createCountryVisit')->name('country-visits.create');
        Route::post('/premium-calculator-country-visits-store', 'StoreCountryVisit')->name('country-visits.store');
        Route::get('/premium-calculator-country-visits-manage', 'indexCountryVisit')->name('country-visits.index');
        Route::get('/premium-calculator-country-visits-edit/{id}', 'editCountryVisit')->name('country-visits.edit');
        Route::get('/premium-calculator-country-visits-status/{id}', 'statusCountryVisit')->name('country-visits.status');
        Route::post('/premium-calculator-country-visits-update/{id}', 'updateCountryVisit')->name('country-visits.update');

        //only Countries

        Route::get('/premium-calculator-country-create', 'createCountry')->name('country.create');
        Route::post('/premium-calculator-country-store', 'StoreCountry')->name('country.store');
        Route::get('/premium-calculator-country-manage', 'indexCountry')->name('country.index');
        Route::get('/premium-calculator-country-edit/{id}', 'editCountry')->name('country.edit');
        Route::get('/premium-calculator-country-status/{id}', 'statusCountry')->name('country.status');
        Route::post('/premium-calculator-country-update/{id}', 'updateCountry')->name('country.update');

        //Bangabandhu Suraksha Bima Starts

        Route::get('/premium-calculator-bangabandhu-suraksha-bima-create', 'createSurakshaBima')->name('bangabandhu-suraksha-bima.create');
        Route::post('/premium-calculator-bangabandhu-suraksha-bima-store', 'StoreSurakshaBima')->name('bangabandhu-suraksha-bima.store');
        Route::get('/premium-calculator-bangabandhu-suraksha-bima-manage', 'indexSurakshaBima')->name('bangabandhu-suraksha-bima.index');
        Route::get('/premium-calculator-bangabandhu-suraksha-bima-edit/{id}', 'editSurakshaBima')->name('bangabandhu-suraksha-bima.edit');
        Route::post('/premium-calculator-bangabandhu-suraksha-bima-update/{id}', 'updateSurakshaBima')->name('bangabandhu-suraksha-bima.update');

        //Risk Cover Starts

        Route::get('/premium-calculator-risk-cover-create', 'createRiskCover')->name('risk-cover.create');
        Route::post('/premium-calculator-risk-cover-store', 'StoreRiskCover')->name('risk-cover.store');
        Route::get('/premium-calculator-risk-cover-manage', 'indexRiskCover')->name('risk-cover.index');
        Route::get('/premium-calculator-risk-cover-edit/{id}', 'editRiskCover')->name('risk-cover.edit');
        Route::get('/premium-calculator-risk-cover-status/{id}', 'statusRiskCover')->name('risk-cover.status');
        Route::post('/premium-calculator-risk-cover-update/{id}', 'updateRiskCover')->name('risk-cover.update');

        //Motor Insurance Starts

        Route::get('/premium-calculator-motor-insurance-create', 'createMotorInsurance')->name('motor-insurance.create');
        Route::post('/premium-calculator-motor-insurance-store', 'StoreMotorInsurance')->name('motor-insurance.store');
        Route::get('/premium-calculator-motor-insurance-manage', 'indexMotorInsurance')->name('motor-insurance.index');
        Route::get('/premium-calculator-motor-insurance-edit/{id}', 'editMotorInsurance')->name('motor-insurance.edit');
        Route::get('/premium-calculator-motor-insurance-status/{id}', 'statusMotorInsurance')->name('motor-insurance.status');
        Route::post('/premium-calculator-motor-insurance-update/{id}', 'updateMotorInsurance')->name('motor-insurance.update');

        //Vehicle Category Starts

        Route::get('/premium-calculator-vehicle-category-create', 'createVehicleCategory')->name('vehicle-category.create');
        Route::post('/premium-calculator-vehicle-category-store', 'StoreVehicleCategory')->name('vehicle-category.store');
        Route::get('/premium-calculator-vehicle-category-manage', 'indexVehicleCategory')->name('vehicle-category.index');
        Route::get('/premium-calculator-vehicle-category-edit/{id}', 'editVehicleCategory')->name('vehicle-category.edit');
        Route::get('/premium-calculator-vehicle-category-status/{id}', 'statusVehicleCategory')->name('vehicle-category.status');
        Route::post('/premium-calculator-vehicle-category-update/{id}', 'updateVehicleCategory')->name('vehicle-category.update');

        //Vehicle Type Starts

        Route::get('/premium-calculator-vehicle-types-create', 'createVehicleType')->name('vehicle-types.create');
        Route::post('/premium-calculator-vehicle-types-store', 'StoreVehicleType')->name('vehicle-types.store');
        Route::get('/premium-calculator-vehicle-types-manage', 'indexVehicleType')->name('vehicle-types.index');
        Route::get('/premium-calculator-vehicle-types-edit/{id}', 'editVehicleType')->name('vehicle-types.edit');
        Route::get('/premium-calculator-vehicle-types-status/{id}', 'statusVehicleType')->name('vehicle-types.status');
        Route::post('/premium-calculator-vehicle-types-update/{id}', 'updateVehicleType')->name('vehicle-types.update');

        //Engine Capacity Starts

        Route::get('/premium-calculator-engine-capacity-create', 'createEngineCapacity')->name('engine-capacity.create');
        Route::post('/premium-calculator-engine-capacity-store', 'StoreEngineCapacity')->name('engine-capacity.store');
        Route::get('/premium-calculator-engine-capacity-manage', 'indexEngineCapacity')->name('engine-capacity.index');
        Route::get('/premium-calculator-engine-capacity-edit/{id}', 'editEngineCapacity')->name('engine-capacity.edit');
        Route::get('/premium-calculator-engine-capacity-status/{id}', 'statusEngineCapacity')->name('engine-capacity.status');
        Route::delete('/premium-calculator-engine-capacity-delete/{id}', 'deleteEngineCapacity')->name('engine-capacity.delete');
        Route::post('/premium-calculator-engine-capacity-update/{id}', 'updateEngineCapacity')->name('engine-capacity.update');

        //Type of Institution Starts

        Route::get('/premium-calculator-institution-types-create', 'createInstitutionType')->name('institution-types.create');
        Route::post('/premium-calculator-institution-types-store', 'StoreInstitutionType')->name('institution-types.store');
        Route::get('/premium-calculator-institution-types-manage', 'indexInstitutionType')->name('institution-types.index');
        Route::get('/premium-calculator-institution-types-edit/{id}', 'editInstitutionType')->name('institution-types.edit');
        Route::get('/premium-calculator-institution-types-status/{id}', 'statusInstitutionType')->name('institution-types.status');
        Route::post('/premium-calculator-institution-types-update/{id}', 'updateInstitutionType')->name('institution-types.update');

        //Peoples Personal Accident Insurance Starts

        Route::get('/premium-calculator-peoples-personal-accident-insurance-create', 'createPPAccident')->name('peoples-personal-accident.create');
        Route::post('/premium-calculator-peoples-personal-accident-insurance-store', 'StorePPAccident')->name('peoples-personal-accident.store');
        Route::get('/premium-calculator-peoples-personal-accident-insurance-manage', 'indexPPAccident')->name('peoples-personal-accident.index');
        Route::get('/premium-calculator-peoples-personal-accident-insurance-edit/{id}', 'editPPAccident')->name('peoples-personal-accident.edit');
        Route::get('/premium-calculator-peoples-personal-accident-insurance-status/{id}', 'statusPPAccident')->name('peoples-personal-accident.status');
        Route::post('/premium-calculator-peoples-personal-accident-insurance-update/{id}', 'updatePPAccident')->name('peoples-personal-accident.update');

        //Peoples Personal Accident Insurance Starts

        Route::get('/premium-calculator-strike-riot-civil-commotions-create', 'createRiot')->name('strike-riot-civil-commotions.create');
        Route::post('/premium-calculator-strike-riot-civil-commotions-store', 'StoreRiot')->name('strike-riot-civil-commotions.store');
        Route::get('/premium-calculator-strike-riot-civil-commotions-manage', 'indexRiot')->name('strike-riot-civil-commotions.index');
        Route::get('/premium-calculator-strike-riot-civil-commotions-edit/{id}', 'editRiot')->name('strike-riot-civil-commotions.edit');
        Route::get('/premium-calculator-strike-riot-civil-commotions-status/{id}', 'statusRiot')->name('strike-riot-civil-commotions.status');
        Route::post('/premium-calculator-strike-riot-civil-commotions-update/{id}', 'updateRiot')->name('strike-riot-civil-commotions.update');

        //Peoples Personal Accident Insurance Starts

        Route::get('/premium-calculator-insurance-districts-create', 'createInsDistricts')->name('insurance-districts.create');
        Route::post('/premium-calculator-insurance-districts-store', 'StoreInsDistricts')->name('insurance-districts.store');
        Route::get('/premium-calculator-insurance-districts-manage', 'indexInsDistricts')->name('insurance-districts.index');
        Route::get('/premium-calculator-insurance-districts-edit/{id}', 'editInsDistricts')->name('insurance-districts.edit');
        Route::get('/premium-calculator-insurance-districts-status/{id}', 'statusInsDistricts')->name('insurance-districts.status');
        Route::post('/premium-calculator-insurance-districts-update/{id}', 'updateInsDistricts')->name('insurance-districts.update');

        //insured city
        Route::get('/premium-calculator-insured-city-create', 'createInsuredCity')->name('insured-city.create');
        Route::post('/premium-calculator-insured-city-store', 'StoreInsuredCity')->name('insured-city.store');
        Route::get('/premium-calculator-insured-city-manage', 'indexInsuredCity')->name('insured-city.index');
        Route::get('/premium-calculator-insured-city-edit/{id}', 'editInsuredCity')->name('insured-city.edit');
        Route::get('/premium-calculator-insured-city-status/{id}', 'statusInsuredCity')->name('insured-city.status');
        Route::post('/premium-calculator-insured-city-update/{id}', 'updateInsuredCity')->name('insured-city.update');

        //ajax request
        Route::get('/building-construction-type/{id}', 'buildingConstructionType')->name('buildingConstructionType');
        Route::get('/risk_cover/{id}', 'riskCover');
        Route::get('/interest_type/{id}', 'interestType');
    });
});

//payment process
Route::post('/pay', [SslCommerzPaymentController::class, 'index']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
