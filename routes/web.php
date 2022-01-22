<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GetDataController;

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

Route::get('/', [GetDataController::class, 'getData']);
Route::post('/getdata', [GetDataController::class, 'getData'])->name('getdata.index');
Route::post('/download', [GetDataController::class, 'downloadVideo'])->name('downloadVideo.download');
