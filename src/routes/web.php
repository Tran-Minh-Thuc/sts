<?php

/**
 * @file
 */

use App\Http\Controllers\RatingController;
use App\Http\Controllers\UserController;
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
    return view('rating.allrating');
});

Route::get('/user', [
  UserController::class,
  'index',
]);

Route::get('/admin/criterias', [
  RatingController::class,
  'index',
]);

Route::get('/admin/create-criterias', [
  RatingController::class,
  'create',
]);

Route::post('/admin/create-criterias', [
  RatingController::class,
  'store',
]);
