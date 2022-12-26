<?php

use App\Models\Event;
use App\Models\User;
use App\Models\Artist;
use App\Models\Genre;
use App\Models\Venue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventingController;
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


// Common Resource Routes:
// index - Show all event
// show - Show single event
// create - Show form to create new event
// store - Store new event
// edit - Show form to edit event
// update - Update event
// destroy - Delete event  

// All events
Route::get('/', [EventingController::class,'index']);

// create event
Route::get('/events/create', [EventingController::class,'create'])->middleware('auth');

// store event
Route::post('/events', [EventingController::class,'store'])->middleware('auth');

// show edit form
Route::get('/events/{event}/edit',[EventingController::class,'edit'])->middleware('auth');

// update form
Route::put('/events/{event}', [EventingController::class,'update'])->middleware('auth');

// delete event
Route::delete('/events/{event}', [EventingController::class,'destroy'])->middleware('auth');

// AdminLog events
Route::get('/adminPanel', [UserController::class,'adminLog'])->name('login')->middleware('guest');

// Manage events
Route::get('/managePanel', [UserController::class,'manage'])->middleware('auth');

// create genre
Route::post('/adminAdd/g', [UserController::class,'create_g'])->middleware('auth');
// create venue
Route::post('/adminAdd/v', [UserController::class,'create_v'])->middleware('auth');
// create artist
Route::post('/adminAdd/a', [UserController::class,'create_a'])->middleware('auth');

// update genre
Route::put('/adminEdit/g', [UserController::class,'update_g'])->middleware('auth');
// update venue
Route::put('/adminEdit/v', [UserController::class,'update_v'])->middleware('auth');
// update artist
Route::put('/adminEdit/a', [UserController::class,'update_a'])->middleware('auth');

// delete genre
Route::delete('/adminDelete/g', [UserController::class,'destroy_g'])->middleware('auth');
// delete venue
Route::delete('/adminDelete/v', [UserController::class,'destroy_v'])->middleware('auth');
// delete artist
Route::delete('/adminDelete/a', [UserController::class,'destroy_a'])->middleware('auth');

// Admin Log Post
Route::post('/users',[UserController::class,'adminAuth']);

// Admin Logout Post
Route::post('/logout',[UserController::class,'logout'])->middleware('auth');









// singal event
Route::get('/events/{event}', [EventingController::class,'show']);


