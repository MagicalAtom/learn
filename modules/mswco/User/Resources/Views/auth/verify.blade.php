@extends('User::auth.layout.master')



@section('title','تایید ایمیل')

@section('content')


    <div class="account">
        <form method="POST" action="{{ route('verification.resend') }}" class="form">
            @csrf
            <a class="account-logo" href="index.html">
                <img src="{{asset("img/weblogo.png")}}" alt="">
            </a>
            <div class="form-content form-account">
                                        @if (session('resent'))
                                            <div class="alert alert-success" role="alert">
                                                <font color="#1e90ff">لینک تایید ایمیل جدید با موفقیت ارسال شد</font>
                                            </div>
                                        @endif
                <br>
                <button class="btn btn--login" type="submit">ارسال مجدد</button>
                         لینک تایید ایمیل با موفقیت برای شما ارسال شد .
                <br><br>
             <font color="#ff4500" >  اگر چنانچه موفق به دریافت لینک نشده پس از بررسی بخش spam ایمیل مجدد بر روی دکمه (ارسال مجدد) کلیک کنید</font>
            </div>
            <div class="form-footer">
                <a href="{{ route('home') }}">صفحه اصلی</a>
            </div>
        </form>
    </div>



@endsection

