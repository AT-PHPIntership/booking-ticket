$(function () {
  chooseFilm();
  $('#schedule_id').change(chooseFilm);
});

function chooseFilm() {
  $("#schedule_id option:selected").each(function () {
    var idSchedule = $(this).val();
    $.ajax({
      type: "GET",
      url: "admin/tickets/film/"+idSchedule,
      success: function( msg ) {
        $("#film_schedule").html("<input class='form-control' type='text' value='"+ msg + "' disabled >");
      }
    });
  });
}
