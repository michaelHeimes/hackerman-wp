/**
 * Required
 */
 
 //@prepros-prepend vendor/foundation/js/plugins/foundation.core.js

/**
 * Optional Plugins
 * Remove * to enable any plugins you want to use
 */
 
 // What Input
 //@*prepros-prepend vendor/whatinput.js
 
 // Foundation Utilities
 // https://get.foundation/sites/docs/javascript-utilities.html
 //@prepros-prepend vendor/foundation/js/plugins/foundation.util.box.min.js
 //@*prepros-prepend vendor/foundation/js/plugins/foundation.util.imageLoader.min.js
 //@prepros-prepend vendor/foundation/js/plugins/foundation.util.keyboard.min.js
 //@prepros-prepend vendor/foundation/js/plugins/foundation.util.mediaQuery.min.js
 //@*prepros-prepend vendor/foundation/js/plugins/foundation.util.motion.min.js
 //@prepros-prepend vendor/foundation/js/plugins/foundation.util.nest.min.js
 //@*prepros-prepend vendor/foundation/js/plugins/foundation.util.timer.min.js
 //@prepros-prepend vendor/foundation/js/plugins/foundation.util.touch.min.js
 //@prepros-prepend vendor/foundation/js/plugins/foundation.util.triggers.min.js


// JS Form Validation
//@*prepros-prepend vendor/foundation/js/plugins/foundation.abide.js

// Tabs UI
//@*prepros-prepend vendor/foundation/js/plugins/foundation.tabs.js

// Accordian
//@*prepros-prepend vendor/foundation/js/plugins/foundation.accordion.js
//@*prepros-prepend vendor/foundation/js/plugins/foundation.accordionMenu.js
//@*prepros-prepend vendor/foundation/js/plugins/foundation.responsiveAccordionTabs.js

// Menu enhancements
//@*prepros-prepend vendor/foundation/js/plugins/foundation.drilldown.js
//@*prepros-prepend vendor/foundation/js/plugins/foundation.dropdown.js
//@*prepros-prepend vendor/foundation/js/plugins/foundation.dropdownMenu.js
//@*prepros-prepend vendor/foundation/js/plugins/foundation.responsiveMenu.js
//@*prepros-prepend vendor/foundation/js/plugins/foundation.responsiveToggle.js

// Equalize heights
//@*prepros-prepend vendor/foundation/js/plugins/foundation.equalizer.js

// Responsive Images
//@*prepros-prepend vendor/foundation/js/plugins/foundation.interchange.js

// Navigation Widget
//@*prepros-prepend vendor/foundation/js/plugins/foundation.magellan.js

// Offcanvas Naviagtion Option
//@prepros-prepend vendor/foundation/js/plugins/foundation.offcanvas.js

// Carousel (don't ever use)
//@*prepros-prepend vendor/foundation/js/plugins/foundation.orbit.js

// Modals
//@*prepros-prepend vendor/foundation/js/plugins/foundation.reveal.js

// Form UI element
//@*prepros-prepend vendor/foundation/js/plugins/foundation.slider.js

// Anchor Link Scrolling
//@prepros-prepend vendor/foundation/js/plugins/foundation.smoothScroll.js

// Sticky Elements
//@*prepros-prepend vendor/foundation/js/plugins/foundation.sticky.js

// On/Off UI Switching
//@*prepros-prepend vendor/foundation/js/plugins/foundation.toggler.js

// Tooltips
//@*prepros-prepend vendor/foundation/js/plugins/foundation.tooltip.js

// What Input
//@prepros-prepend vendor/what-input.js

// Swiper
//@prepros-prepend vendor/swiper-bundle.js

