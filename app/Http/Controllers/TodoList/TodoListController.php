<?php

namespace App\Http\Controllers\TodoList;

use App\Http\Controllers\Controller;
use App\Http\Requests\TodoList\TodoListStoreRequest;
use App\Http\Requests\TodoList\TodoListUpdateRequest;
use Illuminate\Http\Request;

class TodoListController extends Controller
{
    public function Index()
    {
        return view('pages.todo-list.index');
    }

    public function Create()
    {
        return view('pages.todo-list.create');
    }

    public function Store(TodoListStoreRequest $request)
    {

    }

    public function Edit($id)
    {
        return view('pages.todo-list.edit');
    }

    public function Update(TodoListUpdateRequest $request)
    {

    }

    public function Delete(Request $request)
    {

    }
}
