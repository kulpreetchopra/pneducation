@extends("admin.master")
@section("title","Feachers | PN-Education")
@section("content")

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Feachers</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('admin')}}">Home</a></li>
              <li class="breadcrumb-item active">Feachers</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
        @if(session('message'))
             <p class ="alert alert-success">
                {{session('message')}}
             </p>
          @endif
          @if(session('wmessage'))
             <p class ="alert alert-danger">
                {{session('wmessage')}}
             </p>
          @endif
          @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

<!------------ Data Table---- -->
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Display Feachers</h3>

                <div class="card-tools">
                  <a class="btn btn-info btn-sm" href="" data-toggle="modal" data-target="#exampleModal">Add Feachers</a>
      </div>
              </div>
              <div class="card-body">
                   
              <table id="example1" class="table table-bordered table-hover table-striped table-responsive-sm">
                <thead>
                <tr style="text-align: center;">
                  <th>Id</th>
                  <th>Title</th>
                  <th>Icon</th>
                  <th>About</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($display as $a)
                  <tr style="text-align: center;">
                    <td>{{$a->id}}</td>
                    <td>{{$a->title}}</td>
                    <td>{{$a->icon}}</td>
                    <td>{{$a->about}}</td>
                    <td>
                      <a href="{{url('admin/special_edit/'.$a->id)}}"><p class="btn btn-success"><i class="fas fa-edit"></i></p></a>
                      <a onclick="return confirm('Are you sure to delete?')" href="{{url('admin/special_delete/'.$a->id)}}"><p class="btn btn-danger"><i class="fas fa-trash"></i></p></a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
                <tfoot>
                <tr style="text-align: center;">
                  <th>Id</th>
                  <th>Title</th>
                  <th>Icon</th>
                  <th>About</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>

  <!-- Modal Form -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#17a2b8;color:white">
        <h5 class="modal-title" id="exampleModalLabel">Add Feachers</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
  <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="{{url('admin/special_submit')}}" enctype="multipart/form-data">
      @csrf
    <div class="form-group">
      <label>Title:</label>
      <input type="text" class="form-control" placeholder="Enter Feacher Title" name="title">
    </div>
    <div class="form-group">
      <label>Icon:</label>
      <textarea type="text" class="form-control" placeholder="Enter Icon url" name="icon"></textarea>
    </div>
    <div class="form-group">
      <label>About:</label>
      <textarea type="text" class="form-control" placeholder="Enter Feacher About" name="about"></textarea>
    </div>
    <input type="submit" class="btn btn-primary" name="submit" value="Submit">
  </form>
  <br>
  </div>
    </div>
  </div>
    </div>
<!-- ------End Data Table------- -->
  </div>
  <!-- /.content-wrapper -->

@endsection