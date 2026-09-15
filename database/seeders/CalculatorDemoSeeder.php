<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CalculatorDemoSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        $placeholder = 'images/icon/coversure_logo.png';

        $calculators = [
            ['id' => 1, 'en_name' => 'Fire Insurance', 'bn_name' => 'অগ্নি বীমা', 'slug' => 'fire-insurance'],
            ['id' => 2, 'en_name' => 'Marine Cargo Insurance', 'bn_name' => 'সামুদ্রিক মালবাহী বীমা', 'slug' => 'marine-cargo-insurance'],
            ['id' => 3, 'en_name' => 'Motor Insurance', 'bn_name' => 'মোটর বীমা', 'slug' => 'motor-insurance'],
            ['id' => 4, 'en_name' => 'Overseas Mediclaim', 'bn_name' => 'ওভারসিজ মেডিক্লেইম', 'slug' => 'overseas-mediclaim'],
            ['id' => 5, 'en_name' => 'Personal Accident', 'bn_name' => 'ব্যক্তিগত দুর্ঘটনা', 'slug' => 'personal-accident'],
        ];

        foreach ($calculators as $calc) {
            DB::table('calculators')->insert([
                'id' => $calc['id'],
                'en_name' => $calc['en_name'],
                'bn_name' => $calc['bn_name'],
                'slug' => $calc['slug'],
                'color_image' => $placeholder,
                'white_image' => $placeholder,
                'status' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }

        // Fire insurance lookup data (calculator_id = 1)
        DB::table('calculator_property_locations')->insert([
            'id' => 1, 'calculator_id' => 1, 'en_name' => 'Urban', 'bn_name' => 'শহুরে', 'status' => 1,
            'created_at' => $now, 'updated_at' => $now,
        ]);

        DB::table('calculator_property_or_occupation_types')->insert([
            'id' => 1, 'calculator_id' => 1, 'en_name' => 'Commercial', 'bn_name' => 'বাণিজ্যিক',
            'en_title' => 'Commercial Property', 'bn_title' => 'বাণিজ্যিক সম্পত্তি',
            'color_image' => $placeholder, 'white_image' => $placeholder, 'status' => 1,
            'created_at' => $now, 'updated_at' => $now,
        ]);

        DB::table('calculator_member_associations')->insert([
            'id' => 1, 'calculator_id' => 1, 'en_name' => 'General Member', 'bn_name' => 'সাধারণ সদস্য', 'status' => 1,
            'created_at' => $now, 'updated_at' => $now,
        ]);

        DB::table('calculator_building_constructions')->insert([
            'id' => 1, 'calculator_id' => 1,
            'en_class_title' => 'Class A', 'bn_class_title' => 'শ্রেণী এ',
            'en_hero_title' => 'Reinforced Concrete', 'bn_hero_title' => 'আরসিসি',
            'status' => 1, 'created_at' => $now, 'updated_at' => $now,
        ]);

        DB::table('calculation_fire_interest_teriffs')->insert([
            'location_id' => 1,
            'building_construction_id' => 1,
            'member_association_id' => 1,
            'occupation_id' => 1,
            'value' => 0.35,
            'status' => 1,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('calculator_additional_coverages')->insert([
            'id' => 1, 'en_name' => 'Earthquake', 'bn_name' => 'ভূমিকম্প',
            'color_image' => $placeholder, 'white_image' => $placeholder, 'status' => 1,
            'created_at' => $now, 'updated_at' => $now,
        ]);

        // Motor insurance (calculator_id = 3)
        DB::table('calculator_motor_insurances')->insert([
            'id' => 1, 'calculator_id' => 3, 'en_name' => 'Comprehensive', 'bn_name' => 'সম্পূর্ণ',
            'color_image' => $placeholder, 'white_image' => $placeholder, 'status' => 1,
            'created_at' => $now, 'updated_at' => $now,
        ]);

        DB::table('calculator_vehicle_categories')->insert([
            'id' => 1, 'calculator_id' => 3, 'en_name' => 'Private Car', 'bn_name' => 'প্রাইভেট কার', 'status' => 1,
            'created_at' => $now, 'updated_at' => $now,
        ]);

        DB::table('calculator_vehicle_types')->insert([
            'id' => 1, 'calculator_id' => 3, 'calculator_vehicle_category_id' => 1,
            'en_name' => 'Sedan', 'bn_name' => 'সেডান',
            'color_image' => $placeholder, 'white_image' => $placeholder,
            'value' => 2.5, 'status' => 1,
            'created_at' => $now, 'updated_at' => $now,
        ]);

        DB::table('calculator_risk_covers')->insert([
            'id' => 1, 'calculator_id' => 3, 'en_name' => 'Own Damage', 'bn_name' => 'নিজস্ব ক্ষতি',
            'value' => 2.5, 'status' => 1, 'created_at' => $now, 'updated_at' => $now,
        ]);

        DB::table('calculator_motor_tariff_prices')->insert([
            'insurance_type' => 'Comprehensive',
            'vehicle_category_id' => 1,
            'vehicle_type_id' => 1,
            'capacity_from' => 0,
            'capacity_to' => 3000,
            'price' => 15000,
            'status' => 1,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('passenger_prices')->insert([
            'passenger_price' => '150',
            'self_driver_price' => '200',
            'paid_driver_price' => '250',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        // Personal accident (calculator_id = 5)
        DB::table('calculator_property_or_occupation_types')->insert([
            'id' => 2, 'calculator_id' => 5, 'en_name' => 'Office Worker', 'bn_name' => 'অফিস কর্মী',
            'en_title' => 'Low Risk', 'bn_title' => 'কম ঝুঁকি',
            'color_image' => $placeholder, 'white_image' => $placeholder, 'status' => 1,
            'created_at' => $now, 'updated_at' => $now,
        ]);

        DB::table('calculator_risk_covers')->insert([
            'id' => 2, 'calculator_id' => 5, 'en_name' => 'Standard Cover', 'bn_name' => 'স্ট্যান্ডার্ড কভার',
            'value' => 1.5, 'status' => 1, 'created_at' => $now, 'updated_at' => $now,
        ]);

        DB::table('calculator_personal_accident_teriffs')->insert([
            'calculator_id' => 5,
            'occupation_id' => 2,
            'risk_coverage_id' => 2,
            'value' => 0.25,
            'status' => 1,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('calculation_personal_info_validations')->insert([
            'minimum' => 18,
            'maximum' => 1000000,
            'age' => 65,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        // Overseas mediclaim (calculator_id = 4)
        DB::table('calculator_insurance_sub_types')->insert([
            'id' => 1, 'calculator_id' => 4, 'en_name' => 'Standard Plan', 'bn_name' => 'স্ট্যান্ডার্ড প্ল্যান',
            'color_image' => $placeholder, 'white_image' => $placeholder, 'status' => 1,
            'created_at' => $now, 'updated_at' => $now,
        ]);

        DB::table('calculator_countries')->insert([
            'id' => 1, 'en_name' => 'Thailand', 'bn_name' => 'থাইল্যান্ড', 'type' => 1, 'status' => 1,
            'created_at' => $now, 'updated_at' => $now,
        ]);

        DB::table('calculator_country_visits')->insert([
            'insurance_sub_type_id' => 1,
            'country_type_id' => 1,
            'day_from' => 1,
            'day_to' => 30,
            'age_from' => 18,
            'age_to' => 65,
            'amount' => 2500,
            'amount_limit' => 500,
            'price_limit' => 2000,
            'next_price_limit' => 1000,
            'next_amount' => 200,
            'status' => 1,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        // Marine cargo (calculator_id = 2) — minimal tariff chain
        DB::table('calculator_cargo_products')->insert([
            'id' => 1, 'calculator_id' => 2, 'en_name' => 'General Cargo', 'bn_name' => 'সাধারণ মাল',
            'status' => 1, 'created_at' => $now, 'updated_at' => $now,
        ]);

        DB::table('calculator_carried_bies')->insert([
            'id' => 1, 'calculator_id' => 2, 'en_name' => 'Sea', 'bn_name' => 'সমুদ্র',
            'color_image' => $placeholder, 'white_image' => $placeholder, 'status' => 1,
            'created_at' => $now, 'updated_at' => $now,
        ]);

        DB::table('calculator_tariff_types')->insert([
            'id' => 1, 'calculator_id' => 2, 'en_name' => 'Standard Tariff', 'bn_name' => 'স্ট্যান্ডার্ড ট্যারিফ', 'status' => 1,
            'created_at' => $now, 'updated_at' => $now,
        ]);

        DB::table('calculator_risk_covers')->insert([
            'id' => 3, 'calculator_id' => 2, 'en_name' => 'All Risk', 'bn_name' => 'সকল ঝুঁকি',
            'value' => 1.0, 'status' => 1, 'created_at' => $now, 'updated_at' => $now,
        ]);

        DB::table('merin_teriffs')->insert([
            'cargo_product_id' => 1,
            'member_id' => null,
            'teriff_id' => 1,
            'carried_by_id' => 1,
            'risk_cover_id' => 3,
            'value' => 0.50,
            'status' => 1,
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }
}
