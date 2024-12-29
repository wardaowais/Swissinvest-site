@extends('admin.layouts.app')

@section('content')
<!-- index.blade.php -->
<section class="section dashboard">
<div class="row">
@if(session('account_success'))
            <div class="alert alert-success">
                {{ session('account_success') }}
            </div>
        @endif
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    <div class="col-xl-6 col-lg-6">
        <h2>Send Email</h2>

        <form action="{{ route('admin.send-email.post') }}" method="POST">
            @csrf

            
                            <div class="col-12 allo__login ">
                                <div class="input-wrapper">
                                <label for="emails">Select Users:</label>
                <select id="emails" name="emails[]" class="form-control" multiple="multiple">
                    @foreach($users as $user)
                        <option value="{{ $user->email }}">{{ $user->email }}</option>
                    @endforeach
                </select>
                                </div>
                            </div>
            <div class="form-group">
                <button type="button" id="selectAll" class="btn btn-secondary">Select All</button>
                <button type="button" id="selectFirst10" class="btn btn-secondary">Select First 10</button>
            </div>
            <div class="col-12 allo__login ">
            <div class="input-wrapper">
                <label for="subject">Subject:</label>
                <input type="text" class="form-control" id="subject" name="subject" required>
            </div>
            </div>
            <!-- <div class="form-group">
                <label for="body">Body:</label>
                <textarea class="form-control" id="body" name="body" rows="5" required></textarea>
            </div> -->
            <div class=" pb-2">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="Save_btn">
                            <button type="submit" class="btn">Send Email</button>
                            </div>
                        </div>

                    </div>
          
        </form>
    </div>
    <div class="col-xl-6 col-lg-6">
        <h2>{{translate('Manual Account Creation')}}</h2>

       

        <form action="{{ route('createManualAccount') }}" method="POST">
            @csrf
            <div class="col-12">
                <div class="input-wrapper">
                    <label for="first_name">First Name:</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" required>
                </div>
            </div>
            <div class="col-12">
                <div class="input-wrapper">
                    <label for="last_name">Family Name:</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" required>
                </div>
            </div>
            <div class="col-12">
                <div class="input-wrapper">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
            </div>
            <br>
            <div class="pb-2">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="Save_btn">
                        <button type="submit" class="btn">Create Account</button>
                    </div>
                </div>
            </div>
        </form>
        </div>
</div>
</section>
@endsection

@section('scripts')
<script>
$(document).ready(function() {
  
    $('#emails').select2({
        placeholder: "Select users to send email",
        allowClear: true
    });
    $('#selectAll').click(function() {
        var allEmails = [];
        $('#emails option').each(function() {
            allEmails.push($(this).val());
        });
        $('#emails').val(allEmails).trigger('change');
    });

    $('#selectFirst10').click(function() {
        var first10Emails = [];
        $('#emails option').slice(0, 10).each(function() {
            first10Emails.push($(this).val());
        });
        $('#emails').val(first10Emails).trigger('change');
    });
});
</script>
@endsection
