<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba de Inventario SEREMM</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">

    <div class="max-w-7xl mx-auto">
        <h1 class="text-3xl font-bold text-blue-900 mb-8">🛠️ SEREMM: Prueba de Datos</h1>

        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
            <h2 class="text-xl font-bold text-gray-800 mb-4 border-b pb-2">📦 Catálogo de Hardware</h2>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th class="px-6 py-3">Categoría</th>
                            <th class="px-6 py-3">SKU / Modelo</th>
                            <th class="px-6 py-3">Marca</th>
                            <th class="px-6 py-3">Precio Venta</th>
                            <th class="px-6 py-3">Specs (JSON)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <td class="px-6 py-4 font-medium text-blue-600">
                                {{ $product->category->name }}
                            </td>
                            <td class="px-6 py-4 font-bold text-gray-900">
                                {{ $product->sku }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $product->brand }} <br>
                                <span class="text-xs text-gray-400">{{ $product->model }}</span>
                            </td>
                            <td class="px-6 py-4 text-green-600 font-bold">
                                ${{ number_format($product->sale_price, 2) }}
                            </td>
                            <td class="px-6 py-4 text-xs">
                                {{-- Aquí iteramos el JSON de specs --}}
                                @if($product->tech_specs)
                                    <ul class="list-disc pl-4">
                                        @foreach($product->tech_specs as $key => $value)
                                            <li><strong class="capitalize">{{ str_replace('_', ' ', $key) }}:</strong> {{ $value }}</li>
                                        @endforeach
                                    </ul>
                                @else
                                    <span class="text-gray-300">N/A</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-bold text-gray-800 mb-4 border-b pb-2">☀️ Kits Armados (Relaciones)</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach($kits as $kit)
                <div class="border rounded-xl p-5 hover:shadow-lg transition">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-lg font-bold text-blue-800">{{ $kit->name }}</h3>
                            <p class="text-sm text-gray-500 mt-1">{{ $kit->description }}</p>
                        </div>
                        <div class="text-right">
                            <span class="block text-2xl font-bold text-green-600">${{ number_format($kit->base_price, 2) }}</span>
                            <span class="text-xs text-gray-400">Precio Sugerido</span>
                        </div>
                    </div>

                    <div class="mt-4 bg-gray-50 p-3 rounded text-sm">
                        <h4 class="font-bold text-gray-700 mb-2">Incluye:</h4>
                        <ul class="space-y-1">
                            @foreach($kit->products as $component)
                                <li class="flex justify-between border-b border-gray-200 pb-1 last:border-0">
                                    <span>
                                        <span class="font-bold text-blue-600">{{ $component->pivot->quantity }}x</span> 
                                        {{ $component->brand }} {{ $component->model }}
                                    </span>
                                    <span class="text-gray-500">${{ number_format($component->sale_price * $component->pivot->quantity, 2) }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </div>
</body>
</html>