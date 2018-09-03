$(document).ready(function () {
    if (localStorage.getItem('login-token')) {
        window.location.href = 'http://' + window.location.hostname;
    }

    $(document).on('click', '#send_reset_mail_btn', function (event) {
        event.preventDefault();
        $('#send_reset_mail_form .alert-danger').hide();
        $('#send_reset_mail_form .alert-success').hide();
        $.ajax({
            url: "/api/password/reset",
            type: "POST",
            headers: {
                'Accept': 'application/json',
            },
            data: {
                email: $('#email_receive_mail').val(),
            },
            success: function (response) {
                $('#send_reset_mail_form .alert-success').html(response.result.message);
                $('#send_reset_mail_form .alert-success').show();
            },
            statusCode: {
                404: function (response) {
                    response = JSON.parse(response.responseText);
                    if (response.error) {
                        $('#send_reset_mail_form .alert-danger').html(response.error.message);
                        $('#send_reset_mail_form .alert-danger').show();
                    }
                },
                422: function (response) {
                    response = JSON.parse(response.responseText);
                    let errorMessage = '';
                    if (response.errors) {
                        let errors = Object.keys(response.errors);
                        errors.forEach(error => {
                            errorMessage += response.errors[error] + '<br/>';
                        });
                    }
                    $('#send_reset_mail_form .alert-danger').html(errorMessage);
                    $('#send_reset_mail_form .alert-danger').show();
                }
            }
        });
    })

    $(document).on('click', '#reset_password_btn', function (event) {
        event.preventDefault();
        $('#reset_password_form .alert-success').hide();
        $('#reset_password_form .invalid-feedback-email').hide();
        $('#reset_password_form .invalid-feedback-password').hide();
        $.ajax({
            url: "/api/password/reset",
            type: "PUT",
            headers: {
                'Accept': 'application/json',
            },
            data: {
                token: $('#reset_token').val(),
                email: $('#email_account').val(),
                password: $('#new_password').val(),
                password_confirmation: $('#new_password_confirm').val(),
            },
            success: function (response) {
                $('#reset_password_form .alert-success').html(response.result.message);
                $('#reset_password_form .alert-success').show();
                setTimeout(function() {
                    window.location.href = 'http://' + window.location.hostname; 
                }, 1500);
            },
            statusCode: {
                404: function (response) {
                    response = JSON.parse(response.responseText);
                    if (response.error) {
                        $('#reset_password_form .invalid-feedback-email').html(response.error.message);
                        $('#reset_password_form .invalid-feedback-email').show();
                    }
                },
                422: function (response) {
                    response = JSON.parse(response.responseText)
                    if (response.errors) {
                        let errors = Object.keys(response.errors);
                        errors.forEach(error => {
                            let messageErrors = response.errors[error];
                            if (error == 'password') {
                                $('#reset_password_form .invalid-feedback-password').html('');
                                for (let i = 0; i < messageErrors.length; i++) {
                                    $('#reset_password_form .invalid-feedback-password').append(messageErrors[i] + '<br/>');
                                }
                                $('#reset_password_form .invalid-feedback-password').show();
                            } else {
                                $('#reset_password_form .invalid-feedback-email').html(messageErrors);
                                $('#reset_password_form .invalid-feedback-email').show();
                            }
                        });
                    }
                }
            },
            error: function (response) {
                $('#new_password').val('');
                $('#new_password_confirm').val('');
            }
        });
    })
})