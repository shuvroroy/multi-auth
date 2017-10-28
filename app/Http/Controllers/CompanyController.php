<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:company');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('company.home');
    }

    public function showProfile(Company $company)
    {
        return view('company.profile', compact('company'));
    }

    public function editProfile(Company $company)
    {
        // Authorization
        $this->authorize('touchCompany', $company->profile);

        return view('company.editprofile', compact('company'));
    }

    public function updateProfile(Request $request, Company $company)
    {
        // Authorization
        $this->authorize('touchCompany', $company->profile);

        $company->profile()->update([
            'address' => $request->address,
            'phone' => $request->phone,
            'bio' => $request->bio
        ]);

        if ($request->logo) {
            // Save the image
            $featured          = $request->logo;
            $featured_new_name = time() . $featured->getClientOriginalName();
            $featured->move('uploads/custom/logo/company/', $featured_new_name);

            $company->logo = 'uploads/custom/logo/company/' . $featured_new_name;
            $company->save();
        }

        return redirect(route('company.show', $company))->withSuccess('Company profile updated successfully!');
    }
}
