<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as ModeloMongo;

class CitasMedicas extends ModeloMongo
{
    /**
     * Especifica la conexión de la base de datos MongoDB.
     */
    protected $connection = 'mongodb';

    /**
     * Nombre de la colección de MongoDB asociada a este modelo.
     */
    protected $collection = 'citas_medicas';

    /**
     * La clave primaria de la colección.
     */
    protected $primaryKey = '_id';

    /**
     * Los atributos que son asignables en masa.
     */
    protected $fillable = [
        'paciente_id', 
        'medico_id', 
        'fecha_cita', 
        'hora_cita', 
        'motivo', 
        'estado',
        'notas'
    ];

    /**
     * Indica si el modelo debe usar marcas de tiempo.
     * Establecido en false porque MongoDB no las utiliza por defecto.
     */
    public $timestamps = false;

    /**
     * Relación con el modelo Paciente.
     */
    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'paciente_id', '_id');
    }

    /**
     * Relación con el modelo Medico.
     */
    public function medico()
    {
        return $this->belongsTo(Medico::class, 'medico_id', '_id');
    }
}