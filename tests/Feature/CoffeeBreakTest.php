<?php

namespace Tests\Feature;

use Tests\TestCase;

class CoffeeBreakTest extends TestCase
{
    /**
     * Memastikan halaman utama dapat diakses dengan sukses.
     */
    public function test_home_page_is_accessible(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Coffee Break');
        $response->assertSee('Menu');
    }

    /**
     * Memastikan formulir kontak memvalidasi data dan mengembalikan JSON sukses.
     */
    public function test_contact_form_submission_returns_success_json(): void
    {
        $payload = [
            'nama'  => 'Rafa Ghazali',
            'email' => 'rafa@example.com',
            'pesan' => 'Halo, apakah kafe buka di hari libur nasional?',
        ];

        $response = $this->postJson(route('contact.send'), $payload);

        $response->assertStatus(200);
        $response->assertJson([
            'status' => 'success',
        ]);
    }

    /**
     * Memastikan validasi kontak gagal jika input wajib dikosongkan.
     */
    public function test_contact_form_requires_all_fields(): void
    {
        $response = $this->postJson(route('contact.send'), []);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['nama', 'email', 'pesan']);
    }

    /**
     * Memastikan pencatatan pesanan mengembalikan order code.
     */
    public function test_order_submission_returns_order_code(): void
    {
        $payload = [
            'customer_name'  => 'Budi',
            'customer_notes' => 'Meja 03, Less sugar',
            'total_price'    => 45000,
            'items'          => [
                [
                    'nama'  => 'Caramel Cappuccino',
                    'harga' => 25000,
                    'qty'   => 1,
                ],
                [
                    'nama'  => 'Classic Espresso',
                    'harga' => 20000,
                    'qty'   => 1,
                ],
            ],
        ];

        $response = $this->postJson(route('order.store'), $payload);

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'status',
            'message',
            'order_code',
        ]);
    }
}
