$(document).ready(function () {
    var url = '';
    var slideIndex = 0;
    carousel();
    if (window.location.search == "") {
        url = '/api/films';
    } else {
        url = '/api/films' + window.location.search;
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
        html = '';
        html += '<div class="grid_1_of_5 images_1_of_5">\
                    <a href="/films/'+ film.id +'"><img src="' + film.image_path + '" alt="" /></a>\
                    <h2><a href="preview.html">' + film.name + '</a></h2>\
                    <div class="price-details">\
                    <div class="price-number">\
                    <p><span class="rupees">' + film.price_formated + 'VND </span></p>\
                    </div>\
                    <div class="add-cart">\
                        <h4><a href="/films/'+ film.id +'"> ' + Lang.get('user/index.add_cart') + ' </a></h4>\
                    </div>\
                    <div class="clear"></div>\
                </div>\
            </div>';
        $('#collect_film').append(html);
    }

    function carousel() {
        var i;
        var x = document.getElementsByClassName("mySlides");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none"; 
        }
        slideIndex++;
        if (slideIndex > x.length) {
            slideIndex = 1
        } 
        x[slideIndex-1].style.display = "block"; 
        setTimeout(carousel, 5000); 
    }
});
