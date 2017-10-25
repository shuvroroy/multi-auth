<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\Models\Company;
use App\Models\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;

class CompanyAuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:company');
    }

    public function showRegisterForm()
    {
        return view('auth.company-register');
    }

    public function register(Request $request)
    {
        // Validate the form data
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:companies',
            'password' => 'required|min:6|confirmed'
        ]);

        // Create the company
        $company = Company::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password'])
        ]);

        // Create a profile also
        $company->profile()->save(new Profile);

        return redirect(route('company.login'))->with('success', 'Account create successfully. Wait! until our team verified your account.');
    }

    public function showLoginForm()
    {
        return view('auth.company-login');
    }

    public function login(Request $request)
    {
        // Validate the form data
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('company')->attempt(['email' => $request->email, 'password' => $request->password, 'is_active' => 1], $request->remember)) {
            // If successful, then redirect to their intented location
            return redirect()->intended(route('company.home'));
        } else {
            if (Auth::guard('company')->attempt(['email' => $request->email, 'password' => $request->password])) {
                // Logout the user and send him a message
                Auth::guard('company')->logout();
                return redirect()->back()->with('success', 'Account create successfully. Wait! until our team verified your account.');
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
}
