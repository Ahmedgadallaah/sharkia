@extends('admin.index')
@section('content')

<form action="{{url ('/admin/governer/store') }}" method="post" enctype="multipart/form-data">
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
        <input class="form-control {{ $errors->has('ar_name') ? 'is-invalid' : '' }}" type="text" name="ar_name" id="ar_name" value="" required>
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
        <input class="form-control {{ $errors->has('en_date') ? 'is-invalid' : '' }}" type="text" name="en_date" id="en_date" value="{{ old('en_date', '') }}" required>
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
        <input class="form-control {{ $errors->has('ar_date') ? 'is-invalid' : '' }}" type="text" name="ar_date" id="ar_date" value=" {{ old('ar_date', '') }}" required>
        @if($errors->has('ar_date'))
            <div class="invalid-feedback">
                {{ $errors->first('ar_date') }}
            </div>
        @endif

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

<button type="submit" class="btn btn-primary">{{ trans('message.submit') }}</button>

</form>
@endsection
