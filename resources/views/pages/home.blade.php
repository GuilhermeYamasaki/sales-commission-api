@extends('layouts.admin')

@section('content')
    <div class="w-full p-6 bg-white rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold mb-4">Selecione uma opção:</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="p-4 bg-blue-200 rounded-lg">
                <div class="text-xl font-semibold mb-2">Vendedores</div>
                <p>Visualize informações sobre os vendedores.</p>
                <a href="{{ route('sellers.index') }}" class="mt-4 block text-blue-600 hover:underline">Ver Vendedores</a>
            </div>

            <div class="p-4 bg-green-200 rounded-lg">
                <div class="text-xl font-semibold mb-2">Vendas</div>
                <p>Veja os detalhes das vendas realizadas.</p>
                <a href="#" class="mt-4 block text-green-600 hover:underline">Ver Vendas</a>
            </div>
        </div>
    </div>
@endsection
