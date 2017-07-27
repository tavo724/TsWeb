<?php

namespace Helper;

class ArrayHelper
{
    public function convertArrayXml($array, &$xml)
    {
        foreach ($array as $k => $v) {
            if (is_array($v)) {
                if (!is_numeric($k)) {
                    $s_node = $xml->addChild("$k");
                    $this->convertArrayXml($v, $s_node);
                } else {
                    $this->convertArrayXml($v, $xml);
                }
            } else {
                $xml->addChild("$k", "$v");
            }
        }
    }
}
