<?php

namespace App\Http\Controllers\UserPanel\Survey;

use App\Http\Api\OperationApi\PersonSystem\PersonSystemApi;
use App\Http\Api\OperationApi\SurveySystem\SurveySystemApi;
use App\Http\Controllers\Controller;
use App\Http\Api\OperationApi\Operation\OperationApi;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function Index()
    {
        return view('pages.survey.script.index', [
            'surveyList' => (new SurveySystemApi)->GetSurveyList()['response'],
            'products' => (new SurveySystemApi)->GetSurveyProductList()['response']
        ]);
    }

    public function products()
    {
        return view('pages.survey.product.index', [
            'products' => (new SurveySystemApi)->GetSurveyProductList()['response']
        ]);
    }

    public function sellers()
    {
        return view('pages.survey.seller.index', [
            'sellers' => (new SurveySystemApi)->GetSurveySellerList()['response'],
            'surveys' => (new SurveySystemApi)->GetSurveyList()['response'],
            'products' => (new SurveySystemApi)->GetSurveyProductList()['response']
        ]);
    }

    public function employees()
    {
//        return (new OperationApi)->GetUserList()['response'];
        return view('pages.survey.employee.index', [
            'employees' => (new OperationApi)->GetUserList()['response'] ?? [],
            'surveys' => (new SurveySystemApi)->GetSurveyList()['response'] ?? [],
            'dataScanList' => (new PersonSystemApi)->GetPersonDataScanList()['response'] ?? []
        ]);
    }

    public function Create()
    {
        return view('pages.survey.create');
    }

    public function Store(Request $request)
    {

    }

    public function Edit($id)
    {
        return view('pages.survey.edit');
    }

    public function Update(Request $request)
    {

    }

    public function Delete(Request $request)
    {

    }
}
