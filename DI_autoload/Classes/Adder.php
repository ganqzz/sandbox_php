<?php


namespace Classes;


class Adder implements OperationInterface
{

    public function run($number, $result)
    {
        return $result + $number;
    }
}
