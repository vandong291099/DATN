<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = true; 
    protected $fillable = [
    	'product_name', 'product_slug','category_id','brand_id','product_description','product_content','product_price','product_image','product_status','product_hightlight','created_at'
    ];
    protected $primaryKey = 'product_id';
 	protected $table = 'table_sanpham';

 	public function pimages()
 	{
 		return $this->hasMany('App\ProductImage');
 	}
}
