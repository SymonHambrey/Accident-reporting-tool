/* Copyright 2018, Symon Hambrey, All rights reserved */

$("#acc_butt").click(function(){
  $("#two").remove();
  $("#three").remove();
});

$("#nea_butt").click(function(){
  $("#one").remove();
  $("#two").remove();
});

$("#con_butt").click(function(){
  $("#one").remove();
  $("#three").remove();
});

function form_submit(){
  document.getElementById("loginform").submit();
};

$("#cancel").click(function(){
  location.replace("../index.php");
});

$("#back").click(function(){
  location.replace("../index.php");
})
