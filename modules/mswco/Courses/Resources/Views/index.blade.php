@extends('Dashboard::layouts.master')
@section('breadcrumb')
    <li><a href="#" title="دوره ها">دوره ها</a></li>
@endsection
@section('content')

        <div class="row no-gutters  ">
            <div class="col-12 margin-left-10 margin-bottom-15 border-radius-3">
                <p class="box__title">دوره  ها</p>
                <div class="table__box">
                    <table class="table">
                        <thead role="rowgroup">
                        <tr role="row" class="title-row">
                            <th>بنر دوره</th>
                            <th>ردیف</th>
                            <th>شناسه</th>
                            <th>عنوان</th>
                            <th>نوع دوره</th>
                            <th>مدرس</th>
                            <th>وضعیت</th>
                            <th>دسته بندی</th>
                            <th>وضعیت تایید دوره</th>
                            <th>عملیات</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $courses as $course)

                        <tr role="row" class="">
                            <td><img width="80" height="80" src="{{  '/storage' . "/" . $course->attachment  }}"></td>
                            <td><a href="">{{ $course->priority }}</a></td>
                            <td><a href="">{{ $course->id }}</a></td>
                            <td><a href="">{{ $course->title }}</a></td>
                            <td>@if($course->type == 'free') رایگان  @elseif($course->type == 'cash') پولی @endif</td>
                            <td><a href="">{{ \mswco\Courses\Models\Course::teacher($course->teacher_id) }}</a></td>
                            <td>@if($course->status == 'completed') کامل شده @elseif($course->status == 'not-completed') کامل نشده @else قفل @endif</td>
                            <td><a href="">{{ \mswco\Category\Models\Category::category($course->category_id)}}</a></td>
                            <td><a href="">@if($course->confirm == 'accepted')
                                                                {{ "تایید شده" }}
                                    @else
                                               {{ "تایید نشده" }}
                                    @endif</a></td>
                            <td>
                                <a href="" onclick="event.preventDefault(); DeleteItem(event,'{{ route('courses.destroy',$course->id) }}')" class="item-delete mlg-15" title="حذف"></a>
                                <a href="" target="_blank" class="item-eye mlg-15" title="مشاهده"></a>
                                <a href="{{ route('courses.edit',$course->id) }}" class="item-edit mlg-15" title="ویرایش"></a>
                                <a href="" onclick="event.preventDefault(); UpdateConfirmationStatus(event,'{{ route('courses.accept',$course->id) }}')" class="item-confirm mlg-15" title="تایید"></a>
                                <a href="" class="item-reject mlg-15" title="رد" onclick="event.preventDefault(); UpdateConfirmationStatusRejected(event,'{{ route('courses.reject',$course->id) }}')"></a>
                                <a class="item-lock mlg-15"  title="قفل" onclick="event.preventDefault(); UpdateConfirmationStatusLock(event,'{{ route('courses.lock',$course->id) }}')" ></a>
                            </td>
                        </tr>
                        @endforeach


                        </tbody>
                    </table>
                </div>
             <a href="{{ route('courses.create') }}">   <button class="btn btn--login" style="margin-top: 17px; background-color: #1c8ecf">ساخت دوره جدید</button>
             </a>


                @endsection
@push('js')
    <script src="panel/js/jquery-3.4.1.min.js"></script>
    <script src="panel/js/js.js"></script>
    <script src="panel/js/tagsInput.js"></script>
@endpush
<script>

    function UpdateConfirmationStatusLock(event,route) {

        let conf = window.confirm('آیا از قفل کردن  این دوره اطمینان دارید ؟');
        if (conf) {
            $.post(route, {_method: "patch", _token: "{{ csrf_token() }}"})
                .done(function (response) {
                    // event.target.closest('tr').remove();
                    alert('دوره مورد نظر با موفقیت قفل شد . ')
                    location.reload();
                })
        }
    }

        function UpdateConfirmationStatusRejected(event,route) {

            let conf = window.confirm('آیا از رد این دوره اطمینان دارید ؟');
            if (conf) {
                $.post(route, {_method: "patch", _token: "{{ csrf_token() }}"})
                    .done(function (response) {
                        // event.target.closest('tr').remove();
                        alert('دوره مورد نظر با موفقیت رد شد . ')
                        location.reload();
                    })
            }
        }
    function UpdateConfirmationStatus(event,route) {

        let conf = window.confirm('آیا از تایید این دوره اطمینان دارید ؟');
        if (conf) {
            $.post(route, {_method: "patch", _token: "{{ csrf_token() }}"})
                .done(function (response) {
                    // event.target.closest('tr').remove();
                    alert('دوره مورد نظر با موفقیت تایید شد . ')
                    location.reload();
                })
        }
    }



    function DeleteItem(event,route) {
        let conf = window.confirm('آیا از حذف این دسته بندی اطمینان دارید ؟');
        if (conf) {
            $.post(route, {_method: "delete", _token: "{{ csrf_token() }}"})
                .done(function (response) {
                    event.target.closest('tr').remove();
                    alert('دسته بندی مورد نظر همراه با تمامی دسته بندی های زیرمجموعه آن با موفقیت حذف شد')
                })
                .fail(function (response) {

                })
        }
    }

</script>
@switch(session('status'))

    @case('create')
    <script> alert('با موفقیت اضافه شد') </script>
    @break

    @case('update')
    <script> alert('دوره مورد نظر با موفقیت ویرایش شد') </script>
    @break
    @default
    {{}}
@endswitch
