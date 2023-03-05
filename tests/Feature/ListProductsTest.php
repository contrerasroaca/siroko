<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use Illuminate\Database\Eloquent\Factories\Factory;

class ListProductsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
 
    public function test_list()
    {

        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
