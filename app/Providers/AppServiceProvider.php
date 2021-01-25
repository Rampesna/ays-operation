<?php

namespace App\Providers;

use App\Http\View\Composers\AuthenticatedComposer;
use App\Http\View\Composers\CompaniesComposer;
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
        View::composer('*', AuthenticatedComposer::class);
        View::composer([
            'pages.employee.index',
            'pages.analysis.*',
            'pages.report.employee.*',
            'pages.setting.queue.*',
            'pages.setting.competence.*',
            'pages.setting.priority.*'
        ], CompaniesComposer::class);
    }
}
