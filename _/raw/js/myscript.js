$(function(){
	$("#automobiles a:contains('Automobiles')").parent().addClass('active');
	$("#clothing a:contains('Clothing')").parent().addClass('active');
	$("#construction a:contains('Construction')").parent().addClass('active');
	$("#electronics a:contains('Electronics')").parent().addClass('active');
	$("#gardening a:contains('Gardening')").parent().addClass('active');
	$('#slider').unslider();
});
function choose_file(){
	$("#file_input").click();
}
function read_img(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $('#preview')
        .attr('src', e.target.result)
        .width(270)
        .height(249);
    };
    reader.readAsDataURL(input.files[0]);
  }
}
function choose_update_file(){
  $("#update_file_input").click();
}
function read_update_img(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $('#update_preview')
        .attr('src', e.target.result)
        .width(239)
        .height(198);
    };
    reader.readAsDataURL(input.files[0]);
  }
}
function read_product_img(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $('#product_preview')
        .attr('src', e.target.result)
        .width(600)
        .height(450);
    };
    reader.readAsDataURL(input.files[0]);
  }
}
function read_edit_product_img(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $('#product_preview')
        .attr('src', e.target.result)
        .width(600)
        .height(450);
    };
    reader.readAsDataURL(input.files[0]);
  }
}
$(document).scroll(function(){
  var height = $(this).scrollTop();
  if (height > 250) {
    $('.to_top').fadeIn('290');
  } 
  else {
    $('.to_top').fadeOut('290');
   // $('.to_top').css("display", "none");
  }
});
$(".to_top").click(function() {
  $("html, body").animate({ scrollTop: 0 }, "slow");
  return false;
});
function validatePword(){
  var pword = $("#password_register").val();
  var numRe = new RegExp("[0-9]+");
  var lcRe = new RegExp("[a-z]+");
  var ucRe = new RegExp("[A-Z]{2,}");
  var symRe = new RegExp("[!@#$%&_]+");
  if(pword.length<8){
    document.getElementById("password_validate").innerHTML = "Password is too short";
    $('#password_validate').fadeIn('0');
    $("#password_register").css("outline","1px solid #eb3f63");
  }
  else{
    $('#password_validate').fadeOut('0');
    $("#password_register").css("outline","1px solid #c9c7c7");
    if(!numRe.test(pword)){
      document.getElementById("password_validate").innerHTML = "Password must contain number";
      $('#password_validate').fadeIn('0');
      $("#password_register").css("outline","1px solid #eb3f63");
    }
    else if(numRe.test(pword)){
      $('#password_validate').fadeOut('0');
      $("#password_register").css("outline","1px solid #c9c7c7");
      if(!lcRe.test(pword)){
        document.getElementById("password_validate").innerHTML = "Password must contain atleast one lower case";
        $('#password_validate').fadeIn('0');
        $("#password_register").css("outline","1px solid #eb3f63");
      }
      else if(lcRe.test(pword)){
        $('#password_validate').fadeOut('0');
        $("#password_register").css("outline","1px solid #c9c7c7");
        if(!ucRe.test(pword)){
          document.getElementById("password_validate").innerHTML = "Password must contain atleast two upper case";
          $('#password_validate').fadeIn('0');
          $("#password_register").css("outline","1px solid #eb3f63");
        }
        else if(ucRe.test(pword)){
          $('#password_validate').fadeOut('0');
          $("#password_register").css("outline","1px solid #c9c7c7");
          if(!symRe.test(pword)){
            document.getElementById("password_validate").innerHTML = "Password must contain symbol(s)";
            $('#password_validate').fadeIn('0');
            $("#password_register").css("outline","1px solid #eb3f63");
          }
          else if(symRe.test(pword)){
            $('#password_validate').fadeOut('0');
            $("#password_register").css("outline","1px solid #c9c7c7");
          }
        }
      }
    }
  }
  confirmPword();
}
function confirmPword(){
  var pWord= $("#password_register").val();
  var confPword = $("#conf_password_register").val();
  if(!pWord){
    $("#conf_password_register").css("outline","1px solid #eb3f63");
    $('#password_confirm').fadeIn('0');
  }
  else if(!confPword){
    $("#conf_password_register").css("outline","1px solid #c9c7c7");
  }
  else if(pWord == confPword){
    $("#conf_password_register").css("outline","1px solid #a3cda8");
    $('#password_confirm').fadeOut('0');
  }
  else {
    $("#conf_password_register").css("outline","1px solid #eb3f63");
    $('#password_confirm').fadeIn('0');
  }
}
function validateUpdatePword(){
  var pword = $("#new_password_box").val();
  var numRe = new RegExp("[0-9]+");
  var lcRe = new RegExp("[a-z]+");
  var ucRe = new RegExp("[A-Z]{2,}");
  var symRe = new RegExp("[!@#$%&_]+");
  if(pword.length<8){
    document.getElementById("password_validate").innerHTML = "Password is too short";
    $('#password_validate').fadeIn('0');
    $("#new_password_box").css("outline","1px solid #eb3f63");
  }
  else{
    $('#password_validate').fadeOut('0');
    $("#new_password_box").css("outline","1px solid #c9c7c7");
    if(!numRe.test(pword)){
      document.getElementById("password_validate").innerHTML = "Password must contain number";
      $('#password_validate').fadeIn('0');
      $("#new_password_box").css("outline","1px solid #eb3f63");
    }
    else if(numRe.test(pword)){
      $('#password_validate').fadeOut('0');
      $("#new_password_box").css("outline","1px solid #c9c7c7");
      if(!lcRe.test(pword)){
        document.getElementById("password_validate").innerHTML = "Password must contain atleast one lower case";
        $('#password_validate').fadeIn('0');
        $("#new_password_box").css("outline","1px solid #eb3f63");
      }
      else if(lcRe.test(pword)){
        $('#password_validate').fadeOut('0');
        $("#new_password_box").css("outline","1px solid #c9c7c7");
        if(!ucRe.test(pword)){
          document.getElementById("password_validate").innerHTML = "Password must contain atleast two upper case";
          $('#password_validate').fadeIn('0');
          $("#new_password_box").css("outline","1px solid #eb3f63");
        }
        else if(ucRe.test(pword)){
          $('#password_validate').fadeOut('0');
          $("#new_password_box").css("outline","1px solid #c9c7c7");
          if(!symRe.test(pword)){
            document.getElementById("password_validate").innerHTML = "Password must contain symbol(s)";
            $('#password_validate').fadeIn('0');
            $("#new_password_box").css("outline","1px solid #eb3f63");
          }
          else if(symRe.test(pword)){
            $('#password_validate').fadeOut('0');
            $("#new_password_box").css("outline","1px solid #c9c7c7");
          }
        }
      }
    }
  }
  confirmUpdatePword();
}
function confirmUpdatePword(){
  var pWord= $("#new_password_box").val();
  var confPword = $("#conf_password_box").val();
  if(!pWord){
    $("#conf_password_box").css("outline","1px solid #eb3f63");
    $('#password_confirm').fadeIn('0');
  }
  else if(!confPword){
    $("#conf_password_box").css("outline","1px solid #c9c7c7");
  }
  else if(pWord == confPword){
    $("#conf_password_box").css("outline","1px solid #a3cda8");
    $('#password_confirm').fadeOut('0');
  }
  else {
    $("#conf_password_box").css("outline","1px solid #eb3f63");
    $('#password_confirm').fadeIn('0');
  }
}
function validateEmail(){
  var email = $("#email_register").val();
  var re = new RegExp("^([a-zA-Z]+|[a-zA-Z]+\.[a-zA-Z0-9_]+)@(([a-z]+|[a-z]+\.[a-z]+)+)(\.[a-z]+$)");
  var is_email=re.test(email);
  if(!is_email){
    $("#email_register").css("outline","1px solid #eb3f63");
  }
  else if(!email){
    $("#email_register").css("outline","1px solid #c9c7c7");
  }
  else if(is_email){
    $("#email_register").css("outline","1px solid #a3cda8");
  }
  else {
    $("#email_register").css("outline","1px solid #eb3f63");
  }
}
function validateSupportEmail(){
  var email = $("#support_email_box").val();
  var re = new RegExp("^([a-zA-Z]+|[a-zA-Z]+\.[a-zA-Z0-9_]+)@(([a-z]+|[a-z]+\.[a-z]+)+)(\.[a-z]+$)");
  var is_email=re.test(email);
  if(!is_email){
    $("#support_email_box").css("outline","1px solid #eb3f63");
  }
  else if(!email){
    $("#support_email_box").css("outline","1px solid #c9c7c7");
  }
  else if(is_email){
    $("#support_email_box").css("outline","1px solid #a3cda8");
  }
  else {
    $("#support_email_box").css("outline","1px solid #eb3f63");
  }
}
function validateResetEmail(){
  var email = $("#reset_email_box").val();
  var re = new RegExp("^([a-zA-Z]+|[a-zA-Z]+\.[a-zA-Z0-9_]+)@(([a-z]+|[a-z]+\.[a-z]+)+)(\.[a-z]+$)");
  var is_email=re.test(email);
  if(!is_email){
    $("#reset_email_box").css("outline","1px solid #eb3f63");
  }
  else if(!email){
    $("#reset_email_box").css("outline","1px solid #c9c7c7");
  }
  else if(is_email){
    $("#reset_email_box").css("outline","1px solid #a3cda8");
  }
  else {
    $("#reset_email_box").css("outline","1px solid #eb3f63");
  }
}
function validateTele(){
  var tele= $("#tele_register").val();
  var re = new RegExp("^(1(-)?)?([1-9][0-9][0-9](-)?)([1-9][0-9][0-9](-)?)([0-9][0-9][0-9][0-9]$)");
  var is_tele=re.test(tele);
  if(!is_tele){
    $("#tele_register").css("outline","1px solid #eb3f63");
  }
  else if(!tele){
    $("#tele_register").css("outline","1px solid #c9c7c7");
  }
  else if(is_tele){
    $("#tele_register").css("outline","1px solid #a3cda8");
  }
  else {
    $("#tele_register").css("outline","1px solid #eb3f63");
  }
}
/*function smoothscroll(){
  $('#header').slideUp('15');
}*/
 function initMap () {
  var latlng = new google.maps.LatLng( 18.015998,-77.499579);
  var options = {
    zoom: 17,
    center: latlng,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };

  var map = new google.maps.Map( document.getElementById(
        'contact_map_map' ), options );

  var marker = new google.maps.Marker({
    position: latlng,
    map: map,
    title: "Company head office marker"
  });

  var infowindow = new google.maps.InfoWindow({
    content: "<p>We are students at:<br>Northern Caribbean University</p>"
  });

  google.maps.event.addListener(marker, 'click', function(){
    infowindow.open(map, marker);
  });
}
function showResult(str){
  $('#livesearch').fadeIn('290');
  if (str.length==0) { 
    document.getElementById("livesearch").innerHTML="";
    document.getElementById("livesearch").style.border="0px";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("livesearch").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","global/livesearch.php?q="+str,true);
  xmlhttp.send();
}
document.onkeydown = function(evt) {
    evt = evt || window.event;
    if(evt.keyCode == 27) {
        $('#livesearch').fadeOut('290');
        //document.getElementById(".form-control").blur();
    }
};