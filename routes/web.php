<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminAuthenticate;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layout.main-page-with-hero');
})->name('home');

Route::get('/explore_courses',[PageController::class,'explore_courses'])->name('explore_courses');
Route::get('/explore_courses/search',[PageController::class,'explore_courses_search'])->name('explore.courses_search');

Route::get('/explore_courses/course_content/{courseId}/{courseSlug}',[PageController::class,'course_content'])->name('course_content');

//user login and register routes below
Route::get('/login',[UserController::class,'show_login_form'])->name('user.login_form');
Route::post('/resister_save',[UserController::class,'register_save'])->name('user.register_save');



Route::get('/register',[UserController::class,'show_register_form'])->name('user.register_form');
Route::post('/login_validate',[UserController::class,'login_validate'])->name('user.login_validate');

Route::post('/',[UserController::class,'logout'])->name('user.logout');

Route::get('/course/{course_slug}/chapter/{chapter_id}/content/{content_id}', [ChapterController::class, 'show_chapter_content_in_accordion'])->name('chapter.show');


Route::get('auth/redirect/google',[GoogleAuthController::class,'redirect'])->name('google-auth');
Route::get('auth/google/call-back',[GoogleAuthController::class,'callbackGoogle']);



Route::group(['prefix' =>'admin'],function(){

    Route::group(['middleware' => 'admin.guest'],function(){
        Route::get('/login', [AdminController::class, 'admin_login'])->name('admin.login');
        Route::post('/login_validate', [AdminController::class, 'adminlogin_validate'])->name('admin.login_validate');
    });

    Route::group(['middleware' => 'admin.auth'],function(){
        Route::get('/dashboard',[AdminController::class,'admin_dashboard'])->name('admin.dashboard');
        Route::get('/{courseId}/{courseSlug}/add_chapter',[AdminController::class,'admin_add_chapter'])->name('admin.add_chapter');
        Route::post('/store_chapter/{courseId}/{courseSlug}', [AdminController::class, 'store_chapter'])->name('admin.store_chapter');
        Route::put('/add_chapter/{chapterId}/update-chapter-and-topics',[AdminController::class,'update_chapter_and_topics'])->name('admin.update_chapter_and_topics');
    
    
        Route::post('/add-course',[CourseController::class,'admin_add_course'])->name('admin.add_course');
        Route::delete('/delete-course/{courseId}',[CourseController::class,'admin_delete_course'])->name('admin.delete_course');

    
        Route::post('/store-content/{chapter}', [AdminController::class, 'store_content'])->name('admin.store_content');
    
        
        Route::get('/logout', [AdminController::class, 'admin_logout'])->name('admin.logout');
    
    
        //new dashboard of admin and has to update it
        Route::get('/newdashboard',[AdminController::class,'dashboard'])->name('admin.newdashboard'); 
        
    });
 
});








