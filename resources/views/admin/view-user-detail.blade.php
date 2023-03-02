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
               
                <main class="" >
                    <div class="container-fluid px-4">
                      
                        <h3 class="mt-3 text-white page-ttl pb-3 mb-4">User detials</h3>
                       <!--  <button class="btn btn-primary btn-xs createEventModal" data-bs-toggle="modal" data-bs-target="#createEventModal">Add</button> -->
                        <div class="row">
                              @if( Session::has('message')) 

                                  
                                    <?php echo Session::get('message') ?>


                                  @endif
                 <div class="col-sm-12 bg-light pt-4 pb-3 data-t">
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

          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true"> Image</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Video</button>
            </li>
          
          </ul>

          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active bg-dark p-4" id="home" role="tabpanel" aria-labelledby="home-tab">
             
                <div class="col-12">
                  <label for="inputZip" class="form-label text-white text-white">Profile Avatar</label>
                  <div class="text-white">
                   
                </div>
             
            </div>
        
      </div>

      <div class="tab-pane fade bg-dark p-4" id="profile" role="tabpanel" aria-labelledby="profile-tab">
              <form class="">

                <div class="row">
                  <?php
                    if($video){
                      foreach ($video as $value) {
                       ?>
                       <div class="col-md-3">
                          <img style="height: 100px;width: 100px;" src="{{ url('/public') }}/{{ $value->thumb }}"><br>
                          <p><a href="{{url('admin/view-video-details?id='.$value->id)}}" class="btn bnt-sm btn-info">View</a></p>
                       </div>
                       <?php
                      }
                    }else{
                      ?>
                      <p>Data not found</p>
                      <?php
                    }
                  ?>
              
            </div>
              </form>
            </div>

        
                        </div>
                    </div>
                </main>
          </div>
 
<script type="text/javascript">
 
</script>
@endsection

@section('footer')
@include('admin.layouts.footer')
@endsection