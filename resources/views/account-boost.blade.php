@extends('layouts.app')

@section('content')
<div class="my-dashboard">
    <div class="demo-content">
        <div class="marquee-area payment_fp">
            <ul>
                <li><span>{{translate('Page Feature')}} :</span></li>
                <li>
                    <p>
                        <marquee behavior="" direction="">{{translate('Verified members can boost their account to make their profile on top of the lists to reach more patients.')}}</marquee>
                    </p>
                </li>
            </ul>
        </div>
        <div class="dash-content">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        
            <form action="{{ route('boost.request') }}" method="POST" enctype="multipart/form-data" class="mt-4">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">{{ translate('Request Account Boost') }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            @if ($advertisementsPlans)
                                <label for="paymentPerDay">{{ translate('Payment per day') }}</label>
                                <p class="form-control-plaintext font-weight-bold">
                                    <span id="paymentPerDay">{{ $advertisementsPlans->payment }}</span> $
                                </p>
                            @else
                                <p class="text-danger">{{ translate('No payment plan found.') }}</p>
                            @endif
                        </div>
        
                        <div class="form-group">
                            <label for="end_date">{{ translate('Duration') }}</label>
                            <input type="date" id="end_date" name="end_date" class="form-control" required />
                        </div>
        
                        <div class="form-group">
                            <label for="total_pay">{{ translate('Total Payment') }}</label>
                            <input type="text" id="total_pay" name="price" class="form-control" readonly required />
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-danger">{{ translate('Request to Boost') }}</button>
                    </div>
                </div>
            </form>
        
            <!-- Display existing boost requests -->
            @if ($boostRequests->isNotEmpty())
                <div class="mt-4">
                    <h5>{{ translate('Existing Boost Requests') }}</h5>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>{{ translate('Boost ID') }}</th>
                                <th>{{ translate('Price') }}</th>
                                <th>{{ translate('End Date') }}</th>
                                <th>{{ translate('Status') }}</th>
                                <th>{{ translate('Created At') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($boostRequests as $request)
                                <tr>
                                    <td>{{ $request->id }}</td>
                                    <td>{{ $request->paid_amount }}</td>
                                    <td>{{ $request->end_date }}</td>
                                    <td>{{ $request->status }}</td>
                                    <td>{{ $request->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="mt-4">{{ translate('No existing boost requests found.') }}</p>
            @endif
        </div>
        
<br>
<br>
<br>
        <div class="dash-ad">
            <div id="bannerSlider" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    @foreach($sliders as $key => $slider)
                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                        <img src="{{ asset('images/apps/'.$slider->image) }}" alt="ads" style="height: 200px; width:100%;">
                    </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#bannerSlider" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">{{translate('Previous')}}</span>
                </a>
                <a class="carousel-control-next" href="#bannerSlider" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">{{translate('Next')}}</span>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.getElementById('end_date').addEventListener('change', function() {
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
        } else {
            // Reset the total_pay field if the selected date is invalid
            document.getElementById('total_pay').value = '0.00';
        }
    });
</script>
@endsection