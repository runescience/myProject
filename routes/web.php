<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;

Route::get('/post/{id}/{name}/{password}', 'PostsController@show_post');

Route::get('/contact', 'PostsController@contact');

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

//Route :: resource('posts', 'PostsController');

/*  good but unused
**  Route::get('/post/{id}', 'PostsController@index');

//Route::get('/post/{id}/{name}/{password}', 'PostsController@show_post');

//This gives us a view
/* Route::get('/', function () {
**     return view('welcome');  
** });
 */

// Route::get('/post/data', 'PostsController@index', function($data);

// Route::get('/admin/posts', function () {
//     return 'admin is here';   
    
// });

// Route::get('/hello-world', function () {
//     return 'Hello World';
// });


// Route::get('/about', function () {
//     return 'hi about page';   /* this gives us a view */
    
// });

// Route::get('/contacts', function () {
//     return ' hi contacts page';   /* this gives us a view */
    
// });

//  /* the id value is cached. its a closure function*/

// Route::get('/post/{id}/{name}', function ($id,$name)  { 
//     return "this is post transaction number " . $id . " " . $name; 
// });

// Route::get('/posts/{id}/{name}', function ($id,$name)  { 
//     return "this is the post  number " . $id . " " . $name;     
// });

// Route::get('/barkie/{id}/{name}', function ($id,$name)  { 
//     return "this is the raven number " . $id . " " . $name;     
// });


// Route::get('/raven/{id}', function ($id)  { 
//     return "this is the raven number " . $id; 
// });

// Route::get('admin/posts/example', array('as'=>'admin.home', function(){

//     $url = route('admin.home');
//     return "this url is " . $url;
// }));









