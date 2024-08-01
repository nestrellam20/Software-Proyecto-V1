<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as ModeloMongo;

class Horarios extends ModeloMongo
{
    protected $connection = 'mongodb'; // base de datos
    protected $collection = 'horarios'; // nombre de la colección
    protected $primaryKey = '_id'; // primary key

    protected $fillable = [
        'dia', 'inicio', 'fin'
    ]; // columnas

    public $timestamps = false;

    /**
     * Crear un nuevo horario.
     *
     * @param string $dia
     * @param string $inicio
     * @param string $fin
     * @return void
     */
    public function horarios($dia, $inicio, $fin)
    {
        $this->create([
            'dia' => $dia,
            'inicio' => $inicio,
            'fin' => $fin,
        ]);
    }

    /**
     * Obtener todos los horarios para un día específico.
     *
     * @param string $dia
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getDias($dia)
    {
        return self::where('dia', $dia)->get();
    }
}
