
@extends('User::auth.layout.master')
@section('title','کد فعالسازی حساب کاربری')
@section('content')
    <div class="account act">
        <form action="{{  route('verification.verify')  }}" class="form" method="post">
            @csrf
            <a class="account-logo" href="/">
                <img src="/img/weblogo.png" alt="">
            </a>
            <div class="card-header">
                @if (session('resent'))
                    <div class="alert alert-success" role="alert" style="text-align: center">
                        <font color="#1e90ff">لینک تایید ایمیل جدید با موفقیت ارسال شد</font>
                    </div>
                @endif
                <br>
                <p class="activation-code-title">کد فرستاده شده به ایمیل  <span>{{ auth()->user()->email }}</span>
                    را وارد کنید . ممکن است ایمیل به پوشه spam فرستاده شده باشد.
                    ایمیلتان را اشتباه وارد کرده اید؟ <a href=""> برای ویرایش ایمیل کلیک کنید</a>.
                </p>
            </div>
            <div class="form-content form-content1">
                <input name="verify_code" required class="activation-code-input" placeholder="فعال سازی">

                @error('verify_code')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <br>
                <button class="btn i-t">تایید</button>
                <a href="#" onclick="
                event.preventDefault();
                document.getElementById('resend-code').submit()
                ">ارسال مجدد کد فعالسازی</a>

            </div>
            <div class="form-footer">
                <a href="{{ route('register') }}">صفحه ثبت نام</a>
            </div>
        </form>

        <form id="resend-code" action="{{ route('verification.resend') }}" method="post">
            @csrf
        </form>
    </div>
@endsection

@section('js')
    <script src="/js/jquery-3.4.1.min.js"></script>
    <script src="/js/activation-code.js"></script>
@endsection

