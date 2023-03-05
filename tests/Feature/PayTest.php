<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PayTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_pay()
    {
        $response = $this->get('/pay');

        $response->assertStatus(200);
    }
}
