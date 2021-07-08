<?php

namespace App\Http\Controllers\User;

use App\Http\Api\OperationApi\OperationApi;
use App\Models\Queue;
use App\Models\Section;
use App\Models\Television;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TelevisionSectionController extends Controller
{
    public function Section1()
    {
        return view('pages.tv.sections.section1', [
            'queues' => Queue::where('company_id', 1)->get()
        ]);
    }

    public function Section2()
    {
        return view('pages.tv.sections.section2', [
            'token' => (new OperationApi)->Login()
        ]);
    }

    public function Section3()
    {
        return view('pages.tv.sections.section3');
    }

    public function Section4()
    {
        return view('pages.tv.sections.section4');
    }

    public function Section5()
    {
        return view('pages.tv.sections.section5');
    }


}
