<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\RegisterController;

// 👤 Final registration submission route
Route::post('/register', [RegisterController::class, 'store']);

// 🌍 Optional: Fetch countries list dynamically
Route::get('/countries', [RegisterController::class, 'countries']);
