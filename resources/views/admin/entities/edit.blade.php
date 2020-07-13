@extends('admin.index')
@section('content')

<form action="{{URL::to('/admin/entity/edit/'.$entity->id) }}" method="post" enctype="multipart/form-data" >
    {{ csrf_field() }}


    <div class="card-body" id="english-form">
        <div class="form-group">
            <label class="required" for="en_name">{{ trans('message.name') }} (EN)</label>
            <input class="form-control {{ $errors->has('en_name') ? 'is-invalid' : '' }}" type="text" name="en_name" id="en_name" value="{{$entity->translate('en')->name }}" required>
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
            <input class="form-control {{ $errors->has('ar_name') ? 'is-invalid' : '' }}" type="text" name="ar_name" id="ar_name" value="{{$entity->translate('ar')->name }}" required>
            @if($errors->has('ar_name'))
                <div class="invalid-feedback">
                    {{ $errors->first('ar_name') }}
                </div>
            @endif

        </div>
     </div>

     <div class="card-body" id="arabic-form">

    <div class="form-group">
        <label>type</label>
        <select name="type" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1"  aria-hidden="true">
            <option value="city"  {{ $entity->type == 'city' ? 'selected' : '' }}>{{ trans('message.city') }}</option>
            <option value="company"    {{ $entity->type == 'company' ? 'selected' : '' }} >{{ trans('message.company') }}</option>
            <option value="directorate"   {{ $entity->type == 'directorate' ? 'selected' : '' }} >{{ trans('message.directorate') }}</option>
            <option value="body" {{ $entity->type == 'secretary' ? 'selected' : '' }} >{{ trans('message.secretary') }}</option>




            <option value="body" >{{ trans('message.body') }}</option>
        </select>
      </div>


     </div>


     <div class="card-body" id="arabic-form">
        <img src="{{asset('images/entity/'.$entity->image)}}" style="width:80px;height:80px;">
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
