<!-- resources/views/components/footer.blade.php -->
<footer class="bg-[#2A1A0E] text-white/70 py-10 px-8 border-t border-white/10">
    <div class="max-w-6xl mx-auto flex flex-col md:flex-row justify-between items-center gap-6">
        <!-- Logo & Nama Brand -->
        <div class="flex items-center gap-2">
            <img src="{{ asset('assets/icon-coffe.png') }}" alt="Coffee Break Icon" class="w-6 h-6 object-contain">
            <h3 class="text-2xl font-bold text-white tracking-tight">
                Coffee <span class="text-[#F2A900]">Break</span>
            </h3>
        </div>

        <!-- Hak Cipta -->
        <p class="text-sm text-zinc-400">&copy; {{ date('Y') }} Coffee Break. All rights reserved.</p>

        <!-- Tautan Sosial Media -->
        <div class="flex items-center gap-6 text-sm font-medium">
            <a href="#" class="transition duration-300 hover:text-[#F2A900]">Facebook</a>
            <a href="#" class="transition duration-300 hover:text-[#F2A900]">Instagram</a>
            <a href="#" class="transition duration-300 hover:text-[#F2A900]">Twitter</a>
            <a href="#" class="transition duration-300 hover:text-[#F2A900]">Tiktok</a>
        </div>
    </div>
</footer>
