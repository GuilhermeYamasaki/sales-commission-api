<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório de Vendas</title>
    <style>
    </style>
</head>

<body class="bg-gray-100 p-4">
    <div class="max-w-md mx-auto bg-white rounded-md p-6 shadow-md">
        <h1 class="text-2xl font-bold mb-4">Relatório de Vendas</h1>

        <div class="mb-4">
            <p class="text-lg">Nome do Vendedor: {{ $seller->name }}</p>
        </div>

        <div class="mb-4">
            <p class="text-lg">Total de Vendas do Dia: R$ {{ $total }} </p>
        </div>

        <div class="mb-4">
            <p class="text-lg">Dia da Venda: {{ $day }}</p>
        </div>
    </div>
</body>

</html>