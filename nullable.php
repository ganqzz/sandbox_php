<?php

function say(?string $msg) {
    if ($msg) {
        echo $msg;
    }
}

function say2(?string $msg) {
    echo $msg;
}

say('hello'); // ok -- prints hello
say(null); // ok -- does not print
// say(); // error -- missing parameter
// say(new stdclass); //error -- bad type

say2("hello");
say2(null);
