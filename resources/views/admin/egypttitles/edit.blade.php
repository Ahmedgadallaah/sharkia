@extends('admin.index')
@section('content')

<form action="{{URL::to('/admin/egypttitle/edit/'.$title->id) }}" method="post" enctype="multipart/form-data" >
    {{ csrf_field() }}

    <div class="card-body" id="english-form">
        <div class="form-group">
            <label class="required" for="en_name">{{ trans('message.name') }} (EN)</label>
            <input class="form-control {{ $errors->has('en_name') ? 'is-invalid' : '' }}" type="text" name="en_name" id="en_name" value="{{$title->translate('en')->name }}" required>
            @if($errors->has('en_name'))
                <div class="invalid-feedback">
                    {{ $errors->first('en_name') }}
                </div>
            @endif
        </div>
    </div>
    <div class="card-body" id="arabic-form">
        <div class="form-group">
            <label class="required" for="ar_name">{{ trans('message.name') }} (Ar)</label>
            <input class="form-control {{ $errors->has('ar_name') ? 'is-invalid' : '' }}" type="text" name="ar_name" id="ar_name" value="{{$title->translate('ar')->name }}" required>
            @if($errors->has('ar_name'))
                <div class="invalid-feedback">
                    {{ $errors->first('ar_name') }}
                </div>
            @endif
        </div>
    </div>

    <div class="card-body" id="arabic-form">
        <div class="form-group">
            <label class="required" for="pdf">{{ trans('message.pdf') }}</label>
                <input  type="file" class="form-control {{ $errors->has('pdf') ? 'is-invalid' : '' }}"  name="pdf" >
            @if($errors->has('pdf'))
                <div class="invalid-feedback">
                    {{ $errors->first('pdf') }}
                </div>
            @endif
        </div>
     </div>


        <button type="submit" class="btn btn-primary">{{ trans('message.submit') }}</button>


</form>
@endsection
