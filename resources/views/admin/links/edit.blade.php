@extends('admin.index')
@section('content')

<form action="{{URL::to('/admin/link/edit/'.$link->id) }}" method="post" enctype="multipart/form-data" >
    {{ csrf_field() }}




     <div class="card-body" id="arabic-form">
        <div class="form-group">
            <label class="required" for="link">{{ trans('message.link') }} (Ar)</label>
            <input class="form-control {{ $errors->has('link') ? 'is-invalid' : '' }}" type="text" name="link" id="link" value="{{$link->link }}" required>
            @if($errors->has('link'))
                <div class="invalid-feedback">
                    {{ $errors->first('link') }}
                </div>
            @endif

        </div>
     </div>


     <div class="card-body" id="arabic-form">
        <img src="{{asset('images/link/'.$link->image)}}" style="width:80px;height:80px;">
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

        <button type="submit" class="btn btn-primary">{{ trans('message.submit') }}</button>


</form>
@endsection
