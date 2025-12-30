@extends('layouts.app')

@section('title', 'Líderes en Energía Solar')

@section('content')

<div class="relative bg-slate-900 h-[90vh] flex items-center overflow-hidden">
    <div class="absolute inset-0">
        <img src="https://images.unsplash.com/photo-1508514177221-188b1cf16e9d?q=80&w=2072&auto=format&fit=crop" class="w-full h-full object-cover opacity-40">
        <div class="absolute inset-0 bg-gradient-to-r from-slate-900 via-slate-900/80 to-transparent"></div>
    </div>
    
    <div class="relative max-w-7xl mx-auto px-6 w-full grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
        <div>
            <div class="md:hidden mb-8">
                <img src="{{ asset('logo.png') }}" alt="SEREMM Logo" class="h-12 w-auto" onerror="this.style.display='none'; this.nextElementSibling.style.display='block'">
                <span class="text-3xl font-black text-white hidden">SEREMM</span>
            </div>

            <div class="inline-flex items-center space-x-2 bg-blue-900/50 backdrop-blur-md border border-blue-500/30 rounded-full px-4 py-2 text-blue-300 font-bold text-xs tracking-widest uppercase mb-8">
                <span class="w-2 h-2 rounded-full bg-green-400 animate-pulse"></span>
                <span>Ingeniería Certificada en Tamaulipas</span>
            </div>
            
            <h1 class="text-5xl md:text-7xl font-black text-white leading-tight mb-6">
                Energía que <br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-400 to-yellow-300">genera riqueza.</span>
            </h1>
            
            <p class="text-xl text-gray-300 mb-10 leading-relaxed max-w-lg font-light">
                En <strong>SEREMM</strong> transformamos tu techo en un activo financiero. Reduce tus gastos operativos y congela el costo de la luz por 25 años.
            </p>
            
            <div class="flex flex-col sm:flex-row gap-4">
                <a href="#calculadora" class="flex items-center justify-center bg-orange-500 text-white px-8 py-4 rounded-lg font-bold hover:bg-orange-600 transition shadow-lg shadow-orange-500/20 transform hover:-translate-y-1">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    Calcular Ahorro
                </a>
                <a href="#contacto" class="flex items-center justify-center px-8 py-4 rounded-lg font-bold text-white border border-gray-600 hover:bg-white hover:text-slate-900 transition">
                    Contactar Asesor
                </a>
            </div>
        </div>
        
        <div class="hidden md:block relative translate-x-10">
             <div class="bg-white/5 backdrop-blur-xl border border-white/10 p-8 rounded-2xl shadow-2xl text-white max-w-sm ml-auto">
                 <div class="flex justify-between items-start mb-6">
                     <div>
                         <p class="text-gray-400 text-sm uppercase tracking-wider">Ahorro Mensual</p>
                         <p class="text-4xl font-bold text-green-400">$3,450<span class="text-base text-white">.00</span></p>
                     </div>
                     <div class="bg-green-500/20 p-2 rounded-lg text-green-400">
                         <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                     </div>
                 </div>
                 <div class="space-y-4">
                     <div class="flex items-center text-sm text-gray-300">
                         <svg class="w-5 h-5 mr-3 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                         Producción Solar
                     </div>
                     <div class="h-2 w-full bg-gray-700 rounded-full overflow-hidden">
                         <div class="h-full bg-orange-500 w-3/4"></div>
                     </div>
                     <p class="text-xs text-gray-500 mt-2">Sistema funcionando al 98% de eficiencia</p>
                 </div>
             </div>
        </div>
    </div>
</div>

<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <h2 class="text-base text-orange-500 font-bold tracking-wide uppercase">Beneficios SEREMM</h2>
            <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                ¿Por qué invertir en Energía Solar?
            </p>
            <p class="mt-4 max-w-2xl text-xl text-gray-500 mx-auto">
                No es un gasto, es la decisión financiera más inteligente para tu patrimonio.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10">
            <div class="flex flex-col items-center text-center">
                <div class="flex items-center justify-center h-16 w-16 rounded-full bg-blue-100 text-blue-900 mb-6">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900">Ahorro Garantizado</h3>
                <p class="mt-2 text-base text-gray-500">Reduce hasta el 99% de tu factura de CFE desde el primer bimestre post-instalación.</p>
            </div>

            <div class="flex flex-col items-center text-center">
                <div class="flex items-center justify-center h-16 w-16 rounded-full bg-green-100 text-green-600 mb-6">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900">Deducible de Impuestos</h3>
                <p class="mt-2 text-base text-gray-500">Aprovecha los beneficios fiscales del ISR en México para maquinaria de energía renovable.</p>
            </div>

            <div class="flex flex-col items-center text-center">
                <div class="flex items-center justify-center h-16 w-16 rounded-full bg-orange-100 text-orange-600 mb-6">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900">Plusvalía Inmobiliaria</h3>
                <p class="mt-2 text-base text-gray-500">Tu propiedad aumenta su valor de reventa inmediatamente al contar con autonomía energética.</p>
            </div>

            <div class="flex flex-col items-center text-center">
                <div class="flex items-center justify-center h-16 w-16 rounded-full bg-slate-100 text-slate-700 mb-6">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900">Garantía Total</h3>
                <p class="mt-2 text-base text-gray-500">25 años de garantía en rendimiento de paneles y monitoreo 24/7 incluido.</p>
            </div>
        </div>
    </div>
</section>

