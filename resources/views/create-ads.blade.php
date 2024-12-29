@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.3/themes/base/jquery-ui.css">
<div class="my-dashboard" style="position: relative; height: 95%;">
<div class="marquee-area create_add_pf">
                  <ul>
                    <li><span>{{translate('Page Feature')}}:</span></li>
                    <li><p><marquee behavior="" direction=""> {{translate('Members can create their own ads')}}</marquee></p></li>
                                                    </ul>
</div>
          <div class="row mb-4 mt-4">
                <div class="col-md-12">
            <!-- dash content -->
             <div class="dash-content">
             @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
                <!-- hading -->
                 <div class="heading col-md-12 col-lg-12 col-12 row">
                    <div class="col-md-4">
                      <h4 class="upload-ads-heading px-1">{{translate('Upload your Ads')}}</h4>
                    </div>
                    <div class="col-md-9 d-flex align-items-center">
                      {{-- <button class="active paid-free-btn" style="margin-right: 30px;">{{translate('Free Ads')}}</button>
                      <button class="paid-free-btn payment-info">{{translate('Paid Ads')}}</button> --}}
                    </div>
                 </div>
                <!-- end heading -->
             
                <!-- dash ad -->
                 
                <!-- end dash ad -->

                <!-- booking list -->
                 <div class="booking-list mb-4" style="background: #E8F1F5;">
                    <h5>{{translate('Free Ads')}} </h5>
                   <!-- connect box -->
                    <form action="{{ route('advertise.store') }}" method="POST">
                    @csrf
                    <div class="ads-connect-box">
                        <div class="row">
                          <div class="col-12 col-md-12 col-lg-12 mb-3">
                            <textarea class="textArea-content" name="comment" id="limitedTextarea" name="details" required cols="30" rows="10" placeholder="{{translate('Ad Content')}}."></textarea>
                            <div id="charCount">0/50</div>
                          </div>
                         <div class="col-12 text-right">
                          <button class="btn btn-danger">{{translate('Create Ad')}}</button>
                         </div>
                   <!-- end connect box -->
                        </div>
                <!-- end booking list -->

                  </div>
                  </form>
            <!-- end dash content -->
                  </div>

                  <div class="booking-list" style="background: #E8F1F5;">
                    <div class="d-flex justify-content-between align-items-center">
                      <h5>{{translate('Paid ads')}} </h5>
                      <p class="active">To see pricing and size click here...</p>
                    </div>
                   <!-- connect box -->
                    <div class="ads-connect-box">
                        <form action="{{ route('advertise.checkout') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                          <div class="col-12 col-md-12 col-lg-12 mb-4 ">
                            <div class="paid-ads-header-text">
                            @if ($advertisementsPlans)
                                <p class="payment-info mb-0">{{ translate('Payment per day') }} = <span id="paymentPerDay" class="currency-sign">{{ $advertisementsPlans->payment }}</span> $</p>
                            @else
                                <p class="payment-info mb-0">{{ translate('No payment plan found.') }}</p>
                            @endif
                            <p class="payment-info mb-0"> <i class="fa fa-calender"></i> {{ translate('Duration') }}: <span><input type="date" id="duration" name="duration" style="border: 0;background: transparent;" required /></span></p>
                            <p class="payment-info mb-0">Total Payment: <span class="total_pays" id="total_pays">0.1$</span></p>
                            <input type="hidden" id="total_pay" name="price" readonly required />
                            </div>
                          </div>
                          <div class="col-12 col-md-12 col-lg-12 mb-3">
                            <textarea class="textArea-content" name="details" required id="comment" cols="30" rows="10" placeholder="{{translate('Ad Content')}}"></textarea>
                          </div>
                         
                          <div class="col-12 mb-4">
	                            <div class="image-upload paid-ads-attachment">
	                                <label for="file" class="file-upload-label" style="border: 0;background: transparent;">
	                                    <div class="file-upload-design">
	                                        <span><i class="fa-solid fa-cloud-arrow-up"></i></span>
	                                        <p class="text-center">{{translate('Drag and Drop')}} <br> or</p>
	                                        <span class="browse-button browse-btn">{{translate('Browse Image File')}}</span>
	                                    </div>
	                                    <input id="file" type="file" name="image" required style="display:none"/>
	                                </label>
	                            </div>
	                        </div>
                          
                            <div class="col-12 col-md-6 col-lg-6">
                              <div class="paid-ads-text">
                                <h5>{{translate('Image resolution should be between')}}</h5>
                                <ul class="row paid-ads-list">
                                  <li class="col-6">260*180</li>
                                  <li class="col-6">260*180</li>
                                  <li class="col-6 pt-2">260*180</li>
                                  <li class="col-6 pt-2">260*180</li>
                                </ul>
                              </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6 d-flex justify-content-end align-items-end">
                              <button class="btn btn-danger">{{translate('Pay and create ads')}}</button>
                            </div>
                          
                      
                         
                   <!-- end connect box -->
                        </div>
                        </form>
                <!-- end booking list -->

                  </div>
            <!-- end dash content -->
                  </div>



            </div>
        </div>
    </div>

                  <div class="section_top_img col-12" style="position: absolute; bottom: 0px; width: 96.5%">
		            <img src="{{ asset('assets/doctor-panel/imgs/dashboard/bottom-banners.jpeg') }}" alt="" class="img-fuild">
		        </div>
</div>
             
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.3/jquery-ui.js"></script>
<script>
          $( function() {
                $( "#ads-tabs" ).tabs();
            } );

            $(document).ready(function() {
    const maxLength = 50;

    $('#limitedTextarea').on('input', function() {
        const currentLength = $(this).val().length;
        $('#charCount').text(`${currentLength}/${maxLength}`);

        if (currentLength > maxLength) {
            $(this).val($(this).val().substring(0, maxLength));
            $('#charCount').text(`${maxLength}/${maxLength}`);
        }
    });
});
    </script>
    <script>
        document.getElementById('duration').addEventListener('change', function() {
            const paymentPerDay = parseFloat(document.getElementById('paymentPerDay').innerText);
            const selectedDate = new Date(this.value);
            const today = new Date();
    
            if (selectedDate > today) {
                // Calculate the number of days between today and the selected date
                const timeDifference = selectedDate.getTime() - today.getTime();
                const daysDifference = Math.ceil(timeDifference / (1000 * 3600 * 24));
    
                // Calculate the total payment
                const totalPay = paymentPerDay * daysDifference;
    
                // Update the total_pay field with the calculated value
                document.getElementById('total_pay').value = totalPay.toFixed(2);
                $('#total_pays').text(totalPay.toFixed(2)+' $');
            } else {
                // Reset the total_pay field if the selected date is invalid
                document.getElementById('total_pay').value = '0.00 $';
                 $('#total_pays').text('0.00 $');
            }
        });
    </script>
@endsection