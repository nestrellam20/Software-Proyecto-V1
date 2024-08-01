<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as ModeloMongo;

class CertificadosMedicos extends ModeloMongo
{
    protected $connection = 'mongodb'; // Conexión a la base de datos MongoDB
    protected $collection = 'certificados_medicos'; // Nombre de la colección en MongoDB
    protected $primaryKey = '_id'; // Llave primaria

    protected $fillable = [
        'fecha', 'descripcion'
    ]; // Columnas de la colección

    public $timestamps = false; // Deshabilitar timestamps automáticos

    // Constructor para inicializar un certificado médico
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->fecha = $attributes['fecha'] ?? null;
        $this->descripcion = $attributes['descripcion'] ?? '';
    }

    // Método para obtener la fecha del certificado
    public function getFecha()
    {
        return $this->fecha;
    }

    // Método para obtener la descripción del certificado
    public function getDescripcion()
    {
        return $this->descripcion;
    }
}
