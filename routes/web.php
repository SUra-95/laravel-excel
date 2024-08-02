<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('import-excel', [UserController::class, 'import_excel']);
Route::post('import-excel', [UserController::class, 'import_excel_post']);
Route::get('export-excel', [UserController::class, 'export_excel']);
