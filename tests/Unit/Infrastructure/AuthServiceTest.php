<?php

namespace Tests\Unit\Infrastructure;

use App\Http\Resources\Auth\UserResource;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Infrastructure\Persistence\Eloquent\Models\User;
use Infrastructure\Services\AuthService;
use Tests\TestCase;
use Illuminate\Support\Facades\Auth;

class AuthServiceTest extends TestCase
{
    use DatabaseTransactions;

    private AuthService $authService;

    /**
     * @throws BindingResolutionException
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->authService = app(AuthService::class);
    }

    public function testGetDataReturnsExpectedData()
    {
        $user = User::factory()->create([
            'role' => User::ADMIN_USER_ROLE,
        ]);

        Auth::shouldReceive('user')
            ->once()
            ->andReturn($user);

        Auth::shouldReceive('check')
            ->once()
            ->andReturn(true);

        $expectedData = array_merge([
            'is_authenticated' => true,
            'is_admin' => true,
        ], [
            'user' => (new UserResource($user))->resolve()
        ]);

        $this->assertEquals($expectedData, $this->authService->getData());
    }

    public function testGetUserDataReturnsExpectedDataWhenUserIsNotNull()
    {
        $user = User::factory()->create();

        $expectedData = ['user' => (new UserResource($user))->resolve()];

        $this->assertEquals($expectedData, $this->authService->getUserData($user));
    }

    public function testGetUserDataReturnsExpectedDataWhenUserIsNull()
    {
        Auth::shouldReceive('user')
            ->once()
            ->andReturn(null);

        $expectedData = ['user' => null];

        $this->assertEquals($expectedData, $this->authService->getUserData());
    }
}
