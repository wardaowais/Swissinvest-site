@php
$sidebar = \App\Models\Personal::whereUserId(userLogin())->first();
@endphp
<style>
   input[type=checkbox] {
   height: 0;
   width: 0;
   visibility: hidden;
   }
   #content {
   width: 100%;
   flex-grow: 1;
   /* padding-left: 100px; */
   background-color: #fff;
   min-height: 100vh;
   margin-top: 0;
   }
   
   .fheading {
   margin-bottom: 20px;
   display: flex;
   background: #141B29;
   justify-content: space-between;
   color: white;
   padding: 1pc;
   }
   
   input:checked + label {
   background: #01A773;
   }
   input:checked + label:after {
   left: calc(100% - 3px);
   transform: translateX(-100%);
   }
   label:active:after {
   width: 34px; /* Adjusted width */
   }
   .card-header{
   background: #D9D9D966;
   }
   .home{
   margin-top: -2pc;
   margin-bottom: 2pc;
   }
   .submenu li {
   border-bottom: 1px solid rgb(202, 202, 202);
   padding: 18px 0;
   background: white;
   }
   .card-body{
   margin-top:-1pc;
   }
   .newcardheader{
   background: #141B29;
   width: -webkit-fill-available;
   color: white;
   height: 82px;
   font-size: 2pc;
   top: 1pc;
   margin-bottom: 1pc;
   }
   .input-field textarea {
   background: transparent;
   border: none;
   padding: 14px;
   width: 100%;
   resize: none;
   height: 150px;
   }
   .col{
    text-align: end;
   }
   @media only screen and (max-width:789px){
    .col{
    text-align:initial !important;
   }
   }
   .submenu li
   {
   	background : transparent !important
   }
