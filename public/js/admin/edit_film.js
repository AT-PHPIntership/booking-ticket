var selText;
$( window ).on( "load", function() {
    selText = "";
      $("#multiple_dropdown_select option:selected").each(function () {
        var $this = $(this);   
        if(selText != ""){
          selText = selText.concat(","); 
          selText = selText.concat($this.text());
        }
        else
          selText = $this.text();
      });
      document.getElementById("selected_values").value = selText;
});

$(document).ready(function(){
    $('button[type="submit"]').attr('disabled','disabled');
    $('.active').change(function(){
        if($(this).val != ''){
            $('button[type="submit"]').removeAttr('disabled');
        }
    });
});

var input = $( "#del_image" );
function delImage(trId, ImageId) {
    document.getElementById("remove-" + ImageId).addEventListener("click", function(){
        $('button[type="submit"]').removeAttr('disabled');
        document.getElementById("tr-" + trId).remove();
        input.val( input.val() + trId + "," );
    });
}
