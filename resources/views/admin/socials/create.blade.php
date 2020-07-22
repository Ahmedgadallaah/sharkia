@extends('admin.index')
@section('content')

<form action="{{url ('/admin/social/store') }}" method="post" enctype="multipart/form-data">
{{ csrf_field() }}



 <div class="card-body" id="arabic-form">
    <div class="form-group">
        <label class="required" for="link">{{ trans('message.link') }} (Ar)</label>
        <input class="form-control {{ $errors->has('link') ? 'is-invalid' : '' }}" type="text" name="link" id="link" value="{{ old('link', '') }}" required>
        @if($errors->has('link'))
            <div class="invalid-feedback">
                {{ $errors->first('link') }}
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

<button type="submit" class="btn btn-primary">submit</button>

</form>
@endsection
