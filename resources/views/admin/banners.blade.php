@extends('admin.layouts.app')

@section('content')
    <style>
        .custom-banner-margin {
            margin-bottom: 15px;
            /* Adjust this value as needed */
        }
    </style>
    <!-- index.blade.php -->
    <section class="section dashboard">
        <div class="row justify-content-center">
            <div class="col-xl-12 d-flex justify-content-center">
                <div class="card" style="width: 500px;">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="card-body">
                        <h5 class="card-title text-center">Add Banners</h5>
                        <form method="POST" action="{{ route('add.addSiteBanners') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="image_postion" class="mb-1">Select Banner Position</label>
                                <select name="image_postion" class="form-control">
                                    <option value="">Select Position</option>
                                    <option value="loginLeft">Login Banner left</option>
                                    {{-- <option value="top">Banner</option> --}}
                                    <option value="sideTop">Side top Banner</option>
                                    <option value="sideBottom">Side Bottom Banner</option>
                                    <option value="bottom">Profassional Register bottom 1st</option>
                                    <option value="bottom2"> Profassional Register bottom 2nd</option>
                                    <option value="bottom3">Profassional Register bottom 3rd</option>
                                    <option value="proLeft">Left Banner Pro</option>
                                    <option value="ptrTop">Patient register top</option>
                                    <option value="ptrBottom">Patient register bottom 1st</option>
                                    <option value="ptrBottom2">Patient register bottom 2nd</option>
                                    <option value="ptrBottom3">Patient register bottom 3rd</option>
                                    <option value="ptrLeft">Patient register Left</option>
                                    <option value="companyBottom">Company register bottom 1st</option>
                                    <option value="companyBottom2">Company register bottom 2nd</option>
                                    <option value="companyBottom3">Company register bottom 3rd</option>
                                    <option value="companyLeft">Company register Left</option>
                                </select>
                            </div>
                            <br>
                            <div class="form-group">
                                <p>Width: 576 Pixels, Height: 100 Pixels</p>
                                <input type="file" id="image" name="image" class="form-control" required>
                            </div>
                            <br>
                            <div class="form-group">
                                <input type="url" id="site_url" name="site_url"
                                    placeholder="Enter Website link e.g., https://allomed.ch/" class="form-control"
                                    required>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <br>
        <?php
        $bannerTitles = [
            'loginLeft' => 'Login left Banner',
            // 'top' => 'Top Banner Pro',
            'proLeft' => 'Profassional Register Left banner',
            'sideTop' => 'Side Top Banner',
            'sideBottom' => 'Side Bottom Banner',
            'bottom' => 'Profassional Register Bottom 1st Banner',
            'bottom2' => 'Profassional Register Bottom 2nd Banner',
            'bottom3' => 'ProProfassional Register Bottom 3rd Banner',
            'ptrLeft' => 'Patient Registration Left Banner',
            'ptrTop' => 'Patient Register Top Banner',
            'ptrBottom' => 'Patient Register Bottom  1st Banner',
            'ptrBottom2' => 'Patient Register Bottom 2nd Banner',
            'ptrBottom3' => 'Patient Register Bottom 3rd Banner',
            'companyBottom' => 'Company Register 1st bottom banner',
            'companyBottom2' => 'Company Register 2nd bottom banner',
            'companyBottom3' => 'Company Register 3rd bottom banner',
            'companyLeft' => 'Company Register Left banner',
        ];
        ?>
        <style>
            /* Ensure all images in the table are the same size */
            .banner-thumbnail {
                width: 100px;
                height: auto;
                cursor: pointer;
            }
        </style>

        <div class="col-lg-12">
            <h5>Latest Banners</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Banner Position</th>
                        <th>Banner</th>
                        <th>URL</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Loop through each position and display the latest image -->
                    @foreach (['loginLeft', 'top', 'sideTop', 'sideBottom', 'bottom', 'bottom2', 'bottom3', 'proLeft', 'ptrTop', 'ptrBottom', 'ptrBottom2', 'ptrBottom3', 'ptrLeft', 'companyBottom', 'companyBottom2', 'companyBottom3', 'companyLeft'] as $position)
                        <tr>
                            <td>{{ $bannerTitles[$position] ?? ucfirst($position) }}</td>
                            <td>
                                @if (isset($latestBanners[$position]))
                                    <img src="{{ asset('images/apps/' . $latestBanners[$position]->image) }}"
                                        alt="{{ $bannerTitles[$position] ?? $position }} banner"
                                        class="img-fluid banner-thumbnail" data-toggle="modal" data-target="#bannerModal"
                                        data-image="{{ asset('images/apps/' . $latestBanners[$position]->image) }}">
                                @else
                                    <p>No banner uploaded for this position.</p>
                                @endif
                            </td>
                            <td>
                                @if (isset($latestBanners[$position]) && $latestBanners[$position]->site_url)
                                    <a href="{{ $latestBanners[$position]->site_url }}"
                                        target="_blank">{{ $latestBanners[$position]->site_url }}</a>
                                @else
                                    <p>No URL available</p>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Bootstrap Modal for Image Popup -->
        <div class="modal fade" id="bannerModal" tabindex="-1" aria-labelledby="bannerModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="bannerModalLabel">Banner Preview</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        <img id="modalImage" src="" alt="Banner Image" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>





    </section>
@endsection


@section('scripts')
    <script>
        // jQuery to handle the image click and show the modal with the larger image
        $(document).ready(function() {
            $('.banner-thumbnail').on('click', function() {
                var imageUrl = $(this).data('image');
                $('#modalImage').attr('src', imageUrl);
            });
        });
    </script>
@endsection
