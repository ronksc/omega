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
		
		/*var menuSlider=function(){
			var m,e,g,s,q,i; e=[]; q=8; i=8;
			return{
				init:function(j,k){
					m=document.getElementById(j); e=m.getElementsByTagName('li');
					var i,l,w,p; i=0; l=e.length;
					for(i;i<l;i++){
						var c,v; c=e[i]; v=c.value; if(v===1){s=c; w=c.offsetWidth; p=c.offsetLeft;}
						c.onmouseover=function(){menuSlider.mo(this);}; c.onmouseout=function(){menuSlider.mo(s);};
					}
					g=document.getElementById(k); g.style.width=w+'px'; g.style.left=p+'px';
				},
				mo:function(d){
					clearInterval(m.tm);
					var el,ew; el=parseInt(d.offsetLeft); ew=parseInt(d.offsetWidth);
					m.tm=setInterval(function(){menuSlider.mv(el,ew);},i);
				},
				mv:function(el,ew){
					var l,w; l=parseInt(g.offsetLeft); w=parseInt(g.offsetWidth);
					if(l!==el||w!==ew){
						if(l!==el){var ld,lr,li; ld=(l>el)?-1:1; lr=Math.abs(el-l); li=(lr<q)?ld*lr:ld*q; g.style.left=(l+li)+'px';}
						if(w!==ew){var wd,wr,wi; wd=(w>ew)?-1:1; wr=Math.abs(ew-w); wi=(wr<q)?wd*wr:wd*q; g.style.width=(w+wi)+'px';}
					}else{clearInterval(m.tm);}
		}};}();*/
		
		function initMenuSlider(){
			var nav_left = $('#menu-primary-navigation').offset().left;
			var current_page_nav_left = 0;
			var current_page_nav_width = 0;
			var temp_page_nav_left = -1;
			var timer;
			if($('#menu-primary-navigation>li.active').length > 0){
				current_page_nav_left = parseInt($('#menu-primary-navigation>li.active').offset().left)-parseInt(nav_left);
				current_page_nav_width = $('#menu-primary-navigation>li.active').outerWidth();
			}else if($('body').hasClass('single-post')){
				current_page_nav_left = parseInt($('#menu-primary-navigation>li.menu-news').offset().left)-parseInt(nav_left);
				current_page_nav_width = $('#menu-primary-navigation>li.menu-news').outerWidth();
			}else{
				current_page_nav_left = parseInt($('#menu-primary-navigation>li').eq(0).offset().left)-parseInt(nav_left);
				current_page_nav_width = $('#menu-primary-navigation>li').eq(0).outerWidth();	
			}
			
			$('#menu-primary-navigation>li').each(function(){
				
				$(this).bind('mouseenter', function(){
					clearTimeout(timer);
					el = parseInt($(this).offset().left)-parseInt(nav_left);
					ew = $(this).outerWidth();
					timer = setTimeout(function(){hoverAction(el, ew);},50);
				}).bind('mouseleave', function(){
					clearTimeout(timer);
					timer = setTimeout(function(){hoverAction(current_page_nav_left, current_page_nav_width);},50);
				});
				
			});
			
			function hoverAction(el, ew){
				var hover_page_nav_left = el;
				var hover_page_nav_width = ew;
				if(current_page_nav_left !== hover_page_nav_left){
					
					if(temp_page_nav_left !== hover_page_nav_left){
						$('#slide').animate({
								left:hover_page_nav_left,
								width: hover_page_nav_width
							},200);
						temp_page_nav_left = hover_page_nav_left;
					}
				}else{
					clearTimeout(timer);
					$('#slide').animate({
						left:current_page_nav_left,
						width: current_page_nav_width
					},200);
					temp_page_nav_left = -1;
				}
			}
			$('#slide').css({'left':current_page_nav_left, 'width':current_page_nav_width});
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
			$(".fancybox").fancybox({
				fitToView : true,
				autoSize  : true	
			});
		});
	
		$('#btn-cancel').click(function(){
			$('#login #Form1').show();
			$('#login #Form2').hide();
			$('#login_err_message').html("");
			$('#forget_err_message').html("");
		});
	
		$(".fancybox").fancybox({
			fitToView : true,
			autoSize  : true,
			afterClose: function() {
				$('#login #Form1').show();
				$('#login #Form2').hide();  
				$('#login_err_message').html("");
				$('#forget_err_message').html("");
			}
		});
		
	  });
	  
	  $(window).load(function(){
		initMenuSlider();					  
      });
	  
	  $(window).resize(function(){
		$('#menu-primary-navigation>li').each(function(){
			$(this).unbind('mouseenter');
			$(this).unbind('mouseleave');
		});
		initMenuSlider();					  
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
  page_template_template_location: {
    init: function() {		
		/*function initMap(){
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
			$('.overlayContainer .overlayItem').hide();
			if($(window).width() < 768){
				$('.overlayContainer .overlayItem').show();	
			}
		});*/
		
		function new_map( $el ) {
			// var
			var $markers = $el.find('.marker');
			
			// vars
			var args = {
				zoom		: 16,
				minZoom		: 3,
				center		: new google.maps.LatLng(0, 0),
				//mapTypeId	: google.maps.MapTypeId.ROADMAP,
				styles:[{"featureType":"water","elementType":"geometry.fill","stylers":[{"color":"#d3d3d3"}]},{"featureType":"transit","stylers":[{"color":"#808080"},{"visibility":"off"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"visibility":"on"},{"color":"#b3b3b3"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"road.local","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"weight":1.8}]},{"featureType":"road.local","elementType":"geometry.stroke","stylers":[{"color":"#d7d7d7"}]},{"featureType":"poi","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#ebebeb"}]},{"featureType":"administrative","elementType":"geometry","stylers":[{"color":"#a7a7a7"}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"landscape","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#efefef"}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"color":"#696969"}]},{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"visibility":"on"},{"color":"#737373"}]},{"featureType":"poi","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road.arterial","elementType":"geometry.stroke","stylers":[{"color":"#d6d6d6"}]},{"featureType":"road","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{},{"featureType":"poi","elementType":"geometry.fill","stylers":[{"color":"#dadada"}]}]
			};
			
			
			// create map	        	
			var map = new google.maps.Map( $el[0], args);
			
			
			// add a markers reference
			map.markers = [];
			
			
			// add markers
			$markers.each(function(){
				
				add_marker( $(this), map );
				
			});
			
			
			// center map
			//center_map( map );
			if($(window).outerWidth() >= 992){
				center_map( map );
			}else{
				map.setCenter(new google.maps.LatLng(13.7278422, 100.5233353));
			}
			
			
			// return
			return map;
			
		}
		
		/*
		*  add_marker
		*
		*  This function will add a marker to the selected Google Map
		*
		*  @type	function
		*  @date	8/11/2013
		*  @since	4.3.0
		*
		*  @param	$marker (jQuery element)
		*  @param	map (Google Map object)
		*  @return	n/a
		*/
		
		function add_marker( $marker, map ) {
		
			// var
			var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );
		
			// create marker
			var marker = new google.maps.Marker({
				position	: latlng,
				map			: map
			});
		
			// add to array
			map.markers.push( marker );
		
			// if marker contains HTML, add it to an infoWindow
			if( $marker.html() )
			{
				// create info window
				var infowindow = new google.maps.InfoWindow({
					content		: $marker.html()
				});
		
				// show info window when marker is clicked
				google.maps.event.addListener(marker, 'click', function() {
		
					infowindow.open( map, marker );
		
				});
			}
		
		}
		
		/*
		*  center_map
		*
		*  This function will center the map, showing all markers attached to this map
		*
		*  @type	function
		*  @date	8/11/2013
		*  @since	4.3.0
		*
		*  @param	map (Google Map object)
		*  @return	n/a
		*/
		
		function center_map( map ) {
		
			// vars
			var bounds = new google.maps.LatLngBounds();
		
			// loop through all markers and create bounds
			$.each( map.markers, function( i, marker ){
		
				var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );
		
				bounds.extend( latlng );
		
			});
		
			// only 1 marker?
			if( map.markers.length === 1 )
			{
				// set center of map
				map.setCenter( bounds.getCenter() );
				map.setZoom( 16 );
			}
			else
			{
				// fit to bounds
				map.fitBounds( bounds );
			}
		
		}
		
		/*
		*  document ready
		*
		*  This function will render each map when the document is ready (page has loaded)
		*
		*  @type	function
		*  @date	8/11/2013
		*  @since	5.0.0
		*
		*  @param	n/a
		*  @return	n/a
		*/
		// global var
		var map = null;
		
		$(document).ready(function(){
			/*if($(window).outerWidth() >= 992){
				$('.map_container').height($(window).outerHeight());
			}else{
				$('.map_container').height(500);	
			}*/
		
			$('.acf-map').each(function(){
		
				// create map
				map = new_map( $(this) );
		
			});
		
			$(window).resize(function(){
				if($(window).outerWidth() >= 992){
					center_map( map );
				}else{
					map.setCenter(new google.maps.LatLng(13.7278422, 100.5233353));
				}
				
			});
		
		});	
    }
  },
  page_template_template_news:{
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
