<?php

namespace Tests\Feature;


use Tests\TestCase;
use \App\Models\Product;
use Faker\Generator as Faker;

class AddCantidadNegativaProductsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_Negative()
    {
        $faker = new Faker();

        $product = Product::factory()->create();


        $response = $this->post('/cart/add', [
            'id' => $product->id,
            'quantity' =>  $faker->numberBetween(-10, -1),
        ]);

        $response->assertStatus(200);
        $response = $this->post('/cart/add', [
            'id' => $product->id,
            'quantity' =>  $faker->numberBetween(-10, -1),
        ]);

        $response->assertStatus(200);
        $response = $this->post('/cart/add', [
            'id' => $product->id,
            'quantity' =>  $faker->numberBetween(1, 10),
        ]);
    }
    
}
