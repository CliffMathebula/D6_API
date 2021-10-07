<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AquariumsController;
use App\Http\Controllers\FishController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);
    Route::post('/aquariums', [AquariumsController::class, 'create'])->name('aquariums.create'); 
    Route::post('/fish', [FishController::class, 'create'])->name('fish.create');    
    Route::get('/fish', [FishController::class, 'show_all'])->name('fish.show_all'); 
    Route::get('/get_fish', [FishController::class, 'find_fish']); 
});