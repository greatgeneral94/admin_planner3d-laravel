@extends('auth.master')

{{-- page title --}}
@section('title','Register')
{{-- page scripts --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/authentication.css')}}">

@endsection

@section('content')

<!-- register section starts -->
<section class="row flexbox-container">
  <div class="col-xl-8 col-10">
    <div class="card bg-authentication mb-0">
      <div class="row m-0">
        <!-- register section left -->
        <div class="col-md-6 col-12 px-0">
          <div class="card disable-rounded-right mb-0 p-2 h-100 d-flex justify-content-center">
            <div class="card-header pb-1">
              <div class="card-title">
                <h4 class="text-center mb-2">B1 Sign Up</h4>
              </div>
            </div>
            <div class="text-center">
              <p> <small> Please enter your details to sign up and be part of our great community</small>
              </p>
            </div>
            <div class="card-body">
              <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group mb-50">
                  <label class="text-bold-600" for="name">Name</label>
                  <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus placeholder="Full Name">
                  @error('name')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                  <div class="form-group mb-50">
                  <label class="text-bold-600" for="email">Email address</label>
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email" placeholder="Email address">
                  @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <input type="hidden" name="role" value="2">
               
                <div class="form-group ">
                  <label class="text-bold-600" for="Company Name">Company Name</label>
                  <input  type="text" class="form-control @error('company_name') is-invalid @enderror" name="company_name"   placeholder="Enter Company Name" value="{{ old('company_name') }}">
                  @error('company_name')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
                </div>
                <div class="form-group ">
                  <label class="text-bold-600" for="Country">Country</label>
                  <select class="selectpicker countrypicker form-control @error('country') is-invalid @enderror" name="country" data-live-search="true" data-default="Romania"></select>
                  @error('country')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
                </div>
                <div class="form-group ">
                  <label class="text-bold-600" for="password">Password</label>
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password" placeholder="Password">
                  @error('password')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="form-group ">
                  <label class="text-bold-600" for="password-confirm">Confirm Password</label>
                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password" placeholder="Confirm Password">
                </div>
                <button type="submit" class="btn btn-primary glow position-relative w-100">SIGN UP<i
                  id="icon-arrow" class="bx bx-right-arrow-alt"></i></button>
              </form>
              <hr>
              <div class="text-center"><small class="mr-25">Already have an account?</small>
                <a href="{{asset('login')}}"><small>Sign in</small> </a>
              </div>
            </div>
          </div>
        </div>
        <!-- image section right -->
        <div class="col-md-6 d-md-block d-none text-center align-self-center p-3">
            <img class="img-fluid" src="{{asset('app-assets/images/pages/register.png')}}" alt="branding logo">
        </div>
      </div>
    </div>
  </div>
</section>
<!-- register section endss -->

@endsection
@section('js')
<script src="{{ asset('app-assets/vendors/js/jquery.min.js') }}"></script>
<script src="{{ asset('app-assets/vendors/css/select-country/countrypicker.js') }}"></script>
@endsection
