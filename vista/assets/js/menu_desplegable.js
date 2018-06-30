
$(document).ready(function(){
  $("#login-form").not('.selected').hide();
  $("#acceso").click(function(e){
    var desplegable = $(this).parent().find("#login-form");
    $('#login-form').parent().find("#acceso").not(desplegable).slideUp('fast');
    desplegable.slideToggle('fast');
    e.preventDefault();
  })
});



function ocultar(){
  $(document).ready(function(){
    $("#login-form").hide();
  });

}
