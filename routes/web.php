<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\SearchController;

use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Livewire\Friends\FriendsIndex;
use App\Http\Controllers\BestReplyController;
use App\Http\Controllers\NotificationController;

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
    return auth()->check() 
            ? view('newsfeed.index')
            : view('welcome');     
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/** Search */
Route::get('/search', [SearchController::class, 'index']);

/** Newsfeed */
Route::view('/newsfeed/followings', 'newsfeed.newsfeed-followings');


// Testing purpose
Route::view('/profile', 'layouts.base'); 
Route::view('/email', 'emails.new-follower'); 

Route::get('/welcome', [ProfileController::class, 'welcome'])->middleware('auth'); 

Route::get('/posts/{post}/likes', function (Post $post) {
    $postReaction = $post->likes->all();
    return $postReaction;
});


Route::prefix('/{user:username}')->middleware('auth')
                                 ->group(function () {
    /** Profile */
    Route::get('/', [ProfileController::class, 'show'])->name('profile');
    Route::get('/edit', [ProfileController::class, 'edit']);
    Route::put('/', [ProfileController::class, 'update']);

    /** Follows */
    Route::post('/follow', [FollowController::class, 'store']);
    Route::delete('/unfollow', [FollowController::class, 'destroy']);

    /** Friends */
    Route::get('/friends', [FriendController::class, 'index']);
    Route::post('/befriend', [FriendController::class, 'store']);
    Route::delete('/add', [FriendController::class, 'destroy']);

    /** Photos */
    Route::get('/photos', [PhotoController::class, 'index']);

    /** Notifications */
    Route::get('/notifications', [NotificationController::class, 'index'])->named('notifications.index');

    /** Posts */
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
                                    
    Route::prefix('/posts/{post}')->group(function () {

        /** Comments */
        Route::get('/comments/create', [CommentController::class, 'create'])->name('comments.create');
        Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
        Route::get('/comments/{comment}', [CommentController::class, 'show'])->name('comments.show');
        Route::get('/comments/{comment}/edit', [CommentController::class, 'edit']);
        Route::put('/comments/{comment}', [CommentController::class, 'update']);
        Route::delete('/comments/{comment}', [CommentController::class, 'destroy']);
        
        /** Best reply */
        Route::put('/comments/{comment}/rate', [BestReplyController::class, 'update'])->name('comments.rate');

        /** Like */
        Route::post('/like', [LikeController::class, 'store']);
        Route::delete('/unlike', [LikeController::class, 'destroy']);
    });
});

/** Groups */
Route::get('/groups/create', [GroupController::class, 'create'])->name('groups.create');
Route::post('/groups', [GroupController::class, 'store'])->name('groups.store');
Route::get('/groups/{group}', [GroupController::class, 'show'])->name('groups.show');