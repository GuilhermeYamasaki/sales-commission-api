<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SellerServiceControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_must_register_new_seller_success(): void
    {
        // Arrange
        $data = [
            'name' => fake()->name(),
            'email' => fake()->email(),
        ];

        // Act
        $this->postJson(route('api.sellers.store'), $data);

        // Assert
        $this->assertDatabaseHas('sellers', $data);
    }
}
