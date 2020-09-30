<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');
        $response->assertStatus(400);
    }

    /**
     * @test
     */
    public function itBasicTest2()
    {
        $response = $this->get('/');
        sleep(2);
        $response->assertStatus(200);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testit_basic_Test3()
    {
        $response = $this->get('/');
        $response->assertStatus(400);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_it_basic_test4()
    {
        $expected = 10;
        // TODO
        $actual = 11;
        $this->assertSame($expected, $actual);
    }
}