<section id="calculadora" class="py-24 bg-slate-50 border-y border-gray-200" 
         x-data="{ 
            payment: 2500, 
            loading: false, 
            result: null,
            calculate() {
                this.loading = true;
                this.result = null;
                console.log('Enviando petición con pago:', this.payment);
                
                fetch('{{ route('api.calculate') }}', {
                    method: 'POST',
                    headers: { 
                        'Content-Type': 'application/json', 
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}' 
                    },
                    body: JSON.stringify({ payment: this.payment })
                })
                .then(async res => {
                    if (!res.ok) {
                        const text = await res.text();
                        console.error('Error Servidor:', text);
                        alert('Ocurrió un error en el servidor (Código ' + res.status + '). Verifica la configuración de rutas.');
                        throw new Error(text);
                    }
                    return res.json();
                })
                .then(data => {
                    if(data === null) {
                        alert('No se encontraron paneles en el inventario para calcular.');
                    } else {
                        this.result = data;
                    }
                    this.loading = false;
                })
                .catch(err => {
                    console.error('Error JS:', err);
                    this.loading = false;
                });
            }
         }">
    
    <div class="max-w-4xl mx-auto px-6">
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden flex flex-col md:flex-row">
            
            <div class="md:w-1/2 p-10 flex flex-col justify-center bg-white">
                <h3 class="text-2xl font-bold text-slate-800 mb-6">Cotizador Rápido</h3>
                
                <label class="block text-slate-600 font-medium mb-2 text-sm uppercase tracking-wide">Pago bimestral a CFE</label>
                <div class="relative mb-4">
                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 font-bold text-xl">$</span>
                    <input type="number" x-model="payment" class="w-full pl-10 pr-4 py-3 text-2xl font-bold text-slate-900 border border-slate-300 rounded-lg focus:border-orange-500 focus:ring-2 focus:ring-orange-200 outline-none transition" placeholder="2500">
                </div>
                
                <button @click="calculate()" class="w-full bg-slate-900 text-white font-bold py-4 rounded-lg hover:bg-slate-800 transition flex items-center justify-center shadow-lg">
                    <span x-show="!loading">Ver mi propuesta</span>
                    <span x-show="loading" class="flex items-center">
                        <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                        Calculando...
                    </span>
                </button>
            </div>

            <div class="md:w-1/2 p-10 bg-slate-100 border-l border-slate-200 flex flex-col justify-center">
                
                <div x-show="!result && !loading" class="text-center">
                    <p class="text-slate-400 text-sm">Ingresa tu consumo para generar una ingeniería preliminar.</p>
                </div>

                <div x-show="result" x-transition class="space-y-6">
                    <div class="border-b border-slate-200 pb-4">
                        <p class="text-xs text-slate-500 font-bold uppercase">Tu sistema requiere</p>
                        <div class="flex items-baseline space-x-2 mt-1">
                            <span class="text-5xl font-black text-slate-900" x-text="result?.panels_count"></span>
                            <span class="text-lg text-slate-600 font-medium">Paneles Solares</span>
                        </div>
                        <p class="text-sm text-orange-600 font-medium mt-1 truncate" x-text="result?.panel_model"></p>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <p class="text-xs text-slate-500 uppercase">Potencia</p>
                            <p class="font-bold text-slate-800 text-xl"><span x-text="result?.system_size_kw"></span> kWp</p>
                        </div>
                        <div>
                            <p class="text-xs text-slate-500 uppercase">Retorno Inv.</p>
                            <p class="font-bold text-green-600 text-xl"><span x-text="result?.roi_years"></span> Años</p>
                        </div>
                    </div>

                    <a href="#contacto" class="block w-full text-center bg-green-500 text-white py-3 rounded-lg font-bold hover:bg-green-600 transition shadow-md shadow-green-500/20">
                        Agendar Visita Técnica
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

<section id="paquetes" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex justify-between items-end mb-12 border-b border-gray-100 pb-4">
            <div>
                <h2 class="text-3xl font-bold text-gray-900">Nuestros Paquetes</h2>
                <p class="text-gray-500 mt-2">Soluciones llave en mano listas para instalar.</p>
            </div>
            <a href="#" class="text-orange-500 font-bold hover:text-orange-600 text-sm hidden md:block">Ver catálogo completo &rarr;</a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($kits as $kit)
            <div class="group bg-white rounded-xl border border-gray-200 hover:border-orange-500 hover:shadow-2xl transition-all duration-300 flex flex-col h-full overflow-hidden relative">
                <div class="h-2 w-full bg-slate-900 group-hover:bg-orange-500 transition-colors"></div>
                
                <div class="p-8 flex flex-col h-full">
                    <h3 class="text-xl font-bold text-slate-900 mb-2">{{ $kit->name }}</h3>
                    <p class="text-gray-500 text-sm mb-6 flex-grow">{{ $kit->description }}</p>
                    
                    <ul class="space-y-3 mb-8">
                        @foreach($kit->products as $product)
                            <li class="flex items-start text-sm text-gray-600">
                                <svg class="w-5 h-5 text-green-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                <span><strong>{{ $product->pivot->quantity }}x</strong> {{ $product->brand }} {{ $product->model }}</span>
                            </li>
                        @endforeach
                    </ul>

                    <div class="mt-auto pt-6 border-t border-gray-100">
                        <div class="flex justify-between items-end mb-4">
                            <div>
                                <span class="text-xs text-gray-400 block">Inversión desde</span>
                                <span class="text-2xl font-bold text-slate-900">${{ number_format($kit->base_price, 0) }}</span>
                            </div>
                        </div>
                        <button class="w-full border-2 border-slate-900 text-slate-900 font-bold py-2 rounded-lg group-hover:bg-slate-900 group-hover:text-white transition">
                            Me interesa
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection