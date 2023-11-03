<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SellerServiceControllerTest extends TestCase
{
    use RefreshDatabase;

    private $token;

    public function setUp(): void
    {
        parent::setUp();

        $this->seed();

        $this->token = User::where('email', config('admin.email'))->first()->createToken(
            'auth',
            ['*'],
            now()->addMinutes(30)
        );
    }

    public function test_must_register_new_seller_success(): void
    {
        // Arrange
        $data = [
            'name' => fake()->name(),
            'email' => fake()->email(),
        ];

        // Act
        $this->postJson(
            route('api.sellers.store'),
            $data,
            [
                'Authorization' => 'Bearer '.$this->token->plainTextToken,
            ]
        );

        // Assert
        $this->assertDatabaseHas('sellers', $data);
    }
}
