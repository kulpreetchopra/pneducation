@extends("admin.master")
@section("title","Edit Coupan | PN-Education")
@section("content")

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Coupan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('admin')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{url('admin/coupan')}}">Coupan</a></li>
              <li class="breadcrumb-item active">Edit Coupan</li>
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
                <h3 class="card-title">Display Coupan</h3>

                <div class="card-tools">
                  <a class="btn btn-info btn-sm" href="{{url('admin/coupan')}}">View Coupan</a>
               </div>
              </div>
              <div class="card-body">
    <!-- /.content-header -->
      <form method="post" action="{{url('admin/coupan_update')}}" enctype="multipart/form-data">
      @csrf
    <input type="hidden" name="id" value="{{$edit->id}}">
    <div class="form-group">
      <label>Coupan_Code:</label>
      <input type="text" class="form-control" placeholder="Enter Coupan Code" name="coupan_code" value="{{$edit->coupan_code}}">
    </div>
    <div class="form-group">
      <label>Amount:</label>
      <input type="text" class="form-control" placeholder="Enter Coupan Amount" name="amount" value="{{$edit->amount}}">
    </div>
    <div class="form-group">
      <label>Amount_Type:</label>
      <select name="amount_type" class="form-control">
        <option value="Fixed" @if($edit->amount_type=="Fixed") selected @endif>Fixed</option>
        <option value="Percentage" @if($edit->amount_type=="Percentage") selected @endif>Percentage</option>
      </select>
    </div>
    <div class="form-group">
      <label>Status:</label>
      <select name="status" class="form-control" value="{{$edit->status}}">
        <option value="1" @if($edit->status=="1") selected @endif>Active</option>
        <option value="0" @if($edit->status=="0") selected @endif>InActive</option>
      </select>
    </div>
    <div class="form-group">
      <label>Expiry_Date:</label>
      <input type="date" class="form-control" name="expiry_date" value="{{$edit->expiry_date}}">
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