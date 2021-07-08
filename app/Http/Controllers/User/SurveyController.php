<?php

namespace App\Http\Controllers\User;

use App\Http\Api\OperationApi\PersonSystem\PersonSystemApi;
use App\Http\Api\OperationApi\SurveySystem\SurveySystemApi;
use App\Http\Controllers\Controller;
use App\Http\Api\OperationApi\Operation\OperationApi;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function index()
    {
        return view('pages.survey.script.index', [
            'surveyList' => (new SurveySystemApi)->GetSurveyList()['response'],
            'products' => (new SurveySystemApi)->GetSurveyProductList()['response']
        ]);
    }

    public function detail()
    {
        return view('pages.survey.script.detail.index', [
            'surveyList' => (new SurveySystemApi)->GetSurveyList()['response']
        ]);
    }

    public function diagram(Request $request)
    {
        return view('pages.survey.script.diagram.index', [
            'survey' => (new SurveySystemApi)->GetSurveyEdit($request->id)['response'][0]
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
}
