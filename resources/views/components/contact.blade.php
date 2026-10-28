<!-- resources/views/components/contact.blade.php -->
<section id="kontak" class="px-8 py-20 bg-[#2A1A0E] text-white overflow-hidden border-t border-white/5">
    <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
        <!-- Informasi & Detail Kontak -->
        <div data-aos="fade-right" data-aos-duration="1000">
            <span class="text-[#F2A900] font-bold tracking-widest text-sm uppercase">Hubungi Kami</span>
            <h2 class="text-4xl font-extrabold mt-2 mb-6 tracking-wide text-[#F2A900]">Yuk, Ngopi Bareng!</h2>
            <p class="text-zinc-300 text-lg mb-8 leading-relaxed">
                Punya pertanyaan, ingin mengadakan acara khusus, atau sekadar ingin memesan meja? Jangan ragu untuk menghubungi kami atau langsung singgah ke kedai kami.
            </p>
            
            <div class="space-y-6">
                <!-- Info Lokasi -->
                <div class="flex items-start gap-4">
                    <div class="p-3 bg-white/5 rounded-xl border border-white/10 text-[#F2A900]">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-lg text-zinc-200">Lokasi Kafe</h4>
                        <p class="text-zinc-400 text-sm mt-1">Jl. Kopi Nikmat No. 123, Jakarta Timur</p>
                    </div>
                </div>

                <!-- Info Jam Operasional -->
                <div class="flex items-start gap-4">
                    <div class="p-3 bg-white/5 rounded-xl border border-white/10 text-[#F2A900]">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-lg text-zinc-200">Jam Operasional</h4>
                        <p class="text-zinc-400 text-sm mt-1">Setiap Hari: 09.00 AM - 11.00 PM</p>
                    </div>
                </div>

                <!-- Info Telepon / WhatsApp -->
                <div class="flex items-start gap-4">
                    <div class="p-3 bg-white/5 rounded-xl border border-white/10 text-[#F2A900]">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-lg text-zinc-200">Telepon & WhatsApp</h4>
                        <p class="text-zinc-400 text-sm mt-1">+62 877 7843 3302</p>
                    </div>
                </div>

                <!-- google maps -->
                <div class="mt-6 rounded-2xl overflow-hidden border border-white/10 shadow-lg">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.1963901968817!2d106.79628287475304!3d-6.242798362399994!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f1a83f74e4cf%3A0xc910b8b125d96c7c!2sBERKALA%20COFFEE%20TAMAN%20LITERASI%20BLOK%20M!5e0!3m2!1sid!2sid!4v1718870000000!5m2!1sid!2sid" 
                        width="100%" 
                        height="300" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade"
                        class="w-full grayscale invert opacity-90 hover:opacity-100 transition duration-300">
                    </iframe>
                </div>
            </div>
        </div>

        <!-- Formulir Kontak (SweetAlert2 Terhubung via layout) -->
        <div class="bg-white/5 border border-white/10 p-8 rounded-3xl shadow-2xl relative" data-aos="fade-left" data-aos-duration="1000">
            <div class="absolute -top-10 -right-10 w-40 h-40 bg-[#F2A900]/10 rounded-full blur-3xl pointer-events-none"></div>
            
            <form id="contactForm" class="space-y-5">
                <div>
                    <label class="block text-sm font-semibold text-zinc-300 mb-2">Nama Lengkap</label>
                    <input type="text" name="nama" required 
                           class="w-full bg-[#1F130A] border border-white/10 text-white rounded-xl px-4 py-3 focus:outline-none focus:border-[#F2A900] focus:ring-1 focus:ring-[#F2A900] transition duration-200 placeholder-zinc-500" 
                           placeholder="Masukkan nama Anda">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-zinc-300 mb-2">Alamat Email</label>
                    <input type="email" name="email" required 
                           class="w-full bg-[#1F130A] border border-white/10 text-white rounded-xl px-4 py-3 focus:outline-none focus:border-[#F2A900] focus:ring-1 focus:ring-[#F2A900] transition duration-200 placeholder-zinc-500" 
                           placeholder="nama@email.com">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-zinc-300 mb-2">Pesan / Masukan</label>
                    <textarea name="pesan" rows="4" required 
                              class="w-full bg-[#1F130A] border border-white/10 text-white rounded-xl px-4 py-3 focus:outline-none focus:border-[#F2A900] focus:ring-1 focus:ring-[#F2A900] transition duration-200 resize-none placeholder-zinc-500" 
                              placeholder="Tulis pesan atau reservasi Anda di sini..."></textarea>
                </div>
                <button type="submit" 
                        class="w-full bg-[#F2A900] text-[#2A1A0E] font-bold py-3.5 rounded-xl shadow-lg hover:bg-white hover:text-[#2A1A0E] transform hover:-translate-y-0.5 transition-all duration-300 tracking-wide cursor-pointer">
                    Kirim Pesan Sekarang
                </button>
            </form>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.getElementById('contactForm')?.addEventListener('submit', function(e) {
    e.preventDefault(); // Mencegah form reload halaman secara default
    
    let form = this;
    let formData = new FormData(form);
    let submitBtn = form.querySelector('button[type="submit"]');
    let originalText = submitBtn.innerText;

    // Ubah tombol jadi loading
    submitBtn.innerText = 'Mengirim...';
    submitBtn.disabled = true;

    fetch("{{ route('contact.store') }}", {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || "{{ csrf_token() }}",
            "Accept": "application/json"
        },
        body: formData
    })
    .then(response => {
        // Jika response bukan JSON (misal error 500 HTML), lempar error
        if (!response.ok) {
            return response.json().then(err => { throw err; });
        }
        return response.json();
    })
    .then(data => {
        if(data.success) {
            Swal.fire({
                icon: 'success',
                title: 'Pesan Terkirim!',
                text: data.message,
                background: '#2A1A0E',
                color: '#fff',
                confirmButtonColor: '#F2A900'
            });
            form.reset(); // Reset form setelah berhasil
        }
    })
    .catch(error => {
        console.error('Error:', error);
        let errorMsg = 'Gagal mengirim pesan. Silakan coba lagi.';
        if (error.errors) {
            // Ambil pesan error validasi pertama jika ada
            let firstKey = Object.keys(error.errors)[0];
            errorMsg = error.errors[firstKey][0];
        }
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: errorMsg,
            background: '#2A1A0E',
            color: '#fff',
            confirmButtonColor: '#F2A900'
        });
    })
    .finally(() => {
        submitBtn.innerText = originalText;
        submitBtn.disabled = false;
    });
});
</script>