<div class="col-4 bg-white">
    <p class="box__title"> ایجاد نقش کاربری جدید</p>
    <form action=" {{ route('role.store')  }}" method="POST" class="padding-30">
        @csrf
        <input type="text" name="name" placeholder="نام مجوز" class="text">
        @error('name')
        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
        @enderror
        <p class="box__title margin-bottom-15">انتخاب مجوز</p>
        @foreach($permission as $per)

    <label class="ui-checkbox" style="padding-top: 10px">
        <input name="permission[{{ $per->name }}]" value="true" class="sub-checkbox" type="checkbox"
               data-id="{{  $per->id  }}"
@if(is_array(old('permissions')) && array_key_exists($per->name,old('permission'))) checked @endif

        >
        <span class="checkmark"></span>
        @lang($per->name)
    </label>
        @endforeach

        <button class="btn btn-webamooz_net" style="margin-top: 17px">اضافه کردن</button>
    </form>
    @error('permission')
    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
    @enderror

</div>
