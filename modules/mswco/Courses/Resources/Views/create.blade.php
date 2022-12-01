@extends('Dashboard::layouts.master')

@section('breadcrumb')
    <li><a href="#" title="دوره ها">دوره ها</a></li>

@endsection
@section('content')
    <div class="row no-gutters">
        <div class="col12 bg-white">
            @if($errors->any())
                {!! implode('', $errors->all('<div>:message</div>')) !!}
            @endif
<form action="{{ route('courses.store')  }}" class="padding-30" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="text" class="text" name="title" required placeholder="عنوان دوره">
    <x-error-component field="title"></x-error-component>
    <input type="text" class="text text-left " name="slug" required placeholder="نام انگلیسی دوره">
    <x-error-component field="slug"></x-error-component>

    <div class="d-flex multi-text">
        <input type="text" class="text text-left mlg-15" name="priority" placeholder="ردیف دوره">
        <x-error-component field="priority"></x-error-component>


        <input type="text" placeholder="مبلغ دوره" class="text-left text mlg-15" name="price" required>
        <x-error-component field="price"></x-error-component>


        <input type="text" placeholder="درصد مدرس" class="text-left text" name="percent" required>
        <x-error-component field="percent"></x-error-component>

    </div>


    <select name="teacher_id">
        <option value="" >انتخاب مدرس دوره</option>

    @foreach($teachers as $teacher)

        <option value=" {{ $teacher->id }} ">{{ $teacher->name }}</option>
        @endforeach

    </select>
    <x-error-component field="teacher_id"></x-error-component>

    <ul class="tags">

        <li class="addedTag">dsfsdf<span class="tagRemove" onclick="$(this).parent().remove();">x</span>
            <input type="hidden" value="" name="tags[]"></li>
        <li class="addedTag"><span class="tagRemove" onclick="$(this).parent().remove();">x</span>
            <input type="hidden" value="" name="tags[]"></li>
        <li class="tagAdd taglist">
            <input type="text" id="search-field">
        </li>
    </ul>
    <select name="type" required>
        <option value="">نوع دوره</option>
        <option value="1">نقدی</option>
        <option value="2">رایگان</option>
    </select>
    <x-error-component field="type"></x-error-component>

    <select name="status" required>
        <option value="">وضعیت دوره</option>
        <option value="not-completed">درحال برگزاری</option>
        <option value="completed">تکمیل</option>
        <option value="lock">قفل شده</option>
    </select>
    <x-error-component field="status"></x-error-component>

    <select name="category_id" required>
        <option value="0">دسته بندی </option>
    @foreach($Category as $cat)
        <option value="{{ $cat->id }}">{{  $cat->name  }}</option>
        @endforeach
    </select>
    <x-error-component field="category_id"></x-error-component>

    <div class="file-upload">
        <div class="i-file-upload">
            <span>آپلود بنر دوره</span>
            <input  type="file" required class="file-upload" id="files" name="attachment"/>
        </div>
        <span class="filesize"></span>
        <span class="selectedFiles">فایلی انتخاب نشده است</span>
    </div>
    <x-error-component field="attachment"></x-error-component>

    <textarea placeholder="توضیحات دوره" class="text h" name="body"></textarea>
    <x-error-component field="body"></x-error-component>

    <button class="btn btn-webamooz_net">ایجاد دوره</button>
</form>
@endsection
    </div></div>



@push('js')
    <script src="{{asset("panel/js/jquery-3.4.1.min.js")}}?v={{ uniqid() }}"></script>
    <script src="{{asset("panel/js/js.js")}}"></script>
    <script src="{{asset("panel/js/tagsInput.js")}}"></script>
@endpush

