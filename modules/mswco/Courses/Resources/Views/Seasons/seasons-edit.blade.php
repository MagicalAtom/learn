@extends('Dashboard::layouts.master')
@section('breadcrumb')
    <li><a href="#" title="جزئیات دوره">جزئیات دوره</a></li>
@endsection
@section('content')

    <div class="col-12 bg-white margin-bottom-15 border-radius-3">
        <p class="box__title">سرفصل ها</p>
        <form action="{{ route('seasons.update',$season->id)  }}" method="post" class="padding-30">
            @csrf
@method('PUT')
            <input name="name" type="text" placeholder="عنوان سرفصل" value="{{ $season->name  }}" class="text">
            <input name="number" type="text" placeholder="شماره سرفصل" class="text" value="{{ $season->number  }}">
            <button class="btn btn-webamooz_net">ویرایش</button>
        </form>
    </div>
@endsection
@push('js')
    <script src="panel/js/jquery-3.4.1.min.js"></script>
    <script src="panel/js/js.js"></script>
    <script src="panel/js/tagsInput.js"></script>
@endpush
