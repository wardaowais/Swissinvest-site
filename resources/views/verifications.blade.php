@extends('layouts.app')
@section('content')
<style> 
     .profile-detail-pic {
    width: 170px;
    height: 170px;
    border-radius: 50%;
    object-fit: cover;
}
   
.doc-image {
    width: 100px; /* Set the width */
    height: 100px; /* Set the height */
    object-fit: cover; /* Ensure the image covers the area */
}

.dash-content form {
    background: #E8F1F5;
    margin-top: 1pc;
    padding: 20px;
    border-radius: 12px;
}
.image-grid {
    display: flex;
    flex-wrap: wrap;
    gap: 10px; /* space between images */
}

.grid-image {
    flex: 1 1 200px; /* adjust the width of images */
    max-width: 200px;
    height: auto; /* maintain aspect ratio */
    object-fit: cover;
    border: 1px solid #ccc;
    border-radius: 8px; /* optional rounded corners */
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* optional shadow */
}

.document_single {
    position: relative;
    margin: 20px 0;
    background: #fff;
    padding: 20px;
}
.document_single ol {
    display: flex;
    justify-content: space-between;
    margin-bottom: 10px;
}
.document_single ol li {
    font-weight: 600;
    font-size: 14px;
}
.document_single ol li button {
    background: transparent;
    border: none;
    color: rgb(255, 30, 30);
    font-weight: 600;
}
.document_single img {
    width: 100%;
    height: 180px;
    object-fit: contain;
}
.card-body
{
	height :auto;
}
input[type="file"]
{
	display : none
}
.document_single img {
    height: auto;
    object-fit: contain;
    justify-self: center;
}

.card-body {
    background-color: #e8f1f6;
    height: auto !important;
    border-radius: 10px;
    padding: 0;
    margin-left: 5px;
    margin-top: 1pc;
}
</style>

<div class="container-fluid px-md-5">
    <div class="marquee-area">
        <ul>
          <li><span>Page Feature:</span></li>
          <li><p><marquee behavior="" direction=""> Keeps members informed about relevant events and
                                      opportunities.</marquee></p></li>
                                          </ul>
    </div>
    <div class="row">
        <div class="col-md-3 mt-5">
            <h2>Documentation</h2>
            <!-- doc profile -->
			@include('myprofilesidebar')



        </div>

        <div class="col-md-9 p-1" style="margin-top: 6.5pc">
            <div class="row">
                <!-- Slider Section (8 columns wide) -->
                <div class="col-md-12">
                    <div class="card" style="background: #E8F1F5; border:none; border-radius:10px">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="doc-profile-inner d-flex align-items-center p-3">
                                    <img src="{{ asset($user->profile_pic ? 'images/users/' . $user->profile_pic : 'assets/img/profile-img.jpg') }}" class="img-fluid doc-image rounded-circle" alt="{{$user->first_name}} {{$user->last_name}}">
                                    <div class="ml-3" style="margin-left: 1pc">
                                        <h5>{{$user->first_name}} {{$user->last_name}}</h5>
                                        <h6>
                                        @foreach (explode(',', $user->specialties) as $specialtyId)
					                        @php
					                        $specialty = App\Models\Specialty::find($specialtyId);
					                        @endphp
					                        @if ($specialty)

					                        {{ $specialty->name }}
					                        @endif
					                        @endforeach
                                        </h6>
                                        <div class="d-flex justify-content-center align-items-center verify-section mt-2" style="margin-right: 3pc">
                                            

                                            <h6 class="mb-0 mr-2" style="color:#00B2FF">
                                            @php
                                            $verification = \App\Models\Verification::where('user_id', $user->id)->latest()->first();
                                   			@endphp
											@if (!$verification)
                                                {{translate('Verify documents')}}
                                            @elseif ($verification->verify_code == 'verified')
                                                <img src="{{ asset('assets/doctor-panel/imgs/verify.png') }}"  alt="Verified Icon"  class="verify-icon">
                                                    {{translate('Verified')}} 
                                                    
                                            @elseif ($verification->verify_code == 'progress')
                                                <{{translate('Verification in progress')}}
                                            @else
                                                {{translate('Verification in progress')}}
                                            @endif
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        <br>
        <form action="{{ route('verification.store') }}" method="POST" enctype="multipart/form-data" style="margin-top: -10px;">
                    @csrf
                        <div class="dash-content mt-1"  style="background: #E8F1F5;padding-top: 7px;border-radius:10px">
                            <div class="card-header d-flex justify-content-between align-items-center text-center newcardheader" style="background:#00B2FF;border-radius:12px;height:4pc;margin-top:-10px">
                                <h5 class="text-left" style="margin-top: -1%; text-align: left;">
                                    <span style="position: relative; top: 10px; left: 1pc">{{translate('Upload Documents')}}</span>
                                </h5>
                                <button type="submit" class="btn btn-secondary" style="background: #EB3C3C;position: relative; left: -1pc">{{translate('Verification Request')}}</button>
                            </div>
                            
                            
                                <div class="card" style="background: #E8F1F5; border:none; border-radius:10px">
                                   
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card-body">
                                              
                                                <div class="col-sm-12 ">
                                                    <!-- New Password Input Group -->
                                                    <div class="form-group">
                                                        <p><b>{{translate('Your ID')}}</b></p>
                                                        <div class="document_single">
                                                        	<input type="file" name="doctor_id_image" onchange="previewImage(this)">
                                    						<img src="{{ asset('assets/doctor-panel/imgs/3.png') }}" alt="" id="idImagePreview" style="width: 30%">
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <!-- Left-aligned button -->
                                                    <div class="col-md-6">
                                                        <button type="button" class="btn btn-primary float-left d-none" style="background: #00B2FF">Add</button>
                                                    </div>
                                                    <!-- Right-aligned button -->
                                                    <div class="col-md-6 text-right">
                                                        <button type="button" class="btn btn-secondary d-none" style="background: #EB3C3C;float:inline-end">Remove</button>
                                                    </div>
                                                </div>



                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <!-- Submit Button Row -->
                            
                           
                             
                        </div>
                        <div class="dash-content mt-2" style="background: #E8F1F5; border:none; border-radius:10px">
                            <div class="card-header text-center newcardheader" style="background:#00B2FF;border-radius:12px;height:4pc">
                                <h5 class="text-left" style="margin-top: -1%;    text-align: left;"><span style="    position: relative;top: 15px;left:1pc">Add Your License Or Certificate</span> </h5>
                            </div>
                            
                                <div class="card" style="background: #E8F1F5; border:none; border-radius:10px">
                                   
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card-body">
                                              
                                                <div class="col-sm-12 ">
                                                    <!-- New Password Input Group -->
                                                    <div class="form-group" id="additionalCertificates">
                                                        <p><b>License/ Certificate</b></p>
                                                        <div class="document_single">
                                   
                                                            <input type="file" name="certificates[]" onchange="previewImage(this)">
                                                                <div style="border:1px solid none;text-align:center;background:white;border-radius:13px">
                                                                    <br>
                                                                    <img src="{{asset('assets/img/Upload to the Cloud.png')}}" style="width:8%" alt="">
                                                                    <h5>Click here to upload your Document</h5>
                        
                                                                </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-5">
                                                    <!-- Left-aligned button -->
                                                    <div class="col-md-12 text-right" style="margin-bottom:10px">
                                                        <button type="button" class="btn btn-danger " onclick="addMoreCertificates()">Add</button>
                                                    </div>
                                                    <!-- Right-aligned button -->
                                                    <div class="col-md-6 text-right">
                                                        <button type="button" class="btn btn-secondary d-none" style="background: #EB3C3C;float:inline-end">Remove</button>
                                                    </div>
                                                </div>



                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                             
                        </div>
                         
                        <div class="col-md-12 mt-3">
			                <div class="image-grid">
			                    @if ($documents)
			                    <img src="{{ asset('images/documents/' . $documents->doctor_id_image) }}" class="grid-image">

			                    @foreach($documents->doctorCertificates as $certificate)
			                    <img src="{{ asset('images/documents/' . $certificate->image) }}" class="grid-image">
			                    @endforeach
			                    @else
			                    {{translate('No Documents are available')}}
			                    @endif
			                </div>
			            </div>
        </form>            
        
                </div>
            </div>
        </div>



    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="section_top_img  col-md-12">
            <img src="{{ asset('assets/doctor-panel/imgs/slider-footer.png') }}" alt="" class="img-fuild">
        </div>
    </div>
