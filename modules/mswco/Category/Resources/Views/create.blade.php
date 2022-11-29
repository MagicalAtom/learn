<div class="col-4 bg-white">
    <p class="box__title">ایجاد دسته بندی جدید</p>
    <form action=" {{ route('category.store')  }}" method="POST" class="padding-30">
        @csrf
        <input type="text" name="name" placeholder="نام دسته بندی" class="text">
        <input type="text" name="slug" placeholder="نام انگلیسی دسته بندی" class="text">
        <p class="box__title margin-bottom-15">انتخاب دسته پدر</p>
        <select name="parent_id" id="parent_id">
            <option value="">ندارد</option>
            @foreach($all as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        <button class="btn btn-webamooz_net">اضافه کردن</button>
    </form>
</div>
