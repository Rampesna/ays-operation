<?php

namespace App\Http\Controllers\UserPanel\Application\FoodList;

use App\Http\Api\AyssoftIkApi;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\FoodList;
use App\Models\FoodListCheck;
use App\Services\FoodListCheckService;
use App\Services\FoodListService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FoodListController extends Controller
{
    public function index()
    {
        return view('pages.ik.application.applications.food-list.index', [
            'foodList' => FoodList::all()
        ]);
    }

    public function create(Request $request)
    {
        if (FoodList::where('date', $request->date)->first()) {
            return redirect()->back()->with(['type' => 'warning', 'data' => 'Bu Tarihe Zaten Yemek Eklenmiş']);
        }

        $foodListService = new FoodListService;
        $foodListService->setFoodList(new FoodList);
        $foodList = $foodListService->save($request);

        $employees = Employee::all();

        $api = new AyssoftIkApi();
        $todayShiftEmployees = $api->TodayShiftEmployee($request->date)['content'];

        foreach ($employees as $employee) {
            $foodListCheckService = new FoodListCheckService;
            $foodListCheckService->setFoodListCheck(new FoodListCheck);
            foreach ($todayShiftEmployees as $todayShiftEmployee) {
                $checked = $employee->email == $todayShiftEmployee['user']['email'] ? 0 : 0;
                $locked = $employee->email == $todayShiftEmployee['user']['email'] ? 1 : 0;
                $description = $employee->email == $todayShiftEmployee['user']['email'] ? 'Personel Nöbetçi Olduğu İçin Sistem Tarafından Yemeyecek Olarak Ayarlandı.' : null;
            }
            $foodListCheckService->create($foodList->id, $employee->id, $checked, $locked, $description);
        }

        return redirect()->back()->with(['type' => 'success', 'data' => 'Başarıyla Oluşturuldu']);
    }

    public function edit(Request $request)
    {
        return FoodList::find($request->food_list_id);
    }

    public function update(Request $request)
    {
        if ($request->delete && $request->delete == 1) {
            FoodListCheck::where('food_list_id', $request->food_list_id)->delete();
            FoodList::find($request->food_list_id)->delete();
            return redirect()->back()->with(['type' => 'success', 'data' => 'Silindi']);
        }

        $foodListService = new FoodListService;
        $foodListService->setFoodList(FoodList::find($request->food_list_id));
        $foodListService->save($request);

        return redirect()->back()->with(['type' => 'success', 'data' => 'Güncellendi']);
    }

    public function report(Request $request)
    {
        $foodList = FoodList::with(['foodListChecks'])->
        whereBetween('date', [
            $request->start_date,
            $request->end_date
        ])->get();

        return view('pages.ik.application.applications.food-list.report', [
            'foodList' => $foodList
        ]);
    }

    public function reportDetail(Request $request)
    {
        $foodListChecks = FoodList::where('date', $request->date)->first()->foodListChecks()->with(['employee'])->get();
        return view('pages.ik.application.applications.food-list.report-detail', [
            'foodListChecks' => $foodListChecks
        ]);
    }
}
