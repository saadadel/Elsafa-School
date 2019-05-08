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

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('admin', 'Admin\AdminController@index');
Route::resource('admin/roles', 'Admin\RolesController');
Route::resource('admin/permissions', 'Admin\PermissionsController');
Route::resource('admin/users', 'Admin\UsersController');
Route::resource('admin/pages', 'Admin\PagesController');
Route::resource('admin/activitylogs', 'Admin\ActivityLogsController')->only([
    'index', 'show', 'destroy'
]);
Route::resource('admin/settings', 'Admin\SettingsController');
Route::get('admin/generator', ['uses' => '\Appzcoder\LaravelAdmin\Controllers\ProcessController@getGenerator']);
Route::post('admin/generator', ['uses' => '\Appzcoder\LaravelAdmin\Controllers\ProcessController@postGenerator']);

Route::resource('teachers', 'Admin\\TeachersController');

Route::resource('extra', 'Admin\\ExtraController');
Route::resource('penalty', 'Admin\\PenaltyController');
Route::resource('absence', 'Admin\\AbsenceController');
Route::resource('students', 'admin\\StudentsController');
Route::get('students/fees/{id}', 'Admin\StudentsController@getFees');

Route::get('promotions', 'Admin\PromotionsController@index')->name('promotions');
Route::put('promotions/studentsup', 'Admin\PromotionsController@studentsUp');

Route::get('fees', 'Admin\FeesController@index')->name('fees');


Route::get('reports', 'Admin\ReportsController@index')->name('reports');
Route::post('reports/generate', 'Admin\ReportsController@generate')->name('reports.generate');
Route::post('reports/committee', 'Admin\ReportsController@committee');
Route::post('reports/seat', 'Admin\ReportsController@seat');

Route::resource('workers', 'admin\\WorkersController');