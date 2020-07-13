@extends('admin.index')
@section('content')

<form action="{{url ('/admin/guide/store') }}" method="post" enctype="multipart/form-data">
{{ csrf_field() }}

<div class="card-body" id="english-form">
    <div class="form-group">
        <label class="required" for="en_city">{{ trans('message.city') }} (EN)</label>
        <input class="form-control {{ $errors->has('en_city') ? 'is-invalid' : '' }}" type="text" name="en_city" id="en_city" value="{{ old('en_city', '') }}" required>
        @if($errors->has('en_city'))
            <div class="invalid-feedback">
                {{ $errors->first('en_city') }}
            </div>
        @endif

    </div>
</div>

 <div class="card-body" id="arabic-form">
    <div class="form-group">
        <label class="required" for="ar_city">{{ trans('message.city') }} (Ar)</label>
        <input class="form-control {{ $errors->has('ar_city') ? 'is-invalid' : '' }}" type="text" name="ar_city" id="ar_city" value="" required>
        @if($errors->has('ar_city'))
            <div class="invalid-feedback">
                {{ $errors->first('ar_city') }}
            </div>
        @endif

    </div>
 </div>

 <div class="card-body" id="english-form">
    <div class="form-group">
        <label class="required" for="en_company">{{ trans('message.company') }} (EN)</label>
        <input class="form-control {{ $errors->has('en_company') ? 'is-invalid' : '' }}" type="text" name="en_company" id="en_company" value="{{ old('en_company', '') }}" required>
        @if($errors->has('en_company'))
            <div class="invalid-feedback">
                {{ $errors->first('en_company') }}
            </div>
        @endif

    </div>
</div>

 <div class="card-body" id="arabic-form">
    <div class="form-group">
        <label class="required" for="ar_company">{{ trans('message.company') }} (Ar)</label>
        <input class="form-control {{ $errors->has('ar_company') ? 'is-invalid' : '' }}" type="text" name="ar_company" id="ar_company" value="" required>
        @if($errors->has('ar_company'))
            <div class="invalid-feedback">
                {{ $errors->first('ar_company') }}
            </div>
        @endif

    </div>
 </div>


 <div class="card-body" id="english-form">
    <div class="form-group">
        <label class="required" for="en_address">{{ trans('message.address') }} (EN)</label>
        <input class="form-control {{ $errors->has('en_address') ? 'is-invalid' : '' }}" type="text" name="en_address" id="en_address" value="{{ old('en_address', '') }}" required>
        @if($errors->has('en_address'))
            <div class="invalid-feedback">
                {{ $errors->first('en_address') }}
            </div>
        @endif

    </div>
</div>

 <div class="card-body" id="arabic-form">
    <div class="form-group">
        <label class="required" for="ar_address">{{ trans('message.address') }} (Ar)</label>
        <input class="form-control {{ $errors->has('ar_address') ? 'is-invalid' : '' }}" type="text" name="ar_address" id="ar_address" value="" required>
        @if($errors->has('ar_address'))
            <div class="invalid-feedback">
                {{ $errors->first('ar_address') }}
            </div>
        @endif

    </div>
 </div>



 <div class="card-body" id="english-form">
    <div class="form-group">
        <label class="required" for="member_num">{{ trans('message.member Num') }} (EN)</label>
        <input class="form-control {{ $errors->has('member_num') ? 'is-invalid' : '' }}" type="text" name="member_num" id="member_num" value="{{ old('member_num', '') }}" required>
        @if($errors->has('member_num'))
            <div class="invalid-feedback">
                {{ $errors->first('member_num') }}
            </div>
        @endif

    </div>
</div>

 <div class="card-body" id="arabic-form">
    <div class="form-group">
        <label class="required" for="mobile">{{ trans('message.mobile') }} (Ar)</label>
        <input class="form-control {{ $errors->has('mobile') ? 'is-invalid' : '' }}" type="text" name="mobile" id="mobile" value="" required>
        @if($errors->has('mobile'))
            <div class="invalid-feedback">
                {{ $errors->first('mobile') }}
            </div>
        @endif

    </div>
 </div>


 <div class="card-body" id="arabic-form">
    <div class="form-group">
        <label class="required" for="fax">{{ trans('message.fax') }} (Ar)</label>
        <input class="form-control {{ $errors->has('fax') ? 'is-invalid' : '' }}" type="text" name="fax" id="fax" value="" required>
        @if($errors->has('fax'))
            <div class="invalid-feedback">
                {{ $errors->first('fax') }}
            </div>
        @endif

    </div>
 </div>



<button type="submit" class="btn btn-primary">{{ trans('message.submit') }}</button>

</form>
@endsection
