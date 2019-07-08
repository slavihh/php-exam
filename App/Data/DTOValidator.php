<?php

namespace App\Data;


class DTOValidator
{
    /**
     * @param $min
     * @param $max
     * @param $value
     * @param $type
     * @param $fieldName
     * @throws \Exception
     */
    public static function validate($min, $max, $value, $type, $fieldName){

        if($type === "text"){
            if(mb_strlen($value) < $min || mb_strlen($value) > $max){
                throw new \Exception("{$fieldName} must be between $min and $max characters!");
            }
        }else if($type == "number"){
            if(is_numeric($value)){
                if($value < $min || $value > $max){
                    throw new \Exception("{$fieldName} must be between $min and $max!");
                }
            }
            else {
                throw new \Exception('Please enter a number!');
            }
        }
        else if($type == "email") {
            if (filter_var($value, FILTER_VALIDATE_EMAIL)) {
                if(mb_strlen($value) < $min || $value > $max){
                    throw new \Exception("{$fieldName} must be between $min and $max!");
                }
            }
            else {
                throw new \Exception('Please enter a valid email!');
            }
        }

        else if($type == "url") {
            if (filter_var($value, FILTER_VALIDATE_URL)) {
                if(mb_strlen($value) < $min || $value > $max){
                    throw new \Exception("{$fieldName} must be between $min and $max!");
                }
            }
            else {
                throw new \Exception("Please enter valid url!");
            }
        }

        else if($type == "phone") {
            $pattern = "/(\+)?(359|0)8[789]\d{1}(|-| )\d{3}(|-| )\d{3}/";
            if (!preg_match($pattern, $value)){
                throw new \Exception("Please enter valid phone number!");
            }
            if (mb_strlen($value) < $min || mb_strlen($value) > $max){
                throw new \Exception("{$fieldName} must be between $min and $max!");
            }
        }

    }
}