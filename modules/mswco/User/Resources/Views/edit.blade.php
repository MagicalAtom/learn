@extends('Dashboard::layouts.master')
@section('breadcrumb')
    <li><a href="{{ route('users.index') }}" title="کاربران">کاربران</a></li>
    <li><a href="#" title="ویرایش کاربران">ویرایش کاربران</a></li>
    <li><a href="#" title="{{$user->name}}">{{$user->name}}</a></li>
@endsection
<center>

@section('content')
    <div class="row no-gutters  ">
        <div class="col-6 bg-white">
            <p class="box__title">بروزرسانی کاربر</p>
            <form action="{{ route('users.update', $user->id) }}" method="post" class="padding-30">
                @csrf
                @method('patch')
                <input type="text" name="name" required placeholder="نام کاربر" class="text" value="{{ $user->name}}">
                <input type="text" name="email" required placeholder="ایمیل کاربر" class="text" value="{{ $user->email}}">
                <button class="btn btn-webamooz_net">بروزرسانی</button>
            </form>
        </div>
    </div>
@endsection
</center>
