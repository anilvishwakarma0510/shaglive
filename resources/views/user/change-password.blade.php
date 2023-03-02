@extends('user.inner-layouts.app')

@section('title', 'Change Password')

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
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Change Password</button>
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
                                <div class="col-md-12">
                                    <label for="inputEmail4" class="form-label text-white">Old Password</label>
                                    <input type="password" name="old_password" class="form-control" id="inputEmail4">
                                </div>
                                <div class="col-md-12">
                                    <label for="inputPassword4" class="form-label text-white">New Password</label>
                                    <input type="password" name="password" class="form-control" id="inputPassword4">
                                </div>
                                <div class="col-md-12">
                                    <label for="inputEmail4" class="form-label text-white">Retype password</label>
                                    <input type="password" name="password_confirmation" class="form-control" id="inputEmail4">
                                </div>
                                <div class="col-12 mt-4">
                                    <button type="submit" class="btn btn-primary w-100 submit-btn-1">Save Changes</button>
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
            url: "{{url('change-password')}}",
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