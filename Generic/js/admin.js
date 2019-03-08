/* Copyright 2018, Symon Hambrey, All rights reserved */

var delete_id="";
var minus4="";

$("#back").click(function(){
  location.href="admin.php";
})
 
$(".mail_content").click(function(){
  var this_id=$(this).attr("id");
  var from_id=$("#from_"+this_id).text();
  $(".detail_content").append("<p id='det_con'>"+$("#show_"+this_id).text()+"</p>");
  $(".detail_title").append("<h4 id='det_tit'>"+from_id+"</h4>");
  $("#modal_details").modal("show");
});
$("#modal_details").on("hidden.bs.modal", function(){
  $("#det_con").detach();
  $("#det_tit").detach();
});

$(".delete_button").click(function(){
  minus4=$(this).attr("id");
  delete_id=minus4.substring(5);
  $(".delete_content").append("<h2 id='del_con'>Delete user "+delete_id+"?</h2>");
  $("#modal_delete").modal("show");
});
$("#modal_delete").on("hidden.bs.modal", function(){
  $("#del_con").detach();
});
$("#yes_btn").click(function(){
  location.href="../php/delete.php?id="+minus4;
})
$(".reset_button").click(function(){
  this_id=$(this).attr("id");
  location.href="../php/reset.php?id="+this_id;
})
