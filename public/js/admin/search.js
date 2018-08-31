var currentRequest = null;
var timeoutID = null;

// Parse data to html
 function parseData(datas) {
    path = '';
    id = '';
    name = '';
    des = '';
    
    html = '<ul>';
    datas.result.forEach(data => {
        
        // base on filter: user or film
        if(data.email) {
            path = 'images/default/default-user.png';
            detail = 'users/' + data.id;
            name = data.full_name;
            des = data.email;
        } else {
            path = (typeof data.images[0] != 'undefined' && data.images[0]) ? data.images[0].path : 'images/default/default-film.jpeg';
            detail = 'films/' + data.id;
            name = data.name;
            des = data.director;
        }
    
        html +='<li>'+
                    '<a href=/admin/' + detail + '>'+
                        '<div class="image" style="background-image:url(' + path + ')"></div>'+
                        '<div class="search-content">'+
                            '<b class="title-film">' + name + '</b>'+
                            '<p>' + des + '</p>'+
                        '</div>'+
                    '</a>'+
                '</li>';
    });
    html += '</ul>';
    return html;
}

// Handle request: send or abort
 function findListSearch(str, filter) {
    if (currentRequest != null) {
        currentRequest.abort();
        currentRequest = null;
    }
    var datas = '?query=' + str;
    currentRequest = $.ajax({
        url: "api/admin_search",
        type: 'GET',
        data: datas,
        dataType: 'json',
        cache: true,
    }).done(function (data) {
        console.log(data);
        !data.result.length ? $('#search-hint').html('') : $('#search-hint').html(parseData(data));
     }).fail(function (response) {
        console.log(response);
    });
}

// Handle if press key
 $('#table_filter').keyup(function (e) {
    clearTimeout(timeoutID);
    filter = $(".category_filters input[type='radio']:checked").val();
    timeoutID = setTimeout(findListSearch.bind(undefined, e.target.value, filter), 200);
});

// Close box result when click out of box
 $(document).on('click', function () {
    $('#search-hint').html('');
});