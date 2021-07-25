<?php

class Validation
{

    public $errors = array();

    public function validate($data, $rules)
    {
        $valid = true;

        foreach ($rules as $fieldname => $rule) {
            // Extract rules to callbacks
            $callbacks = explode('|', $rule);

            // Call the validation callbacks
            foreach ($callbacks as $callback) {
                $value = isset($data[$fieldname]) ? $data[$fieldname] : null;
                if (!$this->$callback($value, $fieldname)) {
                    $valid = false;
                }
            }
        }

        return $valid;
    }

    public function text($value, $fieldname) {

        $whitelist = '/^[a-zA-Z0-9а-яА-Я ,\.\+\\n;:!_\-@]+$/';
        $valid = preg_match($whitelist, $value);
        if (!$valid) $this->errors[] = "The $fieldname contains invalid characters";
        return $valid;
    }

    public function email($value, $fieldname)
    {
        $valid = filter_var($value, FILTER_VALIDATE_EMAIL);
        if (!$valid) {
            $this->errors[] = "The $fieldname needs to be a valid email.";
        }
        return $valid;
    }

    public function required($value, $fieldname)
    {
        $valid = !empty($value);
        if (!$valid) {
            $this->errors[] = "The $fieldname is required.";
        }
        return $valid;
    }

    public function environment($value, $fieldname)
    {
        $values = array('admin', 'frontend');
        $valid = in_array($value, $values);
        if (!$valid) {
            $this->errors[] = "The $fieldname was not correct.";
        }
        return $valid;
    }

    public function example($value, $fieldname)
    {
        $string = '@example.com';
        $valid = $string == substr($value, strrpos($value, $string));
        if (!$valid) {
            $this->errors[] = "The $fieldname was not a valid email.";
        }
        return $valid;
    }
}
