$(document).ready(function () {
    $('#my-account').hide();
    $('#logout').hide();
    if (localStorage.getItem('login-token')) {
        $('#login').hide();
        $('#register').hide();
        var user = JSON.parse(localStorage.getItem('user'));
        var username = user.full_name;
        $('#my-account').show();
        $("#my-account a").text(username);
        $('#logout').show();
    }
})
