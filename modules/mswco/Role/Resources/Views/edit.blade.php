@extends('Dashboard::layouts.master')
@section('breadcrumb')
    <li><a href="{{ route('category.index') }}" title="دسته بندی ها">دسته بندی ها</a></li>
    <li><a href="#" title="ویرایش دسته بندی">ویرایش دسته بندی</a></li>
@endsection
<center>

@section('content')
    <div class="row no-gutters  ">
        <div class="col-6 bg-white">
            <p class="box__title">بروزرسانی دسته بندی</p>
            <form action="{{ route('category.update', $category->id) }}" method="post" class="padding-30">
                @csrf
                @method('patch')
                <input type="text" name="name" required placeholder="نام دسته بندی" class="text" value="{{ $category->name}}">
                <input type="text" name="slug" required placeholder="نام انگلیسی دسته بندی" class="text" value="{{ $category->slug}}">
                <button class="btn btn-webamooz_net">بروزرسانی</button>
            </form>
        </div>
    </div>
@endsection
</center>
