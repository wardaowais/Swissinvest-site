@extends('layouts.app')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<style> 
   .profile-detail-pic {
   width: 170px;
   height: 170px;
   border-radius: 50%;
   object-fit: cover;
   }
   .doc-image {
   width: 70px; /* Set the width */
   height: 70px; /* Set the height */
   object-fit: cover; /* Ensure the image covers the area */
   margin-top: -4pc;
   }
   .dash-content form {
   background: #E8F1F5;
   margin-top: 1pc;
   padding: 20px;
   border-radius: 12px;
   }
   .wallet-balance-card, .transaction-card {
      background-color: white;
      border-radius: 12px;
      padding: 20px;
    }
    .points-button {
      background-color: #009688;
      color: white;
      border: none;
      padding: 8px 16px;
      border-radius: 8px;
    }
    .bank-buttons button {
        border: none;
    background-color: #e8f1fa;
    color: black;
    margin: 5px 0;
    width: 100%;
    border-radius: 8px;
    font-weight:700;
    text-align: left;
    }
    .transaction-card {
      text-align: center;
    }
    .pending {
      color: #ffa500;
    }
    .card {
    border-radius: 8px;
    border: none;
    background-color: #E8F1F5;
}
.btn-outline-primary:hover {
    color: black !important;
    background-color: transparent !important;
    border-color: black !important;
}
.date{
    background: #F8F8F8;
    padding: 10px;
    border-radius: 10px;
}

@media only screen and (max-width:768px){
.banks{
    margin-top: 2pc;

}
.doc-image{
    width: 50px !important;
    height: 50px !important;
}
}
</style>
<div class="my-dashboard">
<div class="container-fluid">

    <div class="marquee-area mb-4">
        <ul>
            <li><span>Page Feature:</span></li>
            <li>
                <p>
                    <marquee behavior="" direction=""> Keeps members informed about relevant events and
                        opportunities.</marquee>
                </p>
            </li>
        </ul>
    </div>
  
    <!-- Wallet Balance Section -->
    <h2 >Wallet  History</h2>

    <div class="wallet-balance-card p-4 mb-4">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="card d-flex flex-row align-items-center justify-content-between" style="padding: 20px;">
                  <!-- Left Content (Greeting and Total) -->
                  <div class="left-content" style="width:60%">
                    <h3 class="mb-1">Hello {{$user->first_name}}</h3>
                    <div class="d-flex align-items-center mt-3" >
                      @php
                      $dollars = $user->wallet ?? 0; 
                      $points = $dollars * 100; 
                  @endphp

                  {{-- <p class="mt-3"> <b>{{ number_format($points, 2) }} PTS</b> <b>= {{ number_format($dollars, 1) }} CHF</b></p> --}}
                      <h6 class="mb-0 me-2">Total:</h6>
                      <h6 class="mb-0"><strong style="margin-left: 12px">{{ number_format($points, 2) }}PTS </strong> = <strong style="margin-left: 12px"> {{ number_format($dollars, 1) }}CHF</strong></h6>
                    </div>
                    
                    <!-- Centered Button -->
                    <div class="d-flex justify-content-center mt-4" >
                        
                      <button class="points-button text-center d-flex align-items-center">
                        Points

                        <img src="{{ asset('assets/doctor-panel/imgs/refresh.png') }}" alt="Refresh Icon" style="width: 16px; height: 16px; margin-left: 10px;">
                      </button>
                    </div>
                  </div>
                  
                  <!-- Right Profile Image -->
                  <div class="right-content">
                    @php
                    $femaleImages = glob(public_path('assets/home/imgs/female-avi/*.jpg'));
                    $maleImages = glob(public_path('assets/home/imgs/male-avi/*.jpg'));
                    $femaleImages = array_map(function ($path) {
                        return str_replace('\\', '/', str_replace(public_path(), '', $path));
                    }, $femaleImages);
                    $maleImages = array_map(function ($path) {
                        return str_replace('\\', '/', str_replace(public_path(), '', $path));
                    }, $maleImages);
                @endphp
                @if ($user->gender == 'female')
                <img src="{{ $user->profile_pic ? asset('images/users/' . $user->profile_pic) : getRandomImage($femaleImages) }}"
                    class="img-fluid doc-image rounded-circle" style="width: 75px; height: 75px;">
            @else
                <img src="{{ $user->profile_pic ? asset('images/users/' . $user->profile_pic) : getRandomImage($maleImages) }}"
                   class="img-fluid doc-image rounded-circle" style="width: 75px; height: 75px;">
            @endif
                   
                  </div>
                </div>
              </div>
              
          
              <div class="col-md-6 text-center bank-buttons banks">
                <div class="card p-1">
                    <button class="btn btn-outline-primary me-2" data-bs-toggle="modal" data-bs-target="#stripeModal">
                        Stripe Wallet
                    </button>
                </div>
            </div>
            
          </div>
          
    </div>
  
    <!-- Transaction History Section -->
    <h2>Transaction History</h2>
    <div class="card mb-4 mt-4">
      <div class="row mt-3" style="padding:1pc">
        @foreach($paymentHistory as $history)
        <div class="col-md-6 mb-4">
            <div class="transaction-card p-3">
                <h5><b>Withdraw by {{ $history->wallet_name ?? 'Unknown Wallet' }}</b></h5>
                
                <div class="row mb-2 mt-3">
                    <div class="col-md-12 d-flex justify-content-between align-items-center">
                        <p class="mb-0" style="font-size: 1.2em;">Total receivable amount:</p>
                        <p class="mb-0" style="font-size: 1.2em; text-align: center; flex: 1;">
                            <strong>CHF {{ number_format($history->amount, 2) }}</strong>
                        </p>
                    </div>
                </div>
                
                <div class="row mt-4">
                    <div class="col-md-12 d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <p class="mb-0" style="color: black;">{{ ucfirst($history->status) }}</p>
                            <img src="{{ asset('assets/doctor-panel/imgs/clock.png') }}" 
                                 alt="Pending icon" 
                                 style="margin-left: 5px;width:15px;height:15px">
                        </div>
                        
                        <!-- Center: Date -->
                        <div class="d-flex justify-content-center" style="flex: 1; text-align: center;">
                            <p class="mb-0 date">{{ \Carbon\Carbon::parse($history->created_at)->format('d/m/Y') }}</p>
                        </div>
                        
                        <!-- Right: Time -->
                        <p class="mb-0 date" style="text-align: right;">
                            {{ \Carbon\Carbon::parse($history->created_at)->format('H:i:s') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    
      </div>
      
  
   

</div>
<div class="row">
    <div class="section_top_img col-md-12">
        <img src="{{ asset('assets/doctor-panel/imgs/wallet.png') }}" alt="" style="width:100%" class="img-fuild">
    </div>
</div>
<div class="modal fade" id="stripeModal" tabindex="-1" aria-labelledby="stripeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="stripeModalLabel">Recharge Wallet</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="stripeForm" action="{{ route('wallet.checkout') }}" method="GET">
          <div class="mb-3">
              <label for="amount" class="form-label">Enter Amount</label>
              <input type="number" class="form-control" id="amount" name="amount" required>
          </div>
          <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Recharge Wallet</button>
          </div>
      </form>
      
      </div>
    </div>
  </div>
</div>
@endsection