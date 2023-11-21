<?php

/**
 * @file
 * Inheric docs.
 */

use App\Http\Controllers\AccountsController;
use App\Http\Controllers\ActionController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\NoticesController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\SemestersController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\TeachersController;
use App\Http\Controllers\TranscriptsController;
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
  'list',
]);

Route::get('/admin/action-criterias', [
  RatingController::class,
  'action',
])->name('action_criterias');

Route::get('/admin/action-ratting-class', [
  UsersController::class,
  'action',
])->name('action_ratting_class');

Route::get('/login', [
  UsersController::class,
  'login',
]);

Route::get('/logout', [
  UsersController::class,
  'userLogout',
]);


Route::post('/user', [
  UsersController::class,
  'userLogin',
]);

Route::get('/user/rattingscore', [
  UsersController::class,
  'rattingscore',
]);

Route::get('/user/ratting-class', [
  UsersController::class,
  'rattingClass',
]);

Route::get('/user/ratting-student', [
  UsersController::class,
  'rattingStudent',
]);

Route::get('/admin/action-ratting-student', [
  UsersController::class,
  'actionRattingStudent',
])->name('action_ratting_student');

Route::put('/user/update-user-ratting/{id}', [
  UsersController::class,
  'updateUserRatings',
]);

Route::get('/user/news', [
  UsersController::class,
  'news',
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

Route::get('/user/update-permissions/{id}', [
  UsersController::class,
  'updateRattingStudent',
]);

Route::get('/admin/delete-criterias/{id}', [
  RatingController::class,
  'destroy',
]);

// Accounts.
Route::get('/admin/accounts', [
  AccountsController::class,
  'list',
]);

Route::get('/admin/action-accounts', [
  AccountsController::class,
  'action',
])->name('action_accounts');

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
Route::get('/admin/delete-accounts/{id}', [
  AccountsController::class,
  'destroy',
]);


// Users.
Route::get('/admin/users', [
  UsersController::class,
  'list',
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
  'list',
]);

Route::get('/admin/action-classes', [
  ClassesController::class,
  'action',
])->name('action_classes');

Route::get('/admin/create-classes', [
  ClassesController::class,
  'create',
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
Route::get('/admin/delete-classes/{id}', [
  ClassesController::class,
  'destroy',
]);

Route::get('/teacher-update-trans', [
  UsersController::class,
  'updateTrans',
]);

// Course.
Route::get('/admin/courses', [
  CourseController::class,
  'list',
]);

Route::get('/admin/action-courses', [
  CourseController::class,
  'action',
])->name('action_courses');

Route::get('/admin/create-courses', [
  CourseController::class,
  'create',
]);

Route::post('/admin/create-courses', [
  CourseController::class,
  'store',
]);

Route::get('/admin/update-courses/{id}', [
  CourseController::class,
  'edit',
]);

Route::put('/admin/update-courses/update-courses/{id}', [
  CourseController::class,
  'update',
]);
Route::get('/admin/delete-courses/{id}', [
  CourseController::class,
  'destroy',
]);

// Notices.
Route::get('/admin/notices', [
  NoticesController::class,
  'list',
]);

Route::get('/admin/create-notices', [
  NoticesController::class,
  'create',
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
Route::get('/admin/delete-notices/{id}', [
  NoticesController::class,
  'destroy',
]);

// Permissions.
Route::get('/admin/permissions', [
  PermissionsController::class,
  'list',
]);

Route::get('/admin/action-permissions', [
  PermissionsController::class,
  'action',
])->name('action_permissions');

Route::get('/admin/create-permissions', [
  PermissionsController::class,
  'create',
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
Route::get('/admin/delete-permissions/{id}', [
  PermissionsController::class,
  'destroy',
]);

// Semesters.
Route::get('/admin/semesters', [
  SemestersController::class,
  'list',
]);

Route::get('/admin/action-semesters', [
  SemestersController::class,
  'action',
])->name('action_semesters');

Route::get('/admin/create-semesters', [
  SemestersController::class,
  'create',
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
Route::get('/admin/delete-semesters/{id}', [
  SemestersController::class,
  'destroy',
]);

// Studentss.
Route::get('/admin/students', [
  StudentsController::class,
  'list',
]);

Route::get('/admin/action-students', [
  StudentsController::class,
  'action',
])->name('action_students');

Route::get('/admin/create-students', [
  StudentsController::class,
  'create',
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
Route::get('/admin/delete-students/{id}', [
  StudentsController::class,
  'destroy',
]);

// Teachers.
Route::get('/admin/teachers', [
  TeachersController::class,
  'list',
]);

Route::get('/admin/action-teachers', [
  TeachersController::class,
  'action',
])->name('action_teachers');

Route::get('/admin/create-teachers', [
  TeachersController::class,
  'create',
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
Route::get('/admin/delete-teachers/{id}', [
  TeachersController::class,
  'destroy',
]);

// Transcripts.
Route::get('/admin/transcripts', [
  TranscriptsController::class,
  'list',
]);

Route::get('/admin/action-transcripts', [
  TranscriptsController::class,
  'action',
])->name('action_transcripts');

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

Route::get('/admin/detail-transcripts/{id}', [
  TranscriptsController::class,
  'show',
]);

Route::put('/admin/update-transcripts/update-transcripts/{id}', [
  TranscriptsController::class,
  'update',
]);
Route::get('/admin/delete-transcripts/{id}', [
  TranscriptsController::class,
  'destroy',
]);

Route::get('/admin/action', [
  ActionController::class,
  'index',
]);

Route::post('/admin/import-excel', [
  ActionController::class,
  'importExcel',
]);
