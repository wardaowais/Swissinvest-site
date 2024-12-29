@extends('layouts.app')

@section('content')
<style>

    .user-profile {
        text-align: center;
        margin-bottom: 20px;
    }

    .profile-header {
        display: inline-block;
        margin-bottom: 20px;
    }

    .member-profile-picture {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        object-fit: cover;
        margin-bottom: 10px;
    }

    .user-details {
        list-style-type: none;
        padding: 0;
        margin: 0;
        text-align: left;
        max-width: 400px;
        margin: 0 auto;
    }

    .user-details li {
        margin-bottom: 10px;
        font-size: 16px;
    }

    .user-details strong {
        font-weight: 600;
    }

    .btn-secondary {
        display: inline-block;
        margin-top: 20px;
        padding: 10px 20px;
        background-color: #6c757d;
        color: #fff;
        text-decoration: none;
        border-radius: 4px;
        transition: background-color 0.3s ease;
    }

    .btn-secondary:hover {
        background-color: #5a6268;
    }

    .dash-content {
        margin-top: 30px;
    }

    .fheading h4 {
        font-size: 20px;
        margin-bottom: 20px;
        text-align: center;
    }

    .document_single {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #calendar {
        border: 1px solid #ddd;
        border-radius: 8px;
        background-color: #fff;
    }
</style>
<div class="main-content">
       
        <div class="my-dashboard">
