@extends('layouts.app')

@section('title', 'SEREMM | Ingeniería Solar en Tamaulipas')

@section('content')

{{-- Inicializamos Alpine.js en un contenedor de alto nivel para que el Modal cubra todo --}}
<div x-data="{ 
    selectedProduct: null, 
    openModal(product) {
        this.selectedProduct = product;
        document.body.style.overflow = 'hidden';
    },
    closeModal() {
        this.selectedProduct = null;
        document.body.style.overflow = 'auto';
    }
}">

    {{-- 1. HERO SECTION --}}
    <div class="relative bg-slate-900 h-[90vh] flex items-center overflow-hidden">
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1508514177221-188b1cf16e9d?q=80&w=2072&auto=format&fit=crop" class="w-full h-full object-cover opacity-40">
            <div class="absolute inset-0 bg-gradient-to-r from-slate-900 via-slate-900/80 to-transparent"></div>
        </div>
        
        <div class="relative max-w-7xl mx-auto px-6 w-full grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <div>
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
                        Calcular Ahorro
                    </a>
                    <a href="#catalogo" class="flex items-center justify-center px-8 py-4 rounded-lg font-bold text-white border border-gray-600 hover:bg-white hover:text-slate-900 transition">
                        Ver Catálogo
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
                             Producción Solar Optimizada
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

    {{-- 2. STICKY CATEGORY NAV --}}
    <div class="bg-slate-100 border-b border-gray-200 sticky top-0 z-40 overflow-x-auto">
        <div class="max-w-7xl mx-auto px-6 py-4 flex space-x-8 whitespace-nowrap">
            @foreach($categories as $category)
                <a href="#cat-{{ $category->slug }}" class="text-xs font-black uppercase tracking-widest text-slate-500 hover:text-orange-500 transition">
                    {{ $category->name }}
                </a>
            @endforeach
        </div>
    </div>

    {{-- 3. CATALOG SECTION --}}
    <section id="catalogo" class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            @foreach($categories as $category)
                <div id="cat-{{ $category->slug }}" class="mb-24 last:mb-0 scroll-mt-24">
                    <div class="flex items-center mb-12">
                        <h2 class="text-3xl font-black text-slate-900 mr-6">{{ $category->name }}</h2>
                        <div class="h-px bg-slate-200 flex-grow"></div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                        @foreach($category->products as $product)
                        <div class="group bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-2xl transition-all duration-500 flex flex-col overflow-hidden">
                            <div class="p-6 flex-grow">
                                <div class="flex justify-between items-start mb-4">
                                    <span class="text-[10px] font-black uppercase tracking-widest text-orange-600 bg-orange-100 px-2 py-1 rounded">
                                        {{ $product->brand ?? 'SEREMM' }}
                                    </span>
                                    @if($product->stock < 5)
                                        <span class="text-[10px] font-bold text-red-600 animate-pulse">Stock Crítico</span>
                                    @endif
                                </div>
                                <h3 class="text-lg font-bold text-slate-900 leading-tight mb-2 group-hover:text-orange-500 transition">
                                    {{ $product->model }}
                                </h3>
                                <div class="space-y-2 my-6">
                                    @if($product->wattage)
                                        <div class="flex justify-between text-[11px] border-b border-slate-50 pb-1">
                                            <span class="text-gray-400 uppercase font-bold">Potencia</span>
                                            <span class="text-slate-800 font-black">{{ $product->wattage }}W</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="p-5 bg-slate-50 border-t border-gray-100">
                                <button @click="openModal({{ $product }})" class="w-full bg-slate-900 text-white py-3 rounded-xl font-bold hover:bg-orange-500 transition-all">
                                    Ver Detalles
                                </button>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    {{-- 4. SECCIÓN DE PAQUETES --}}
    @if(isset($kits) && $kits->count() > 0)
    <section id="paquetes" class="py-24 bg-slate-900 text-white">
        <div class="max-w-7xl mx-auto px-6">
            <h2 class="text-4xl font-black mb-16 text-center">Sistemas Completos <span class="text-orange-500">SEREMM</span></h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                @foreach($kits as $kit)
                <div class="bg-white/5 border border-white/10 p-8 rounded-3xl hover:bg-white/10 transition">
                    <h3 class="text-2xl font-bold mb-4">{{ $kit->name }}</h3>
                    <p class="text-gray-400 text-sm mb-8 leading-relaxed">{{ $kit->description }}</p>
                    <div class="text-3xl font-black text-orange-500 mb-8">${{ number_format($kit->total_price, 0) }}</div>
                    <button @click="openModal({{ $kit }})" class="w-full border-2 border-orange-500 text-orange-500 py-3 rounded-xl font-bold hover:bg-orange-500 hover:text-white transition">
                        Ver Detalles del Kit
                    </button>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- 5. EL MODAL (Fuera de los loops para que sea accesible siempre) --}}
    <div x-show="selectedProduct" 
         class="fixed inset-0 z-[100] flex items-center justify-center p-4 sm:p-6"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-cloak>
        
        <div class="absolute inset-0 bg-slate-900/80 backdrop-blur-sm" @click="closeModal()"></div>

        <div class="relative bg-white w-full max-w-4xl max-h-[90vh] overflow-y-auto rounded-3xl shadow-2xl flex flex-col md:flex-row"
             @click.away="closeModal()"
             x-transition:enter="transition ease-out duration-300 transform"
             x-transition:enter-start="opacity-0 scale-95 translate-y-4"
             x-transition:enter-end="opacity-100 scale-100 translate-y-0">
            
            <button @click="closeModal()" class="absolute top-4 right-4 text-slate-400 hover:text-slate-900 z-10">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>

            <div class="md:w-1/2 bg-slate-100 flex items-center justify-center p-8">
                <template x-if="selectedProduct?.image_path">
                    <img :src="'/storage/' + selectedProduct.image_path" class="max-w-full h-auto rounded-lg shadow-lg">
                </template>
                <template x-if="!selectedProduct?.image_path">
                    <div class="text-slate-300 text-center">
                        <svg class="w-32 h-32 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        <p class="font-bold">Imagen en proceso</p>
                    </div>
                </template>
            </div>

            <div class="md:w-1/2 p-10">
                <span class="text-orange-500 font-black uppercase tracking-widest text-xs" x-text="selectedProduct?.brand"></span>
                <h2 class="text-3xl font-black text-slate-900 mt-2 mb-4" x-text="selectedProduct?.model || selectedProduct?.name"></h2>
                <p class="text-slate-500 text-sm mb-8 leading-relaxed" x-text="selectedProduct?.description || 'Sin descripción disponible.'"></p>

                <div class="grid grid-cols-2 gap-6 mb-8">
                    <template x-if="selectedProduct?.wattage">
                        <div class="bg-slate-50 p-4 rounded-2xl border border-slate-100">
                            <span class="block text-[10px] text-slate-400 uppercase font-bold">Potencia</span>
                            <span class="text-xl font-black text-slate-900" x-text="selectedProduct.wattage + ' Watts'"></span>
                        </div>
                    </template>
                    <template x-if="selectedProduct?.phases">
                        <div class="bg-slate-50 p-4 rounded-2xl border border-slate-100">
                            <span class="block text-[10px] text-slate-400 uppercase font-bold">Fases AC</span>
                            <span class="text-xl font-black text-slate-900" x-text="selectedProduct.phases + ' Fases'"></span>
                        </div>
                    </template>
                </div>

                <div class="flex items-center justify-between mb-8">
                    <div>
                        <span class="text-xs text-slate-400 font-bold uppercase block">Inversión Final</span>
                        <span class="text-3xl font-black text-slate-900" x-text="'$' + new Intl.NumberFormat().format(selectedProduct?.sale_price || selectedProduct?.total_price)"></span>
                    </div>
                </div>

                {{-- BOTÓN DE WHATSAPP DINÁMICO --}}
<a :href="'https://wa.me/{{ $whatsapp }}?text=Hola SEREMM, me interesa cotizar el equipo: ' + (selectedProduct?.model || selectedProduct?.name) + ' (SKU: ' + (selectedProduct?.sku || 'N/A') + ')'" 
   target="_blank"
   class="flex items-center justify-center w-full bg-orange-500 text-white py-4 rounded-2xl font-black text-lg hover:bg-orange-600 transition shadow-xl shadow-orange-500/20">
    Cotizar por WhatsApp
</a>
            </div>
        </div>
    </div>

</div> {{-- Fin del x-data --}}

@endsection