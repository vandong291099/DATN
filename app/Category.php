<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;
    protected $fillable = [
    	'category_name', 'category_slug', 'category_description','category_status'];
    protected $primaryKey = 'category_id';
 	protected $table = 'table_danhmuc';
}
