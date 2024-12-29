@props([
    /** @var \App\Models\User */
    'user'
])

<!-- doc profile -->
<div class="doc-profile text-center shadow">
    <div class="doc-profile-inner">
        <img src="{{ asset($user->profile_pic ? 'images/users/' . $user->profile_pic : 'assets/img/profile-img.jpg') }}"
             class="img-fluid doc-image" style="width:50%; margin-bottom: 15px;"
             alt="{{$user->first_name}} {{$user->last_name}}">
        <h2>{{$user->first_name}} {{$user->last_name}}</h2>
        @foreach (explode(',', $user->specialties) as $specialtyId)
            @php
                $specialty = App\Models\Specialty::find($specialtyId);
            @endphp
            @if ($specialty)
                <h6>{{ $specialty->name }}</h6>
            @endif
        @endforeach

        @php
            $verification = \App\Models\Verification::where('user_id', $user->id)->latest()->first();
        @endphp

        @if($verification)
            <div class="d-flex justify-content-center align-items-center verify-section mt-2">
                <h5 class="mb-0 mr-2" style="color:#01A773">Verified</h5>
                <img src="{{asset('assets/doctor-panel/imgs/approved.png')}}" alt="Verified Icon" style="width:12%"
                     class="verify-icon">
            </div>
        @endif
    </div>

    <!-- Submenu -->
    <ul class="submenu list-unstyled mt-4">
        <li class="submenu-item">
            <a href="{{route('user.profile')}}" class="d-flex justify-content-between align-items-center">
                {{translate('Doctor Details')}} <i class="fa-solid fa-angle-right"></i>
            </a>
        </li>
        <li class="submenu-item">
            <a href="{{route('passwordview')}}" class="d-flex justify-content-between align-items-center">
                {{translate('Change Password')}} <i class="fa-solid fa-angle-right"></i>
            </a>
        </li>
        <li class="submenu-item">
            <a href="{{route('doctorTimeSlot')}}" class="d-flex justify-content-between align-items-center">
                {{translate('Time Slot Management')}} <i class="fa-solid fa-angle-right"></i>
            </a>
        </li>
        <li class="submenu-item">
            <a href="{{route('doctorLocationUpdate')}}" class="d-flex justify-content-between align-items-center">
                {{translate('Location Details')}} <i class="fa-solid fa-angle-right"></i>
            </a>
        </li>
        <li class="submenu-item">
            <a href="{{route('doctorFaq')}}" class="d-flex justify-content-between align-items-center">
                {{translate('FAQ’s')}} <i class="fa-solid fa-angle-right"></i>
            </a>
        </li>
        <li class="submenu-item">
            <a href="" class="d-flex justify-content-between align-items-center">
                Reviews <i class="fa-solid fa-angle-right"></i>
            </a>
        </li>
        <li class="submenu-item">
            <a href="" class="d-flex justify-content-between align-items-center">
                Boost Your Account <i class="fa-solid fa-angle-right"></i>
            </a>
        </li>
        <li class="submenu-item">
            <a href="" class="d-flex justify-content-between align-items-center">
                Documents <i class="fa-solid fa-angle-right"></i>
            </a>
        </li>
    </ul>
</div>
<!-- End doc profile -->
