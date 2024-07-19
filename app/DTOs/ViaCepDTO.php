<?php

namespace App\DTOs;

class ViaCepDTO
{
    public string $cep;
    public string $logradouro;
    public ?string $complemento;
    public string $bairro;
    public string $localidade;
    public string $uf;
    public string $ibge;
    public string $gia;
    public string $ddd;
    public string $siafi;

    public function __construct(array $data)
    {
        $this->cep = preg_replace('/[^0-9]/', '', $data['cep']);
        $this->logradouro = $data['logradouro'];
        $this->complemento = $data['complemento'] ?? '';
        $this->bairro = $data['bairro'];
        $this->localidade = $data['localidade'];
        $this->uf = $data['uf'];
        $this->ibge = $data['ibge'];
        $this->gia = $data['gia'];
        $this->ddd = $data['ddd'];
        $this->siafi = $data['siafi'];
    }

    public function toArray(): array
    {
        return [
            'cep' => $this->cep,
            'label' => "{$this->logradouro}, {$this->bairro}",
            'logradouro' => $this->logradouro,
            'complemento' => $this->complemento,
            'bairro' => $this->bairro,
            'localidade' => $this->localidade,
            'uf' => $this->uf,
            'ibge' => $this->ibge,
            'gia' => $this->gia,
            'ddd' => $this->ddd,
            'siafi' => $this->siafi,
        ];
    }
}
