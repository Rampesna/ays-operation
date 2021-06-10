<?php

namespace App\Http\Controllers\Ajax\Mission;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Mission;
use App\Models\MissionStatus;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class MissionController extends Controller
{
    public function datatable(Request $request)
    {
        $missions = Mission::with([]);

        if ($request->start_date) {
            $missions = $missions->where('start_date', '>=', $request->start_date);
        }

        if ($request->end_date) {
            $missions = $missions->where('end_date', '<=', $request->end_date);
        }

        return Datatables::of($missions)->
        filterColumn('status_id', function ($missions, $data) {
            return $data == 0 ? $missions : $missions->where('status_id', $data);
        })->
        filterColumn('creator_type', function ($missions, $data) {
            return $data == 'all' ? $missions : $missions->where('creator_type', $data);
        })->
        filterColumn('creator_id', function ($missions, $data) {
            return $missions->whereIn('creator_id', array_merge(
                User::where('name', 'like', '%' . $data . '%')->pluck('id')->toArray(),
                Employee::where('name', 'like', '%' . $data . '%')->pluck('id')->toArray()
            ));
        })->
        filterColumn('assigned_type', function ($missions, $data) {
            return $data == 'all' ? $missions : $missions->where('assigned_type', $data);
        })->
        filterColumn('assigned_id', function ($missions, $data) {
            return $missions->whereIn('assigned_id', array_merge(
                User::where('name', 'like', '%' . $data . '%')->pluck('id')->toArray(),
                Employee::where('name', 'like', '%' . $data . '%')->pluck('id')->toArray()
            ));
        })->
        editColumn('id', function ($mission) {
            return '#' . $mission->id;
        })->
        editColumn('status_id', function ($mission) {
            return $mission->status->name;
        })->
        editColumn('creator_type', function ($mission) {
            return @$mission->creator_type == 'App\\Models\\User' ? 'Kullanıcı' : (
            @$mission->creator_type == 'App\\Models\\Employee' ? 'Personel' : @$mission->creator_type
            );
        })->
        editColumn('creator_id', function ($mission) {
            return $mission->creator->name;
        })->
        editColumn('assigned_type', function ($mission) {
            return @$mission->assigned_type == 'App\\Models\\User' ? 'Kullanıcı' : (
            @$mission->assigned_type == 'App\\Models\\Employee' ? 'Personel' : @$mission->assigned_type
            );
        })->
        editColumn('assigned_id', function ($mission) {
            return $mission->assigned->name;
        })->
        make(true);
    }
}
