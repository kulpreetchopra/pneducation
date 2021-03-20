@extends("admin.master")
@section("title","Category | PN-Education")
@section("content")

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Courses</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('admin')}}">Home</a></li>
              <li class="breadcrumb-item active">Courses</li>
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
                <h3 class="card-title">Display Courses</h3>

                <div class="card-tools">
                  <a class="btn btn-info btn-sm" href="" data-toggle="modal" data-target="#exampleModal">Add Course</a>
      </div>
              </div>
              <div class="card-body">
                   
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Price</th>
                  <th>Details</th>
                  <th>Include</th>
                  <th>Containt</th>
                  <th>Image</th>
                  <th>Category</th>
                  <th>Teacher</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($display2 as $a)
                  <tr style="text-align: center;">
                    <td>{{$a->id}}</td>
                    <td>{{$a->c_name}}</td>
                    <td>{{$a->c_discription}}</td>
                    <td>{{$a->c_price}}</td>
                    <td>{{$a->c_details}}</td>
                    <td>{{$a->c_include}}</td>
                    <td>{{$a->c_containt}}</td>
                    <td>
                      <img src="{{ url('/course/'.$a->c_image) }}" style="height: 120px; width: 120px; border-radius: 100%;">
                    </td>
                    <td>{{$a->c_category}}</td>
                    <td>{{$a->c_teacher}}</td>
                    <td>
                      <a href="{{url('admin/course_edit/'.$a->id)}}"><p class="btn btn-success"><i class="fas fa-edit"></i></p></a>
                      <a href="{{url('admin/course_delete/'.$a->id)}}"><p class="btn btn-danger"><i class="fas fa-trash"></i></p></a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Id</th>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Price</th>
                  <th>Details</th>
                  <th>Include</th>
                  <th>Containt</th>
                  <th>Image</th>
                  <th>Category</th>
                  <th>Teacher</th>
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
        <h5 class="modal-title" id="exampleModalLabel">Add Course</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
  <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="{{url('admin/course_submit')}}" enctype="multipart/form-data">
      @csrf
    <div class="form-group">
      <label>Course Name:</label>
      <input type="text" class="form-control" placeholder="Enter Course Name" name="c_name">
    </div>
    <div class="form-group">
      <label>Course Discription:</label>
      <textarea type="text" class="form-control" placeholder="Enter Course Description" name="c_discription"></textarea>
    </div>
    <div class="form-group">
      <label>Course Price:</label>
      <input type="text" class="form-control" placeholder="Enter Course Price" name="c_price">
    </div>
    <div class="form-group">
      <label>Course Details:</label>
      <textarea type="text" class="form-control" placeholder="Enter Course Details" name="c_details"></textarea>
    </div>
    <div class="form-group">
      <label>Course Include:</label>
      <textarea type="text" class="form-control" placeholder="Enter Course Include" name="c_include"></textarea>
    </div>
    <div class="form-group">
      <label>Course Containt:</label>
      <textarea type="text" class="form-control" placeholder="Enter Course Containt" name="c_containt"></textarea>
    </div>
    <div class="form-group">
      <label>Course Image:</label>
      <input type="file" class="form-control" name="c_image">
    </div>
    <div class="form-group">
      <label>Course Category:</label>
      <select name="c_category" class="form-control">
        @foreach($display1 as $category)
        <option value="{{$category->c_name}}">{{$category->c_name}}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <label>Course Teacher:</label>
      <input type="text" class="form-control" placeholder="Enter Course Teacher Name" name="c_teacher">
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