@extends('admin.index')
@section('content')

<form action="{{url ('/admin/employee/store') }}" method="post" enctype="multipart/form-data">
{{ csrf_field() }}

<div class="card-body" id="english-form">
    <div class="form-group">
        <label class="required" for="en_name">{{ trans('message.name') }} (EN)</label>
        <input class="form-control {{ $errors->has('en_name') ? 'is-invalid' : '' }}" type="text" name="en_name" id="en_name" value="{{ old('en_name', '') }}" required>
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
        <input class="form-control {{ $errors->has('ar_name') ? 'is-invalid' : '' }}" type="text" name="ar_name" id="ar_name" value="{{ old('ar_name', '') }}" required>
        @if($errors->has('ar_name'))
            <div class="invalid-feedback">
                {{ $errors->first('ar_name') }}
            </div>
        @endif

    </div>
 </div>



 <div class="card-body" id="arabic-form">
<div class="form-group">
    <label>{{ trans('message.job') }}</label>
    <select name="type" class="form-control select2 select2-hidden-accessible" style="width: 100%;height:auto" data-select2-id="1" tabindex="-1"  aria-hidden="true">
        <option value="governer" >{{ trans('message.governer') }}</option>
        <option value="deputy" >{{ trans('message.deputy') }}</option>
        <option value="Adviser" >{{ trans('message.Adviser') }}</option>
        <option value="secretary" >{{ trans('message.secretary') }}</option>
        <option value="assistant" >{{ trans('message.assistant') }}</option>

    </select>
  </div>
 </div>



 <div class="card-body" id="arabic-form">
    <div class="form-group">
        <label class="required" for="image">{{ trans('message.image') }}</label>
            <input  type="file" class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}"  name="image" accept="image/*" required>
        @if($errors->has('image'))
            <div class="invalid-feedback">
                {{ $errors->first('image') }}
            </div>
        @endif
    </div>
 </div>
 <div class="card-body" id="arabic-form">
    <div class="form-group">
        <label class="required" for="cv">{{ trans('message.cv') }}</label>
            <input  type="file" class="form-control {{ $errors->has('cv') ? 'is-invalid' : '' }}"  name="cv"  required>
        @if($errors->has('cv'))
            <div class="invalid-feedback">
                {{ $errors->first('cv') }}
            </div>
        @endif
    </div>
 </div>


<button type="submit" class="btn btn-primary">{{ trans('message.submit') }}</button>

</form>
@endsection
