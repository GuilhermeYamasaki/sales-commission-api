@extends('layouts.admin')

@section('content')
    <div class="flex justify-center mt-14">
        <div class="max-w-md w-full p-6 bg-white rounded-lg shadow-lg">
            <h1 class="text-2xl font-semibold mb-4">Entrar</h1>
            <form action="{{ route('api.auth.store') }}">
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                    <input type="email" id="email" class="w-full px-3 py-2 border rounded-lg"
                        placeholder="Seu endereço de email" required>
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Senha:</label>
                    <input type="password" id="password" class="w-full px-3 py-2 border rounded-lg" placeholder="Sua senha"
                        required>
                </div>

                <button type="submit"
                    class="bg-blue-500 text-white px-4 py-2 rounded-full hover:bg-blue-600">Entrar</button>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    @vite('resources/ts/login.ts')
@endpush
