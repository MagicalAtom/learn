<div class="col-12 bg-white margin-bottom-15 border-radius-3">
    <p class="box__title">سرفصل ها</p>
    <form action="{{ route('seasons.store',$course->id)  }}" method="post" class="padding-30">
        @csrf
        <input name="name" type="text" placeholder="عنوان سرفصل" class="text">
        <input name="number" type="text" placeholder="شماره سرفصل" class="text">
        <button class="btn btn-webamooz_net">اضافه کردن</button>
    </form>
    <div class="table__box padding-30">
        <table class="table">
            <thead role="rowgroup">
            <tr role="row" class="title-row">
                <th class="p-r-90">شناسه</th>
                <th>عنوان فصل</th>
                <th>وضعیت</th>
                <th>عملیات</th>
            </tr>
            </thead>
            <tbody>
          @foreach($course->seasons as $season)

              <tr role="row" class="">
                  <td><a href="">{{ $season->id  }}</a></td>
                  <td><a href="">{{ $season->name }}</a></td>
                  <td><a href="">@if($season->confirmation_status == 'accepted')
                              {{ "تایید شده" }}
                          @elseif($season->confirmation_status == 'pending')
                              {{ "در انتظار تایید" }}
                          @else
                                     {{ "رد شده"  }}
                          @endif</a></td>
                  <td>
                      <a href="" onclick="event.preventDefault(); DeleteItem(event,'{{ route('seasons.destroy',$season->id) }}')" class="item-delete mlg-15" title="حذف"></a>
                      <a href="" onclick="event.preventDefault(); UpdateConfirmationStatus(event,'{{ route('seasons.accept',$season->id) }}')" class="item-confirm mlg-15" title="تایید"></a>
                      <a href="" class="item-reject mlg-15" title="رد" onclick="event.preventDefault(); UpdateConfirmationStatusRejected(event,'{{ route('seasons.reject',$season->id) }}')"></a>
                      <a href="{{ route('seasons.edit',$season->id) }}" class="item-edit " title="ویرایش"></a>
                  </td>
              </tr>


          @endforeach
            </tbody>
        </table>
    </div>
</div>
<script>

    function DeleteItem(event,route) {
        let conf = window.confirm('آیا از حذف این سرفصل مطمئن هستید ؟');
        if (conf) {
            $.post(route, {_method: "delete", _token: "{{ csrf_token() }}"})
                .done(function (response) {
                    event.target.closest('tr').remove();
                    alert('سرفصل مورد نظر شما با موفقیت حذف شد')
                })
                .fail(function (response) {

                })
        }
    }

    function UpdateConfirmationStatus(event,route) {

        let conf = window.confirm('آیا از تایید این سرفصل اطمینان دارید ؟');
        if (conf) {
            $.post(route, {_method: "patch", _token: "{{ csrf_token() }}"})
                .done(function (response) {
                    // event.target.closest('tr').remove();
                    alert('سرفصل مورد نظر با موفقیت تایید شد . ')
                    location.reload();
                })
        }
    }

    function UpdateConfirmationStatusRejected(event,route) {

        let conf = window.confirm('آیا از رد این سرفصل اطمینان دارید ؟');
        if (conf) {
            $.post(route, {_method: "patch", _token: "{{ csrf_token() }}"})
                .done(function (response) {
                    // event.target.closest('tr').remove();
                    alert('سرفصل مورد نظر با موفقیت رد شد . ')
                    location.reload();
                })
        }
    }

</script>

