<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;

Route::inertia('/', 'welcome')->name('home');

Route::resource('students', StudentController::class);
Route::resource('courses', CourseController::class);