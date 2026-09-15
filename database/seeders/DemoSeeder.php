<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\HomePage;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DemoSeeder extends Seeder
{
    public function run(): void
    {
        Admin::query()->create([
            'name' => 'Demo Admin',
            'email' => 'admin@coversure.demo',
            'password' => Hash::make('DemoAdmin123!'),
            'phone' => '01700000001',
            'status' => 1,
        ]);

        User::query()->create([
            'name' => 'Demo Customer',
            'email' => 'customer@coversure.demo',
            'phone' => '01700000002',
            'password' => Hash::make('DemoUser123!'),
            'address' => 'Demo City, Bangladesh',
            'otp' => null,
        ]);

        HomePage::query()->create([
            'email' => 'contact@coversure.demo',
            'phone' => '02-00000000',
            'mobile' => '01700-000000',
            'en_location' => 'Demo Business District, Dhaka, Bangladesh',
            'bn_location' => 'ডেমো বিজনেস ডিস্ট্রিক্ট, ঢাকা, বাংলাদেশ',
            'main_logo' => 'images/icon/coversure_logo.png',
            'en_title' => 'Welcome to CoverSure Insurance',
            'bn_title' => 'কভারশিওর ইন্স্যুরেন্সে স্বাগতম',
            'en_description' => 'Calculate premiums online for fire, motor, marine, and more. This is a portfolio demo — not affiliated with any production insurer.',
            'bn_description' => 'অগ্নি, মোটর, মেরিন এবং আরও অনেক কিছুর জন্য অনলাইনে প্রিমিয়াম গণনা করুন।',
            'slider1' => 'images/website/hero_center_img.png',
            'slider2' => 'images/website/hero_right_top_img.png',
            'slider3' => 'images/website/hero_right_bottom_img.png',
            'en_online_calculator_title' => 'Online Premium Calculator',
            'bn_online_calculator_title' => 'অনলাইন প্রিমিয়াম ক্যালকুলেটর',
            'en_online_calculator_description' => 'Get an accurate quote for the coverage you need in a few simple steps.',
            'bn_online_calculator_description' => 'কয়েকটি সহজ ধাপে আপনার প্রয়োজনীয় কভারেজের সঠিক কোট পান।',
            'en_work_process_title' => 'How It Works',
            'bn_work_process_title' => 'কিভাবে কাজ করে',
            'en_work_process_description' => 'Get your insurance in four simple steps.',
            'bn_work_process_description' => 'চারটি সহজ ধাপে আপনার ইন্স্যুরেন্স পান।',
            'footer_logo' => 'images/icon/coversure_logo.png',
            'en_footer_logo_description' => 'CoverSure Insurance — portfolio demo platform.',
            'bn_footer_logo_description' => 'কভারশিওর ইন্স্যুরেন্স — পোর্টফোলিও ডেমো প্ল্যাটফর্ম।',
            'en_all_rights_reserved' => 'All rights reserved. CoverSure Insurance Demo.',
            'bn_all_rights_reserved' => 'সর্বস্বত্ব সংরক্ষিত। কভারশিওর ইন্স্যুরেন্স ডেমো।',
        ]);
    }
}
