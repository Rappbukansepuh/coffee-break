<!-- resources/views/components/cart-drawer.blade.php -->
@props([
    'phone' => '6287778433302', // Nomor WhatsApp Kedai Kopi
])

<!-- 1. Floating Action Button (FAB) Keranjang -->
<div id="cartFabContainer" class="fixed bottom-6 right-6 z-40">
    <button id="openCartBtn" 
            type="button"
            class="relative flex items-center gap-3 bg-[#F2A900] text-[#2A1A0E] font-extrabold px-5 py-3.5 rounded-full shadow-2xl hover:bg-white hover:scale-105 active:scale-95 transition-all duration-300 cursor-pointer border-2 border-[#4D2A00]/20"
            title="Buka Keranjang Pesanan"
            aria-label="Keranjang Belanja">
        <!-- Icon Kopi / Keranjang -->
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
        </svg>
        <span class="hidden sm:inline font-bold">Keranjang</span>
        
        <!-- Badge Counter Item -->
        <span id="cartBadge" 
              class="absolute -top-2 -right-2 bg-[#4D2A00] text-white text-xs font-black w-6 h-6 rounded-full flex items-center justify-center border-2 border-white shadow-md transform scale-0 transition-transform duration-300">
            0
        </span>
    </button>
</div>

<!-- 2. Backdrop Overlay -->
<div id="cartBackdrop" 
     class="fixed inset-0 bg-black/60 backdrop-blur-xs z-50 hidden opacity-0 transition-opacity duration-300">
</div>

<!-- 3. Drawer Panel Samping (Slide-Over) -->
<aside id="cartDrawer" 
       class="fixed top-0 right-0 h-full w-full max-w-md bg-[#2A1A0E] text-white z-50 shadow-2xl transform translate-x-full transition-transform duration-300 ease-in-out flex flex-col border-l border-white/10"
       aria-label="Panel Keranjang Pesanan">
    
    <!-- Drawer Header -->
    <div class="p-6 border-b border-white/10 flex items-center justify-between bg-[#1F130A]">
        <div class="flex items-center gap-3">
            <div class="p-2.5 bg-[#F2A900]/15 rounded-xl text-[#F2A900]">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                </svg>
            </div>
            <div>
                <h3 class="text-xl font-extrabold text-white">Keranjang Pesanan</h3>
                <p class="text-xs text-zinc-400">Coffee Break Ordering System</p>
            </div>
        </div>

        <button id="closeCartBtn" 
                type="button"
                class="p-2 text-zinc-400 hover:text-white hover:bg-white/10 rounded-xl transition cursor-pointer"
                title="Tutup Keranjang"
                aria-label="Tutup Keranjang">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    <!-- Drawer Body: Daftar Item -->
    <div id="cartItemsContainer" class="flex-1 overflow-y-auto p-6 space-y-4">
        <!-- Diisi secara dinamis oleh JavaScript -->
    </div>

    <!-- Drawer Footer: Subtotal & Form Pemesan -->
    <div class="p-6 border-t border-white/10 bg-[#1F130A] space-y-4">
        <!-- Subtotal Ringkasan -->
        <div class="flex items-center justify-between text-base">
            <span class="text-zinc-400">Total Pembayaran:</span>
            <span id="cartTotalPrice" class="text-2xl font-black text-[#F2A900]">Rp 0</span>
        </div>

        <!-- Form Tambahan: Nama & Meja / Catatan -->
        <div class="space-y-3 pt-2">
            <div>
                <label for="custName" class="block text-xs font-semibold text-zinc-400 mb-1">Nama Pemesan <span class="text-red-400">*</span></label>
                <input type="text" id="custName" 
                       placeholder="Contoh: Budi Santoso" 
                       class="w-full bg-[#2A1A0E] border border-white/15 text-white rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-[#F2A900] focus:ring-1 focus:ring-[#F2A900] placeholder-zinc-500">
            </div>
            <div>
                <label for="custNotes" class="block text-xs font-semibold text-zinc-400 mb-1">Catatan Tambahan / Nomor Meja</label>
                <input type="text" id="custNotes" 
                       placeholder="Contoh: Meja 05, Less Ice / Normal Sugar" 
                       class="w-full bg-[#2A1A0E] border border-white/15 text-white rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-[#F2A900] focus:ring-1 focus:ring-[#F2A900] placeholder-zinc-500">
            </div>
        </div>

        <!-- Tombol Checkout WhatsApp -->
        <button id="checkoutWaBtn" 
                type="button"
                class="w-full flex items-center justify-center gap-2 bg-[#25D366] hover:bg-[#20ba59] active:scale-98 text-white font-bold py-3.5 rounded-xl shadow-lg transition duration-200 cursor-pointer text-base tracking-wide">
            <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                <path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.298.144.347.491 1.2.534 1.287.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.354.101.174.449.741.964 1.201.662.591 1.221.774 1.394.86s.275.072.376-.044c.101-.116.433-.506.549-.68.116-.173.231-.145.39-.087s1.011.477 1.184.564.289.13.332.202c.043.072.043.419-.101.824z"/>
            </svg>
            <span>Kirim Pesanan ke WhatsApp</span>
        </button>

        <button id="clearCartBtn" 
                type="button"
                class="w-full text-xs text-zinc-400 hover:text-red-400 text-center block pt-1 transition cursor-pointer">
            Kosongkan Keranjang
        </button>
    </div>
