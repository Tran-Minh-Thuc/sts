<?php

/**
 * @file
 * Inheric docs.
 */

use App\Http\Controllers\AccountsController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\NoticesController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\SemestersController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\TeachersController;
use App\Http\Controllers\TranscriptsController;
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

Route::delete('/admin/delete-criterias/{id}', [
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
Route::delete('/admin/delete-accounts/{id}', [
  AccountsController::class,
  'destroy',
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
Route::delete('/admin/delete-users/{id}', [
  UsersController::class,
  'destroy',
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
Route::delete('/admin/delete-classes/{id}', [
  ClassesController::class,
  'destroy',
]);


// Course.
Route::get('/admin/course', [
  CourseController::class,
  'index',
]);

Route::get('/admin/create-course', [
  CourseController::class,
  'store',
]);

Route::post('/admin/create-course', [
  CourseController::class,
  'store',
]);

Route::get('/admin/update-course/{id}', [
  CourseController::class,
  'edit',
]);

Route::put('/admin/update-course/update-course/{id}', [
  CourseController::class,
  'update',
]);
Route::delete('/admin/delete-course/{id}', [
  CourseController::class,
  'destroy',
]);

// Notices.
Route::get('/admin/notices', [
  NoticesController::class,
  'index',
]);

Route::get('/admin/create-notices', [
  NoticesController::class,
  'store',
]);

Route::post('/admin/create-notices', [
  NoticesController::class,
  'store',
]);

Route::get('/admin/update-notices/{id}', [
  NoticesController::class,
  'edit',
]);

Route::put('/admin/update-notices/update-notices/{id}', [
  NoticesController::class,
  'update',
]);
Route::delete('/admin/delete-notices/{id}', [
  NoticesController::class,
  'destroy',
]);

// Permissions.
Route::get('/admin/permissions', [
  PermissionsController::class,
  'index',
]);

Route::get('/admin/create-permissions', [
  PermissionsController::class,
  'store',
]);

Route::post('/admin/create-permissions', [
  PermissionsController::class,
  'store',
]);

Route::get('/admin/update-permissions/{id}', [
  PermissionsController::class,
  'edit',
]);

Route::put('/admin/update-permissions/update-permissions/{id}', [
  PermissionsController::class,
  'update',
]);
Route::delete('/admin/delete-permissions/{id}', [
  PermissionsController::class,
  'destroy',
]);

// Semesters.
Route::get('/admin/semesters', [
  SemestersController::class,
  'index',
]);

Route::get('/admin/create-semesters', [
  SemestersController::class,
  'store',
]);

Route::post('/admin/create-semesters', [
  SemestersController::class,
  'store',
]);

Route::get('/admin/update-semesters/{id}', [
  SemestersController::class,
  'edit',
]);

Route::put('/admin/update-semesters/update-semesters/{id}', [
  SemestersController::class,
  'update',
]);
Route::delete('/admin/delete-semesters/{id}', [
  SemestersController::class,
  'destroy',
]);

// Studentss.
Route::get('/admin/students', [
  StudentsController::class,
  'index',
]);

Route::get('/admin/create-students', [
  StudentsController::class,
  'store',
]);

Route::post('/admin/create-students', [
  StudentsController::class,
  'store',
]);

Route::get('/admin/update-students/{id}', [
  StudentsController::class,
  'edit',
]);

Route::put('/admin/update-students/update-students/{id}', [
  StudentsController::class,
  'update',
]);
Route::delete('/admin/delete-students/{id}', [
  StudentsController::class,
  'destroy',
]);

// Teachers.
Route::get('/admin/teachers', [
  TeachersController::class,
  'index',
]);

Route::get('/admin/create-teachers', [
  TeachersController::class,
  'store',
]);

Route::post('/admin/create-teachers', [
  TeachersController::class,
  'store',
]);

Route::get('/admin/update-teachers/{id}', [
  TeachersController::class,
  'edit',
]);

Route::put('/admin/update-teachers/update-teachers/{id}', [
  TeachersController::class,
  'update',
]);
Route::delete('/admin/delete-teachers/{id}', [
  TeachersController::class,
  'destroy',
]);

// Transcripts.
Route::get('/admin/transcripts', [
  TranscriptsController::class,
  'index',
]);

Route::get('/admin/create-transcripts', [
  TranscriptsController::class,
  'store',
]);

Route::post('/admin/create-transcripts', [
  TranscriptsController::class,
  'store',
]);

Route::get('/admin/update-transcripts/{id}', [
  TranscriptsController::class,
  'edit',
]);

Route::put('/admin/update-transcripts/update-transcripts/{id}', [
  TranscriptsController::class,
  'update',
]);
Route::delete('/admin/delete-transcripts/{id}', [
  TranscriptsController::class,
  'destroy',
]);