@extends('user.layouts.app')

@section('title', 'Reset Password')

@section('header')
@include('user.layouts.header')
@endsection

@section('content')

<div class="container-fluid p-0">
    <div class="row g-0">
        <div class="col-lg-6 m-auto mt-5 mb-5">
            <div class="bg-dark p-5">
                <div class="mb-5 text-center">
                    <h3 class="mb-2 text-white">Reset Password</h3>
                </div>
                <div class="row g-3">
                    <div class="error">
                        @if (session()->has('message'))

                        <?php echo session()->get('message'); ?>

                        @endif


                    </div>
                </div>
                @if(!isset($hide_form))
                <form id="form-1" action="{{url('reset-password')}}" method="POST">
                    @csrf
                    <div class="row g-3">
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">
                        <div class="col-lg-12">
                            <label>Email</label>
                            <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus class="form-control bg-light border-0 pt-2" placeholder="Email">
                        </div>
                        <div class="col-lg-12">
                            <label>Password</label>
                            <input type="password" name="password" required id="password" required autofocus class="form-control bg-light border-0 pt-2" placeholder="New Password">
                        </div>
                        <div class="col-lg-12">
                            <label>Confirm Password</label>
                            <input type="password" name="password_confirmation" required id="password_confirmation" required autofocus class="form-control bg-light border-0 pt-2" placeholder="Confirm Password">
                        </div>
                        <div class="col-lg-12">
                            <button class="btn btn-primary w-100 submit-btn-1" type="submit">Change my password</button>
                        </div>
                    </div>
                </form>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection


<script>
</script>
@section('footer')
@include('user.layouts.footer')
@endsection