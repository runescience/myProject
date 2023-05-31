<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| data base raw sql query
|--------------------------------------------------------------------------
|
*/

Route::get('/read', function () {

    $results = DB::select('select * from posts where id = ?', [1]);

    //return gettype($results);

    foreach ($results as $post) {
            return $post->title;
    }
    return "no data";

});


Route::get('/read/{id}', function ($id) {


    $results = DB::select('select * from posts where id = ?', [$id]);

    if (empty($results)) {
        return "no data";
    }
    else {
        foreach ($results as $post) {
            return $post->title;
        }
    }


});


// Route::get('/insert', function () {

//     DB::insert('insert into posts(title, content) values(?,?)',
//         ['PHP with Laravel',
//         'Laravel is the best thing that has happened to PHP']);
//     return "appended value";
// });


/*
|--------------------------------------------------------------------------
| Route::get('/insert',
|--------------------------------------------------------------------------
|
*/

// Route::get('/insert', function () {

//     DB::insert('insert into posts(title, content) values(?,?)',
//         ['PHP with Laravel',
//         'Laravel is the best thing that has happened to PHP']);
//     return "appended value";
// });


/*
|--------------------------------------------------------------------------
| post/id/name/password, contact, hazard, planet, ship, universe
|--------------------------------------------------------------------------
|
*/

Route::get('/post/{id}/{name}/{password}', 'PostsController@show_post');
Route::get('/contact', 'PostsController@contact');

Route::get('/hazard/{id}/{name}', 'UniverseController@hazard');
Route::get('/planet/{id}/{name}', 'UniverseController@planet');
Route::get('/ship/{id}/{name}', 'UniverseController@ship');
Route::get('/universe/{id}/{name}', 'UniverseController@universe');

// Edwin? Why is <?php not terminated in this file? should it be??


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









