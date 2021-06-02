@extends("admin.master")
@section("title","Users | PN-Education")
@section("content")
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">All Users <a href="" onclick="window.print()"><p class="btn btn-info"><i class="fas fa-print"></i> Print To PDF</p></a></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('admin')}}">Home</a></li>
              <li class="breadcrumb-item active">All Users</li>
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
                <h3 class="card-title">Display All Users</h3>
              </div>
              <div class="card-body">
                   
              <table id="example1" class="table table-bordered table-hover table-striped table-responsive-sm">
                <thead>
                <tr style="text-align: center;">
                  <th>Id</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Email Verified@</th>
                  <th>Phone</th>
                  <th>Google Id</th>
                  <th>Facebook Id</th>
                  <th>Date</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($users as $a)
                  <tr style="text-align: center;">
                    <td>{{$a->id}}</td>
                    <td>{{$a->fname}} {{$a->lname}}</td>
                    <td>{{$a->email}}</td>
                    <td>{{$a->email_verified_at}}</td>
                    <td>{{$a->phone}}</td>
                    <td>{{$a->google_id}}</td>
                    <td>{{$a->facebook_id}}</td>
                    <td>{{$a->created_at}}</td>
                  </tr>
                  @endforeach
                </tbody>
                <tfoot>
                <tr style="text-align: center;">
                  <th>Id</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Email Verified@</th>
                  <th>Phone</th>
                  <th>Google Id</th>
                  <th>Facebook Id</th>
                  <th>Date</th>
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
    </div>
<!-- ------End Data Table------- -->
  </div>
  <!-- /.content-wrapper -->
@endsection