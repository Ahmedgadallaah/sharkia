@extends('admin.index')
@section('content')

<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
                <a href="{{url ('/admin/servurgent/create') }}"><button  class="btn btn-primary">{{ trans('message.Add New') }}</button></a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>{{ trans('message.name') }} </th>



                  <th colspan="2"> Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($servurgents as $servurgent)
                <tr>
                    <td>{{ $servurgent->id }}</td>
                    <td>{{ $servurgent->name }}</td>

                    <td><a id="delete" class="btn btn-primary" href="{{URL::to('/admin/servurgent/edit/'.$servurgent->id)}} ">
								<i class="halflings-icon white trash"></i>
                            Edit</a>
                            <a id="delete" class="btn btn-danger" href="{{URL::to('admin/servurgent/delete/'.$servurgent->id)}} ">
								<i class="halflings-icon white trash"></i>
                            x</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
                <span>{{ $servurgents->links() }}</span>
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
