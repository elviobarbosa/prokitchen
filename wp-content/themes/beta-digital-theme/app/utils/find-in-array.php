<?php
function encontrarValor($array, $propriedade, $valorDesejado) {
    foreach ($array as $objeto) {
        if ($objeto->$propriedade === $valorDesejado) {
            return $objeto;
        }
    }
    
    return null;
}