$.ajax({
    url: "/api/categories",
    type: "get",
    success: function( result ) {
        let html = '';
         result.result.forEach(category => {
            html += '<li><a href="#">'+ category.name + '</a></li>';
        });
        $('.navbar-nav').append(html);
    }
 });