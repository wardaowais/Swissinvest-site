@extends('layouts.app')
@section('title')
    Create Blog
@endsection
@section('content')
<style type="text/css">
	.dropify-wrapper
	{
		    border-radius: 13px;
	}
	.dropify-wrapper .dropify-message p
	{
		font-size: 1.25rem;
	    color: #000;
	    font-weight: 500;
	}
	.card-body
	{
		height : auto;
	}
	 
</style>
<div id="content">
   <br><Br>
   <div class="container-fluid px-md-5">
      <div class="row">
    @include('adminPanel.inc.middleSidebar')

    <div class="col-md-9 mt-3">
        @if($errors->any())
    @foreach($errors->all() as $error)
       <p>{{$error}}</p>
    @endforeach

@endif
        <!-- dash content -->
        <div class="dash-content ">
            <div class="box border-none" style="padding-bottom: 0;">
                <form method="post" action="{{route('blog.save')}}" enctype="multipart/form-data">
                 @csrf
                <div class="card" style="background: #E8F1F5; border:none; border-radius:10px">
                <div class=" mt-3 card-header d-flex justify-content-between align-items-center text-center newcardheader" style="background:#00B2FF;border-radius:12px;height:4pc;margin-top: -10px !important;">
                   <h5 class="text-left" style="margin-top: -1%; text-align: left;">
                      <span style="position: relative; top: 10px; left: 1pc">Blog Details</span>
                   </h5>
                </div>
                <div class="container">
                    
                       
                        <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-1">
                                    <label for="blog_title" class="form-label fw-semibold">Blog Title <small class="text-danger">(*)</small></label>
                                    <input type="text" name="name" class="form-control" id="blog_title" placeholder="Blog Title" required>
                                </div>
                            </div>
 
                            <div class="col-lg-12">
                                <div class="mb-1">
                                    <label for="exampleInputPassword1" class="form-label fw-semibold">Short description <small class="text-danger">(*)</small></label>
                                    <textarea name="description" id="editor" class="form-control" placeholder="Short description" required></textarea>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="mb-1">
                                    <label for="exampleInputPassword1" class="form-label fw-semibold">Image <small class="text-danger">(*)</small></label>
                                    <input type="file" name="image" class="form-control dropify" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-1">
                                    <label for="exampleInputPassword1" class="form-label fw-semibold">Main Blog Content <small class="text-danger">(*)</small></label>
                                    <textarea name="main_content"  class="form-control" id="summernote" cols="7" rows="7" required></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-1">
                                    <label for="exampleInputPassword1" class="form-label fw-semibold">Status <small class="text-danger">(*)</small></label>
                                    <select name="status" id="" class="form-control" required="">
                                        <option value="1">Publish</option>
                                        <option value="2">Draft/Unpublished</option>
                                    </select>
                                </div>
                            </div>
                            <hr>
                            <div class="col-lg-12">
                                <div class="mb-1">
                                    <label for="exampleInputPassword1" class="form-label fw-semibold">Seo Description</label>
                                    <input type="text" name="seo_description" class="form-control" id="exampleInputtext" placeholder="seo description">
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="mb-1">
                                    <label for="exampleInputPassword1" class="form-label fw-semibold">Seo Tags</label>
                                    <input type="text" name="seo_tags" class="form-control" id="exampleInputtext" placeholder="seo_tags">
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="mb-1">
                                    <label for="exampleInputPassword1" class="form-label fw-semibold">Seo Keywords</label>
                                    <input type="text" name="seo_keywords" class="form-control" id="exampleInputtext" placeholder="seo keywords">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="gap-3 d-flex align-items-center" style="margin-top:10px;float:inline-end">
                                    <button class="btn btn-primary" style="background: #E50F25;border:none">Submit</button>
                                </div>
                            </div>
                        </div>
                        </div>
                    
                </div>
                </div>
                </form>
            </div>
        </div>
        <!-- end dash content -->
    </div>
    </div>  
    <div class="row">
        <div class="section_top_img col-md-12">
            <img src="{{ asset('assets/doctor-panel/imgs/dashboard/bottom-banners.jpeg') }}" alt="" class="img-fuild">
        </div> 
    </div>
</div>

</div>  
@endsection

@section('style')
    <link rel="stylesheet" href="{{asset('/')}}dropify/dist/css/dropify.min.css">
    <link rel="stylesheet" href="{{asset('panel_admin')}}/summernote/dist/summernote-lite.min.css">

@endsection
@section('script')
    <script src="{{asset('/')}}dropify/dist/js/dropify.min.js"></script>
    <script src="{{asset('panel_admin')}}/summernote/dist/summernote-lite.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 300,
                callbacks: {
                    onImageUpload: function(files) {
                        uploadImage(files[0]);
                    }
                }
            });

            function uploadImage(file) {
                let data = new FormData();
                data.append("image", file);
                $.ajax({
                    url: '{{ route('summernote.upload') }}',
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: data,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        console.log(response.data);
                        $('#summernote').summernote('insertImage', response.url);
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            }
        });
    </script>

    <script>
        $("#summernote1").summernote({
            height: 350, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            focus: false, // set focus to editable area after initializing summernote
        });
        $('.dropify').dropify({
            messages: {
                'default': 'Drag and drop a file here or click',
                'replace': 'Drag and drop or click to replace',
                'remove':  'Remove',
                'error':   'Ooops, something wrong happended.'
            }
        });
    </script>
@endsection
