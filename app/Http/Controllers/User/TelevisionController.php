<?php

namespace App\Http\Controllers\User;

use App\Http\Api\OperationApi\OperationApi;
use App\Models\Queue;
use App\Models\Section;
use App\Models\Television;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TelevisionController extends Controller
{

    public function index()
    {
        $televisions = Television::with('section')->get();
        $sections = Section::all();
        return view('pages.tv.index', compact('televisions', 'sections'));
    }

    public function store(Request $request)
    {
        $television = new Television($request->only(['name', 'section_id']));
        $television->save();
        return redirect()->back()->with(['data_type' => 'success', 'data' => 'Televizyon Başarıyla Oluşturuldu']);
    }

    public function abandons()
    {
        return view('pages.tv.abandon');
    }
}
