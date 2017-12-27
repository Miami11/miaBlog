<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePassword;
use Illuminate\Http\Request;
use Hash;
use App\User;

class ChangeProfileController extends Controller
{
    public function editPassword()
    {
        return view('auth.passwords.change');
    }

    public function changePassword(User $user, ChangePassword $request)
    {
//        dd($request->input('current-password'));
        if (Hash::check($request->input('current-password'), $user->password)) {
            $user->update([
                $user->password => Hash::make($request->input('new_password'))
            ]);
            $user->save();

            $request->session()->flash('success', 'Password changed');
            return Redirect()->back();
        } else {
            $request->session()->flash('error', 'Password does not match');
            return Redirect()->back();
        }
    }
}