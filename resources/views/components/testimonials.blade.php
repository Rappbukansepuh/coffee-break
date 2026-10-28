<section id="reviews" class="px-8 py-20 bg-[#1F130A] text-white border-t border-white/5">
    <div class="max-w-6xl mx-auto">
        <div class="text-center max-w-2xl mx-auto mb-16" data-aos="fade-up">
            <span class="text-[#F2A900] font-bold tracking-widest text-sm uppercase">Testimoni Pelanggan</span>
            <h2 class="text-4xl font-extrabold mt-2 mb-4 tracking-wide text-[#F2A900]">Apa Kata Mereka?</h2>
            <p class="text-zinc-300">Bagikan pengalaman ngopi Anda di Coffee Break atau lihat ulasan dari pelanggan setia kami.</p>
        </div>

        <!-- Grid Ulasan yang Sudah Masuk -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
            @php
                $reviews = \App\Models\Review::where('is_approved', true)->latest()->take(3)->get();
            @endphp

            @forelse($reviews as $review)
                <div class="bg-[#2A1A0E] border border-white/10 p-6 rounded-3xl shadow-xl flex flex-col justify-between" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <div>
                        <!-- Bintang Rating -->
                        <div class="flex text-[#F2A900] mb-4">
                            @for($i = 1; $i <= 5; $i++)
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="{{ $i <= $review->rating ? 'currentColor' : 'none' }}" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-182.182 l1.31 5.381c.14.577-.492 1.042-.977.745l-4.706-2.902a.563.563 0 0 0-.588 0L3.4 20.06c-.485.297-1.117-.168-.977-.745l1.31-5.38-4.204-3.603c-.38-.325-.178-.948.321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                </svg>
                            @endfor
                        </div>
                        <p class="text-zinc-300 italic mb-6">"{{ $review->comment }}"</p>
                    </div>
                    <div class="border-t border-white/10 pt-4 flex items-center justify-between">
                        <span class="font-bold text-zinc-200">{{ $review->name }}</span>
                        <span class="text-xs text-zinc-500">{{ $review->created_at->diffForHumans() }}</span>
                    </div>
                </div>
            @empty
                <div class="col-span-3 text-center text-zinc-400 py-8">
                    Belum ada ulasan. Jadilah yang pertama memberikan ulasan!
                </div>
            @endforelse
        </div>

        <!-- Form Tambah Ulasan -->
        <div class="bg-[#2A1A0E] border border-white/10 p-8 rounded-3xl max-w-2xl mx-auto shadow-2xl" data-aos="zoom-in">
            <h3 class="text-2xl font-bold text-[#F2A900] mb-6 text-center">Tulis Ulasan Anda</h3>
            
            <form id="reviewForm" class="space-y-5">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-semibold text-zinc-300 mb-2">Nama Anda</label>
                        <input type="text" name="name" required class="w-full bg-[#1F130A] border border-white/10 text-white rounded-xl px-4 py-3 focus:outline-none focus:border-[#F2A900]" placeholder="Nama lengkap">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-zinc-300 mb-2">Rating (1 - 5 Bintang)</label>
                        <select name="rating" required class="w-full bg-[#1F130A] border border-white/10 text-white rounded-xl px-4 py-3 focus:outline-none focus:border-[#F2A900]">
                            <option value="5">⭐⭐⭐⭐⭐ (5 - Luar Biasa)</option>
                            <option value="4">⭐⭐⭐⭐ (4 - Sangat Bagus)</option>
                            <option value="3">⭐⭐⭐ (3 - Cukup)</option>
                            <option value="2">⭐⭐ (2 - Kurang)</option>
                            <option value="1">⭐ (1 - Buruk)</option>
                        </select>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-zinc-300 mb-2">Komentar / Ulasan</label>
                    <textarea name="comment" rows="3" required class="w-full bg-[#1F130A] border border-white/10 text-white rounded-xl px-4 py-3 focus:outline-none focus:border-[#F2A900] resize-none" placeholder="Ceritakan pengalamanmu..."></textarea>
                </div>
                <button type="submit" class="w-full bg-[#F2A900] text-[#2A1A0E] font-bold py-3.5 rounded-xl hover:bg-white transition duration-300 cursor-pointer">
                    Kirim Ulasan
                </button>
            </form>
        </div>
    </div>
</section>

<!-- Skrip AJAX untuk Form Ulasan -->
<script>
document.getElementById('reviewForm')?.addEventListener('submit', function(e) {
    e.preventDefault();
    let form = this;
    let formData = new FormData(form);
    let submitBtn = form.querySelector('button[type="submit"]');

    submitBtn.innerText = 'Mengirim...';
    submitBtn.disabled = true;

    fetch("{{ route('reviews.store') }}", {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            "Accept": "application/json"
        },
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if(data.success) {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: data.message,
                background: '#2A1A0E',
                color: '#fff',
                confirmButtonColor: '#F2A900'
            });
            form.reset();
            setTimeout(() => location.reload(), 1500); // Reload agar ulasan langsung muncul
        }
    })
    .catch(error => {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Gagal mengirim ulasan. Silakan coba lagi.',
            background: '#2A1A0E',
            color: '#fff',
            confirmButtonColor: '#F2A900'
        });
    })
    .finally(() => {
        submitBtn.innerText = 'Kirim Ulasan';
        submitBtn.disabled = false;
    });
});
</script>