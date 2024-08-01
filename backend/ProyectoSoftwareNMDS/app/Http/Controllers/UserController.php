<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * @SWG\Get(
 *     path="/api/users",
 *     summary="Obtener usuarios",
 *     @SWG\Response(response=200, description="Usuarios obtenidos exitosamente")
 * )
 */
class UserController extends Controller
{
    public function index()
    {
        // Lógica para obtener usuarios
    }
}