<div class="marquee-area">
                  <ul>
                    <li><span>Page Feature :</span></li>
                    <li><p><marquee behavior="" direction=""> Members can link their profile to other applications like
                                                Allomed (telemedicine) with a single click. All relevant data is
                                                transferred automatically,</marquee></p></li>
                  </ul>
        </div>
        <div class="row">
	        <div class="section_top_img col-12">
	            <img src="{{ asset('assets/doctor-panel/imgs/dashboard/main.png') }}" alt="" class="img-fuild">
	        </div>
        </div>
                <div class="row mb-4">
                    <div class="col-md-12">
                        <!-- dash content -->
                        <div class="dash-content">
                            <!-- hading -->
                            <div class="heading">
                                <h4>{{ translate('Member Details') }}</h4>
                            </div>
                            <!-- end heading -->
                
                            <!-- booking list -->
                            <div class="booking-list mt-4" style="background: #E8F1F5;">
                                <!-- connect box -->
                                <div class="connect-box">
                                @if(session('success'))
							    <div class="alert alert-success">
							        {{ session('success') }}
							    </div>
							    @elseif(session('error'))
							    <div class="alert alert-danger">
							        {{ session('error') }}
							    </div>
							    @endif
                                    <form id="create-job-form" action="{{ route('group.updateMember', encrypt($member->id)) }}" method="POST" enctype="multipart/form-data" style="background-color: transparent; padding: 0px 25px;">
                                       @csrf
                                        <div class="row mb-2">
                                            <div class="col-lg-6 col-md-6 mb-2">
                                                <div class="sync_cards">
                                                    <div class="member-content p-3" style="width: 95%;">
                                                        <div class="d-flex flex-column align-items-center justify-content-center">
                                                            <div class="memeber-img" style="margin: 25px auto;">
                                                                @if($member->profile_pic)
													            <img src="{{ asset('images/users/' . $member->profile_pic) }}" class="rounded-img">
													            @else
													            <img src="{{ asset('assets/img/profile-img.jpg') }}" class="rounded-img">
													            @endif
                                                                
                                                            </div>
                                                            <div class="member-text mt-2">
                                                                <h5 class="d-flex align-items-baseline justify-content-center">{{ $member->first_name }} {{ $member->last_name }}</h5>
                                                               <span class="d-flex align-items-baseline justify-content-center">
                                                                    <i class="fa fa-at" aria-hidden="true"></i>
                                                                    <p class="member-padding">{{ $member->email }}</p>
                                                              </span> 
                                                               <span class="d-flex align-items-baseline justify-content-center">
                                                                    <i class="fa fa-phone phone" aria-hidden="true"></i>
                                                                    <p class="member-padding">{{ $member->phone }}</p>
                                                               </span> 
                                                               <span class="d-flex align-items-baseline justify-content-center">
                                                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                                                    <p class="member-padding">{{ $member->address }}</p>
                                                               </span>
                                                               
                                                            </div> 
                                                        </div>    
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6"> 
                                                <div class="form-group mb-2">
                                                    <label for="colFormLabelSm" class="col-sm-12 col-md-12 col-lg-12 col-form-label col-form-label-sm">{{ translate('First Name') }} &nbsp;<span> *</span></label>
                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                        <input class="add-new-member-input" type="text" placeholder="{{ translate('First name') }}" name="first_name" value="{{ $member->first_name }}"/>
                                                    </div>
                                                  </div>
                                                <div class="form-groupmb mb-2">
                                                    <label for="colFormLabelSm" class="col-sm-12 col-md-12 col-lg-12 col-form-label col-form-label-sm">{{ translate('Last Name') }} &nbsp;<span> *</span></label>
                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                        <input class="add-new-member-input" type="text" placeholder="{{ translate('Name') }}" name="last_name" value="{{ $member->last_name }}" />
                                                    </div>
                                                  </div>
                                                  <div class="form-group mb-2">
                                                    <label for="colFormLabelSm" class="col-sm-12 col-md-12 col-lg-12 col-form-label col-form-label-sm">Upload Profile Picture:</label>
                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                        <input class="add-new-member-input" type="text" placeholder="Choose file" />
                                                    </div>
                                                  </div>
                                                  <div class="form-group mb-2">
                                                    <label for="colFormLabelSm" class="col-sm-12 col-md-12 col-lg-12 col-form-label col-form-label-sm">{{ translate('Member Title') }} &nbsp;<span> *</span></label>
                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                        <select name="title" required class="add-new-member-input">
		                                                    <option value="">{{translate('Select title')}}</option>
		                                                    @foreach ($titles as $title)
		                                                        <option value="{{ $title->name }}" {{ $member->title == $title->name ? 'selected' : '' }}>{{ $title->name }}</option>
		                                                    @endforeach
		                                                </select>
                                                        
                                                    </div>
                                                  </div>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-md-6" style="margin-bottom: 15px !important;"> 
                                            <div class="form-group">
                                                <label for="colFormLabelSm" class="col-sm-12 col-md-12 col-lg-12 col-form-label col-form-label-sm">{{translate('Email')}} &nbsp;<span> *</span></label>
                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                    <input class="add-new-member-input" type="email" name="email" placeholder="{{ translate('email') }}" value="{{ $member->email }}" />
                                                </div>
                                              </div>
                                            </div>
                                            <div class="col-md-6"> 
                                                <div class="form-group">
                                                    <label for="colFormLabelSm" class="col-sm-12 col-md-12 col-lg-12 col-form-label col-form-label-sm">{{translate('Website')}} &nbsp;<span> *</span></label>
                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                        <input class="add-new-member-input" type="text" name="web_url" placeholder="{{ translate('Your Website') }}" value="{{ $member->web_url }}" />
                                                    </div>
                                                  </div>
                                            </div>
                                            
                                        </div>
										<div class="row mb-2">
                                        	<div class="col-md-6"> 
                                                <div class="form-group">
                                                    <label for="colFormLabelSm" class="col-sm-12 col-md-12 col-lg-12 col-form-label col-form-label-sm">{{ translate('Mobile Phone number') }} &nbsp;<span> *</span></label>
                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                        <input class="add-new-member-input" type="text" placeholder="{{ translate('+41XX XXX XX XX') }}" 
                                                    name="phone" 
                                                    value="{{ $member->phone }}" 
                                                    pattern="^\+41[0-9]{2}\s[0-9]{3}\s[0-9]{2}\s[0-9]{2}$" 
                                                    title="Please enter the phone number in the format +41XX XXX XX XX"
                                                    required />
                                                    <span class="mobile-format"><b>{{translate('Note')}}</b>: {{translate('Phone number will not show on web')}}  &amp; {{translate('Please follow the number format')}} +41XX XXX XX XX</span>
                                                    </div>
                                                  </div>
                                            </div>
                                            <div class="col-md-6"> 
                                                <div class="form-group">
                                                    <label for="colFormLabelSm" class="col-sm-12 col-md-12 col-lg-12 col-form-label col-form-label-sm">{{ translate('Date Off Birth') }} &nbsp;<span> *</span></label>
                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                        <input class="add-new-member-input" type="date" id="age" name="age" class="form-control" value="{{ $member->age }}"
                                                    required />
                                                    
                                                    </div>
                                                  </div>
                                            </div>
                                         </div>   
                                        <div class="row mb-2">
                                        	
                                            <div class="col-md-6" style="margin-bottom: 15px !important;"> 
                                            <div class="form-group">
                                                <label for="colFormLabelSm" class="col-sm-12 col-md-12 col-lg-12 col-form-label col-form-label-sm">{{ translate('New Patients') }} &nbsp;<span> *</span></label>
                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                    <select name="new_patient" required class="add-new-member-input">
	                                                    <option value="">{{ translate('Select new patient') }}</option>
	                                                    <option value="1" {{ $member->patient_status == 1 ? 'selected' : '' }}>{{ translate('Accepted') }}</option>
	                                                    <option value="0" {{ $member->patient_status == 0 ? 'selected' : '' }}>{{ translate('Not Accepted') }}</option>
	                                                </select>

                                                    
                                                </div>
                                              </div>
                                            </div>
                                            <div class="col-md-6"> 
                                                <div class="form-group">
                                                    <label for="colFormLabelSm" class="col-sm-12 col-md-12 col-lg-12 col-form-label col-form-label-sm">{{ translate('Gender') }} &nbsp;<span> *</span></label>
                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                        <select name="gender" class="add-new-member-input">
			                                                <option value="male" {{ $member->gender === 'male' ? 'selected' : '' }}>{{ translate('Male') }}</option>
			                                                <option value="female" {{ $member->gender === 'female' ? 'selected' : '' }}>{{ translate('Female') }}</option>
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
                                                    <select name="country" class="add-new-member-input" >
		                                                @foreach($countries as $country)
		                                                    <option value="{{ $country->id }}" {{ in_array($country->id, explode(',', $member->country)) ? 'selected' : '' }}>
		                                                        {{translate($country->name)}}
		                                                    </option>
		                                                @endforeach
		                                            </select>
		                                                    
                                                </div>
                                              </div>
                                            </div>
                                            <div class="col-md-6"> 
                                                <div class="form-group">
                                                    <label for="colFormLabelSm" class="col-sm-12 col-md-12 col-lg-12 col-form-label col-form-label-sm">{{ translate('Language') }} &nbsp;<span style="color: #fc4b4b;"> *</span></label>
                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                        <select id="js--languages-multi-select" name="language[]" multiple="multiple" class="add-new-member-input">
			                                                @foreach($languages as $language)
			                                                    <option value="{{ $language->id }}" {{ in_array($language->id, explode(',', $member->language)) ? 'selected' : '' }}>
			                                                        {{translate($language->name)}}
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
                                                <label for="colFormLabelSm" class="col-sm-12 col-md-12 col-lg-12 col-form-label col-form-label-sm">{{ translate('Canton') }} &nbsp;<span> *</span></label>
                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                	<select name="canton" required class="add-new-member-input">
		                                                    <option value="">{{ translate('Select Canton') }}</option>
		                                                @foreach($cantons as $canton)
		                                                    <option value="{{ $canton->id }}" {{ in_array($canton->id, explode(',', $member->zip_code)) ? 'selected' : '' }}>
		                                                        {{ translate($canton->name) }}
		                                                    </option>
		                                                @endforeach
		                                            </select>
                                                    
                                                </div>
                                              </div>
                                            </div>
                                            <div class="col-md-6"> 
                                                <div class="form-group">
                                                    <label for="colFormLabelSm" class="col-sm-12 col-md-12 col-lg-12 col-form-label col-form-label-sm">{{ translate('City') }} &nbsp;<span> *</span></label>
                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                        <select name="city" class="add-new-member-input">
			                                                @foreach($cities as $city)
			                                                    <option value="{{ $city->id }}" {{ in_array($city->id, explode(',', $member->city)) ? 'selected' : '' }}>
			                                                        {{ translate($city->name) }}
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
                                                <label for="colFormLabelSm" class="col-sm-12 col-md-12 col-lg-12 col-form-label col-form-label-sm">{{ translate('Address') }} &nbsp;<span> *</span></label>
                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                    <input class="add-new-member-input" type="text" id="age" name="address"  value="{{ $member->address }}"/>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="col-md-6"> 
                                                <div class="form-group">
                                                    <label for="colFormLabelSm" class="col-sm-12 col-md-12 col-lg-12 col-form-label col-form-label-sm">{{ translate('Postal code') }} &nbsp;<span> *</span></label>
                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                        <input class="add-new-member-input" type="text"  id="age" name="postal_code"  value="{{ $member->postal_code}}" />
                                                    </div>
                                                  </div>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-md-6" style="margin-bottom: 15px !important;"> 
                                            <div class="form-group">
                                                <label for="colFormLabelSm" class="col-sm-12 col-md-12 col-lg-12 col-form-label col-form-label-sm">{{ translate('Building Number') }} &nbsp;<span> *</span></label>
                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                    <input class="add-new-member-input" type="text" id="age" name="house_number" value="{{ $member->house_number }}" />
                                                </div>
                                              </div>
                                            </div>
                                            <div class="col-md-6"> 
                                                <div class="form-group">
                                                    <label for="colFormLabelSm" class="col-sm-12 col-md-12 col-lg-12 col-form-label col-form-label-sm">{{ translate('Specialty') }} &nbsp;<span> *</span></label>
                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                        <select  name="specialties" class="add-new-member-input">
                                                        @foreach($specialties as $specialty)
				                                            <option value="{{ $specialty->id }}" {{ in_array($specialty->id, explode(',', $member->specialties)) ? 'selected' : '' }}>
				                                                            {{ translate($specialty->name) }}
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
                                                <label for="colFormLabelSm" class="col-sm-12 col-md-12 col-lg-12 col-form-label col-form-label-sm">{{ translate('Extra Specialties') }} &nbsp;<span style="color: #fc4b4b;"> *</span></label>
                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                    <select id="js--specialties-multi-select" class="add-new-member-input" name="speciality[]" multiple="multiple" required>
			                                            @foreach($diseases as $disease)
			                                            <option value="{{ $disease->name }}" {{ in_array($disease->name, explode(',', $member->speciality)) ? 'selected' : '' }}>
			                                                            {{ translate($disease->name) }}
			                                                        </option>
			                                            @endforeach
			                                        </select>
                                                    
                                                </div>
                                              </div>
                                            </div>
                                            <div class="col-md-6"> 
                                                <div class="form-group">
                                                    <label for="colFormLabelSm" class="col-sm-12 col-md-12 col-lg-12 col-form-label col-form-label-sm">{{ translate('Expertises') }} &nbsp;<span style="color: #fc4b4b;"> *</span></label>
                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                        <select id="js--sxpertise-multi-select" class="add-new-member-input" name="sxpertise[]" multiple="multiple" class="form-control" data-placeholder="Add Expertises" required>
			                                                @foreach($expertises as $expertise)
			                                                <option value="{{ $expertise->id }}" {{ in_array($expertise->id, explode(',', $member->sxpertise)) ? 'selected' : '' }}>
			                                                      {{ translate($expertise->name) }}
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
                                                <label for="colFormLabelSm" class="col-sm-12 col-md-12 col-lg-12 col-form-label col-form-label-sm">{{ translate('HIN Email') }}</label>
                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                    <input type="text" placeholder="{{ translate('Name') }}" class="add-new-member-input" name="hin_email" value="{{ $member->hin_email }}">
                                                    
                                                    
                                                </div>
                                              </div>
                                            </div>
                                            <div class="col-md-6"> 
                                                <div class="form-group">
                                                    <label for="colFormLabelSm" class="col-sm-12 col-md-12 col-lg-12 col-form-label col-form-label-sm">{{ translate('Telephone') }}</label>
                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                        <input 
                                                    type="text" 
                                                    placeholder="{{ translate('+41XX XXX XX XX') }}" 
                                                    name="fax_phone_number" 
                                                    value="{{ $member->fax_phone_number }}"
                                                     class="add-new-member-input" 
                                                     required
                                                    pattern="^\+41[0-9]{2}\s[0-9]{3}\s[0-9]{2}\s[0-9]{2}$" 
                                                    title="{{translate('Please enter the phone number in the format')}} +41XX XXX XX XX"
                                                   
                                                >
                                                 <span class="mobile-format"><b>{{translate('Note')}}</b>: {{translate('Please follow the number format')}} +41XX XXX XX XX</span>
                                                        
                                                    </div>
                                                  </div>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-6" style="margin-bottom: 15px !important;"> 
                                            <div class="form-group">
                                                <label for="colFormLabelSm" class="col-sm-12 col-md-12 col-lg-12 col-form-label col-form-label-sm">{{ translate('Fax number') }}</label>
                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                    <input type="text" 
                                                    placeholder="{{ translate('+41XX XXX XX XX') }}" 
                                                    name="fax_number" 
                                                    class="add-new-member-input" 
                                                     required
                                                    value="{{ $member->fax_number }}" 
                                                    pattern="^\+41[0-9]{2}\s[0-9]{3}\s[0-9]{2}\s[0-9]{2}$" 
                                                    title="Please enter the Fax number in the format +41XX XXX XX XX">
                                                    <span class="mobile-format"><b>{{translate('Note')}}</b>: {{translate('Please follow the number format')}} +41XX XXX XX XX</span>
                                                    
                                                </div>
                                              </div>
                                            </div>
                                            <div class="col-md-6"> 
                                                <div class="form-group">
                                                    <label for="colFormLabelSm" class="col-sm-12 col-md-12 col-lg-12 col-form-label col-form-label-sm">{{ translate('Telephone') }}</label>
                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                        <input 
                                                    type="text" 
                                                    placeholder="{{ translate('+41XX XXX XX XX') }}" 
                                                    name="fax_phone_number" 
                                                     required
                                                    value="{{ $member->fax_phone_number }}"
                                                     class="add-new-member-input" 
                                                    pattern="^\+41[0-9]{2}\s[0-9]{3}\s[0-9]{2}\s[0-9]{2}$" 
                                                    title="{{translate('Please enter the phone number in the format')}} +41XX XXX XX XX"
                                                   
                                                >
                                                 <span class="mobile-format"><b>{{translate('Note')}}</b>: {{translate('Please follow the number format')}} +41XX XXX XX XX</span>
                                                        
                                                    </div>
                                                  </div>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-sm-12 col-md-12 col-lg-12"> 
                                            <div class="form-group">
                                                <label for="colFormLabelSm" class="col-sm-12 col-md-12 col-lg-12 col-form-label col-form-label-sm">{{translate('Notes')}}</label>
                                                <div class="col-12 col-md-12 col-lg-12">
                                                    <textarea name="about_me" class="textArea-content bg-white create-job-h-160" cols="30" rows="12" id="about_me" placeholder="{{translate('Write more about you')}}" rows="8">{{ $member->about_me }}</textarea>
                                                    
                                                </div>
                                              </div>
                                              <div class="d-flex justify-content-end add-member-btn">
                                               <button class="btn btn-danger">Update</button>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Select2 JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script>
     document.querySelector('input[name="fax_phone_number"]').addEventListener('input', function(e) {
        const value = e.target.value;

        // Automatically convert leading 0 to +41
        if (value.startsWith('0') && value.length >= 10) {
            const newValue = '+41' + value.slice(1);
            e.target.value = newValue.replace(/(\d{2})(\d{3})(\d{2})(\d{2})/, '$1 $2 $3 $4');
        }

        const regex = /^\+41[0-9]{2}\s[0-9]{3}\s[0-9]{2}\s[0-9]{2}$/;
        if (value !== '' && !regex.test(value)) {
            e.target.setCustomValidity('Please enter the phone number in the format +41XX XXX XX XX');
        } else {
            e.target.setCustomValidity('');
        }
    });
    document.querySelector('input[name="fax_number"]').addEventListener('input', function(e) {
        const value = e.target.value;

// Automatically convert leading 0 to +41
        if (value.startsWith('0') && value.length >= 10) {
            const newValue = '+41' + value.slice(1);
            e.target.value = newValue.replace(/(\d{2})(\d{3})(\d{2})(\d{2})/, '$1 $2 $3 $4');
        }

        const regex = /^\+41[0-9]{2}\s[0-9]{3}\s[0-9]{2}\s[0-9]{2}$/;
        if (value !== '' && !regex.test(value)) {
            e.target.setCustomValidity('Please enter the phone number in the format +41XX XXX XX XX');
        } else {
            e.target.setCustomValidity('');
        }
    });
    document.querySelector('input[name="phone"]').addEventListener('input', function(e) {
        const value = e.target.value;

        // Automatically convert leading 0 to +41
        if (value.startsWith('0') && value.length >= 10) {
            const newValue = '+41' + value.slice(1);
            e.target.value = newValue.replace(/(\d{2})(\d{3})(\d{2})(\d{2})/, '$1 $2 $3 $4');
        }

        const regex = /^\+41[0-9]{2}\s[0-9]{3}\s[0-9]{2}\s[0-9]{2}$/;
        if (value !== '' && !regex.test(value)) {
            e.target.setCustomValidity('Please enter the phone number in the format +41XX XXX XX XX');
        } else {
            e.target.setCustomValidity('');
        }
    });

    document.querySelector('input[name="phone"]').addEventListener('invalid', function(e) {
        if (e.target.value === '') {
            e.target.setCustomValidity('');
        }
    });
    

