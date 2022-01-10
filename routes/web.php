<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Login & logout routes
Route::post('/login', 'LoginController@login')->name('login');
Route::get('/logout', 'LoginController@logout');

Route::get('/dashboard', 'DashboardController@dashboard')->name('dashboard');

// Protected routes for students
Route::group(['middleware' => 'auth'], function () {

    Route::get('/dashboard/record', 'DashboardController@record')->name('record');
    Route::get('/my-courses', 'DashboardController@courses')->name('my-courses');
});

// Protected routes for user admins
Route::group(['middleware' => 'auth'], function () {

    Route::resource('courses', 'CoursesController');
    Route::resource('teachers', 'TeachersController');
    Route::resource('course_offerings', 'CourseOfferingsController');
    Route::resource('students', 'StudentsController');
    Route::resource('enrollments', 'EnrollmentsController');
    Route::resource('works', 'WorksController');
    Route::resource('exams', 'ExamsController');
    Route::resource('percentages', 'PercentagesController');
});

require __DIR__.'/auth.php';
