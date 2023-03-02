@extends('user.layouts.app')

@section('title', 'Forgot password')

@section('header')
@include('user.layouts.header')
@endsection

@section('content')

<div class="container-fluid p-0">
    <div class="row g-0">
        <div class="col-lg-6 m-auto mt-5 mb-5">
            <div class="bg-dark p-5">
                <div class="mb-5 text-center">
                    <h3 class="mb-2 text-white">Forgot Password</h3>
                    <p class="text-primary">Enter your e-mail address below, and we'll e-mail instructions for setting a new one.</p>
                </div>
                <form id="form-1" onsubmit="return submit_form_step1()" action="" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="error">
                            @if (session()->has('message'))

                            <?php echo session()->get('message'); ?>

                            @endif
                        </div>
                        <div class="col-lg-12">
                            <label>Email</label>
                            <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus class="form-control bg-light border-0 pt-2" placeholder="Email">
                        </div>
                        <div class="col-lg-12">
                            <button class="btn btn-primary w-100 submit-btn-1" type="submit">Reset my password</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection


<script>
    function submit_form_step1() {
        let formData = new FormData($('#form-1')[0]);
        console.log(formData);
        $.ajax({
            type: 'POST',
            url: "{{url('forgot-password')}}",
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
                $('.submit-btn-1').html('Reset my password');
                
                if (resp.status == 1) {
                    $('#email').val('');
                    Swal.fire({
                        icon: 'success',
                        title: 'Send',
                        text: resp.message,
                    })
                } else {
                    $('.error').html(resp.message);
                }
            }
        });
        return false;
    }
</script>
@section('footer')
@include('user.layouts.footer')
@endsection