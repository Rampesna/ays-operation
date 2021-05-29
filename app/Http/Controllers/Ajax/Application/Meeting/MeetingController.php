<?php

namespace App\Http\Controllers\Ajax\Application\Meeting;

use App\Http\Controllers\Controller;
use App\Models\Meeting;
use App\Models\MeetingAgenda;
use App\Services\MeetingService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class MeetingController extends Controller
{
    public function index(Request $request)
    {
        return response()->json(Meeting::all(), 200);
    }

    public function datatable(Request $request)
    {
        return Datatables::of(Meeting::with([]))->
        editColumn('id', function ($meeting) {
            return '#' . $meeting->id;
        })->
        editColumn('type', function ($meeting) {
            return $meeting->type == 0 ? 'Yüzyüze' : 'Online';
        })->
        editColumn('link', function ($meeting) {
            return '';
        })->
        editColumn('users', function ($meeting) {
            return implode(',', $meeting->users()->pluck('name')->toArray()) ?? '';
        })->
        make(true);
    }

    public function users(Request $request)
    {
        return response()->json(Meeting::find($request->meeting_id)->users, 200);
    }

    public function save(Request $request)
    {
        return response()->json((new MeetingService($request->id ? Meeting::find($request->id) : new Meeting))->save($request), 200);
    }

    public function drop(Request $request)
    {
        Meeting::find($request->id)->delete();
    }

    public function show(Request $request)
    {
        return response()->json(Meeting::with([
            'users'
        ])->find($request->id), 200);
    }
}
