@extends('admin.index')
@section('content')

<form action="{{URL::to('/admin/shaflag/edit/'.$shaflag->id) }}" method="post" enctype="multipart/form-data" >
    {{ csrf_field() }}


    <div class="card-body" id="english-form">
        <div class="form-group">
            <label class="required" for="en_name">{{ trans('message.name') }} (EN)</label>
            <input class="form-control {{ $errors->has('en_name') ? 'is-invalid' : '' }}" type="text" name="en_name" id="en_name" value="{{$shaflag->translate('en')->name }}" required>
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
            <input class="form-control {{ $errors->has('ar_name') ? 'is-invalid' : '' }}" type="text" name="ar_name" id="ar_name" value="{{$shaflag->translate('ar')->name }}" required>
            @if($errors->has('ar_name'))
                <div class="invalid-feedback">
                    {{ $errors->first('ar_name') }}
                </div>
            @endif

        </div>
     </div>

     <div class="card-body" id="arabic-form">
        <div class="form-group" >
          <label class="required" for="category-title">{{ trans('message.category') }} </label>

          <select name="shaflagcat_id" style="width:100%">
            @foreach($shaflagcats as $shaflagcat)
            <option value="{{$shaflagcat->id}}"  {{ $shaflag->shaflagcat_id == $shaflagcat->id ? 'selected' : '' }}>{{$shaflagcat->name}}</option>
          @endforeach
          </select>
        </div>
    </div>




     <div class="card-body" id="arabic-form">
        <img src="{{asset('images/'.$shaflag->image)}}" style="width:80px;height:80px;">
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
