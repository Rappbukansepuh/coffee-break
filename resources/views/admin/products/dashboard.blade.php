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
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4 bg-linear-to-br from-amber-900/40 via-black/20 to-transparent p-6 rounded-3xl border border-white/15 backdrop-blur-xl shadow-2xl">
        <div>
            <div class="inline-flex items-center space-x-2 bg-amber-500/20 text-amber-300 text-xs font-bold px-3 py-1 rounded-full mb-2 border border-amber-500/30">
                <svg class="w-3.5 h-3.5 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                </svg>
                <span>Admin Panel Coffee Break</span>
            </div>
            <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight">Dashboard Overview</h1>
            <p class="text-white/70 mt-1 text-sm sm:text-base">Halo, <span class="text-amber-400 font-semibold">Barista Admin</span>! Pantau performa kafe dan pesanan terbaru hari ini.</p>
        </div>
        <div class="flex items-center space-x-3">
            <a href="{{ route('admin.products.index') }}" class="group relative inline-flex items-center justify-center px-5 py-3 text-sm font-semibold text-white transition-all bg-linear-to-br from-amber-600 to-amber-700 rounded-xl shadow-lg hover:from-amber-500 hover:to-amber-600 hover:shadow-amber-600/30 hover:-translate-y-0.5">
                <svg class="w-5 h-5 mr-2 -ml-1 text-amber-200 transition-transform group-hover:rotate-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                </svg>
                Kelola Menu Kopi
            </a>
        </div>
    </div>

    <!-- Statistik Cards Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
        <!-- Total Produk -->
        <div class="relative group bg-white/10 backdrop-blur-xl border border-white/15 rounded-2xl p-6 shadow-xl hover:border-amber-500/50 transition-all duration-300 hover:-translate-y-1 overflow-hidden">
            <div class="absolute -right-6 -bottom-6 w-28 h-28 bg-amber-500/10 rounded-full blur-2xl group-hover:bg-amber-500/20 transition-all"></div>
            <div class="flex items-center justify-between relative z-10">
                <div>
                    <p class="text-xs uppercase tracking-widest text-white/60 font-bold">Total Menu Kopi</p>
                    <h3 class="text-4xl font-extrabold mt-2 text-amber-300">{{ $totalProducts ?? 0 }}</h3>
                    <p class="text-xs text-white/50 mt-1">Menu aktif siap disajikan</p>
                </div>
                <div class="p-4 bg-linear-to-br from-amber-500/20 to-amber-600/30 rounded-2xl border border-amber-500/30 text-amber-300 shadow-inner flex items-center justify-center">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 10h-1.26A8 8 0 109 20h9a1 1 0 001-1v-8a1 1 0 00-1-1zM9 4a6 6 0 110 12 6 6 0 010-12z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Total Pesanan -->
        <div class="relative group bg-white/10 backdrop-blur-xl border border-white/15 rounded-2xl p-6 shadow-xl hover:border-emerald-500/50 transition-all duration-300 hover:-translate-y-1 overflow-hidden">
            <div class="absolute -right-6 -bottom-6 w-28 h-28 bg-emerald-500/10 rounded-full blur-2xl group-hover:bg-emerald-500/20 transition-all"></div>
            <div class="flex items-center justify-between relative z-10">
                <div>
                    <p class="text-xs uppercase tracking-widest text-white/60 font-bold">Total Pesanan</p>
                    <h3 class="text-4xl font-extrabold mt-2 text-emerald-300">{{ $totalOrders ?? 0 }}</h3>
                    <p class="text-xs text-white/50 mt-1">Pesanan masuk tercatat</p>
                </div>
                <div class="p-4 bg-linear-to-br from-emerald-500/20 to-emerald-600/30 rounded-2xl border border-emerald-500/30 text-emerald-300 shadow-inner flex items-center justify-center">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Total Pesan Masuk -->
        <div class="relative group bg-white/10 backdrop-blur-xl border border-white/15 rounded-2xl p-6 shadow-xl hover:border-blue-500/50 transition-all duration-300 hover:-translate-y-1 overflow-hidden">
            <div class="absolute -right-6 -bottom-6 w-28 h-28 bg-blue-500/10 rounded-full blur-2xl group-hover:bg-blue-500/20 transition-all"></div>
            <div class="flex items-center justify-between relative z-10">
                <div>
                    <p class="text-xs uppercase tracking-widest text-white/60 font-bold">Pesan Kontak</p>
                    <h3 class="text-4xl font-extrabold mt-2 text-blue-300">{{ $totalMessages ?? 0 }}</h3>
                    <p class="text-xs text-white/50 mt-1">Ulasan & pesan pelanggan</p>
                </div>
                <div class="p-4 bg-linear-to-br from-blue-500/20 to-blue-600/30 rounded-2xl border border-blue-500/30 text-blue-300 shadow-inner flex items-center justify-center">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabel Pesanan Terbaru -->
    <div class="bg-white/10 backdrop-blur-xl border border-white/15 rounded-3xl p-6 sm:p-8 shadow-2xl">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-2">
            <div>
                <h2 class="text-xl font-bold tracking-tight">Pesanan Terbaru</h2>
                <p class="text-sm text-white/60">Daftar transaksi pesanan kopi yang baru saja masuk</p>
            </div>
            <span class="text-xs px-3 py-1 bg-white/5 border border-white/15 rounded-full text-white/70">
                Menampilkan 5 transaksi terakhir
            </span>
        </div>
        
        <div class="overflow-x-auto rounded-2xl border border-white/15">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-black/30 border-b border-white/15 text-white/70 text-xs uppercase tracking-wider">
                        <th class="p-4 sm:p-5">Kode Pesanan</th>
                        <th class="p-4 sm:p-5">Nama Pelanggan</th>
                        <th class="p-4 sm:p-5">Total Harga</th>
                        <th class="p-4 sm:p-5">Status (Ubah Langsung)</th>
                        <th class="p-4 sm:p-5">Waktu</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/15 text-sm">
                    @forelse($recentOrders ?? [] as $order)
                    <tr class="hover:bg-white/5 transition-colors">
                        <td class="p-4 sm:p-5 font-bold text-amber-300 flex items-center space-x-2">
                            <span class="w-2 h-2 rounded-full bg-amber-400"></span>
                            <span>{{ $order->order_code }}</span>
                        </td>
                        <td class="p-4 sm:p-5 font-medium text-white">{{ $order->customer_name }}</td>
                        <td class="p-4 sm:p-5 font-semibold text-emerald-400">Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                        
                        <!-- Kolom Dropdown Ubah Status -->
                        <td class="p-4 sm:p-5">
                            <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST">
                                @csrf
                                <select name="status" onchange="this.form.submit()" class="text-xs font-bold px-3 py-2 rounded-xl bg-black/50 border border-white/20 text-white focus:outline-none focus:border-amber-400 cursor-pointer transition shadow-inner">
                                    <option value="pending" {{ strtolower($order->status) == 'pending' ? 'selected' : '' }} class="bg-zinc-900 text-yellow-300">PENDING</option>
                                    <option value="proses" {{ strtolower($order->status) == 'proses' ? 'selected' : '' }} class="bg-zinc-900 text-blue-300">PROSES</option>
                                    <option value="completed" {{ strtolower($order->status) == 'completed' || strtolower($order->status) == 'selesai' ? 'selected' : '' }} class="bg-zinc-900 text-emerald-300">COMPLETED / SELESAI</option>
                                    <option value="cancelled" {{ strtolower($order->status) == 'cancelled' ? 'selected' : '' }} class="bg-zinc-900 text-red-300">CANCELLED</option>
                                </select>
                            </form>
                        </td>

                        <td class="p-4 sm:p-5 text-white/60 text-xs sm:text-sm">{{ $order->created_at->diffForHumans() }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="p-12 text-center text-white/60">
                            <div class="flex flex-col items-center justify-center space-y-3">
                                <svg class="w-12 h-12 text-white/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                                </svg>
                                <p class="text-base font-medium">Belum ada pesanan masuk saat ini.</p>
                                <p class="text-xs text-white/40">Pesanan dari pelanggan akan otomatis muncul di tabel ini.</p>
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