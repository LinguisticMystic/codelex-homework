<?php

namespace App\Validators;

class RegistrationValidator extends LoginValidator
{
    protected static array $fields = ['username', 'sex', 'password', 'confirmPassword'];

    protected function validateForm()
    {
        $this->validateUsername();
        $this->validatePassword();
        $this->validateSex();
        $this->validateConfirmPassword();
    }

    protected function validateSex()
    {
        $value = $this->postData['sex'];

        if (empty($value)) {
            $this->addError('sex', 'sex cannot be empty');
        }
    }

    protected function validateConfirmPassword()
    {
        $value = $this->postData['confirmPassword'];

        if (empty($value)) {
            $this->addError('sex', 'please confirm password');
        }
    }
}