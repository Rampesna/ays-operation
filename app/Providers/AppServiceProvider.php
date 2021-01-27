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

        View::composer('*', AuthenticatedComposer::class);
        View::composer([
            'pages.employee.index',
            'pages.analysis.*',
            'pages.report.employee.*',
            'pages.report.queue.*',
            'pages.report.general.*',
            'pages.setting.queue.*',
            'pages.setting.competence.*',
            'pages.setting.priority.*',
            'pages.setting.user.*'
        ], CompaniesComposer::class);
        View::composer([
            'pages.setting.user.*'
        ], RolesComposer::class);
    }
}
