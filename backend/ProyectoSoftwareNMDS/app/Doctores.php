<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctores extends Model
{
    protected $connection = 'mongodb'; //base de datos
    protected $collection = 'users';  //aqui va el nombre de la coleccion
    protected $primaryKey = '_id';  // primary key siempre la misma


    protected $fillable = [
        'date_time', 'description'
    ]; //columnas


    public $timestamps = false;
}
