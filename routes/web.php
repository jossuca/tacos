<?php

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

use App\Http\Controllers\CategoriesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hola/{x}', function($x){
    return view("prueba", compact('x'));
});

Route::get("/prueba/{x}", "pruebaController@prueba");
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::name('category_create_path')->get('/category/crear', 'CategoriesController@create');
Route::name('category_store_path')->post('/category/crear', 'CategoriesController@store');
Route::name('category_edit_path')->get('/category/{category}/editar', 'CategoriesController@edit');
Route::name('category_update_path')->put('/category/{category}', 'CategoriesController@Update');
Route::name('category_delete_path')->delete('/category/{category}', 'CategoriesController@delete');
Route::name('category_path')->get('/categories', 'CategoriesController@index');

Route::resources([
    "bussiness"=>"BussinnessesController"
 ]);

 Route::name("bussinesses_category_path")->get("category/{category}/bussinesses", "CategoriesController@bussinessesCategory");
 Route::name("category_bussiness_path")->get("bussiness/{bussiness}/category", "BussinnessesController@categoryBussines");

 Route::name("menu.create.path")->get('/menu/crear',        'MenusController@create');
 Route::name("menu.store.path")->post('/menu/crear',        'MenusController@store');
 Route::name("menu.edit.path")->get('/menu/{menu}/editar',  'MenusController@edit');
 Route::name("menu.update.path")->put('/menu/{menu}',       'MenusController@update');
 Route::name("menu.delete.path")->delete('/menu/{menu}',    'MenusController@delete');
 Route::name("menu.path")->get('/menus',                    'MenusController@index');

