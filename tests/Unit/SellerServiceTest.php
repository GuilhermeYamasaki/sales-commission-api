<?php

namespace Tests\Unit;

use App\Repositories\Interfaces\SellerRepositoryInterface;
use App\Services\Interfaces\SellerServiceInterface;
use RuntimeException;
use Tests\TestCase;

class SellerServiceTest extends TestCase
{
    public function test_must_register_new_seller_success(): void
    {
        // Arrange
        $data = [
            'name' => fake()->name(),
            'email' => fake()->email(),
        ];
        $mock = $this->mockSellerRepository(null, $data);

        // Act
        $sellerServoce = resolve(SellerServiceInterface::class);
        $sellerServoce->register($data);

        // Assert
        $mock->shouldHaveReceived('register')
            ->once();
    }

    public function test_must_throw_error_when_same_email_have_register(): void
    {
        // Assert
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('Email already exists');

        // Arrange
        $email = fake()->email();
        $data = [
            'name' => fake()->name(),
            'email' => $email,
        ];

        $this->mockSellerRepository(
            (object) [
                'id' => rand(1, 100),
                'name' => fake()->name(),
                'email' => $email,
            ],
            $data
        );

        // Act
        $sellerServoce = resolve(SellerServiceInterface::class);
        $sellerServoce->register($data);
    }

    private function mockSellerRepository($findWithEmailReturn, $registerData)
    {
        return $this->mock(
            SellerRepositoryInterface::class,
            function ($mock) use ($findWithEmailReturn, $registerData) {
                $mock->shouldReceive('findWithEmail')
                    ->with($registerData['email'])
                    ->andReturn($findWithEmailReturn);

                $mock->shouldReceive('register')
                    ->with($registerData)
                    ->andReturn((object) []);
            }
        );
    }
}
