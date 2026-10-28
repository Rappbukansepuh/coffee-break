@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 text-white">
    <!-- Notifikasi Sukses -->
    @if(session('success'))
        <div class="mb-6 p-4 bg-emerald-500/20 border border-emerald-500/30 text-emerald-300 rounded-2xl backdrop-blur-md shadow-lg flex items-center space-x-3">
            <svg class="w-5 h-5 shrink-0 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            <span class="font-medium text-sm">{{ session('success') }}</span>
        </div>
    @endif

    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8 gap-4 bg-linear-to-br from-amber-900/40 via-black/20 to-transparent p-6 rounded-3xl border border-white/15 backdrop-blur-xl shadow-2xl">
        <div>
            <div class="inline-flex items-center space-x-2 bg-amber-500/20 text-amber-300 text-xs font-bold px-3 py-1 rounded-full mb-2 border border-amber-500/30">
                <svg class="w-3.5 h-3.5 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 10h-1.26A8 8 0 109 20h9a1 1 0 001-1v-8a1 1 0 00-1-1zM9 4a6 6 0 110 12 6 6 0 010-12z"></path>
                </svg>
                <span>Manajemen Produk</span>
            </div>
            <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight">Kelola Menu Kopi</h1>
            <p class="text-white/70 mt-1 text-sm sm:text-base">Tambah, ubah, atau hapus daftar menu kopi yang tersedia untuk pelanggan.</p>
        </div>
        <div class="flex items-center space-x-3">
            <a href="{{ route('admin.dashboard') }}" class="px-4 py-3 text-sm font-semibold text-white bg-white/10 hover:bg-white/20 border border-white/15 rounded-xl transition backdrop-blur-md">
                Kembali ke Dashboard
            </a>
            <a href="{{ route('admin.products.create') }}" class="group relative inline-flex items-center justify-center px-5 py-3 text-sm font-semibold text-white transition-all bg-linear-to-br from-amber-600 to-amber-700 rounded-xl shadow-lg hover:from-amber-500 hover:to-amber-600 hover:shadow-amber-600/30 hover:-translate-y-0.5">
                <svg class="w-5 h-5 mr-2 -ml-1 text-amber-200 transition-transform group-hover:rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Tambah Menu Baru
            </a>
        </div>
    </div>

    <!-- Tabel Daftar Produk -->
    <div class="bg-white/10 backdrop-blur-xl border border-white/15 rounded-3xl p-6 sm:p-8 shadow-2xl">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-2">
            <div>
                <h2 class="text-xl font-bold tracking-tight">Daftar Menu Kopi</h2>
                <p class="text-sm text-white/60">Semua produk yang tersimpan di dalam database</p>
            </div>
            <span class="text-xs px-3 py-1 bg-white/5 border border-white/15 rounded-full text-white/70">
                Total: {{ count($products) }} Menu
            </span>
        </div>

        <div class="overflow-x-auto rounded-2xl border border-white/15">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-black/30 border-b border-white/15 text-white/70 text-xs uppercase tracking-wider">
                        <th class="p-4 sm:p-5">Menu Kopi</th>
                        <th class="p-4 sm:p-5">Kategori</th>
                        <th class="p-4 sm:p-5">Harga</th>
                        <th class="p-4 sm:p-5 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/15 text-sm">
                    @forelse($products as $product)
                    <tr class="hover:bg-white/5 transition-colors">
                        <td class="p-4 sm:p-5 flex items-center space-x-4">
                            <div class="w-12 h-12 rounded-xl bg-amber-900/30 border border-amber-500/30 overflow-hidden shrink-0 flex items-center justify-center">
                                @if($product->gambar)
                                    <img src="{{ asset($product->gambar) }}" alt="{{ $product->nama }}" class="w-full h-full object-cover">
                                @else
                                    <svg class="w-6 h-6 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 10h-1.26A8 8 0 109 20h9a1 1 0 001-1v-8a1 1 0 00-1-1zM9 4a6 6 0 110 12 6 6 0 010-12z"></path>
                                    </svg>
                                @endif
                            </div>
                            <div>
                                <span class="font-bold text-white block text-base">{{ $product->nama }}</span>
                                <span class="text-xs text-white/50 line-clamp-1">{{ $product->deskripsi ?? 'Tidak ada deskripsi' }}</span>
                            </div>
                        </td>
                        <td class="p-4 sm:p-5">
                            <span class="px-3 py-1 rounded-full text-xs font-semibold bg-amber-500/20 text-amber-300 border border-amber-500/30">
                                {{ $product->category?->name ?? 'Tanpa Kategori' }}
                            </span>
                        </td>
                        <td class="p-4 sm:p-5 font-semibold text-emerald-400">{{ $product->harga }}</td>
                        <td class="p-4 sm:p-5 text-center">
                            <div class="inline-flex items-center space-x-2">
                                <!-- Tombol Edit -->
                                <a href="{{ route('admin.products.edit', $product->id) }}" class="inline-flex items-center px-3 py-1.5 bg-yellow-500/20 hover:bg-yellow-500/30 border border-yellow-500/30 text-yellow-300 rounded-xl text-xs font-semibold transition">
                                    <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                    Edit
                                </a>

                                <!-- Tombol Hapus -->
                                <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-flex items-center px-3 py-1.5 bg-red-500/20 hover:bg-red-500/30 border border-red-500/30 text-red-300 rounded-xl text-xs font-semibold transition" onclick="return confirm('Yakin ingin menghapus menu kopi ini?')">
                                        <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="p-12 text-center text-white/60">
                            <div class="flex flex-col items-center justify-center space-y-3">
                                <svg class="w-12 h-12 text-white/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                </svg>
                                <p class="text-base font-medium">Belum ada menu kopi yang tersedia.</p>
                                <p class="text-xs text-white/40">Silakan klik tombol "Tambah Menu Baru" di atas untuk menambahkan produk.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection