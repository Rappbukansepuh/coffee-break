<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Coffee Break - Nikmati Kopi Terbaik' }}</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- SEO Meta Tags -->
    <meta name="description" content="Coffee Break menyajikan kopi artisanal terbaik dari biji kopi pilihan nusantara dengan aroma pekat dan cita rasa autentik.">
    <meta property="og:title" content="{{ $title ?? 'Coffee Break - Nikmati Kopi Terbaik' }}">
    <meta property="og:image" content="{{ asset('assets/img-coffe (2).jpg') }}">

    <!-- Favicon Icon -->
    <link rel="icon" href="{{ asset('assets/icon-coffe.png') }}" type="image/png">

    <!-- Tailwind CSS v4 Browser Compiler (Mendukung semua class kustom tanpa error) -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <!-- AOS Library CSS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('style.css') }}">

    @stack('styles')
</head>
<body class="bg-[#CC6F00] text-white">

    <!-- Navbar Component -->
    <x-navbar />

    <!-- Main Content Container -->
    <main>
        @yield('content')
    </main>

    <!-- Footer Component -->
    <x-footer />

    <!-- AOS Animation Library JS -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>

    <!-- Global Interactivity Script (AOS & Form Handler) -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // 1. Inisialisasi AOS
            if (typeof AOS !== 'undefined') {
                AOS.init({
                    once: true,
                    duration: 800,
                    offset: 100,
                });
            }

            // 2. SweetAlert2 + AJAX untuk Form Kontak (#contactForm)
            const contactForm = document.getElementById('contactForm');
            if (contactForm) {
                contactForm.addEventListener('submit', async (e) => {
                    e.preventDefault();

                    const submitBtn = contactForm.querySelector('button[type="submit"]');
                    const originalText = submitBtn.innerText;
                    submitBtn.disabled = true;
                    submitBtn.innerText = 'Mengirim Pesan...';

                    try {
                        const formData = new FormData(contactForm);
                        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

                        const response = await fetch('{{ route('contact.send') }}', {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': csrfToken,
                                'Accept': 'application/json'
                            },
                            body: formData
                        });

                        const result = await response.json();

                        if (response.ok) {
                            Swal.fire({
                                title: 'Pesan Terkirim!',
                                text: result.message || 'Terima kasih telah menghubungi Coffee Break.',
                                icon: 'success',
                                confirmButtonColor: '#4D2A00',
                                confirmButtonText: 'OK'
                            });
                            contactForm.reset();
                        } else {
                            const errorMsg = result.message || Object.values(result.errors || {})[0]?.[0] || 'Gagal mengirim pesan.';
                            Swal.fire({
                                title: 'Gagal Mengirim',
                                text: errorMsg,
                                icon: 'error',
                                confirmButtonColor: '#4D2A00'
                            });
                        }
                    } catch (err) {
                        Swal.fire({
                            title: 'Error',
                            text: 'Terjadi gangguan jaringan, coba beberapa saat lagi.',
                            icon: 'error',
                            confirmButtonColor: '#4D2A00'
                        });
                    } finally {
                        submitBtn.disabled = false;
                        submitBtn.innerText = originalText;
                    }
                });
            }
        });
    </script>

    @stack('scripts')
</body>
</html>