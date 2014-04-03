/* 
   main.js - contains all main javascript and jquery code/functions
   Author: Various authors
*/


/*

To top link.
Martin Sherwood, decided not to use.

*/
/*$(document).ready(function(topTop) {
  $('.to-top').click(function(){
    $('html, body').animate({scrollTop: '0px'}, 500);
    return false;
  });
  
  $(window).scroll(function() {
    $('.to-top').show();
  });
});
*/


/*

Cookie consent function.
Martin Sherwood.

*/
$(document).ready(function() {
	$('.cookie-accept').click(function () { //on click event
		days = 365; //number of days to keep the cookie
		myDate = new Date();
		myDate.setTime(myDate.getTime()+(days*24*60*60*1000));
		document.cookie = "ts_cookies_comply = comply_yes; expires = " + myDate.toGMTString(); //creates the cookie: name|value|expiry time
		$("#cookies").slideUp("slow"); //jquery to slide it up
	});
});


/*

Mobile navigation dropdown.
Martin Sherwood and Leanne Williams.

*/
function DropDown(el) {
	this.drop = el;
	this.initEvents();
}

DropDown.prototype = {
	initEvents : function() {
		var obj = this;
		obj.drop.on('click', function(event){
			$(this).toggleClass('active');
			event.stopPropagation(); //drop it down
		});	
	}
}

$(function(mobileDropdown) {
	var drop = new DropDown( $('#mobile-nav') ); //the id of the mobile nav
	$(document).click(function() {
		$('.mobile').removeClass('active'); //on-off
	});
});


