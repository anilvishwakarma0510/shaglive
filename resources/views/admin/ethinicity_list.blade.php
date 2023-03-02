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
                      
                        <h3 class="mt-3 text-white page-ttl pb-3 mb-4">Ethinicity</h3>
                        <button class="btn btn-primary btn-xs createEventModal" data-bs-toggle="modal" data-bs-target="#createEventModal">Add</button>
                        <div class="row">
                              @if( Session::has('message')) 

                                  <?php echo Session::get('message') ?>


                                @endif
                           <div class="col-sm-12 bg-light pt-4 pb-3 data-t">
                                <table id="test" class="display" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>S.no. </th>
                                                <th>Title </th>
                                                <th>Action</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php
                                          if($data){
                                            $cnt=0;
                                            foreach ($data as  $data_val) {
                                              $cnt++;
                                             ?>
                                             <tr>
                                              <td>{{$cnt}}</td>
                                                <td>{{$data_val->title}}</td>
                                                 <td>
                                                  <button class="btn btn-primary btn-sm editEventModal" data-bs-toggle="modal" data-bs-target="#editEventModal<?php echo $data_val->id; ?>">Edit</button>
                                   <a href="{{url('admin/delete-ethinicity?id='.$data_val->id)}}" onclick="return confirm('Are you sure?');" class="btn btn-sm btn-info">Delete</a></td>
                                             </tr>
                                                <div id="editEventModal<?php echo $data_val->id; ?>" class="modal fade"  aria-labelledby="myModalLabel1" aria-hidden="true">
                                              <div class="modal-dialog">
                                                  <div class="modal-content">
                                                      <div class="modal-header">
                                                          <h4 id="myModalLabel1"> Edit</h4>                
                                                          <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">x</button>
                                                      </div>  
                                                        <div id="MessageErrAddEmp"></div>        
                                                          <form method="post" onsubmit="return editCategory(this, event, <?= $data_val['id']; ?>)" id="editCategory" >
                                                              @csrf
                                                          <div class="modal-body">   
                                                          
                                                                  <div class="form-group">
                                                                    <label class="control-label">Title</label>
                                                                    <input type="hidden" name="id" value="{{$data_val->id}}" >
                                                                      <input type="text"class="form-control" name="title" value="{{$data_val->title}}" required />
                                                                  </div> 
                                                                    
                                                              </div>
                                                           <div class="modal-footer">
                                                              <button type="button" class="btn" data-bs-dismiss="modal" aria-hidden="true">Cancel</button>
                                                              <button type="submit" class="btn btn-primary" id="addEmpJobsBtn">Save</button>
                                                            
                                                          </div>
                                                      </form> 
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

    <div id="createEventModal" class="modal fade"  aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 id="myModalLabel1"> Add</h4>                
                <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">x</button>
            </div>  
              <div id="MessageErrAddEmp"></div>        
                <form method="post" onsubmit="return addCategory()" id="addCategory" >
                    @csrf
                <div class="modal-body">   
                
                        <div class="form-group">
                          <label class="control-label">Title</label>
                            <input type="text"class="form-control" name="title" required />
                        </div> 
                          
                    </div>
                 <div class="modal-footer">
                    <button type="button" class="btn" data-bs-dismiss="modal" aria-hidden="true">Cancel</button>
                    <button type="submit" class="btn btn-primary" id="addEmpJobsBtn">Save</button>
                  
                </div>
            </form> 
        </div>
    </div>
</div>  

<script type="text/javascript">
  

  function addCategory() {
        event.preventDefault();
    $('.alert-danger').remove();
        var data = new FormData($('#addCategory')[0]);
        //var img_val_id =$("#img_val_id").val();

        $.ajax({
              url: "{{route('admin.add-ethinicity')}}",
              data: data,
              processData: false,
              contentType: false,
              type: 'POST',
        dataType:'json',
        beforeSend: function() {        
            $('#addbtn').prop('disabled' , true);
            $('#addbtn').text('Processing..');
          },
              success: function(result){
            $('#addbtn').prop('disabled' , false);
            $('#addbtn').text('Add');
            if(result.status == 1)
            {
                 //console.log(result.message);
              window.location.reload();
            }
            else
            {
               // $('#img_err').html(result.message);
              console.log(result.message);
              for (var err in result.message) {
            
              $("[name='" + err + "']").after("<div  class='label alert-danger'>" + result.message[err] + "</div>");
              }
            }
        }
        });
    return false;
  } 



  function editCategory(el, event, id) {
        event.preventDefault();
      $('.alert-danger').remove();
          var data = new FormData($(el)[0]);

    $.ajax({
        url: "{{route('admin.edit-ethinicity')}}",
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
            $('#editbtn'+id).text('Update');
            if(result.status == 1)
            {
              window.location.reload();
            }
            else
            {
              console.log(result.message);
              $('#cat_err').html(result.message);
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