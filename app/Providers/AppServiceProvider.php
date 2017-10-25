<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Company;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(['admin.home', 'admin.admin-company', 'admin.admin-employee'], function ($view) {
            $unapprovedCompany = Company::where('is_active', 0)->count();
            $unapprovedEmployee = User::where('is_active', 0)->count();
            $view->with('unapprovedCompany', $unapprovedCompany)->with('unapprovedEmployee', $unapprovedEmployee);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
