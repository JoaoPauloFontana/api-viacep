<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use App\DTOs\ViaCepDTO;

class ViaCepService
{
    /**
     * Consulta os dados dos CEPs fornecidos.
     *
     * @param array $ceps
     * @return array
     */
    public function getCepData(array $ceps): array
    {
        $results = [];

        $responses = Http::pool(fn ($pool) => array_map(fn ($cep) => $pool->get("https://viacep.com.br/ws/{$cep}/json/"), $ceps));

        foreach ($responses as $response) {
            if ($response->successful()) {
                $data = $response->json();
                $dto = new ViaCepDTO($data);
                $results[] = $dto->toArray();
            }
        }

        return $results;
    }
}