</script>
<script>
$(document).ready(function() {

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
   
    $('#uploadIcon').on('click', function() {
                $('#imageUpload').click();
            });

            $('#imageUpload').on('change', function(e) {
                var file = e.target.files[0];
                if (file) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#imagePreview').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(file);

                    var formData = new FormData();
                    formData.append('profile_pic', file);
                    formData.append('member_id', '{{ encrypt($member->id) }}');
                  
                    
                    $.ajax({
                        url: '{{ route('group.uploadMemberProfilePic') }}',
                        type: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            if (response.success) {
                                $('#imagePreview').attr('src', response.profile_pic_url);
                                location.reload();
                            } else {
                                alert('Failed to update profile picture.');
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('Error:', error);
                            alert('An error occurred while uploading the profile picture.');
                        }
                    });
                }
            });
});


</script>

<script>
function closePopup() {
    document.getElementById('popup').style.display = 'none';
}

window.onload = function() {
    @if(session('success'))
        document.getElementById('popup-message').innerText = "{{ session('success') }}";
        document.getElementById('popup').style.display = 'block';
    @elseif(session('error'))
        document.getElementById('popup-message').innerText = "{{ session('error') }}";
        document.getElementById('popup').style.display = 'block';
    @endif
}
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
<script>
function refreshCalendar(userId) {
    $.ajax({
        url: '{{ route('group.user.timeSlot', $member->id) }}', 
        method: 'GET',
        success: function(response) {
            $('#calendar').fullCalendar('removeEvents');
            $('#calendar').fullCalendar('addEventSource', response);
            $('#calendar').fullCalendar('refetchEvents');
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
}

$(document).ready(function() {
    $('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'agendaWeek'
        },
        timeZone: 'local', 
        events: function(start, end, timezone, callback) {
            $.ajax({
                url: '{{ route('group.user.timeSlot', $member->id) }}',
                method: 'GET',
                success: function(response) {
                    callback(response);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        },
        slotDuration: '00:30:00',
        defaultView: 'agendaWeek',
        selectable: true,
        selectHelper: true,
        editable: true,
        eventLimit: true,
        slotEventOverlap: false,
        eventOverlap: false,
        minTime: '08:00:00',
        maxTime: '21:00:00',
        allDaySlot: false,
        select: function(start, end) {
            var startDateTime = start.format(); 
            var endDateTime = end.format();

            $.ajax({
                url: '{{ route('store.group.user.timeSlot', $member->id) }}',
                method: 'POST',
                data: {
                    start_datetime: startDateTime,
                    end_datetime: endDateTime,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    alert(response.message);
                    $('#calendar').fullCalendar('refetchEvents');
                    refreshCalendar(userId);
                },
                error: function(xhr, status, error) {
                    console.error(error); 
                    alert(xhr.responseJSON.message);
                }
            });

            $('#calendar').fullCalendar('unselect');
        },
        eventRender: function(event, element) {
            element.addClass('booked'); 
        },
        defaultDate: new Date()
    });
});
</script>
@endsection


