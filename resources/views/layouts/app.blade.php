<!DOCTYPE html>
<html lang="es" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SEREMM | @yield('title', 'Energía Solar')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="text-gray-800 antialiased bg-white">

    <nav class="fixed w-full z-50 transition-all duration-300" x-data="{ scrolled: false }" 
         @scroll.window="scrolled = (window.pageYOffset > 20)"
         :class="scrolled ? 'bg-white shadow-lg py-2' : 'bg-transparent py-4'">
        <div class="max-w-7xl mx-auto px-6 flex justify-between items-center">
            <div class="font-black text-2xl tracking-tighter" :class="scrolled ? 'text-blue-900' : 'text-white'">
                SEREMM<span class="text-orange-500">.</span>
            </div>
            <div class="hidden md:flex space-x-8 font-medium" :class="scrolled ? 'text-gray-600' : 'text-gray-200'">
                <a href="#calculadora" class="hover:text-orange-500 transition">Calculadora</a>
                <a href="#paquetes" class="hover:text-orange-500 transition">Paquetes</a>
                <a href="#contacto" class="hover:text-orange-500 transition">Contacto</a>
            </div>
            <a href="#calculadora" class="bg-orange-500 text-white px-6 py-2 rounded-full font-bold hover:bg-orange-600 transition shadow-lg hover:shadow-orange-500/30">
                Cotizar
            </a>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer class="bg-gray-900 text-white py-12 border-t border-gray-800">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="col-span-1 md:col-span-2">
                <h3 class="text-2xl font-bold mb-4">SEREMM</h3>
                <p class="text-gray-400 max-w-sm">Ingeniería especializada en sistemas fotovoltaicos interconectados a la red. Tu energía, bajo tu control.</p>
            </div>
            <div>
                <h4 class="font-bold mb-4 text-gray-200">Legal</h4>
                <ul class="space-y-2 text-gray-500 text-sm">
                    <li><a href="#" class="hover:text-white">Aviso de Privacidad</a></li>
                    <li><a href="#" class="hover:text-white">Garantías</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold mb-4 text-gray-200">Contacto</h4>
                <p class="text-gray-500 text-sm">ventas@seremm.mx</p>
                <p class="text-gray-500 text-sm mt-2">CD. Victoria, Tamaulipas</p>
            </div>
        </div>
    </footer>
</body>
</html>