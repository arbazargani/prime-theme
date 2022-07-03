$(document).ready(function(){

   $("#default").click(function(event){
     	event.preventDefault();
	$("body").css("font-size","10px");
	$.cookie("fontSize","10px");
   });

   $("#larger").click(function(event){
     	event.preventDefault();
	$("body").css("font-size","12px");
	$.cookie("fontSize","12px");
   });

   $("#largest").click(function(event){
     	event.preventDefault();
	$("body").css("font-size","14px");
	$.cookie("fontSize","14px");
   });

// Cookie
var fontSize = $.cookie("fontSize");

// Calling Cookie
if(fontSize == "10px") {
	$("body").css("font-size","10px");
};

if(fontSize == "12px") {
	$("body").css("font-size","12px");
};

if(fontSize == "14px") {
	$("body").css("font-size","14px");
};

 });
