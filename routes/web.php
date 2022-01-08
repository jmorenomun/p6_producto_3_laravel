<?php

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

// Welcome page
Route::get('/', 'PagesController@index');

// Resources
Route::resource('courses', 'CoursesController');
Route::resource('teachers', 'TeachersController');
Route::resource('course_offerings', 'CourseOfferingsController');
Route::resource('students', 'StudentsController');