/*

Smooth scrolling to sections.
Martin Sherwood.
http://css-tricks.com/snippets/jquery/smooth-scrolling/

*/
$(document).ready(function() {
  function filterPath(string) {
  return string
    .replace(/^\//,'')
    .replace(/(index|default).[a-zA-Z]{3,4}$/,'')
    .replace(/\/$/,'');
  }
  var locationPath = filterPath(location.pathname);
  var scrollElem = scrollableElement('html', 'body');
 
  $('a[href*=#]').each(function() {
    var thisPath = filterPath(this.pathname) || locationPath;
    if (  locationPath == thisPath
    && (location.hostname == this.hostname || !this.hostname)
    && this.hash.replace(/#/,'') ) {
      var $target = $(this.hash), target = this.hash;
      if (target) {
        var targetOffset = $target.offset().top;
        $(this).click(function(event) {
          event.preventDefault();
          $(scrollElem).animate({scrollTop: targetOffset}, 400, function() {
            location.hash = target;
          });
        });
      }
    }
  });
 
  //use the first element that is "scrollable"
  function scrollableElement(els) {
    for (var i = 0, argLength = arguments.length; i <argLength; i++) {
      var el = arguments[i],
          $scrollElement = $(el);
      if ($scrollElement.scrollTop()> 0) {
        return el;
      } else {
        $scrollElement.scrollTop(1);
        var isScrollable = $scrollElement.scrollTop()> 0;
        $scrollElement.scrollTop(0);
        if (isScrollable) {
          return el;
        }
      }
    }
    return [];
  }
 
});


/*

Homepage full width slider.
Martin Sherwood.
Adapted from: http://tympanus.net/codrops/2013/02/26/full-width-image-slider/
pSlider = placesSlider

*/
;( function( $, window, undefined ) {

	'use strict';

	//use mondernizr
	var Modernizr = window.Modernizr;

	$.pSlider = function( options, element ) {
		this.$el = $( element );
		this._init( options );
	};

	//options
	$.pSlider.defaults = {
		speed : 1400, //transition speed in ms
		easing : 'ease' //transition easing setting, ease works best for slow start, fast middle and slow send, all easing smoothly
	};

	$.pSlider.prototype = {
		_init : function( options ) {
			//get options
			this.options = $.extend( true, {}, $.pSlider.defaults, options );
			//cache some elements and initialize some variables
			this._config();
			//bind the events
			this._initEvents();
		},
		_config : function() {

			//list of items
			this.$list = this.$el.children( 'ul' );
			
			//the items are in list items
			this.$items = this.$list.children( 'li' );
			
			//total number of items
			this.itemsCount = this.$items.length;
			
			//support for CSS transitions & transforms
			this.support = Modernizr.csstransitions && Modernizr.csstransforms;
			this.support3d = Modernizr.csstransforms3d;
			
			//transition end event name and transform name
			var transEndEventNames = {
					'WebkitTransition' : 'webkitTransitionEnd',
					'MozTransition' : 'transitionend',
					'OTransition' : 'oTransitionEnd',
					'msTransition' : 'MSTransitionEnd',
					'transition' : 'transitionend'
				},
				transformNames = {
					'WebkitTransform' : '-webkit-transform',
					'MozTransform' : '-moz-transform',
					'OTransform' : '-o-transform',
					'msTransform' : '-ms-transform',
					'transform' : 'transform'
				};

			if( this.support ) {
				this.transEndEventName = transEndEventNames[ Modernizr.prefixed( 'transition' ) ] + '.pSlider';
				this.transformName = transformNames[ Modernizr.prefixed( 'transform' ) ];
			}
			//current and old item index
			this.current = 0;
			this.old = 0;
			//check if the list is currently moving
			this.isAnimating = false;
			//the list (ul) will have a width of 100% x itemsCount
			this.$list.css( 'width', 100 * this.itemsCount + '%' );
			//apply the transition
			if( this.support ) {
				this.$list.css( 'transition', this.transformName + ' ' + this.options.speed + 'ms ' + this.options.easing );
			}
			//each item will have a width of 100 / itemsCount
			this.$items.css( 'width', 100 / this.itemsCount + '%' );
			//if there is only 1 item, no nav will be shown
			if( this.itemsCount > 1 ) {

				//next and previous button
				this.$navPrev = $( '<span class="prev">&lt;</span>' ).hide();
				this.$navNext = $( '<span class="next">&gt;</span>' );
				$( '<nav/>' ).append( this.$navPrev, this.$navNext ).appendTo( this.$el );
				// add navigation dots
				var dots = '';
				for( var i = 0; i < this.itemsCount; ++i ) {
					//the active slide will have the current class on the dot
					var dot = i === this.current ? '<span class="current"></span>' : '<span></span>';
					dots += dot;
				}
				var navDots = $( '<div class="nav-dots"/>' ).append( dots ).appendTo( this.$el );
				this.$navDots = navDots.children( 'span' );

			}

		},
		_initEvents : function() {
			
			var self = this;
			if( this.itemsCount > 1 ) {
				this.$navPrev.on( 'click.pSlider', $.proxy( this._navigate, this, 'previous' ) );
				this.$navNext.on( 'click.pSlider', $.proxy( this._navigate, this, 'next' ) );
				this.$navDots.on( 'click.pSlider', function() { self._jump( $( this ).index() ); } );
			}

		},
		_navigate : function( direction ) {

			//if the item is moving, stop
			if( this.isAnimating ) {
				return false;
			}

			this.isAnimating = true;
			// update old and current values
			this.old = this.current;
			if( direction === 'next' && this.current < this.itemsCount - 1 ) {
				++this.current;
			}
			else if( direction === 'previous' && this.current > 0 ) {
				--this.current;
			}
			// slide
			this._slide();

		},
		_slide : function() {

			//check which navigation arrows should be shown
			this._toggleNavControls();
			//translate value
			var translateVal = -1 * this.current * 100 / this.itemsCount;
			if( this.support ) {
				this.$list.css( 'transform', this.support3d ? 'translate3d(' + translateVal + '%,0,0)' : 'translate(' + translateVal + '%)' );
			}
			else {
				this.$list.css( 'margin-left', -1 * this.current * 100 + '%' );	
			}
			
			var transitionendfn = $.proxy( function() {
				this.isAnimating = false;
			}, this );

			if( this.support ) {
				this.$list.on( this.transEndEventName, $.proxy( transitionendfn, this ) );
			}
			else {
				transitionendfn.call();
			}

		},
		_toggleNavControls : function() {

			//if the current item is the first one in the list, the left arrow is not shown and vice versa for the last item and the right arrow
			switch( this.current ) {
				case 0 : this.$navNext.show(); this.$navPrev.hide(); break;
				case this.itemsCount - 1 : this.$navNext.hide(); this.$navPrev.show(); break;
				default : this.$navNext.show(); this.$navPrev.show(); break;
			}
			// highlight navigation dot
			this.$navDots.eq( this.old ).removeClass( 'current' ).end().eq( this.current ).addClass( 'current' );

		},
		_jump : function( position ) {

			// do nothing if clicking on the current dot, or if the list is currently moving
			if( position === this.current || this.isAnimating ) {
				return false;
			}
			this.isAnimating = true;
			// update old and current values
			this.old = this.current;
			this.current = position;
			// slide
			this._slide();

		},
		destroy : function() {

			if( this.itemsCount > 1 ) {
				this.$navPrev.parent().remove();
				this.$navDots.parent().remove();
			}
			this.$list.css( 'width', 'auto' );
			if( this.support ) {
				this.$list.css( 'transition', 'none' );
			}
			this.$items.css( 'width', 'auto' );

		}
	};

	var logError = function( message ) {
		if ( window.console ) {
			window.console.error( message );
		}
	};

	$.fn.pSlider = function( options ) {
		if ( typeof options === 'string' ) {
			var args = Array.prototype.slice.call( arguments, 1 );
			this.each(function() {
				var instance = $.data( this, 'pSlider' );
				if ( !instance ) {
					logError( "cannot call methods on pSlider prior to initialization; " +
					"attempted to call method '" + options + "'" );
					return;
				}
				if ( !$.isFunction( instance[options] ) || options.charAt(0) === "_" ) {
					logError( "no such method '" + options + "' for pSlider instance" );
					return;
				}
				instance[ options ].apply( instance, args );
			});
		} 
		else {
			this.each(function() {	
				var instance = $.data( this, 'pSlider' );
				if ( instance ) {
					instance._init();
				}
				else {
					instance = $.data( this, 'pSlider', new $.pSlider( options, this ) );
				}
			});
		}
		return this;
	};

} )( jQuery, window );

$(function() {
	$('.slider').pSlider();
});


/*

Latest tweets on homepage.
Martin Sherwood.

*/
$(document).ready(function() {
	$(".tweets").tweet({
		modpath: "./twitter/",
		username: "TalkingStickMkt",
		count: 3,
		join_text: "auto",
		auto_join_text_default: "we said,", 
		auto_join_text_ed: "we",
		auto_join_text_ing: "we were",
		auto_join_text_reply: "we replied to",
		auto_join_text_url: "we were checking out",
		loading_text: "loading tweets...",
	});
});


/*

Client map.
Richard Wolstenholme.

*/
$(document).ready(function(){
  $('#africa').hide();
  $('#latinamerica').hide();
  $('#asia').hide();
  $('#africa-show').click(function() {
	   	$('#latinamerica').hide();
  		$('#asia').hide();
        $('#africa').fadeIn(1000);
  });
  
  $('#africa').hide();
  $('#latinamerica').hide();
  $('#asia').hide();
    $('#latinamerica-show').click(function() {
	  $('#africa').hide();
	  $('#asia').hide();
      $('#latinamerica').fadeIn(1000);
  });
  
  $('#africa').hide();
  $('#latinamerica').hide();
  $('#asia').hide();
    $('#asia-show').click(function() {
	  $('#africa').hide();
	  $('#latinamerica').hide();
      $('#asia').fadeIn(1000);
  });  
});