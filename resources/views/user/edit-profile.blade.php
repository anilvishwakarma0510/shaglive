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

                <div class="col-md-6">
                  <label for="first_name" class="form-label text-white">First Name</label>
                  <input type="text" value="{{ $user->first_name}}" name="first_name" required class="form-control" id="first_name">
                </div>
                <div class="col-md-6">
                  <label for="last_name" class="form-label text-white">Last Name</label>
                  <input type="text" value="{{ $user->last_name}}" name="last_name" required class="form-control" id="last_name">
                </div>
                <div class="col-md-6">
                  <label for="username" class="form-label text-white">Username</label>
                  <input type="text" value="{{ $user->username}}" readonly class="form-control" id="username">
                </div>
                <div class="col-md-6">
                  <label for="email" class="form-label text-white">E-mail</label>
                  <input type="text" value="{{ $user->email}}" readonly class="form-control" id="email">
                </div>
                <div class="col-6">
                  <label for="phone" class="form-label text-white">Phone Number</label>
                  <input type="text" value="{{ $user->phone}}" name="phone" required class="form-control" id="phone" placeholder="">
                </div>
                <div class="col-6">
                  <label for="gender" class="form-label text-white">Gender</label>
                  <select name="gender" required class="form-control select2" id="gender" placeholder="">
                    <option value="">Select</option>
                    <option <?php echo $user->gender == 'male' ? 'selected' : '' ?> value="male">Male</option>
                    <option <?php echo $user->gender == 'female' ? 'selected' : '' ?> value="female">Fe-Male</option>
                    <option <?php echo $user->gender == 'transgender' ? 'selected' : '' ?> value="transgender">Transgender</option>
                  </select>
                </div>
                <div class="col-md-6">
                  <label for="country" class="form-label text-white">Country</label>
                  <select class="form-select select2" name="country" id="country" required>
                    <option value="">Select country</option>
                    @foreach($countries as $country)
                    <option <?php echo $country->id == $user->country ? 'selected' : '' ?> value="{{$country->id}}">{{$country->name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-md-6">
                  <label for="state" class="form-label text-white">State</label>
                  <select class="form-select select2" name="state" id="state">
                    <option value="">Select State</option>
                    @foreach($states as $state)
                    <option <?php echo $state->id == $user->state ? 'selected' : '' ?> value="{{$state->id}}">{{$state->name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-md-6">
                  <label for="city" class="form-label text-white">City</label>
                  <select class="form-select select2" name="city" id="city">
                    <option value="">Select City</option>
                    @foreach($cities as $city)
                    <option <?php echo $city->id == $user->city ? 'selected' : '' ?> value="{{$city->id}}">{{$city->name}}</option>
                    @endforeach

                  </select>
                </div>
                <div class="col-md-6">
                  <label for="zip" class="form-label text-white">Zip Code</label>
                  <input type="text" value="{{ $user->zip}}" name="zip" required class="form-control" id="zip">
                </div>
                <div class="col-6">
                  <label for="dob" class="form-label text-white">Date of Birth</label>
                  <input type="date" max="{{date('Y-m-d',strtotime('-18 years'))}}" value="{{ $user->dob}}" name="dob" required class="form-control" id="dob">
                </div>
                <div class="col-6">
                  <label for="gender" class="form-label text-white">Sexual preference</label>
                  <select name="sexual_preference" required class="form-control select2" id="sexual_preference" placeholder="">
                    <option value="">select</option>
                    <option <?php echo $user->sexual_preference == 'male' ? 'selected' : '' ?> value="male">Male</option>
                    <option <?php echo $user->sexual_preference == 'female' ? 'selected' : '' ?> value="female">Fe-Male</option>
                    <option <?php echo $user->sexual_preference == 'transgender' ? 'selected' : '' ?> value="transgender">Transgender</option>
                  </select>
                </div>
                <div class="col-md-6">
                  <label for="height" class="form-label text-white">Height</label>
                  <select class="form-select select2" name="height" id="height" required>
                    <option value="">Select</option>
                    @foreach($heights as $height)
                    <option <?php echo $height->id == $user->height ? 'selected' : '' ?> value="{{$height->id}}">{{$height->in_inch}} / {{$height->in_cm}} CM</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-md-6">
                  <label for="weight" class="form-label text-white">Weight</label>
                  <select class="form-select select2" name="weight" id="weight" required>
                    <option value="">Select</option>
                    @foreach($weights as $weight)
                    <option <?php echo $weight->id == $user->weight ? 'selected' : '' ?> value="{{$weight->id}}">{{$weight->in_ibs}} IBS / {{$weight->in_kg}} KG</option>
                    @endforeach
                  </select>
                </div>

                <div class="col-md-6">
                  <label for="hair_colour" class="form-label text-white">Hair</label>
                  <select class="form-select select2" name="hair_colour" id="hair_colour" required>
                    <option value="">Select</option>
                    @foreach($hair_colours as $hair_colour)
                    <option <?php echo $hair_colour->id == $user->hair_colour ? 'selected' : '' ?> value="{{$hair_colour->id}}">{{$hair_colour->title}}</option>
                    @endforeach
                  </select>
                </div>

                <div class="col-md-6">
                  <label for="eyes_color" class="form-label text-white">Eyes</label>
                  <select class="form-select select2" name="eyes_color" id="eyes_color" required>
                    <option value="">Select</option>
                    @foreach($eyes_colors as $eyes_color)
                    <option <?php echo $eyes_color->id == $user->eyes_color ? 'selected' : '' ?> value="{{$eyes_color->id}}">{{$eyes_color->title}}</option>
                    @endforeach
                  </select>
                </div>

                <div class="col-md-6">
                  <label for="ethnicity" class="form-label text-white">Ethnicity</label>
                  <select class="form-select select2" name="ethnicity" id="ethnicity" required>
                    <option value="">Select</option>
                    @foreach($ethnicitys as $ethnicity)
                    <option <?php echo $ethnicity->id == $user->ethnicity ? 'selected' : '' ?> value="{{$ethnicity->id}}">{{$ethnicity->title}}</option>
                    @endforeach
                  </select>
                </div>

                <div class="col-md-6">
                  <label for="public_hair" class="form-label text-white">Public Hair</label>
                  <select class="form-select select2" name="public_hair" id="public_hair" required>
                    <option value="">Select</option>
                    @foreach($public_hairs as $public_hair)
                    <option <?php echo $public_hair->id == $user->public_hair ? 'selected' : '' ?> value="{{$public_hair->id}}">{{$public_hair->title}}</option>
                    @endforeach
                  </select>
                </div>

                <div class="col-md-6">
                  <label for="bust" class="form-label text-white">Bust</label>
                  <select class="form-select select2" name="bust" id="bust" required>
                    <option value="">Select</option>
                    @foreach($busts as $bust)
                    <option <?php echo $bust->id == $user->bust ? 'selected' : '' ?> value="{{$bust->id}}">{{$bust->title}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-md-6">
                  <label for="state" class="form-label text-white">Tags</label>
                  <?php
                  $user_tags = [];
                  if($user->tags){
                    $user_tags = explode(',',$user->tags);
                  }
                  ?>
                  <select class="form-select select2" multiple="multiple" name="tags[]" id="tags">
                
                    @foreach($tags as $tag)
                    <option <?php echo in_array($tag->id,$user_tags) ? 'selected' : '' ?> value="{{$tag->id}}">{{$tag->title}}</option>
                    @endforeach
                  </select>
                </div>

                <div class="col-md-12">
                  <label for="about_me" class="form-label text-white">Amount Me</label>
                  <textarea class="form-control textarea" name="about_me" id="about_me" required><?php echo $user->about_me; ?></textarea>
                </div>

                <div class="col-12">
                  <label for="profile_image" class="form-label text-white">Profile Avatar</label>
               
                  
                  <div class="text-white">
                    @if($user->profile_image)
                    <img src="{{ asset($user->profile_image)}}" width="40px;">
                    @else
                    <img src="{{ asset('img/profile.png')}}" width="40px;">
                    @endif
                    <br>  <input type="file"name="profile_image"  id="profile_image">
                  <br> Image size limit: 2MB. Accepted formats: JPEG, JPG and PNG</div>
                </div>
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
            url: "{{url('update-profile')}}",
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

    $(document).ready(function(){
      $('#country').on('change',function(){
        let country_id = $(this).val();
        if(country_id){
          $.ajax({
            type: 'GET',
            url: "{{url('state-by-country')}}",
            data: {country_id:country_id},
            dataType: 'JSON',
            success: function(resp) {
                
               if(resp.data.length > 0){
                  var html = '<option value="">Select State</option>'
                  for (let i = 0; i < resp.data.length; i++) {
                    html += '<option value="'+resp.data[i].id+'">'+resp.data[i].name+'</option>';
                  }

                  $('#state').html(html)

               } else {
                $('#state').html('');
                $('#city').html('');
               }

               $('#state').select2();
               $('#city').select2();
            }
        });
        } else {
          $('#state').html('');
          $('#city').html('');
          $('#state').select2();
          $('#city').select2();
        }
        
        return false;
      })

      $('#state').on('change',function(){
        let state_id = $(this).val();
        if(state_id){
          $.ajax({
            type: 'GET',
            url: "{{url('city-by-state')}}",
            data: {state_id:state_id},
            dataType: 'JSON',
            success: function(resp) {
                
              if(resp.data.length > 0){
                  var html = '<option value="">Select City</option>'
                  for (let i = 0; i < resp.data.length; i++) {
                    html += '<option value="'+resp.data[i].id+'">'+resp.data[i].name+'</option>';
                  }

                  $('#city').html(html)

               } else {
                $('#city').html('');
               }
               $('#city').select2();
            }
        });
        } else {
          $('#city').html('');
          $('#city').select2();
        }
        
        return false;
      })
    })
</script>
@endsection

@section('footer')
@include('user.inner-layouts.footer')
@endsection