<?php

namespace Tests\Unit\Services;

use Tests\TestCase;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Mockery;
use PDOException;

class UserServiceTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * test create user  success.
     *
     */
    public function testCreateUserSuccess()
    {
        $userService = $this->app['App\Services\UserService'];

        $data = [
            'name' => 'user name test',
            'email' => 'test_1@email.com',
            'password' => '123456',
        ];

        $userService->createUser($data);

        $this->assertDatabaseHas('users', $data);
    }

    public function testGetUserSuccess()
    {
        $userService = $this->app['App\Services\UserService'];
        $userExpected = User::factory()->create();

        $userActual = $userService->findUser($userExpected->id);

        $this->assertEquals($userExpected->toArray(), $userActual->toArray());
    }

    public function testCreateUserFail()
    {
        $this->instance(User::class, Mockery::mock(User::class, function ($mock) {
            $mock->shouldReceive('create')->andThrow(new PDOException());;
        }));

        $this->expectException(PDOException::class);

        $userService = $this->app['App\Services\UserService'];

        $data = [
            'name' => 'user name test fail',
            'email' => 'test@email.com',
            'password' => '123456',
        ];

        $rs = $userService->createUser($data);

        $this->assertDatabaseMissing('users', $data);
    }

    public function testCalcSumIsZero($a, $b)
    {
        $userService = $this->app['App\Services\UserService'];
        $a = 0;
        $b = 0;
        $actual = $userService->calcSum($a, $b);
        //$actual Tổng hai số = 0
        $expected = trans('messages.sumIsZero');

        $this->assertSame($actual, $expected);
    }

    /**
     *
     * @dataProvider calcSumDataProvider
     */
    public function testCalcSum($a, $b)
    {
        $userService = $this->app['App\Services\UserService'];
        $actual = $userService->calcSum($a, $b);
        $expected = $a + $b;

        $this->assertSame($actual, $expected);
    }

    public function calcSumDataProvider()
    {
        return [
            'test a=0 b=2' => [0, 2],
            'test a=5 b=6' => [1, 6],
        ];
    }

    public function testGetDataGuzzleSuccess()
    {
        $userService = $this->app['App\Services\UserService'];

        $rs = $userService->getDataGuzzle();

        $this->assertTrue(true);
    }

    public function testVariableProtected()
    {
        $userService = $this->app['App\Services\UserService'];
        $this->invokeVar($userService, 'varProtected', 25);
        // dd($userService->getVarProtected());
    }


    public function invokeMethod($object, $methodName, array $parameters = array())
    {
        $reflection = new \ReflectionClass(get_class($object));
        $method = $reflection->getMethod($methodName);
        $method->setAccessible(true);

        return $method->invokeArgs($object, $parameters);
    }

    public function invokeVar($object, $propertyName, $value)
    {
        $reflection = new \ReflectionClass(get_class($object));
        $reflection_property = $reflection->getProperty($propertyName);
        $reflection_property->setAccessible(true);
        $reflection_property->setValue($object, $value);
    }
}
