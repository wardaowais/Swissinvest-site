@extends('layouts.app')

@section('content')

<style type="text/css">
@import url('https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap');

body {
    font-family: "Inter", sans-serif;
}

a {
    text-decoration: none;
}




/* main css here  */
.network-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 10px 0;
    margin-top: 15px;
}

.network-header h4 {
    font-size: 25px;
    font-weight: 600;
}

.network-header-links ul {
    display: flex;
    align-items: center;
    justify-content: space-between;
    list-style: none;
}

.network-header-links ul li {
    padding: 0 20px;
    font-size: 18px;
    font-weight: 400;
    color: #333;
}

.selected {
    color: #009688 !important;
    font-weight: bold !important;
}

/* network banner here  */

.network-banner {
    height: 200px;
    border-radius: 20px;
    width: 100%;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    margin-bottom: 20px;
    padding: 20px;
}


/* favorite contact here  */
.favorite-contacts {
    height: auto;
    width: 100%;
    padding: 20px;
    margin-top:50px;
    border-radius: 20px;
    background-color: #E8F1F5;
}

.single-fav-contact {
    border-radius: 20px;
    background-color: #fff;
    padding: 18px 15px;
    margin: 10px 0;
}

.single-Main {
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.single-Main img {
    height: 80px;
    width: 80px;
    border-radius: 50%;
}

.single-Main p {
    color: #333;
    font-size: 20px;
    font-weight: 600;
}

.network-msg-dlt {
    display: flex;
    align-items: center;
    justify-content: space-around;
    padding-top: 20px;
}

.network-msg-dlt i {
    font-size: 20px;
    color: #000;
}

.network-msg-dlt .msg-btn {
    outline: none;
    width: 130px;
    background-color: #E50F25;
    color: #fff;
    padding: 8px 5px;
    border-radius: 8px;
    border: none;
    text-align: center;
}

.contact-three-dot {
    float: right;
    font-size: 30px;
    margin-top: -25px;
    color: #000;
}
.contact-three-dot a{
    color: #000;
    float: right;
}


/* network banner 2 */
.network-banner-2 {
    height: 300px;
    border-radius: 20px;
    width: 100%;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    margin-top: 20px;
    margin-bottom: 200px;
}

@media screen and (max-width: 767px) {
    .network-header{
        flex-direction: column;
    }
    .network-header-links ul li{
        font-size: 14px;
    }
    .single-Main p{
        margin-bottom: 0;
        margin-left: 20px;
    }
    .network-msg-dlt button {
        width: 120px;
        padding: 5px 5px;
    }
}

.dropdown-menu {
    display: none;  
    position: absolute;
    z-index: 1000; 
    background-color: white;  
    border-radius: 5px;  
}

.dropdown-menu.show {
    display: block !important; 
    position: absolute;
    top: 100%; 
    left: 0;
    right: 0;
}

</style>

<div class="container-fluid px-md-5">
    <div class="marquee-area">
        <ul>
            <li style="min-width: 150px;"><span>Page Feature:</span></li>
            <li><p><marquee behavior="" direction=""> Keeps members informed about relevant events and opportunities.</marquee></p></li>
        </ul>
    </div>


        <div class="network-header">
            <div>
                <h4>{{ translate('My Network Contacts') }}</h4>
            </div>
            <div class="network-header-links">
                <ul>
                    <a href="{{ route('bestFriends') }}">
                        <li class="selected">{{ translate('Favourite Contact') }}</li>
                    </a>
                    <a href="{{ route('pendingList') }}">
                        <li>{{ translate('Contact Requests') }}</li>
                    </a>
                    <a href="{{ route('blockList') }}">
                        <li>{{ translate('Blocked') }}</li>
                    </a>
                </ul>
            </div>
        </div>

        <!-- network banner -->
        <div class="section_top_img">
            <img src="{{ asset('assets/doctor-panel/imgs/dashboard/allomed-dashboar-banner doctomed.jpg') }}" alt="" class="img-fuild" />
          </div>
        {{-- <img src="{{ asset('assets/doctor-panel/imgs/dashboard/allomed-dashboar-banner doctomed.jpg') }}"  height="200" class="img-fuild" /> --}}
        {{-- <div style="background-image: url('{{ asset('assets/img/network-banner.png') }}');" class="network-banner"></div> --}}


        <!-- favorite contact section -->
        <div class="favorite-contacts">
            <div class="d-flex align-items-center">
                <h5>My Contacts</h5>

                <div class="col" style="text-align:end">
                    <button onclick="window.location.href='{{ route('userChat', 'chat') }}'" class="ms-auto btn btn-danger"
                        style="text-decoration: none; padding: 0 20px; font-size: 18px; font-weight: 400;">
                        <span>{{ translate('Chat') }}</span>
                    </button>

                </div>

            </div>


            <div class="row">
                @foreach ($allFriends as $friendData)
                    <div class="col-md-4 col-sm-6">
                        <div class="single-fav-contact">
                            <a href="#" style="text-align: right; float: right;" data-bs-toggle="dropdown"
                                aria-expanded="false"><span class="contact-three-dot">...</span></a>
                            <div class="dropdown-new">
                                <ul class="dropdown-menu">
                                    <a class="dropdown-item"
                                        href="{{ route('friendshipAction', ['friendId' => encrypt($friendData['friend']->id), 'status' => encrypt('bestfriend')]) }}">
                                        {{ translate('Make Best') }}
                                    </a>
                                    <a class="dropdown-item"
                                        href="{{ route('friendshipAction', ['friendId' => encrypt($friendData['friend']->id), 'status' => encrypt('blocked')]) }}">
                                        {{ translate('Block') }}
                                    </a>
                                </ul>
                            </div>
                            <div class="single-Main">
                                @php
                                    // Define the image directories and get an array of image paths
                                    $femaleImages = glob(public_path('assets/home/imgs/female-avi/*.jpg'));
                                    $maleImages = glob(public_path('assets/home/imgs/male-avi/*.jpg'));

                                    // Convert absolute paths to relative URLs and replace backslashes with forward slashes
                                    $femaleImages = array_map(function ($path) {
                                        return str_replace('\\', '/', str_replace(public_path(), '', $path)); // Normalize slashes
                                    }, $femaleImages);

                                    $maleImages = array_map(function ($path) {
                                        return str_replace('\\', '/', str_replace(public_path(), '', $path)); // Normalize slashes
                                    }, $maleImages);
                                @endphp

                                @if ($friendData['friend']->gender == 'female')
                                    <img src="{{ $friendData['friend']->profile_pic ? asset('images/users/' . $friendData['friend']->profile_pic) : getRandomImage($femaleImages) }}"
                                        class="profile-picture m-auto">
                                @else
                                    <img src="{{ $friendData['friend']->profile_pic ? asset('images/users/' . $friendData['friend']->profile_pic) : getRandomImage($maleImages) }}"
                                        class="profile-picture m-auto">
                                @endif
                                <p>{{ $friendData['friend']->first_name }} {{ $friendData['friend']->last_name }}</p>
                            </div>
                            <div class="network-msg-dlt">
                                <a
                                    href="{{ route('friendshipAction', ['friendId' => encrypt($friendData['friend']->id), 'status' => encrypt('blocked')]) }}"><i
                                        class="fa-solid fa-trash"></i></a>
                                <a class="msg-btn"
                                    href="{{ route('match.details', ['userId' => encrypt($friendData['friend']->id), 'feature' => 'chat']) }}">{{ translate('Message') }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>


        <!-- network banner 2 -->
        <div class="section_top_img">
            <img src="{{ asset('assets/doctor-panel/imgs/dashboard/bottom-banners.jpeg') }}" alt="" class="img-fuild" />
          </div>
    </div>

@endsection
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var dropdownElements = document.querySelectorAll('.dropdown-toggle');
    dropdownElements.forEach(function (dropdown) {
        new bootstrap.Dropdown(dropdown);
    });
});


</script>
@section('scripts')
@endsection
