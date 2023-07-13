@extends('backend.inc.blank')

<?php
    $first_name = (old('first_name') != null) ? old('first_name') : $user->first_name;
    $last_name = (old('last_name') != null) ? old('last_name') : $user->last_name;
    $username = (old('username') != null) ? old('username') : $user->name;
    $email = (old('email') != null) ? old('email') : $user->email;

?>
@section('content')
<!-- CONTENT WRAPPER -->
<div class="ec-content-wrapper">
    <div class="content">
        <div class="breadcrumb-wrapper breadcrumb-contacts">
            <div>
                <h1>User Profile</h1>
                <p class="breadcrumbs"><span><a href="index.html">Home</a></span>
                    <span><i class="mdi mdi-chevron-right"></i></span>Profile
                </p>
            </div>
            
        </div>
        <div class="card bg-white profile-content">
            <div class="row">
                <div class="col-lg-4 col-xl-3">
                    <div class="profile-content-left profile-left-spacing">
                        <div class="text-center widget-profile px-0 border-0">
                            <div class="card-img mx-auto rounded-circle">
                                @if ($user->image)
                                    <img src="{{ URL::asset('storage/images/permalink/'.$user->image) }}" alt="user image">
                                @else
                                    <img src="{{ URL::asset('assets/img/user/u1.jpg') }}" alt="user image">
                                @endif
                            </div>
                            <div class="card-body">
                                <h4 class="py-2 text-dark">{{ $username }}</h4>
                                <p>{{ $email }}</p>
                            </div>
                        </div>

                        <hr class="w-100">

                        <div class="contact-info pt-4">
                            <h5 class="text-dark">Contact Information</h5>
                            <p class="text-dark font-weight-medium pt-24px mb-2">Email address</p>
                            <p>{{ $email }}</p>                      
                        </div>
                    </div>
                </div>

                <div class="col-lg-8 col-xl-9">
                    <div class="profile-content-right profile-right-spacing py-5">
                        <ul class="nav nav-tabs px-3 px-xl-5 nav-style-border" id="myProfileTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="settings-tab" data-bs-toggle="tab"
                                    data-bs-target="#settings" type="button" role="tab"
                                    aria-controls="settings" aria-selected="true">Settings</button>
                            </li>
                        </ul>
                        <div class="tab-content px-3 px-xl-5" id="myTabContent">

                            <div class="tab-pane fade show active" id="settings" role="tabpanel"
                                aria-labelledby="settings-tab">
                                <div class="tab-pane-content mt-5">
                                    <form action="{{ url('admin/profile') }}" id="form-profile" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row mb-6">
                                            <label for="coverImage"
                                                class="col-sm-4 col-lg-2 col-form-label">User Image</label>
                                            <div class="col-sm-8 col-lg-10">
                                                <div class="custom-file mb-1">
                                                    <input class="form-control" name="image" type="file" id="formFile">
                                                    {{-- <label class="custom-file-label" for="coverImage">Choose
                                                        file...</label>
                                                    <div class="invalid-feedback">Example invalid custom
                                                        file feedback</div> --}}
                                                </div>
                                                @error('image')
                                                        <p class="msg-error">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="firstName">First name*</label>
                                                    <input type="text" class="form-control" name="first_name" id="firstName"
                                                        value="{{ $first_name }}">
                                                    @error('first_name')
                                                        <p class="msg-error">{{ $message }}</p>
                                                   @enderror
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="lastName">Last name*</label>
                                                    <input type="text" name="last_name" class="form-control" id="lastName"
                                                        value="{{ $last_name }}">
                                                    @error('last_name')
                                                        <p class="msg-error">{{ $message }}</p>
                                                   @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group mb-4">
                                            <label for="userName">Username*</label>
                                            <input type="text" class="form-control" name="username" id="userName"
                                                value="{{ $username }}">
                                            @error('username')
                                                <p class="msg-error">{{ $message }}</p>
                                           @enderror
                                        </div>

                                        <div class="form-group mb-4">
                                            <label for="email">Email*</label>
                                            <input type="email" name="email" class="form-control" id="email"
                                                value="{{ $email }}">
                                            @error('email')
                                                <p class="msg-error">{{ $message }}</p>
                                           @enderror
                                        </div>

                                        <div class="form-group mb-4">
                                            <label for="oldPassword">Old password</label>
                                            <input type="password" name="old_password" class="form-control" id="oldPassword">
                                            @error('old_password')
                                                <p class="msg-error">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-4">
                                            <label for="newPassword">New password</label>
                                            <input type="password" name="new_password" class="form-control" id="newPassword">
                                            @error('new_password')
                                                <p class="msg-error">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-4">
                                            <label for="conPassword">Confirm password</label>
                                            <input type="password" name="confirm_password" class="form-control" id="conPassword">
                                            @error('confirm_password')
                                                <p class="msg-error">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </form>
                                    <form action="{{ url('admin/update-profile') }}" method="post" enctype="multipart/form-data">

                                        <div class="d-flex justify-content-end mt-5">
                                            <input type="submit" id="submit" class="btn btn-primary mb-2" value="Update Profile">
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div> <!-- End Content -->
</div> <!-- End Content Wrapper -->
@endsection

@push('scripts')
	<!-- Option Switcher -->
	<script src="{{ URL::asset('assets/plugins/options-sidebar/optionswitcher.js') }}"></script>

	<!-- Ekka Custom -->
	<script src="{{ URL::asset('assets/js/ekka.js') }}"></script>

    <script>
        $('#submit').click(function(e){
            e.preventDefault();
            $('#form-profile').submit();
        });
    </script>
@endpush

@push('styles')
<style>
    .msg-error {
        margin-top: 3px;
        color: red !important;
    }
</style>
@endpush