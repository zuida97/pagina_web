
$(document).ready(function(){
  $("#login-form").hide();
});

$(document).ready(function(){
  $("#login-form").not('selected').hide();
  $("#acceso").click(function(e){
    $("#login-form").show();
  })
});




function ocultar(){
  $(document).ready(function(){
    $("#login-form").hide();
  });

}
