<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admincontroller;
use App\Http\Controllers\coachcontroller;
use App\Http\Controllers\userrcontrol;
use App\Http\Models\adminmodel;
use App\Http\Models\coachmodel;
use App\Http\Models\usermodel;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//coach
Route::get('/getcoach', [coachcontroller::class, 'getcoach']);
Route::post('/addcoach', [coachcontroller::class, 'addcoach']);
Route::put('/updatecoach/{id}', [coachcontroller::class, 'updatecoach']);
Route::delete('/deletecoach/{id}', [coachcontroller::class, 'deletecoach']);
Route::get('/getcoachid/{id}', [coachcontroller::class, 'getcoachid']);

//admin
Route::get('/getadmin', [admincontroller::class, 'getadmin']);
Route::post('/addadmin', [admincontroller::class, 'addadmin']);
Route::put('/updateadmin/{id}', [admincontroller::class, 'updateadmin']);
Route::delete('/deleteadmin/{id}', [admincontroller::class, 'deleteadmin']);
Route::get('/getadminid/{id}', [admincontroller::class, 'getadminid']);

//user
Route::get('/getuser', [userrcontrol::class, 'getuser']);
Route::post('/adduser', [userrcontrol::class, 'adduser']);
Route::put('/updateuser/{id}', [userrcontrol::class, 'updateuser']);
Route::delete('/deleteuser/{id}', [userrcontrol::class, 'deleteuser']);
Route::get('/getuserid/{id}', [userrcontrol::class, 'getuserid']);

