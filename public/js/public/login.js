$(document).ready(function () {
    if (localStorage.getItem('login-token')) {
        window.location.href = 'http://' + window.location.hostname;
    }
    $(document).on('click', '.mybutton', function (event) {
        event.preventDefault();
        $.ajax({
            url: "/api/login",
            type: "post",
            headers: {
                'Accept': 'application/json',
            },
            data: {
                email: $('input[type="email"]').val(),
                password: $('input[type="password"]').val() 
            },
            success: function (response) {
                localStorage.setItem('login-token', response.result.token);
                window.localStorage.setItem('user', JSON.stringify(response.result.user))
                window.location.href = 'http://' + window.location.hostname;
            },
            error: function (response) {
                $('#error-message').html(JSON.parse(response.responseText).error);
                $('input[type="password"]').val('');
            }
            // statusCode: {
            //     401: function (response) {
            //         alert(response.responseJSON.error);
            //     }
            // }
        });
    });
})
