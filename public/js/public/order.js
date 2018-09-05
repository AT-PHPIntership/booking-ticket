$(document).ready(function() {
    if (!localStorage.getItem('booking') || !localStorage.getItem('login-token')) {
        window.location.href = route('user.home');
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
            
            var arraySeat = chunkArray(response.result.totalSeats, 14);
            var html = '<div seatline="1" id="A1" class="item-seat line-seat" style="margin-left:50px; top:137px;">A</div>\
            <div seatline="1" data-id="' + arraySeat[0][0].seat_id + '" data-seat="A1" id="' + arraySeat[0][0].seat_id + '" class="item-seat childitem" style="left:183px; top:138px;">1</div>\
            <div seatline="1" data-id="' + arraySeat[0][1].seat_id + '" data-seat="A2" id="' + arraySeat[0][1].seat_id + '" class="item-seat childitem" style="left:247px; top:138px;">2</div>\
            <div seatline="1" data-id="' + arraySeat[0][2].seat_id + '" data-seat="A3" id="' + arraySeat[0][2].seat_id + '" class="item-seat childitem" style="left:311px; top:138px;">3</div>\
            <div seatline="1" data-id="' + arraySeat[0][3].seat_id + '" data-seat="A4" id="' + arraySeat[0][3].seat_id + '" class="item-seat childitem" style="left:375px; top:138px;">4</div>\
            <div seatline="1" data-id="' + arraySeat[0][4].seat_id + '" data-seat="A5" id="' + arraySeat[0][4].seat_id + '" class="item-seat childitem" style="left:438px; top:138px;">5</div>\
            <div seatline="1" data-id="' + arraySeat[0][5].seat_id + '" data-seat="A6" id="' + arraySeat[0][5].seat_id + '" class="item-seat childitem" style="left:502px; top:138px;">6</div>\
            <div seatline="1" data-id="' + arraySeat[0][6].seat_id + '" data-seat="A7" id="' + arraySeat[0][6].seat_id + '" class="item-seat childitem" style="left:603px; top:138px;">7</div>\
            <div seatline="1" data-id="' + arraySeat[0][7].seat_id + '" data-seat="A8" id="' + arraySeat[0][7].seat_id + '" class="item-seat childitem" style="left:667px; top:138px;">8</div>\
            <div seatline="1" data-id="' + arraySeat[0][8].seat_id + '" data-seat="A9" id="' + arraySeat[0][8].seat_id + '" class="item-seat childitem" style="left:731px; top:138px;">9</div>\
            <div seatline="1" data-id="' + arraySeat[0][9].seat_id + '" data-seat="A10" id="' + arraySeat[0][9].seat_id + '" class="item-seat childitem" style="left:795px; top:138px;">10</div>\
            <div seatline="1" data-id="' + arraySeat[0][10].seat_id + '" data-seat="A11" id="' + arraySeat[0][10].seat_id + '" class="item-seat childitem" style="left:858px; top:138px;">11</div>\
            <div seatline="1" data-id="' + arraySeat[0][11].seat_id + '" data-seat="A12" id="' + arraySeat[0][11].seat_id + '" class="item-seat childitem" style="left:922px; top:138px;">12</div>\
            <div seatline="1" data-id="' + arraySeat[0][12].seat_id + '" data-seat="A13" id="' + arraySeat[0][12].seat_id + '" class="item-seat childitem" style="left:986px; top:138px;">13</div>\
            <div seatline="1" data-id="' + arraySeat[0][13].seat_id + '" data-seat="A14" id="' + arraySeat[0][13].seat_id + '" class="item-seat childitem" style="left:1050px; top:138px;">14</div>\
            <div seatline="1" id="B1" class="item-seat line-seat" style="margin-left:50px; top:181px;">B</div>\
            <div seatline="1" data-id="' + arraySeat[1][0].seat_id + '" data-seat="B1" id="' + arraySeat[1][0].seat_id + '" class="item-seat childitem" style="left:183px; top:182px;">1</div>\
            <div seatline="1" data-id="' + arraySeat[1][1].seat_id + '" data-seat="B2" id="' + arraySeat[1][1].seat_id + '" class="item-seat childitem" style="left:247px; top:182px;">2</div>\
            <div seatline="1" data-id="' + arraySeat[1][2].seat_id + '" data-seat="B3" id="' + arraySeat[1][2].seat_id + '" class="item-seat childitem" style="left:311px; top:182px;">3</div>\
            <div seatline="1" data-id="' + arraySeat[1][3].seat_id + '" data-seat="B4" id="' + arraySeat[1][3].seat_id + '" class="item-seat childitem" style="left:375px; top:182px;">4</div>\
            <div seatline="1" data-id="' + arraySeat[1][4].seat_id + '" data-seat="B5" id="' + arraySeat[1][4].seat_id + '" class="item-seat childitem" style="left:438px; top:182px;">5</div>\
            <div seatline="1" data-id="' + arraySeat[1][5].seat_id + '" data-seat="B6" id="' + arraySeat[1][5].seat_id + '" class="item-seat childitem" style="left:502px; top:182px;">6</div>\
            <div seatline="2" data-id="' + arraySeat[1][6].seat_id + '" data-seat="B7" id="' + arraySeat[1][6].seat_id + '" class="item-seat childitem" style="left:603px; top:182px;">7</div>\
            <div seatline="2" data-id="' + arraySeat[1][7].seat_id + '" data-seat="B8" id="' + arraySeat[1][7].seat_id + '" class="item-seat childitem" style="left:667px; top:182px;">8</div>\
            <div seatline="2" data-id="' + arraySeat[1][8].seat_id + '" data-seat="B9" id="' + arraySeat[1][8].seat_id + '" class="item-seat childitem" style="left:731px; top:182px;">9</div>\
            <div seatline="2" data-id="' + arraySeat[1][9].seat_id + '" data-seat="B10" id="' + arraySeat[1][9].seat_id + '" class="item-seat childitem" style="left:795px; top:182px;">10</div>\
            <div seatline="2" data-id="' + arraySeat[1][10].seat_id + '" data-seat="B11" id="' + arraySeat[1][10].seat_id + '" class="item-seat childitem" style="left:858px; top:182px;">11</div>\
            <div seatline="2" data-id="' + arraySeat[1][11].seat_id + '" data-seat="B12" id="' + arraySeat[1][11].seat_id + '" class="item-seat childitem" style="left:922px; top:182px;">12</div>\
            <div seatline="2" data-id="' + arraySeat[1][12].seat_id + '" data-seat="B13" id="' + arraySeat[1][12].seat_id + '" class="item-seat childitem" style="left:986px; top:182px;">13</div>\
            <div seatline="2" data-id="' + arraySeat[1][13].seat_id + '" data-seat="B14" id="' + arraySeat[1][13].seat_id + '" class="item-seat childitem" style="left:1050px; top:182px;">14</div>\
            <div seatline="1" id="C1" class="item-seat line-seat" style="margin-left:50px; top:226px;">C</div>\
            <div seatline="1" data-id="' + arraySeat[2][0].seat_id + '" data-seat="C1" id="' + arraySeat[2][0].seat_id + '" class="item-seat childitem" style="left:183px; top:227px;">1</div>\
            <div seatline="1" data-id="' + arraySeat[2][1].seat_id + '" data-seat="C2" id="' + arraySeat[2][1].seat_id + '" class="item-seat childitem" style="left:247px; top:227px;">2</div>\
            <div seatline="1" data-id="' + arraySeat[2][2].seat_id + '" data-seat="C3" id="' + arraySeat[2][2].seat_id + '" class="item-seat childitem" style="left:311px; top:227px;">3</div>\
            <div seatline="1" data-id="' + arraySeat[2][3].seat_id + '" data-seat="C4" id="' + arraySeat[2][3].seat_id + '" class="item-seat childitem" style="left:375px; top:227px;">4</div>\
            <div seatline="1" data-id="' + arraySeat[2][4].seat_id + '" data-seat="C5" id="' + arraySeat[2][4].seat_id + '" class="item-seat childitem" style="left:438px; top:227px;">5</div>\
            <div seatline="1" data-id="' + arraySeat[2][5].seat_id + '" data-seat="C6" id="' + arraySeat[2][5].seat_id + '" class="item-seat childitem" style="left:502px; top:227px;">6</div>\
            <div seatline="2" data-id="' + arraySeat[2][6].seat_id + '" data-seat="C7" id="' + arraySeat[2][6].seat_id + '" class="item-seat childitem" style="left:603px; top:227px;">7</div>\
            <div seatline="2" data-id="' + arraySeat[2][7].seat_id + '" data-seat="C8" id="' + arraySeat[2][7].seat_id + '" class="item-seat childitem" style="left:667px; top:227px;">8</div>\
            <div seatline="2" data-id="' + arraySeat[2][8].seat_id + '" data-seat="C9" id="' + arraySeat[2][8].seat_id + '" class="item-seat childitem" style="left:731px; top:227px;">9</div>\
            <div seatline="2" data-id="' + arraySeat[2][9].seat_id + '" data-seat="C10" id="' + arraySeat[2][9].seat_id + '" class="item-seat childitem" style="left:795px; top:227px;">10</div>\
            <div seatline="2" data-id="' + arraySeat[2][10].seat_id + '" data-seat="C11" id="' + arraySeat[2][10].seat_id + '" class="item-seat childitem" style="left:858px; top:227px;">11</div>\
            <div seatline="2" data-id="' + arraySeat[2][11].seat_id + '" data-seat="C12" id="' + arraySeat[2][11].seat_id + '" class="item-seat childitem" style="left:922px; top:227px;">12</div>\
            <div seatline="2" data-id="' + arraySeat[2][12].seat_id + '" data-seat="C13" id="' + arraySeat[2][12].seat_id + '" class="item-seat childitem" style="left:986px; top:227px;">13</div>\
            <div seatline="2" data-id="' + arraySeat[2][13].seat_id + '" data-seat="C14" id="' + arraySeat[2][13].seat_id + '" class="item-seat childitem" style="left:1050px; top:227px;">14</div>\
            <div seatline="1" id="D1" class="item-seat line-seat" style="margin-left:50px; top:270px;">D</div>\
            <div seatline="1" data-id="' + arraySeat[3][0].seat_id + '" data-seat="D1" id="' + arraySeat[3][0].seat_id + '" class="item-seat childitem" style="left:183px; top:271px;">1</div>\
            <div seatline="1" data-id="' + arraySeat[3][1].seat_id + '" data-seat="D2" id="' + arraySeat[3][1].seat_id + '" class="item-seat childitem" style="left:247px; top:271px;">2</div>\
            <div seatline="1" data-id="' + arraySeat[3][2].seat_id + '" data-seat="D3" id="' + arraySeat[3][2].seat_id + '" class="item-seat childitem" style="left:311px; top:271px;">3</div>\
            <div seatline="1" data-id="' + arraySeat[3][3].seat_id + '" data-seat="D4" id="' + arraySeat[3][3].seat_id + '" class="item-seat childitem" style="left:375px; top:271px;">4</div>\
            <div seatline="1" data-id="' + arraySeat[3][4].seat_id + '" data-seat="D5" id="' + arraySeat[3][4].seat_id + '" class="item-seat childitem" style="left:438px; top:271px;">5</div>\
            <div seatline="1" data-id="' + arraySeat[3][5].seat_id + '" data-seat="D6" id="' + arraySeat[3][5].seat_id + '" class="item-seat childitem" style="left:502px; top:271px;">6</div>\
            <div seatline="2" data-id="' + arraySeat[3][6].seat_id + '" data-seat="D7" id="' + arraySeat[3][6].seat_id + '" class="item-seat childitem" style="left:603px; top:271px;">7</div>\
            <div seatline="2" data-id="' + arraySeat[3][7].seat_id + '" data-seat="D8" id="' + arraySeat[3][7].seat_id + '" class="item-seat childitem" style="left:667px; top:271px;">8</div>\
            <div seatline="2" data-id="' + arraySeat[3][8].seat_id + '" data-seat="D9" id="' + arraySeat[3][8].seat_id + '" class="item-seat childitem" style="left:731px; top:271px;">9</div>\
            <div seatline="2" data-id="' + arraySeat[3][9].seat_id + '" data-seat="D10" id="' + arraySeat[3][9].seat_id + '" class="item-seat childitem" style="left:795px; top:271px;">10</div>\
            <div seatline="2" data-id="' + arraySeat[3][10].seat_id + '" data-seat="D11" id="' + arraySeat[3][10].seat_id + '" class="item-seat childitem" style="left:858px; top:271px;">11</div>\
            <div seatline="2" data-id="' + arraySeat[3][11].seat_id + '" data-seat="D12" id="' + arraySeat[3][11].seat_id + '" class="item-seat childitem" style="left:922px; top:271px;">12</div>\
            <div seatline="2" data-id="' + arraySeat[3][12].seat_id + '" data-seat="D13" id="' + arraySeat[3][12].seat_id + '" class="item-seat childitem" style="left:986px; top:271px;">13</div>\
            <div seatline="2" data-id="' + arraySeat[3][13].seat_id + '" data-seat="D14" id="' + arraySeat[3][13].seat_id + '" class="item-seat childitem" style="left:1050px; top:271px;">14</div>\
            <div seatline="1" id="E1" class="item-seat line-seat" style="margin-left:50px; top:314px;">E</div>\
            <div seatline="1" data-id="' + arraySeat[4][0].seat_id + '" data-seat="E1" id="' + arraySeat[4][0].seat_id + '" class="item-seat childitem" style="left:183px; top:315px;">1</div>\
            <div seatline="1" data-id="' + arraySeat[4][1].seat_id + '" data-seat="E2" id="' + arraySeat[4][1].seat_id + '" class="item-seat childitem" style="left:247px; top:315px;">2</div>\
            <div seatline="1" data-id="' + arraySeat[4][2].seat_id + '" data-seat="E3" id="' + arraySeat[4][2].seat_id + '" class="item-seat childitem" style="left:311px; top:315px;">3</div>\
            <div seatline="1" data-id="' + arraySeat[4][3].seat_id + '" data-seat="E4" id="' + arraySeat[4][3].seat_id + '" class="item-seat childitem" style="left:375px; top:315px;">4</div>\
            <div seatline="1" data-id="' + arraySeat[4][4].seat_id + '" data-seat="E5" id="' + arraySeat[4][4].seat_id + '" class="item-seat childitem" style="left:438px; top:315px;">5</div>\
            <div seatline="1" data-id="' + arraySeat[4][5].seat_id + '" data-seat="E6" id="' + arraySeat[4][5].seat_id + '" class="item-seat childitem" style="left:502px; top:315px;">6</div>\
            <div seatline="2" data-id="' + arraySeat[4][6].seat_id + '" data-seat="E7" id="' + arraySeat[4][6].seat_id + '" class="item-seat childitem" style="left:603px; top:315px;">7</div>\
            <div seatline="2" data-id="' + arraySeat[4][7].seat_id + '" data-seat="E8" id="' + arraySeat[4][7].seat_id + '" class="item-seat childitem" style="left:667px; top:315px;">8</div>\
            <div seatline="2" data-id="' + arraySeat[4][8].seat_id + '" data-seat="E9" id="' + arraySeat[4][8].seat_id + '" class="item-seat childitem" style="left:731px; top:315px;">9</div>\
            <div seatline="2" data-id="' + arraySeat[4][9].seat_id + '" data-seat="E10" id="' + arraySeat[4][9].seat_id + '" class="item-seat childitem" style="left:795px; top:315px;">10</div>\
            <div seatline="2" data-id="' + arraySeat[4][10].seat_id + '" data-seat="E11" id="' + arraySeat[4][10].seat_id + '" class="item-seat childitem" style="left:858px; top:315px;">11</div>\
            <div seatline="2" data-id="' + arraySeat[4][11].seat_id + '" data-seat="E12" id="' + arraySeat[4][11].seat_id + '" class="item-seat childitem" style="left:922px; top:315px;">12</div>\
            <div seatline="2" data-id="' + arraySeat[4][12].seat_id + '" data-seat="E13" id="' + arraySeat[4][12].seat_id + '" class="item-seat childitem" style="left:986px; top:315px;">13</div>\
            <div seatline="2" data-id="' + arraySeat[4][13].seat_id + '" data-seat="E14" id="' + arraySeat[4][13].seat_id + '" class="item-seat childitem" style="left:1050px; top:315px;">14</div>\
            <div seatline="1" id="F1" class="item-seat line-seat" style="margin-left:50px; top:358px;">F</div>\
            <div seatline="1" data-id="' + arraySeat[5][0].seat_id + '" data-seat="F1" id="' + arraySeat[5][0].seat_id + '" class="item-seat childitem" style="left:183px; top:359px;">1</div>\
            <div seatline="1" data-id="' + arraySeat[5][1].seat_id + '" data-seat="F2" id="' + arraySeat[5][1].seat_id + '" class="item-seat childitem" style="left:247px; top:359px;">2</div>\
            <div seatline="1" data-id="' + arraySeat[5][2].seat_id + '" data-seat="F3" id="' + arraySeat[5][2].seat_id + '" class="item-seat childitem" style="left:311px; top:359px;">3</div>\
            <div seatline="1" data-id="' + arraySeat[5][3].seat_id + '" data-seat="F4" id="' + arraySeat[5][3].seat_id + '" class="item-seat childitem" style="left:375px; top:359px;">4</div>\
            <div seatline="1" data-id="' + arraySeat[5][4].seat_id + '" data-seat="F5" id="' + arraySeat[5][4].seat_id + '" class="item-seat childitem" style="left:438px; top:359px;">5</div>\
            <div seatline="1" data-id="' + arraySeat[5][5].seat_id + '" data-seat="F6" id="' + arraySeat[5][5].seat_id + '" class="item-seat childitem" style="left:502px; top:359px;">6</div>\
            <div seatline="2" data-id="' + arraySeat[5][6].seat_id + '" data-seat="F7" id="' + arraySeat[5][6].seat_id + '" class="item-seat childitem" style="left:603px; top:359px;">7</div>\
            <div seatline="2" data-id="' + arraySeat[5][7].seat_id + '" data-seat="F8" id="' + arraySeat[5][7].seat_id + '" class="item-seat childitem" style="left:667px; top:359px;">8</div>\
            <div seatline="2" data-id="' + arraySeat[5][8].seat_id + '" data-seat="F9" id="' + arraySeat[5][8].seat_id + '" class="item-seat childitem" style="left:731px; top:359px;">9</div>\
            <div seatline="2" data-id="' + arraySeat[5][9].seat_id + '" data-seat="F10" id="' + arraySeat[5][9].seat_id + '" class="item-seat childitem" style="left:795px; top:359px;">10</div>\
            <div seatline="2" data-id="' + arraySeat[5][10].seat_id + '" data-seat="F11" id="' + arraySeat[5][10].seat_id + '" class="item-seat childitem" style="left:858px; top:359px;">11</div>\
            <div seatline="2" data-id="' + arraySeat[5][11].seat_id + '" data-seat="F12" id="' + arraySeat[5][11].seat_id + '" class="item-seat childitem" style="left:922px; top:359px;">12</div>\
            <div seatline="2" data-id="' + arraySeat[5][12].seat_id + '" data-seat="F13" id="' + arraySeat[5][12].seat_id + '" class="item-seat childitem" style="left:986px; top:359px;">13</div>\
            <div seatline="2" data-id="' + arraySeat[5][13].seat_id + '" data-seat="F14" id="' + arraySeat[5][13].seat_id + '" class="item-seat childitem" style="left:1050px; top:359px;">14</div>\
            <div seatline="1" id="H1" class="item-seat line-seat" style="margin-left:50px; top:446px;">H</div>\
            <div seatline="1" data-id="' + arraySeat[6][0].seat_id + '" data-seat="H1" id="' + arraySeat[6][0].seat_id + '" class="item-seat childitem" style="left:183px; top:447px;">1</div>\
            <div seatline="1" data-id="' + arraySeat[6][1].seat_id + '" data-seat="H2" id="' + arraySeat[6][1].seat_id + '" class="item-seat childitem" style="left:247px; top:447px;">2</div>\
            <div seatline="1" data-id="' + arraySeat[6][2].seat_id + '" data-seat="H3" id="' + arraySeat[6][2].seat_id + '" class="item-seat childitem" style="left:311px; top:447px;">3</div>\
            <div seatline="1" data-id="' + arraySeat[6][3].seat_id + '" data-seat="H4" id="' + arraySeat[6][3].seat_id + '" class="item-seat childitem" style="left:375px; top:447px;">4</div>\
            <div seatline="1" data-id="' + arraySeat[6][4].seat_id + '" data-seat="H5" id="' + arraySeat[6][4].seat_id + '" class="item-seat childitem" style="left:438px; top:447px;">5</div>\
            <div seatline="1" data-id="' + arraySeat[6][5].seat_id + '" data-seat="H6" id="' + arraySeat[6][5].seat_id + '" class="item-seat childitem" style="left:502px; top:447px;">6</div>\
            <div seatline="2" data-id="' + arraySeat[6][6].seat_id + '" data-seat="H7" id="' + arraySeat[6][6].seat_id + '" class="item-seat childitem" style="left:603px; top:447px;">7</div>\
            <div seatline="2" data-id="' + arraySeat[6][7].seat_id + '" data-seat="H8" id="' + arraySeat[6][7].seat_id + '" class="item-seat childitem" style="left:667px; top:447px;">8</div>\
            <div seatline="2" data-id="' + arraySeat[6][8].seat_id + '" data-seat="H9" id="' + arraySeat[6][8].seat_id + '" class="item-seat childitem" style="left:731px; top:447px;">9</div>\
            <div seatline="2" data-id="' + arraySeat[6][9].seat_id + '" data-seat="H10" id="' + arraySeat[6][9].seat_id + '" class="item-seat childitem" style="left:795px; top:447px;">10</div>\
            <div seatline="2" data-id="' + arraySeat[6][10].seat_id + '" data-seat="H11" id="' + arraySeat[6][10].seat_id + '" class="item-seat childitem" style="left:858px; top:447px;">11</div>\
            <div seatline="2" data-id="' + arraySeat[6][11].seat_id + '" data-seat="H12" id="' + arraySeat[6][11].seat_id + '" class="item-seat childitem" style="left:922px; top:447px;">12</div>\
            <div seatline="2" data-id="' + arraySeat[6][12].seat_id + '" data-seat="H13" id="' + arraySeat[6][12].seat_id + '" class="item-seat childitem" style="left:986px; top:447px;">13</div>\
            <div seatline="2" data-id="' + arraySeat[6][13].seat_id + '" data-seat="H14" id="' + arraySeat[6][13].seat_id + '" class="item-seat childitem" style="left:1050px; top:447px;">14</div>\
            <div seatline="1" id="I1" class="item-seat line-seat" style="margin-left:50px; top:490px;">I</div>\
            <div seatline="1" data-id="' + arraySeat[7][0].seat_id + '" data-seat="I1" id="' + arraySeat[7][0].seat_id + '" class="item-seat childitem" style="left:183px; top:491px;">1</div>\
            <div seatline="1" data-id="' + arraySeat[7][1].seat_id + '" data-seat="I2" id="' + arraySeat[7][1].seat_id + '" class="item-seat childitem" style="left:247px; top:491px;">2</div>\
            <div seatline="1" data-id="' + arraySeat[7][2].seat_id + '" data-seat="I3" id="' + arraySeat[7][2].seat_id + '" class="item-seat childitem" style="left:311px; top:491px;">3</div>\
            <div seatline="1" data-id="' + arraySeat[7][3].seat_id + '" data-seat="I4" id="' + arraySeat[7][3].seat_id + '" class="item-seat childitem" style="left:375px; top:491px;">4</div>\
            <div seatline="1" data-id="' + arraySeat[7][4].seat_id + '" data-seat="I5" id="' + arraySeat[7][4].seat_id + '" class="item-seat childitem" style="left:438px; top:491px;">5</div>\
            <div seatline="1" data-id="' + arraySeat[7][5].seat_id + '" data-seat="I6" id="' + arraySeat[7][5].seat_id + '" class="item-seat childitem" style="left:502px; top:491px;">6</div>\
            <div seatline="2" data-id="' + arraySeat[7][6].seat_id + '" data-seat="I7" id="' + arraySeat[7][6].seat_id + '" class="item-seat childitem" style="left:603px; top:491px;">7</div>\
            <div seatline="2" data-id="' + arraySeat[7][7].seat_id + '" data-seat="I8" id="' + arraySeat[7][7].seat_id + '" class="item-seat childitem" style="left:667px; top:491px;">8</div>\
            <div seatline="2" data-id="' + arraySeat[7][8].seat_id + '" data-seat="I9" id="' + arraySeat[7][8].seat_id + '" class="item-seat childitem" style="left:731px; top:491px;">9</div>\
            <div seatline="2" data-id="' + arraySeat[7][9].seat_id + '" data-seat="I10" id="' + arraySeat[7][9].seat_id + '" class="item-seat childitem" style="left:795px; top:491px;">10</div>\
            <div seatline="2" data-id="' + arraySeat[7][10].seat_id + '" data-seat="I11" id="' + arraySeat[7][10].seat_id + '" class="item-seat childitem" style="left:858px; top:491px;">11</div>\
            <div seatline="2" data-id="' + arraySeat[7][11].seat_id + '" data-seat="I12" id="' + arraySeat[7][11].seat_id + '" class="item-seat childitem" style="left:922px; top:491px;">12</div>\
            <div seatline="2" data-id="' + arraySeat[7][12].seat_id + '" data-seat="I13" id="' + arraySeat[7][12].seat_id + '" class="item-seat childitem" style="left:986px; top:491px;">13</div>\
            <div seatline="2" data-id="' + arraySeat[7][13].seat_id + '" data-seat="I14" id="' + arraySeat[7][13].seat_id + '" class="item-seat childitem" style="left:1050px; top:491px;">14</div>';
          
         $('#seat_booking').html(html);
         console.log(arraySeat);
         console.log("Order->ticket: " + booking.ticket_id);

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

  $(document).on('click', '.childitem', function (event) {
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

//initiate clock timer display view
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

//show timer clock view and redirect page index if it's timeout
window.onload = function () {
    var tenMinutes = 60 * 10,
    display = document.querySelector('#time');
    setTimeout(function(){
        localStorage.removeItem('booking');
        window.location.href = route('user.home');
    }, 600000);
    startTimer(tenMinutes, display);
};

//change quantity seat and quantity price if user change choose quantity seat
function changeSeatTotal() {
    var selectedOption = $(".ddl-seat-count option:selected").text();
    seatTotal = parseInt(selectedOption);
    $('[data-seatTotalLabel=""]').text(seatTotal);
    $('[data-totalPrice=""]').text((seatTotal*convertPrice(booking.price)*1000).toLocaleString());
    $('div.item-seat-selected').removeClass('item-seat-selected childitem').addClass('item-seat childitem');
}

//choose seat with quantity seat available
function selectSeat(seatID) {
    var seat = document.getElementById(seatID).className;
    if (seat == "item-seat childitem") {
        document.getElementById(seatID).className = "item-seat-selected childitem";
    }
    else if (seat == "item-seat-selected childitem") {
        document.getElementById(seatID).className = "item-seat childitem";
    }
  
    var seatCount = 0;
    var seats = $('#sodoghe .childitem');  
    for (i = 0; i < seats.length; i++) {
        if (seats[i].className == "item-seat-selected childitem") {
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

//check for seat was booked
function bookedSeat(seatID) {
    var seat = document.getElementById(seatID).className;
    if (seat == "item-seat childitem") {
        document.getElementById(seatID).className = "item-seat-booked childitem";
    }
}

//Get list id seat user booked
function GetListSeat() {
    var  seats = $('#sodoghe .childitem');  
    var listSeat = "";
    for (i = 0; i < seats.length; i++) {
        if (seats[i].className == "item-seat-selected childitem") {
            listSeat += seats[i].id + ",";
        }
    }
    return listSeat;
}

//Get list name seat user booked
function GetListNameSeat() {
    var  seats = $('#sodoghe .childitem');  
    var nameSeat = "";
    for (i = 0; i < seats.length; i++) {
        if (seats[i].className == "item-seat-selected childitem") {
            nameSeat += $(seats[i]).attr('data-seat') + ",";
        }
    }
    return nameSeat;
}

//Get information booking and redirect page confirm booking
function Continue() {
    var seatCount = 0;
    var seats = $('#sodoghe .childitem'); 
    for (i = 0; i < seats.length; i++) {               
        if (seats[i].className == "item-seat-selected childitem") {
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
    var strListName = GetListNameSeat();
    if (strList != "") {
        var order = {
            name_film: booking.name,
            ticket_id: booking.ticket_id,
            film_id: booking.film_id,
            seat_id: strList,
            seat_name: strListName,
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

function chunkArray(myArray, chunk_size){
    var index = 0;
    var arrayLength = myArray.length;
    var tempArray = [];
    
    for (index = 0; index < arrayLength; index += chunk_size) {
        myChunk = myArray.slice(index, index+chunk_size);
        tempArray.push(myChunk);
    }

    return tempArray;
}
});
