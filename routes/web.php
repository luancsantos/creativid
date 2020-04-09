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



Route::get('/users', 'UsersController@index')->name('users.index');
Route::get('/users/{id}/profile', 'UsersController@profile')->middleware('auth')->name('users.profile');
Route::get('/users/create', 'UsersController@create')->middleware('auth')->name('users.create');
Route::post('/users/store', 'UsersController@store')->middleware('auth')->name('users.store');
Route::get('/users/{id}/edit', 'UsersController@edit')->middleware('auth')->name('users.edit');
Route::put('/users/{id}/update', 'UsersController@update')->middleware('auth')->name('users.update');
Route::delete('/users/{id}/destroy', 'UsersController@destroy')->middleware('auth')->name('users.destroy');

Route::get('/users-type', 'UsersTypeController@index')->middleware('auth')->name('users-type.index');
Route::get('/users-type/create', 'UsersTypeController@create')->middleware('auth')->name('users-type.create');
Route::post('/users-type/store', 'UsersTypeController@store')->middleware('auth')->name('users-type.store');
Route::get('/users-type/{id}/edit', 'UsersTypeController@edit')->middleware('auth')->name('users-type.edit');
Route::put('/users-type/{id}/update', 'UsersTypeController@update')->middleware('auth')->name('users-type.update');
Route::get('/users-type/{id}/destroy', 'UsersTypeController@destroy')->middleware('auth')->name('users-type.destroy');

Route::post('/comments/store', 'CommentsController@store')->middleware('auth')->name('comments.store');

Route::get('/clients', 'ClientsController@index')->name('clients.index');
Route::get('/clients/create', 'ClientsController@create')->middleware('auth')->name('clients.create');
Route::post('/clients/store', 'ClientsController@store')->middleware('auth')->name('clients.store');
Route::get('/clients/{id}/edit', 'ClientsController@edit')->middleware('auth')->name('clients.edit');
Route::put('/clients/{id}/update', 'ClientsController@update')->middleware('auth')->name('clients.update');
Route::delete('/clients/{id}/destroy', 'ClientsController@destroy')->middleware('auth')->name('clients.destroy');

Route::get('/departments', 'DepartmentsController@index')->name('departments.index');
Route::get('/departments/create', 'DepartmentsController@create')->middleware('auth')->name('departments.create');
Route::post('/departments/store', 'DepartmentsController@store')->middleware('auth')->name('departments.store');
Route::get('/departments/{id}/edit', 'DepartmentsController@edit')->middleware('auth')->name('departments.edit');
Route::put('/departments/{id}/update', 'DepartmentsController@update')->middleware('auth')->name('departments.update');
Route::delete('/departments/{id}/destroy', 'DepartmentsController@destroy')->middleware('auth')->name('departments.destroy');

Route::get('/status', 'StatusTicketsController@index')->name('status.index');
Route::get('/status/create', 'StatusTicketsController@create')->middleware('auth')->name('status.create');
Route::post('/status/store', 'StatusTicketsController@store')->middleware('auth')->name('status.store');
Route::get('/status/{id}/edit', 'StatusTicketsController@edit')->middleware('auth')->name('status.edit');
Route::put('/status/{id}/update', 'StatusTicketsController@update')->middleware('auth')->name('status.update');
Route::delete('/status/{id}/destroy', 'StatusTicketsController@destroy')->middleware('auth')->name('status.destroy');

Route::get('/types', 'TypeTicketsController@index')->name('types.index');
Route::get('/types/create', 'TypeTicketsController@create')->middleware('auth')->name('types.create');
Route::post('/types/store', 'TypeTicketsController@store')->middleware('auth')->name('types.store');
Route::get('/types/{id}/edit', 'TypeTicketsController@edit')->middleware('auth')->name('types.edit');
Route::put('/types/{id}/update', 'TypeTicketsController@update')->middleware('auth')->name('types.update');
Route::delete('/types/{id}/destroy', 'TypeTicketsController@destroy')->middleware('auth')->name('types.destroy');

Route::get('/tickets', 'TicketsController@index')->name('tickets.index');
Route::get('/tickets/create', 'TicketsController@create')->middleware('auth')->name('tickets.create');
Route::post('/tickets/store', 'TicketsController@store')->middleware('auth')->name('tickets.store');
Route::get('/tickets/{id}/edit', 'TicketsController@edit')->middleware('auth')->name('tickets.edit');
Route::put('/tickets/{id}/update', 'TicketsController@update')->middleware('auth')->name('tickets.update');
Route::delete('/tickets/{id}/destroy', 'TicketsController@destroy')->middleware('auth')->name('tickets.destroy');
Route::get('/tickets/{id}/show', 'TicketsController@show')->middleware('auth')->name('tickets.show');

Route::get('/health-insurance', 'HealthInsuranceController@index')->name('health-insurance.index');
Route::get('/health-insurance/create', 'HealthInsuranceController@create')->middleware('auth')->name('health-insurance.create');
Route::post('/health-insurance/store', 'HealthInsuranceController@store')->middleware('auth')->name('health-insurance.store');
Route::get('/health-insurance/{id}/edit', 'HealthInsuranceController@edit')->middleware('auth')->name('health-insurance.edit');
Route::post('/health-insurance/{id}/update', 'HealthInsuranceController@update')->middleware('auth')->name('health-insurance.update');
Route::delete('/health-insurance/{id}/destroy', 'HealthInsuranceController@destroy')->middleware('auth')->name('health-insurance.destroy');
