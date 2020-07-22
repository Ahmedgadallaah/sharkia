@extends('admin.index')
@section('content')

<form action="{{URL::to('/admin/slider/edit/'.$slider->id) }}" method="post" enctype="multipart/form-data" >
    {{ csrf_field() }}





     <div class="card-body" id="english-form">
        <div class="form-group">
            <label class="required" for="en_name1">{{ trans('message.name') }} (EN)</label>
            <input class="form-control {{ $errors->has('en_name1') ? 'is-invalid' : '' }}" type="text" name="en_name1" id="en_name1" value="{{$slider->translate('en')->name1 }}" required>
            @if($errors->has('en_name1'))
                <div class="invalid-feedback">
                    {{ $errors->first('en_name1') }}
                </div>
            @endif

        </div>
    </div>

     <div class="card-body" id="arabic-form">
        <div class="form-group">
            <label class="required" for="ar_name1">{{ trans('message.name') }} (Ar)</label>
            <input class="form-control {{ $errors->has('ar_name1') ? 'is-invalid' : '' }}" type="text" name="ar_name1" id="ar_name1" value="{{$slider->translate('ar')->name1 }}" required>
            @if($errors->has('ar_name1'))
                <div class="invalid-feedback">
                    {{ $errors->first('ar_name1') }}
                </div>
            @endif

        </div>
     </div>


     <div class="card-body" id="english-form">
        <div class="form-group">
            <label class="required" for="en_name2">{{ trans('message.name') }} (EN)</label>
            <input class="form-control {{ $errors->has('en_name2') ? 'is-invalid' : '' }}" type="text" name="en_name2" id="en_name2" value="{{$slider->translate('en')->name2 }}" required>
            @if($errors->has('en_name2'))
                <div class="invalid-feedback">
                    {{ $errors->first('en_name2') }}
                </div>
            @endif

        </div>
    </div>

     <div class="card-body" id="arabic-form">
        <div class="form-group">
            <label class="required" for="ar_name2">{{ trans('message.name') }} (Ar)</label>
            <input class="form-control {{ $errors->has('ar_name2') ? 'is-invalid' : '' }}" type="text" name="ar_name2" id="ar_name2" value="{{$slider->translate('ar')->name2 }}" required>
            @if($errors->has('ar_name2'))
                <div class="invalid-feedback">
                    {{ $errors->first('ar_name2') }}
                </div>
            @endif

        </div>
     </div>


     <div class="card-body" id="english-form">
        <div class="form-group">
            <label class="required" for="en_name3">{{ trans('message.name') }} (EN)</label>
            <input class="form-control {{ $errors->has('en_name3') ? 'is-invalid' : '' }}" type="text" name="en_name3" id="en_name3" value="{{$slider->translate('en')->name3 }}" required>
            @if($errors->has('en_name3'))
                <div class="invalid-feedback">
                    {{ $errors->first('en_name3') }}
                </div>
            @endif

        </div>
    </div>

     <div class="card-body" id="arabic-form">
        <div class="form-group">
            <label class="required" for="ar_name3">{{ trans('message.name') }} (Ar)</label>
            <input class="form-control {{ $errors->has('ar_name3') ? 'is-invalid' : '' }}" type="text" name="ar_name3" id="ar_name3" value="{{$slider->translate('ar')->name3 }}" required>
            @if($errors->has('ar_name3'))
                <div class="invalid-feedback">
                    {{ $errors->first('ar_name3') }}
                </div>
            @endif

        </div>
     </div>







     <div class="card-body" id="arabic-form">
        <img src="{{asset('images/slider/'.$slider->image)}}" style="width:80px;height:80px;">
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
