<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'post';

    protected $fillable = array('title', 'author', 'description', 'posted_date', 'keyword');
}
