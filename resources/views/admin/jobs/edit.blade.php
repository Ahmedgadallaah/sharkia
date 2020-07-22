@extends('admin.index')
@section('content')

<form action="{{URL::to('/admin/job/edit/'.$job->id) }}" method="post" enctype="multipart/form-data" >
    {{ csrf_field() }}


    <div class="card-body" id="english-form">
        <div class="form-group">
            <label class="required" for="en_name">{{ trans('message.name') }} (EN)</label>
            <input class="form-control {{ $errors->has('en_name') ? 'is-invalid' : '' }}" type="text" name="en_name" id="en_name" value="{{$job->translate('en')->name }}" required>
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
            <input class="form-control {{ $errors->has('ar_name') ? 'is-invalid' : '' }}" type="text" name="ar_name" id="ar_name" value="{{$job->translate('ar')->name }}" required>
            @if($errors->has('ar_name'))
                <div class="invalid-feedback">
                    {{ $errors->first('ar_name') }}
                </div>
            @endif

        </div>
     </div>



     <div class="card-body" id="arabic-form">
        <div class="form-group">
            <label class="required" for="link">{{ trans('message.link') }} (Ar)</label>
            <input class="form-control {{ $errors->has('link') ? 'is-invalid' : '' }}" type="text" name="link" id="link" value="{{$job->link }}" required>
            @if($errors->has('link'))
                <div class="invalid-feedback">
                    {{ $errors->first('link') }}
                </div>
            @endif

        </div>
     </div>




        <button type="submit" class="btn btn-primary">{{ trans('message.submit') }}</button>


</form>
@endsection
