<?php

class DB
{
    private $_mysqli,
        $_query,
        $_results = array(),
        $_count = 0;

    private static $instance;

    private function __construct()
    {
        $this->_mysqli = new mysqli('localhost', 'ganq', 'hawkeye', 'ganq');
        if ($this->_mysqli->connect_error) {
            die($this->_mysqli->connect_error);
        }
    }

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new static();
        }
        return self::$instance;
    }

    public function query($sql)
    {
        if ($this->_query = $this->_mysqli->query($sql)) {
            while ($row = $this->_query->fetch_object()) {
                $this->_results[] = $row;
            }
            $this->_count = $this->_query->num_rows;
        }
        return $this;
    }

    public function getResults()
    {
        return $this->_results;
    }

    public function getCount()
    {
        return $this->_count;
    }

    public function getConnection()
    {
        return $this->_mysqli;
    }

}

/*
 * Main
 */
$users = DB::getInstance()->query("SELECT * FROM users");

if ($users->getCount()) {
    foreach ($users->getResults() as $user) {
        echo $user->name, '<br>';
    }
}
