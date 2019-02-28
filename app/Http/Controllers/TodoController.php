<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\TodoRequest;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        return Todo::orderBy('_id', 'DESC')->get();

//        $data = DB::collection('todos')->orderBy('_id', 'DESC')->get();
//        return $data;
    }

    public function createTodo(TodoRequest $request){

        $todo = new Todo();
        $todo->name = $request->name;
        $todo->location = $request->location;
        $todo->save();

        return $todo;
    }

    public function updateTodo(Request $request, $todo_id_object){

        DB::table('todos')->where('_id', $todo_id_object)->update([
            'name' =>$request->name,
            'location'=> $request->location]);

        return response(['result' =>true], 200);
    }

    public function deleteTodo($_id){

        DB::table('todos')->where('_id', $_id)->delete();

        return response(['result' =>true], 200);
    }
}
