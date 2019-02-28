<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('todo', 'TodoController@index');
Route::post('todo', 'TodoController@createTodo');
Route::put('todo/{todo_id_object}', 'TodoController@updateTodo');
Route::delete('todo/{_id}', 'TodoController@deleteTodo');
