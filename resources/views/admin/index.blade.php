@extends("admin.master")
@section("title","Admin | PN-Education")
@section("content")

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('admin')}}">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    
    <div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    <center>
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
                      @if (session('status'))
                      <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                      </div>
                      @endif
                    </center>
                    <div style="background-color: #138086;color: white" class="alert" role="alert">
                    {{ __('You are logged in as ') }}<b> 
                    @if(Auth::user()->role==1)
                    {{'Admin'}}!
                    @else
                    {{'User'}}!
                    @endif
                    </b>
                    <p>Welcome <b>{{ Auth::user()->fname }} {{ Auth::user()->lname }}</b> to the Admin Dashboard!!</p>
                    <!-- user activity -->
                    <p><b><a href="{{url('admin/users')}}" class="small-box-footer"><i class="fas fa-lightbulb text"></i>Active Users And Admins [{{$signup->where('active',1)->count()}}] <i class="fas fa-arrow-circle-right"></i></a></b></p>
                    @foreach($signup as $a)
                    @if($a->active==1)
                      @if($a->role==1)
                      <i class="fas fa-user-shield"></i>
                      @else
                      <i class="fas fa-user-tie"></i>
                      @endif
                      &nbsp;{{$a->fname}} {{$a->lname}} ({{$a->email}})</br>
                    @endif
                    @endforeach
                    </div>
                </div>
        <div class="row" style="padding: 2%">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$order->count()}}</h3>
                <p>New Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{url('admin/orders')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$signup->count()}}</h3>
                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{url('admin/users')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$contact->count()}}</h3>

                <p>Customers Messages</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="{{url('admin/contact')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$subscribe->count()}}</h3>
                <p>All Subscribers</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="{{url('admin/subscribers')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
      </div>
        </div>
    </div>
</div>
  </div>
  <!-- /.content-wrapper -->

@endsection
