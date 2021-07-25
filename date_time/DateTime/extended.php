<?php
/**
 * extended
 */
class FormattedDate extends DateTime
{
    protected $formatString = 'l, F j, Y';

    public function mdy()
    {
        $this->formatString = 'n/j/Y';
    }

    public function __toString()
    {
        return $this->format($this->formatString);
    }
}


require_once 'FormattedDate.php';
$date = new FormattedDate('7/4/1776');
$date->mdy();
echo $date;
