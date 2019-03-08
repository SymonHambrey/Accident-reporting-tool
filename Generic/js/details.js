/* Copyright 2018, Symon Hambrey, All rights reserved */

function details(){
  if($("#notes_text").text()==""){
    $(".notes_text").hide();
  }
  var is_accident=$("#name").text();
  var loc="admin.php";
  var is_nearMiss=$("#cause").text();
  var rid=$("#rid_text").text();
  var archive=$("#archive").text();
  if(is_accident==""){$(".accident").detach();}
  if(is_nearMiss==""){$("#near_miss").detach();}
  if(rid=="Yes"){$("#rid_background").css("background-color", "red");}
  if(archive==true){
    $(".remove_if_archive").detach();
    loc="incident_archive.php";
  }
  $("#back").click(function(){
    location.href=loc;
  })

}

function printscreen(){
  $(".remove_for_print").detach();
  $(".title_text").css("color", "#000");
  window.print();
  location.reload();
};

window.onload=details;

$("#investigate").click(function(){
  $(".investigation").show();
});
