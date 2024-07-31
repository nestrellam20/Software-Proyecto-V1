<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    
    protected $connection = 'mongodb';
    protected $collection = 'users';
    protected $primaryKey = '_id'; 


    protected $fillable = [
        'date_time', 'description'
    ];


    public $timestamps = false;
}
