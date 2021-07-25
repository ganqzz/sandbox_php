<?php
// PHP >= 5.5
function getValues() {
    // example
    yield "Apple";
    yield "Ball";
    yield "Cat";
}

$sutff = getValues();
foreach($stuff as $thing) {
    echo $thing . "\n";
}

