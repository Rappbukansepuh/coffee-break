<!-- resources/views/components/navbar.blade.php -->
<nav class="sticky top-0 left-0 right-0 z-50 border-b border-[#4D2A00] bg-[#F2A900]/95 backdrop-blur-md transition-all duration-300">
    <div class="flex justify-between items-center px-8 py-4">
        <!-- Logo -->
        <a href="#home" class="flex items-center gap-2 text-2xl font-bold text-[#4D2A00] tracking-tight">
            <img src="{{ asset('assets/icon-coffe.png') }}" alt="Coffee Break Icon" class="w-8 h-8 object-contain">
            <span>Coffee <span class="text-white">Break</span></span>
        </a>

        <!-- Nav Links (Desktop) -->
        <div class="hidden md:flex items-center gap-8 font-medium text-[#4D2A00]">
            <a href="#home" class="transition duration-300 hover:text-white">Home</a>
            <a href="#menu" class="transition duration-300 hover:text-white">Menu</a>
            <a href="#tentang" class="transition duration-300 hover:text-white">Tentang</a>
            <a href="#galeri" class="transition duration-300 hover:text-white">Galeri</a>
            <a href="#kontak" class="transition duration-300 hover:text-white">Kontak</a>
        </div>

        <!-- Tombol CTA Pesan & Hamburger Button Mobile -->
        <div class="flex items-center gap-3">
            <a href="#menu" class="flex items-center gap-2 bg-white text-[#4D2A00] border border-[#4D2A00]/20 font-semibold px-5 py-2 rounded-full shadow-md tracking-wide transform hover:-translate-y-0.5 hover:bg-[#4D2A00] hover:text-white hover:shadow-lg transition-all duration-300 ease-out">
                <span>Pesan Now</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
            </a>

            <!-- Mobile Hamburger Toggle -->
            <button id="mobileNavBtn" type="button" class="md:hidden p-2 text-[#4D2A00] hover:text-white rounded-lg focus:outline-none cursor-pointer" aria-label="Toggle navigation">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile Dropdown Menu -->
    <div id="mobileNavMenu" class="hidden md:hidden px-8 pb-5 pt-2 space-y-3 bg-[#F2A900] border-t border-[#4D2A00]/30 font-medium text-[#4D2A00]">
        <a href="#home" class="mobile-nav-link block transition hover:text-white py-1">Home</a>
        <a href="#menu" class="mobile-nav-link block transition hover:text-white py-1">Menu</a>
        <a href="#tentang" class="mobile-nav-link block transition hover:text-white py-1">Tentang</a>
        <a href="#galeri" class="mobile-nav-link block transition hover:text-white py-1">Galeri</a>
        <a href="#kontak" class="mobile-nav-link block transition hover:text-white py-1">Kontak</a>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const btn = document.getElementById('mobileNavBtn');
        const menu = document.getElementById('mobileNavMenu');
        if (btn && menu) {
            btn.addEventListener('click', () => {
                menu.classList.toggle('hidden');
            });
            document.querySelectorAll('.mobile-nav-link').forEach(link => {
                link.addEventListener('click', () => {
                    menu.classList.add('hidden');
                });
            });
        }
    });
</script>
