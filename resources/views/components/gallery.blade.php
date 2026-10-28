@props(['galleryItems' => null])

@php
    $defaultGallery = [
        [
            'judul' => 'Caramel Cappuccino',
            'tag' => 'Momen Spesial',
            'deskripsi' => 'Nikmati momen santai dengan secangkir kopi hangat pilihan dan aroma karamel yang menenangkan.',
            'gambar' => 'assets/img-coffe (2).jpg',
            'delay' => '1000',
        ],
        [
            'judul' => 'Latte Macchiato',
            'tag' => 'Signature Blend',
            'deskripsi' => 'Rasakan kelezatan kopi yang lembut dan bertekstur kental pas untuk menemani obrolan hangat.',
            'gambar' => 'assets/img-coffe (3).jpg',
            'delay' => '1200',
        ],
    ];

    $listGallery = $galleryItems ?? $defaultGallery;
@endphp

<!-- resources/views/components/gallery.blade.php -->
<section id="galeri" class="px-8 py-20 bg-[#4D2A00] text-white" data-aos="fade-in" data-aos-duration="1000">
    <div class="max-w-4xl mx-auto text-center">
        <img src="{{ asset('assets/icon-coffe.png') }}" alt="Coffee Icon" class="mx-auto mb-4 w-14 h-14 object-contain filter drop-shadow">
        <h2 class="text-3xl md:text-4xl font-extrabold mb-4">Galeri Coffee</h2>
        <p class="text-white/80 max-w-xl mx-auto mb-8 text-lg">
            Saksikan ragam momen kebersamaan dan sajian hangat terbaik dari Coffee Break kami.
        </p>
        <a href="#menu" class="inline-block bg-[#F2A900] text-[#2A1A0E] px-7 py-2.5 rounded-full font-semibold hover:bg-white transition duration-300 shadow-md">
            Lihat Galeri Menu
        </a>
    </div>

    <!-- Grid Item Gambar Galeri -->
    <div class="grid gap-6 sm:grid-cols-1 lg:grid-cols-2 max-w-6xl mx-auto mt-12 px-4">
        @foreach($listGallery as $item)
            <div class="flex items-center overflow-hidden rounded-3xl border border-white/10 bg-[#2A1A0E] transition duration-300 hover:-translate-y-2 shadow-xl p-5 gap-5" 
                 data-aos="fade-up" 
                 data-aos-duration="{{ $item['delay'] ?? '1000' }}">
                <img src="{{ asset($item['gambar']) }}" alt="{{ $item['judul'] }}" class="w-28 h-28 object-cover rounded-2xl shrink-0 shadow-md">
                <div class="flex flex-col justify-center">
                    <span class="text-xs font-semibold uppercase text-[#F2A900] tracking-wider mb-1">{{ $item['tag'] ?? 'Momen Kopi' }}</span>
                    <h3 class="text-xl font-bold text-white">{{ $item['judul'] }}</h3>
                    <p class="text-sm text-white/70 mt-1 leading-relaxed">{{ $item['deskripsi'] }}</p>
                </div>
            </div>
        @endforeach
    </div>
</section>
