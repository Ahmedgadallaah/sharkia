@extends('admin.index')
@section('content')

<form action="{{URL::to('/admin/servurgent/edit/'.$servurgent->id) }}" method="post" enctype="multipart/form-data" >
    {{ csrf_field() }}


    <div class="card-body" id="english-form">
        <div class="form-group">
            <label class="required" for="en_name">{{ trans('message.name') }} (EN)</label>
            <input class="form-control {{ $errors->has('en_name') ? 'is-invalid' : '' }}" type="text" name="en_name" id="en_name" value="{{$servurgent->translate('en')->name }}" required>
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
            <input class="form-control {{ $errors->has('ar_name') ? 'is-invalid' : '' }}" type="text" name="ar_name" id="ar_name" value="{{$servurgent->translate('ar')->name }}" required>
            @if($errors->has('ar_name'))
                <div class="invalid-feedback">
                    {{ $errors->first('ar_name') }}
                </div>
            @endif

        </div>
     </div>


     <div class="card-body" id="arabic-form">
        <div class="form-group">
            <label>{{ trans('message.category') }}</label>
            <select name="type" class="form-control select2 select2-hidden-accessible" style="width: 100%;height:auto;" data-select2-id="1" tabindex="-1"  aria-hidden="true">
                <option value="urgent"  {{ $servurgent->type == 'urgent'  ? 'selected' : '' }} >{{ trans('message.urgent') }}</option>
                <option value="traffic" {{ $servurgent->type == 'traffic' ? 'selected' : '' }} >{{ trans('message.traffic') }}</option>
                <option value="health"  {{ $servurgent->type == 'health'  ? 'selected' : '' }}>{{ trans('message.health') }}</option>
                <option value="paper"   {{ $servurgent->type == 'paper'   ? 'selected' : '' }}>{{ trans('message.paper') }}</option>
            </select>
          </div>
         </div>


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

                <textarea   class="form-control  description{{ $errors->has('en_description') ? 'is-invalid' : '' }}" id="description" name="en_description" rows="10" cols="80" value="{{ old('en_description', '') }}" required>{{$servurgent->translate('en')->description }}</textarea>
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

                <textarea   class="form-control description {{ $errors->has('ar_description') ? 'is-invalid' : '' }}"  id="description" name="ar_description" rows="10" cols="80" value="{{ old('ar_description', '') }}" required>{{$servurgent->translate('ar')->description }}</textarea>
                @if($errors->has('ar_description'))
                <div class="invalid-feedback">
                    {{ $errors->first('ar_description') }}
                </div>
            @endif
        </div>

    </div>





        <button type="submit" class="btn btn-primary">{{ trans('message.submit') }}</button>


</form>
@endsection
