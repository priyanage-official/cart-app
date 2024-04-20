// Login Submit
function closeModal() {
    var myModalEl = document.querySelector('#authModal');
    var modal = bootstrap.Modal.getOrCreateInstance(myModalEl)
    modal.hide();

    $('.modal-backdrop').hide();
}

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

                        window.location.replace('/');

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

    $("#register-form").validate({
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
            },
            role_name: {
                required: true
            },
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
                            header: 'Register',
                            group: 'bg-primary',

                        });
                    }

                },
                error: function (jqXHR, textStatus, errorThrown) {
                    $("#registerBtn").attr('disabled', false);
                    $.jGrowl(jqXHR.responseJSON.message, {
                        header: 'Register',
                        group: 'bg-danger',

                    });
                }
            })
        }
    });
});
