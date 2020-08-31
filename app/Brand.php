<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public $timestamps = false;
    protected $fillable = [
    	'brand_name', 'brand_slug', 'brand_description','brand_status'];
    protected $primaryKey = 'brand_id';
 	protected $table = 'table_thuonghieu';
}
