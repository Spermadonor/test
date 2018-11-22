<?php
define('ROOT', dirname(__FILE__));
function binarySearchByKey($file, $iskomoye_znacheniye){
    $handle = fopen($file, "r");
        $string = fgets($handle);
        mb_convert_encoding($string, 'cp1251');
        $explodedstring = explode('\x0A', $string);
        array_pop($explodedstring);
        foreach ($explodedstring as $key => $value) {
            $arr[] = explode('\t', $value);
        }
        $nachalo = 0;
        $konec = count($arr)-1;
        while ($nachalo <= $konec) {
            $poluchennaya_seredina = floor(($nachalo + $konec) / 2);
            $strnatcmp = strnatcmp($arr[$poluchennaya_seredina][0],$iskomoye_znacheniye);
            if ($strnatcmp > 0) {
                $konec = $poluchennaya_seredina - 1;
            } elseif ($strnatcmp < 0) {
                $nachalo = $poluchennaya_seredina + 1;
            } else {
                return $arr[$poluchennaya_seredina][1];
            }
        }
    return 'undef';
}
