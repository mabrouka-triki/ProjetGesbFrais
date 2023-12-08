<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_title_contains_hello_world(): void
    {

        $response = $this->get('/list/frais/1');
        $response->assertStatus(200);
        $response->assertSee('Hello World!');

    }
}
