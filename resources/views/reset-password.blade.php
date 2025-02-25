@extends('layout.main')
@section('content')

<div class="login section">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 offset-lg-4">
          <div class="section-heading text-center">
            <h6>| Password Reset</h6>
            <h2>Lorem ipsum dolor sit amet.</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-8 offset-lg-2">
          <x-alert />
          <form id="login-form" action="{{route('reset-password')}}" method="post">
            @csrf
              <div class="row">
                <div class="col-lg-12">
                  <fieldset>
                    <label for="email">Email Address</label>
                    <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror"" placeholder="Your E-mail...">
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                  </fieldset>
                </div>
                <div class="col-lg-12">
                  <fieldset>
                    <button type="submit" id="form-submit" class="orange-button">Reset Password</button>
                  </fieldset>
                </div>
              </div>
              <div class="row mt-3">
                  <div class="col-lg-12">
                      <a href="{{route('login')}}" >Login</a>
                  </div>
              </div>
            </form>    
        </div>
      </div>
    </div>
  </div>


@endsection