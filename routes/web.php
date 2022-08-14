<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;

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
   
    return view('posts',[
        'posts' => Post::latest()->get()
    ]);


});

Route::get('/post/{post:slug}', function (Post $post) {
        //find a post by its slug and pass it to a view called post
        //technique -> write in temporary comment like above one
        //whate you want to achieve and then write a code until it works

        return view('post', [
            'post' => $post
        ]);
});
// ->where('post', '[A-z_/-]+');
// ->whereAlpha('post');


Route::get('/categories/{category:slug}', function (Category $category) {

    // DB::listen(function($query){
    //     logger($query->sql);
    // }) ;

    return view('posts', [
        'posts' => $category->posts
    ]);
});

Route::get('/author/{author:username}', function (User $author) {

    // DB::listen(function($query){
    //     logger($query->sql);
    // }) ;

    return view('posts', [
        'posts' => $author->posts
    ]);
});


