@extends('user.inner-layouts.app')

@section('title', 'Edit Video')

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
            <h3 class="mt-3 text-white page-ttl pb-3 mb-4">Edit Video</h3>
            <div class="row">
                <div class="col-xl-12">
                    <form class="row g-3" id="form-1" onsubmit="return submit_form_step1()">
                        @csrf
                        <div class="error">
                            @if (session()->has('message'))

                            <?php echo session()->get('message'); ?>

                            @endif
                        </div>
                        <div class="col-md-12">
                            <label for="title" class="form-label text-white">Title</label>
                            <input type="text" class="form-control" value="{{$gallery->title}}" required name="title" id="title">
                        </div>

                        <div class="col-md-4">
                            <label for="video" class="form-label text-white">Video</label>
                            <input type="file" accept="video/*" name="video" class="form-control" id="video">
                            <div class="text-white">
                                <br>
                                @if($gallery->video)

                                <video width="100%" controls>
                                    <source src="{{ asset($gallery->video)}}" poster="{{ asset($gallery->thumb)}}" type="video/mp4">
                                </video>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="trailer" class="form-label text-white">Trailer</label>
                            <input type="file" accept="video/*" name="trailer" class="form-control" id="trailer">
                            <div class="text-white">
                                <br>
                                @if($gallery->trailer)

                                <video width="100%" controls>
                                    <source src="{{ asset($gallery->trailer)}}" poster="{{ asset($gallery->thumb)}}" type="video/mp4">
                                </video>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="thumb" class="form-label text-white">Thumbnail</label>
                            <input type="file" accept="image/*" name="thumb" class="form-control" id="thumb">
                            <div class="text-white">
                                <br>
                                @if($gallery->thumb)
                                <img src="{{ asset($gallery->thumb)}}" width="100%" height="150">
                                @endif
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label for="inputCity" class="form-label text-white">Status</label>
                            <div class="form-check">
                                <input class="form-check-input" value="1" <?= ($gallery->status == 1) ? 'checked' : '' ?> type="radio" name="status" id="status1">
                                <label class="form-check-label text-white" for="status1">
                                    Active
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" value="2" <?= ($gallery->status == 2) ? 'checked' : '' ?> type="radio" name="status" id="status2">
                                <label class="form-check-label text-white" for="status2">
                                    Draft
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" value="0" <?= ($gallery->status == 0) ? 'checked' : '' ?> type="radio" name="status" id="status0">
                                <label class="form-check-label text-white" for="status0">
                                    Inactive
                                </label>
                            </div>

                        </div>
                        <div class="col-md-4">
                            <label for="inputCity1" class="form-label text-white">Is Paid</label>
                            <div class="form-check">
                                <input class="form-check-input" value="2" <?= ($gallery->is_free == 2) ? 'checked' : '' ?> type="radio" name="is_free" id="is_free2">
                                <label class="form-check-label text-white" for="is_free2">
                                    Yes
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" <?= ($gallery->is_free == 1) ? 'checked' : '' ?> value="1" type="radio" name="is_free" id="is_free1">
                                <label class="form-check-label text-white" for="is_free1">
                                    No
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4 " style="display:<?= ($gallery->is_free == 1) ? 'none' : 'block' ?>">
                            <label for="file" class="form-label text-white">Credit</label>
                            <input type="number" value="{{$gallery->credits}}" <?= ($gallery->is_free == 1) ? '' : 'min="1" required' ?> name="credits" class="form-control" id="credits">
                        </div>
                        <div class="col-md-12">
                            <label for="description" class="form-label text-white">Description</label>
                            <textarea class="form-control textarea" id="description" name="description">{{$gallery->description}}</textarea>
                            <input type="hidden" required name="id" value="{{$gallery->id}}">
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary submit-btn-1">Save Changes</button> &nbsp;
                            <a href="{{route('my-gallery')}}" class="btn btn-primary">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>

<script>
    $(document).ready(function() {
        $('input[name="is_free"]').change(function() {
            var selectedValue = $('input[name="is_free"]:checked').val();
            if (selectedValue == 1) {
                $("#credits").parent('div').hide();
                $("#credits").removeAttr('required');
                $("#credits").removeAttr('min');
            } else {
                $("#credits").parent('div').show();
                $("#credits").attr('min', 1);
                $("#credits").attr('required', 'required');
            }
        });
    });

    function submit_form_step1() {

        if (!$('#description').val()) {
            Swal.fire({

                title: "Error!",
                text: 'Please add description',
                icon: "error",
                showCancelButton: false,
                allowOutsideClick: true,
            });
            return false;
        }


        let formData = new FormData($('#form-1')[0]);
        console.log(formData);
        $.ajax({
            type: 'POST',
            url: "{{url('update-video')}}",
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
                            window.location.href = "{{route('my-video')}}"
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