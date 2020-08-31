<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'order_code', 'product_id', 'product_name','product_price','product_coupon','product_sales_quantity','order_details_total','payment_method'
    ];
    protected $primaryKey = 'order_details_id';
 	protected $table = 'table_chitiet_dathang';

 	public function product()
 	{
 		return $this->belongsTo('App\Product','product_id');
 	}
}
