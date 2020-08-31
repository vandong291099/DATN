<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'coupon_name', 'coupon_code', 'coupon_quantity','coupon_number', 'coupon_condition'
    ];
    protected $primaryKey = 'coupon_id';
 	protected $table = 'table_magiamgia';
}
	
