@extends('admin.index')
@section('content')

<form action="{{URL::to('/admin/areatitle/edit/'.$title->id) }}" method="post" enctype="multipart/form-data" >
    {{ csrf_field() }}


    <div class="card-body" id="english-form">
        <div class="form-group">
            <label class="required" for="en_name">{{ trans('message.name') }} (EN)</label>
            <input class="form-control {{ $errors->has('en_name') ? 'is-invalid' : '' }}" type="text" name="en_name" id="en_name" value="{{$title->translate('en')->name }}" >
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
            <input class="form-control {{ $errors->has('ar_name') ? 'is-invalid' : '' }}" type="text" name="ar_name" id="ar_name" value="{{$title->translate('ar')->name }}" >
            @if($errors->has('ar_name'))
                <div class="invalid-feedback">
                    {{ $errors->first('ar_name') }}
                </div>
            @endif

        </div>
     </div>




     <div class="card-body" id="arabic-form">
        <div class="form-group" >
          <label class="required" for="category-title">{{ trans('message.area') }} </label>

          <select name="invest_area_id" style="width:100%">
            @foreach($areas as $area)
            <option value="{{$area->id}}" >{{$area->name}}</option>
          @endforeach
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

                <textarea   class="form-control  description{{ $errors->has('en_description') ? 'is-invalid' : '' }}" id="description" name="en_description" rows="10" cols="80" value="{{ old('en_description', '') }}" required>{{$title->translate('en')->description }}</textarea>
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

                <textarea   class="form-control description {{ $errors->has('ar_description') ? 'is-invalid' : '' }}"  id="description" name="ar_description" rows="10" cols="80" value="{{ old('ar_description', '') }}" required>{{$title->translate('ar')->description }}</textarea>
                @if($errors->has('ar_description'))
                <div class="invalid-feedback">
                    {{ $errors->first('ar_description') }}
                </div>
            @endif
        </div>

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

    <div class="card-body" id="arabic-form">
        <div class="form-group">
            <label class="required" for="images">{{ trans('message.gallery') }}</label>
                <input  type="file" class="form-control {{ $errors->has('images') ? 'is-invalid' : '' }}"  name="images[]" multiple accept="image/*" required>
            @if($errors->has('images'))
                <div class="invalid-feedback">
                    {{ $errors->first('images') }}
                </div>
            @endif
        </div>
     </div>


        <button type="submit" class="btn btn-primary">{{ trans('message.submit') }}</button>


</form>
@endsection
