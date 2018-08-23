$(document).ready(function() {
    $('#quantity').on('change', function() {
      $("#quantity option:selected").each(function () {
        changeSeatTotal();
      });
    });

    $('.childitem').on('click', function() {
        $("#quantity option:selected").each(function () {
            var idSchedule = $(this).val();
            if (idSchedule == 0) {
                alert('Bạn vui lòng chọn ghế');
            } else {
                selectSeat($(this).attr('data-id'));
            }
        });
       
    });
});

function startTimer(duration, display) {
    var start = Date.now(),
        diff,
        minutes,
        seconds;
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
    var fiveMinutes = 60 * 10,
        display = document.querySelector('#time');
    startTimer(fiveMinutes, display);
};

function changeSeatTotal() {
    var selectedOption = $(".ddl-seat-count option:selected").text();
    seatTotal = parseInt(selectedOption);
    $('[data-seatTotalLabel=""]').text(seatTotal);
    $('[data-totalPrice=""]').text((seatTotal*60000).toLocaleString());
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
        alert('Bạn chỉ được chọn ' + parseFloat(seatTotal) + ' Ghế');
        return false;
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
    var seatCoupleCount = 0;
    var SeatNull=0;
    var seats = document.getElementById('sodoghe').getElementsByClassName('childitem');  
    var countSeatNull=document.getElementsByClassName('item-seat').length;
    var totaldiv = seats.length;
    for (i = 0; i < seats.length; i++) {               
        if (seats.item(i).className == "item-seat-selected childitem") {
            seatCount += 1;
            if (seats.item(i).className == "item-seat-selected-couple childitem") {
                seatCoupleCount += 1;
            }
        }
    }
    if (seatCount > seatTotal) {
        alert('Bạn chỉ được chọn' + parseFloat(seatTotal) + 'Ghế');
        return false;
    }
    
    if (seatCount < seatTotal) {
        alert('Bạn vui lòng chọn thêm ' + (seatTotal - seatCount) + ' ghế để đủ số lượng');
        return false;
    }
    var strList = GetListSeat();
    if (strList != "") {               
        // PageMethods.SendForm(strList, seatTotal, OnSucceeded, OnFailed);
        console.log(strList);
    }
    else {
        alert('Bạn chưa chọn ghế');
        return false;
    }
}
