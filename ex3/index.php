<?php

function createDiamond($size = 5)
{
    // Check whether the size is an integer and greater than or equal to 5. Change to default otherwise and echo appropriate message.
    if (is_int($size) === false || $size < 5) {
        $size = 5;
        echo "Size must be an integer and greater than or equal to 5. Default size is 5.<br>";
    }
    // Check whether the size is an odd number. Add 1 if it is even and echo appropriate message.
    if ($size % 2 == 0) {
        $size++;
        echo "Size must be an odd number. Size is increased by 1.<br>";
    }

    $result = '';
    // two "for" loops to create the diamond. Respectively for the top part and bottom part.
    for ($i = 1; $i <= $size; $i += 2) {
        // three "for" loops to create the diamond. Respectively for the underscores, the asterisks and the underscores again.
        // Alternatively, two loops would suffice. One for underscores, one for asterisks. Underscores are printed before and after the asterisks.
        // "for" for first underscores
        for ($j = 0; $j < ($size - $i) / 2; $j++) {
            $result .= '_ ';
        }
        // "for" for asterisks
        for ($t = 0; $t < $i; $t++) {
            if ($i == $size && $t == ($i - 1) / 2) {
                $result .= 'x ';
                // Continue to the next iteration of the loop so that the asterisk is not printed.
                continue;
            }
            $result .= '* ';
        }
        // "for" for second underscores
        for ($c = 0; $c < ($size - $i) / 2; $c++) {
            $result .= '_ ';
        }
        $result .= "<br>";
    }
    for ($i = $size - 2; $i >= 1; $i -= 2) {
        // "for" for first underscores
        for ($j = 0; $j < ($size - $i) / 2; $j++) {
            $result .= '_ ';
        }
        // "for" for asterisks
        for ($t = 0; $t < $i; $t++) {
            $result .= '* ';
        }
        // "for" for second underscores
        for ($c = 0; $c < ($size - $i) / 2; $c++) {
            $result .= '_ ';
        }
        $result .= "<br>";
    }
    return $result;
}

echo createDiamond(5);
echo createDiamond(6);
echo createDiamond(2);
