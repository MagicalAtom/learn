<?php

namespace mswco\User\Services;

class VerifyCodeServices
{
public static function store($code,$id){
    cache()->set('verify_key_' . $id,$code,now()->addDay()); // ذخیره سازی کد در کش برای 20 ثانیه همراه با آیدی کاربر
}

public static function get($id){
    return cache()->get('verify_key_' . $id);
}


}
