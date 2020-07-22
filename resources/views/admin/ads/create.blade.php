@extends('admin.index')
@section('content')

<form action="{{url ('/admin/ad/store') }}" method="post" enctype="multipart/form-data">
{{ csrf_field() }}





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
