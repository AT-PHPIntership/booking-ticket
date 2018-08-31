$(document).ready(function () {
    url = window.location.pathname;
    var id = url.substring(url.lastIndexOf('/') + 1);
    var url_film = route('api.films.index');
    
    $.ajax({
        url: route('api.films.show', id),
        type: "get",
    
        success: function( data ) {
        var html = '';
        var todayDate = new Date();
        data.result.schedules.forEach(schedule => {
            var schedule_id = schedule.id;
            var room_id = schedule.room_id;
            var time = schedule.start_time.split(" ");
            var today = todayDate.toISOString().slice(0, 10);
            var todayTime = todayDate.getHours();
            var ticket_id = '';
            if (schedule.tickets[0]) {
                var ticket_id = schedule.tickets[0].id;
            }
            if ((Date.parse(time[0]) >= Date.parse(today)) && (parseInt(todayTime) < checkTime(time[1]))) {
                html += '<h2>' + time[0] + '</h2>\
                    <div class="time-wrapper">\
                        <ul>\
                            <li><a class="available" href="#" data-time="' + time[1] + '"\
                            data-schedule="' + schedule_id + '" data-room="' + room_id + '"\
                            data-date="' + time[0] + '" data-ticket="' + ticket_id + '">' + time[1] + '</a></li>\
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
        $('#image').attr('src', data.result.image_path);
        $('#actor').text(data.result.actor);
        $('#duration').text(data.result.duration);
        $('#director').text(data.result.director);
        $('#sessiontimes').html(html);
        }
    });

    getNewsFilms(url_film);
    $(document).on('click', '.available', function (event) {
        event.preventDefault();
        if (localStorage.getItem('login-token')) {
            var schedule = {
                            film_id: id,
                            ticket_id: $(this).attr('data-ticket'),
                            schedule_id: $(this).attr('data-schedule'),
                            room_id: $(this).attr('data-room'),
                            time: $(this).attr('data-time'),
                            date: $(this).attr('data-date'),
                            name: $('#name_film').text(),
                            price: $('#price').text()
                        };
            window.localStorage.setItem('booking', JSON.stringify(schedule));
            window.location.href = route('user.booking');
        } else {
            alert(Lang.get('user/booking.notify_film'));
            window.location.href = route('user.login');
        }
        
    });

    function getNewsFilms(url) {
        $.ajax({
            url: url,
            type: "GET",
            success: function (response) {
                response.result.data.forEach(film => {
                    generateFilmsNew(film);
                });
            }
        });
    }
    function generateFilmsNew(film) {
        html = '<div class="special_movies">\
                    <div class="movie_poster">\
                        <a href="'+ route('user.films.show', film.id) +'"><img src="' + film.image_path + '" alt="" /></a>\
                    </div>\
                    <div class="movie_desc">\
                        <h3><a href="'+ route('user.films.show', film.id) +'">' + film.name + '</a></h3>\
                        <p>' + film.price_formated + 'VND</p>\
                        <span><a href="'+ route('user.films.show', film.id) +'">' + Lang.get('user/index.add_cart') + '</a></span>\
                    </div>\
                    <div class="clear"></div>\
                </div>';
        $('#new_films').append(html);
    }
    function checkTime (timeSchedude) {
        var time = timeSchedude.split(":");
        time = parseInt(time[0]);
        return time;
    }
})
