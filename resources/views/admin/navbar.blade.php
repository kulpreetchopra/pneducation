@extends("admin.master")
@section("title","Navbar | PN-Education")
@section("content")

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Navbar & Footer</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('admin')}}">Home</a></li>
              <li class="breadcrumb-item active">Navbar & Footer</li>
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
                <h3 class="card-title">Display Navbar & Footer</h3>

                <div class="card-tools">
                  <a class="btn btn-info btn-sm" href="" data-toggle="modal" data-target="#exampleModal">Add Navbar & Footer</a>
      </div>
              </div>
              <div class="card-body">
                   
              <table id="example1" class="table table-bordered table-hover table-striped table-responsive">
                <thead>
                <tr style="text-align: center;">
                  <th>Id</th>
                  <th>Contact</th>
                  <th>Email</th>
                  <th>Logo</th>
                  <th>About</th>
                  <th>Address</th>
                  <th>Timing</th>
                  <th>Map</th>
                  <th>Facebook</th>
                  <th>Twitter</th>
                  <th>Instagram</th>
                  <th>Linkedin</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($display as $a)
                  <tr style="text-align: center;">
                    <td>{{$a->id}}</td>
                    <td>{{$a->contact}}</td>
                    <td>{{$a->email}}</td>
                    <td>
                      <img src="{{ url('/front/'.$a->logo) }}" style="height: 120px; width: 120px; border-radius: 100%;">
                    </td>
                    <td><?php echo substr($a->about,0,20);echo"..."?></td>
                    <td><?php echo substr($a->address,0,20);echo"..."?></td>
                    <td>{{$a->timing}}</td>
                    <td><?php echo substr($a->map,0,20);echo"..."?></td>
                    <td><?php echo substr($a->facebook,0,20);echo"..."?></td>
                    <td><?php echo substr($a->twitter,0,20);echo"..."?></td>
                    <td><?php echo substr($a->instagram,0,20);echo"..."?></td>
                    <td><?php echo substr($a->linkedin,0,20);echo"..."?></td>
                    <td>
                      <a href="{{url('admin/navbar_edit/'.$a->id)}}"><p class="btn btn-success"><i class="fas fa-edit"></i></p></a>
                      <a onclick="return confirm('Are you sure to delete?')" href="{{url('admin/navbar_delete/'.$a->id)}}"><p class="btn btn-danger"><i class="fas fa-trash"></i></p></a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
                <tfoot>
                <tr style="text-align: center;">
                  <th>Id</th>
                  <th>Contact</th>
                  <th>Email</th>
                  <th>Logo</th>
                  <th>About</th>
                  <th>Address</th>
                  <th>Timing</th>
                  <th>Map</th>
                  <th>Facebook</th>
                  <th>Twitter</th>
                  <th>Instagram</th>
                  <th>Linkedin</th>
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
        <h5 class="modal-title" id="exampleModalLabel">Add Navbar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
  <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="{{url('admin/navbar_submit')}}" enctype="multipart/form-data">
      @csrf
    <div class="form-group">
      <label>Contact:</label>
      <input type="tel" class="form-control" placeholder="Enter Contact" name="contact">
    </div>
    <div class="form-group">
      <label>Email:</label>
      <input type="email" class="form-control" placeholder="Enter Email" name="email">
    </div>
    <div class="form-group">
      <label>Logo:</label>
      <input type="file" class="form-control" name="logo">
    </div>
    <div class="form-group">
      <label>About:</label>
      <textarea type="text" class="form-control" placeholder="Enter About" name="about"></textarea>
    </div>
    <div class="form-group">
      <label>Address:</label>
      <textarea type="text" class="form-control" placeholder="Enter Address" name="address"></textarea>
    </div>
    <div class="form-group">
      <label>Timing:</label>
      <input type="text" class="form-control" placeholder="Enter Opening Timings" name="timing">
    </div>
    <div class="form-group">
      <label>Map:</label>
      <textarea type="text" class="form-control" placeholder="Enter Map Url" name="map"></textarea>
    </div>
    <div class="form-group">
      <label>Facebook Url:</label>
      <input type="text" class="form-control" placeholder="Enter Facebook Url" name="facebook">
    </div>
    <div class="form-group">
      <label>Twitter Url:</label>
      <input type="text" class="form-control" placeholder="Enter Twitter Url" name="twitter">
    </div>
    <div class="form-group">
      <label>Instagram Url:</label>
      <input type="text" class="form-control" placeholder="Enter Instagram Url" name="instagram">
    </div>
    <div class="form-group">
      <label>Linkedin Url:</label>
      <input type="text" class="form-control" placeholder="Enter Linkedin Url" name="linkedin">
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