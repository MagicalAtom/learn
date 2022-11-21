<?php

namespace mswco\User\Tests\Feature;


use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Throwable;
use mswco\User\Models\User;
class RegisterTest extends TestCase
{
use  RefreshDatabase;

    public function test_user_can_see_register_form(){
        $response = $this->get(route('register'));  // باز کردن این صفحه

        $response->assertStatus(200); // اگه باز شد و کد اچ تی تی پی موفقیت آمیز دریافت کرد
    }


    public function test_user_can_register_to_site(){
    $response  = $this->registerNewUser();

$response->assertRedirect(route('home')); // اگه ریدایرکت شد به این صفحه

$this->assertCount(1,User::all()); // بیا و بررسی کن آیا یک رکورد به مدل یوزر اضافه شده یا نه


    }


    public function test_user_have_verify_account(){

        $response = $this->registerNewUser();

        $response = $this->get(route('home'));
        $response->assertRedirect(route('verification.notice'));

    }

    public function test_verify_user_can_see_home_page(){
        $this->registerNewUser();
        $this->assertAuthenticated();
        auth()
        ->user()
        ->markEmailAsVerified(); // برای تایید ایمیل
        $response = $this->get(route('home')); // روت هوم رو باز کن
        $response->assertOk(); // بیا بررسی کن که آیا باز شده یا خیر
    }

    public function registerNewUser()
    {
       return $this->post(route('register'), // بیا و صفحه ثبت نام رو باز کن و با مشخصاتی که داخل آرایه نوشته شده داخل دیتابیس مخصوص خودت ثبت نام کن
        [
       "name" => "mehran",
       "email" => "mehran@gmail.com",
       "phone_number" => "9156754321",
       "password" => "M21232123m?@",
       "password_confirmation" => "M21232123m?@"
        ]);
    }






}
