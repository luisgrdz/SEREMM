<!DOCTYPE html>
<html lang="es" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SEREMM Ingeniería Integral | @yield('title', 'Energía Solar')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .text-seremm { color: #ffb633; }
        .bg-seremm { background-color: #ffb633; }
        .border-seremm { border-color: #ffb633; }
    </style>
</head>
<body class="text-slate-900 antialiased bg-[#f8fafc]">

    <nav class="fixed w-full z-50 transition-all duration-300" x-data="{ scrolled: false }" 
         @scroll.window="scrolled = (window.pageYOffset > 20)"
         :class="scrolled ? 'bg-[#0f172a] shadow-xl py-3' : 'bg-transparent py-5'">
        <div class="max-w-7xl mx-auto px-6 flex justify-between items-center">
            <div class="flex items-center gap-2">
                <div class="font-black text-2xl tracking-tight text-white">
                    SEREMM<span class="text-seremm"></span>
                </div>
                <div class="hidden sm:block border-l border-slate-700 ml-2 pl-2 text-[10px] uppercase tracking-widest text-slate-400 leading-none">
                    Ingeniería<br>Integral
                </div>
            </div>
            
            <div class="hidden md:flex items-center space-x-10 font-semibold text-sm uppercase tracking-wider text-slate-200">
                <a href="#calculadora" class="hover:text-seremm transition-colors">Calculadora</a>
                <a href="#paquetes" class="hover:text-seremm transition-colors">Paquetes</a>
                <a href="#contacto" class="hover:text-seremm transition-colors">Contacto</a>
            </div>

            <a href="#calculadora" class="bg-seremm text-slate-900 px-7 py-2.5 rounded-full font-bold hover:brightness-110 transition shadow-lg shadow-orange-500/20 text-sm">
                COTIZAR PROYECTO
            </a>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer class="bg-[#0f172a] text-white py-16 border-t border-slate-800">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-4 gap-12">
            <div class="col-span-1 md:col-span-2">
                <div class="font-black text-2xl mb-6">SEREMM<span class="text-seremm"></span></div>
                <p class="text-slate-400 max-w-sm leading-relaxed">
                    Especialistas en ingeniería fotovoltaica de alta eficiencia. 
                    Diseñamos soluciones energéticas inteligentes para el sector residencial e industrial.
                </p>
            </div>
            <div>
                <h4 class="font-bold mb-6 text-white uppercase text-xs tracking-widest">Legal</h4>
                <ul class="space-y-4 text-slate-400 text-sm">
                    <li><a href="#" class="hover:text-seremm transition">Aviso de Privacidad</a></li>
                    <li><a href="#" class="hover:text-seremm transition">Garantías de Equipo</a></li>
                    <li><a href="#" class="hover:text-seremm transition">Términos de Servicio</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold mb-6 text-white uppercase text-xs tracking-widest">Contacto Directo</h4>
                <p class="text-seremm font-bold text-lg">ventas@seremm.mx</p>
                <p class="text-slate-400 text-sm mt-4">CD. Victoria, Tamaulipas</p>
                <div class="mt-6 flex gap-4">
                    </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto px-6 mt-16 pt-8 border-t border-slate-800/50 text-center text-slate-500 text-xs">
            &copy; {{ date('Y') }} SEREMM Ingeniería Integral. Todos los derechos reservados.
        </div>
    </footer>
</body>
</html>