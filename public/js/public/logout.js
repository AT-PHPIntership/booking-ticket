$(document).ready(function () {
  $(document).on('click', '#logout', function (event) {
    event.preventDefault();
    var token = localStorage.getItem('login-token');
    $.ajax({
      url: "/api/logout",
      type: "post",
      headers: {
        'Accept': 'application/json',
        'Authorization': 'Bearer ' + token
      },
      success: function (response) {
        localStorage.removeItem('login-token');
        window.location.href = 'http://' + window.location.hostname;
      }
    });
  });
})