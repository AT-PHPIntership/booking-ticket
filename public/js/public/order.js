$(document).ready(function() {
    if (!localStorage.getItem('booking')) {
        window.location.href = route('api.films.index');
    }
    var idSchedule;
    var array = [];
    var booking = JSON.parse(localStorage.getItem('booking'));
    $('#name_film').text(booking.name);
    $('#date_schedule').text(booking.date);
    $('#time_schedule').text(booking.time);
    $.ajax({
        url: route('api.schedule.seat', booking.schedule_id),
        type: "get",
        headers: {
            'Accept': 'application/json',
        },
        success: function (response) {
            response.result.booked.forEach(booked => {
                bookedSeat(booked.seat_id);
                array.push(booked.seat_id);
            });
        },
    });

    $('#quantity').on('change', function() {
      $("#quantity option:selected").each(function () {
        idSchedule = $(this).val();
        changeSeatTotal();
      });
    });

    $('.childitem').on('click', function() {
        var seatID = $(this).attr('data-id');
        if (idSchedule && !array.includes(seatID)) {
            selectSeat(seatID);
            return;
        }
        alert(Lang.get('user/booking.please_choose_number'));
    });

    $('#btnNext').on('click', function() {
        if (idSchedule) {
            Continue();
            return;
        }
        alert(Lang.get('user/booking.please_choose_number'));
    });

    $('#btnChangeTime').on('click', function() {
        localStorage.removeItem('booking');
        window.location.href = route('user.films.show', booking.film_id);
    });

function startTimer(duration, display) {
    var start = Date.now(), diff, minutes, seconds;
    function timer() {
        diff = duration - (((Date.now() - start) / 1000) | 0);
        minutes = (diff / 60) | 0;
        seconds = (diff % 60) | 0;

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = minutes + ":" + seconds; 

        if (diff <= 0) {
            start = Date.now() + 1000;
        }
    };
    timer();
    setInterval(timer, 1000);
}

window.onload = function () {
    var tenMinutes = 60 * 10,
    display = document.querySelector('#time');
    setTimeout(function(){
        localStorage.removeItem('booking');
        window.location.href = route('api.films.index');
    }, 600000);
    startTimer(tenMinutes, display);
};

function changeSeatTotal() {
    var selectedOption = $(".ddl-seat-count option:selected").text();
    seatTotal = parseInt(selectedOption);
    $('[data-seatTotalLabel=""]').text(seatTotal);
    $('[data-totalPrice=""]').text((seatTotal*convertPrice(booking.price)*1000).toLocaleString());
    $('div.item-seat-selected').removeClass('item-seat-selected childitem').addClass('item-seat childitem');
}

function selectSeat(seatID) {
    var seat = document.getElementById(seatID).className;
    if (seat == "item-seat childitem") {
        document.getElementById(seatID).className = "item-seat-selected childitem";
    }
    else if (seat == "item-seat-selected childitem") {
        document.getElementById(seatID).className = "item-seat childitem";
    }
  
    var seatCount = 0;
    var a = document.getElementById('sodoghe').getElementsByClassName('childitem');  
    for (i = 0; i < a.length; i++) {
        if (a.item(i).className == "item-seat-selected childitem") {
            seatCount += 1;
        }
    }
    if (seatCount > seatTotal) {
        var classSeat = document.getElementById(seatID).className;
        if (classSeat == "item-seat-selected childitem") {
            document.getElementById(seatID).className = "item-seat childitem";
        }
        alert(Lang.get('user/booking.choose_only') + parseFloat(seatTotal) + Lang.get('user/booking.seat'));
        return false;
    }
}

function bookedSeat(seatID) {
    var seat = document.getElementById(seatID).className;
    if (seat == "item-seat childitem") {
        document.getElementById(seatID).className = "item-seat-booked childitem";
    }
}

function GetListSeat() {
    var  seats = document.getElementById('sodoghe').getElementsByClassName('childitem');  
    var listSeat = "";
    for (i = 0; i < seats.length; i++) {
        if (seats.item(i).className == "item-seat-selected childitem") {
            listSeat += seats.item(i).id + ",";
        }
    }
    return listSeat;
}

function Continue() {
    var seatCount = 0;
    var seats = document.getElementById('sodoghe').getElementsByClassName('childitem');  
    var countSeatNull = document.getElementsByClassName('item-seat').length;
    var totaldiv = seats.length;
    for (i = 0; i < seats.length; i++) {               
        if (seats.item(i).className == "item-seat-selected childitem") {
            seatCount += 1;
        }
    }
    if (seatCount > seatTotal) {
        alert(Lang.get('user/booking.choose_only') + parseFloat(seatTotal) + Lang.get('user/booking.seat'));
        return false;
    }
    
    if (seatCount < seatTotal) {
        alert(Lang.get('user/booking.choose_add') + (seatTotal - seatCount) + Lang.get('user/booking.order_to'));
        return false;
    }
    var strList = GetListSeat();
    if (strList != "") {
        var order = {
            name_film: booking.name,
            ticket_id: booking.ticket_id,
            seat_id: strList,
            room_id: booking.room_id,
            time: booking.time,
            date: booking.date,
            price: $('[data-totalPrice=""]').text(),
        };
        localStorage.removeItem('booking');
        window.localStorage.setItem('order', JSON.stringify(order));     
        window.location.href = route('user.confirm');
    } else {
        alert(Lang.get('user/booking.choose_no'));
        return false;
    }
}

function convertPrice(price) {
    var price = price.split(",");
    return parseInt(price[0]);
}
});
