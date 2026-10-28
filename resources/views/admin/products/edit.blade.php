@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto px-4 py-12">
    <div class="bg-white/10 backdrop-blur-md rounded-xl p-8 shadow-lg border border-white/10 text-white">
        <h1 class="text-2xl font-bold mb-6">Edit Menu Kopi: {{ $product->nama }}</h1>

        @if ($errors->any())
            <div class="bg-red-500/20 border border-red-500 text-red-200 p-4 rounded-lg mb-6">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.products.update', $product->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label class="block font-semibold mb-2">Nama Produk</label>
                <input type="text" name="nama" value="{{ old('nama', $product->nama) }}" required class="w-full bg-white/5 border border-white/20 rounded-lg px-4 py-2 focus:outline-none focus:border-amber-400">
            </div>

            <div>
                <label class="block font-semibold mb-2">Kategori</label>
                <select name="category_id" required class="w-full bg-[#3a2010] border border-white/20 rounded-lg px-4 py-2 focus:outline-none focus:border-amber-400 text-white">
                    <option value="">-- Pilih Kategori --</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block font-semibold mb-2">Harga Format Teks</label>
                    <input type="text" name="harga" value="{{ old('harga', $product->harga) }}" required class="w-full bg-white/5 border border-white/20 rounded-lg px-4 py-2 focus:outline-none focus:border-amber-400">
                </div>
                <div>
                    <label class="block font-semibold mb-2">Harga Angka</label>
                    <input type="number" name="harga_raw" value="{{ old('harga_raw', $product->harga_raw) }}" required class="w-full bg-white/5 border border-white/20 rounded-lg px-4 py-2 focus:outline-none focus:border-amber-400">
                </div>
            </div>

            <div>
                <label class="block font-semibold mb-2">Path Gambar</label>
                <input type="text" name="gambar" value="{{ old('gambar', $product->gambar) }}" class="w-full bg-white/5 border border-white/20 rounded-lg px-4 py-2 focus:outline-none focus:border-amber-400">
            </div>

            <div>
                <label class="block font-semibold mb-2">Deskripsi</label>
                <textarea name="deskripsi" rows="4" class="w-full bg-white/5 border border-white/20 rounded-lg px-4 py-2 focus:outline-none focus:border-amber-400">{{ old('deskripsi', $product->deskripsi) }}</textarea>
            </div>

            <div class="flex justify-end space-x-4">
                <a href="{{ route('admin.products.index') }}" class="px-6 py-2 rounded-lg bg-gray-600 hover:bg-gray-700 transition">Batal</a>
                <button type="submit" class="px-6 py-2 rounded-lg bg-amber-600 hover:bg-amber-700 font-semibold transition">Perbarui Menu</button>
            </div>
        </form>
    </div>
</div>
@endsection