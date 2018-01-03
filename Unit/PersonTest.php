<?php
/**
 * Created by PhpStorm.
 * User: riitei
 * Date: 2017/12/31
 * Time: 17:35
 */
require_once 'Person.php';
use PHPUnit\Framework\TestCase;



class PersonTest extends TestCase
{

    public function testSayHelloTo(){
        $person =  new Person('yanyan');
        $this->assertEquals(
            'Hello, Neo I am ting, ',$person->sayHelloTo('yan')


        );
    }

}