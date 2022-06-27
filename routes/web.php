<?php


use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Yaml\Yaml;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use App\Models\Category;

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

/*  For debugging write
    \Illuminate\Support\Facades\DB::listen(function ($query){
        logger($query->sql, $query->bindings);
    }); */



    //$posts = Post::all();

    return view("posts", [
        'posts' => Post::with('category')->get()
    ]);
});



Route::get('/posts/{post}', function (Post $post) {
   // $postUrl = Post::findOrFail($post);
    return view('post', [
        'post' => $post
    ]);
});
//->where('post', '[A-z_\-]+');


Route::get('/categories/{category:slug}', function (Category $category) {
    // $postUrl = Post::findOrFail($post);
     return view('posts', [
         'posts' => $category->posts
     ]);
 });






