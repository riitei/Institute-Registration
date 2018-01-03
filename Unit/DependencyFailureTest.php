<?php
/**
 * Created by PhpStorm.
 * User: riitei
 * Date: 2018/1/2
 * Time: 17:24
 */

use PHPUnit\Framework\TestCase;

class DependencyFailureTest extends TestCase
{
    public function testOne()
    {
        $this->assertTrue(false);
    }

    /**
     * @depends testOne
     */
    public function testTwo()
    {
    }
}