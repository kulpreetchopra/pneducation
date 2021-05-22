@extends("front.master")
@section("title","Signup | PN-Education")
@section("content")
<style type="text/css">
.card0 {
    box-shadow: 0px 4px 8px 0px #757575;
    border-radius: 0px
}

.card2 {
    margin: 0px 40px
}

.image {
    margin-top: 30px;
    width: 530px;
    height: 400px
}

.border-line {
    border-right: 1px solid #EEEEEE
}

.line {
    height: 1px;
    width: 45%;
    background-color: #E0E0E0;
    margin-top: 10px
}

.or {
    width: 10%;
    font-weight: bold
}

.text-sm {
    font-size: 14px !important
}

::placeholder {
    color: #BDBDBD;
    opacity: 1;
    font-weight: 300
}

:-ms-input-placeholder {
    color: #BDBDBD;
    font-weight: 300
}

::-ms-input-placeholder {
    color: #BDBDBD;
    font-weight: 300
}

input,
textarea {
    padding: 10px 12px 10px 12px;
    border: 1px solid lightgrey;
    border-radius: 2px;
    margin-bottom: 5px;
    margin-top: 2px;
    width: 100%;
    box-sizing: border-box;
    color: #2C3E50;
    font-size: 14px;
    letter-spacing: 1px
}

input:focus,
textarea:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    border: 1px solid #304FFE;
    outline-width: 0
}

button:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    outline-width: 0
}

a {
    color: inherit;
    cursor: pointer
}

.btn-blue {
    background-color: #1A237E;
    width: 150px;
    color: #fff;
    border-radius: 2px
}

.btn-blue:hover {
    background-color: #000;
    color: white;
    cursor: pointer
}

.bg-blue {
    color: #fff;
    background-color: #1A237E
}

@media screen and (max-width: 991px) {

    .image {
        width: 300px;
        height: 220px
    }

    .card1 {
        display: none!important;
    }

    .border-line {
        border-right: none
    }

    .card2 {
        border-top: 1px solid #EEEEEE !important;
        margin: 0px 15px
    }
}
</style>
<div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
    <div class="card card0 border-0">
        <div class="row d-flex">
            <div class="col-lg-6">
                <div class="card1 pb-5">
                    <div class="row px-3 justify-content-center mt-4 mb-5 border-line"> <img src="https://internship2021.pninfosys.com/image/banner3.jpg" class="image"> </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card2 card border-0 px-4 py-5">
                    @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                    @endif
                    <form method="post" action="{{url('/submit')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                    <div class="col-md-6 px-3"> 
                      <label class="mb-1">
                        <h6 class="mb-0 text-sm">First Name</h6>
                      </label> 
                      <input class="mb-4" type="text" name="fname" placeholder="Enter Your First Name">
                    </div>
                    <div class="col-md-6 px-3"> 
                      <label class="mb-1">
                        <h6 class="mb-0 text-sm">Last Name</h6>
                      </label> 
                      <input class="mb-4" type="text" name="lname" placeholder="Enter Your Last Name">
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-md-12 px-3"> 
                      <label class="mb-1">
                        <h6 class="mb-0 text-sm">Email</h6>
                      </label> 
                      <input class="mb-4" type="email" name="email" placeholder="Enter Email Address">
                    </div>
                    <div class="col-md-12 px-3"> 
                      <label class="mb-1">
                        <h6 class="mb-0 text-sm">Phone</h6>
                      </label> 
                      <input class="mb-4" type="tel" name="phone" placeholder="Enter 10 Digit Phone Number">
                    </div>
                    <div class="col-md-12 px-3"> 
                      <label class="mb-1">
                        <h6 class="mb-0 text-sm">Password</h6>
                      </label> 
                      <input type="password" name="password" placeholder="Enter password"> 
                    </div>
                    <div class="col-md-12 px-3 mb-4">
                          <a href="#" class="ml-auto mb-0 text-sm">Forgot Password?</a>
                    </div>
                    <div class="mb-3 px-3 mb-4"> 
                      <input type="submit" class="btn btn-blue text-center" name="submit" value="Signup">
                    </form> 
                    </div>
                    <div class="mb-4 px-3"> <small class="font-weight-bold">Already have an account? <a href="{{url('user_login')}}" class="text-danger">Login</a></small> </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection