<?php

use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client;

class ConsultaCepFeatureTest extends TestCase {
    private $client;

    protected function setUp(): void
    {
        $this->client = new Client();
    }

    public function testConsultaCepReal()
    {
        $cep = '01001000';
        $url = "https://viacep.com.br/ws/$cep/json/";

        $response = $this->client->get($url);

        $data = json_decode($response->getBody(), true);

        $this->assertEquals('Praça da Sé', $data['logradouro']);
        $this->assertEquals('Sé', $data['bairro']);
        $this->assertEquals('São Paulo', $data['localidade']);
        $this->assertEquals('SP', $data['uf']);
    }
}
