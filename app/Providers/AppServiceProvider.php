<?php

namespace App\Providers;

use App\Models\CalculationPersonalInfoValidation;
use App\Models\Calculator;
use App\Models\CalculatorInsuranceDistrict;
use App\Models\CalculatorInsuredCity;
use App\Models\Page;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        Paginator::useBootstrap();

        try {
            if (! Schema::hasTable('calculators')) {
                return;
            }

            view()->share('premium_calculator', Calculator::where('status', 1)->get());
            view()->share('insured_city', CalculatorInsuredCity::where('status', 1)->orderBy('en_name', 'asc')->get());
            view()->share('fire_district', CalculatorInsuranceDistrict::where('calculator_id', 1)->where('status', 1)->orderBy('en_name', 'asc')->get());
            view()->share('district', CalculatorInsuranceDistrict::where('status', 1)->orderBy('en_name', 'asc')->get());
            view()->share('pages', Page::get());
            view()->share('pv', CalculationPersonalInfoValidation::find(1));
        } catch (\Throwable) {
            // Database may not be available during composer install or first boot.
        }
    }
}
