<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'shipping_name', 'shipping_address', 'shipping_phone','shipping_email','shipping_note'
    ];
    protected $primaryKey = 'shipping_id';
 	protected $table = 'table_thongtin_giaohang';
}
