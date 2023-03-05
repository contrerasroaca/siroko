<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use \App\Models\Product;
use Faker\Generator as Faker;

class AddProductsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_add()
    {
        $faker = new Faker();

        $product = Product::factory()->create();


        $response = $this->post('/cart/add', [
            'id' => $product->id,
            'quantity' =>  $faker->numberBetween(1, 10),
        ]);

        $response->assertStatus(200);
        $response = $this->post('/cart/add', [
            'id' => $product->id,
            'quantity' =>  $faker->numberBetween(1, 10),
        ]);

        $response->assertStatus(200);
        $response = $this->post('/cart/add', [
            'id' => $product->id,
            'quantity' =>  $faker->numberBetween(1, 10),
        ]);
    }
}
