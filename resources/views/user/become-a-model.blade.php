@extends('user.layouts.app')

@section('title', 'Become a model')

@section('header')
@include('user.layouts.header')
@endsection

@section('content')

<div class="container-fluid p-0">
    <div class="row g-0">
        <div class="col-lg-6 text-dark">
            <div class="col-md-12">
                <div class="blog-item">
                    <div class="position-relative overflow-hidden rounded-top">
                        <img class="img-fluid" src="{{ asset('img/sign-up.jpg') }}" alt="" width="100%">
                    </div>
                    <div class="d-flex align-items-center rounded-bottom p-4">
                        <div class=" text-dark text-center">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat.
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5 p-4 sign-con">
                <div class="col-lg-4 text-center">
                    <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center mb-3 m-auto" style="width: 60px; height: 60px;">
                        <i class="bi bi-box-arrow-in-right fs-4" style="color: #fff;"></i>
                    </div>
                    <div class="col-lg-12">
                        <a class="btn btn-primary w-100" href="javascript:;">Sign Up</a>
                    </div>
                </div>
                <div class="col-lg-4 text-center">
                    <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center mb-3 m-auto" style="width: 60px; height: 60px;">
                        <h3 class="mb-0"><i class="bi bi-person-circle" style="color: #fff;"></i></h3>
                    </div>
                    <div class="col-lg-12">
                        <a class="btn btn-primary w-100" href="javascript:;">Go Live</a>
                    </div>
                </div>
                <div class="col-lg-4 text-center">
                    <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center mb-3 m-auto" style="width: 60px; height: 60px;">
                        <h3 class="m-0 ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-currency-dollar" viewBox="0 0 16 16" style="color: #fff;">
                                <path d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z" />
                            </svg>
                        </h3>
                    </div>
                    <div class="col-lg-12">
                        <a class="btn btn-primary w-100" href="javascript::">Earn Money</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class=" p-5">
                <div class="mb-5 text-center">
                    <h3 class="mb-2 ">Account Holder</h3>
                    <h6 class="text-primary">You must be over 18 years old to register. No credit card needed.</h6>
                </div>
                <div class="row g-3">
                    <div class="error">
                        @if( Session::has('message'))

                        <?php echo Session::get('message'); ?>

                        @endif
                    </div>
                </div>
                <form id="form-1" onsubmit="return submit_form_step1(); ">
                    <div class="row g-3 section-1">

                        @csrf

                        <input type="hidden" id="signup_step" name="signup_step" value="1">
                        <div class="col-lg-6">
                            <label>First Name</label>
                            <input type="text" name="first_name" required class="form-control bg-light border-0 pt-2 signup_step1" placeholder="First Name">
                        </div>
                        <div class="col-lg-6">
                            <label>Last Name</label>
                            <input type="text" name="last_name" required class="form-control bg-light border-0 pt-2 signup_step1" placeholder="Last Name">
                        </div>
                        <div class="col-lg-6">
                            <label>Username</label>
                            <input type="text" name="username" required class="form-control bg-light border-0 pt-2 signup_step1" placeholder="Username">
                        </div>
                        <div class="col-lg-6">
                            <label>Phone No</label>
                            <input type="tel" name="phone"  required class="form-control bg-light border-0 pt-2 signup_step1" placeholder="Phone No">
                        </div>
                        <div class="col-lg-12">
                            <label>Email</label>
                            <input type="email" name="email" required class="form-control bg-light border-0 pt-2 signup_step1" placeholder="Email">
                        </div>
                        <div class="col-lg-12">
                            <label>Date Of Birth</label>
                            <input type="date" max="{{date('Y-m-d',strtotime('-18 years'))}}" name="dob" required class="form-control bg-light border-0 pt-2 signup_step1" placeholder="Date Of Birth">
                        </div>
                        <div class="col-lg-6">
                            <label>Password</label>
                            <input type="password" name="password" required class="form-control bg-light border-0 pt-2 signup_step1" placeholder="Password">
                        </div>
                        <div class="col-lg-6">
                            <label>Confirm password</label>
                            <input type="password" name="confirm_password" required class="form-control bg-light border-0 pt-2 signup_step1" placeholder=" Confirm Password">
                        </div>
                        <div class="col-lg-12">
                            <label>Select Country</label>
                            <select class="form-control bg-light border-0 pt-2 signup_step1 select2" name="country" required>
                                <option value="">Select country</option>
                                @foreach($countries as $country)
                                <option value="{{$country->id}}">{{$country->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-check">
                                <input class="form-check-input signup_step1" required type="checkbox" name="termsCheckBox" value="1" id="gridCheck1">
                                <label class="form-check-label" for="gridCheck1">
                                    I have read and agree to the <a href="{{route('terms-and-conditions')}}"> terms and conditions.</a>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input signup_step1" value="1" type="checkbox" name="privacyCheckBox" required id="gridCheck11">
                                <label class="form-check-label" for="gridCheck11">
                                    I have read and agree to the <a href="{{route('privacy-policy')}}"> privacy policy.</a>
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-primary w-100 submit-btn-1">Continue</button>
                        </div>
                        <div class="col-lg-12 p-2 text-center">
                            <p>
                                Email addresses, when provided, are only used for friend notifications, broadcast and payout reminders, newsletter, and account verification. Your email address is never sold or shared.</p>
                        </div>
                    </div>
                    <div class="row g-3 section-2" style="display:none">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-md-6"><label>Document Type</label></div>
                                    <div class="col-md-6">
                                        <select name="id_doc" class="form-control bg-light border-0 pt-2 mt-3">
                                            <option value="">---Select---</option>
                                            <option value="Passport">Passport</option>
                                            <option value="Driving License">Driving License</option>
                                            <option value="Identity Card">Identity Card</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <label>Verify Your Id</label>
                                <input type="file" name="user_id_doc" accept="image/*,.pdf" class="form-control bg-light border-0 pt-2 mt-3 signup_step2" placeholder="Username">
                            </div>

                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-md-6"><label>Document Type</label></div>
                                     <div class="col-md-6">
                                        <select name="address_doc" class="form-control bg-light border-0 pt-2 mt-3">
                                            <option value="">---Select---</option>
                                            <option value="Passport">Passport</option>
                                            <option value="Driving License">Driving License</option>
                                            <option value="Identity Card">Identity Card</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <label>Verify Your Address Proof</label>
                                <input type="file" name="user_address_doc" accept="image/*,.pdf" class="form-control bg-light border-0 pt-2 mt-3 signup_step2" placeholder="Username">
                            </div>
                            <div class="col-lg-12">
                                <button type="submit"  class="btn btn-primary w-100 submit-btn-2" >Create Free Account</button>
                            </div>
                            <div class="col-lg-12 p-2 text-center">
                              <p>
                                 Email addresses, when provided, are only used for friend notifications, broadcast and payout reminders, newsletter, and account verification. Your email address is never sold or shared.</p>
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
            url: "{{url('model-signup-step-1')}}",
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
                $('.submit-btn-1').html('Continue');
                if (resp.status == 1) {

                    $('.section-2').show();
                    $('.section-1').hide();
                    $('.signup_step2').attr('required','required');
                    $('.signup_step1').removeAttr('required');
                    $('#form-1').attr('onsubmit','return submit_form_step2()');
                    //window.location.href = site_url+'proposals?post_id='+resp.job_id;
                   // window.location.href = site_url + 'email-verify';
                } else {
                    $('.error').html(resp.message);
                }
            }
        });
        return false;
    }

    function submit_form_step2() {
        let formData = new FormData($('#form-1')[0]);
        console.log(formData);
        $.ajax({
            type: 'POST',
            url: "{{url('model-signup-step-2')}}",
            data: formData,
            dataType: 'JSON',
            processData: false,
            contentType: false,
            cache: false,
            beforeSend: function() {
                $('.submit-btn-2').prop('disabled', true);
                $('.submit-btn-2').html('<div class="spinner-border text-info" role="status"><span class="visually-hidden">Loading...</span></div>');
                $('.error').html('');
            },
            success: function(resp) {
                $('.submit-btn-2').prop('disabled', false);
                $('.submit-btn-2').html('Create Free Account');
                if (resp.status == 1) {

                    console.log(resp);
                    window.location.href = '{{url("email-verification")}}';
                    //window.location.href = site_url+'proposals?post_id='+resp.job_id;
                   // window.location.href = site_url + 'email-verify';
                } else if(resp.status==2) {
                    $('.section-1').show();
                    $('.section-2').hide();
                    $('.signup_step1').attr('required','required');
                    $('.signup_step2').removeAttr('required');
                    $('#form-1').attr('onsubmit','return submit_form_step1()');
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