@extends('admin.index')
@section('content')

<form action="{{url ('/admin/privacy/store') }}" method="post" enctype="multipart/form-data">
{{ csrf_field() }}



 <div class="box box-info">
    <div class="box-header">
      <h3 class="box-title">{{ trans('message.description') }} (EN)</h3>
      <!-- tools box -->
      <div class="pull-right box-tools">
        <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"
                title="Collapse">
          <i class="fa fa-minus"></i></button>

      </div>
      <!-- /. tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body pad">

            <textarea   class="form-control  description{{ $errors->has('en_description') ? 'is-invalid' : '' }}" id="description" name="en_description" rows="10" cols="80" value="{{ old('en_description', '') }}" required></textarea>
            @if($errors->has('en_description'))
            <div class="invalid-feedback">
                {{ $errors->first('en_description') }}
            </div>
        @endif
    </div>

</div>


<div class="box box-info">
    <div class="box-header">
      <h3 class="box-title">{{ trans('message.description') }} (ar)</h3>
      <!-- tools box -->
      <div class="pull-right box-tools">
        <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"
                title="Collapse">
          <i class="fa fa-minus"></i></button>

      </div>
      <!-- /. tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body pad">

            <textarea   class="form-control description {{ $errors->has('ar_description') ? 'is-invalid' : '' }}"  id="description" name="ar_description" rows="10" cols="80" value="{{ old('ar_description', '') }}" required></textarea>
            @if($errors->has('ar_description'))
            <div class="invalid-feedback">
                {{ $errors->first('ar_description') }}
            </div>
        @endif
    </div>

</div>



<button type="submit" class="btn btn-primary">submit</button>

</form>
@endsection
