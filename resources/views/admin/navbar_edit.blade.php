@extends("admin.master")
@section("title","Edit Navbar | PN-Education")
@section("content")

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Navbar & Footer</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('admin')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{url('admin/navbar')}}">Navbar</a></li>
              <li class="breadcrumb-item active">Edit Navbar</li>
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
                <h3 class="card-title">Edit Navbar & Footer</h3>
                <div class="card-tools">
                  <a class="btn btn-info btn-sm" href="{{url('admin/navbar')}}">View Navbar & Footer</a>
               </div>
              </div>
              <div class="card-body">
    <!-- /.content-header -->
      <form method="post" action="{{url('admin/navbar_update')}}" enctype="multipart/form-data">
      @csrf
    <input type="hidden" name="id" value="{{$edit->id}}">
    <div class="form-group">
      <label>Contact:</label>
      <input type="tel" class="form-control" name="contact" value="{{$edit->contact}}">
    </div>
    <div class="form-group">
      <label>Email:</label>
      <input type="email" class="form-control" name="email" value="{{$edit->email}}">
    </div>
    <div class="form-group">
      <label>Logo:</label>&nbsp;&nbsp;&nbsp;&nbsp;
      <img src="{{ url('/front/'.$edit->logo) }}" style="height: 120px; width: 120px; border-radius: 100%;"><br><br>
      <input type="file" class="form-control" name="logo">
    </div>
    <div class="form-group">
      <label>About:</label>
      <textarea type="text" class="form-control" placeholder="Enter About" name="about">{{$edit->about}}</textarea>
    </div>
    <div class="form-group">
      <label>Address:</label>
      <textarea type="text" class="form-control" name="address">{{$edit->address}}</textarea>
    </div>
    <div class="form-group">
      <label>Facebook Url:</label>
      <input type="text" class="form-control" placeholder="Enter Facebook Url" name="facebook" value="{{$edit->facebook}}">
    </div>
    <div class="form-group">
      <label>Twitter Url:</label>
      <input type="text" class="form-control" placeholder="Enter Twitter Url" name="twitter" value="{{$edit->twitter}}">
    </div>
    <div class="form-group">
      <label>Instagram Url:</label>
      <input type="text" class="form-control" placeholder="Enter Instagram Url" name="instagram" value="{{$edit->instagram}}">
    </div>
    <div class="form-group">
      <label>Linkedin Url:</label>
      <input type="text" class="form-control" placeholder="Enter linkedin Url" name="linkedin" value="{{$edit->linkedin}}">
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