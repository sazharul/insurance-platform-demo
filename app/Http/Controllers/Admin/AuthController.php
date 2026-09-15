<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Testing\Fluent\Concerns\Has;

class AuthController extends Controller
{
    public function change_password()
    {
        return view('admin.auth.change_password');
    }
    public function save_password(Request $request)
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

            $request->session()->flash('success', 'Password changed');
            return redirect()->back();

        } else {
            $request->session()->flash('error', 'Password does not match');
            return redirect()->back();
        }
    }
}
