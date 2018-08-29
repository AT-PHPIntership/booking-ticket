$(document).ready(function () {
    if (!localStorage.getItem('login-token')) {
        window.location.href = 'http://' + window.location.hostname;
    }
    url = window.location.pathname;
    var id = url.substring(url.lastIndexOf('/') + 1);
    var url_film = "/api/films";
    $.ajax({
        url: "/api/films/" + id,
        type: "get",
    
        success: function( data ) {
        var html = '';
        var todayDate = new Date();
        data.result.schedules.forEach(schedule => {
            var schedule = schedule.start_time.split(" ");
            if (Date.parse(schedule[0]) >= Date.parse(todayDate) ){
                html += '<h2>' + schedule[0] + '</h2>\
                    <div class="time-wrapper">\
                        <ul>\
                            <li><a class="available" href="#" data-time="' + schedule[1] + '"\
                            data-date="' + schedule[0] + '">' + schedule[1] + '</a></li>\
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
        $('#image').html("<img src=" + data.result.image_path + " alt='' />");
        $('#actor').text(data.result.actor);
        $('#duration').text(data.result.duration);
        $('#director').text(data.result.director);
        $('#sessiontimes').html(html);
        }
    });

    getNewsFilms(url_film);
    $(document).on('click', '.available', function (event) {
        event.preventDefault();
        var schedule = {time:$(this).attr('data-time'), date:$(this).attr('data-date'), name:$('#name_film').text(), price:$('#price').text()};
        window.localStorage.setItem('order', JSON.stringify(schedule));
        window.location.href = 'http://cinema.com/order';
        console.log(schedule);
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
                        <a href="/films/'+ film.id +'"><img src="' + film.image_path + '" alt="" /></a>\
                    </div>\
                    <div class="movie_desc">\
                        <h3><a href="' + film.image_path + '">' + film.name + '</a></h3>\
                        <p>' + film.price_formated + 'VND</p>\
                        <span><a href="/films/'+ film.id +'">' + Lang.get('user/index.add_cart') + '</a></span>\
                    </div>\
                    <div class="clear"></div>\
                </div>';
        $('#new_films').append(html);
    }
})
