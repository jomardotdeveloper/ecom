<?php

namespace App\Http\Controllers;

use App\Models\Code;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function login()
    {
        return view('backend.login');
    }

    public function forgot()
    {
        return view('backend.forgot');
    }

    public function reset() {
        $linkIsValid = false;


        if (isset($_GET['email']) && isset($_GET['code'])) {
            $email = $_GET['email'];
            $code = $_GET['code'];
            $code = Code::where('email', $email)->where('code', $code)->first();
            if ($code) {
                $linkIsValid = true;
            }
        }

        return view('backend.reset', [
            'linkIsValid' => $linkIsValid
        ]);
    } 

    public function resetPassword(Request $request) {
        $validated = $request->validate([
            "password" => "required|confirmed",
        ]);

        $user = User::where('email', $request->email)->first();
        $user->password = Hash::make($validated['password']);
        $user->save();
        return redirect()->route('login')->with('success', 'Password reset successfully');
    }

    public function send(Request $request)
    {

        $validated = $request->validate([
            "email" => "required|email"
        ]);

        $user = User::where('email', $validated['email'])->first();
        if ($user) {
            $code = Code::create([
                'code' => rand(100000, 999999),
                'email' => $validated['email']
            ]);
            $this->sendEmail($code->email, $code->code);
            // $user->sendPasswordResetNotification($user->createToken('authToken')->plainTextToken);
            return redirect()->route('login')->with('success', 'Password reset link sent to your email');
        } else {
            return back()->withErrors([
                'email' => 'Email Not Found',
            ]);
        }
        // return view('backend.register');
    }



    public function authenticate(Request $request){
        $validated = $request->validate([
            "email" => "required",
            "password" => "required"
        ]);

        if (Auth::attempt($validated, true)) {
            $request->session()->regenerate();
            if(Auth::user()->user_type == User::ADMIN)
                return redirect()->intended("/admin/dashboard");
            else 
                return redirect()->route('frontend.index');
        }


        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route("login");
    }
}
