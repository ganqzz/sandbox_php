<?php

$classes = get_declared_classes();
foreach ($classes as $class) {
    echo $class . PHP_EOL;
}
