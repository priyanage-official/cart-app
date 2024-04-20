<!-- Login Modal -->
<div class="modal" id="authModal" tabindex="-1" aria-labelledby="authModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header p-1">
                <h5 class="modal-title" id="authModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-2">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                            type="button" role="tab" aria-controls="home" aria-selected="true">Login</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                            type="button" role="tab" aria-controls="profile"
                            aria-selected="false">Registration</button>
                    </li>
                </ul>
                <div class="tab-content p-2" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel"
                        aria-labelledby="home-tab">
                        <form method="post" action="javascript:void(0)" name="login-form" id="login-form">
                            @csrf
                            <div class="row">
                                <div class="mb-3">
                                    <label for="loginUsername" class="form-label">Username</label>
                                    <input type="text" class="form-control" name="username" id="loginUsername">
                                </div>
                                <div class="mb-3">
                                    <label for="loginPassword" class="form-label">Password</label>
                                    <input type="password" class="form-control" name="password" id="loginPassword">
                                </div>
                                <div class="modal-footer p-1">
                                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary btn-sm" id="loginBtn">Login</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <form action="javascript:void(0)" name="register-form" id="register-form" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 mb-2">
                                    @php $roles = myHelper::getUserRoleType(); @endphp
                                    <label for="registerRole" class="form-label">Register As</label>
                                    <div>
                                        @if(count($roles) > 0)
                                            @foreach($roles as $role)
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="role_name" id="CustomerRole" value="{{$role->id}}">
                                                    <label class="form-check-label" for="CustomerRole">{{ucfirst($role->role_name)}}</label>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <label for="registerFullname" class="form-label">Fullname</label>
                                    <input type="text" class="form-control" name="fullname" id="registerFullname" autocomplete="off">
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <label for="registerEmail" class="form-label">Email Id</label>
                                    <input type="email" class="form-control" name="email_id" id="registerEmail" autocomplete="off">
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <label for="registerUsername" class="form-label">Username</label>
                                    <input type="text" class="form-control" name="username" id="registerUsername" autocomplete="off">
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <label for="registerPassword" class="form-label">Password</label>
                                    <input type="password" class="form-control" name="password" id="registerPassword" autocomplete="off">
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <label for="registerContact" class="form-label">Contact</label>
                                    <input type="number" class="form-control" name="contact_no" id="registerContact" autocomplete="off">
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <label for="registerAddress" class="form-label">Address</label>
                                    <textarea class="form-control" name="address" rows="2" id="registerAddress"></textarea>
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <label for="registerDOB" class="form-label">Date Of Birth</label>
                                    <input type="date" class="form-control" name="dob" id="registerDOB">
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <label for="registerProfilePic" class="form-label">Profile Picture</label>
                                    <input type="file" class="form-control" name="profile_pic" id="registerProfilePic">
                                </div>
                                <div class="modal-footer p-1">
                                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary btn-sm" id="registerBtn">Register</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>