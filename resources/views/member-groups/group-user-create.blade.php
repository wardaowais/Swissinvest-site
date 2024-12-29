@extends('layouts.app')

@section('content')
    <div class="main-content">
       
        <div class="my-dashboard">
<div class="marquee-area">
                  <ul>
                    <li><span>Page Feature :</span></li>
                    <li><p><marquee behavior="" direction=""> {{ translate('Add new members to the Group') }}</marquee></p></li>
                  </ul>
        </div>
                <div class="row mb-4 mt-4">
                    <div class="col-md-12">
                        <!-- dash content -->
                        <div class="dash-content">
                            <!-- hading -->
                            <div class="heading">
                                <h4>{{ translate('Members Details') }}</h4>
                            </div>
                            <!-- end heading -->
                
                            <!-- booking list -->
                            <div class="booking-list mt-4" style="background: #E8F1F5;">
                                <!-- connect box -->
                                <div class="connect-box">
                                    <form id="create-job-form" style="background-color: transparent; padding: 0px 25px;" action="{{ route('storeGroupMember') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                        <div class="row mb-2">
                                            <div class="col-md-6" style="margin-bottom: 15px !important;"> 
                                            <div class="form-group">
                                                <label for="colFormLabelSm" class="col-sm-12 col-md-12 col-lg-12 col-form-label col-form-label-sm">{{ translate('First Name') }} <span>*</span></label>
                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                    <input class="add-new-member-input" type="text" id="first_name" name="first_name" placeholder="{{ translate('Name') }}" required />
                                                </div>
                                              </div>
                                            </div>
                                            <div class="col-md-6"> 
                                                <div class="form-group">
                                                    <label for="colFormLabelSm" class="col-sm-12 col-md-12 col-lg-12 col-form-label col-form-label-sm">{{ translate('Last Name') }} <span>*</span></label>
                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                        <input class="add-new-member-input" type="text" id="last_name" name="last_name"
                                        placeholder="{{ translate('Name') }}" required />
                                                    </div>
                                                  </div>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-md-6" style="margin-bottom: 15px !important;"> 
                                            <div class="form-group">
                                                <label for="colFormLabelSm" class="col-sm-12 col-md-12 col-lg-12 col-form-label col-form-label-sm">{{ translate('Profile picture') }} <span>*</span></label>
                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                    <input class="add-new-member-input" type="file" id="last_name" name="profile_picture"
                                        placeholder="{{ translate('Name') }}" required />
                                                </div>
                                              </div>
                                            </div>
                                            <div class="col-md-6"> 
                                                <div class="form-group">
                                                    <label for="colFormLabelSm" class="col-sm-12 col-md-12 col-lg-12 col-form-label col-form-label-sm">{{ translate('Member Title') }} <span>*</span></label>
                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                        <select class="add-new-member-input" id="title" name="title" required>
					                                        <option value="">{{ translate('Select title') }}</option>
					                                        @foreach ($titles as $title)
					                                            <option value="{{ $title->name }}">{{ $title->name }}</option>
					                                        @endforeach
					                                    </select>
                                                        
                                                    </div>
                                                  </div>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-md-6" style="margin-bottom: 15px !important;"> 
                                            <div class="form-group">
                                                <label for="colFormLabelSm" class="col-sm-12 col-md-12 col-lg-12 col-form-label col-form-label-sm">{{ translate('Email') }} <span>*</span></label>
                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                    <input class="add-new-member-input" type="email" id="email" name="email"
                                        placeholder="{{ translate('email') }}" required/>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="col-md-6"> 
                                                <div class="form-group">
                                                    <label for="colFormLabelSm" class="col-sm-12 col-md-12 col-lg-12 col-form-label col-form-label-sm">{{ translate('Mobile Phone number') }} <span>*</span></label>
                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                        <input class="add-new-member-input" type="text" id="phone" name="phone"
                                        placeholder="{{ translate('+41XX XXX XX XX') }}"
                                        pattern="^\+41[0-9]{2}\s[0-9]{3}\s[0-9]{2}\s[0-9]{2}$"
                                        title="Please enter the phone number in the format +41XX XXX XX XX" required />
                                        <small class="form-text text-muted"><b>{{ translate('Note') }}</b>:
                                        {{ translate('Phone number will not show on web') }} &amp;
                                        {{ translate('Please follow the number format') }} +41XX XXX XX XX</small>
                                                    </div>
                                                  </div>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-md-6" style="margin-bottom: 15px !important;"> 
                                            <div class="form-group">
                                                <label for="colFormLabelSm" class="col-sm-12 col-md-12 col-lg-12 col-form-label col-form-label-sm">{{ translate('New Patients') }} <span>*</span></label>
                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                    <select class="add-new-member-input" id="new_patient" name="new_patient" required>
				                                        <option value="">{{ translate('Select new patient') }}</option>
				                                        <option value="1">{{ translate('Accepted') }}</option>
				                                        <option value="0">{{ translate('Not Accepted') }}</option>
				                                    </select>
                                                    
                                                </div>
                                              </div>
                                            </div>
                                            <div class="col-md-6"> 
                                                <div class="form-group">
                                                    <label for="colFormLabelSm" class="col-sm-12 col-md-12 col-lg-12 col-form-label col-form-label-sm">{{ translate('Gender') }} <span>*</span></label>
                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                        <select class="add-new-member-input" id="gender" name="gender" required>
					                                        <option value="male">{{ translate('Male') }}</option>
					                                        <option value="female">{{ translate('Female') }}</option>
					                                    </select>
                                                       
                                                    </div>
                                                  </div>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-md-6" style="margin-bottom: 15px !important;"> 
                                            <div class="form-group">
                                                <label for="colFormLabelSm" class="col-sm-12 col-md-12 col-lg-12 col-form-label col-form-label-sm">{{ translate('Country') }}</label>
                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                    <select class="add-new-member-input" id="country" name="country">
				                                        @foreach ($countries as $country)
				                                            <option value="{{ $country->id }}">{{ translate($country->name) }}</option>
				                                        @endforeach
				                                    </select>
                                                    
                                                </div>
                                              </div>
                                            </div>
                                            <div class="col-md-6"> 
                                                <div class="form-group">
                                                    <label for="colFormLabelSm" class="col-sm-12 col-md-12 col-lg-12 col-form-label col-form-label-sm">{{ translate('Language') }} <span>*</span></label>
                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                        <select class="add-new-member-input" id="js--languages-multi-select" name="language[]"
					                                        multiple="multiple" required>
					                                        @foreach ($languages as $language)
					                                            <option value="{{ $language->id }}">{{ translate($language->name) }}</option>
					                                        @endforeach
					                                    </select>
                                                    </div>
                                                  </div>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-md-6" style="margin-bottom: 15px !important;"> 
                                            <div class="form-group">
                                                <label for="colFormLabelSm" class="col-sm-12 col-md-12 col-lg-12 col-form-label col-form-label-sm">{{ translate('City') }} <span>*</span></label>
                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                    <select class="add-new-member-input" id="city" name="city" required>
				                                        @foreach ($cities as $city)
				                                            <option value="{{ $city->id }}">{{ translate($city->name) }}</option>
				                                        @endforeach
				                                    </select>
                                                    
                                                </div>
                                              </div>
                                            </div>
                                            <div class="col-md-6"> 
                                                <div class="form-group">
                                                    <label for="colFormLabelSm" class="col-sm-12 col-md-12 col-lg-12 col-form-label col-form-label-sm">{{ translate('Address') }} <span>*</span></label>
                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                        <input class="add-new-member-input" type="text" id="address" name="address" required />
                                                    </div>
                                                  </div>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-md-6" style="margin-bottom: 15px !important;"> 
                                            <div class="form-group">
                                                <label for="colFormLabelSm" class="col-sm-12 col-md-12 col-lg-12 col-form-label col-form-label-sm">{{ translate('Postal code') }} <span>*</span></label>
                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                    <input class="add-new-member-input" type="text" id="postal_code" name="postal_code"
                                        required />
                                                </div>
                                              </div>
                                            </div>
                                            <div class="col-md-6"> 
                                                <div class="form-group">
                                                    <label for="colFormLabelSm" class="col-sm-12 col-md-12 col-lg-12 col-form-label col-form-label-sm">{{ translate('Building Number') }} <span>*</span></label>
                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                        <input class="add-new-member-input" type="text" id="house_number" name="house_number"
                                        required />
                                                    </div>
                                                  </div>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-md-6" style="margin-bottom: 15px !important;"> 
                                            <div class="form-group">
                                                <label for="colFormLabelSm" class="col-sm-12 col-md-12 col-lg-12 col-form-label col-form-label-sm">{{ translate('Date of Birth') }}</label>
                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                    <input class="add-new-member-input" type="date" id="age" name="age" />
                                                </div>
                                              </div>
                                            </div>
                                            <div class="col-md-6"> 
                                                <div class="form-group">
                                                    <label for="colFormLabelSm" class="col-sm-12 col-md-12 col-lg-12 col-form-label col-form-label-sm">{{ translate('Specialty') }} <span>*</span></label>
                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                        <select class="add-new-member-input" id="specialties" name="specialties" required>
					                                        @foreach ($specialties as $specialty)
					                                            <option value="{{ $specialty->id }}">{{ translate($specialty->name) }}
					                                            </option>
					                                        @endforeach
					                                    </select>
                                                        
                                                    </div>
                                                  </div>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-md-6" style="margin-bottom: 15px !important;"> 
                                            <div class="form-group">
                                                <label for="colFormLabelSm" class="col-sm-12 col-md-12 col-lg-12 col-form-label col-form-label-sm">{{ translate('Extra Specialties') }}</label>
                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                    <select class="add-new-member-input" id="js--specialties-multi-select" name="speciality[]"
				                                        multiple="multiple" required>
				                                        @foreach ($diseases as $disease)
				                                            <option value="{{ $disease->name }}">{{ translate($disease->name) }}</option>
				                                        @endforeach
				                                    </select>
                                                    
                                                </div>
                                              </div>
                                            </div>
                                            <div class="col-md-6"> 
                                                <div class="form-group">
                                                    <label for="colFormLabelSm" class="col-sm-12 col-md-12 col-lg-12 col-form-label col-form-label-sm">{{ translate('Expertises') }} <span>*</span></label>
                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                        <select class="add-new-member-input" id="js--sxpertise-multi-select" name="sxpertise[]"
					                                        multiple="multiple" required>
					                                        @foreach ($expertises as $expertise)
					                                            <option value="{{ $expertise->id }}">{{ translate($expertise->name) }}
					                                            </option>
					                                        @endforeach
					                                    </select>
                                                        
                                                    </div>
                                                  </div>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-sm-12 col-md-12 col-lg-12"> 
                                            <div class="form-group">
                                                <label for="colFormLabelSm" class="col-sm-12 col-md-12 col-lg-12 col-form-label col-form-label-sm">{{ translate('Notes') }}</label>
                                                <div class="col-12 col-md-12 col-lg-12">
                                                    <textarea class="textArea-content bg-white create-job-h-160" id="about_me" name="about_me" placeholder="{{ translate('Write more about you') }}" cols="30" rows="10" ></textarea>
                                                </div>
                                              </div>
                                              <div class="d-flex justify-content-end add-member-btn">
                                               <button class="btn btn-danger">Submit</button>
                                              </div>
                                            </div>
                                        </div>

                                      </form>
                                </div>
                                <!-- end connect box -->
                            </div>
                            <!-- end booking list -->
                        </div>
                        <!-- end dash content -->
                    </div>
                </div>
   
                <div class="section_top_img col-12">
		            <img src="{{ asset('assets/doctor-panel/imgs/dashboard/bottom-banners.jpeg') }}" alt="" class="img-fuild">
		        </div>
             </div>
       
    </div>
@endsection
@section('scripts')
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Select2 JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            // Select2 initialization
            $('#js--specialties-multi-select').select2({
                tags: true,
                tokenSeparators: [',', ' '],
                placeholder: "Add Specialties",
                allowClear: true
            });
            $('#js--sxpertise-multi-select').select2({
                tags: true,
                tokenSeparators: [',', ' '],
                placeholder: "Add Specialties",
                allowClear: true
            });
            $('#js--languages-multi-select').select2({
                tags: true,
                tokenSeparators: [',', ' '],
                placeholder: "Add Languages",
                allowClear: true
            });
        });
    </script>
@endsection
