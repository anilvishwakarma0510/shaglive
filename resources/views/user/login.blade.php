@extends('user.layouts.app')

@section('title', 'Login')

@section('header')
@include('user.layouts.header')
@endsection

@section('content')
<style type="text/css">
  .bg-dark {
    background-color: #fff !important;
    box-shadow: 0px 1px 28px -18px grey;
  }
</style>
<div class="container-fluid p-0">
  <div class="row g-0">
    <div class="col-lg-6 m-auto mt-5 mb-5">
      <div class="bg-dark p-5">
        <div class="mb-5 text-center">
          <h3 class="mb-2 text-white">Log In</h3>
        </div>
        <form id="form-1" method="POST" action="{{ route('login') }}">
        @csrf
          <div class="row g-3">
            <div class="error">
                @if (session()->has('message')) 

              <?php echo session()->get('message'); ?>

              @endif
            </div>
            <div class="col-lg-12">
              <label>Email</label>
              <input type="text" name="email" class="form-control bg-light border-0 pt-2" placeholder="Email" value="{{ old('email') }}" required>
            </div>
            <div class="col-lg-12">
              <label>Password</label>
              <input type="password" name="password" class="form-control bg-light border-0 pt-2" placeholder="Password">
            </div>
            <div class="col-lg-6">
              <div class="form-check">
                <input class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} type="checkbox" id="gridCheck1">
                <label class="form-check-label" for="gridCheck1">
                  Keep me logged in.
                </label>
              </div>
            </div>
            <div class="col-lg-6 text-end">
              <div class="form-check">
                <label class="form-check-label" for="gridCheck1">
                  <a href="{{route('forgot-password')}}">forgot password</a>
                </label> 
              </div>
            </div>
            <div class="col-lg-12">
              <button type="submit" class="btn btn-primary w-100 submit-btn-2">Log In</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


@endsection



@section('footer')
@include('user.layouts.footer')
@endsection