<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{

    public static function setUpBeforeClass(): void
    {
        fwrite(STDOUT, 'ExampleTest::setUpBeforeClass' . PHP_EOL);
    }

    public static function tearDownAfterClass(): void
    {
        fwrite(STDOUT, 'ExampleTest::tearDownAfterClass' . PHP_EOL);
    }

    public function setUp(): void
    {
        fwrite(STDOUT, 'ExampleTest::setUp' . PHP_EOL);
    }

    public function tearDown(): void
    {
        fwrite(STDOUT, 'ExampleTest::tearDown' . PHP_EOL);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        sleep(2);
        fwrite(STDOUT, 'ExampleTest::testBasicTest function' . PHP_EOL);
        $this->assertTrue(true);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTestTwo()
    {
        sleep(2);
        fwrite(STDOUT, 'ExampleTest::testBasicTestTwo function' . PHP_EOL);
        $this->assertTrue(true);
    }
}
