@extends('admin.index')
@section('content')

<form action="{{URL::to('/admin/news_governer/edit/'.$news->id) }}" method="post" enctype="multipart/form-data" >
    {{ csrf_field() }}


    <div class="card-body" id="english-form">
        <div class="form-group">
            <label class="required" for="en_name">{{ trans('message.name') }} (EN)</label>
            <input class="form-control {{ $errors->has('en_name') ? 'is-invalid' : '' }}" type="text" name="en_name" id="en_name" value="{{$news->translate('en')->name }}" required>
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
            <input class="form-control {{ $errors->has('ar_name') ? 'is-invalid' : '' }}" type="text" name="ar_name" id="ar_name" value="{{$news->translate('ar')->name }}" required>
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
            <input class="form-control {{ $errors->has('en_date') ? 'is-invalid' : '' }}" type="text" name="en_date" id="en_date" value="{{$news->translate('en')->date }}" required>
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
            <input class="form-control {{ $errors->has('ar_date') ? 'is-invalid' : '' }}" type="text" name="ar_date" id="ar_date" value=" {{$news->translate('ar')->date }}" required>
            @if($errors->has('ar_date'))
                <div class="invalid-feedback">
                    {{ $errors->first('ar_date') }}
                </div>
            @endif

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

                <textarea   class="form-control  description{{ $errors->has('en_description') ? 'is-invalid' : '' }}" id="description" name="en_description" rows="10" cols="80" value="" required>{{$news->translate('en')->description }}</textarea>
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

                <textarea   class="form-control description {{ $errors->has('ar_description') ? 'is-invalid' : '' }}"  id="description" name="ar_description" rows="10" cols="80" value="" required>{{$news->translate('ar')->description }}</textarea>
                @if($errors->has('ar_description'))
                <div class="invalid-feedback">
                    {{ $errors->first('ar_description') }}
                </div>
            @endif
        </div>

    </div>



     <div class="card-body" id="arabic-form">
        <img src="{{asset('images/news_governer/'.$news->image)}}" style="width:80px;height:80px;">
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
        <label class="required" for="images">{{ trans('message.images') }}</label>
            <input type="file" class="form-control {{ $errors->has('images') ? 'is-invalid' : '' }}"  name="images[]" id="file" accept="image/*" multiple />
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
