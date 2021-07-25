<?php


class ErrorHandler
{
    protected $errors = [];

    public function addError($error, $key = null)
    {
        if ($key) {
            $this->errors[$key][] = $error;
        } else {
            $this->errors[] = $error;
        }
    }

    public function all($key = null)
    {
        return isset($key) ? $this->errors[$key] : $this->errors;
    }

    public function hasErrors()
    {
        return count($this->all()) ? true : false;
    }

    public function first($key)
    {
        $first = $this->all()[$key][0];
        return isset($first) ? $first : '';
    }

}
