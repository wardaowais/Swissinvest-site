@foreach ($users as $user)
<div class="cards_sec mb-3 user-list">
    <div class="row">
        <div class="col-lg-9">
            <div class="d-flex">
                <div class="user_icon">
                    @if($user->profile_pic)
                        <img src="{{ asset('images/users/' . $user->profile_pic) }}" class="rounded-circle ms-1" height="40px" width="40px">
                    @else
                        <img src="{{ asset('images/users/avatar.jpg') }}" class="rounded-circle ms-1" height="40px" width="40px">
                    @endif
                </div>
                <div class="ms-3">
                    <h5 class="roboto-medium">{{ $user->first_name }}</h5>
                    @if (!empty($user->address))
                        <p>{{ $user->address }}</p>
                    @elseif (!empty($user->Access_info))
                        <p>{{ $user->Access_info }}</p>
                    @else
                        <p>{{translate('Check details')}}</p>
                    @endif
                    <small>{{ $user->speciality }}</small>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="float-lg-end mt-3">
                <a href="{{ route('aboutDoctor', ['id' => $user->id]) }}" class="appointment-btn scrollto">{{translate('View Profile')}}</a>
            </div>
        </div>
    </div>

    <hr>

    <div class="d-flex justify-content-between mb-3">
        <div class="availability">
            <h5 class="roboto-medium text-dark">{{translate('Availability Schedule')}}</h5>
        </div>

        <div>
            <div>
                <span>
                    <a href="#">
                        <!-- Define your SVG icon for previous link -->
                        <svg width="6" height="13" viewBox="0 0 6 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <!-- Define your SVG path for previous link -->
                        </svg>
                    </a>
                 
                    <a href="#">
                        <!-- Define your SVG icon for next link -->
                        <svg width="6" height="13" viewBox="0 0 6 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <!-- Define your SVG path for next link -->
                        </svg>
                    </a>
                </span>
            </div>
        </div>
    </div>

    <div class="selector row">

    </div>
</div>
@endforeach
