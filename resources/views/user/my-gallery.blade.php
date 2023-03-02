@extends('user.inner-layouts.app')

@section('title', 'My Gallery')

@section('header')
@include('user.inner-layouts.header')
@endsection

@section('sidebar')
@include('user.inner-layouts.sidebar')
@endsection

@section('content')
<style type="text/css">
  .bg-secondary {
    background-color: #fff !important;
    border: 1px solid #d3d3d3;
  }
</style>
<div id="layoutSidenav_content" class="bg-dark">
  <main class="">
    <div class="container-fluid px-4">
      <div class="row">
        <div class="col-sm-6">
          <h3 class="mt-3 text-white pb-3 mb-4">My Galleries
          </h3>
        </div>
        <div class="col-sm-6 text-end pt-3">
          <!--a href="create-gallery.php" class="btn btn-primary"> Add a new photo gallery</a-->
          <a href="{{route('add-gallery')}}" class="btn btn-primary"> Add Gallery</a>
        </div>
      </div>
      <div class="row">
        <div class="error">
          @if (session()->has('message'))

          <?php echo session()->get('message'); ?>

          @endif
        </div>
        @if(!blank($galleries))
        @foreach($galleries as $key => $gallery)

        <div class="col-sm-3 mb-3 fav">
          <a href="{{route('edit-gallery')}}?id={{$gallery->id}}">
            <div class="pb-2 pt-2 bg-secondary p-2 edt-dlt-main">
              <img src="{{ asset($gallery->file)}}" width="100%">
              <div class="pt-2 text-white">
                <b>{{$gallery->title}}</b>
              </div>
              <p class="mb-0 d-flexk mt-1 edt-dlt">
                <a href="{{route('edit-gallery')}}?id={{$gallery->id}}" class="btn btn-light">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                    <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z" />
                  </svg>
                </a>
                <a href="{{route('delete-gallery')}}?id={{$gallery->id}}" onclick="return confirm('Are you sure?')" class="btn btn-dark">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                  </svg>
                </a>
              </p>
            </div>
          </a>
        </div>
        @endforeach
        @endif





      </div>
    </div>
  </main>
</div>

@endsection

@section('footer')
@include('user.inner-layouts.footer')
@endsection