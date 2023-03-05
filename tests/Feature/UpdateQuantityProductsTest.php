<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Faker\Generator as Faker;

class UpdateQuantityProductsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_updateQuantity()
    {
        $faker = new Faker();
        $product = Product::factory()->create();

        $response = $this->post('/cart/add', [
            'id' => $product->id,
            'quantity' => 1,
        ]);
        $initialQuantity = 1;
        $this->post('/cart/add', ['id' => $product->id, 'quantity' => $initialQuantity]);

        $newQuantity = 2;
        $this->put("/cart/updatequantity/'.{$product->id}", ['quantity' => $newQuantity]);


        $this->assertDatabaseHas('cart_items', [
            'product_id' => $product->id,
            'quantity' => 2,
        ]);
    }
}
