<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class MelhorEnvioService
{
    protected $apiKey;

    public function __construct()
    {
        $this->apiKey = config('services.melhor_envio.api_key'); // Adapte conforme necessário
    }

    public function calcularFrete($cepDestino, $peso, $dimensoes)
    {
        // Exemplo de chamada à API do Melhor Envio
        $response = Http::post('https://api.melhorenvio.com.br/frete', [
            'api_key' => $this->apiKey,
            'cep_destino' => $cepDestino,
            'peso' => $peso,
            'dimensoes' => $dimensoes,
        ]);

        return $response->json();
    }
}
