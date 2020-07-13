@extends('admin.index')
@section('content')

<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
                <a href="{{url ('/admin/egyptmap/create') }}">
                    {{-- <button  class="btn btn-primary">{{ trans('message.Add New') }}</button> --}}
                </a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>{{ trans('message.description') }} </th>
                  <th colspan="2"> Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($maps as $map)
                <tr>
                  <td>{{ $map->id }}</td>
                  <td>{{ $map->description }}</td>

                   <td>

                  <a id="delete" class="btn btn-primary" href="{{URL::to('/admin/egyptmap/edit/'.$map->id)}} ">
								<i class="halflings-icon white trash"></i>
                            Edit</a>
                            {{-- <a id="delete" class="btn btn-danger" href="{{URL::to('admin/egyptmap/delete/'.$map->id)}} ">
								<i class="halflings-icon white trash"></i>
                            x</a> --}}
                        </td>
                </tr>
                @endforeach
                </tbody>
                <span>{{ $maps->links() }}</span>
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
