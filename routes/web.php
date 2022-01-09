<?php

use Illuminate\Support\Facades\Route;
use App\Controllers\LoginController;

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
Route::get('/dashboard', 'PagesController@dashboard');
Route::post('/login', 'LoginController@login');
Route::get('/logout', 'LoginController@logout');

// Resources
Route::resource('courses', 'CoursesController');
Route::resource('teachers', 'TeachersController');
Route::resource('course_offerings', 'CourseOfferingsController');
Route::resource('students', 'StudentsController');
Route::resource('enrollments', 'EnrollmentsController');
Route::resource('works', 'WorksController');
Route::resource('exams', 'ExamsController');
Route::resource('percentages', 'PercentagesController');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
