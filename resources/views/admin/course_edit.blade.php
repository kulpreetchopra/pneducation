@extends("admin.master")
@section("title","Edit Course | PN-Education")
@section("content")

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Courses</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('admin')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{url('admin/course')}}">Course</a></li>
              <li class="breadcrumb-item active">Edit Courses</li>
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
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Display Courses</h3>
                <div class="card-tools">
                  <a class="btn btn-info btn-sm" href="{{url('admin/course')}}">View Course</a>
               </div>
              </div>
              <div class="card-body">
    <!-- /.content-header -->
      <form method="post" action="{{url('admin/course_update')}}" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="id" value="{{$edit->id}}">
      <div class="form-group">
      <label>Course Name:</label>
      <input type="text" class="form-control" placeholder="Enter Course Name" name="c_name" value="{{$edit->c_name}}">
    </div>
    <div class="form-group">
      <label>Course Discription:</label>
      <textarea type="text" class="form-control" placeholder="Enter Course Description" name="c_discription">{{$edit->c_discription}}</textarea>
    </div>
    <div class="form-group">
      <label>Course Price:</label>
      <input type="text" class="form-control" placeholder="Enter Course Price" name="c_price" value="{{$edit->c_price}}">
    </div>
    <div class="form-group">
      <label>Course Details:</label>
      <textarea type="text" class="form-control" placeholder="Enter Course Details" name="c_details">{{$edit->c_details}}</textarea>
    </div>
    <div class="form-group">
      <label>Course Include:</label>
      <textarea type="text" class="form-control" placeholder="Enter Course Include" name="c_include">{{$edit->c_include}}</textarea>
    </div>
    <div class="form-group">
      <label>Course Containt:</label>
      <textarea type="text" class="form-control" placeholder="Enter Course Containt" name="c_containt">{{$edit->c_containt}}</textarea>
    </div>
    <div class="form-group">
      <label>Course Image:</label>&nbsp;&nbsp;&nbsp;&nbsp;
      <img src="{{ url('/course/'.$edit->c_image) }}" style="height: 120px; width: 120px; border-radius: 100%;"><br><br>
      <input type="file" class="form-control" name="c_image">
    </div>
    <div class="form-group">
      <label>Course Category:</label>
      <select name="c_category" class="form-control">
        @foreach($display1 as $category)
        <option value="{{$category->c_name}}" @if($edit->c_category==$category->c_name) selected @endif>{{$category->c_name}}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <label>Course Teacher:</label>
      <input type="text" class="form-control" name="c_teacher" value="{{$edit->c_teacher}}">
    </div>
      <input type="submit" class="btn btn-success" name="submit" value="Update">
  </form>
  <br>
  </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
  </div>
<!-- ------End Data Table------- -->
  </div>
  <!-- /.content-wrapper -->

@endsection