</style>
<div class="col-md-3  mt-3 px-0">
            <!-- doc profile -->
    <div class="doc-profile shadow" style="margin-left: 30px">
       
       <ul class="submenu list-unstyled mt-4">
          <div class="card-header d-flex justify-content-between align-items-center text-center align-items-center newcardheader" style="background:#00B2FF;border-radius:12px;height:4pc;margin-top: -2pc;">
              <h5 class="text-center mb-0" >
                 <span >Home Page Setting</span>
              </h5>
           </div>
          
          @if(optional($sidebar)->slider_status == 1)
            <li class="submenu-item">
                <a href="{{ route('admin.slider.update') }}" class="{{ request()->routeIs('admin.slider.update') ? 'active' : '' }} d-flex justify-content-between align-items-center">
                    Slider Content <span><i class="fa-solid fa-angle-right"></i></span>
                </a>
            </li>

            {{-- <li class="submenu-item">
                <a href="{{ route('admin-slider.index') }}" class="{{ request()->routeIs('admin-slider.*') ? 'active' : '' }} d-flex justify-content-between align-items-center">
                    Slider <span><i class="fa-solid fa-angle-right"></i></span>
                </a> --}}
            </li>
          @endif
          
          @if(optional($sidebar)->about_status == 1)
            <li class="submenu-item">
                <a href="{{ route('admin.about.update') }}" class="{{ request()->routeIs('admin.about.update') ? 'active' : '' }} d-flex justify-content-between align-items-center">
                    About Section <span><i class="fa-solid fa-angle-right"></i></span>
                </a>
            </li>
         @endif
         @if(optional($sidebar)->working_hours_status == 1)
            <li class="submenu-item">
                <a href="{{ route('admin.work.update') }}" class="{{ request()->routeIs('admin.work.update') ? 'active' : '' }} d-flex justify-content-between align-items-center">
                    Working Hours Content <span><i class="fa-solid fa-angle-right"></i></span>
                </a>
            </li>
            {{-- <li class="submenu-item">
                <a href="{{ route('admin-work.index') }}" class="{{ request()->routeIs('admin-work.*') ? 'active' : '' }} d-flex justify-content-between align-items-center">
                    Working Hours <span><i class="fa-solid fa-angle-right"></i></span>
                </a>
            </li> --}}
        @endif
         @if(optional($sidebar)->our_service_status == 1)
            <li class="submenu-item">
                <a href="{{ route('admin.service.update') }}" class="{{ request()->routeIs('admin.service.update') ? 'active' : '' }} d-flex justify-content-between align-items-center">
                    Services Content <span><i class="fa-solid fa-angle-right"></i></span>
                </a>
            </li>



            {{-- <li class="submenu-item">
                <a href="{{ route('admin-services.index') }}" class="{{ request()->routeIs('admin-services.*') ? 'active' : '' }} d-flex justify-content-between align-items-center">
                    Services <span><i class="fa-solid fa-angle-right"></i></span>
                </a>
            </li> --}}
        @endif
         @if(optional($sidebar)->blog_header_status == 1)
                <li>
                    <a href="{{ route('admin.blog.update') }}" class="{{ request()->routeIs('admin.blog.update') ? 'active' : '' }} d-flex justify-content-between align-items-center">
                        Blog Content <span><i class="fa-solid fa-angle-right"></i></span>
                    </a>
                </li>

                {{-- <li>
                    <a href="{{ route('blog.list') }}" class="{{ request()->routeIs('blog.*') ? 'active' : '' }} d-flex justify-content-between align-items-center">
                        Blog <span><i class="fa-solid fa-angle-right"></i></span>
                    </a>
                </li> --}}
            @endif

            @if(optional($sidebar)->contact_status == 1)
            <li>
                <a href="{{route('admin.contact.update')}}" class="{{ request()->routeIs('admin.contact.update') ? 'active' : '' }} d-flex justify-content-between align-items-center">
                    Contact Section Content <span><i class="fa-solid fa-angle-right"></i></span>
                </a>
            </li>
                {{-- <li>
                    <a href="{{route('contact.message')}}" class="{{ request()->routeIs('contact.message') ? 'active' : '' }} d-flex justify-content-between align-items-center">
                        Contact Message <span><i class="fa-solid fa-angle-right"></i></span>
                    </a>
                </li> --}}

               
            @endif

            @if(optional($sidebar)->social_status == 1)
            <li>
                <a href="{{ route('update-socials-links') }}" class="{{ request()->routeIs('update-socials-links') ? 'active' : '' }} d-flex justify-content-between align-items-center">
                    Update Social Links <span><i class="fa-solid fa-angle-right"></i></span>
                </a>
            </li>
            @endif

            {{-- @if(optional($sidebar)->section_status == 1)
            <li>
                <a href="{{ route('admin-section.index') }}" class="{{ request()->routeIs('admin-section.*') ? 'active' : '' }} d-flex justify-content-between align-items-center">
                    Section <span><i class="fa-solid fa-angle-right"></i></span>
                </a>
            </li>
            @endif --}}
   


            <li>
                <a href="{{route('admin.setting')}}" class="{{ request()->routeIs('admin.setting') ? 'active' : '' }} d-flex justify-content-between align-items-center">
                    Website Setting <span><i class="fa-solid fa-angle-right"></i></span>
                </a>
            </li>
            @php
            $admin = auth()->user();
            $user = $admin->user;

            @endphp
            <li>
                <a href="{{ route('home.user', ['id' =>  $user->id, 'first_name' =>   $user->first_name, 'last_name' =>   $user->last_name]) }}" target="_blank" class="{{ request()->routeIs('home.user') ? 'active' : '' }} d-flex justify-content-between align-items-center">
                    View Website <span><i class="fa-solid fa-angle-right"></i></span>
                </a>
            </li>
       </ul>
    </div>
    <!-- end doc profile --><br>
    <!--<h4>ADS HERE</h4>
    <img src="{{asset('assets/img/doc.png')}}" alt="" >-->
 </div>