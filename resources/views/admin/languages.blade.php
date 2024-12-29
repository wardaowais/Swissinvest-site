@extends('admin.layouts.app')

@section('content')
<section>
<section class="section dashboard">
<div class="row">
    <div class="container">
    <div class="col-xl-12">
    <div align="right"><a class="btn btn-sm btn-info" href="{{route('addTranslation')}}">Add Translations</a></div>

    <table id="languageTable" class="display" style="width:100%">
    <thead>
        <tr>
            <th>SL</th>
            <th>Languages</th>
            <th>Language Code</th>
            <th>Translation Status</th>
        </tr>
    </thead>
    <tbody>
    @php $i = 1; @endphp
    @foreach($languages as $language)          
        <tr>
            <td style="white-space: pre-wrap;">{{ $i++ }}</td>
            <td style="white-space: pre-wrap;">{{ $language->name }}</td>
            <td style="white-space: pre-wrap;">{{ $language->code }}</td>
            <td>
                <form action="{{ route('updateTranslationStatus', $language->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <input type="checkbox" name="transStatus" {{ $language->translation_status ? 'checked' : '' }} onchange="this.form.submit()">
                </form>
            </td>
        </tr>
    @endforeach
</tbody>
</table>
</div>
</div>
</div>
</section>
</section>
@endsection

@section('scripts')
<script>
$(document).ready(function() {
    $('#languageTable').DataTable({
        "paging": true, // Enable pagination
        "searching": true // Enable search functionality
    });
});

</script>
@endsection