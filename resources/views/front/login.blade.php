@extends("front.master")
@section("title","Login | PN-Education")
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

    .border-line {
        border-right: none
    }

    .card1 {
        display: none!important;
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
                    <form method="post" action="{{url('/login_submit')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row px-3">
                            <label for="email" class="mt-4">{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Enter Registered Email Address" value="{{ old('email') }}" autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                    <div class="row px-3">
                        <label for="password" class="mt-4">{{ __('Password') }}</label>
                        <input id="pass" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter password" autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror 
                        <a onclick="Password()"><span style="color:#1A237E" class="material-icons">visibility</span></a> Show Password
                    </div>
                        @if (Route::has('password.request'))
                        <a href="{{route('password.request')}}" class="ml-auto mb-0 text-md text-danger">Forgot Password?</a>
                        @endif
                    <br>
                    <br>
                    <div class="row mb-3 px-3"> 
                      <input type="submit" class="btn btn-blue text-center" name="submit" value="Login">
                    </form> 
                    </div>
                    <div class="mb-4 px-3"> <small class="font-weight-bold">Don't have an account? <a href="{{url('signup')}}" class="text-danger">Signup</a></small> </div>
            <center>
              <hr>
              <h3><b>OR LOGIN WITH</b></h3> 
              <h3>
                <div class="row">
                    <div class="col-md-6">
                        <a style="color:white;background-color: red;" class="btn btn-block btn-outline-success" href="{{ url('auth/google') }}"><i class="fa fa-google"></i> Login With Google Account</a>
                        <br>
                    </div>
                    <div class="col-md-6">
                        <a style="color:white;background-color: #3b5998;" class="btn btn-block btn-outline-success" href="{{ url('auth/facebook') }}"><i class="fa fa-facebook-f"></i> Login With Facebook Account</a>
                    </div>     
                </div>
              </h3>
            </center>

                                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection