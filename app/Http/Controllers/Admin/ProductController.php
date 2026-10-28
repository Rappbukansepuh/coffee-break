<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Order;
use App\Models\ContactMessage;

class ProductController extends Controller
{
    // Read: Menampilkan daftar produk
    public function index()
    {
        $products = Product::with('category')->latest()->get();
        return view('admin.products.index', compact('products'));
    }

    // Create: Form tambah produk
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    // Store: Menyimpan produk baru ke database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'category_id' => 'required|exists:categories,id',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|string',
            'harga_raw' => 'required|numeric',
            'gambar' => 'nullable|string',
        ]);

        $validated['slug'] = Str::slug($validated['nama']);
        $validated['is_active'] = true;

        Product::create($validated);

        return redirect()->route('admin.products.index')->with('success', 'Menu kopi berhasil ditambahkan!');
    }

    // Edit: Form edit produk
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    // Update: Memperbarui data produk
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'category_id' => 'required|exists:categories,id',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|string',
            'harga_raw' => 'required|numeric',
            'gambar' => 'nullable|string',
        ]);

        $validated['slug'] = Str::slug($validated['nama']);

        $product->update($validated);

        return redirect()->route('admin.products.index')->with('success', 'Menu kopi berhasil diperbarui!');
    }

    // Delete: Menghapus produk
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Menu kopi berhasil dihapus!');
    }

    public function dashboard() {
        $totalProducts = Product::count();
        $totalOrders = Order::count();
        $totalMessages = ContactMessage::count();
        $recentOrders = Order::latest()->take(5)->get();

        return view('admin.products.dashboard', compact('totalProducts', 'totalOrders', 'totalMessages', 'recentOrders'));
    }

    // Method untuk mengubah status pesanan dari dashboard
    public function updateOrderStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string|in:pending,proses,completed,cancelled,selesai',
        ]);

        $order = Order::findOrFail($id);
        $order->status = $request->status;
        $order->save();

        return redirect()->back()->with('success', 'Status pesanan ' . $order->order_code . ' berhasil diperbarui!');
    }
}