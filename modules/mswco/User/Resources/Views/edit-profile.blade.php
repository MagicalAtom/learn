@extends('Dashboard::layouts.master')
@section('breadcrumb')
    <li><a href="#" title="ویرایش پروفایل">ویرایش پروفایل</a></li>
    <li><a href="#" title="{{ auth()->user()->name }}">{{ auth()->user()->name }}</a></li>
@endsection
@section('content')

    <div class="main-content">
        <div class="user-info bg-white padding-30 font-size-13">
                <x-profilephoto></x-profilephoto>
            <form action="{{ route('user.update.profile.one',auth()->user()->id)  }}" method="POST">
                @csrf
         @method('PATCH')
                <x-lablecomponent field="نام و نام خانوادگی"></x-lablecomponent>
            <input class="text" name="name" placeholder="نام و نام خانوادگی" value="{{ auth()->user()->name }}">
                <x-error-component field="name"></x-error-component>
                <x-lablecomponent field="ایمیل"></x-lablecomponent>
                <input class="text text-left" placeholder="ایمیل" name="email" value="{{ auth()->user()->email }}">
                <x-error-component field="email"></x-error-component>
                <x-lablecomponent field="شماره موبایل"></x-lablecomponent>
                <input class="text text-left" name="phone_number" placeholder="شماره موبایل" value="{{ auth()->user()->phone_number }}">
                <x-error-component field="phone_number"></x-error-component>
                <x-lablecomponent field="شماره کارت بانکی"></x-lablecomponent>
                <input class="text text-left" placeholder="شماره کارت بانکی" name="card_number" value="{{ auth()->user()->card_number }}">
                <x-error-component field="card_number"></x-error-component>
                <x-lablecomponent field="نام کاربری"></x-lablecomponent>
                <input class="text text-left" placeholder="نام کاربری و آدرس پروفایل"  name="user_name" value="{{ auth()->user()->user_name }}">
                <x-error-component field="user_name"></x-error-component>
                <p class="input-help text-left margin-bottom-12" dir="ltr">
                    مقدار نام کاربری به صورت زیر برای دسترسی به شما از طریق ادرس زیر
                    https://msw.net/
                    <a href="https//webamooz/tutors/MagicSoftWare">MagicSoftWare</a>
                </p>
                <x-lablecomponent field="بیوگرافی"></x-lablecomponent>

                <textarea class="text" name="biography" placeholder="درباره من"> {{ auth()->user()->biography }} </textarea>
                <x-error-component field="biography"></x-error-component>
                <br>
                <br>
                <button class="btn btn-webamooz_net">ذخیره تغییرات</button>
            </form>
        </div>
    </div>
            @endsection
@push('js')
                <script src="panel/js/jquery-3.4.1.min.js"></script>
                <script src="panel/js/js.js"></script>
@endpush
</html>
@switch(session('status'))
@case('updatePhoto')
   <script> alert('عکس پروفایل شما با موفقیت ویرایش شد!') </script>


@endswitch
