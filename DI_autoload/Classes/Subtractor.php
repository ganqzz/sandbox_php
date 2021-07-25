<?php


namespace Classes;


class Subtractor implements OperationInterface
{

    public function run($number, $result)
    {
        return $result - $number;
    }
}
