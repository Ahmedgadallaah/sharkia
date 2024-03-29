@extends('admin.index')
@section('content')

<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
                <a href="{{url ('/admin/areatitle/create') }}"><button  class="btn btn-primary">{{ trans('message.Add New') }}</button></a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>{{ trans('message.name') }} </th>
                  <th>{{ trans('message.description') }}</th>
                  <th>{{ trans('message.image') }}</th>
                  <th colspan="2"> Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($titles as $title)
                <tr>
                  <td>{{ $title->id }}</td>
                  <td>{{ $title->name }}</td>
                  <th>{{ $title->description  }} </th>
                  <td>
                    <img src="{{asset('images/areatitle/'.$title->image)}}" style="width:80px;height:80px;">
                </td>
                    <td>

                  <a id="delete" class="btn btn-primary" href="{{URL::to('/admin/areatitle/edit/'.$title->id)}} ">
								<i class="halflings-icon white trash"></i>
                            Edit</a>

                            <a id="delete" class="btn btn-success" href="{{URL::to('/admin/areatitle/images/'.$title->id)}} ">
								<i class="halflings-icon white trash"></i>
                            Gallery</a>
                            <a id="delete" class="btn btn-danger" href="{{URL::to('admin/areatitle/delete/'.$title->id)}} ">
								<i class="halflings-icon white trash"></i>
                            x</a>
                        </td>
                </tr>
                @endforeach
                </tbody>
                <span>{{ $titles->links() }}</span>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
@endsection
