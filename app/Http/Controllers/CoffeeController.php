<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use App\Models\Category;

class CoffeeController extends Controller
{
    /**
     * Menampilkan halaman beranda Coffee Break dengan data dinamis.
     */
    public function index(): View
    {
        // 1. Ambil data produk kopi dari Database (dengan fallback data statis yang rapi)
        $products = [];
        try {
            $dbProducts = Product::with('category')->active()->get();
            if ($dbProducts->isNotEmpty()) {
                $products = $dbProducts->map(function ($p) {
                    return [
                        'id' => $p->id,
                        'nama' => $p->nama,
                        'kategori' => $p->category?->name ?? 'Coffee',
                        'deskripsi' => $p->deskripsi,
                        'harga' => $p->harga,
                        'harga_raw' => $p->harga_raw,
                        'gambar' => $p->gambar,
                        'delay' => $p->delay,
                        'is_featured' => $p->is_featured,
                    ];
                })->toArray();
            }
        } catch (\Throwable $e) {
            Log::info('Product DB query fallback: ' . $e->getMessage());
        }

        // Fallback jika belum dimigrasi / belum di-seed
        if (empty($products)) {
            $products = [
                [
                    'id' => 1,
                    'nama' => 'Caramel Cappuccino',
                    'kategori' => 'Espresso Based',
                    'deskripsi' => 'Kopi cappuccino dengan sentuhan karamel manis gurih dan buih susu lembut.',
                    'harga' => 'Rp 25.000',
                    'harga_raw' => 25000,
                    'gambar' => 'assets/img-coffe (2).jpg',
                    'delay' => '1000',
                    'is_featured' => true,
                ],
                [
                    'id' => 2,
                    'nama' => 'Classic Espresso',
                    'kategori' => 'Espresso Based',
                    'deskripsi' => 'Ekstraksi kopi murni dengan aroma pekat, crema keemasan tebal, dan cita rasa autentik.',
                    'harga' => 'Rp 20.000',
                    'harga_raw' => 20000,
                    'gambar' => 'assets/img-coffe (3).jpg',
                    'delay' => '1200',
                    'is_featured' => true,
                ],
                [
                    'id' => 3,
                    'nama' => 'Americano Klasik',
                    'kategori' => 'Black Coffee',
                    'deskripsi' => 'Paduan espresso ganda dan air mineral panas dengan body ringan yang menyegarkan.',
                    'harga' => 'Rp 18.000',
                    'harga_raw' => 18000,
                    'gambar' => 'assets/img-coffe (4).jpg',
                    'delay' => '1400',
                    'is_featured' => true,
                ],
            ];
        }

        // 2. Data Galeri Momen Kafe
        $gallery = [
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

        // 3. Informasi Kafe & Kontak
        $cafeInfo = [
            'nama' => 'Coffee Break',
            'tagline' => 'Authentic Coffee Experience',
            'lokasi' => 'Jl. Kopi Nikmat No. 123, Jakarta Timur',
            'jam_buka' => 'Setiap Hari: 09.00 AM - 11.00 PM',
            'whatsapp' => '6287778433302',
            'email' => 'info@coffeebreak.id',
            'telepon' => '+62 877 7843 3302',
        ];

        return view('welcome', compact('products', 'gallery', 'cafeInfo'));
    }

    /**
     * Menangani pengiriman formulir kontak dengan validasi Laravel & penyimpanan database.
     */
    public function contact(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'nama'  => 'required|string|max:100',
            'email' => 'required|email|max:150',
            'pesan' => 'required|string|max:1000',
        ]);

        try {
            ContactMessage::create([
                'nama'  => $validated['nama'],
                'email' => $validated['email'],
                'pesan' => $validated['pesan'],
            ]);
        } catch (\Throwable $e) {
            Log::warning('Gagal menyimpan pesan kontak ke database: ' . $e->getMessage());
        }

        return response()->json([
            'status'  => 'success',
            'message' => 'Terima kasih ' . e($validated['nama']) . ', pesan Anda berhasil kami terima!',
        ]);
    }

    /**
     * Endpoint API pencatatan pesanan ke database sebelum/saat checkout.
     */
    public function order(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'customer_name'  => 'required|string|max:100',
            'customer_notes' => 'nullable|string|max:255',
            'items'          => 'required|array|min:1',
            'items.*.nama'   => 'required|string',
            'items.*.harga'  => 'required|numeric',
            'items.*.qty'    => 'required|integer|min:1',
            'total_price'    => 'required|numeric',
        ]);

        $orderCode = 'CB-' . date('Ymd') . '-' . strtoupper(substr(uniqid(), -4));

        try {
            DB::transaction(function () use ($validated, $orderCode) {
                $order = Order::create([
                    'order_code'     => $orderCode,
                    'customer_name'  => $validated['customer_name'],
                    'customer_notes' => $validated['customer_notes'] ?? null,
                    'total_price'    => $validated['total_price'],
                    'status'         => 'pending',
                ]);

                foreach ($validated['items'] as $item) {
                    OrderItem::create([
                        'order_id'     => $order->id,
                        'product_name' => $item['nama'],
                        'price'        => $item['harga'],
                        'qty'          => $item['qty'],
                        'subtotal'     => $item['harga'] * $item['qty'],
                    ]);
                }
            });
        } catch (\Throwable $e) {
            Log::warning('Gagal menyimpan pesanan ke database: ' . $e->getMessage());
        }

        return response()->json([
            'status'     => 'success',
            'message'    => 'Pesanan berhasil dicatat di sistem.',
            'order_code' => $orderCode,
        ]);
    }

        public function welcome()
        {
            // Ambil produk yang berstatus is_featured (atau best seller)
            $bestSellers = Product::where('is_featured', true)->take(4)->get();

            // 2. Ambil semua produk untuk menu utama
            $products = Product::all();
            
            // Ambil semua kategori untuk filter menu jika diperlukan
            $categories = Category::all();

            return view('welcome', compact('bestSellers', 'products', 'categories'));
        }
}
