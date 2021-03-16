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

.logo {
    width: 150px;
    height: 50px;
    margin-top: 20px;
    margin-left: 35px
}

.image {
    width: 450px;
    height: 400px
}

.border-line {
    border-right: 1px solid #EEEEEE
}

.facebook {
    background-color: #3b5998;
    color: #fff;
    font-size: 18px;
    padding-top: 5px;
    border-radius: 50%;
    width: 35px;
    height: 35px;
    cursor: pointer
}

.twitter {
    background-color: #1DA1F2;
    color: #fff;
    font-size: 18px;
    padding-top: 5px;
    border-radius: 50%;
    width: 35px;
    height: 35px;
    cursor: pointer
}

.linkedin {
    background-color: #2867B2;
    color: #fff;
    font-size: 18px;
    padding-top: 5px;
    border-radius: 50%;
    width: 35px;
    height: 35px;
    cursor: pointer
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
                    <div class="row"> <img src="{{ url('/front/logo1615719373.png') }}" class="logo"> </div>
                    <div class="row px-3 justify-content-center mt-4 mb-5 border-line"> <img src="https://firebasestorage.googleapis.com/v0/b/pn-images.appspot.com/o/home-%3Eclient%2Fe3.jpg?alt=media&token=0f9d6230-34e3-4233-b31f-a6c5e646bbcd" class="image"> </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card2 card border-0 px-4 py-5">
                    <div class="row mb-4 px-3">
                        <h6 class="mb-0 mr-4 mt-2">Sign in with</h6>
                        <div class="facebook text-center mr-3">
                            <div class="fa fa-facebook"></div>
                        </div>
                        <div class="twitter text-center mr-3">
                            <div class="fa fa-twitter"></div>
                        </div>
                        <div class="linkedin text-center mr-3">
                            <div class="fa fa-linkedin"></div>
                        </div>
                    </div>
                    <div class="row px-3 mb-4">
                        <div class="line"></div> <small class="or text-center">Or</small>
                        <div class="line"></div>
                    </div>
                    <form method="post" action="{{url('/submit')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row px-3"> 
                      <label class="mb-1">
                        <h6 class="mb-0 text-sm">Name</h6>
                      </label> 
                      <input class="mb-4" type="text" name="name" placeholder="Enter Your Name">
                    </div>
                    <div class="row px-3"> 
                      <label class="mb-1">
                        <h6 class="mb-0 text-sm">Email</h6>
                      </label> 
                      <input class="mb-4" type="email" name="email" placeholder="Enter Email Address">
                    </div>
                    <div class="row px-3"> 
                      <label class="mb-1">
                        <h6 class="mb-0 text-sm">Password</h6>
                      </label> 
                      <input type="password" name="password" placeholder="Enter password"> 
                    </div>
                    <div class="row px-3 mb-4">
                        <div class="custom-control custom-checkbox custom-control-inline"> <input id="chk1" type="checkbox" name="chk" class="custom-control-input"> 
                          <label for="chk1" class="custom-control-label text-sm">Remember me</label> </div> 
                          <a href="#" class="ml-auto mb-0 text-sm">Forgot Password?</a>
                    </div>
                    <div class="row mb-3 px-3"> 
                      <input type="submit" class="btn btn-blue text-center" name="submit" value="Login">
                    </form> 
                    </div>
                    <div class="row mb-4 px-3"> <small class="font-weight-bold">Already have an account? <a href="{{url('user_login')}}" class="text-danger">Login</a></small> </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection