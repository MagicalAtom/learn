@extends('Dashboard::layouts.master')
@section('breadcrumb')
    <li><a href="#" title="مدیریت کاربران">مدیریت کاربران</a></li>
@endsection
@section('content')

        <div class="row no-gutters  ">
            <div class="col-12 margin-left-9 margin-bottom-15 border-radius-3">
                <p class="box__title">مدیریت کاربران</p>
                <div class="table__box">
                    <table class="table">
                        <thead role="rowgroup">
                        <tr role="row" class="title-row">
                            <th>پروفایل کاربر</th>
                            <th>شناسه کاربر</th>
                            <th>نام و نام خانوادگی کاربر</th>
                            <th>ایمیل کاربر</th>
                            <th>شماره موبایل کاربر</th>
                            <th>تغییر نوع حساب کاربر</th>
                            <th>نوع کاربر</th>
                            <th>تاریخ عضویت</th>
                            <th>تایید ایمیل</th>
                            <td> وضعیت کاربر</td>
                            <td>تغییر وضعیت کاربر</td>
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
                            <td><a href="">{{ $user->phone_number }}</a></td>
                            <td>

                                <a href="" onclick="event.preventDefault(); UpdateUserStatus(event,'{{ route('users.change',$user->id) }}')" class="item-confirm mlg-15" title="مدرس"></a>
                                <a href="" onclick="event.preventDefault(); UpdateUserStatusDelete(event,'{{ route('users.del',$user->id) }}')" class="item-reject mlg-15" title="حذف مدرس"></a>

                            </td>
                            <td>  @if(\mswco\User\Models\User::UserTeacher($user->id) == 'yes') {{ "کاربر مدرس"  }} @else {{ 'کاربر عادی' }}@endif  </td>
                            <td>{{ $user->created_at }}</td>
                            <td>@if($user->email_verified_at)
                                        {!!   "<font color='green'>تایید شده</font>" !!}
                                @else
                                        {!!"<font color='red'>تایید نشده</font>" !!}
                                @endif</td>

                            <td>
                                @if($user->status == 'ban')
                                    {!!   "<font color='red'>مسدود شده</font>" !!}
                                @else
                                    {!!"<font color='green'>آزاد</font>" !!}
                                @endif

                            </td>
                            <td>
                                <a href="" onclick="event.preventDefault(); UpdateUserStatusBan(event,'{{ route('users.ban',$user->id) }}')" class="item-confirm mlg-15" title="مسدود کردن کاربر"></a>
                                <a href="" onclick="event.preventDefault(); UpdateUserStatusUnBan(event,'{{ route('users.unban',$user->id) }}')" class="item-reject mlg-15" title="حذف مسدودیت کاربر"></a>

                            </td>
                            <td>

                                <a href="" onclick="event.preventDefault(); DeleteItem(event,'{{ route('users.delete',$user->id) }}')" class="item-delete mlg-15" title="حذف"></a>
                                <a class="item-edit mlg-15" title="ویرایش" href="{{ route('users.edit',$user->id) }}"></a>
                            </td>
                        </tr>
                        @endforeach


                        </tbody>
                    </table>

                </div>
            </div>
            <a href="{{ route('users.create') }}">   <button class="btn btn-register" style="margin-top: 17px; background-color: #1c8ecf">ساخت کاربر جدید</button></a>
        </div>
@endsection

@push('js')
    <script src="panel/js/jquery-3.4.1.min.js"></script>
    <script src="panel/js/js.js"></script>
    <script src="panel/js/tagsInput.js"></script>
@endpush
<script>
    function UpdateUserStatusBan(event,route) {
        let conf = window.confirm('آیا از مسدود کردن این کاربر اطمینان دارید ؟ پس از مسدودی این کاربر دیگر به هیچ بخش از سایت دسترسی نخواهد داشت!');

        if (conf) {
            $.post(route, {_method: "patch", _token: "{{ csrf_token() }}"})
                .done(function (response) {
                    // event.target.closest('tr').remove();
                    alert('کاربر مورد نظر با موفقیت مسدود شد!');


                    location.reload();
                })
        }
    }

    function UpdateUserStatusUnBan(event,route) {

        let conf = window.confirm('آیا از حذف مسدودیت کاربر اطمینان دارید ؟ ');

        if (conf) {
            $.post(route, {_method: "patch", _token: "{{ csrf_token() }}"})
                .done(function (response) {
                    // event.target.closest('tr').remove();

                    alert('کاربر مورد نظر با موفقیت از لیست مسدودیت سایت خارج شد!');

                    location.reload();
                })
        }
    }

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
        @case('update')
        <script>alert('کاربر مورد نظر با موفقیت ویرایش شد!')</script>
        @break
    @case('created')
        <script>alert('کاربر مورد نظر با موفقیت اضافه شد!')</script>
        @break
    @default

@endswitch
