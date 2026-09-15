<?php

namespace App\Http\Controllers;

use App\Models\InvoiceSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{

    public function motor_invoice($id)
    {
        $auth_user = Auth::user();
        $data['invoice_info'] = $invoice_info = InvoiceSession::where('user_id', $auth_user->id)
            ->where('id', $id)
            ->first();

        if (isset($data['invoice_info'])) {
            $data['allData'] = $allData = json_decode($invoice_info->data);
            $data['personalInfo'] = $requestData = json_decode($invoice_info->data1);
            $data['calculator'] = $allData->calculator;
            $data['tariff'] = $allData->tariff;
            $data['risk_cover'] = $allData->risk_cover;

            if ($allData->calculator->id == 3) {
                return view('frontend.invoice.motor', $data);
            }
        } else {
            return "<h1>No Data Found</h1>";
        }

    }

    public function medical_invoice($id)
    {

        $auth_user = Auth::user();
        $data['invoice_info'] = $invoice_info = InvoiceSession::where('user_id', $auth_user->id)
            ->where('id', $id)
            ->first();


        if (isset($data['invoice_info'])) {
            $data['allData'] = $allData = json_decode($invoice_info->data);
            $data['personalInfo'] = $requestData = json_decode($invoice_info->data1);

            $data['calculator'] = $allData->calculator;
            $data['country'] = $allData->country;

            if ($allData->calculator->id == 4) {
                return view('frontend.invoice.medical', $data);
            }
        } else {
            return "<h1>No Data Found</h1>";
        }

    }

    public function personal_invoice($id)
    {
        $auth_user = Auth::user();
        $data['invoice_info'] = $invoice_info = InvoiceSession::where('user_id', $auth_user->id)
            ->where('id', $id)
            ->first();


        if (isset($data['invoice_info'])) {
            $data['allData'] = $allData = json_decode($invoice_info->data);
            $data['personalInfo'] = $requestData = json_decode($invoice_info->data1);
            $data['calculator'] = $allData->calculator;
            $data['teriff'] = $allData->teriff;
            $data['request_all'] = $allData->request_all;

            if ($allData->calculator->id == 5) {
                return view('frontend.invoice.personal', $data);
            }
        } else {
            return "<h1>No Data Found</h1>";
        }
    }

    public function people_personal_invoice($id)
    {
        $auth_user = Auth::user();
        $data['invoice_info'] = $invoice_info = InvoiceSession::where('user_id', $auth_user->id)
            ->where('id', $id)
            ->first();


        if (isset($data['invoice_info'])) {
            $data['allData'] = $allData = json_decode($invoice_info->data);
            $data['personalInfo'] = $requestData = json_decode($invoice_info->data1);
            $data['calculator'] = $allData->calculator;
            $data['type'] = $type = $invoice_info->data2;

            if ($type == 1) {
                $id = 0;
            } else {
                $id = 1;
            }

            $data['people'] = $allData->people->calculator_people_personal_accident[$id];

            if ($allData->calculator->id == 6) {
                return view('frontend.invoice.people_personal', $data);
            }
        } else {
            return "<h1>No Data Found</h1>";
        }
    }

    public function bongobondhu_invoice($id)
    {
        $auth_user = Auth::user();
        $data['invoice_info'] = $invoice_info = InvoiceSession::where('user_id', $auth_user->id)
            ->where('id', $id)
            ->first();


        if (isset($data['invoice_info'])) {
            $data['allData'] = $allData = json_decode($invoice_info->data);
            $data['personalInfo'] = $requestData = json_decode($invoice_info->data1);
            $data['calculator'] = $allData->calculator;
            $data['calculation'] = $allData->item->calculator_bangabandhu_suraksha_bima;

            if ($allData->calculator->id == 7) {
                return view('frontend.invoice.bongobondhu', $data);
            }
        } else {
            return "<h1>No Data Found</h1>";
        }
    }

    public function flat_invoice($id)
    {
        $auth_user = Auth::user();
        $data['invoice_info'] = $invoice_info = InvoiceSession::where('user_id', $auth_user->id)
            ->where('id', $id)
            ->first();


        if (isset($data['invoice_info'])) {
            $data['allData'] = $allData = json_decode($invoice_info->data);
            $data['personalInfo'] = $requestData = json_decode($invoice_info->data1);
            $data['calculator'] = $allData->calculator;
            $data['criteria'] = $allData->criteria;
            $data['request_all'] = $allData->request_all;

            if ($allData->calculator->id == 8) {
                return view('frontend.invoice.flat', $data);
            }
        } else {
            return "<h1>No Data Found</h1>";
        }
    }
}
