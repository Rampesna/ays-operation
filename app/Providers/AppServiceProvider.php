<?php

namespace App\Providers;

use App\Http\View\Composers\AuthenticatedComposer;
use App\Http\View\Composers\CompaniesComposer;
use App\Http\View\Composers\RolesComposer;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::if('Authority', function ($permission) {
            return auth()->user()->authority($permission);
        });

        Blade::if('EmployeeAuthority', function ($authorization) {
            return auth()->user()->authority($authorization);
        });

        View::composer('*', AuthenticatedComposer::class);
        View::composer([
            'pages.dashboard.index',
            'pages.employee.index',
            'pages.employee.edit',
            'pages.analysis.*',
            'pages.project.*',
            'pages.inventory.*',
            'pages.report.employee.*',
            'pages.report.queue.*',
            'pages.report.general.*',
            'pages.report.performance.*',
            'pages.setting.queue.*',
            'pages.setting.competence.*',
            'pages.setting.priority.*',
            'pages.setting.shift-group.*',
            'pages.setting.user.*',
            'pages.setting.device-group.*',
            'pages.setting.device-status.*',
            'pages.application.applications.shift.*',
        ], CompaniesComposer::class);
        View::composer([
            'pages.setting.user.*'
        ], RolesComposer::class);
    }
}
