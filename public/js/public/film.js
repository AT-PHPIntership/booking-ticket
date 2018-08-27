$(document).ready(function () {
    var url = '';
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
                    generateFilms(film);
                });
            }
        });
    }
    function generateFilms(film) {
        html = '';
        html += '<div class="grid_1_of_5 images_1_of_5">\
                    <a href="preview.html"><img src="' + film.image_path + '" alt="" /></a>\
                    <h2><a href="preview.html">' + film.name + '</a></h2>\
                    <div class="price-details">\
                    <div class="price-number">\
                    <p><span class="rupees">' + film.price_formated + 'VND </span></p>\
                    </div>\
                    <div class="add-cart">\
                        <h4><a href="preview.html">Add to cart</a></h4>\
                    </div>\
                    <div class="clear"></div>\
                </div>\
            </div>';
        $('#new_film').append(html);
        $('#feature_film').append(html);
    }
});
