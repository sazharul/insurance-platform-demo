<?php

namespace App\Http\Controllers;

use App\Models\InvoiceSession;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserAuthenticationController extends Controller
{
    public function register()
    {
        return view('frontend.auth.register');
    }

    public function registerStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required|unique:users',
            'address' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }

        $otp = 123456;
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => bcrypt($request->password),
            'otp' => $otp,
        ]);

        session()->put('phone', $request->phone);

        return to_route('user.verifyOTP', ['ref' => 'auth'])->withToastSuccess('An OTP is send to your mobile number.');

    }

    public function verifyOTP()
    {

        if (request()->ref == 'auth' || request()->ref == 'log' || request()->ref == 'forgot') {
            // session()->forget('phone');

            return view('frontend.auth.otp');
        } else {
            return view('frontend.auth.login');
        }

    }

    public function resendOTP(Request $request)
    {
        $user = User::where('phone', $request->phone)->first();

        if (!isset($user)) {
            return back()->withToastSuccess('You are not registered yet');
        }

        $user->otp = 123456;
        $user->save();

        return back()->withToastSuccess('A fresh OTP is send to your mobile');
    }

    public function OTP(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'otp' => 'required|digits:6',
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }

        if ($request->ref === 'forgot') {
            $password = DB::table('password_resets')->where('email', session('phone'))->where('token', $request->otp)->first();

            if (!$password) {
                return to_route('user.login')->withToastError('Invalid OTP');
            }

            $password = DB::table('password_resets')->where('email', session('phone'))->delete();

            return to_route('user.resetPassword');

        }

        $user = User::where('phone', session('phone'))->whereNotNull('otp')->first();

        if ($user && $user->otp == $request->otp) {
            $user->otp = null;
            $user->save();

            session()->forget('phone');

            return to_route('user.login')->withToastSuccess('Your account is verified successfully');
        } else {
            return back()->withToastError('Invalid OTP');
        }

    }

    public function login()
    {

        if (request()->ref == 'self') {
            session()->forget('calculationType');
        }

        return view('frontend.auth.login');
    }

    public function loginStore(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required|min:8',
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }

        if (!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {

            if (!Auth::attempt([
                'phone' => $request->email,
                'password' => $request->password,
            ])) {
                return back()->withToastError('Your account is invalid');
            } else {

                if (auth()->user()->otp) {
                    session()->put('phone', auth()->user()->phone);
                    auth()->logout();
                    return to_route('user.verifyOTP', ['ref' => 'log']);
                } else {

                    if (session('calculationType') == 'flat') {
                        $data = session('flat');

                        return view('frontend.product-and-service.form.flat', $data);
                    } elseif (session('calculationType') == 'personal') {
                        $data = session('personal');

                        return view('frontend.product-and-service.form.personal-accident', $data);
                    } elseif (session('calculationType') == 'bongo') {
                        $data = session('bongo');

                        return view('frontend.product-and-service.form.bango-bondu-surokha-bima', $data);
                    } elseif (session('calculationType') == 'people') {
                        $data = session('people');

                        return view('frontend.product-and-service.form.people-personal-accident', $data);
                    } elseif (session('calculationType') == 'motor') {
                        $data = session('motor');
                        // dd($data);

                        return view('frontend.product-and-service.form.motor', $data);
                    } elseif (session('calculationType') == 'medaclaim') {
                        $data = session('medaclaim');
                        // dd($data);

                        return view('frontend.product-and-service.form.mediclaim', $data);
                    }

                    return to_route('user.dashboard');
                }

            }

        } else {

            if (!Auth::attempt([
                'email' => $request->email,
                'password' => $request->password,
            ])) {
                return back()->withToastError('Your account is invalid');
            } else {

                if (auth()->user()->otp) {
                    session()->put('phone', auth()->user()->phone);
                    auth()->logout();

                    return to_route('user.verifyOTP', ['ref' => 'log']);
                } else {

                    if (session('calculationType') == 'flat') {
                        $data = session('flat');

                        return view('frontend.product-and-service.form.flat', $data);
                    } elseif (session('calculationType') == 'personal') {
                        $data = session('personal');

                        return view('frontend.product-and-service.form.personal-accident', $data);
                    } elseif (session('calculationType') == 'bongo') {
                        $data = session('bongo');

                        return view('frontend.product-and-service.form.bango-bondu-surokha-bima', $data);
                    } elseif (session('calculationType') == 'people') {
                        $data = session('people');

                        return view('frontend.product-and-service.form.people-personal-accident', $data);
                    } elseif (session('calculationType') == 'motor') {
                        $data = session('motor');
                        // dd($data);

                        return view('frontend.product-and-service.form.motor', $data);
                    } elseif (session('calculationType') == 'medaclaim') {
                        $data = session('medaclaim');
                        // dd($data);

                        return view('frontend.product-and-service.form.mediclaim', $data);
                    }

                    return to_route('user.dashboard');
                }

            }

        }

    }

    public function forgotPassword()
    {
        return view('frontend.auth.forgot-password');
    }

    public function forgotPasswordStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }

        $user = User::where('phone', $request->phone)->first();

        if ($user) {
            DB::table('password_resets')->insert([
                'email' => $request->phone,
                'token' => 123456,
                'created_at' => now(),
            ]);
            $user->update([
                'otp' => '123456'
            ]);
        } else {
            return back()->withToastError('This mobile number is no longer with our records');
        }

        session()->put('phone', $request->phone);

        return to_route('user.verifyOTP', ['ref' => 'forgot'])->withToastSuccess('An OTP is send to your mobile phone');

    }

    public function resetPassword()
    {
        return view('frontend.auth.reset-password');
    }

    public function resetPasswordStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }

        $user = User::where('phone', session('phone'))->first();

        if (!$user || !session('phone')) {
            return to_route('user.login')->withToastError('Something went wrong');
        }

        $user->password = bcrypt($request->password);
        $user->save();

        session()->forget('phone');

        return to_route('user.login')->withToastError('Your password reset successfully');
    }

    public function update_password(Request $request)
    {
        $old_password = $request->old_password;
        $user = Auth::user();

        $this->validate($request, [
            'old_password' => ['required', 'string', 'min:8'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if (Hash::check($old_password, $user->password)) {
            $user->update([
                'password' => Hash::make($request->password)
            ]);

            $request->session()->flash('success', 'Password changed successfully');
            return redirect()->back();

        } else {
            $request->session()->flash('error', 'Old Password does not match');
            return redirect()->back();
        }
    }

    public function change_password()
    {
        return view('frontend.auth.chnage_password');
    }

    public function dashboard_draft()
    {
        $data = [];
        $data['orders'] = InvoiceSession::where('user_id', auth()->user()->id)->where('status', 'Pending')->orderByDesc('id')->get();
        return view('frontend.auth.dashboard_draft', $data);
    }

    public function dashboard()
    {
        $data = [];
        $data['orders'] = Order::where('user_id', auth()->user()->id)->orderByDesc('id')->get();
        return view('frontend.auth.dashboard', $data);
    }

    public function logout()
    {
        session()->forget('calculationType');
        auth()->logout();

        return to_route('home')->withToastSuccess('Logout successful');
    }

}
