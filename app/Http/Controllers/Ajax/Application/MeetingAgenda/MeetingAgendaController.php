<?php

namespace App\Http\Controllers\Ajax\Application\MeetingAgenda;

use App\Http\Controllers\Controller;
use App\Models\MeetingAgenda;
use App\Models\User;
use App\Services\MeetingAgendaService;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class MeetingAgendaController extends Controller
{
    public function datatable(Request $request)
    {
        $model = MeetingAgenda::with([]);

        if ($request->meeting_id) {
            $model->where('meeting_id', $request->meeting_id);
        }

        return Datatables::of($model)->
        filterColumn('users', function ($agendas, $keyword) {
            $agendaList = [];
            $users = User::where('name', 'like', '%' . 'Ta' . '%')->get();
            foreach ($users as $user) {
                $agendaList = array_merge($agendaList, collect($user->meetingAgendas)->toArray());
            }
            $agendas->whereIn('id', collect($agendaList)->unique('id')->pluck('id'));
        })->
        editColumn('users', function ($agenda) {
            return implode(',', $agenda->users()->pluck('name')->toArray()) ?? '';
        })->
        editColumn('meeting_id', function ($agenda) {
            return $agenda->meeting_id ? @$agenda->meeting->name : '';
        })->
        make(true);
    }

    public function show(Request $request)
    {
        return response()->json(MeetingAgenda::with([
            'users'
        ])->find($request->id), 200);
    }

    public function save(Request $request)
    {
        return response()->json((new MeetingAgendaService($request->id ? MeetingAgenda::find($request->id) : new MeetingAgenda))->save($request), 200);
    }

    public function drop(Request $request)
    {
        MeetingAgenda::find($request->id)->delete();
    }
}
