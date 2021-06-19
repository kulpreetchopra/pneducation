@extends("front.master")
@section("title","Signup | PN-Education")
@section("content")
<style type="text/css">
.card0 {
    border-color: #1A237E;
    box-shadow: 0px 4px 8px 4px #757575;
    border-radius: 2%
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
                    <form method="post" action="{{ url('submit') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                    <div class="col-md-6 px-3"> 
                      <label class="mb-1 mt-4">
                        <h6 class="mb-0 text-sm">First Name</h6>
                      </label> 
                      <input id="fname" type="text" class="form-control @error('fname') is-invalid @enderror" name="fname" value="{{ old('fname') }}" placeholder="Enter Your First Name" autocomplete="fname" autofocus>
                                @error('fname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="col-md-6 px-3"> 
                      <label class="mb-1 mt-4">
                        <h6 class="mb-0 text-sm">Last Name</h6>
                      </label> 
                      <input id="lname" type="text" class="form-control @error('lname') is-invalid @enderror" name="lname" value="{{ old('lname') }}" placeholder="Enter Your Last Name" autocomplete="lname" autofocus>
                                @error('lname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-md-12 px-3"> 
                      <label class="mb-1 mt-4">
                        <h6 class="mb-0 text-sm">E-Mail Address</h6>
                      </label> 
                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter Email Address" autocomplete="email">
                      <input type="hidden" name="role" value=0>
                      <input type="hidden" name="active" value=0>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="col-md-12 px-3"> 
                      <label class="mb-1 mt-4">
                        <h6 class="mb-0 text-sm">Phone</h6>
                      </label> 
                      <input id="phone" type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" placeholder="Enter 10 Digit Phone Number" autocomplete="phone">
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="col-md-6 px-3"> 
                      <label class="mb-1 mt-4">
                        <h6 class="mb-0 text-sm">Password</h6>
                      </label> 
                      <input id="pass" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter password" autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        <a onclick="Password()"><span style="color:#1A237E" class="material-icons">visibility</span></a> Show Password 
                    </div>
                    <div class="col-md-6 px-3"> 
                      <label class="mb-1 mt-4">
                        <h6 class="mb-0 text-sm">Confirm Password</h6>
                      </label> 
                      <input id="password-confirm" type="password" placeholder="Enter password" class="form-control" name="password_confirmation" autocomplete="new-password">
                    </div>
                    <div class="col-md-12 px-3 mb-4">
                          @if (Route::has('password.request'))
                        <a href="{{route('password.request')}}" class="ml-auto mb-0 text-md text-danger">Forgot Password?</a>
                        @endif
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