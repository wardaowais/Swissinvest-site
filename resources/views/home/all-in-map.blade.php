@extends('home.layouts.app')
@section('content')
<style>
        .map-full {
    background: #fff;
    transition: all .4s;
}
.map-full .container{
    position: relative;
}
.map-full-active{
    width: 100%;
    height: 100%;
    display: block;
}
.map-full .map-content {
  position: relative;
  width: 100%;
  background: #ffffffe3;
  padding: 20px;
  position: absolute;
  top: 50%;
  left: 20px;
  max-width: 275px;
  transform: translateY(-50%);
  z-index: 9;
}
.map-full .map-content h1 {
    text-transform: uppercase;
    font-size: 25px;
    color: #2E92AB;
}
.map-full .map-content h6 {
    color: #009688;
    font-size: 14px;
}
.map-full .map-content .box {
    margin-top: 20px;
}
.map-full .map-content .box h4 {
    color: #2E92AB;
    text-transform: uppercase;
    font-size: 19px;
    margin-bottom: 0;
}
.map-full .map-content .box ul{
    padding: 0;
    margin: 0;
}
.map-full .map-content .box ul li {
  padding: 4px 0;
  font-weight: 500;
  text-transform: capitalize;
  display: flex;
  justify-content: space-between;
  font-size: 12px;
}
.map-full .map-content .box ul li span {
    font-weight: 400;
    color: #555151;
}
.map-full .map-content .box ul li a {
    text-decoration: none;
    color: #555151;
}
.map-full .gm-style .place-card-large{
    display: none !important;
}
#map {
    height: 40rem;
    width: 100%;
}
.map-full iframe {
    width: 100%;
    height: 100%;
}
.map-full .close {
    position: absolute;
    top: 0px;
    right: 10px;
    font-size: 40px;
    color: #e02e2e;
    cursor: pointer;
    transition: .3s;
}
.map-full .close:hover{
    transform: scale(1.1);
}



.map-profile {
    position: relative;
    top: inherit;
    left: inherit;
    transform: inherit;
    display: block;
    width: 100%;
    padding: 50px 0;
}

.map-full .map-content .btn {
    background: #009688;
    border: none;
    padding: 8px 24px;
    border-radius: 8px;
    color: #fff;
    font-size: 15px;
    font-weight: 600;
    transition: .3s;
    text-decoration: none;
    width: 100%;
    margin-top: 10px;
}

.place-card.place-card-large {
    display: none !important;
}
.extra-content {
    background: #FAFAFA;
    padding-bottom: 10px;
}
.extra-content .box {
    margin: 28px 0;
    background: #fff;
    border: 1px solid rgba(0, 0, 0, 0.2);
    border-radius: 9px;
    box-shadow: 0px 0px 10px #00000021;
    padding: 44px;
}
.extra-content h4 {
    margin-bottom: 19px;
    text-transform: uppercase;
    color: #2E92AB;
    font-size: 23px;
}
    </style>
<div class="map-full map-profile">
     <div class="container">
     <div class="map-content" id="userMapDetails" style="display:none;">
   
         </div>
        <div id="map">
            
        </div>
     </div>
  </div>
  <div class="extra-content">
    <div class="container" id="extraContents">

  </div>
