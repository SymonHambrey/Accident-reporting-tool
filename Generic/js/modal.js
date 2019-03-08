/* Copyright 2018, Symon Hambrey, All rights reserved */

$(".query_content").click(function(){
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

$(".incident_content").click(function(){
  var inc_this_id=$(this).attr("id");
  var inc_from_id=$("#inc_from_"+inc_this_id).text();
  $(".detail_content").append("<p id='det_con'>"+$("#inc_show_"+inc_this_id).text()+"</p>");
  $(".detail_title").append("<h4 id='det_tit'>"+inc_from_id+"</h4>");
  $("#modal_details").modal("show");
});
$("#modal_details").on("hidden.bs.modal", function(){
  $("#det_con").detach();
  $("#det_tit").detach();
});

$("#return").click(function(){
  location.replace("../index.php");
});
