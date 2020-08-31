<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    public $timestamps = true; //set time to false
    protected $fillable = [
    	'contact_name', 'contact_email', 'contact_phone','contact_email', 'contact_content',
    ];
    protected $primaryKey = 'contact_id';
 	protected $table = 'table_lienhe';
}

