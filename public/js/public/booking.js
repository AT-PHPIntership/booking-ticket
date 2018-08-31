$(document).ready(function () {
    if (!localStorage.getItem('order')) {
        window.location.href = route('user.films.index');
    }

    var booking = JSON.parse(localStorage.getItem('order'));
    var seatId = booking.seat_id;
    var seatName = booking.seat_name;
    seatId = implodeJs(',', seatId.split(","));
    seatName = implodeJs('-', seatName.split(","));
    $.ajax({
        url: route('api.films.show', booking.film_id),
        type: "get",
        headers: {
            'Accept': 'application/json',
        },
        success: function (response) {
          $('#image').attr('src', response.result.image_path);
        },
    });

    $('#name_film').text(booking.name);
    $('#date_schedule').text(booking.date);
    $('#time_schedule').text(booking.time);
    $('#seat_name').text(seatName);
    $('#total').text(booking.price);
    $('#totalFooter').text(booking.price);

    $(document).on('click', '#submit', function (event) {
        event.preventDefault();
        $.ajax({
            url: route('api.booking.store'),
            type: "post",
            headers: {
              'Accept': 'application/json',
              'Authorization': 'Bearer ' + localStorage.getItem('login-token'),
            },
            data: {
              ticket_id	: booking.ticket_id,
              seats: seatId, 
            },
            success: function (response) {
                alert(Lang.get('user/booking.success'));
                window.location.href = route('user.profile');
            },
            statusCode: {
                401: function (response) {
                  alert(response.responseJSON.error);
                }
            }
        });
    });

    $('#back').on('click', function() {
      localStorage.removeItem('order');
      window.location.href = route('user.films.show', booking.film_id);
    });

    function implodeJs(separator,array){
      var temp = '';
      for (var i = 0; i < array.length - 1; i++) {
          temp += array[i];
          if(i != array.length - 2){
            temp += separator; 
          }
      }
      return temp;
    }
})
