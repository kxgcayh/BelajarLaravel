<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Management Role
Route::resource('roles', 'UserManagement\RoleController')
    ->only(['index', 'store', 'edit', 'destroy']);
// Management Permission
Route::resource('permissions', 'UserManagement\PermissionController')
->only(['index', 'store', 'edit', 'destroy']);
// Management User
Route::resource('users', 'UserManagement\UserController')
    ->only(['index', 'store', 'edit', 'destroy']);
Route::post('insert-user', function () {
    $data = Input::except('csrf-token');
    DB::table('users')->insert($data);

    $id = DB::getPdo()->lastInsertId();

    $insertedData = DB::table('users')->where('id', $id)->first();
    return response()->json(['success' => $insertedData]);
});
