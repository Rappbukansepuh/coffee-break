<!-- resources/views/components/menu.blade.php -->
@props(['items' => null])

@php
    $defaultItems = [
        [
            'id' => 1,
            'nama' => 'Caramel Cappuccino',
            'deskripsi' => 'Kopi cappuccino dengan sentuhan karamel yang manis dan lembut.',
            'harga' => 'Rp 25.000',
            'harga_raw' => 25000,
            'gambar' => 'assets/img-coffe (2).jpg',
            'delay' => '1000'
        ],
        [
            'id' => 2,
            'nama' => 'Classic Espresso',
            'deskripsi' => 'Kopi espresso klasik yang kaya cita rasa dan beraroma kuat.',
            'harga' => 'Rp 20.000',
            'harga_raw' => 20000,
            'gambar' => 'assets/img-coffe (3).jpg',
            'delay' => '1200'
        ],
        [
            'id' => 3,
            'nama' => 'Americano Klasik',
            'deskripsi' => 'Kopi americano klasik dengan crema tipis yang menyegarkan hari.',
            'harga' => 'Rp 18.000',
            'harga_raw' => 18000,
            'gambar' => 'assets/img-coffe (4).jpg',
            'delay' => '1400'
        ],
    ];

    $coffeeList = $items ?? $defaultItems;
@endphp

<section id="menu" class="px-8 py-20 bg-[#CC6F00]">
    <div class="max-w-6xl mx-auto">
        <!-- Header Menu -->
        <div class="text-center mb-16" data-aos="fade-down" data-aos-duration="1000">
            <span class="text-[#F2A900] font-bold tracking-widest text-sm uppercase bg-[#2A1A0E] px-4 py-1.5 rounded-full inline-block mb-3">
                Menu Favorit
            </span>
            <h2 class="text-4xl font-extrabold text-white">Pilihan Kopi Terbaik</h2>
            <p class="text-white/80 mt-2 max-w-xl mx-auto">Diramu secara presisi oleh barista berpengalaman untuk menghadirkan rasa otentik di setiap tegukan.</p>
        </div>

        <!-- Grid Card Menu -->
        <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
            @foreach($coffeeList as $coffee)
                <article class="overflow-hidden rounded-2xl border border-white/10 bg-[#2A1A0E] transition duration-300 hover:-translate-y-2 shadow-xl flex flex-col justify-between"
                         data-aos="fade-up" 
                         data-aos-duration="{{ $coffee['delay'] ?? '1000' }}">
                    <div>
                        <img src="{{ asset($coffee['gambar']) }}" 
                             alt="{{ $coffee['nama'] }}" 
                             class="w-full h-52 object-cover transition duration-300 hover:scale-105">
                        <div class="p-6">
                            <h3 class="text-xl font-bold mb-2 text-white">{{ $coffee['nama'] }}</h3>
                            <p class="text-sm text-white/70 leading-relaxed">{{ $coffee['deskripsi'] }}</p>
                        </div>
                    </div>

                    <div class="px-6 pb-6 pt-2 flex items-center justify-between border-t border-white/5">
                        <span class="text-lg font-bold text-[#F2A900]">{{ $coffee['harga'] }}</span>
                        <button class="pesan-btn bg-[#F2A900] text-[#2A1A0E] px-5 py-2 rounded-full font-semibold hover:bg-white transition duration-300 cursor-pointer shadow-md"
                                data-nama="{{ $coffee['nama'] }}"
                                data-harga="{{ $coffee['harga_raw'] ?? 20000 }}"
                                data-gambar="{{ asset($coffee['gambar']) }}">
                            Pesan
                        </button>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
