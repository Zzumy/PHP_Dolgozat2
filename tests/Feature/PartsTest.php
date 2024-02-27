<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PartsTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_parts_get(): void
    {
        $response = $this->get('api/parts/');

        $response->assertStatus(200);
    }

    public function test_parts_post(): void
    {
        $response = $this->post('api/parts', ['name' => 'levegő']);
        $response->assertStatus(200);
    }

    public function test_parts_put(): void
    {
        $response = $this->put('api/parts/1', ['name' => 'hűtő']);
        $response->assertStatus(200);
    }

    public function test_parts_delete(): void
    {
        $response = $this->delete('api/parts/3');
        $response->assertStatus(200);
    }
}
