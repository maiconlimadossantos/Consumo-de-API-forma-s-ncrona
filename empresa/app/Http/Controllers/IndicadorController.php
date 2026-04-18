<?php

namespace App\Http\Controllers;



namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\View\View;
use Exception;

class IndicadorController extends Controller
{
    public function index(): View
    {
        $url = "https://economia.awesomeapi.com.br/last/USD-BRL,EUR-BRL";
        $indicadores = [];
        $erro = null;

        try {
            // Consumo síncrono: O PHP espera a resposta antes de prosseguir
            $response = Http::timeout(5)->get($url);

            if ($response->successful()) {
                $indicadores = $response->json();
            } else {
                $erro = "Não foi possível recuperar os dados da AwesomeAPI no momento.";
            }
        } catch (Exception $e) {
            $erro = "Erro de conexão: O servidor de cotações está indisponível.";
        }

        return view('painel.indicadores', compact('indicadores', 'erro'));
    }
}
