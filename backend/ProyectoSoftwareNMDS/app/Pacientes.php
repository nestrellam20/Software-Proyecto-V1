<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as ModeloMongo;

class Pacientes extends ModeloMongo
{
    protected $connection = 'mongodb'; // base de datos
    protected $collection = 'pacientes'; // nombre de la colección
    protected $primaryKey = '_id'; // primary key

    protected $fillable = [
        'cedula', 'nombres', 'sexo', 'direccion', 'telefono', 'fecha_nacimiento'
    ]; // columnas

    public $timestamps = false;
}