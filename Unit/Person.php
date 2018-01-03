<?php
/**
 * Created by PhpStorm.
 * User: riitei
 * Date: 2017/12/31
 * Time: 17:05
 */
class Person
{
    protected $_name='';

    /**
     * Person constructor.
     */
    public function __construct($name)
    {
        $this->_name = (string) $name;
    }
    public function  sayHelloTo($name){
        return 'yan '.$this->_name;
    }
}