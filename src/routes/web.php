<?php

/**
 * @file
 * Inheric docs.
 */

use App\Http\Controllers\AccountsController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\UsersController;
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

// Criterias.
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

Route::get('/admin/create-criterias/{id}', [
  RatingController::class,
  'create',
]);

Route::post('/admin/create-criterias/{id}', [
  RatingController::class,
  'store',
]);

Route::get('/admin/update-criterias/{id}', [
  RatingController::class,
  'edit',
]);

Route::put('/admin/update-criterias/update-criterias/{id}', [
  RatingController::class,
  'update',
]);

Route::delete('/admin/delete-accounts/{id}', [
  RatingController::class,
  'destroy',
]);

// Accounts.
Route::get('/admin/accounts', [
  AccountsController::class,
  'index',
]);

Route::get('/admin/create-accounts', [
  AccountsController::class,
  'create',
]);

Route::post('/admin/create-accounts', [
  AccountsController::class,
  'store',
]);

Route::get('/admin/update-accounts/{id}', [
  AccountsController::class,
  'edit',
]);

Route::put('/admin/update-accounts/update-accounts/{id}', [
  AccountsController::class,
  'update',
]);


// Users.
Route::get('/admin/users', [
  UsersController::class,
  'index',
]);

Route::get('/admin/create-users', [
  UsersController::class,
  'create',
]);

Route::post('/admin/create-users', [
  UsersController::class,
  'store',
]);

Route::get('/admin/update-users/{id}', [
  UsersController::class,
  'edit',
]);

Route::put('/admin/update-users/update-users/{id}', [
  UsersController::class,
  'update',
]);

// Classes.
Route::get('/admin/classes', [
  ClassesController::class,
  'index',
]);

Route::get('/admin/create-classes', [
  ClassesController::class,
  'store',
]);

Route::post('/admin/create-classes', [
  ClassesController::class,
  'store',
]);

Route::get('/admin/update-classes/{id}', [
  ClassesController::class,
  'edit',
]);

Route::put('/admin/update-classes/update-classes/{id}', [
  ClassesController::class,
  'update',
]);
