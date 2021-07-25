<?php
var_dump(filter_var('+0', FILTER_VALIDATE_INT, array('options' => array('min_range' => 0))));
var_dump('a-6ag-7aga'>=0);
