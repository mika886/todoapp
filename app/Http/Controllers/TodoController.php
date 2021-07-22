<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::orderBy('created_at', 'desc')->get();
        return view('index', ['todos' => $todos]);
    }

    public function create(Request $request)
    {
        $this->validate($request, Todo::$rules);
        $todos = $request->all();
        Todo::create($todos);
        return redirect('/');
    }

    public function update(Request $request)
    {
        $this->validate($request, Todo::$rules);
        $todo = Todo::find($request->id);
        $todo->content = $request->content;
        $todo->save();
        return redirect('/');
    }

    public function delete(Request $request)
    {
        $todo = Todo::find($request->id);
        $todo->delete();
        return redirect('/');
    }
}