<?php

namespace App\Http\Controllers\Usuarios;

use App\Http\Controllers\Controller;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Throwable;
use App\Services\UtilService;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Calculation\MathTrig\Arabic;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use stdClass;


use function PHPUnit\Framework\isEmpty;

class AvanceObraOfflineController extends Controller
{
    protected $util;

    public function __construct()
    {
        $this->util = new UtilService();
    }

    public function getRegistroAvanceObraFiscal($agente_revision, $tipo_avance)
    {
        try {
            $reponseInfor = $this->avanceObraOfflineService->getRegistroAvanceObraFiscal($agente_revision);        
            if (!$reponseInfor->getOk()) {
                throw new Exception($reponseInfor->getMessage());
            }
            log::alert("se descargo data fiscalizador:");
            log::alert(collect($agente_revision));

            $responseHistoricoDescargas = $this->serviceHistoricoDescarga->store($agente_revision);
            if (!$responseHistoricoDescargas->getOk()) {
                throw new Exception($responseHistoricoDescargas->getMessage());
            }

            return response()->json([
                'ok' => true,
                'text' => [
                    'registro' => $reponseInfor->getData(),
                ]
            ]);
        } catch (Exception $e) {
            Log::error("ERROR " . __FILE__ . ":getRegistroAvanceObra -> " . $e);
            return response()->json([
                'ok' => false,
                'text' => [
                    'message' => $e->getMessage(),
                ],
            ]);
        }
    }

}