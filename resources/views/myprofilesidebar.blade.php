<div class="doc-profile text-center shadow">
<ul class="submenu  mt-4">
    <li><a href="{{route('user.profile')}}" class="{{ request()->routeIs('user.profile') ? 'active' : '' }}">{{translate('Doctor Details')}} <span><i class="fa-solid fa-angle-right"></i></span></a></li>
    <li><a href="{{route('passwordview')}}" class="{{ request()->routeIs('passwordview') ? 'active' : '' }}">{{translate('Change Password')}} <span><i class="fa-solid fa-angle-right"></i></span></a></li>
    <li><a href="{{route('doctorTimeSlot')}}" class="{{ request()->routeIs('doctorTimeSlot') ? 'active' : '' }}">{{translate('Time Slot Management')}} <span><i class="fa-solid fa-angle-right"></i></span></a></li>
    <li><a href="{{route('doctorLocationUpdate')}}" class="{{ request()->routeIs('doctorLocationUpdate') ? 'active' : '' }}">{{translate('Location Details')}}<span><i class="fa-solid fa-angle-right"></i></span></a></li>
    <li><a href="{{route('doctorFaq')}}" class="{{ request()->routeIs('doctorFaq') ? 'active' : '' }}">{{translate("FAQ's")}}<span><i class="fa-solid fa-angle-right"></i></span></a></li>
    <li><a href="{{route('reviwes')}}" class="{{ request()->routeIs('reviwes') ? 'active' : '' }}">{{translate('Reviwes')}}<span><i class="fa-solid fa-angle-right"></i></span></a></li>
    <li><a href="{{route('accountBoost')}}" class="{{ request()->routeIs('accountBoost') ? 'active' : '' }}">{{translate('Boost your account')}}<span><i class="fa-solid fa-angle-right"></i></span></a></li>
    @if ($user->payment_method != null)
    <li><a href="{{ route('verification_form', ['id' => $user->id]) }}" class="{{ request()->routeIs('verification_form') ? 'active' : '' }}">{{ translate('Documents') }} <span><i class="fa-solid fa-angle-right"></i></span></a></li>
        @endif
    <!-- <li><a href="reviews.html">Reviews <span><i class="fa-solid fa-angle-right"></i></span></a></li> -->
</ul>
</div>