<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\InvoiceSession;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class InvoiceDraftController extends Controller
{
    public function invoice_draft_get($id)
    {
        $auth_user = Auth::user();

        $invoice_info = InvoiceSession::where('user_id', $auth_user->id)
            ->where('id', $id)
            ->first();

        if (isset($invoice_info)) {
            return response()->json([
                'status' => true,
                'message' => 'Data found',
                'data' => $invoice_info,
            ]);
        } else {
            return response()->json([
                'status' => true,
                'message' => 'Data not found',
                'data' => $invoice_info,
            ]);
        }
    }

    public function invoice_draft(Request $request)
    {

        $personal = json_decode($request->personal_info);


        $data = json_decode($request->calculator_info);
        $calculator_data = json_encode($data);

        $type = $request->calculation_type;

        $post_data = [];

        if ($request->cirtificate_registration) {
            $cc_order = Order::where('code', $request->cirtificate_registration)->first();
        }

        if ($request->hasFile('insured_nid_file')) {

            $image_file = $request->file('insured_nid_file');

            if ($image_file) {

                $img_gen = hexdec(uniqid());
                $image_url = 'file/nid/';
                $image_ext = strtolower($image_file->getClientOriginalExtension());

                $img_name = $img_gen . '.' . $image_ext;
                $final_name1 = $image_url . $img_gen . '.' . $image_ext;

                $image_file->move($image_url, $img_name);
            }

        } elseif ($request->cirtificate_registration != null) {
            $final_name1 = $cc_order->insured_nid_file;
        }

        if ($request->hasFile('nominee_nid')) {

            $image_file = $request->file('nominee_nid');

            if ($image_file) {

                $img_gen = hexdec(uniqid());
                $image_url = 'file/nid/';
                $image_ext = strtolower($image_file->getClientOriginalExtension());

                $img_name = $img_gen . '.' . $image_ext;
                $final_name2 = $image_url . $img_gen . '.' . $image_ext;

                $image_file->move($image_url, $img_name);
            }

        } elseif ($request->cirtificate_registration != null) {
            $final_name2 = $cc_order->nominee_nid;
        }

        $personal->insured_nid_file = $final_name1 ?? '';
        $personal->nominee_nid = $final_name2 ?? '';


        $personal = json_encode($personal);

        $auth_user = Auth::user();

        if ($request->calculator_id == 3) {
            $find_session = InvoiceSession::create([
                'user_id' => $auth_user->id,
                'calculator_id' => $request->calculator_id,
                'email' => $auth_user->email,
                'phone' => $auth_user->phone,
                'calculator_name' => $request->calculator_name,
                'data' => $calculator_data,
                'data1' => $personal,
                'calculationType' => $type,
            ]);
        }

        if ($request->calculator_id == 4) {
            $find_session = InvoiceSession::create([
                'user_id' => $auth_user->id,
                'calculator_id' => $request->calculator_id,
                'email' => $auth_user->email,
                'phone' => $auth_user->phone,
                'calculator_name' => $request->calculator_name,
                'data' => $calculator_data,
                'data1' => $personal,
                'calculationType' => $type,
            ]);

        }

        if ($request->calculator_id == 5) {

            $find_session = InvoiceSession::create([
                'user_id' => $auth_user->id,
                'calculator_id' => $request->calculator_id,
                'email' => $auth_user->email,
                'phone' => $auth_user->phone,
                'calculator_name' => $request->calculator_name,
                'data' => $calculator_data,
                'data1' => $personal,
                'calculationType' => $type,
            ]);

        }

        if ($request->calculator_id == 6) {

            $find_session = InvoiceSession::create([
                'user_id' => $auth_user->id,
                'calculator_id' => $request->calculator_id,
                'email' => $auth_user->email,
                'phone' => $auth_user->phone,
                'calculator_name' => $request->calculator_name,
                'data' => $calculator_data,
                'data1' => $personal,
                'data2' => $request->type_number,
                'calculationType' => $type,
            ]);

        }

        if ($request->calculator_id == 7) {

            $find_session = InvoiceSession::create([
                'user_id' => $auth_user->id,
                'calculator_id' => $request->calculator_id,
                'email' => $auth_user->email,
                'phone' => $auth_user->phone,
                'calculator_name' => $request->calculator_name,
                'data' => $calculator_data,
                'data1' => $personal,
                'calculationType' => $type,
            ]);
        }

        if ($request->calculator_id == 8) {

            $find_session = InvoiceSession::create([
                'user_id' => $auth_user->id,
                'calculator_id' => $request->calculator_id,
                'email' => $auth_user->email,
                'phone' => $auth_user->phone,
                'calculator_name' => $request->calculator_name,
                'data' => $calculator_data,
                'data1' => $personal,
                'calculationType' => $type,
            ]);
        }

        if ($find_session) {
            return response()->json([
                'status' => true,
                'message' => 'Data found',
                'data' => $find_session,
            ]);
        } else {
            return response()->json([
                'status' => true,
                'message' => 'Data not found',
                'data' => $find_session,
            ]);
        }
    }
}
