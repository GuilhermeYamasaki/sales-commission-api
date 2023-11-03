@extends('layouts.mail')

@section('content')
    <div class="max-w-md mx-auto bg-white rounded-md p-6 shadow-md">
        <h1 class="text-2xl font-bold mb-4">Relatório Diário</h1>

        <div class="mb-4">
            <p class="text-lg">
                Olá {{ $seller->name }}, segue abaixo o relatório de vendas com comissão do dia {{ $day }}.
            </p>
        </div>

        <div class="mb-4">
            <p class="text-lg">Quantidade de vendas: {{ $amount }} </p>
        </div>

        <div class="mb-4">
            <p class="text-lg">Total de vendas: R$ {{ $total }} </p>
        </div>

        <div class="mb-4">
            <p class="text-lg">Total de comissão: R$ {{ $totalComission }} </p>
        </div>
    </div>
@endsection
