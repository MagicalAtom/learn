@extends('auth.layout.master')


@section('title','صفحه ثبت نام')


@section('content')
<form action="{{ route('register') }}" class="form" method="POST">
    @csrf
            <a class="account-logo" href="index.html">
                <img src="img/weblogo.png" alt="">
            </a>
            <div class="form-content form-account">
                <input type="text" class="txt  @error('name') is-invalid @enderror" placeholder="نام و نام خانوادگی"
                       name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                >
                @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                <input type="text" class="txt txt-l  @error('email') is-invalid @enderror" placeholder="ایمیل"
                       name="email" value="{{ old('email') }}" required autocomplete="email"
                >
                @error('email')
                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                        @enderror

                <input type="text" class="txt txt-l  @error('phone_number') is-invalid @enderror" placeholder="تلفن همراه"
                       name="phone_number" value="{{ old('phone_number') }}"  autocomplete="phone_number"
                >
                @error('phone_number')
                <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                @enderror
                <input type="text" class="txt txt-l @error('password') is-invalid @enderror" placeholder="رمز عبور" name="password" required autocomplete="new-password">
                @error('password')
                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                        @enderror
                <input id="password-confirm" type="password" placeholder="تکرار رمز عبور" class="txt txt-1" name="password_confirmation" required autocomplete="new-password">

                <span class="rules">رمز عبور باید حداقل ۶ کاراکتر و ترکیبی از حروف بزرگ، حروف کوچک، اعداد و کاراکترهای غیر الفبا مانند !@#$%^&*() باشد.</span>
                <br>
                <button class="btn continue-btn">ثبت نام و ادامه</button>

            </div>
            <div class="form-footer">
                <a href="{{ route('login') }}">صفحه ورود</a>
            </div>
        </form>
@endsection


