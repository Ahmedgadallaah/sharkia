@extends('admin.index')
@section('content')

<form action="{{url ('/admin/video/store') }}" method="post" enctype="multipart/form-data">
{{ csrf_field() }}

<div class="card-body" id="english-form">
    <div class="form-group">
        <label class="required" for="en_video">{{ trans('message.video') }} (EN)</label>
        <input class="form-control {{ $errors->has('video') ? 'is-invalid' : '' }}" type="text" name="video" id="video" value="{{ old('video', '') }}" required>
        @if($errors->has('video'))
            <div class="invalid-feedback">
                {{ $errors->first('video') }}
            </div>
        @endif

    </div>
</div>

<button type="submit" class="btn btn-primary">submit</button>

</form>
@endsection
