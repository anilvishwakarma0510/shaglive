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
                      
                        <h3 class="mt-3 text-white page-ttl pb-3 mb-4">Pending Model</h3>
                       <!--  <button class="btn btn-primary btn-xs createEventModal" data-bs-toggle="modal" data-bs-target="#createEventModal">Add</button> -->
                        <div class="row">
                              @if( Session::has('message')) 

                                  
                                    <?php echo Session::get('message') ?>


                                  @endif
                           <div class="col-sm-12 bg-light pt-4 pb-3 data-t">
                                <table class="display DataTable" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>S.no. </th>
                                                <th>Name </th>
                                                <th>email</th>
                                                <th>Gender</th>
                                                <th>Phone</th>
                                                <th>View</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                          if($data){
                                            $cnt=0;
                                            foreach($data as $data_val){
                                              $cnt++;
                                              $country = App\Models\CountryModel::where('id',$data_val->country)->get()->first();
                                              $state = App\Models\StateModel::where('id',$data_val->state)->get()->first();
                                              $city = App\Models\CityModel::where('id',$data_val->city)->get()->first();
                                              $Height = App\Models\HeightModel::where('id',$data_val->height)->get()->first();
                                              $weight = App\Models\WeightModel::where('id',$data_val->weight)->get()->first();
                                              $hair_color = App\Models\HairModel::where('id',$data_val->hair_colour)->get()->first();
                                              $eyes = App\Models\EyesModel::where('id',$data_val->eyes_color)->get()->first();
                                              $ethnicity = App\Models\EthinicityModel::where('id',$data_val->ethnicity)->get()->first();
                                              $public_hair = App\Models\PublicHairModel::where('id',$data_val->public_hair)->get()->first();
                                              $bust = App\Models\BustModel::where('id',$data_val->bust)->get()->first();
                                              ?>
                                              <tr><td>{{$cnt}}</td>
                                                <td>{{$data_val->username ." ".$data_val->first_name." ".$data_val->last_name}}</td>
                                                <td>{{$data_val->email}}</td>
                                                <td>{{$data_val->gender}}</td>
                                                <td>{{$data_val->phone}}</td>
                                                <td><!-- <button class="btn btn-primary btn-sm editEventModal" data-bs-toggle="modal" data-bs-target="#editEventModal<?php echo $data_val->id; ?>">View</button>  -->
                                                	<a href="{{url('admin/view-user-details?id='.$data_val->id)}}" class="btn btn-sm btn-primary">View</a>
                                                	<a href="{{url('admin/accept-user-request?id='.$data_val->id)}}" class="btn btn-sm btn-info" onclick="return confirm('Are you sure？')">Accept</a> <button class="btn btn-primary btn-sm editModal" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $data_val->id; ?>">Reject</button> </td>
                                              </tr>

                                               <div id="editModal<?php echo $data_val->id; ?>" class="modal fade"  aria-labelledby="myModalLabel1" aria-hidden="true">
                                              <div class="modal-dialog">
                                                  <div class="modal-content">
                                                      <div class="modal-header">
                                                          <h4 id="myModalLabel1"> Reason</h4>                
                                                          <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">x</button>
                                                      </div>      
                                                          <form method="post" onsubmit="return editCategory(this, event, <?= $data_val['id']; ?>)" id="editCategory" >
                                                              @csrf
                                                          <div class="modal-body">   
                                                          
                                                                  <div class="form-group">
                                                                    <label class="control-label">Reason</label>
                                                                    <input type="hidden" class="form-control" name="user_id" value="{{$data_val->id}}" >
                                                                      <textarea class="form-control" name="reason" required></textarea>
                                                                  </div> 
                                                                    
                                                              </div>
                                                           <div class="modal-footer">
                                                              <button type="button" class="btn" data-bs-dismiss="modal" aria-hidden="true">Cancel</button>
                                                              <button type="submit" id="editBtn<?php echo $data_val->id ; ?>" class="btn btn-primary" >Add</button>
                                                            
                                                          </div>
                                                      </form> 
                                                  </div>
                                              </div>
                                          </div>  

                                              <div id="editEventModal<?php echo $data_val->id; ?>" class="modal fade"  aria-labelledby="myModalLabel1" aria-hidden="true">
                                              <div class="modal-dialog modal-lg">
                                                  <div class="modal-content">
                                                      <div class="modal-header">
                                                          <h4 id="myModalLabel1"> View</h4>                
                                                          <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">x</button>
                                                      </div>  
                                                        <div id="MessageErrAddEmp"></div>        
                                                          <div class="modal-body">   
                                                           
                                                          <div class="row">
                                                              <div class="col-md-3">
                                                                  <p>Username</p>
                                                              </div>
                                                             <div class="col-md-9">
                                                                 <p>{{$data_val->username}}</p>
                                                                
                                                              </div>
                                                              <div class="col-md-3">
                                                                <p>Full name</p>
                                                              </div>
                                                               <div class="col-md-9">
                                                                <p>{{$data_val->first_name. " ".$data_val->last_name}}</p>
                                                              </div>
                                                               <div class="col-md-3">
                                                                <p>Email</p>
                                                              </div>
                                                               <div class="col-md-9">
                                                                 <p>{{$data_val->email}}</p>
                                                              </div>
                                                              <div class="col-md-3">
                                                                   <p>Date of birth</p>
                                                              </div>
                                                               <div class="col-md-9">
                                                                   <p><?php if(!empty($data_val->dob)){ echo $data_val->dob ;}else{ echo "";} ?></p>
                                                              </div>
                                                              <div class="col-md-3">
                                                                 <p>Gender</p>
                                                              </div>
                                                               <div class="col-md-9">
                                                                  <p>{{$data_val->gender}}</p>
                                                              </div>
                                                               <div class="col-md-3">
                                                                  <p>Phone</p>
                                                              </div>
                                                               <div class="col-md-9">
                                                                  <p><?php if(!empty($data_val->phone)){ echo $data_val->phone;}else{echo "";} ?></p>
                                                              </div>
                                                              <div class="col-md-3">
                                                                   <p>Phone code</p>
                                                              </div>
                                                               <div class="col-md-9">
                                                                  <p><?php if(!empty($data_val->phone_code)){ echo $data_val->phone_code;}else{ echo "";} ?></p>
                                                              </div>
                                                               <div class="col-md-3">
                                                                  <p>Country</p>
                                                              </div>
                                                               <div class="col-md-9">
                                                                   <p><?php if(!empty($country->name)){ echo $country->name ;}else{ echo "";} ?></p>
                                                              </div>
                                                               <div class="col-md-3">
                                                                   <p>State</p>
                                                              </div>
                                                               <div class="col-md-9">
                                                                   <p><?php if(!empty($state->name)){ echo $state->name ;}else{ echo "";} ?></p>
                                                              </div>
                                                              <div class="col-md-3">
                                                                   <p>City</p>
                                                              </div>
                                                               <div class="col-md-9">
                                                                   <p><?php if(!empty($city->name)){ echo $city->name ;}else{ echo "";} ?></p>
                                                              </div>
                                                              <div class="col-md-3">
                                                                   <p>Zip</p>
                                                              </div>
                                                               <div class="col-md-9">
                                                                   <p><?php if(!empty($data_val->zip)){ echo $data_val->zip ;}else{ echo "";} ?></p>
                                                              </div>
                                                              <div class="col-md-3">
                                                                   <p>Height</p>
                                                              </div>
                                                               <div class="col-md-9">
                                                                   <p><?php if(!empty($Height->in_cm)){ echo $Height->in_cm." cm" ;}else{ echo "";} ?></p>
                                                              </div>
                                                              <div class="col-md-3">
                                                                   <p>Weigth</p>
                                                              </div>
                                                               <div class="col-md-9">
                                                                   <p><?php if(!empty($weight->in_kg)){ echo $weight->in_kg ." kg" ;}else{ echo "";} ?></p>
                                                              </div>
                                                              <div class="col-md-3">
                                                                   <p>Hair color</p>
                                                              </div>
                                                               <div class="col-md-9">
                                                                   <p><?php if(!empty($hair_color->title)){ echo $hair_color->title ;}else{ echo "";} ?></p>
                                                              </div>
                                                              <div class="col-md-3">
                                                                   <p>Eye Color</p>
                                                              </div>
                                                               <div class="col-md-9">
                                                                   <p><?php if(!empty($eyes->title)){ echo $eyes->title ;}else{ echo "";} ?></p>
                                                              </div>
                                                              <div class="col-md-3">
                                                                   <p>Ethnicity</p>
                                                              </div>
                                                               <div class="col-md-9">
                                                                   <p><?php if(!empty($ethnicity->title)){ echo $ethnicity->title ;}else{ echo "";} ?></p>
                                                              </div>
                                                              <div class="col-md-3">
                                                                   <p>Public hair</p>
                                                              </div>
                                                               <div class="col-md-9">
                                                                   <p><?php if(!empty($public_hair->title)){ echo $public_hair->title ;}else{ echo "";} ?></p>
                                                              </div>
                                                              <div class="col-md-3">
                                                                   <p>Bust</p>
                                                              </div>
                                                               <div class="col-md-9">
                                                                   <p><?php if(!empty($bust->title)){ echo $bust->title ;}else{ echo "";} ?></p>
                                                              </div>
                                                              <div class="col-md-3">
                                                                   <p>Facebook</p>
                                                              </div>
                                                               <div class="col-md-9">
                                                                   <p><?php if(!empty($data_val->facebook)){ echo $data_val->facebook ;}else{ echo "";} ?></p>
                                                              </div>
                                                              <div class="col-md-3">
                                                                   <p>Instagram</p>
                                                              </div>
                                                               <div class="col-md-9">
                                                                   <p><?php if(!empty($data_val->insta)){ echo $data_val->insta ;}else{ echo "";} ?></p>
                                                              </div>
                                                              <div class="col-md-3">
                                                                   <p>Twitter</p>
                                                              </div>
                                                               <div class="col-md-9">
                                                                   <p><?php if(!empty($data_val->twitter)){ echo $data_val->twitter ;}else{ echo "";} ?></p>
                                                              </div>
                                                               <div class="col-md-3">
                                                                   <p>Address</p>
                                                              </div>
                                                               <div class="col-md-9">
                                                                   <p><?php if(!empty($data_val->address)){ echo $data_val->address ;}else{ echo "";} ?></p>
                                                              </div>
                                                              <div class="col-md-3">
                                                                   <p>About me</p>
                                                              </div>
                                                               <div class="col-md-9">
                                                                   <p><?php if(!empty($data_val->about_me)){ echo $data_val->about_me ;}else{ echo "";} ?></p>
                                                              </div>
                                                              <div class="col-md-3">
                                                                   <p>User id document(Open {{ $data_val->id_doc }})</p>
                                                              </div>
                                                               <div class="col-md-9">
                                                                   <p><?php if(!empty($data_val->user_id_doc)){ 
                                                                    ?>
                                                                    <a href="{{ url('/public') }}/{{ $data_val->user_id_doc }}" class="btn btn-sm btn-danger" download>Download</a>
                                                                    
                                                                    <?php
                                                                   }else{ echo "";} ?></p>
                                                              </div>
                                                              <div class="col-md-3">
                                                                   <p>User addreess document(Open {{ $data_val->address_doc }})</p>
                                                              </div>
                                                               <div class="col-md-9">
                                                                   <p><?php if(!empty($data_val->user_address_doc)){ 
                                                                    ?>
                                                                    <a href="{{ url('/public') }}/{{ $data_val->user_address_doc}}" class="btn btn-sm btn-danger" download>Download</a>
                                                                     
                                                                    <?php
                                                                   }else{ echo "";} ?></p>
                                                              </div>
                                                          </div>
                                                           
                                                           <div class="modal-footer">
                                                              <button type="button" class="btn" data-bs-dismiss="modal" aria-hidden="true">Cancel</button>
                                                              
                                                          </div>
                                                     
                                                  </div>
                                              </div>
                                          </div>
                                              <?php
                                            }
                                          }
                                        ?> 
                                        </tbody>
                                    </table>
                           </div>
                        </div>
                    </div>
                </main>
            </div>
 
<script type="text/javascript">
  function editCategory(el, event, id) {
        event.preventDefault();
      $('.alert-danger').remove();
          var data = new FormData($(el)[0]);

    $.ajax({
        url: "{{route('admin.add-reason')}}",
        data: data,
        processData: false,
        contentType: false,
        type: 'POST',
        dataType:'json',
        beforeSend: function() {        
            $('#editbtn'+id).prop('disabled' , true);
            $('#editbtn'+id).text('Processing..');
          },
        success: function(result){
            $('#editbtn'+id).prop('disabled' , false);
            $('#editbtn'+id).text('Add');
            if(result.status == 1)
            {
              window.location.reload();
            }
            else
            {
              console.log(result.message);
             // $('#cat_err').html(result.message);
              for (var err in result.message) {
            
              $("[name='" + err + "']").after("<div  class='label alert-danger'>" + result.message[err] + "</div>");
              }
            }
        }
    });
        //var img_val_id =$("#img_val_id").val();

       
    return false;
  } 
</script>
@endsection

@section('footer')
@include('admin.layouts.footer')
@endsection