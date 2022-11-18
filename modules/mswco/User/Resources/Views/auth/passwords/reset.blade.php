@extends('User::auth.layout.master')

@section('title','تغییر رمز عبور')

@section('content')

    <form action="{{ route('password.update') }}" method="POST" class="form">
        <div class="form-content form-account">

        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <input id="email" type="email" class="txt txt-l @error('email') is-invalid @enderror"
               name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus
        placeholder="ایمیل"
        >
        @error('email')
        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
        @enderror
        <input id="password" type="password" class="txt txt-l @error('password') is-invalid
         @enderror" name="password" required autocomplete="new-password"
        placeholder="رمز عبور جدید"
        >
        @error('password')
        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
        @enderror

        <input id="password-confirm" type="password" class="txt txt-l"
               name="password_confirmation" required autocomplete="new-password"
        placeholder="تکرار رمز عبور  جدید"
        >


            <button class="btn btn-recoverpass">بازیابی</button>
        </div>

    </form>



@endsection
