<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostController;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


//for user
Route::group(['middleware'=> 'auth'],function(){

Route::get('/home',[HomeController::class,'index']);

Route::get('/add-post',[PostController::class,'addPost']);

Route::post('/createPost',[PostController::class,'createPost']);

Route::get('/my-post',[PostController::class,'myPost']);

Route::post('/create-post',[PostController::class,'createPost']);

Route::get('/add-comment/{id}',[PostController::class,'addComment']);
 
Route::post('/create-comment',[PostController::class,'createComment']);

Route::get('/post-comment/{id}',[PostController::class,'postComment']);

Route::post('/search-post',[HomeController::class,'index']);

Route::get('/category/{name}',[PostController::class,'category']);

Route::get('/edit-post/{id}',[PostController::class,'editPost']);

Route::post('/update-post',[PostController::class,'updatePost']);

Route::get('/edit-comment/{id}',[PostController::class,'editComment']);

Route::post('/update-comment',[PostController::class,'updateComment']);


});

//for admin
Route::group(['middleware'=> 'auth'],function(){

   Route::get('/admin/home',[AdminController::class,'Home']);

   Route::get('/admin/delete-post/{id}',[AdminController::class,'deletePost']);
    
   Route::get('/admin/post-comment/{id}',[AdminController::class,'postComment']);

   Route::get('/admin/delete-comment/{id}',[AdminController::class,'deleteComment']);

   Route::get('/category/{name}',[AdminController::class,'category']);
   
   
});
