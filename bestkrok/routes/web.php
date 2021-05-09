<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
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


Route::group(['middleware' => ['auth','admin']], function() {
    Route::get('/dashboard', function () {
        $question = DB::table('questions')->count();
        $category = DB::table('categories')->count();
        $admin = DB::table('users')->count();
        return view('admin.dashboard',compact('question','category','admin'));
       // return view('admin.dashboard');
    });

    Route::get('adminpage',  'UserController@index');
    Route::delete('/admin-delete/{id}', 'UserController@destroy')->name('delete') ;
    Route::post('/add-admin', 'UserController@store');

    //

    Route::get('all-categories','CategoryController@index' );
    Route::post('post-category-form','CategoryController@store' );
    Route::get('edit-category/{id}','CategoryController@edit' );
Route::post('update-category/{id}','CategoryController@update' );


Route::post('post-question-form','QuestionController@store');
Route::get('all-questions','QuestionController@index' );
Route::get('edit-question/{id}','QuestionController@edit' );
Route::post('update-question/{id}','QuestionController@update' );
Route::post('file-import', 'QuestionController@fileImport')->name('file-import');

});


