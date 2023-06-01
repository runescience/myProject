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

/*--------------------------------------------------------------------------
| ELOQUENCE restore items
|--------------------------------------------------------------------------
*/
Route::get('/eloquent_restoredelete', function () {

    $post = App\Post::withTrashed()->where('id', '<', 50)->restore();
    return $post;
});


/*--------------------------------------------------------------------------
| ELOQUENCE Trashing/soft delete
|--------------------------------------------------------------------------
*/
Route::get('/eloquent_readsoftdelete', function () {

    // $post = App\Post::find(14);
    // return $post;

    $post = App\Post::withTrashed()->get();
    return $post;

    // $post = App\Post::withTrashed()->where('id',14)->get();
    // return $post;
});
/*--------------------------------------------------------------------------
| ELOQUENCE Trashing/soft delete
|--------------------------------------------------------------------------
*/
Route::get('/eloquent_softdelete', function () {

    $post = App\Post::where('is_admin', 0)->delete();
    return $post;
});
Route::get('/softdelete', function () {

    $post = App\Post::find(18)->delete();
    return $post;
});
Route::get('/forcedelete', function () {

    $post = App\Post::find(18)->forceDelete();
    return $post;
});
Route::get('/forcedeletetrashed', function () {

    $post = App\Post::onlyTrashed()->where('is_admin',0)->forceDelete();
    return $post;
});

/*--------------------------------------------------------------------------
| ELOQUENCE
|--------------------------------------------------------------------------
*/
Route::get('/eloquentdelete', function () {
    //get posts where ID == 4, order by descent id, and take 1, and then get it to me.
    $post = App\Post::find(6);
    $post->delete();


});

Route::get('/eloquentdelete2-destroy', function () {

    $post = App\Post::destroy(8,9);
    $post = App\Post::where('is_admin', 0)-> delete();
    return $post;
});

Route::get('/eloquentdelete-where-range', function () {

    $post = App\Post::where('is_admin', 0)-> delete();
    return $post;
});




/*--------------------------------------------------------------------------
| ELOQUENCE
|--------------------------------------------------------------------------
*/
Route::get('/updatepost', function () {
    //get posts where ID == 4, order by descent id, and take 1, and then get it to me.
    $posts = App\Post::where('id', 5)->where('is_admin', 0)->
    update(['title'=> 'NEW PHP TITLE', 'content'=> 'I love my php instructor Edwin Diaz']);

});

/*--------------------------------------------------------------------------
| ELOQUENCE
|--------------------------------------------------------------------------
*/
Route::get('/create', function () {
    //get posts where ID == 4, order by descent id, and take 1, and then get it to me.
    $post= App\Post::create([
        'title'=> 'the create method',
        'content'=> 'WOW I\'m learning a lot with Edwin Diaz']);
});

/*--------------------------------------------------------------------------
| ELOQUENCE
|--------------------------------------------------------------------------
*/
Route::get('/basicinsert', function () {

    //get posts where ID == 4, order by descent id, and take 1, and then get it to me.
    $post= new App\Post;
    $post->title = 'New Eloquent title insert';
    $post->content = 'Wow eloquent is really cool, look at this content';
    $post->save();
    return $post; // returns the whole row.
});

/*--------------------------------------------------------------------------
| ELOQUENCE
|--------------------------------------------------------------------------
*/
Route::get('/basicupdate', function () {


    $post= App\Post::find(4);
    $post->title = 'Mystery replacement of #4';
    $post->content = 'Read how the 4th record was replaced Mysteriously';
    $post->save();
    return $post; // returns the whole row.
});

/*--------------------------------------------------------------------------
| ELOQUENCE
|--------------------------------------------------------------------------
*/
Route::get('/findwhere', function () {

    //get posts where ID == 4, order by descent id, and take 1, and then get it to me.
    $posts = App\Post::where('id', 4)->orderBy('id', 'desc')->take(1)->get();
    return $posts; // returns the whole row.
});


Route::get('/findmore', function () {

    //get posts where ID == 4, order by descent id, and take 1, and then get it to me.

    $posts = App\Post::findOrFail(4); // if it doesnt find it, it will return a 404 error
    return $posts; // returns the whole row.

});
Route::get('/findmore2', function () {
    $posts = App\Post::where('users_count', '<', 50)->firstOrFail(); // if it doesnt find it, it will return a 404 error
    return $posts; // returns the whole row.
});


/*
|--------------------------------------------------------------------------
| ELOQUENCE
|--------------------------------------------------------------------------
|
*/
Route::get('/find', function () {

    //backslace  is namespace: App is the folder. Post is the class
    // or you can go to the top and type
    //    namespace App;
    //   instead of use App\Post;
    $posts = App\Post::all();

    // $posts contains ALL items in the post table
    foreach ($posts as $post) {
        return $post->title;
    }
});

/*
|--------------------------------------------------------------------------
| ELOQUENCE
|--------------------------------------------------------------------------
|
*/
Route::get('/find2', function () {

    //backslace  is namespace: App is the folder. Post is the class
    // or you can go to the top and type
    //    namespace App;
    //   instead of use App\Post;
    $post = App\Post::find(4); // 1 is the id

    // $posts contains ALL items in the post table
    return $post->title;

});


/*
|--------------------------------------------------------------------------
| data base raw sql query
|--------------------------------------------------------------------------
|
*/
Route::get('/delete/{id}', function ($id) {


    $results = DB::delete('delete from posts where id = ?', [$id]);

    if ($results == false) {
        return "no data";
    }
    else {
        return "deleted ". $id;
    }


});
/*
|--------------------------------------------------------------------------
| data base raw sql query
|--------------------------------------------------------------------------
|
*/



Route::get('/update/{id}/{title}', function ($id,$title) {


    $results = DB::update('update posts set title = ? where id = ?', [$title, $id]);

    if ($results == false) {
        return "no data";
    }
    else {
        return "updated ". $id;
    }


});



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
//         ['Laravel is awesome with Edwin',
//         'Laravel is the best thing that has happened to PHP. Period']);
//     return "appended value";
// });


/*
|--------------------------------------------------------------------------
| Route::get('/insert',
|--------------------------------------------------------------------------
|
*/

Route::get('/insert', function () {

    DB::insert('insert into posts(title, content) values(?,?)',
        ['PHP with  Edwin',
        'Laravel is the best thing that has happened to PHP. Period']);
    return "appended value";
});


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









