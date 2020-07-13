@extends('admin.index')
@section('content')

<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
                <a href="{{url ('/admin/egypttitle/create') }}"><button  class="btn btn-primary">{{ trans('message.Add New') }}</button></a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>{{ trans('message.name') }}</th>
                  <th>{{ trans('message.file') }}</th>
                  <th colspan="2"> Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($titles as $title)
                <tr>
                  <td>{{ $title->id }}</td>
                  <td>{{ $title->name }}</td>


                <td><p><a href="{{asset('images/invest_egypttitle/'.$title->pdf)}}">{{$title->pdf}} </a></p></td>

                  <td>

                  <a id="delete" class="btn btn-primary" href="{{URL::to('/admin/egypttitle/edit/'.$title->id)}} ">
								<i class="halflings-icon white trash"></i>
                            Edit</a>
                            <a id="delete" class="btn btn-danger" href="{{URL::to('admin/egypttitle/delete/'.$title->id)}} ">
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
