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
    }
  },
  // Home page
  home: {
    init: function() {
      // JavaScript to be fired on the home page
	  $(document).ready(function() {
			var owl = $("#main-banner");
			owl.owlCarousel({
				loop:true,
				nav:true,
				dots: false,
				autoplay:true,
				autoplayTimeout:5000,
				autoplayHoverPause:true,
				responsive:{
					0:{
						items:1
					}
				}
			});
			$('.custom-banner-prev').on('click',function(){
				owl.trigger('prev.owl.carousel');
			});
			$('.custom-banner-next').on('click',function(){
				owl.trigger('next.owl.carousel');
			});
	  });
    }
  },
  // About us page, note the change from about-us to about_us.
  locations: {
    init: function() {
      function initialize(){
			
			geocoder = new google.maps.Geocoder();
			var mapOptions = {
				lat: 22.406385, 
				lng: 114.113280,
				center: new google.maps.LatLng(22.323322, 114.172412),
				zoom: 15,
				minZoom: 11,
				styles: [{"featureType":"all","elementType":"all","stylers":[{"saturation":-100},{"gamma":0.5}]}]
			};
			map = new google.maps.Map(document.getElementById("map"), mapOptions);	
			
		}
		  
		function codeAddress(markerVar) {
			  var markerLatlng = new google.maps.LatLng(markerVar.marker_x, markerVar.marker_y);
			  var marker = new google.maps.Marker({
				  map: map,
				 // position: results[0].geometry.location,
				  position:markerLatlng,
				  icon: '/wp-content/themes/brooklyn/assets/img/sprites/marker_map.png',
				  zIndex:25
			  });
			  //realmarkers.push(marker);
			  		  
			  var boxText = document.createElement("div");
				boxText.className = "markerOverlay";
				boxText.innerHTML = markerVar.marker_content;
					
				var myOptions = {
					content: boxText,
					disableAutoPan: false,
					maxWidth: 0,
					pixelOffset: new google.maps.Size(-175, -165),
					zIndex: null,
					infoBoxClearance: new google.maps.Size(1, 1),
					isHidden: false,
					pane: "floatPane",
					enableEventPropagation: false
				};
				
				var infowindow = new InfoBox(myOptions);
				//infowindows[marker.id] = infowindow;
				google.maps.event.addListener(marker, 'click', function() {
					active_info = this.id;
					map.setCenter(this.getPosition());
					infowindow.open(map, this);
					return false;
				});
		}  
		
		 google.maps.Map.prototype.clearInfoWindow = function() {
			if (active_info){
			  infowindows[active_info].close();
			}
		};
		
		$(document).ready(function(e) {
			
            $.when(initialize()).done(function(){
				codeAddress(brooklyn_marker);
			});
        });
    }
  },
  careers: {
    init: function() {
      // JavaScript to be fired on the home page
	  $(document).ready(function() {
			var owl = $("#main-banner");
			owl.owlCarousel({
				loop:true,
				nav:true,
				dots: false,
				autoplay:true,
				autoplayTimeout:5000,
				autoplayHoverPause:true,
				responsive:{
					0:{
						items:1
					}
				}
			});
			$('.custom-banner-prev').on('click',function(){
				owl.trigger('prev.owl.carousel');
			});
			$('.custom-banner-next').on('click',function(){
				owl.trigger('next.owl.carousel');
			});
	  });
    }
  },
  menu: {
    init: function() {
      // JavaScript to be fired on the home page
	  $(document).ready(function() {
			var owl = $("#main-banner");
			owl.owlCarousel({
				loop:true,
				nav:true,
				dots: false,
				autoplay:true,
				autoplayTimeout:5000,
				autoplayHoverPause:true,
				responsive:{
					0:{
						items:1
					}
				}
			});
			$('.custom-banner-prev').on('click',function(){
				owl.trigger('prev.owl.carousel');
			});
			$('.custom-banner-next').on('click',function(){
				owl.trigger('next.owl.carousel');
			});
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
