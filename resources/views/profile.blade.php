@extends('app')

@section('main-section')
    <div class="container rounded bg-white mt-5 mb-5">
        <form action="javascript:void(0)" id="save-profile" method="post">
            @csrf
            <div class="row">
                <div class="col-md-3 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                        <img class="rounded-circle mt-5" width="150px" id="profile-img" style="width: 150px;height: 150px;"
                            src="{{ asset('assets') }}/{{ $profileData->profile_pic }}">
                        <span><button type="button" class="btn btn-dark btn-sm" id="profileImg">Change Picture</button></span>
                        <span class="font-weight-bold">{{ $profileData->fullname }}</span>
                        <span class="text-black-50">{{ $profileData->email_id }}</span>
                    </div>
                    <input type="file" name="profile_pic" id="profile_pic" style="display: contents;">
                </div>
                <div class="col-md-6 border-right">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Profile Settings</h4>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <label class="labels">Fullname</label>
                                <input type="text" class="form-control" name="fullname" placeholder="first name"
                                    value="{{ $profileData->fullname }}">
                            </div>
                            <div class="col-md-6">
                                <label class="labels">Username</label>
                                <input type="text" disabled class="form-control" value="{{ $profileData->username }}"
                                    placeholder="Username">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label class="labels">Mobile Number</label>
                                <input type="number" class="form-control" name="contact_no"
                                    value="{{ $profileData->contact_no }}">
                            </div>
                            <div class="col-md-6">
                                <label class="labels">Email Id</label>
                                <input type="email" class="form-control" disabled value="{{ $profileData->email_id }}">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label class="labels">Address</label>
                                <textarea type="text" class="form-control" name="address">{{ $profileData->address }}</textarea>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label class="labels">Date Of Birth</label>
                                <input type="date" class="form-control" name="dob" value="{{ $profileData->dob }}">
                            </div>
                            <div class="col-md-6">
                                <label class="labels">Register As</label>
                                <input type="text" disabled class="form-control"
                                    value="{{ ucfirst($profileData->roles->role_name) }}">
                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            <button class="btn btn-primary profile-button" id="saveProfileBtn" type="submit">Save
                                Profile</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    </div>
    </div>
@endsection
