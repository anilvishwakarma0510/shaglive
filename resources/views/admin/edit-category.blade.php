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
                      
                        <h3 class="mt-3 text-white page-ttl pb-3 mb-4">Edit Category</h3>
                       
                        <div class="row">
                             @if( Session::has('message')) 

                                  <?php echo Session::get('message') ?>


                                @endif
                                 <div class="col-sm-12 bg-light pt-4 pb-3 data-t">
                                  <form method="post" onsubmit="return addCategory()" id="addCategory" >
                                   @csrf
                                  <div class="form-group">
                                    <label class="control-label">Name</label>
                                      <input type="hidden"class="form-control" value="{{$data->id}}" name="id">
                                      <input type="text"class="form-control" value="{{$data->name}}" name="name" required />
                                  </div>
                                  <div class="form-group">
                                    <label class="control-label">heading</label>
                                      <input type="text"class="form-control" name="heading" value="{{$data->heading}}" required />
                                  </div> 
                                  <div class="form-group">
                                    <label class="control-label">Description</label>
                                     <textarea class="form-control textarea" id="mytextarea" name="description">{{$data->descrition}}</textarea>
                                  </div>
                                  <div class="form-group">
                                    <label class="control-label">Footer description</label>
                                     <textarea class="form-control textarea" id="mytextarea2" name="footer_description">{{$data->footer_description}}</textarea>
                                  </div>
                                    <button type="submit" class="btn btn-primary" id="addEmpJobsBtn">Save</button>
                                  
                            </form>
                           </div>
                        </div>
                    </div>
                </main>
            </div>

<script src="https:////cdn.ckeditor.com/4.8.0/full-all/ckeditor.js"></script>

<script type="text/javascript">
        
    CKEDITOR.replace( 'mytextarea');
    CKEDITOR.editorConfig = function( config ){

    }

     CKEDITOR.replace( 'mytextarea2');
    CKEDITOR.editorConfig = function( config ){

    }
</script>
<script type="text/javascript">
  
  
  function addCategory() {
        event.preventDefault();
    $('.alert-danger').remove();
        var data = new FormData($('#addCategory')[0]);
        //var img_val_id =$("#img_val_id").val();
         var description = CKEDITOR.instances['mytextarea'].getData();
         var footer_description = CKEDITOR.instances['mytextarea2'].getData();
         data.append("description", description);
         data.append('footer_description',footer_description);
        $.ajax({
              url: "{{route('admin.update-category')}}",
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
            $('#addbtn').text('Save');
            if(result.status == 1)
            {
              window.location.href= "{{url('admin/category-list')}}";
                 //console.log(result.message);
              //window.location.reload();
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


</script>
@endsection

@section('footer')
@include('admin.layouts.footer')
@endsection