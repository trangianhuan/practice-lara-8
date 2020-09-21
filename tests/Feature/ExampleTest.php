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
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function itBasicTest2()
    {
        $response = $this->get('/');
        fwrite(STDOUT, 'Feature run testBasicTest2');
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
        fwrite(STDOUT, 'Feature run testBasicTest2');
        $response->assertStatus(200);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function it_basic_test4()
    {
        $response = $this->get('/');
        fwrite(STDOUT, 'Feature run testBasicTest2');
        $response->assertStatus(200);
    }
}
