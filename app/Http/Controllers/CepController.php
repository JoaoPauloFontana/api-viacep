<?php

namespace App\Http\Controllers;

use App\Services\ViaCepService;
use Illuminate\Http\JsonResponse;

class CepController extends Controller
{
    protected ViaCepService $viaCepService;

    /**
     * Cria uma nova instância do controlador.
     *
     * @param ViaCepService $viaCepService
     * @return void
     */
    public function __construct(ViaCepService $viaCepService)
    {
        $this->viaCepService = $viaCepService;
    }

    /**
     * Consulta os dados dos CEPs fornecidos.
     *
     * @param string $ceps
     * @return \Illuminate\Http\JsonResponse
     */
    public function search(string $ceps): JsonResponse
    {
        $cepArray = explode(',', $ceps);
        $results = $this->viaCepService->getCepData($cepArray);

        return response()->json($results);
    }
}
