<?php

namespace Tests\Unit\Http\Controllers;

use Tests\TestCase;
use App\Services\UserService;
use Mockery;

class UserControllerTest extends TestCase
{
    /**
     * test create user  success.
     *
     */
    public function testShowUserSuccess()
    {
        $this->instance(UserService::class, Mockery::mock(UserService::class, function ($mock) {
            $mock->shouldReceive('findUser')->with('999999')->andReturn('bar');
        }));

        $response = $this->get('/api/user/info/999999');

        $response->assertStatus(200);
    }
}
