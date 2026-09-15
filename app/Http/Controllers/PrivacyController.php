<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrivacyController extends Controller
{
    public function deletion_policy()
    {
        return view('frontend.privacy.deletion-policy');
    }

    public function privacyPolicy()
    {
        return view('frontend.privacy.privacy-and-policy');
    }

    public function termsCondition()
    {
        return view('frontend.privacy.terms-and-conditions');
    }
}
