<?php

use App\Http\Controllers\NinjaExamController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => 'OK');
Route::get('/testar-ninja', [NinjaExamController::class, 'simulate']);
