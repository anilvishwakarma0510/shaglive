@extends('user.layouts.app')

@section('title', 'Pending Verification')

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
                <div class="mb-3 text-center">
                    <h3 class="mb-3 text-white">Verification Pending</h3>
                    <h6 class="text-white">Your account is currently under review. We will notify you via email as soon as the review is complete. We appreciate your patience.</h6>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('footer')
@include('user.layouts.footer')
@endsection