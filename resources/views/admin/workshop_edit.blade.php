@extends("admin.master")
@section("title","Edit Workshops | PN-Education")
@section("content")

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Workshops</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('admin')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{url('admin/workshop')}}">Workshops</a></li>
              <li class="breadcrumb-item active">Edit Workshops</li>
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
                <h3 class="card-title">Display Workshops</h3>
                <div class="card-tools">
                  <a class="btn btn-info btn-sm" href="{{url('admin/workshop')}}">View Workshops</a>
               </div>
              </div>
              <div class="card-body">
    <!-- /.content-header -->
      <form method="post" action="{{url('admin/workshop_update')}}" enctype="multipart/form-data">
      @csrf
    <input type="hidden" name="id" value="{{$edit->id}}">
    <div class="form-group">
      <label>Workshop Name:</label>
      <select name="title" class="form-control">
        <option value="Rjit College" @if($edit->title=="Rjit College") selected @endif>Rjit College</option>
        <option value="Mpct College" @if($edit->title=="Mpct College") selected @endif>Mpct College</option>
        <option value="Xiaomi MI Company" @if($edit->title=="Xiaomi MI Company") selected @endif>Xiaomi MI Company</option>
        <option value="BentChair Company" @if($edit->title=="BentChair Company") selected @endif>BentChair Company</option>
      </select>
    </div>
    <div class="form-group">
      <label>Image:</label>&nbsp;&nbsp;&nbsp;&nbsp;
      <img src="{{ url('/front/'.$edit->image) }}" style="height: 120px; width: 120px; border-radius: 100%;"><br><br>
      <input type="file" class="form-control" name="image">
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