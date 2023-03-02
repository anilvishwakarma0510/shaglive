@extends('user.layouts.app')

@section('title', 'Email Verification')

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
                    <h3 class="mb-3 text-white">Verify Your Email Address</h3>
                    <h6 class="text-white">We Sent Verification Link On Your Email ({{auth()->user()->email}}) Please Verify Your Email</h6>
                </div>
                <div class="row g-3">
                    <div class="col-lg-12 text-center">
                        <button type="button" id="" onclick="ResendEmail();" class="tw-100 btn btn-primary sendButton" href="javascript:;">Resend</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



<script>
    function ResendEmail() {
        
        $.ajax({
            type: 'GET',
            url: "{{url('resend-email-verification-link')}}",
            dataType: 'JSON',
            beforeSend: function() {
                $('.sendButton').prop('disabled', true);
                $('.sendButton').html('<div class="spinner-border text-info" role="status"></div>');
            },
            success: function(resp) {
                if (resp.status == 1) {

                    let i = 60;
                    let intervalID; 
                    intervalID = setInterval(function() {
                        i--
                        if (i > 1) {
                            $('.sendButton').prop('disabled', true);
                            $('.sendButton').html('Resend in ' + i + ' Sec');
                        } else {
                            $('.sendButton').prop('disabled', false);
                            $('.sendButton').html('Resend');
                            clearInterval(intervalID);
                        }
                    }, 1000);

                    Swal.fire({
                        icon: 'success',
                        title: 'Send',
                        text: 'Verification sent resent',
                    })
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                    })
                }
            }
        });
        return false;
    }
</script>
@section('footer')
@include('user.layouts.footer')
@endsection