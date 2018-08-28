$(document).ready(function () {
    if (!localStorage.getItem('login-token')) {
        window.location.href = 'http://' + window.location.hostname;
    }
    url = window.location.pathname;
    var id = url.substring(url.lastIndexOf('/') + 1);

    $.ajax({
        url: "/api/films/" + id,
        type: "get",
    
        success: function( data ) {
        var html = '';
        var todayDate = new Date();
        data.result.schedules.forEach(schedule => {
            var time = schedule.start_time.split(" ");
            if (Date.parse(time[0]) >= Date.parse(todayDate) ){
                html += '<h2>' + time[0] + '</h2>\
                    <div class="time-wrapper">\
                        <ul>\
                            <li><a class="available" href="javascript:void(0)" data-id="' + time[1] + '">' + time[1] + '</a></li>\
                        </ul>\
                    </div>';
            }
        });
        $('#name_film').text(data.result.name);
        $('#description').text(data.result.describe.substr(0, 150));
        $('#price').text(data.result.price_formated);
        $('#category').text(data.result.categoryFilms);
        $('#start_date').text(data.result.start_date);
        $('#end_date').text(data.result.end_date);
        $('#describe').append(data.result.describe);
        $('#actor').text(data.result.actor);
        $('#duration').text(data.result.duration);
        $('#director').text(data.result.director);
        $('#sessiontimes').html(html);
        }
    });

    $('.available').on('click', function( event ) {
        event.preventDefault();
        var a = $(this).attr('data-id');
        alert("aaa");
        console.log(a);
    });
})