// DOM Ready
(function($) {
	'use strict';
    
    var _app = window._app || {};
    
    _app.foundation_init = function() {
        $(document).foundation();
    }
        
    _app.emptyParentLinks = function() {
            
        $('.menu li a[href="#"]').click(function(e) {
            e.preventDefault ? e.preventDefault() : e.returnValue = false;
        });	
        
    };
    
    _app.fixed_nav_hack = function() {
        $('.off-canvas').on('opened.zf.offCanvas', function() {
            $('header.site-header').addClass('off-canvas-content is-open-right has-transition-push');		
            $('header.site-header #top-bar-menu .menu-toggle-wrap a#menu-toggle').addClass('clicked');	
        });
        
        $('.off-canvas').on('close.zf.offCanvas', function() {
            $('header.site-header').removeClass('off-canvas-content is-open-right has-transition-push');
            $('header.site-header #top-bar-menu .menu-toggle-wrap a#menu-toggle').removeClass('clicked');
        });
        
        $(window).on('resize', function() {
            if ($(window).width() > 1023) {
                $('.off-canvas').foundation('close');
                $('header.site-header').removeClass('off-canvas-content has-transition-push');
                $('header.site-header #top-bar-menu .menu-toggle-wrap a#menu-toggle').removeClass('clicked');
            }
        });    
    }
    
    _app.display_on_load = function() {
        $('.display-on-load').css('visibility', 'visible');
    }
    
    // Custom Functions
    
    _app.mobile_takover_nav = function() {
        $(document).on('click', 'a#menu-toggle', function(){
            
            if ( $(this).hasClass('clicked') ) {
                $(this).removeClass('clicked');
                $('#off-canvas').fadeOut(200);
            
            } else {
            
                $(this).addClass('clicked');
                $('#off-canvas').fadeIn(200);
            
            }
            
        });
    }
    
    _app.legacy = function() {
        // Legacy slideshow
        var legacy_slider_paused = false;
        var legacy_slides = document.querySelectorAll('#legacy .images .image');
        
        if( legacy_slides.length < 1 ) return;
        
        legacy_reset = (slides) => {
            slides.forEach((slide) => {
                slide.classList.remove('active');
            });
        };
        
        var legacy_timer = setInterval(() => {
            if (!legacy_slider_paused) {
                legacy_slides.forEach((slide) => {
                    if (slide.classList.contains('slide1')) {
                        slide.classList.remove('slide1');
                        slide.classList.add('slide2');
                    } else if (slide.classList.contains('slide2')) {
                        slide.classList.remove('slide2');
                        slide.classList.add('slide3');
                    } else if (slide.classList.contains('slide3')) {
                        slide.classList.remove('slide3');
                        slide.classList.add('slide4');
                    } else if (slide.classList.contains('slide4')) {
                        slide.classList.remove('slide4');
                        slide.classList.add('slide1');
                    }
                });
            }
        }, 5000);
        
        legacy_slides.forEach((slide) => {
            slide.onclick = (e) => {
                e.stopPropagation();
        
                legacy_reset(legacy_slides);
            };
        });
        
        var legacy_paused_btn = document.getElementById('legacy-play-pause-btn');
        
        legacy_slider_paused = false;
        legacy_paused_btn.classList.remove('play');
        legacy_paused_btn.classList.add('pause');
        
        legacy_paused_btn.addEventListener('click', (e) => {
            e.preventDefault();
        
            if (legacy_slider_paused) {
                legacy_slider_paused = false;
                legacy_paused_btn.classList.remove('play');
                legacy_paused_btn.classList.add('pause');
            } else {
                legacy_slider_paused = true;
                legacy_paused_btn.classList.remove('pause');
                legacy_paused_btn.classList.add('play');
            }
        });
    }
    
    _app.inherited = function() {
        const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)');
        
        function ready(fn) {
            if (document.readyState !== 'loading'){
              fn();
            } else {
              document.addEventListener('DOMContentLoaded', fn);
            }
        }
        
        ready(function () {
 
        
            // Header Background Video
            var bg_video_player = document.getElementById('background-video');
        
            if (!prefersReducedMotion.matches) {
                bg_video_player.play();
            }
        
            // News Slider
            var news_slides = document.querySelectorAll('#news .news-holder .news-article');
            var control_container = document.querySelector('#news .controls');
            var news_conatainer = document.querySelector('#news .news-holder');
            var news_paused_btn = document.getElementById('news_playpause');
            var news_slider_paused = false;
            var news_curr_slide = 0;
            var news_control_buttons;
            var news_timer;
        
            news_paused_btn.addEventListener('click', (e) => {
                e.preventDefault();
            
                if (news_slider_paused) {
                    news_slider_paused = false;
                    news_paused_btn.classList.remove('play');
                    news_paused_btn.classList.add('pause');
                } else {
                    news_slider_paused = true;
                    news_paused_btn.classList.remove('pause');
                    news_paused_btn.classList.add('play');
                }
            });
        
            var news_reset_slides = () => {
                news_slides.forEach((slide) => {
                    slide.classList.remove('active');
                });
            }
        
            var adjust_news_height = () => {
                var news_height = 0;
        
                for (let i = 0; i < news_slides.length; i++) {
                    // adjust height
                    let height = news_slides[i].offsetHeight;
                    if (height > news_height) {
                        news_height = height;
                    }
                }
        
                news_conatainer.style.height = news_height + 'px';
            };
        
            var update_news_display = (index) => {
                news_reset_slides();
        
                news_slides[index].classList.add('active');
        
                let active_control = control_container.querySelector('.item.active');
                active_control.classList.remove('active');
        
                news_control_buttons[index].classList.add('active');
        
                news_curr_slide = index;
            };
        
            for (let i = 0; i < news_slides.length; i++) {
                let a = document.createElement('a');
                a.classList.add('item');
                a.href = '#';
                a.setAttribute('data-index', i);
        
                if (i == 0) {
                    a.classList.add('active');
                }
        
                a.addEventListener('click', (e) => {
                    e.preventDefault();
        
                    window.clearTimeout(news_timer);
        
                    let index = a.getAttribute('data-index');
                    update_news_display(index);
        
                    news_timer = setInterval(() => {
                        if (!news_slider_paused) {
                            let index = parseInt(news_curr_slide) + 1;
                
                            if (index >= news_slides.length) {
                                index = 0;
                            } else if (index < 0) {
                                index = news_slides.length - 1;
                            }
        
                            update_news_display(index);
                        }
                    }, 5000);
                });
        
                control_container.appendChild(a);
            }
        
            news_control_buttons = control_container.querySelectorAll('.item');
        
            news_timer = setInterval(() => {
                if (!news_slider_paused) {
                    let index = news_curr_slide + 1;
        
                    if (index >= news_slides.length) {
                        index = 0;
                    } else if (index < 0) {
                        index = news_slides.length - 1;
                    }
        
                    update_news_display(index);
                }
            }, 5000);
        
            adjust_news_height();
            window.addEventListener('resize', adjust_news_height);
        
            // Impact Slideshow
            var impact_slides = document.querySelectorAll('#impact .slideshow .slide');
            var impact_next_slide_btn = document.querySelector('#impact #next-slide');
            var impact_curr_slide = 0;
            var impact_next_slide = 1;
        
            var reset_impact_slides = () => {
                impact_slides.forEach((slide) => {
                    slide.addEventListener('transitionend', () => {
                        impact_slides[impact_curr_slide].classList.add('ready');
                    }, { once: true });
        
                    slide.classList.remove('ready');
                    slide.classList.remove('next');
                    slide.classList.remove('active');
                });
            };
        
            impact_next_slide_btn.addEventListener('click', (e) => {
                e.preventDefault();
        
                impact_slides[impact_curr_slide].addEventListener('transitionend', () => {
                    impact_slides[impact_curr_slide].classList.remove('active');
                    impact_slides[impact_next_slide].classList.remove('next');
        
                    impact_curr_slide++;
                    if (impact_curr_slide >= impact_slides.length) {
                        impact_curr_slide = 0;
                    }
        
                    impact_next_slide++;
                    if (impact_next_slide >= impact_slides.length) {
                        impact_next_slide = 0;
                    }
        
                    impact_slides[impact_curr_slide].addEventListener('transitionend', () => {
                            impact_slides[impact_curr_slide].classList.add('ready');
                    }, { once: true });
        
                    impact_slides[impact_curr_slide].classList.add('active');
                    impact_slides[impact_next_slide].classList.add('next');
                }, { once: true });
        
                impact_slides[impact_curr_slide].classList.remove('ready');
            })
        });
    }
            
    _app.init = function() {
        
        // Standard Functions
        _app.foundation_init();
        _app.emptyParentLinks();
        _app.fixed_nav_hack();
        _app.display_on_load();
        
        // Custom Functions
        //_app.mobile_takover_nav();
        //_app.legacy();
        //_app.inherited();
    }
    
    
    // initialize functions on load
    $(function() {
        _app.init();
    });
	
	
})(jQuery);