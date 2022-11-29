@extends('Dashboard::layouts.master')
@section('breadcrumb')
    <li><a href="#" title="نقش های کاربری">نقش های کاربری</a></li>
@endsection
@section('content')

        <div class="row no-gutters  ">
            <div class="col-8 margin-left-10 margin-bottom-15 border-radius-3">
                <p class="box__title">نقش های کاربری</p>
                <div class="table__box">
                    <table class="table">
                        <thead role="rowgroup">
                        <tr role="row" class="title-row">
                            <th>شناسه</th>
                            <th>نام نقش کاربری</th>
                            <th>مجوز ها</th>
                            <th>مجوز ها</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $roles as $role)

                        <tr role="row" class="">
                            <td><a href="">{{ $role->id }}</a></td>
                            <td><a href="">{{ $role->name }}</a></td>
                            <td>
                                <ul>
                                    @foreach( $role->permissions  as $permission)
<li>{{ $permission->name }}</li>

                                    @endforeach
                                </ul>
                            </td>
                            <td>
                                <a href="" onclick="event.preventDefault(); DeleteItem(event,'{{ route('role.destroy',$role->id) }}')" class="item-delete mlg-15" title="حذف"></a>
                                <a href="{{ route('role.edit',$role->id) }}" class="item-edit " title="ویرایش"></a>
                            </td>
                        </tr>
                        @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
            @include('Role::create')
        </div>
@endsection
@push('js')
    <script src="panel/js/jquery-3.4.1.min.js"></script>
    <script src="panel/js/js.js"></script>
    <script src="panel/js/tagsInput.js"></script>
@endpush
<script>
    function DeleteItem(event,route){
let conf = window.confirm('آیا از حذف این دسته بندی اطمینان دارید ؟');
if (conf){
$.post(route,{ _method: "delete", _token:"{{ csrf_token() }}"})
    .done(function (response){
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
    <script> alert('دسته بندی مورد نظر با موفقیت ویرایش شد') </script>
    @break
    @default
    {{}}
@endswitch
