<?php

/**
 * Class CompleteRange
 *
 * @author Tavo Sanchez <gtavo427@gmail.com>
 * @name ClearPar
 * @package Step1
 * @version 1.0
 */

namespace Step1;

class CompleteRange
{

    /**
     * @param array $rango
     * @return array
     */
    function build(array $rango)
    {
        return range($rango[0], $rango[count($rango) - 1]);
    }
}

$obj = new CompleteRange;
$result = $obj->build([4, 6, 7, 15]);
print_r($result);

?>