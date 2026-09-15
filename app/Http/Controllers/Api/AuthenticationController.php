<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Calculator;
use App\Models\InvoiceSession;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AuthenticationController extends Controller
{
    // deleteAccount
    public function deleteAccount(Request $request)
    {
        $user = $request->user();
        $user->delete();
        return response()->json([
            'status' => true,
            'message' => 'Account deleted successfully',
        ]);
    }

    public function register(Request $request)
    {
        DB::beginTransaction();

        try {

            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|unique:users|email',
                'phone' => 'required|unique:users',
                'password' => 'required|min:8|confirmed',
            ]);

            if ($validator->fails()) {
                return $this->validationMessage($validator->errors());
            }

            $otp = config('app.demo_mode') ? 123456 : null;
            $user = User::create([
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'address' => $request->address,
                'otp' => $otp,
            ]);

            DB::commit();

            return $this->successMessage('Your account created!', $otp);

        } catch (\Throwable $th) {
            DB::rollBack();

            return $this->errorMessage($th);
        }

    }

    public function verifyOtp(Request $request)
    {

        $this->apiAuthCheck();

        try {
            DB::beginTransaction();
            $validator = Validator::make($request->all(), [
                'otp' => 'required|digits:6',
                'phone' => 'required',
            ]);

            if ($validator->fails()) {
                return $this->validationMessage($validator->errors());
            }

            if ($request->ref === 'forgot') {
                $password = DB::table('password_resets')->where('email', $request->phone)->where('token', $request->otp)->first();

                if (!$password) {
                    return $this->errorMessage('Invalid OTP or Phone number');
                }

                $password = DB::table('password_resets')->where('email', $request->phone)->delete();

                return $this->successMessage();

            }

            $user = User::where('phone', $request->phone)->first();

            if ($user && $user->otp == null) {
                return $this->successMessage('Your account is verified successfully');

            } else {
                return $this->errorMessage('Invalid OTP');
            }

            if ($user && $user->otp == $request->otp) {
                $user = User::where('phone', $request->phone)->first();
                $user->otp = null;
                $user->save();

                return $this->successMessage('Your account is verified successfully');

            } else {
                return $this->errorMessage('Invalid OTP');
            }

            DB::commit();

        } catch (\Throwable $th) {

            DB::rollBack();

            return $this->errorMessage('Something went wrong!!', '');
        }

    }

    public function resendOtp(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'phone' => 'required',
        ]);

        if ($validator->fails()) {

            return $this->validationMessage($validator->errors());
        }

        $user = User::where('phone', $request->phone)->first();

        if (!$user) {
            return $this->successMessage('Invalid account!');
        }

        $otp = 123456;

        if ($user && $request->ref == 'forgot') {
            DB::table('password_resets')->insert([
                'email' => $request->phone,
                'token' => 123456,
                'created_at' => now(),
            ]);
        } elseif ($user) {
            $user->otp = 123456;
            $user->save();
        } else {
            return back()->withToastError('This mobile number is no longer with our records');
        }

        return $this->successMessage('An 6 digit code has been sent to your phone!', $otp);

    }

    public function login(Request $request)
    {
        try {
            $request->validate([
                'email_or_phone' => 'required',
                'password' => 'required',
            ]);

            if (!filter_var($request->email_or_phone, FILTER_VALIDATE_EMAIL)) {

                if (!$auth = Auth::attempt([
                    'phone' => $request->email_or_phone,
                    'password' => $request->password,
                ])) {
                    return response()->json([
                        'status' => false,
                        'message' => 'Invalid account!!',
                    ]);
                }

            } else {

                if (!$auth = Auth::attempt([
                    'email' => $request->email_or_phone,
                    'password' => $request->password,
                ])) {
                    return response()->json([
                        'status' => false,
                        'message' => 'Invalid account!!',
                    ]);
                }

            }

            $data['user'] = $user = Auth::user();

            if ($user->otp != null) {
                auth()->logout();

                return $this->errorMessage('Unverified Account');
            }

            $data['tokenResult'] = $user->createToken('authToken')->plainTextToken;

            return $this->successMessage('Successfully Login', $data);

        } catch (Exception $error) {
            return response()->json([
                'status' => false,
                'message' => 'Error in Login',
            ]);
        }

    }

    public function storeForgotPassword(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'phone' => 'required',
        ]);

        if ($validator->fails()) {

            return $this->validationMessage($validator->errors());
        }

        $otp = 123456;

        $user = User::where('phone', $request->phone)->first();

        if (!$user) {
            return $this->errorMessage('This phone is no longer with our records!!');
        }

        DB::table('password_resets')->insert([
            'email' => $request->phone,
            'token' => $otp,
            'created_at' => now(),
        ]);

        return $this->successMessage('An 6 digit code has been sent to your phone!', $otp);

    }

    public function resetPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);

        if ($validator->fails()) {
            return $this->validationMessage($validator->errors());
        }

        $user = User::where('phone', $request->phone)->first();

        if (!$user) {
            return $this->errorMessage('Something went wrong');
        }

        if ($user) {
            $user->update(['password' => bcrypt($request->password)]);
            $user->save();

            return $this->successMessage('New password reset successfully!!');
        } else {
            return $this->errorMessage('The phone is no longer our record!!');
        }

    }

    public function logout(Request $request)
    {
        $user = $request->user();
        $user->tokens()->delete();
        Auth::guard('web')->logout();

        return response()->json([
            'status' => true,
            'message' => 'Successfully logged out',
        ]);
    }

    public function dashboard_draft()
    {
        $data = [];
        $data['orders'] = InvoiceSession::where('user_id', auth()->user()->id)->where('status', 'Pending')->orderByDesc('id')->get();
        return $this->successMessage('', $data);
    }

    public function dashboard()
    {
        $data = [];
        $data['orders'] = Order::where('user_id', auth()->user()->id)->with(
            'calculator',
            'invoiceDetails',
            'sellDetails',
            'risk',
            'occupation',
            'insuredPermanentCity',
            'insuredMailingCity',
        )->orderByDesc('id')->get();

        return $this->successMessage('', $data);
    }

    public function ciis($calculator_id)
    {
        $data = Order::where('calculator_id', $calculator_id)->with(
            'calculator',
            'invoiceDetails',
            'sellDetails',
            'risk',
            'occupation',
            'insuredPermanentCity',
            'insuredMailingCity',
        )->get();

        if (!$data) {
            return $this->errorMessage('No insurange');
        }

        return $this->successMessage('', $data);
    }

    public function calculator()
    {
        $data = Calculator::get();

        return $this->successMessage('', $data);
    }

}
