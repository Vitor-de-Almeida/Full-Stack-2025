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
                } 
                else if (str_contains($rule, ':')) {
                    $rule = explode(':', $rule);
                    $validation->{$rule[0]}($rule[1], $field, $data[$field]);
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

    private function min($min, $field, $value) {
        if (strlen($value) < $min) {
            $this->validations [] = "The {$field} must be at least {$min} characters";
        }
    }

    private function max($max, $field, $value) {
        if (strlen($value) > $max) {
            $this->validations [] = "The {$field} must be less than {$max} characters";
        }
    }

    private function strong($field, $value) {
        if (!preg_match('/[0-9]/', $value)) {
            $this->validations [] = "The {$field} must contain at least one number";
        }
        if (!preg_match('/[!@#$%^&*]/', $value)) {
            $this->validations [] = "The {$field} must contain at least one special character";
        }
    }

    public function hasErrors() {
        flash()->push('validations', $this->validations);
        //$_SESSION['validations'] = $this->validations;
        return sizeof($this->validations) > 0;
    }
}
