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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth', 'prefix' => 'members', 'as' => 'members.', 'controller' => App\Http\Controllers\MembersController::class], function () {
    Route::get('/', 'index')->name('index');
    Route::get('/getScopeInfo', 'getScopeInfo')->name('getScopeInfo');
    Route::get('/create', 'create')->name('create');
    Route::get('/uploads', 'uploads')->name('uploads');
    Route::post('/save-members', 'saveMembers')->name('save-members');
    Route::get('/list', 'list')->name('list');
    Route::post('/store', 'store')->name('store');
    Route::put('/update', 'update')->name('update');
    Route::get('/edit/{members}', 'edit')->name('edit');
    Route::get('/modal_delete/{members}', 'modal_delete')->name('modalDelete');
    Route::get('/modal_delete_masive', 'modal_delete_masive')->name('modalDeleteMasive');
    Route::delete('/delete/{members}', 'destroy')->name('delete');
    Route::post('/delete-masive', 'deleteMasive')->name('deleteMasive');
});

Route::group(['middleware' => 'auth', 'prefix' => 'users', 'as' => 'users.', 'controller' => App\Http\Controllers\UsersController::class], function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::get('/edit/{users}', 'edit')->name('edit');
    Route::get('/modal_delete/{users}', 'modal_delete')->name('modalDelete');
    Route::delete('/delete/{users}', 'destroy')->name('delete');
    Route::get('/list', 'list')->name('list');
    Route::post('/store', 'store')->name('store');
    Route::put('/update', 'update')->name('update');
});

// Route::group(['prefix' => 'seccional', 'as' => 'seccional.', 'controller' => App\Http\Controllers\SeccionalesController::class], function () {
//     Route::get('/', 'index')->name('index');
// });

// Route::group(['prefix' => 'municipios', 'as' => 'municipios.', 'controller' => App\Http\Controllers\MunicipiosController::class], function () {
//     Route::get('/', 'index')->name('index');
// });

// Route::group(['prefix' => 'parroquias', 'as' => 'parroquias.', 'controller' => App\Http\Controllers\ParroquiasController::class], function () {
//     Route::get('/', 'index')->name('index');
// });