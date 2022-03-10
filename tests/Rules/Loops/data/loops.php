<?php

$a = 1;
while ($a < 2) {
    $a++;
}

$a = 1;
do {
    echo $a;
    $a++;
} while ($a < 3);

for ($i = 0; $i < 2; $i++) {

}

$arr = array(1, 2, 3, 4);
foreach ($arr as $value) {
    echo $value;
}

function example()
{
    // do not cause an error
    $someVar = 'while';
}

// do not cause an error
function whileName()
{
}
