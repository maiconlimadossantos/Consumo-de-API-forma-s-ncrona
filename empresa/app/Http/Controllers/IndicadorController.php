<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use App\Models\Cotacao;
use Exception;

class PainelExportacaoController extends Controller
{
    public function exibirPainel()
    {
        $url = "https://economia.awesomeapi.com.br/last/USD-BRL,EUR-BRL";
        $dadosMoedas = [];
        $mensagemErro = null;

        try {
            // Requisição síncrona com timeout de 5 segundos para evitar travamento infinito
            $response = Http::timeout(5)->get($url);

            if ($response->successful()) {
                $dadosMoedas = $response->json();

                // Salva no histórico (Model/Migração) para auditoria da empresa
                foreach ($dadosMoedas as $moeda) {
                    Cotacao::create([
                        'moeda' => $moeda['code'],
                        'preco' => $moeda['bid'],
                        'variacao' => $moeda['pctChange'],
                        'data_consulta' => now(),
                    ]);
                }
            } else {
                $mensagemErro = "Servidor de cotações retornou um erro inesperado.";
            }
        } catch (Exception $e) {
            $mensagemErro = "Falha na conexão externa. Verifique a rede ou tente novamente mais tarde.";
        }

        return view('exportadora.painel', [
            'indicadores' => $dadosMoedas,
            'erro' => $mensagemErro
        ]);
    }
}