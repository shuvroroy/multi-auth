<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;

class AdminAuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    public function showLoginForm()
    {
        return view('auth.admin-login');
    }

    public function login(Request $request)
    {
        // Validate the form data
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        // User data
        $credentials = [
            'email'    => $request->email,
            'password' => $request->password
        ];

        // Attempt to log the user in
        if (Auth::guard('admin')->attempt($credentials, $request->remember)) {
            // If successful, then redirect to their intented location
            return redirect()->intended(route('admin.home'));
        } else {
            // Throw error message
            throw ValidationException::withMessages([
                    'email' => [trans('auth.failed')],
            ]);
            // If unsuccessful, then redirect back to the login with form data
            return redirect()->back()->withInput($request->only('email', 'remember'));
        }
    }
}
