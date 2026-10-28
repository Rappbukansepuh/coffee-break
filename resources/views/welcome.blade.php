@extends('layouts.app')

@section('content')
    {{-- Hero / Banner Utama --}}
    <x-hero />

    {{-- Section Menu Paling Laris (Best Seller) --}}
    <section class="py-16 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-white">
        <div class="text-center mb-12">
            <span class="bg-amber-500/20 text-amber-300 text-xs font-bold px-3 py-1 rounded-full border border-amber-500/30 uppercase tracking-widest">
                Favorit Pelanggan
            </span>
            <h2 class="text-3xl sm:text-4xl font-extrabold mt-3 tracking-tight">Menu Paling Laris (Best Seller)</h2>
            <p class="text-white/70 mt-2 max-w-xl mx-auto text-sm sm:text-base">
                Pilihan kopi dan minuman racikan spesial yang paling sering dipesan oleh para penikmat Coffee Break.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @forelse($bestSellers ?? [] as $product)
            <div class="group relative bg-white/10 backdrop-blur-xl border border-white/15 rounded-3xl overflow-hidden shadow-xl hover:border-amber-500/50 transition-all duration-300 hover:-translate-y-1.5 flex flex-col">
                
                <!-- Badge Best Seller -->
                <div class="absolute top-4 left-4 z-10 bg-amber-600 text-white text-xs font-bold px-3 py-1 rounded-full shadow-lg flex items-center space-x-1 border border-amber-400/30">
                    <svg class="w-3.5 h-3.5 text-amber-200" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                    <span>Best Seller</span>
                </div>

                <!-- Gambar Produk -->
                <div class="relative h-52 w-full overflow-hidden bg-black/30">
                    @if($product->gambar)
                        <img src="{{ asset($product->gambar) }}" alt="{{ $product->nama }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    @else
                        <div class="w-full h-full flex items-center justify-center text-white/30">
                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M18 10h-1.26A8 8 0 109 20h9a1 1 0 001-1v-8a1 1 0 00-1-1zM9 4a6 6 0 110 12 6 6 0 010-12z"></path>
                            </svg>
                        </div>
                    @endif
                </div>

                <!-- Informasi Produk -->
                <div class="p-6 flex flex-col grow justify-between">
                    <div>
                        <span class="text-xs font-semibold text-amber-300 uppercase tracking-wider">
                            {{ $product->category?->name ?? 'Coffee' }}
                        </span>
                        <h3 class="text-xl font-bold mt-1 text-white group-hover:text-amber-300 transition-colors">
                            {{ $product->nama }}
                        </h3>
                        <p class="text-xs text-white/60 mt-2 line-clamp-2">
                            {{ $product->deskripsi }}
                        </p>
                    </div>

                    <div class="mt-6 pt-4 border-t border-white/10 flex items-center justify-between">
                        <div>
                            <span class="text-xs text-white/50 block">Harga</span>
                            <span class="text-lg font-extrabold text-emerald-400">{{ $product->harga }}</span>
                        </div>
                        <a href="#order" class="px-4 py-2 bg-amber-600 hover:bg-amber-500 text-white text-xs font-bold rounded-xl transition shadow-lg shadow-amber-600/20">
                            Pesan
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-4 text-center py-12 text-white/60">
                <p>Belum ada produk best seller yang ditampilkan.</p>
            </div>
            @endforelse
        </div>
    </section>

    {{-- Komponen lainnya --}}
    <x-menu :items="$products ?? null" />
    
    {{-- Galeri Foto Momen Kafe --}}
    <x-gallery :galleryItems="$gallery ?? null" />

    {{-- Profil & Nilai-Nilai Kafe --}}
    <x-about />

    {{-- Formulir Kontak & Lokasi Kafe --}}
    <x-contact />

    {{-- Floating Cart Drawer & WhatsApp Checkout --}}
    <x-cart-drawer :phone="$cafeInfo['whatsapp'] ?? '6287778433302'" />

    {{-- Riview Ratings / testimoni --}}
    <x-testimonials />
@endsection