</aside>

<!-- 4. Script Interaktif Keranjang Pesanan -->
@push('scripts')
<script>
    (function () {
        'use strict';

        const WA_PHONE = '{{ $phone }}';
        const STORAGE_KEY = 'coffeebreak_cart';

        // State Keranjang dari LocalStorage
        let cart = [];
        try {
            cart = JSON.parse(localStorage.getItem(STORAGE_KEY)) || [];
        } catch (e) {
            cart = [];
        }

        // Elemen DOM
        const openCartBtn = document.getElementById('openCartBtn');
        const closeCartBtn = document.getElementById('closeCartBtn');
        const cartDrawer = document.getElementById('cartDrawer');
        const cartBackdrop = document.getElementById('cartBackdrop');
        const cartBadge = document.getElementById('cartBadge');
        const cartItemsContainer = document.getElementById('cartItemsContainer');
        const cartTotalPrice = document.getElementById('cartTotalPrice');
        const checkoutWaBtn = document.getElementById('checkoutWaBtn');
        const clearCartBtn = document.getElementById('clearCartBtn');
        const custNameInput = document.getElementById('custName');
        const custNotesInput = document.getElementById('custNotes');

        // Helper Format Mata Uang Rupiah
        const formatRupiah = (number) => {
            return new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                maximumFractionDigits: 0
            }).format(number);
        };

        // Simpan ke LocalStorage & Re-render
        function saveCart() {
            try {
                localStorage.setItem(STORAGE_KEY, JSON.stringify(cart));
            } catch (e) {
                console.warn('Gagal menyimpan keranjang ke LocalStorage');
            }
            renderCart();
        }

        // Buka Drawer Panel
        function openDrawer() {
            if (!cartDrawer || !cartBackdrop) return;
            cartBackdrop.classList.remove('hidden');
            setTimeout(() => {
                cartBackdrop.classList.remove('opacity-0');
                cartDrawer.classList.remove('translate-x-full');
            }, 10);
        }

        // Tutup Drawer Panel
        function closeDrawer() {
            if (!cartDrawer || !cartBackdrop) return;
            cartDrawer.classList.add('translate-x-full');
            cartBackdrop.classList.add('opacity-0');
            setTimeout(() => {
                cartBackdrop.classList.add('hidden');
            }, 300);
        }

        // Render Isi Keranjang
        function renderCart() {
            if (!cartItemsContainer || !cartBadge || !cartTotalPrice) return;

            const totalItems = cart.reduce((sum, item) => sum + item.qty, 0);
            const totalCost = cart.reduce((sum, item) => sum + (item.harga * item.qty), 0);

            // Update Badge Counter
            if (totalItems > 0) {
                cartBadge.innerText = totalItems;
                cartBadge.classList.remove('scale-0');
                cartBadge.classList.add('scale-100');
            } else {
                cartBadge.classList.remove('scale-100');
                cartBadge.classList.add('scale-0');
            }

            // Update Total Harga
            cartTotalPrice.innerText = formatRupiah(totalCost);

            // Jika Keranjang Kosong
            if (cart.length === 0) {
                cartItemsContainer.innerHTML = `
                    <div class="h-full flex flex-col items-center justify-center text-center p-8 text-zinc-400 space-y-4">
                        <div class="w-20 h-20 bg-white/5 rounded-full flex items-center justify-center text-[#F2A900]">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                            </svg>
                        </div>
                        <h4 class="text-lg font-bold text-white">Keranjang Masih Kosong</h4>
                        <p class="text-sm">Yuk pilih seduhan kopi favorit Anda dari daftar menu!</p>
                        <a href="#menu" id="drawerToMenuBtn" class="inline-block bg-[#F2A900] text-[#2A1A0E] text-xs font-bold px-5 py-2.5 rounded-full hover:bg-white transition">
                            Lihat Menu Kopi
                        </a>
                    </div>
                `;
                const drawerToMenuBtn = document.getElementById('drawerToMenuBtn');
                if (drawerToMenuBtn) {
                    drawerToMenuBtn.addEventListener('click', closeDrawer);
                }
                checkoutWaBtn.disabled = true;
                checkoutWaBtn.classList.add('opacity-50', 'cursor-not-allowed');
                return;
            }

            // Keranjang Berisi Item
            checkoutWaBtn.disabled = false;
            checkoutWaBtn.classList.remove('opacity-50', 'cursor-not-allowed');

            cartItemsContainer.innerHTML = cart.map((item, index) => `
                <div class="flex items-center justify-between gap-4 p-4 rounded-2xl bg-white/5 border border-white/5 hover:border-white/10 transition">
                    <img src="${item.gambar}" alt="${item.nama}" class="w-14 h-14 object-cover rounded-xl shrink-0">
                    <div class="flex-1 min-w-0">
                        <h4 class="text-sm font-bold text-white truncate">${item.nama}</h4>
                        <p class="text-xs text-[#F2A900] font-semibold mt-0.5">${formatRupiah(item.harga)}</p>
                        
                        <!-- Kontrol Kuantitas -->
                        <div class="flex items-center gap-2 mt-2">
                            <button type="button" onclick="window.changeCartQty(${index}, -1)" class="w-6 h-6 rounded-md bg-white/10 hover:bg-white/20 flex items-center justify-center text-xs font-bold transition cursor-pointer" aria-label="Kurangi kuantitas">-</button>
                            <span class="text-xs font-bold px-1">${item.qty}</span>
                            <button type="button" onclick="window.changeCartQty(${index}, 1)" class="w-6 h-6 rounded-md bg-white/10 hover:bg-white/20 flex items-center justify-center text-xs font-bold transition cursor-pointer" aria-label="Tambah kuantitas">+</button>
                        </div>
                    </div>
                    <div class="text-right">
                        <div class="text-sm font-bold text-white">${formatRupiah(item.harga * item.qty)}</div>
                        <button type="button" onclick="window.removeCartItem(${index})" class="text-xs text-red-400 hover:text-red-300 mt-2 block transition cursor-pointer">
                            Hapus
                        </button>
                    </div>
                </div>
            `).join('');
        }

        // Global Method: Tambah Item
        window.addToCart = function (product) {
            const existingIndex = cart.findIndex(item => item.nama === product.nama);
            if (existingIndex > -1) {
                cart[existingIndex].qty += 1;
            } else {
                cart.push({
                    nama: product.nama,
                    harga: Number(product.harga),
                    gambar: product.gambar,
                    qty: 1
                });
            }
            saveCart();

            // Animasi Pulsing Tombol FAB
            if (openCartBtn) {
                openCartBtn.classList.add('scale-110');
                setTimeout(() => openCartBtn.classList.remove('scale-110'), 250);
            }

            // Notifikasi Toast
            if (typeof Swal !== 'undefined') {
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    title: `${product.nama} masuk keranjang`,
                    showConfirmButton: false,
                    timer: 2000,
                    timerProgressBar: true,
                    background: '#2A1A0E',
                    color: '#fff'
                });
            }
        };

        // Global Method: Ubah Kuantitas
        window.changeCartQty = function (index, delta) {
            if (cart[index]) {
                cart[index].qty += delta;
                if (cart[index].qty <= 0) {
                    cart.splice(index, 1);
                }
                saveCart();
            }
        };

        // Global Method: Hapus Item
        window.removeCartItem = function (index) {
            cart.splice(index, 1);
            saveCart();
        };

        // Event Delegation Tombol Menu (.pesan-btn)
        document.addEventListener('click', function (e) {
            const btn = e.target.closest('.pesan-btn');
            if (btn) {
                e.preventDefault();
                const nama = btn.getAttribute('data-nama');
                const harga = btn.getAttribute('data-harga') || 20000;
                const gambar = btn.getAttribute('data-gambar') || 'assets/img-coffe (2).jpg';

                window.addToCart({ nama, harga, gambar });
            }
        });

        // Event Listener Drawer Toggle
        if (openCartBtn) openCartBtn.addEventListener('click', openDrawer);
        if (closeCartBtn) closeCartBtn.addEventListener('click', closeDrawer);
        if (cartBackdrop) cartBackdrop.addEventListener('click', closeDrawer);

        // Kosongkan Keranjang
        if (clearCartBtn) {
            clearCartBtn.addEventListener('click', () => {
                if (cart.length === 0) return;
                Swal.fire({
                    title: 'Kosongkan keranjang?',
                    text: 'Semua pesanan yang dipilih akan dihapus.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#F2A900',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Kosongkan',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        cart = [];
                        saveCart();
                    }
                });
            });
        }

        // Checkout via WhatsApp & Backend Logging
        if (checkoutWaBtn) {
            checkoutWaBtn.addEventListener('click', async () => {
                if (cart.length === 0) return;

                const custName = custNameInput.value.trim();
                const custNotes = custNotesInput.value.trim();

                if (!custName) {
                    Swal.fire({
                        title: 'Nama Pemesan Wajib Diisi',
                        text: 'Mohon masukkan nama Anda sebelum checkout.',
                        icon: 'warning',
                        confirmButtonColor: '#F2A900'
                    });
                    custNameInput.focus();
                    return;
                }

                let total = 0;
                cart.forEach(item => {
                    total += (item.harga * item.qty);
                });

                // Catat pesanan ke database secara asynchronous via endpoint /order
                try {
                    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
                    fetch('{{ route('order.store') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken,
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({
                            customer_name: custName,
                            customer_notes: custNotes,
                            items: cart,
                            total_price: total
                        })
                    }).catch(err => console.warn('Order sync notice:', err));
                } catch (e) {
                    // Ignore background sync errors
                }

                // Format Pesan WhatsApp
                let message = `*☕ PESANAN BARU - COFFEE BREAK*\n`;
                message += `-----------------------------------------\n`;
                message += `👤 *Nama:* ${custName}\n`;
                if (custNotes) {
                    message += `📝 *Catatan / Meja:* ${custNotes}\n`;
                }
                message += `-----------------------------------------\n`;
                message += `*DAFTAR PESANAN:*\n`;

                cart.forEach((item, i) => {
                    const subtotal = item.harga * item.qty;
                    message += `${i + 1}. ${item.nama} x${item.qty} = ${formatRupiah(subtotal)}\n`;
                });

                message += `-----------------------------------------\n`;
                message += `💰 *TOTAL BAYAR: ${formatRupiah(total)}*\n`;
                message += `-----------------------------------------\n`;
                message += `Mohon segera diproses ya barista. Terima kasih! 🙏`;

                const waUrl = `https://wa.me/${WA_PHONE}?text=${encodeURIComponent(message)}`;
                window.open(waUrl, '_blank');
            });
        }

        // Render Pertama Kali
        renderCart();
    })();
</script>
@endpush
