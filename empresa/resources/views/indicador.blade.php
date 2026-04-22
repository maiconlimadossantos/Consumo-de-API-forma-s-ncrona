<div class="p-6 bg-gray-100 min-h-screen">
    <h1 class="text-xl font-bold mb-6">Indicadores Econômicos - Exportadora Camaquã</h1>

    @if($erro)
        <div class="bg-red-500 text-white p-4 rounded shadow">
            <strong>Atenção:</strong> {{ $erro }}
        </div>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach($indicadores as $item)
                <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-green-500">
                    <h2 class="text-gray-600 font-semibold">{{ $item['name'] }}</h2>
                    <p class="text-3xl font-bold text-gray-800">
                        R$ {{ number_format($item['bid'], 2, ',', '.') }}
                    </p>
                    <span class="text-{{ $item['pctChange'] > 0 ? 'green' : 'red' }}-600">
                        Variação: {{ $item['pctChange'] }}%
                    </span>
                </div>
            @endforeach
        </div>
    @endif
</div>
