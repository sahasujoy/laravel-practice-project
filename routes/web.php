<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\QuerybuilderController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home/{name?}', [HomeController::class, 'index'])->name('home.index');

Route::get('/user', [UserController::class, 'index'])->name('user.index');

Route::get('/posts', [ClientController::class, 'getAllPost'])->name('posts.getallpost');

Route::get('/posts/{id}', [ClientController::class, 'getPostById'])->name('posts.getpostbyid');

Route::get('/add-post', [ClientController::class, 'addPost'])->name('posts.addpost');

Route::get('/larablog/post', [PostController::class, 'index'])->name('larablog.post.index');

Route::get('/add-post', [PostController::class, 'addPost'])->name('post.add');

Route::post('/add-post', [PostController::class, 'addPostSubmit'])->name('post.add.submit');

Route::get('/singlepost/{id?}', [PostController::class, 'singlePost'])->name('post.single');


//::::::::::::::::::::::::::::::::::::::::::Query Builder :::::::::::::::::::::::::::::::::::::::::::::::
Route::get('/qb-posts', [QuerybuilderController::class, 'index'])->name('qb.posts');

Route::get('/add-student', [StudentController::class, 'addStudent'])->name('student.add');

Route::get('/add-course', [StudentController::class, 'addCourse'])->name('course.add');
