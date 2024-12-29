@extends('layouts.app')

@section('content')
<style type="text/css">
.job-list-banner {
    height: 200px;
    border-radius: 20px;
    width: 100%;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    margin-bottom: 20px;
    padding: 20px;
}



/*  banner 2 */
.job-list-banner-2 {
    height: 300px;
    border-radius: 20px;
    width: 100%;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    margin-top: 20px;
    margin-bottom: 200px;
}


.job-list-main{
    height: auto;
    width: 100%;
}
.job-list-main table{
    width: 100%;
    background-color: #E8F1F5;
    border-top-left-radius: 20px;
    border-top-right-radius: 20px;
    border-bottom-left-radius: 20px;
    border-bottom-right-radius: 20px;
    color: #141B29;
}
.job-list-main table tr td, .job-list-main table tr th{
    padding: 20px 10px;
    width: 20%;
}
/* .job-table-head tr{
    background-color: red !important;
    border-radius: 100px !important;
} */
.job-table-head th{
    background-color: #7DBEDB !important;
    padding: 20px 10px !important;
    text-align: left;
}
.job-table-linearBG{
    background: linear-gradient(90deg, #AEE5FE 0%, #DEE7EB 100%);
}


.job-table-linearBG td:first-child, tr:first-child th:first-child {
    border-top-left-radius: 20px;
    border-bottom-left-radius: 20px;
}

.job-table-linearBG td:last-child, tr:first-child th:last-child {
    border-top-right-radius: 20px;
    border-bottom-right-radius: 20px;
}


tr:first-child td:last-child{
    border-left: 1px solid #00B0FF; border-right: 1px solid #00B0FF;
}


@media screen and (max-width: 767px) {
    .job-list-banner{
        height: 110px;
    }
    .job-list-banner-2{
        height: 160px;
    }
    .job-list-main table tr td, .job-list-main table tr th{
        width: auto;
        padding: 10px 5px;
    }
    
}
.marquee-area{
    margin-bottom: 20px;
    border-radius: 26px;
}
.section_top_img{
    border-radius: 12px;
}
</style>

<div class="container-fluid px-md-5">
    <div class="marquee-area">
        <ul>
            <li style="min-width: 150px;"><span>Page Feature:</span></li>
            <li><p><marquee behavior="" direction=""> Keeps members informed about relevant events and opportunities.</marquee></p></li>
        </ul>
    </div>

    <!-- Job List banner -->
    <div style="background-image: url('{{ asset("assets/img/job-list-banner1.png") }}');" class="job-list-banner"></div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- job list table starts here  -->
    <div class="job-list-main">
        <table>
            <tr class="job-table-head rounded-circle">
                <th>{{ translate('Job Title') }}</th>
                <th>{{ translate('Organization') }}</th>
                <th>{{ translate('Job Type') }}</th>
                <th>{{ translate('Location') }}</th>
                <th>{{ translate('Action') }}</th>
            </tr>
            @foreach ($jobs as $k => $job)
            <tr style="border-radius: 50px !important;" class="{{ ($k % 2 == 0) ? 'rounded-circle' : 'job-table-linearBG' }}">
                <td>{{ $job->job_title }}</td>
                <td>{{ $job->start_date }}</td>
                <td>{{ ucfirst($job->type) }}</td>
                <td>{{ $job->city->name }}</td>
                <td>
                    <a href="{{ route('jobPosts.edit', $job->id) }}" class="btn btn-primary">{{ translate('Edit') }}</a>
              
                </td>
            </tr>
            @endforeach
        </table>
    </div>
    <!-- job list table ends here  -->

    <!-- Pagination -->
    <div class="pagination justify-content-center">
        {{ $jobs->links('vendor.pagination') }}
    </div>


    <!-- Job List banner 2 -->
    <div class="row">
        <div class="section_top_img col-md-12">
            <img src="{{ asset('assets/img/job-list-banner4.png') }}" alt="" class="img-fuild" style="width: 100%;">
     </div>
    </div>
 

</div>
       

@endsection


@section('scripts')


@endsection
