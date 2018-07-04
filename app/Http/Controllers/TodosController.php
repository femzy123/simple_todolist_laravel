<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class TodosController extends Controller
{

    public function index()
    {
//        $todos = Todo::orderBy('created_at', 'desc')->get();

        $todos = Todo::all();

        return view('todos.index')->with('todos', $todos);
    }


    public function create()
    {
        return view ('todos.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'text' => 'required'
        ]);

        // Create Todo

        $todo = new Todo;
        $todo->text = $request->input('text');
        $todo->body = $request->input('body');
        $todo->due = $request->input('due');

        $todo->save();

        return redirect('/')->with('success', 'Todo Created');

    }


    public function show($id)
    {
        $todo = Todo::find($id);

        return view('todos.show')->with('todo', $todo);
    }


    public function edit($id)
    {
        $todo = Todo::find($id);

        return view('todos.edit')->with('todo', $todo);
    }


    public function update(Request $request, $id)
    {
        $todo = Todo::FindOrFail($id);

        $todo->text = $request->input('text');
        $todo->body = $request->input('body');
        $todo->due = $request->input('due');

        $todo->save();

        return redirect('/')->with('success', 'Todo Updated');
    }


    public function destroy($id)
    {
        $todo = Todo::find($id);

        $todo->delete();

        return redirect('/')->with('success', 'Todo Deleted');
    }
}
