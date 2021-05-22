@extends("admin.master")
@section("title","Coupan | PN-Education")
@section("content")

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Coupan <a href="{{url('admin/print/coupan')}}"><p class="btn btn-info"><i class="fas fa-print"></i> Print To PDF</p></a></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('admin')}}">Home</a></li>
              <li class="breadcrumb-item active">Coupan</li>
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
                <h3 class="card-title">Display Coupan</h3>

                <div class="card-tools">
                  <a class="btn btn-info btn-sm" href="" data-toggle="modal" data-target="#exampleModal">Add Coupan</a>
      </div>
              </div>
              <div class="card-body">
                   
              <table id="example1" class="table table-bordered table-hover table-striped table-responsive-sm">
                <thead>
                <tr style="text-align: center;">
                  <th>Id</th>
                  <th>Coupan_Code</th>
                  <th>Discount</th>
                  <th>Status</th>
                  <th>Expiry_Date</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($coupan as $a)
                  <tr style="text-align: center;">
                    <td>{{$a->id}}</td>
                    <td>{{$a->coupan_code}}</td>
                    <td>{{$a->discount}}%</td>
                    <td>
                      <input type="checkbox" data-id="{{ $a->id }}" name="status" class="js-switch" {{ $a->status == '1' ? 'checked' : '' }}>
                    </td>
                    <td>{{$a->expiry_date}}</td>
                    <td>
                      <a href="{{url('admin/coupan_edit/'.$a->id)}}"><p class="btn btn-success"><i class="fas fa-edit"></i></p></a>
                      <a href="{{url('admin/coupan_delete/'.$a->id)}}"><p class="btn btn-danger"><i class="fas fa-trash"></i></p></a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
                <tfoot>
                <tr style="text-align: center;">
                  <th>Id</th>
                  <th>Coupan_Code</th>
                  <th>Discount</th>
                  <th>Status</th>
                  <th>Expiry_Date</th>
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
        <h5 class="modal-title" id="exampleModalLabel">Add Coupan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
  <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="{{url('admin/coupan_submit')}}" enctype="multipart/form-data">
      @csrf
    <div class="form-group">
      <label>Coupan_Code:</label>
      <input type="text" class="form-control" placeholder="Enter Coupan Code" name="coupan_code">
    </div>
    <div class="form-group">
      <label>Discount(%):</label>
      <input type="text" class="form-control" placeholder="Enter Coupan Discount" name="discount">
    </div>
    <div class="form-group">
      <label>Status:</label>
      <select name="status" class="form-control">
        <option value="1">Active</option>
        <option value="0">InActive</option>
      </select>
    </div>
    <div class="form-group">
      <label>Expiry_Date:</label>
      <input type="date" class="form-control" name="expiry_date">
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