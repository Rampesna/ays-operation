<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;

class CompaniesComposer
{
    /**
     *
     * @var object $companies
     */
    protected $companies;

    public function __construct()
    {
        $this->companies = auth()->user()->companies()->get();
    }

    /**
     * Bind data to the view.
     *
     * @param \Illuminate\View\View $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('companies', $this->companies);
    }
}
