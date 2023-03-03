<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\TecnicoController;
use App\Http\Controllers\OficinaController;
use App\Http\Controllers\ChamadoController;

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

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('tecnicos', TecnicoController::class);
    Route::resource('oficinas', OficinaController::class);

      // chamados
      Route::get('/chamados/novos_chamados',[ChamadoController::class,'novos_chamados'])->name('chamados.novos_chamados');
      Route::get('/get_ocorrencias', [ChamadoController::class, 'get_ocorrencias'])->name('get_ocorrencias');
      Route::post('/chamados/store',[ChamadoController::class,'novos_chamados_store'])->name('chamados.novos_chamados_store');
      // Route::get('/user/add',[UserController::class,'add'])->name('userAdd');
      // Route::post('/user/create',[UserController::class,'create'])->name('userCreate');
      // Route::get('/user/{id}/edit',[UserController::class,'edit'])->name('userEdit');
      // Route::post('/user/update/{id}',[UserController::class,'update'])->name('userUpdate');
      // Route::delete('/user/delete/{id}',[UserController::class,'destroy'])->name('userDestroy');
      // Route::get('/user/theme-set/{id}',[UserController::class,'setTheme'])->name('userSetTheme');

    Route::resource('users', UserController::class);
    Route::get('/user/edit/password/{id}',  [UserController::class, 'editPassword'])->name('user.edit.password');
    Route::put('/user/update/password/{id}', [UserController::class, 'updatePassword'])->name('user.update.password');
});
