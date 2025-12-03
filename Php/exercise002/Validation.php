<?php

class Validation {

    public $validations = [];

    public static function validate($rules, $data) {
        //name of the field and the rules
        $validation = new self();

        foreach($rules as $field => $fieldRules) {
            foreach($fieldRules as $rule) {
                if ($rule === 'confirmed') {
                    $validation->$rule($field, $data[$field], $data["confirm-{$field}"]);
                } else {
                    $validation->$rule($field, $data[$field]);
                }
            }
        }
        return $validation;
    }

    private function required($field, $value) {
        if (strlen($value) === 0) {
            $this->validations [] = "The field {$field} is mandatory";
        }
    }

    private function email($field, $value) {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            $this->validations [] = "The field {$field} is not a valid email";
        }
    }
        

    private function confirmed($field, $value, $confirmValue) {
        if ($value !== $confirmValue) {
            $this->validations [] = "The field {$field} is not confirmed";
        }
    }

    public function hasErrors() {
        return sizeof($this->validations) > 0;
    }
}
