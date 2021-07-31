<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LanguageController;

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

/**
 * ?auth routes
 */
Auth::routes();

/**
 * ?app routes
 */
Route::get('/', [AppController::class, 'dashboard'])->name('app.dashboard');
Route::get('/language/{language}', [LanguageController::class, 'change'])->name('language.change');

/**
 * ?company routes
 */
Route::get('/companies', [CompanyController::class, 'index'])->name('company.index');

Route::prefix('/company')->group(function () {
    Route::get('/create', [CompanyController::class, 'create'])->name('company.create');
    Route::post('/', [CompanyController::class, 'store'])->name('company.store');
    Route::get('/{id}', [CompanyController::class, 'show'])->name('company.show')->where('id', '[0-9]+');
    Route::delete('/{id}', [CompanyController::class, 'destroy'])->name('company.destroy')->where('id', '[0-9]+');
    Route::patch('/{id}', [CompanyController::class, 'update'])->name('company.update')->where('id', '[0-9]+');
});

/**
 * ?employee routes
 */
Route::resource('/employee', EmployeeController::class)->except([
    'index', 'edit'
]);
