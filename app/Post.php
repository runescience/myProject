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

    protected $fillable = ['title', 'content']; // this is the columns of the table

    public $timestamps = true; // this is the time stamps of the table

    // if you want to change the time stamps you can do it like this
    // const CREATED_AT = 'creation_date';
    // const UPDATED_AT = 'last_update';



}
