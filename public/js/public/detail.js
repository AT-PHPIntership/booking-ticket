url = window.location.pathname;
var id = url.substring(url.lastIndexOf('/') + 1);
console.log(id);

$.ajax({
    url: "/api/films/" + id,
    type: "get",
    success: function( data ) {
       
    }
});
