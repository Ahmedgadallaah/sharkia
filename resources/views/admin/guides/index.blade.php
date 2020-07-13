@extends('admin.index')
@section('content')

<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
                <a href="{{url ('/admin/guide/create') }}"><button  class="btn btn-primary">{{ trans('message.Add New') }}</button></a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>{{ trans('message.city') }} </th>
                  <th>{{ trans('message.company') }} </th>
                  <th>{{ trans('message.mobile') }} </th>
                  <th>{{ trans('message.address') }} </th>
                  <th colspan="2"> Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($guides as $guide)
                <tr>
                  <td>{{ $guide->id }}</td>
                  <td>{{ $guide->city }}</td>
                  <td>{{ $guide->company }}</td>
                  <td>{{ $guide->mobile }}</td>
                  <td>{{ $guide->address }}</td>
                  <td>

                  <a id="delete" class="btn btn-primary" href="{{URL::to('/admin/guide/edit/'.$guide->id)}} ">
								<i class="halflings-icon white trash"></i>
                            Edit</a>
                            <a id="delete" class="btn btn-danger" href="{{URL::to('admin/guide/delete/'.$guide->id)}} ">
								<i class="halflings-icon white trash"></i>
                            x</a>
                        </td>
                </tr>
                @endforeach
                </tbody>
                <span>{{ $guides->links() }}</span>
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
