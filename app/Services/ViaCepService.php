<?php

namespace App\Services;

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

class ViaCepService
{
    private Client $_httpClient;
    public function __construct()
    {
        $this->_httpClient = new Client([
            'base_uri' => 'viacep.com.br/ws/',
        ]);
    }

    private function _getResponseBody(ResponseInterface $response)
    {
        return json_decode($response->getBody()->getContents(), true);
    }

    public function find($cep)
    {
        try {
            $cep = toOnlyNumbers($cep);

            $rawResponse = $this->_httpClient->get("{$cep}/json/");

            $response = $this->_getResponseBody($rawResponse);
            
            return [
                'zipcode' => $response['cep'],
                'address' => $response['logradouro'],
                'neighborhood' => $response['complemento'],
                'neighborhood' => $response['bairro'],
                'city' => $response['localidade'],
                'state' => $response['uf']
            ];
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
