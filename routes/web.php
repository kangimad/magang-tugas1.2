<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrganizationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('organization')->group(function () {
    Route::get('/', [OrganizationController::class, 'index'])->name('organization.index');
    Route::post('/', [OrganizationController::class, 'store'])->name('organization.store');
    Route::get('/{id}/show', [OrganizationController::class, 'show'])->name('organization.show');
    Route::get('/{id}/edit', [OrganizationController::class, 'show'])->name('organization.edit');
    Route::put('/{id}', [OrganizationController::class, 'update'])->name('organization.update');
    Route::delete('/{id}/delete', [OrganizationController::class, 'destroy'])->name('organization.destroy');
});
