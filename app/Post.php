<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // the table name from the model POST is posts
    // if you want to change the table name you can do it like this
    // protected $table = 'posts'; // this is the table name

    protected $table = "posts"; // this is the table name

    protected $primaryKey = "id"; // this is the primary key of the table



}
