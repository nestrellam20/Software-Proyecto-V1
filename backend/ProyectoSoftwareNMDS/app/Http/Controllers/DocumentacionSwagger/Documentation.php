<?php

namespace App\Http\Controllers\DocumentacionSwagger;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * @OA\Info(
 *    title="APIs For Thrift Store",
 *    version="1.0.0",
 *    description="API documentation for Thrift Store"
 * ),
 * @OA\SecurityScheme(
 *     securityScheme="bearerAuth",
 *     in="header",
 *     name="bearerAuth",
 *     type="http",
 *     scheme="bearer",
 *     bearerFormat="JWT",
 * )
 */
class Documentation extends Controller
{
    // Añade métodos con anotaciones OpenAPI si es necesario
}
