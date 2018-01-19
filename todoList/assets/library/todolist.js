/* jshint browser: true */
/* eslint-env browser */
/*globals $:false */
/*jshint devel:true */

$("unlist").on("click", "list", function(){
  $(this).toggleClass("completed");
});

$("unlist").on("click", "span",function(event){ // eslint-disable-line no-unused-vars
  $(this).parent().fadeOut(500, function(){
    $(this).remove();
  });
  event.stopPropagation();
});

$("input[type='text']").keypress(function(e){
  if(e.which == 13){
    var todoText = $(this).val();
    $(this).val("");
    $("ul").append("<li><span><i class='fa fa-trash' aria-hidden='true'></i></span> "+todoText+"</li>");
  }
});

$(".fa-plus").click(function(){
  $("input[type='text']").fadeToggle();
});