<?php

namespace mswco\User\Services;

class CodeGenerateService
{
public static function generate(){
    return random_int(100000,999999);
}
}

