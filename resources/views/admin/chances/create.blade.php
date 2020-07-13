@extends('admin.index')
@section('content')

<form action="{{url ('/admin/chance/store') }}" method="post" enctype="multipart/form-data">
{{ csrf_field() }}




 <div class="card-body" id="arabic-form">
    <div class="form-group">
        <label class="required" for="pdf">{{ trans('message.pdf') }}</label>
            <input  type="file" class="form-control {{ $errors->has('pdf') ? 'is-invalid' : '' }}"  name="pdf"  required>
        @if($errors->has('pdf'))
            <div class="invalid-feedback">
                {{ $errors->first('pdf') }}
            </div>
        @endif
    </div>
 </div>

<button type="submit" class="btn btn-primary">submit</button>

</form>
@endsection
