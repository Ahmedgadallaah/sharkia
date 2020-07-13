@extends('admin.index')
@section('content')

<form action="{{URL::to('/admin/governer/edit/'.$governer->id) }}" method="post" enctype="multipart/form-data" >
    {{ csrf_field() }}


    <div class="card-body" id="english-form">
        <div class="form-group">
            <label class="required" for="en_name">{{ trans('message.name') }} (EN)</label>
            <input class="form-control {{ $errors->has('en_name') ? 'is-invalid' : '' }}" type="text" name="en_name" id="en_name" value="{{$governer->translate('en')->name }}" required>
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
            <input class="form-control {{ $errors->has('ar_name') ? 'is-invalid' : '' }}" type="text" name="ar_name" id="ar_name" value="{{$governer->translate('ar')->name }}" required>
            @if($errors->has('ar_name'))
                <div class="invalid-feedback">
                    {{ $errors->first('ar_name') }}
                </div>
            @endif

        </div>
     </div>


     <div class="card-body" id="english-form">
        <div class="form-group">
            <label class="required" for="en_date">{{ trans('message.date') }} (EN)</label>
            <input class="form-control {{ $errors->has('en_date') ? 'is-invalid' : '' }}" type="text" name="en_date" id="en_date" value="{{$governer->translate('en')->date }}" required>
            @if($errors->has('en_date'))
                <div class="invalid-feedback">
                    {{ $errors->first('en_date') }}
                </div>
            @endif

        </div>
    </div>

     <div class="card-body" id="arabic-form">
        <div class="form-group">
            <label class="required" for="ar_date">{{ trans('message.date') }} (Ar)</label>
            <input class="form-control {{ $errors->has('ar_date') ? 'is-invalid' : '' }}" type="text" name="ar_date" id="ar_date" value="{{$governer->translate('ar')->date }}" required>
            @if($errors->has('ar_date'))
                <div class="invalid-feedback">
                    {{ $errors->first('ar_date') }}
                </div>
            @endif

        </div>
     </div>

     <div class="card-body" id="arabic-form">
        <img src="{{asset('images/governer/'.$governer->image)}}" style="width:80px;height:80px;">
    </div>

    <div class="card-body" id="arabic-form">
        <div class="form-group">
            <label class="required" for="image">{{ trans('message.image') }}</label>
                <input  type="file" class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}"  name="image" accept="image/*" >
            @if($errors->has('image'))
                <div class="invalid-feedback">
                    {{ $errors->first('image') }}
                </div>
            @endif
        </div>
    </div>



        <button type="submit" class="btn btn-primary">{{ trans('message.submit') }}</button>


</form>
@endsection
