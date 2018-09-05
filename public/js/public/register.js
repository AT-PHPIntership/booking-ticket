$(document).ready(function () {
    if (localStorage.getItem('login-token')) {
        window.location.href = 'http://' + window.location.hostname;
    }

    $(".form").validate({
        rules: {
            full_name: {
                required: true,
                minlength: 6,
                maxlength: 32
            },
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 8
            },
            repassword: {
                required: true,
                equalTo: "#password"
            },
            phone:{
                required: true,
                number: true,
                minlength: 10,
                maxlength: 11
            },
            address: {
                required: true,
            },
        },
    });

    $(document).on('click', '.form input[type="submit"]', function (event) {
       event.preventDefault();
        $.ajax({
            url: "/api/register",
            type: "post",
            headers: {
                'Accept': 'application/json',
            },
            data: {
                full_name: $('.form input[name="full_name"]').val(),
                email: $('.form input[name="email"]').val(),
                password: $('.form input[name="password"]').val(),
                phone: $('.form input[name="phone"]').val(),
                address: $('.form input[name="address"]').val(),
            },
            success: function (response) {
                localStorage.setItem('login-token', response.result.token);
                window.localStorage.setItem('user', JSON.stringify(response.result.user));
                alert(Lang.get('user/login.register_success'));
                window.location.href = 'http://' + window.location.hostname;
            },
            error: function (response) {
                var result = JSON.parse(response.responseText);
                var errors = result.errors;
                var html = '';
                $.each(errors, function(key, value) {
                html += '<strong class="error">' + value + '</strong><br>';
                });
                $('#error').html(html);
            }
        });
    })
})
