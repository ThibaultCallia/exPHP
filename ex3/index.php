<?php

function createDiamond($size = 5)
{
    if (is_int($size) === false || $size < 5) {
        $size = 5;
        echo "Size must be an integer and greater than or equal to 5. Default size is 5.<br>";
    }
    if ($size % 2 == 0) {
        $size++;
        echo "Size must be an odd number. Size is increased by 1.<br>";
    }

    $result = '';
    for ($i = 1; $i <= $size; $i += 2) {
        for ($j = 0; $j < ($size - $i) / 2; $j++) {
            $result .= '_ ';
        }
        for ($t = 0; $t < $i; $t++) {
            if ($i == $size && $t == ($i - 1) / 2) {
                $result .= 'x ';
                continue;
            }
            $result .= '* ';
        }
        for ($c = 0; $c < ($size - $i) / 2; $c++) {
            $result .= '_ ';
        }
        $result .= "<br>";
    }
    for ($i = $size - 2; $i >= 1; $i -= 2) {
        for ($j = 0; $j < ($size - $i) / 2; $j++) {
            $result .= '_ ';
        }
        for ($t = 0; $t < $i; $t++) {
            $result .= '* ';
        }
        for ($c = 0; $c < ($size - $i) / 2; $c++) {
            $result .= '_ ';
        }
        $result .= "<br>";
    }
    return $result;
}

echo createDiamond(5);
