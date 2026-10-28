<!-- resources/views/components/hero.blade.php -->
<section id="home" class="bg-[#2A1A0E] text-white px-8 py-24 min-h-screen flex items-center relative overflow-hidden">
    <!-- Efek Cahaya Estetik di Background -->
    <div class="absolute -top-24 -left-24 w-96 h-96 bg-[#F2A900]/10 rounded-full blur-3xl pointer-events-none"></div>
    
    <div class="max-w-6xl mx-auto flex flex-col md:flex-row items-center justify-between gap-12 w-full relative z-10">
        
        <!-- Konten Sambutan & Profil -->
        <div class="md:w-1/2 text-left" data-aos="fade-right" data-aos-duration="1000">
            <span class="inline-block px-4 py-1.5 rounded-full bg-[#F2A900]/10 text-[#F2A900] font-semibold text-xs tracking-wider uppercase mb-5 border border-[#F2A900]/20">
                Authentic Coffee Experience
            </span>
            <h1 class="text-4xl md:text-6xl font-extrabold mb-6 leading-tight text-white tracking-wide">
                Temukan Ketenangan di <span class="text-[#F2A900]">Setiap Tegukan</span>
            </h1>
            <p class="mb-8 text-zinc-300 text-base md:text-lg leading-relaxed max-w-lg">
                Tempat melipir sejenak dari penatnya kota. Nikmati racikan biji kopi lokal pilihan sambil menikmati suasana hangat dan obrolan yang akrab.
            </p>
            
            <div class="flex flex-wrap items-center justify-start gap-4">
                <a href="#menu" class="inline-block bg-[#F2A900] text-[#2A1A0E] font-bold px-7 py-3 rounded-full shadow-lg hover:bg-white transition-all duration-300 transform hover:-translate-y-0.5">
                    Lihat Menu
                </a>
                <a href="#kontak" class="inline-block bg-white/5 text-white border border-white/10 font-semibold px-7 py-3 rounded-full shadow-md hover:bg-white/10 hover:border-[#F2A900]/40 transition-all duration-300">
                    Pesan Sekarang
                </a>
            </div>
        </div>

        <!-- Gambar Kopi Hero -->
        <div class="md:w-1/2 w-full" data-aos="fade-left" data-aos-duration="1000">
            <div class="relative rounded-3xl overflow-hidden border border-white/10 shadow-2xl group">
                <img src="{{ asset('assets/img-coffe (2).jpg') }}" alt="Coffee Cup Break" class="w-full h-100 md:h-112.5 object-cover transition duration-700 group-hover:scale-105">
                <div class="absolute inset-0 bg-linear-to-t from-[#2A1A0E]/60 via-transparent to-transparent pointer-events-none"></div>
            </div>
        </div>

    </div>
</section>