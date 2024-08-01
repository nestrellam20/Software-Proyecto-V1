<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as ModeloMongo;

class Citas extends ModeloMongo
{
    protected $connection = 'mongodb'; // base de datos
    protected $collection = 'citas'; // nombre de la colección
    protected $primaryKey = '_id'; // primary key

    protected $fillable = [
        'asistida', 'anulada', 'horario'
    ]; // columnas

    public $timestamps = false;

    /**
     * Método para obtener el horario de la cita.
     *
     * @return \DateTime
     */
    public function getHorario()
    {
        return $this->attributes['horario'] ?? null;
    }

    /**
     * Método para crear una cita.
     *
     * @param boolean $asistida
     * @param boolean $anulada
     * @return void
     */
    public function citas($asistida, $anulada)
    {
        $this->asistida = $asistida;
        $this->anulada = $anulada;
        $this->save();
    }
}
