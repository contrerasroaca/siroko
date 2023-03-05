<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ViewCartTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_view()
    {

        $response = $this->get('/checkout');

        $response->assertStatus(200);
    }
}
