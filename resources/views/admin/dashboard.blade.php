@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('header')
@include('admin.layouts.header')
@endsection

@section('sidebar')
@include('admin.layouts.sidebar')
@endsection

@section('content')
<div id="layoutSidenav_content" class="bg-dark">
    <main class="">
        <div class="container-fluid px-4">
            <h3 class="mt-3 text-white page-ttl pb-3 mb-4">Dashboard</h3>
            <div class="row">
                <div class="col-sm-12 bg-light pt-4 pb-3 data-t">

                </div>
            </div>
        </div>
    </main>
</div>


@endsection

@section('footer')
@include('admin.layouts.footer')
@endsection