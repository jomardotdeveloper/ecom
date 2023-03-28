<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        return view('backend.my-profile', [
            'user' => auth()->user()
        ]);
    }

    public function changePersonalInformation(Request $request) {   
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email,' . auth()->user()->id,
        ]);

        $employee = auth()->user();

        $employee->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'middle_name' => $request->middle_name,
        ]);

        auth()->user()->update([
            'email' => $request->email,
        ]);

        if (auth()->user()->user_type == User::ADMIN)
            return redirect()->route('admin.profile')->with('success', 'Personal information updated successfully');
        else
            return redirect()->route('frontend.profile')->with('success', 'Personal information updated successfully');
    }

    public function changePassword(Request $request) {
        $request->validate([
            'password' => 'required|confirmed',
        ]);

        if(!Hash::check($request->current_password, auth()->user()->password)) {
            return back()->withErrors([
                'old_password' => 'Incorrect old password',
            ]);
        }


        auth()->user()->update([
            'password' => Hash::make($request->password),
        ]);

        if(auth()->user()->user_type == User::ADMIN)
            return redirect()->route('admin.profile')->with('success', 'Password updated successfully');
        else
            return redirect()->route('frontend.profile')->with('success', 'Password updated successfully');
    }
}
