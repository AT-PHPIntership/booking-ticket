$(document).ready(function () {

    var url = '';
    var slideIndex = 0;
    carousel();
    if (window.location.search == "") {
        url = route('api.films.index');
    } else {
        url = route('api.films.index') + window.location.search;
    }

    getFilms(url);
    
    $('#next_new').click(function (event) {
        event.preventDefault();
        url_next = $('#next_new').attr('href');
        getFilms(url_next);
    })

    function getFilms(url) {
        $.ajax({
            url: url,
            type: "GET",
            success: function (response) {
                if (response.result.paginator['next_page_url'] != null) {
                    $('#next_new').show();
                    $('#next_new').attr('href', response.result.paginator['next_page_url']);
                } else {
                    $('#next_new').hide();
                }
                response.result.data.forEach(film => {
                    generateFilmsIndex(film);
                });
            }
        });
    }
    function generateFilmsIndex(film) {
        html = '<div class="grid_1_of_5 images_1_of_5">\
                    <a href="'+ route('user.films.show', film.id) +'"><img src="' + film.image_path + '" alt="" /></a>\
                    <h2><a href="preview.html">' + film.name + '</a></h2>\
                    <div class="price-details">\
                    <div class="price-number">\
                    <p><span class="rupees">' + film.price_formated + 'VND </span></p>\
                    </div>\
                    <div class="add-cart">\
                        <h4><a href="'+ route('user.films.show', film.id) +'"> ' + Lang.get('user/index.add_cart') + ' </a></h4>\
                    </div>\
                    <div class="clear"></div>\
                </div>\
            </div>';
        $('#collect_film').append(html);
    }

    function carousel() {
        var slides = document.getElementsByClassName("mySlides");
        for (var i = 0; i < slides.length; i++) {
            slides[i].style.display = "none"; 
        }
        slideIndex++;
        if (slideIndex > slides.length) {
            slideIndex = 1;
        } 
        slides[slideIndex-1].style.display = "block"; 
        setTimeout(carousel, 5000); 
    }

    var categoryFilms = [
        'Action Films',
        'Adventure Films',
        'Comedy Films',
        'Drama Films',
        'Horror Films',
        'Science Fiction Films',
        'War Films',
        'Fantasy Films',
        'Animated Films',
        'Romance Films'
    ];
    var cate = GetURLParameter('category');
    $('.content_top .heading h3').html(categoryFilms[--cate]);
    function GetURLParameter(sParam) {
        var sPageURL = window.location.search.substring(1);
        var sURLVariables = sPageURL.split('&');
        for (var i = 0; i < sURLVariables.length; i++){
            var sParameterName = sURLVariables[i].split('=');
            if (sParameterName[0] == sParam)
            {
                return sParameterName[1];
            }
        }
    }
});
