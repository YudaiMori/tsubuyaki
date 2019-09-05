<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API V1 Routes
|--------------------------------------------------------------------------
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::middleware('auth:api')->prefix('/v1')->namespace('Api\V1')->group(function () {
    Route::get('posts', 'PostController@index')->name('postsApi');
    Route::get('posts/{post}', 'PostController@show')->name('postApi');
    Route::post('store', 'PostController@store')->name('storeApi');
    Route::delete('posts/{post}', 'PostController@delete')->name('deleteApi');

    Route::get('users/profile', 'UserController@profile')->name('profileApi');
    Route::get('users/posts', 'UserController@myPosts')->name('myPostsApi');

    Route::post('comments', 'CommentController@store')->name('commentApi');
});
