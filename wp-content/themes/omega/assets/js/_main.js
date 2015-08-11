/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can 
 * always reference jQuery with $, even when in .noConflict() mode.
 *
 * Google CDN, Latest jQuery
 * To use the default WordPress version of jQuery, go to lib/config.php and
 * remove or comment out: add_theme_support('jquery-cdn');
 * ======================================================================== */

(function($) {

// Use this variable to set up the common and page specific functions. If you 
// rename this variable, you will also need to rename the namespace below.
var Roots = {
  // All pages
  common: {
    init: function() {
      // JavaScript to be fired on all pages
	  function isIE() {
		var myNav = navigator.userAgent.toLowerCase();
		return (myNav.indexOf('msie') !== -1) ? parseInt(myNav.split('msie')[1]) : false;
	  }
	  
	  function forgot_password() {
			var ls_param =  $.toJSON({"as_user_login" : $("#loginName2").val(), "as_email" : $("#email").val() });
			$.ajax({ 
			  type: "POST",
			  url: "https://connex.omegacompliance.com/userwebsvc.asmx/ForgetPwd",
			  crossDomain: true,
			  data: ls_param,
			  contentType: "application/json; charset=utf-8",
			  dataType: "json",
			  cache: false,
			  success: function(as_result) {
				  if (as_result === "OK") {
					$("#forget_err_message").html("A new password will be sent to your email address in a few minutes");
				  } else {
					$("#forget_err_message").html(as_result);
				  }
				},
			  error: function(XMLHttpRequest, textStatus, errorThrown) {
				  $("#forget_err_message").html(XMLHttpRequest.responseText);
				}
			});
		}
		  
		function f_login() {
			//$.support.cors = true;
			var ls_param =  $.toJSON({"as_user_id" : $("#loginName").val(), "as_password" : $("#password").val() });
			$.ajax({ 
				type: "POST",
				url: "https://connex.omegacompliance.com/ncnUserWebSvc.asmx/RemoteLogin",
				data: ls_param,
				contentType: "application/json; charset=utf-8",
				dataType: "json",
				cache: false,
				success: function(as_result) {
						if (as_result === "OK") {
							//success
							window.location.assign("https://connex.omegacompliance.com/ncnmenu.aspx");
						} else if (as_result === "OKEXP") {
							window.location.assign("https://connex.omegacompliance.com/ncnmenu.aspx?pop=changepwd");
						} else {
							$("#login_err_message").html(as_result);
						}
					}, 
				error: function(XMLHttpRequest, textStatus, errorThrown) {
						$("#login_err_message").html(XMLHttpRequest.responseText);
					}
			});
		}
		
		function change(event)
		{
			var evt = (window.event) ? window.event : event;
			var elem = (evt.srcElement) ? evt.srcElement : evt.target;
			var inputID = $(elem).attr('id');
			var inputValue = $(elem).attr('value');
			if(inputValue === 'PASSWORD')
			{
				var passwordInput = document.createElement('input');
				passwordInput.id = inputID;
				passwordInput.type = 'password';
				passwordInput.value = '';
				passwordInput.onblur = changeBack;
				document.getElementById(inputID).parentNode.replaceChild(passwordInput, document.getElementById(inputID));
				window.setTimeout(function(){passwordInput.focus();}, 0);
			}
		}
		
		function changeBack(event)
		{
			var evt = (window.event) ? window.event : event;
			var elem = (evt.srcElement) ? evt.srcElement : evt.target;
			var inputID = $(elem).attr('id');
			var inputValue = $(elem).attr('value');
			if(inputValue === '')
			{
				var textInput = document.createElement('input');
				textInput.type = 'text';
				textInput.id = inputID;
				textInput.value = 'PASSWORD';
				textInput.onfocus = change;
				document.getElementById(inputID).parentNode.replaceChild(textInput, document.getElementById(inputID));
			}
		}

	  
	  $(document).ready(function(){
		$('.menu-login a').fancybox({'scrolling':'no'});						 
		
		$("#loginName").focus(function(){
			if($(this).val()==="USERNAME"){
				$(this).val("");
			}
		});
		$("#loginName").blur(function(){
			if($(this).val()===""){
				$(this).val("USERNAME");
			}
		});	
		
		$("#loginName2").focus(function(){
			if($(this).val()==="USER ID"){
				$(this).val("");	
			}
		});
		$("#loginName2").blur(function(){
			if($(this).val()===""){
				$(this).val("USER ID");	
			}
		});
		
		$("#email").focus(function(){
			if($(this).val()==="EMAIL"){
				$(this).val("");	
			}
		});
		$("#email").blur(function(){
			if($(this).val()===""){
				$(this).val("EMAIL");	
			}
		});
		
		if(isIE() === 8){
			$("#password").focus(function(){
				if($(this).val()==="PASSWORD"){
					change(event);
				}
			});
		}else{
			$("#password").focus(function(){
				if($(this).val()==="PASSWORD"){
					$(this).val("").prop('type', 'password');
				}
			});	
			
			$("#password").blur(function(){
				if($(this).val()===""){
					$(this).val("PASSWORD").prop('type', 'text');	
				}
			});
		}	
		
		$('.forgetPassword').click(function(){
			$('#login #Form1').hide();
			$('#login #Form2').show();
			$('#login_err_message').html("");
			$('#forget_err_message').html("");
		});
	
		$('#btn-cancel').click(function(){
			$('#login #Form1').show();
			$('#login #Form2').hide();
			$('#login_err_message').html("");
			$('#forget_err_message').html("");
		});
	
		$(".fancybox").fancybox({
			afterClose: function() {
				$('#login #Form1').show();
				$('#login #Form2').hide();  
				$('#login_err_message').html("");
				$('#forget_err_message').html("");
			}
		});
		
	  });
	  
    }
  },
  // Home page
  home: {
    init: function() {
      // JavaScript to be fired on the home page
    }
  },
  // About us page, note the change from about-us to about_us.
  locations: {
    init: function() {		
		function initMap(){
			$('#Map area').each(function(){
				$(this).mouseover(function(){
					if($(window).width() < 768){	
						return;
					}
						
					var areaCoords = $(this).attr('coords').split(',');
					var overlayLeft = parseInt(areaCoords[2]);
					var overlayTop = parseInt(areaCoords[1])-$('.overlayContainer .overlayItem').eq($('#Map area').index($(this))).outerHeight();
					
					$('.overlayContainer .overlayItem').eq($('#Map area').index($(this))).css({'left':overlayLeft, 'top':overlayTop});
					$('.overlayContainer .overlayItem').eq($('#Map area').index($(this))).fadeIn();
				});							 
				
				$(this).mouseout(function(){
					if($(window).width() < 768){
						return;
					}
					$('.overlayContainer .overlayItem').eq($('#Map area').index($(this))).fadeOut();
				});
			});
		}
	
		$(document).ready(function(e) {
			$('img[usemap]').rwdImageMaps();
			initMap();		
        });
		
		$(window).resize(function(){
			if($(window).width() < 768){
				$('.overlayContainer .overlayItem').show();	
			}
		});
    }
  },
  blog:{
	init: function(){
		function initSelect(){
			$('.post_sort_select').each(function(){
				$(this).change(function(){
					var url = $(this).val(); // get selected value
					console.log(url);
					if (url) { // require a URL
					  window.location = url; // redirect
					}
					//return false;						
				});									 
			});		
		}	
		
		$(document).ready(function(){
			initSelect();						   
		});
	}
  }
};

// The routing fires all common scripts, followed by the page specific scripts.
// Add additional events for more control over timing e.g. a finalize event
var UTIL = {
  fire: function(func, funcname, args) {
    var namespace = Roots;
    funcname = (funcname === undefined) ? 'init' : funcname;
    if (func !== '' && namespace[func] && typeof namespace[func][funcname] === 'function') {
      namespace[func][funcname](args);
    }
  },
  loadEvents: function() {
    UTIL.fire('common');

    $.each(document.body.className.replace(/-/g, '_').split(/\s+/),function(i,classnm) {
      UTIL.fire(classnm);
    });
  }
};

$(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.
