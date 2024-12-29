@extends('admin.layouts.app')

@section('content')
<!-- sliders.blade.php -->
<section class="section dashboard">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <h5>Add Slider Image</h5>
                @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
                <div class="col-xl-6">
                    <form method="POST" action="{{ route('add.banner') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="banner_name" class="mb-1">Website Link</label>
                            <input type="text" id="banner_name" name="banner_name" placeholder="Web Site Url eg: https://allomed.ch/" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="image" class="mb-1">Image</label>
                            <input type="file" id="image" name="image" class="form-control" required>
                        </div>
                        <label for="category" class="mb-1">Category</label>
                        <select id="category" name="category" class="form-control" required>
                            <option value="home">Home</option>
                            <option value="proPanel">Professional Dashboard</option>
                            <option value="patientPanel">Patients Dashboard</option>
                            <option value="companyPanel">Company Dashboard</option>
                            <!-- Add more categories as needed -->
                        </select>
                        <br>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-xl-12">
                <h5>List of Slider Images</h5>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Sl No</th>
                            <th>Image</th>
                            <th>URL</th>
                            <th>Category</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($slidersByCategory as $category => $sliders)
                            @foreach ($sliders as $slider)
                                <tr>
                                    <td>{{ $loop->parent->iteration }}.{{ $loop->iteration }}</td>
                                    <td><img src="{{ asset('images/apps/' . $slider->image) }}" alt="Slider Image" class="img-thumbnail" style="max-width: 100px;"></td>
                                    <td>{{ $slider->banner_name }}</td>
                                    <td>{{ $category }}</td>
                                    <td>
                                        <form action="{{ route('delete.slider', $slider->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
                


            </div>
        </div>
    </div>
</section>

@endsection

@section('scripts')

@endsection
