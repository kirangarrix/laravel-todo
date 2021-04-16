<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Todo;


class ToDoController extends Controller
{
     public function hello()
    {
       $todos=Todo::all();
      // dd($todos);
        return view('home',['todos'=>$todos]);
    }
    public function store(Request $request){
      // dd($request);
     // dd($request->post('title'));
     $validateData=$request->validate([
       'title'=>'required|max:192'
     ]);
       Todo::create($validateData);
      //  $todo=new Todo();
      //  $todo->title= $request->title;
      //  $todo->save();
      return redirect(route('center'));
    }
    public function edit(Todo $todo)
    {
     // $todo=Todo::findOrFail($id);
     // if(!$todo)return abort(404);
     // dd($todo);
      return view('update',compact('todo'));
      
    }
    public function update(Request $request,Todo $todo)
    {
      $validateData=$request->validate([
        'title'=>'required|max:192'
      ]);
      //dd($validateData);
      $todo->title=$validateData['title'];
      $todo->save();
      return redirect(route('center'));
      
    }
    public function delete(Todo $todo){
      $todo->delete();
      return back();

    }

}
