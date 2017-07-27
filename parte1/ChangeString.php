<?php

/**
 * Class ChangeString
 *
 * @author Tavo Sanchez <gtavo427@gmail.com>
 * @name ChangeString
 * @package Step1
 * @version 1.0
 */
namespace Step1;

class ChangeString
{
    /**
     * Ejecutar el cambio de string
     *
     * @param String $str
     * @return String string
     *
     */
    public function build($str)
    {
        $abc = ["A" => "B", "B" => "C", "C" => "D", "D" => "E", "E" => "F", "F" => "G", "G" => "H", "H" => "I", "I" => "J", "J" => "K",
            "K" => "L", "L" => "M", "M" => "N", "N" => "Ñ", "Ñ" => "O", "O" => "P", "P" => "Q", "Q" => "R", "R" => "s", "S" => "T",
            "T" => "U", "U" => "V", "V" => "W", "W" => "X", "X" => "Y", "Y" => "Z", "Z" => "A", "a" => "b", "b" => "c", "c" => "d", "d" => "e",
            "e" => "f", "f" => "g", "g" => "h", "h" => "i", "i" => "j", "j" => "k", "k" => "l", "l" => "m", "m" => "n", "n" => "ñ", "ñ" => "o",
            "o" => "p", "p" => "q", "q" => "r", "r" => "s", "s" => "t", "t" => "u", "u" => "v", "v" => "w", "w" => "x", "x" => "y", "y" => "z",
            "z" => "a"
        ];

        return strtr($str, $abc);
    }

}

$obj = new ChangeString;
echo $obj->build('25abcoABTplOE');