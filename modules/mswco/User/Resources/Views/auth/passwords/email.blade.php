@extends('User::auth.layout.master')


@section('title','تغییر رمز عبور')


@section('content')

    <form action="{{ route('password.email') }}" class="form" method="POST">
        @csrf
        <a class="account-logo" href="index.html">
            <img src="{{asset("img/weblogo.png")}}" alt="">
        </a>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="form-content form-account">
            <input id="email" type="email" class="txt txt-l @error('email') is-invalid
         @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                   placeholder="ایمیل"
            >

            <br>
            @error('email')
            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
            @enderror
            <button class="btn btn-recoverpass">بازیابی</button>
        </div>
        <div class="form-footer">
            <a href="login.html">صفحه ورود</a>
        </div>
    </form>

@endsection





