<?php

namespace validators;

class UserValidator implements BaseValidator
{
    public function validate($data)
    {
        $errors = [];

        if (!preg_match("/^[A-ZČĆŽŠĐ]{1}[a-zčćžšđ]{2,14}$/",$data['firstName']) === 1) {
            $errors['firstName'] = 'The first name must contain at least 3 letters and must begin with a capital letter.';
        }

        if (!preg_match( "/^[A-ZČĆŽŠĐ]{1}[a-zčćžšđ]{2,14}$/",$data['lastName']) === 1) {
            $errors['lastName'] = 'The last name must contain at least 3 letters and must begin with a capital letter.';
        }

        if (!preg_match("/^\b[A-ZČĆŽŠĐ][a-zčćžšđA-ZČĆŽŠĐ]{2,30}(?: [A-ZČĆŽŠĐ][A-ZČĆŽŠĐa-zčćžšđ]*)*\b$/",$data['city']) === 1) {
            $errors['city'] = 'The first letter must be capitalized. The value must not be shorter than 3 characters.';
        }

        if (!preg_match("/^\b[A-ZČĆŽŠĐ][a-zčćžšđA-ZČĆŽŠĐ]{2,30}(?: [A-ZČĆŽŠĐ][A-ZČĆŽŠĐa-zčćžšđ]*)*\b$/",$data['country']) === 1) {
            $errors['country'] = 'The first letter must be capitalized. The value must not be shorter than 3 characters.';
        }

        if (!preg_match("/^([A-ZČĆŽŠĐ]|[1-9]{1,7})[A-ZČĆŽŠĐa-zčćžšđ\d\-\.\s]+$/",$data['street']) === 1) {
            $errors['street'] = 'Street and number are required data.';
        }

        return empty($errors) ? true : $errors;
    }

}