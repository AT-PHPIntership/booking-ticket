var currentRequest = null;
var timeoutID = null;
 function parseData(data) {
    html = '<ul>';
    data.result.forEach(film => {
        path = (typeof film.images[0] != 'undefined' && film.images[0]) ? film.images[0].path : 'images/default/default-film.jpeg';
        html +='<li>'+
                    '<a href=/films/' + film.id + '>'+
                        '<div class="image" style="background-image:url(' + path + ')"></div>'+
                        '<div class="search-content">'+
                            '<b class="title-film">' + film.name + '</b>'+
                            '<p>' + film.director + '</p>'+
                        '</div>'+
                    '</a>'+
                '</li>';
    });
    html += '</ul>';
    return html;
}
 function findListSearch(str, filter) {
    if (currentRequest != null) {
        currentRequest.abort();
        currentRequest = null;
    }
    var datas = [];
    datas['query'] = 'query=' + str;
    datas['filter'] = filter;
    console.log(datas);
    currentRequest = $.ajax({
        url: "api/search",
        type: 'GET',
        data: datas,
        dataType: 'json',
        cache: true,
    }).done(function (data) {
        // !data.result.length ? $('#search-hint').html('') : $('#search-hint').html(parseData(data));
        console.log(data);
     }).fail(function () {
        console.log('error-connection');
    });
}
 $('#table_filter').keyup(function (e) {
    clearTimeout(timeoutID);
    filter = $(".category_filters input[type='radio']:checked").val();
    timeoutID = setTimeout(findListSearch.bind(undefined, e.target.value, filter), 200);
});
 $(document).on('click', function () {
    $('#search-hint').html('');
});