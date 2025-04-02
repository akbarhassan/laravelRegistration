<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
// use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Auth;

class LearnerController extends Controller
{
    public function showRegistrationForm()
    {
        return view('learner.register');
    }

    // handle register

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email:rfc,dns|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'given_name' => 'required|string|max:255',
            'gender' => 'required|in:male,female,other',
            'cpr' => 'required|string|unique:users',
            'phone_number' => 'required|string|unique:users',
            'org_name' => 'required|string|max:255',
            'is_representative' => 'required|boolean',
            'citizen' => 'required|boolean',
            'how_did_you_hear' => 'required|string',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'learner',
            'given_name' => $request->given_name,
            'gender' => $request->gender,
            'cpr' => $request->cpr,
            'phone_number' => $request->phone_number,
            'org_name' => $request->org_name,
            'is_representative' => $request->is_representative,
            'citizen' => $request->citizen,
            'how_did_you_hear' => $request->how_did_you_hear,
        ]);

        return redirect('/login/learner')->with('success', 'Registration successful! Pleas log in');
    }


    public function showLoginForm()
    {
        return view('learner.login');
    }

    public function login(Request $request)
    {
        $creds = $request->only('email', 'password');
        if (Auth::attempt($creds)) {
            if (Auth::user()->role === 'learner') {
                return redirect()->route('learner.welcome');
            } else {
                Auth::logout();
                return back()->withErrors(['email' => 'Not Authorized as learner']);
            }
        }
        return back()->withErrors(['email' => 'Invalid creadentials']);
    }

    public function welcome()
    {
        if (Auth::user()->role !== 'learner') {
            return redirect('/login/learner')->withErrors(['email' => 'Unauthorized access.']);
        }

        return view('learner.welcome');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login/learner')->with('success', 'You have been logged out.');
    }
}
