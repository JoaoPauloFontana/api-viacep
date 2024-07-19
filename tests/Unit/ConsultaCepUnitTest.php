<?php

use PHPUnit\Framework\TestCase;

class ConsultaCepUnitTest extends TestCase {
    private function consultaCep($cep, $httpClient)
    {
        $url = "https://viacep.com.br/ws/$cep/json/";

        $response = $httpClient($url);
        $data = json_decode($response, true);

        return $data;
    }

    public function testConsultaCep()
    {
        $mockHttpClient = function ($url) {
            if ($url === "https://viacep.com.br/ws/01001000/json/") {
                return json_encode([
                    'cep' => '01001000',
                    'logradouro' => 'Praça da Sé',
                    'bairro' => 'Sé',
                    'localidade' => 'São Paulo',
                    'uf' => 'SP'
                ]);
            }
            return json_encode([]);
        };

        $resultado = $this->consultaCep('01001000', $mockHttpClient);

        $this->assertEquals('Praça da Sé', $resultado['logradouro']);
        $this->assertEquals('Sé', $resultado['bairro']);
        $this->assertEquals('São Paulo', $resultado['localidade']);
        $this->assertEquals('SP', $resultado['uf']);
    }
}
