<?php

namespace mswco\User\Services;

class CodeGenerateService
{
    private static $min = 100000;
    private static $max = 999999;


public static function generate(){
    return random_int(self::$min,self::$max);
}

    public static function Rule()
    {
    return ['verify_code' => 'required|numeric|between:100000,999999'];

    }


}

