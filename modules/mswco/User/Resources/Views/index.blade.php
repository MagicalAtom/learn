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
                            <th>پروفایل کاربر</th>
                            <th>شناسه کاربر</th>
                            <th>نام کاربر</th>
                            <th>ایمیل کاربر</th>
                            <th>نوع کاربر</th>
                            <th>تغییر نوع کاربر</th>
                            <th>عملیات</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $users as $user)

                        <tr role="row" class="">
                            <td><img width="80" height="80" src="{{  'کاربر'  }}"></td>
                            <td><a href="">{{ $user->id }}</a></td>
                            <td><a href="">{{ $user->name }}</a></td>
                            <td><a href="">{{ $user->email }}</a></td>
                            <td>  @if(\mswco\User\Models\User::UserTeacher($user->id) == 'yes') {{ "کاربر مدرس"  }} @else {{ 'کاربر عادی' }}@endif  </td>

                            <td>

                                <a href="" onclick="event.preventDefault(); UpdateUserStatus(event,'{{ route('users.change',$user->id) }}')" class="item-confirm mlg-15" title="مدرس"></a>
                                <a href="" onclick="event.preventDefault(); UpdateUserStatus(event,'{{ route('users.del',$user->id) }}')" class="item-reject mlg-15" title="حذف مدرس"></a>

                            </td>

                            <td>

                                <a href="" onclick="event.preventDefault(); DeleteItem(event,'{{ route('users.delete',$user->id) }}')" class="item-delete mlg-15" title="حذف"></a>

                            </td>
                        </tr>
                        @endforeach


                        </tbody>
                    </table>

                </div>
            </div>
        </div>
@endsection

@push('js')
    <script src="panel/js/jquery-3.4.1.min.js"></script>
    <script src="panel/js/js.js"></script>
    <script src="panel/js/tagsInput.js"></script>
@endpush
<script>

    function UpdateUserStatus(event,route) {

        let conf = window.confirm('آیا از تغییر اکانت این کاربر به اکانت مدرس اطمینان دارید ؟  ؟');
        if (conf) {
            $.post(route, {_method: "patch", _token: "{{ csrf_token() }}"})
                .done(function (response) {
                    // event.target.closest('tr').remove();
                    alert('کاربر مورد نظر از این پس به عنوان مدرس شناخته خواهد شد . ');


                    location.reload();
                })
        }
    }

    function UpdateUserStatusDelete(event,route) {

        let conf = window.confirm('آیا از تغییر اکانت این مدرس به اکانت ساده اطمینان دارید ؟  ؟');
        if (conf) {
            $.post(route, {_method: "patch", _token: "{{ csrf_token() }}"})
                .done(function (response) {
                    // event.target.closest('tr').remove();
                    alert('مدرس مورد نظر از این پس به عنوان کاربر عادی شناخته خواهد شد!');


                    location.reload();
                })
        }
    }




    function DeleteItem(event,route) {
        let conf = window.confirm('آیا از حذف این کاربر اطمینان دارید ؟');
        if (conf) {
            $.post(route, {_method: "delete", _token: "{{ csrf_token() }}"})
                .done(function (response) {
                    event.target.closest('tr').remove();
                    alert('کاربر مورد نظر با موفقیت حذف شد')
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

    @case('users.update')
    <script> alert('اکانت کاربر مورذ نظر با موفقیت به کاربر مدرس تغییر پیدا کرد . کاربر مورد نظر از این پس میتواند در سایت به تدریس بپردازد .') </script>
    @break
    @default

@endswitch
