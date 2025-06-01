<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainCategoryController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\ReviewController;
use App\Models\Category;
use App\Models\Course;

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

Route::get('/home', [HomeController::class, 'index']);
Route::get('/more', [HomeController::class, 'more']);



Route::get('/main-category', [MainCategoryController::class, 'index']);



Route::get('/category/{id}', [CategoryController::class, 'index']);



Route::get('/course/{id}', [CourseController::class, 'index']);

Route::get('/lastcourse/{id}', [CourseController::class, 'last']);

Route::get('/topcourse/{id}', [CourseController::class, 'topRating']);

Route::get('/lessons/{id}', [LessonController::class, 'index']);

Route::get('/showLesson/{id}', [LessonController::class, 'show']);

Route::get('/search/{data}',[HomeController::class,'search']);

Route::get('/auther/{name}',[HomeController::class,'auther']);

#####################      authentication      #################

Route::post('/registe' , [authController::class, 'register']);

Route::post('/login' , [authController::class, 'login']);


    Route::get('/logout' , [authController::class, 'logout'])->middleware('auth:sanctum');

Route::post('/update', [authController::class, 'update'])->middleware('auth:sanctum');

Route::get('/edit' , [authController::class, 'edit'])->middleware('auth:sanctum');

Route::post('/updatePassword',[authController::class, 'updatePassword'])->middleware('auth:sanctum');


 ####################### this routs for  view information users #####################
Route::get('/mycourse', [CourseController::class, 'mycourse'])->middleware('auth:sanctum');

Route::get('/myfavourite', [CourseController::class, 'myfavourite'])->middleware('auth:sanctum');

Route::get('/addcourseSubs/{course_id}', [CourseController::class, 'addcourseSubs'])->middleware('auth:sanctum');

Route::get('/addfavorite/{course_id}', [CourseController::class, 'addfavorite'])->middleware('auth:sanctum');


//   add review  edit controller for review controller
Route::post('/addreview/{id}', [ReviewController::class, 'addreview'])->middleware('auth:sanctum');

Route::get('/show/review/{id}', [ReviewController::class, 'reviews']);


Route::post('/addComment/{id}',[CommentController::class,'addComment'])->middleware('auth:sanctum');

Route::get('/show/comments/{id}', [CommentController::class, 'index']);



