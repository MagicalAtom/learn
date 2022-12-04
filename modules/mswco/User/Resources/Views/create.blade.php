@extends('Dashboard::layouts.master')
@section('breadcrumb')
    <li><a href="{{ route('users.index') }}" title="کاربران">کاربران</a></li>
    <li><a href="#" title="ساخت کاربران">ساخت کاربران</a></li>
@endsection
<center>

@section('content')
    <div class="row no-gutters  ">
        <div class="col-6 bg-white">
            <p class="box__title">ساخت کاربر</p>
            <form action="{{ route('users.store'); }}" method="post" class="padding-30">
                @csrf
                @method('post')
                <input type="text" name="name" required placeholder="نام کاربر" class="text" value="">
                <input type="text" name="email" required placeholder="ایمیل کاربر" class="text" value="">
                <input type="text" name="password" required placeholder="پسورد کاربر" class="text" value="">
                <input type="text" name="phone_number" required placeholder="شماره تلفن کاربر" class="text" value="">
                <button class="btn btn-webamooz_net">ساخت</button>
            </form>
        </div>
    </div>
@endsection
</center>