</div>
    @endsection

    @section('scripts')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA04JvWuCNqU5FBAZGBHY-i_iGtaPELbTA&callback=initMap" async defer></script>

    <script>
  let map;
    let geocoder;
    let markers = [];
    const users = @json($users);

    function initMap() {
    geocoder = new google.maps.Geocoder();
    const bounds = new google.maps.LatLngBounds();

    // Initialize map only after at least one address is geocoded
    if (users.length > 0) {
        const city = "{{ count($users) > 0 ? optional($users[0]->cityRelation)->name : '' }}";

        const firstAddress = `${users[0].address} ${users[0].house_number} ${users[0].postal_code} ${city}`;
        geocodeAddress(firstAddress, (position) => {
            const map = new google.maps.Map(document.getElementById('map'), {
                zoom: 15,
                center: position,
            });

            // Loop through users to geocode addresses
            users.forEach((user, idx) => {
                const address = `${user.address} ${user.house_number} ${user.postal_code} ${city}, Switzerland`;

                geocodeAddress(address, (position) => {
                    const marker = new google.maps.Marker({
                        position: position,
                        map: map,
                        opacity: 0.5, // Lower opacity for default state
                        idx: idx
                    });

                    bounds.extend(position);

                    marker.addListener('click', () => {
                        markers.forEach(m => m.setOpacity(0.5)); // Reset all markers to lower opacity
                        marker.setOpacity(1.0); // Set clicked marker to full opacity
                        const mapDetails = document.getElementById('userMapDetails');
                        if (mapDetails) {
                            mapDetails.style.display = 'block';
                        }
                        $.ajax({
                            url: "{{ route('getUserDetails') }}",
                            method: 'GET',
                            data: { user_id: user.id },
                            success: function(response) {
                                updateMapContent(response);
                            },
                            error: function(xhr) {
                                console.error('Error fetching user details:', xhr);
                            }
                        });
                    });

                    markers.push(marker);

                    // Auto-fit bounds after adding each marker
                    if (idx === users.length - 1) {
                        map.fitBounds(bounds); // Fit all markers within bounds

                        // Manually adjust zoom level after fitting bounds to zoom in more
                        google.maps.event.addListenerOnce(map, 'bounds_changed', function(event) {
                            // Check current zoom level and set it closer if needed
                            if (map.getZoom() > 14) { // Example: You can adjust this value (closer zoom)
                                map.setZoom(14); // Set a higher zoom level for a bit more zoom in
                            }
                        });
                    }
                });
            });
        });
    } else {
        document.getElementById('map').innerHTML = `
            <div class="card" style="border: 1px solid #dc3545; background-color: #f8d7da; padding: 20px; border-radius: 8px;">
                <div class="card-body" style="text-align: center;">
                    <h5 style="color: #dc3545; font-weight: bold;">No members available to display on the map.</h5>
                </div>
            </div>
        `;
    }
}


    function geocodeAddress(address, callback) {
        geocoder.geocode({ 'address': address }, (results, status) => {
            if (status === 'OK') {
                const position = results[0].geometry.location;
                callback(position);
            } else {
                console.error('Geocode was not successful for the following reason: ' + status);
            }
        });
    }

        // let map;
        // let markers = [];
        // const users = @json($users);

        
        // const mapLocations = users
        //     .map((data) => {
        //         if (data.latitude && data.longitude) {
        //             return {
        //                 lat: parseFloat(data.latitude),
        //                 lng: parseFloat(data.longitude),
        //                 user_id: data.id,
        //                 user_name: data.first_name
        //             };
        //         }
        //         return null;
        //     })
        //     .filter(location => location !== null);

        // function initMap() {
        //     const map = new google.maps.Map(document.getElementById('map'), {
        //         zoom: 14,
        //         center: mapLocations[0]
        //     });

        //     const bounds = new google.maps.LatLngBounds();

        //     mapLocations.forEach((location, idx) => {
        //         const marker = new google.maps.Marker({
        //             position: location,
        //             map: map,
        //             idx: idx
        //         });
        //         bounds.extend(marker.getPosition());

        //         marker.addListener('click', (data) => {
        //             console.log(location.user_id, location.user_name);
        //             $.ajax({
        //                 url: "{{ route('getUserDetails') }}",
        //                 method: 'GET',
        //                 data: { user_id: location.user_id },
        //                 success: function(response) {
        //                     updateMapContent(response);
        //                 },
        //                 error: function(xhr) {
        //                     console.error('Error fetching user details:', xhr);
        //                 }
        //             });
        //         })
        //     });

        //     map.fitBounds(bounds);
        // }

        function updateMapContent(data) {
            const content = `
                <h1 style="font-size: 18px;">${data.title} ${data.first_name} ${data.last_name}</h1>
                <h6><span><i class="fa-solid fa-circle-check"></i></span> ${data.is_online ? 'New patients accepted' : 'New patients not accepted'}</h6>
                <div class="box">
                    <h4>Coordinates</h4>
                    <ul>
                        <li>address <span>${data.address || 'Address Not Updated'}, ${data.house_number} <br>${data.postal_code} ,${data.cityName}  </span></li>
                        <li>Telephone <span><a href="tel:+41227892000">${data.fax_phone_number|| 'Telephone Not Updated'}</a></span></li>
                        <li>Fax <span><a href="tel:+41227892000">${data.fax_number || 'Fax Not Updated'}</a></span></li>
                    </ul>
                </div>
                <div class="box">
                    <h4>Specialization</h4>
                    <ul>
                        ${data.specialties.map(specialty => `<li>${specialty.name}</li>`).join('')}
                    </ul>
                </div>
                <div class="box">
                    <h4>Languages</h4>
                    <ul>
                        ${data.languages.map(language => `<li>${language.name}</li>`).join('')}
                    </ul>
                </div>
                <a href="https://www.google.com/maps?q=${data.address},${data.house_number},${data.postal_code},${data.cityName},Switzerland" class="btn" style="margin-top:40px">Go to Map</a>
            `  
            ;
            const extra = `
            <div class="box">
                    <h4>{{translate('Extra Speacilities')}}</h4>
                    <ul class="tags">
                        ${data.speciality.map(speciality => `<li>${speciality}</li>`).join('')}
                    </ul>
                </div>
            <div class="box">
                <h4>{{translate('Expertise')}}</h4>
                <ul class="tags">
                    ${data.expertise.map(expertise => `<li>${expertise.name}</li>`).join('')}
                </ul>
            </div>
        `;

            document.querySelector('.map-content').innerHTML = content;
            document.querySelector('#extraContents').innerHTML = extra;
        }
    </script>
    @endsection