</div>
<script>
    function previewImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                // Set the uploaded image's source to the one just uploaded
                var imgElement = input.closest('.document_single').querySelector('img');
                imgElement.src = e.target.result;
                imgElement.style.display = 'block'; // Make sure the image is visible
                // Optionally hide the placeholder text after an image is uploaded
                var placeholderText = input.closest('.document_single').querySelector('.upload-placeholder');
                placeholderText.style.display = 'none';
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    function removeImage(button) {
        var documentSingle = button.closest('.document_single');
        var input = documentSingle.querySelector('input[type="file"]');
        input.value = ''; // Clear the input
        var defaultImage = '{{ asset('assets/doctor-panel/imgs/3.png') }}';
        if (input.name === 'certificates[]') {
            defaultImage = '{{ asset('assets/img/Upload to the Cloud.png') }}';
        }
        // Reset image source to the default
        documentSingle.querySelector('img').src = defaultImage;
        documentSingle.querySelector('img').style.display = 'block';
        documentSingle.querySelector('.upload-placeholder').style.display = 'block'; // Show the placeholder text
    }

    function addMoreCertificates() {
        var newCertificate = document.createElement('div');
        newCertificate.classList.add('document_single');
        newCertificate.innerHTML = `
            <ol>
                <li>Additional Certificate</li>
                <li><button type="button" onclick="removeImage(this)">Remove</button></li>
            </ol>
            <input type="file" name="certificates[]" onchange="previewImage(this)">
            <div style="border:1px solid black;text-align:center">
                <br>
                <img src="{{ asset('assets/img/Upload to the Cloud.png') }}" style="width:10%" alt="">
                <h5 class="upload-placeholder">Click here to upload your Document</h5>
                <br>
            </div>
        `;
        document.getElementById('additionalCertificates').appendChild(newCertificate);
    }
</script>
@endsection