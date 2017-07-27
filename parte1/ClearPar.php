<?php

/**
 * Class ClearPar
 *
 * @author Tavo Sanchez <gtavo427@gmail.com>
 * @name ClearPar
 * @package Step1
 * @version 1.0
 */
namespace Step1;

class ClearPar
{
    /**
     * @param String $str
     * @return string
     */
    public function build($str)
    {
        return strtr($str, ["()" => "()", "(" => "", ")" => ""]);
    }
}

$obj = new ClearPar;
echo $obj->build('()()))()((()((())())()()()(');