@extends('admin.index')
@section('content')

<form action="{{URL::to('/admin/video/edit/'.$video->id) }}" method="post" enctype="multipart/form-data" >
    {{ csrf_field() }}


    <div class="card-body" id="english-form">
        <div class="form-group">
            <label class="required" for="video">{{ trans('message.name') }} (EN)</label>
            <input class="form-control {{ $errors->has('video') ? 'is-invalid' : '' }}" type="text" name="video" id="video" value="{{$video->video }}" required>
            @if($errors->has('video'))
                <div class="invalid-feedback">
                    {{ $errors->first('video') }}
                </div>
            @endif

        </div>
    </div>


        <button type="submit" class="btn btn-primary">{{ trans('message.submit') }}</button>


</form>
@endsection
