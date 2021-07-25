<?php

class Calendar
{
    protected $weeks = array();
    protected $timeStamp;

    public function __construct($ym) {
        $this->timeStamp = strtotime($ym . "-01");

        if ($this->timeStamp === false) {
            $this->timeStamp = time();
        }
    }

    public function create()
    {
        $lastDay = date("t", $this->timeStamp);
        $youbi = date("w", mktime(0,0,0,date("m",$this->timeStamp),1,date("Y",$this->timeStamp)));
        // $week = '';
        $week = str_repeat('<td></td>', $youbi);

        for ($day = 1; $day <= $lastDay; $day++, $youbi++) {
            $dayOfWeek = $youbi % 7;
            // $week .= sprintf('<td class="youbi_%d" value=""><input type="checkbox" id="dp%d" name="hoge[]" value="%s"><label for="dp%d">%d</label></td>',
            //    $youbi % 7, $day, date("Y-m-d",mktime(0,0,0,date("m",$this->timeStamp),$day,date("Y",$this->timeStamp))), $day, $day);
            $week .= '<td class="youbi_' . $dayOfWeek . '" value="">'
                . '<input type="checkbox" id="dp' . $day . '" name="hoge[]" value="'
                . date("Y-m-d",mktime(0,0,0,date("m",$this->timeStamp),$day,date("Y",$this->timeStamp))) . '">'
                . '<label for="dp' . $day . '">' . $day . '</label></td>';

            if ($dayOfWeek == 6) {
                if ($day == $lastDay) {
                    $week .= str_repeat('<td></td>', 6 - $dayOfWeek);
                }
                $this->weeks[] = '<tr>' . $week . '</tr>';
                $week = '';
            }
            if ($day == $lastDay) {
                    $week .= str_repeat('<td></td>', 6 - $dayOfWeek);
                $this->weeks[] = '<tr>' . $week . '</tr>';
                $week = '';
            }
        }

    }

    public function getWeeks()
    {
        return $this->weeks;
    }

    public function prev()
    {
        return date("Y-m", mktime(0,0,0,date("m",$this->timeStamp)-1,1,date("Y",$this->timeStamp)));
    }

    public function next()
    {
        return date("Y-m", mktime(0,0,0,date("m",$this->timeStamp)+1,1,date("Y",$this->timeStamp)));
    }

    public function yearMonth()
    {
        return date("Y-m", $this->timeStamp);
    }

}

