<?php

namespace Tests\Feature;


use Tests\TestCase;
use \App\Models\Product;



class DeleteProductsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_remove()
    {

        $product = Product::factory()->create();

        $response = $this->post('/cart/add', [
            'id' => $product->id,
            'quantity' => 1,
        ]);

        $response->assertStatus(200);

        $response = $this->get('/cart/delete/' . $product->id);

        $response->assertStatus(200);
        $this->assertDatabaseMissing('cart_items', [
            'id' => $product->id,
        ]);
    }
}
