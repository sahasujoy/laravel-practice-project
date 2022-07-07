<?php

use App\Http\Controllers\CrudController;
use App\Http\Controllers\dummyApi;
use App\Http\Controllers\FileController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/getdata', [dummyApi::class, 'getData'])->name('data.get');


//::::::::::::::::::::::::::::::::::::::::::::::::::: Start Post Api ::::::::::::::::::::::::::::::::::::::::::
Route::get('/post', [PostController::class, 'showAllData'])->name('data.show');

Route::post('/add-data', [PostController::class, 'addData'])->name('data.add');

Route::put('/update-data', [PostController::class, 'updateData'])->name('data.update');

Route::delete('/delete-data/{id}', [PostController::class, 'deleteData'])->name('data.delete');

Route::get('/search-data/{title}', [PostController::class, 'searchData'])->name('data.search');

Route::post('/add-data-with-validation', [PostController::class, 'addDataWithValidation'])->name('data.addwithvalidation');
//::::::::::::::::::::::::::::::::::::::::::::::::::: End Post Api ::::::::::::::::::::::::::::::::::::::::::::::::

Route::post("login", [UserController::class, 'index']);

Route::post('/upload', [FileController::class, 'upload']);

Route::group(['middleware' => 'auth:sanctum'], function(){
    Route::get('/search-data/{title}', [PostController::class, 'searchData'])->name('data.search');

});






