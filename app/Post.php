<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $timestamps = true; //set time to false
    protected $fillable = [
    	'post_name', 'post_title', 'post_image','post_content'
    ];
    protected $primaryKey = 'post_id';
 	protected $table = 'table_tintuc';
}
