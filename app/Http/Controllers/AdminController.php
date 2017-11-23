<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Company;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
    */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
    */
    public function index()
    {
        return view('admin.home');
    }

    /**
     * Show all Unapproved companies
     */
    public function showCompanies()
    {
        $companies = Company::where('is_active', 0)->latest()->paginate(8);

        return view('admin.admin-company', compact('companies'));
    }

    /**
     * Approve the company
     */
    public function approveCompany(Company $company)
    {
        $company->is_active = true;
        $company->save();

        return back()->withSuccess("{$company->name} company has been approved successfully");
    }

    /**
     * Reject the company
     */
    public function rejectCompany(Company $company)
    {
        $company->delete();

        return back()->withSuccess("{$company->name} company has been reject successfully");
    }

    /**
     * Show all Unapproved employees
     */
    public function showEmployees()
    {
        $employees = User::where('is_active', 0)->latest()->paginate(8);

        return view('admin.admin-employee', compact('employees'));
    }

    /**
     * Approve the employee
     */
    public function approveEmployee(User $employee)
    {
        $employee->is_active = 1;
        $employee->save();

        return back()->withSuccess("{$employee->name} employee has been approved successfully");
    }

    /**
     * Reject the employee
     */
    public function rejectEmployee(User $employee)
    {
        $employee->delete();

        return back()->withSuccess("{$employee->name} employee has been reject successfully");
    }
}
