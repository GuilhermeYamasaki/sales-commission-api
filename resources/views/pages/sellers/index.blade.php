@extends('layouts.admin')

@section('content')
    <div class="max-w-screen-lg mx-auto">
        <h1 class="text-2xl font-semibold mb-4">Tabela de Vendedores</h1>
        <input type="hidden" value="{{ route('api.sellers.index') }}" id="route">
        <table class="mb-8 w-full border-collapse border bg-white">
            <thead>
                <tr>
                    <th class="border bg-gray-200 px-4 py-2">#</th>
                    <th class="border bg-gray-200 px-4 py-2">Nome</th>
                    <th class="border bg-gray-200 px-4 py-2">Email</th>
                    <th class="border bg-gray-200 px-4 py-2">Ações</th>
                </tr>
            </thead>
            <tbody id="sellers-list">
            </tbody>
        </table>
        <a href="{{ route('home.index') }}" class="bg-gray-500 text-white text-lg px-4 py-2 rounded-lg hover:bg-gray-600">
            Voltar
        </a>
    </div>
@endsection

@push('scripts')
    @vite('resources/ts/sellers/index.ts')
@endpush
