var currentRequest = null;
var timeoutID = null;

// Parse data to html
 function parseData(datas) {
    path = '';
    id = '';
    name = '';
    des = '';
    
    modalFilmHtml = '<h4>Result for film: </h4>';
    modalUserHtml = '<h4>Result for user: </h4>';
    dropBoxHtml = '<ul>';
    datas.result.forEach(data => {
        
        // base on filter: user or film
        isUser = false;

        if(data.email) {
            path = 'images/default/default-user.png';
            detail = 'users/' + data.id;
            name = data.full_name;
            des = data.email;
            isUser = true;
        } else {
            path = (typeof data.images[0] != 'undefined' && data.images[0]) ? data.images[0].path : 'images/default/default-film.jpeg';
            detail = 'films/' + data.id;
            name = data.name;
            des = data.director;
        }
        
        // Html for dropbox when keyup
        dropBoxHtml +='<li>'+
                    '<a href=/admin/' + detail + '>'+
                        '<div class="image" style="background-image:url(' + path + ')"></div>'+
                        '<div class="search-content">'+
                            '<b class="title-film">' + name + '</b>'+
                            '<p>' + des + '</p>'+
                        '</div>'+
                    '</a>'+
                '</li>';

        // Temp html to set user or film html
        modalHtml = '<a class="film-small" href=/admin/' + detail + '>'+
                        '<div class="poster-film-small" style="background-image:url(' + path + ')"></div>'+
                        '<div class="search-content">'+
                                '<b class="title-film-small">' + name + '</b>'+
                                '<p class="title-film">' + des + '</p>'+
                            '</div>'+
                    '</a>';
                    
        // Plus html to type of result
        isUser ? (modalUserHtml += modalHtml) : (modalFilmHtml += modalHtml);
    });
    dropBoxHtml += '</ul>';
    
    datas['dropBoxHtml'] = dropBoxHtml;
    datas['modalFilmHtml'] = modalFilmHtml;
    datas['modalUserHtml'] = modalUserHtml;

    return datas;
}

// Handle request: send or abort
 function findListSearch(str, filter) {
    if (currentRequest != null) {
        currentRequest.abort();
        currentRequest = null;
    }
    var datas = 'query=' + str + '&filter=' + filter;
    currentRequest = $.ajax({
        url: "api/admin_search",
        type: 'GET',
        data: datas,
        dataType: 'json',
        cache: true,
    }).done(function (data) {
        if(!data.result.length) {
            $('#search-hint').html('');
            $('.group-film-small').html('');
        } else {
            datas = parseData(data);
            $('#search-hint').html(datas['dropBoxHtml']);
            $('#group-film-result').html((datas['modalFilmHtml'].length > 50) ? datas['modalFilmHtml'] : '');
            $('#group-user-result').html((datas['modalUserHtml'].length > 50) ? datas['modalUserHtml'] : '');
        }
     }).fail(function (response) {
        console.log(response);
    });
}

// Handle if press key
 $('#table_filter').keyup(function (e) {
    clearTimeout(timeoutID);
    filter = $(".category_filters input[type='radio']:checked").val();
    timeoutID = setTimeout(findListSearch.bind(undefined, e.target.value, filter), 200);

    // Handle event key press is enter
    if (e.which == 13 || e.keyCode == 13) {
        $('#searchBtn').trigger('click');
    }
});

// Close box result when click out of box
 $(document).on('click', function () {
    $('#search-hint').html('');
});
