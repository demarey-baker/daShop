$(function(){
	$("#adminlogs a:contains('Logs')").parent().addClass('active');
	$("#adminsettings a:contains('Settings')").parent().addClass('active');
	$("#adminproducts a:contains('Products')").parent().addClass('active');
	$("#adminusers a:contains('Users')").parent().addClass('active');
});
$(document).ready(function(){
	$("#change_password").click(function(){
		$("#passwordSlide").slideToggle();
	});
});
$(function(){
	$("#edit").click(function(){
		$("#profileField").fadeOut;
		$("#profileField").css("display","none");
		$("#editPro").css("display","block");
		$("#editPro").fadeIn();
	});
});
$(function(){
	$("#cancel").click(function(){
		$("#profileField").fadeIn;
		$("#profileField").css("display","block");
		$("#editPro").css("display","none");
		$("#editPro").fadeOut();
	});
});
$(function() {                       
	$(".edit_click").click(function() {  
		$("#edit_vehicle").fadeIn(); 
		$("#edit_vehicle").animate({left: '0px'});
		$("#vehicle_panel").css('height','auto');
	});
});
$(function(){
	$("#cancel").click(function(){
		$("#edit_vehicle").fadeOut();
		$("#vehicle_panel").css('height','700px');
	});
});