<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $creds = $request->only('email', 'password');
        if (Auth::attempt($creds)) {
            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.dashboard');
            } else {
                Auth::logout();
                return back()->withErrors(['email' => 'Not authorised admin']);
            }
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function dashboard(Request $request)
    {
        // Ensure only admins can access this page
        if (Auth::user()->role !== 'admin') {
            return redirect()->route('admin.login')->withErrors(['error' => 'You do not have the required permissions.']);
        }

        // Get the filter query from the request
        $filter = $request->input('filter', '');

        // Query learners with optional filtering
        $query = User::where('role', 'learner');
        if (!empty($filter)) {
            $query->where(function ($q) use ($filter) {
                $q->where('name', 'like', '%' . $filter . '%')
                  ->orWhere('email', 'like', '%' . $filter . '%');
            });
        }

        // Paginate the results
        $learners = $query->paginate(10); // 10 learners per page

        // Pass the filter value back to the view for retaining the input
        return view('admin.dashboard', compact('learners', 'filter'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login/admin')->with('success', 'You have been logged out.');
    }
}
