<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Painel Exportação - Camaquã/RS</h1>

    @if($erro)
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
            <strong class="font-bold">Atenção:</strong>
            <span class="block sm:inline">{{ $erro }}</span>
        </div>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @foreach($indicadores as $moeda)
                <div class="border rounded-lg p-4 shadow-sm bg-white">
                    <h2 class="text-xl font-semibold">{{ $moeda['name'] }}</h2>
                    <p class="text-3xl font-bold text-green-600">
                        R$ {{ number_format($moeda['bid'], 2, ',', '.') }}
                    </p>
                    <p class="text-sm text-gray-500">Variação: {{ $moeda['pctChange'] }}%</p>
                    <p class="text-xs text-gray-400 italic">Atualizado em: {{ $moeda['create_date'] }}</p>
                </div>
            @endforeach
        </div>
    @endif
</div>
