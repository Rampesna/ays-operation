<?php

namespace App\Http\Controllers\UserPanel\IK\Application\FoodList;

use App\Http\Api\AyssoftIkApi;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\FoodList;
use App\Models\FoodListCheck;
use App\Services\FoodListCheckService;
use App\Services\FoodListService;
use App\Services\ShiftService;
use Illuminate\Http\Request;

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

        $todayShifts = (new ShiftService)->shiftEmployeesByDate($request->date);

        foreach ($employees as $employee) {
            $foodListCheckService = new FoodListCheckService;
            $foodListCheckService->setFoodListCheck(new FoodListCheck);
            $checked = null;
            $locked = null;
            $description = null;
            foreach ($todayShifts as $todayShift) {
                $checked = $employee->id == $todayShift->employee->id ? 0 : 0;
                $locked = $employee->id == $todayShift->employee->id ? 1 : 0;
                $description = $employee->id == $todayShift->employee->id ? 'Personel Nöbetçi Olduğu İçin Sistem Tarafından Yemeyecek Olarak Ayarlandı.' : null;
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
