@extends('Dashboard::layouts.master')


@section('breadcrumb')
    <li><a href="#" title="ساخت جلسه">ساخت جلسه</a></li>
@endsection


@section('content')

        <p class="box__title">ایجاد دوره جدید</p>
        <div class="row no-gutters bg-white">
            <div class="col-12">
                <form action="{{ route('lessons.store',$course->id) }}" method="POST" class="padding-30" enctype="multipart/form-data">
                    @csrf
                    <input type="text" class="text" name="title" placeholder="عنوان درس">
                    <input type="text" class="text text-left " name="slug" placeholder="نام انگلیسی درس اختیاری">
                    <input type="text" class="text text-left " name="time" placeholder="مدت زمان جلسه">
                    <input type="text" class="text text-left " name="periority" placeholder="شماره جلسه">

                    <p class="box__title">ایا این درس رایگان است ؟ </p>
                    <div class="w-50">
                        <div class="notificationGroup">
                            <input id="lesson-upload-field-1" name="free" value="0" type="radio" checked/>
                            <label for="lesson-upload-field-1">خیر</label>
                        </div>
                        <div class="notificationGroup">
                            <input id="lesson-upload-field-2" name="free" value="1" type="radio" />
                            <label for="lesson-upload-field-2">بله</label>
                        </div>
                    </div>


                    <select name="season_id">
                        <option value="" >انتخاب سرفصل</option>

                        @foreach($seasons as $season)

                            <option value=" {{ $season->id }} ">{{ $season->name }}</option>
                        @endforeach

                    </select>
                    <div class="file-upload">
                        <div class="i-file-upload">
                            <span>آپلود درس</span>
                            <input type="file" class="file-upload" name="lesson_file"/>
                        </div>
                        <span class="filesize"></span>
                        <span class="selectedFiles">فایلی انتخاب نشده است</span>
                    </div>

                    <textarea placeholder="توضیحات دوره" class="text h" name="body"></textarea>
                    <button class="btn btn-webamooz_net">آپلود درس</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{asset("panel/js/jquery-3.4.1.min.js")}}"></script>
    <script src="{{asset("panel/js/js.js")}}"></script>
    <script src="{{asset("panel/js/tagsInput.js")}}"></script>
@endpush
