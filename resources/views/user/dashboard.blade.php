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
      <h3 class="mt-3 text-white page-ttl pb-3 mb-4">My Profile</h3>
      <div class="row">
        <div class="col-xl-12">
        
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Profile Image</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">My Profile</button>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="profile-tab" href="{{route('profile')}}" role="tab" aria-controls="profile" aria-selected="false">Edit Profile</a>
            </li>
          </ul>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active bg-dark p-4" id="home" role="tabpanel" aria-labelledby="home-tab">
              <form class="row g-3">
                <div class="col-12">
                  <label for="inputZip" class="form-label text-white text-white">Profile Avatar</label>
                  <div class="text-white">
                    @if($user->profile_image)
                    <img src="{{ asset($user->profile_image)}}" width="40px;">
                    @else
                    <img src="{{ asset('img/profile.png')}}" width="40px;">
                    @endif
                   </div>
                </div>
              </form>
            </div>
            <div class="tab-pane fade bg-dark p-4" id="profile" role="tabpanel" aria-labelledby="profile-tab">
              <form class="row g-3">
                <div class="col-md-12">
                  <div class="col-sm-12">
                    <table>
                      <tbody>
                        <tr>
                          <th class="text-white">Username</th>
                          <td class="text-white">{{ucfirst($user->username)}}</td>
                        </tr>
                        <tr>
                          <th class="text-white">Gender</th>
                          <td class="text-white">{{ucfirst($user->gender)}}</td>
                        </tr>
                        <tr>
                          <th class="text-white">Member Since </th>
                          <td class="text-white">{{date('M d, Y',strtotime($user->created_at))}}</td>
                        </tr>
                        <tr>
                          <th class="text-white">Last Broadcast</th>
                          <td class="text-white">Friday, May 21, 2021 2:05 PM</td>
                        </tr>
                        <tr>
                          <th class="text-white">Date Of Birth</th>
                          <td class="text-white">{{date('M d, Y',strtotime($user->dob))}}</td>
                        </tr>
                        <tr>
                          <th class="text-white">Country</th>
                          <td class="text-white">{{$country ? $country->name : '' }}</td>
                        </tr>
                        <tr>
                          <th class="text-white">State</th>
                          <td class="text-white">{{$state ? $state->name : '' }}</td>
                        </tr>
                        <tr>
                          <th class="text-white">City</th>
                          <td class="text-white">{{$city ? $city->name : '' }}</td>
                        </tr>
                        <tr>
                          <th class="text-white">Ethnicity</th>
                          <td class="text-white">{{$ethnicity ? $ethnicity->title : '' }}</td>
                        </tr>
                        
                        <tr>
                          <th class="text-white">Height</th>
                          <td class="text-white">{{$height ? $height->in_inch.' ('.$height->in_cm.' cm)' : '' }} </td>
                        </tr>
                        <tr>
                          <th class="text-white">Weight</th>
                          <td class="text-white">{{$weight ? $weight->in_ibs.' ibs ('.$weight->in_kg.' kg)' : '' }} </td>
                        </tr>
                        <tr>
                          <th class="text-white">Eyes</th>
                          <td class="text-white">{{$eyes_color ? $eyes_color->title : '' }}</td>
                        </tr>
                        <tr>
                          <th class="text-white">Hair</th>
                          <td class="text-white">{{$hair_colour ? $hair_colour->title : '' }}</td>
                        </tr>
                        <tr>
                          <th class="text-white">Public Hair</th>
                          <td class="text-white">{{$public_hair ? $public_hair->title : '' }}</td>
                        </tr>
                        <tr>
                          <th class="text-white">Bust</th>
                          <td class="text-white">{{$bust ? $bust->title : '' }}</td>
                        </tr>
                        <tr>
                          <th class="text-white">Sexual preference</th>
                          <td class="text-white">{{ucfirst($user->sexual_preference)}}</td>
                        </tr>
                        <tr>
                          <th class="text-white">Facebook</th>
                          <td class="text-white">{{ucfirst($user->facebook)}}</td>
                        </tr>
                        <tr>
                          <th class="text-white">Twitter</th>
                          <td class="text-white">{{ucfirst($user->twitter)}}</td>
                        </tr>
                        <tr>
                          <th class="text-white">Instagram</th>
                          <td class="text-white">{{ucfirst($user->insta)}}</td>
                        </tr>
                      </tbody>
                    </table>
                    <h5 class="mt-3 text-white">About {{$user->username}}</h5>
                    <div class="text-white">{{$user->about_me}}</div>
                    <div>
                      <b class="text-white">What We do on webcam</b>
                      <br>
                      @if(!empty($tags))
                      @foreach($tags as $tag)
                        #{{$tag->title}} 
                      @endforeach
                      @endif
                    </p>
                    <p>
                      <b class="text-white">Working hours of {{$user->username}}</b>
                    </p>
                    <p>
                      @foreach($days as $day)
                      @if($day['status'])
                      {{$day['weekName']}} <b class="text-white">{{date('h:i A',strtotime($day['open_time']))}} - {{date('h:i A',strtotime($day['close_time']))}}</b> &nbsp;
                      @else
                      {{$day['weekName']}} <b class="text-white">N/A</b> &nbsp;
                      @endif
                      <br>
                      @endforeach
                    </p>
                  </div>
                </div>
              </form>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </main>
</div>
@endsection

@section('footer')
@include('user.inner-layouts.footer')
@endsection