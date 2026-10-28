@extends('layouts.app')

@section('content')
<div class="min-h-[80vh] flex items-center justify-center px-4 py-12">
    <div class="max-w-md w-full bg-white/10 backdrop-blur-xl border border-white/15 rounded-3xl p-8 shadow-2xl text-white">
        <!-- Header -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-14 h-14 rounded-2xl bg-amber-500/20 border border-amber-500/30 text-amber-300 mb-4 shadow-inner">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                </svg>
            </div>
            <h1 class="text-2xl font-extrabold tracking-tight">Login Barista Admin</h1>
            <p class="text-white/60 text-sm mt-1">Masukkan akun admin Coffee Break Anda</p>
        </div>

        <!-- Notifikasi Error -->
        @if ($errors->any())
            <div class="mb-6 p-4 bg-red-500/20 border border-red-500/30 text-red-200 rounded-2xl text-sm backdrop-blur-md">
                <ul class="list-disc list-inside space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="mb-6 p-4 bg-emerald-500/20 border border-emerald-500/30 text-emerald-300 rounded-2xl text-sm">
                {{ session('success') }}
            </div>
        @endif

        <!-- Form Login -->
        <form action="{{ route('login') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-white/70 mb-2">Email Admin</label>
                <input type="email" name="email" value="{{ old('email') }}" required autofocus placeholder="admin@coffeebreak.id" class="w-full bg-black/40 border border-white/20 rounded-xl px-4 py-3 text-white placeholder-white/30 focus:outline-none focus:border-amber-400 transition shadow-inner">
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-white/70 mb-2">Password</label>
                <input type="password" name="password" required placeholder="••••••••" class="w-full bg-black/40 border border-white/20 rounded-xl px-4 py-3 text-white placeholder-white/30 focus:outline-none focus:border-amber-400 transition shadow-inner">
            </div>

            <div class="flex items-center justify-between text-sm">
                <label class="flex items-center space-x-2 cursor-pointer text-white/70">
                    <input type="checkbox" name="remember" class="rounded bg-black/40 border-white/20 text-amber-600 focus:ring-0">
                    <span>Ingat Saya</span>
                </label>
            </div>

            <button type="submit" class="w-full py-3.5 px-4 bg-linear-to-br from-amber-600 to-amber-700 hover:from-amber-500 hover:to-amber-600 text-white font-bold rounded-xl shadow-lg transition-all duration-300 hover:shadow-amber-600/30">
                Masuk ke Dashboard
            </button>
        </form>

        <div class="mt-8 text-center">
            <a href="{{ url('/') }}" class="text-xs text-white/50 hover:text-white transition">
                &larr; Kembali ke Beranda Website
            </a>
        </div>
    </div>
</div>
@endsection