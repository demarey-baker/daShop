function choose_file(){$("#file_input").click()}function read_img(e){if(e.files&&e.files[0]){var s=new FileReader;s.onload=function(e){$("#preview").attr("src",e.target.result).width(270).height(249)},s.readAsDataURL(e.files[0])}}function choose_update_file(){$("#update_file_input").click()}function read_update_img(e){if(e.files&&e.files[0]){var s=new FileReader;s.onload=function(e){$("#update_preview").attr("src",e.target.result).width(239).height(198)},s.readAsDataURL(e.files[0])}}function read_product_img(e){if(e.files&&e.files[0]){var s=new FileReader;s.onload=function(e){$("#product_preview").attr("src",e.target.result).width(600).height(450)},s.readAsDataURL(e.files[0])}}function read_edit_product_img(e){if(e.files&&e.files[0]){var s=new FileReader;s.onload=function(e){$("#product_preview").attr("src",e.target.result).width(600).height(450)},s.readAsDataURL(e.files[0])}}function validatePword(){var e=$("#password_register").val(),s=new RegExp("[0-9]+"),t=new RegExp("[a-z]+"),a=new RegExp("[A-Z]{2,}"),o=new RegExp("[!@#$%&_]+");e.length<8?(document.getElementById("password_validate").innerHTML="Password is too short",$("#password_validate").fadeIn("0"),$("#password_register").css("outline","1px solid #eb3f63")):($("#password_validate").fadeOut("0"),$("#password_register").css("outline","1px solid #c9c7c7"),s.test(e)?s.test(e)&&($("#password_validate").fadeOut("0"),$("#password_register").css("outline","1px solid #c9c7c7"),t.test(e)?t.test(e)&&($("#password_validate").fadeOut("0"),$("#password_register").css("outline","1px solid #c9c7c7"),a.test(e)?a.test(e)&&($("#password_validate").fadeOut("0"),$("#password_register").css("outline","1px solid #c9c7c7"),o.test(e)?o.test(e)&&($("#password_validate").fadeOut("0"),$("#password_register").css("outline","1px solid #c9c7c7")):(document.getElementById("password_validate").innerHTML="Password must contain symbol(s)",$("#password_validate").fadeIn("0"),$("#password_register").css("outline","1px solid #eb3f63"))):(document.getElementById("password_validate").innerHTML="Password must contain atleast two upper case",$("#password_validate").fadeIn("0"),$("#password_register").css("outline","1px solid #eb3f63"))):(document.getElementById("password_validate").innerHTML="Password must contain atleast one lower case",$("#password_validate").fadeIn("0"),$("#password_register").css("outline","1px solid #eb3f63"))):(document.getElementById("password_validate").innerHTML="Password must contain number",$("#password_validate").fadeIn("0"),$("#password_register").css("outline","1px solid #eb3f63"))),confirmPword()}function confirmPword(){var e=$("#password_register").val(),s=$("#conf_password_register").val();e?s?e==s?($("#conf_password_register").css("outline","1px solid #a3cda8"),$("#password_confirm").fadeOut("0")):($("#conf_password_register").css("outline","1px solid #eb3f63"),$("#password_confirm").fadeIn("0")):$("#conf_password_register").css("outline","1px solid #c9c7c7"):($("#conf_password_register").css("outline","1px solid #eb3f63"),$("#password_confirm").fadeIn("0"))}function validateUpdatePword(){var e=$("#new_password_box").val(),s=new RegExp("[0-9]+"),t=new RegExp("[a-z]+"),a=new RegExp("[A-Z]{2,}"),o=new RegExp("[!@#$%&_]+");e.length<8?(document.getElementById("password_validate").innerHTML="Password is too short",$("#password_validate").fadeIn("0"),$("#new_password_box").css("outline","1px solid #eb3f63")):($("#password_validate").fadeOut("0"),$("#new_password_box").css("outline","1px solid #c9c7c7"),s.test(e)?s.test(e)&&($("#password_validate").fadeOut("0"),$("#new_password_box").css("outline","1px solid #c9c7c7"),t.test(e)?t.test(e)&&($("#password_validate").fadeOut("0"),$("#new_password_box").css("outline","1px solid #c9c7c7"),a.test(e)?a.test(e)&&($("#password_validate").fadeOut("0"),$("#new_password_box").css("outline","1px solid #c9c7c7"),o.test(e)?o.test(e)&&($("#password_validate").fadeOut("0"),$("#new_password_box").css("outline","1px solid #c9c7c7")):(document.getElementById("password_validate").innerHTML="Password must contain symbol(s)",$("#password_validate").fadeIn("0"),$("#new_password_box").css("outline","1px solid #eb3f63"))):(document.getElementById("password_validate").innerHTML="Password must contain atleast two upper case",$("#password_validate").fadeIn("0"),$("#new_password_box").css("outline","1px solid #eb3f63"))):(document.getElementById("password_validate").innerHTML="Password must contain atleast one lower case",$("#password_validate").fadeIn("0"),$("#new_password_box").css("outline","1px solid #eb3f63"))):(document.getElementById("password_validate").innerHTML="Password must contain number",$("#password_validate").fadeIn("0"),$("#new_password_box").css("outline","1px solid #eb3f63"))),confirmUpdatePword()}function confirmUpdatePword(){var e=$("#new_password_box").val(),s=$("#conf_password_box").val();e?s?e==s?($("#conf_password_box").css("outline","1px solid #a3cda8"),$("#password_confirm").fadeOut("0")):($("#conf_password_box").css("outline","1px solid #eb3f63"),$("#password_confirm").fadeIn("0")):$("#conf_password_box").css("outline","1px solid #c9c7c7"):($("#conf_password_box").css("outline","1px solid #eb3f63"),$("#password_confirm").fadeIn("0"))}function validateEmail(){var e=$("#email_register").val(),s=new RegExp("^([a-zA-Z]+|[a-zA-Z]+.[a-zA-Z0-9_]+)@(([a-z]+|[a-z]+.[a-z]+)+)(.[a-z]+$)"),t=s.test(e);t?e?t?$("#email_register").css("outline","1px solid #a3cda8"):$("#email_register").css("outline","1px solid #eb3f63"):$("#email_register").css("outline","1px solid #c9c7c7"):$("#email_register").css("outline","1px solid #eb3f63")}function validateSupportEmail(){var e=$("#support_email_box").val(),s=new RegExp("^([a-zA-Z]+|[a-zA-Z]+.[a-zA-Z0-9_]+)@(([a-z]+|[a-z]+.[a-z]+)+)(.[a-z]+$)"),t=s.test(e);t?e?t?$("#support_email_box").css("outline","1px solid #a3cda8"):$("#support_email_box").css("outline","1px solid #eb3f63"):$("#support_email_box").css("outline","1px solid #c9c7c7"):$("#support_email_box").css("outline","1px solid #eb3f63")}function validateResetEmail(){var e=$("#reset_email_box").val(),s=new RegExp("^([a-zA-Z]+|[a-zA-Z]+.[a-zA-Z0-9_]+)@(([a-z]+|[a-z]+.[a-z]+)+)(.[a-z]+$)"),t=s.test(e);t?e?t?$("#reset_email_box").css("outline","1px solid #a3cda8"):$("#reset_email_box").css("outline","1px solid #eb3f63"):$("#reset_email_box").css("outline","1px solid #c9c7c7"):$("#reset_email_box").css("outline","1px solid #eb3f63")}function validateTele(){var e=$("#tele_register").val(),s=new RegExp("^(1(-)?)?([1-9][0-9][0-9](-)?)([1-9][0-9][0-9](-)?)([0-9][0-9][0-9][0-9]$)"),t=s.test(e);t?e?t?$("#tele_register").css("outline","1px solid #a3cda8"):$("#tele_register").css("outline","1px solid #eb3f63"):$("#tele_register").css("outline","1px solid #c9c7c7"):$("#tele_register").css("outline","1px solid #eb3f63")}function initMap(){var e=new google.maps.LatLng(18.015998,-77.499579),s={zoom:17,center:e,mapTypeId:google.maps.MapTypeId.ROADMAP},t=new google.maps.Map(document.getElementById("contact_map_map"),s),a=new google.maps.Marker({position:e,map:t,title:"Company head office marker"}),o=new google.maps.InfoWindow({content:"<p>We are students at:<br>Northern Caribbean University</p>"});google.maps.event.addListener(a,"click",function(){o.open(t,a)})}function showResult(e){return $("#livesearch").fadeIn("290"),0==e.length?(document.getElementById("livesearch").innerHTML="",void(document.getElementById("livesearch").style.border="0px")):(xmlhttp=window.XMLHttpRequest?new XMLHttpRequest:new ActiveXObject("Microsoft.XMLHTTP"),xmlhttp.onreadystatechange=function(){4==xmlhttp.readyState&&200==xmlhttp.status&&(document.getElementById("livesearch").innerHTML=xmlhttp.responseText)},xmlhttp.open("GET","global/livesearch.php?q="+e,!0),void xmlhttp.send())}$(function(){$("#automobiles a:contains('Automobiles')").parent().addClass("active"),$("#clothing a:contains('Clothing')").parent().addClass("active"),$("#construction a:contains('Construction')").parent().addClass("active"),$("#electronics a:contains('Electronics')").parent().addClass("active"),$("#gardening a:contains('Gardening')").parent().addClass("active"),$("#slider").unslider()}),$(document).scroll(function(){var e=$(this).scrollTop();e>250?$(".to_top").fadeIn("290"):$(".to_top").fadeOut("290")}),$(".to_top").click(function(){return $("html, body").animate({scrollTop:0},"slow"),!1}),document.onkeydown=function(e){e=e||window.event,27==e.keyCode&&$("#livesearch").fadeOut("290")};