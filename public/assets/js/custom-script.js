// Modal Close For Bootstrap 5 & JS
function closeModal() {
    var myModalEl = document.querySelector('#authModal');
    var modal = bootstrap.Modal.getOrCreateInstance(myModalEl)
    modal.hide();

    $('.modal-backdrop').hide();
}

$("#profileImg").click(function (e) {
    $("#profile_pic").trigger('click');
});

$("#profile_pic").change(function () {
    let files = $("#profile_pic")[0].files;

    console.log(files);

    if(files.length > 0){
        let reader = new FileReader();
        reader.onload = function () {
            let output = document.getElementById('profile-img');
            output.src = reader.result;
        }

        if(event.target.files[0]){
            reader.readAsDataURL(event.target.files[0])
        }
    }
});

$(document).ready(function () {

    document.querySelectorAll('.dropdown-toggle').forEach(item => {
        item.addEventListener('click', event => {

            if (event.target.classList.contains('dropdown-toggle')) {
                event.target.classList.toggle('toggle-change');
            }
            else if (event.target.parentElement.classList.contains('dropdown-toggle')) {
                event.target.parentElement.classList.toggle('toggle-change');
            }
        })
    });

    //User Login
    $("#login-form").validate({
        rules: {
            username: {
                required: true
            },
            password: {
                required: true
            }
        },
        submitHandler: function (form) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("#loginBtn").attr('disabled', false);

            let href = "http://127.0.0.1:8000/login";

            let formData = new FormData(form);

            $.ajax({
                url: href,
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response, textStatus, jqXHR) {
                    $("#loginBtn").attr('disabled', false);

                    if (jqXHR.responseJSON.statusCode == 200) {
                        document.getElementById("login-form").reset();
                        closeModal();

                        window.location.replace(response.redirectTo);

                        $.jGrowl(jqXHR.responseJSON.message, {
                            header: 'Login',
                            group: 'bg-primary',

                        });
                    } else {
                        $.jGrowl(jqXHR.responseJSON.message, {
                            header: 'Login',
                            group: 'bg-danger',

                        });
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    $("#loginBtn").attr('disabled', false);
                    $.jGrowl(jqXHR.responseJSON.message, {
                        header: 'Login',
                        group: 'bg-danger',

                    });
                }
            })
        }
    });

    //User Registration
    $("#register-form").validate({
        rules: {
            fullname: {
                required: true
            },
            email_id: {
                required: true
            },
            contact_no: {
                required: true
            },
            username: {
                required: true
            },
            password: {
                required: true
            },
            address: {
                required: true
            },
            dob: {
                required: true
            },
            profile_pic: {
                required: true
            }
        },
        submitHandler: function (form) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("#registerBtn").attr('disabled', true);

            let href = "http://127.0.0.1:8000/register";

            let formData = new FormData(form);

            let files = $("#registerProfilePic")[0].files;

            if (files.length > 0) {
                formData.append("profile_pic", files);
            } else {
                formData.append("profile_pic", '')
            }

            $.ajax({
                url: href,
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (resposne, textStatus, jqXHR) {
                    $("#registerBtn").attr('disabled', false);

                    if (jqXHR.responseJSON.statusCode == 200) {
                        document.getElementById("register-form").reset();
                        closeModal();

                        $.jGrowl(jqXHR.responseJSON.message, {
                            header: 'Registration',
                            group: 'bg-primary',

                        });
                    }

                },
                error: function (jqXHR, textStatus, errorThrown) {
                    $("#registerBtn").attr('disabled', false);
                    $.jGrowl(jqXHR.responseJSON.message, {
                        header: 'Registration',
                        group: 'bg-danger',

                    });
                }
            })
        }
    });

    //Save Profile
    $("#save-profile").validate({
        rules: {
            fullname: {
                required: true
            },
            email_id: {
                required: true
            },
            contact: {
                required: true
            },
            address: {
                required: true
            },
            dob: {
                required: true
            }
        },
        submitHandler: function (form) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("#saveProfileBtn").attr('disabled', true);

            let href = "http://127.0.0.1:8000/save-profile";

            let formData = new FormData(form);

            let files = $("#registerProfilePic")[0].files;

            if (files.length > 0) {
                formData.append("profile_pic", files);
            } else {
                formData.append("profile_pic", '')
            }

            $.ajax({
                url: href,
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (resposne, textStatus, jqXHR) {
                    $("#saveProfileBtn").attr('disabled', false);

                    if (jqXHR.responseJSON.statusCode == 200) {

                        $.jGrowl(jqXHR.responseJSON.message, {
                            header: 'Save Profile',
                            group: 'bg-primary',

                        });
                    }

                },
                error: function (jqXHR, textStatus, errorThrown) {
                    $("#saveProfileBtn").attr('disabled', false);
                    $.jGrowl(jqXHR.responseJSON.message, {
                        header: 'Save Profile',
                        group: 'bg-danger',

                    });
                }
            })
        }
    });
});
