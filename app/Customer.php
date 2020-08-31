<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public $timestamps = true; //set time to false
    protected $fillable = [
    	'customer_name', 'customer_email', 'customer_password','customer_phone',
    	'created_at'
    ];
    protected $primaryKey = 'customer_id';
 	protected $table = 'table_khachhang';
}
