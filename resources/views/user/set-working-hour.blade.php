@extends('user.inner-layouts.app')

@section('title', 'Account Settings')

@section('header')
@include('user.inner-layouts.header')
@endsection

@section('sidebar')
@include('user.inner-layouts.sidebar')
@endsection

@section('content')
<div id="layoutSidenav_content" class="bg-dark">
  <main class="">
    <div class="container-fluid px-4">
      <h3 class="mt-3 text-white page-ttl pb-3 mb-4">Account Settings</h3>
      <div class="row">
        <div class="col-xl-12">
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Account Information</button>
            </li>
          </ul>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active bg-dark p-4" id="home" role="tabpanel" aria-labelledby="home-tab">
            <form class="row g-3" id="form-1" onsubmit="return submit_form_step1()">
                @csrf
                <div class="error">
                  @if (session()->has('message'))

                  <?php echo session()->get('message'); ?>

                  @endif
                </div>

                <?php
                $user = auth()->user();
                ?>
                @foreach($days as $key => $day)
                <div class="col-md-12">
                  <label for="first_name" class="form-label text-white"><b>{{$day['weekName']}}</b></label>
                  <input type="hidden" value="{{$key}}" name="week_day[]" id="week_day{{$key}}">
                </div>
                <div class="col-md-6">
                  <label for="first_name" class="form-label text-white">Open</label>
                  <input type="time" onchange="$('#close_time{{$key}}').min(this.value)" value="{{$day['open_time']}}" name="open_time[]" id="open_time{{$key}}" class="form-control">
                </div>
                <div class="col-md-6">
                  <label for="first_name" class="form-label text-white">Close</label>
                  <input type="time" <?= $day['open_time'] ? 'min="'.$day['open_time'].'"':'' ?> value="{{$day['close_time']}}" name="close_time[]" id="close_time{{$key}}" class="form-control">
                </div>
                @endforeach
                <div class="col-12 mt-4">
                  <button type="submit" class="btn btn-primary w-100">Save Changes</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
</div>


<script>
    function submit_form_step1() {
        let formData = new FormData($('#form-1')[0]);
        console.log(formData);
        $.ajax({
            type: 'POST',
            url: "{{url('set-working-hours')}}",
            data: formData,
            dataType: 'JSON',
            processData: false,
            contentType: false,
            cache: false,
            beforeSend: function() {
                $('.submit-btn-1').prop('disabled', true);
                $('.submit-btn-1').html('<div class="spinner-border text-info" role="status"><span class="visually-hidden">Loading...</span></div>');
                $('.error').html('');


            },
            success: function(resp) {
                $('.submit-btn-1').prop('disabled', false);
                $('.submit-btn-1').html('Save Changes');

                if (resp.status == 1) {
                    //  location.reload();
                    Swal.fire({

                        title: "Success!",
                        text: resp.message,
                        icon: "success",
                        showCancelButton: false,
                        allowOutsideClick: false,
                        didClose: (result) => {
                            location.reload();
                        },
                    });
                } else {
                    $('.error').html(resp.message);
                }
            }
        });
        return false;
    }


</script>
@endsection

@section('footer')
@include('user.inner-layouts.footer')
@endsection