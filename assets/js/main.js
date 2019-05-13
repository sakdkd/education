(function ($) {
	"use strict";

    jQuery(document).ready(function($){
        
        // -------------------------------------------------------------
        // responsive menu start
        // -------------------------------------------------------------
       if ($.fn.slicknav) {
         $('.mainmenu-area ul, .home2-mainmenu ul').slicknav({
            prependTo:".responsive_menu",
            label:""
            })
       }
        
        // -------------------------------------------------------------
        // hero area owl carousel active area
        // -------------------------------------------------------------
        if ($.fn.owlCarousel) {  
            $('.hero-slide').owlCarousel({
                loop: true,
                items: 1,
                autoplay: true,
                dots:true,
                nav: true,
                autoplayTimeout:3000,
                navText: ['<i class="zmdi zmdi-long-arrow-left"></i>', '<i class="zmdi zmdi-long-arrow-right"></i>'],
            });
        }      
                
        // -------------------------------------------------------------
        // featured area owl carousel active area
        // -------------------------------------------------------------
        if ($.fn.owlCarousel) {  
            $('.featured-slide').owlCarousel({
                loop: true,
                items: 2,
                autoplay: true,
                margin:30,
                dots:true,
                nav: true,
                autoplayTimeout:3000,
                navText: ['<i class="zmdi zmdi-long-arrow-left"></i>', '<i class="zmdi zmdi-long-arrow-right"></i>'],
                responsive: {
                  0: {
                    items: 1
                  },
                  280: {
                    items: 1
                  },
                  320: {
                    items: 1
                  },
                  640: {
                    items: 2
                  },
                  960: {
                    items: 2
                  },
                  1200: {
                    items: 2
                  }
                }
            });
        }      
                        
        // -------------------------------------------------------------
        // featured area owl carousel active area
        // -------------------------------------------------------------
        if ($.fn.owlCarousel) {  
            $('.recent-properties-slide').owlCarousel({
                loop: true,
                items: 3,
                autoplay: false,
                margin:30,
                dots:true,
                nav: true,
                autoplayTimeout:3000,
                navText: ['<i class="zmdi zmdi-long-arrow-left"></i>', '<i class="zmdi zmdi-long-arrow-right"></i>'],
                responsive: {
                  0: {
                    items: 1
                  },
                  280: {
                    items: 1
                  },
                  320: {
                    items: 1
                  },
                  640: {
                    items: 3
                  },
                  960: {
                    items: 3
                  },
                  1200: {
                    items: 3
                  }
                }
            });
        }      
                                
        // -------------------------------------------------------------
        // logo slide owl carousel active area
        // -------------------------------------------------------------
        if ($.fn.owlCarousel) {  
            $('.logo-slide').owlCarousel({
                loop: true,
                items: 6,
                autoplay: false,
                margin:30,
                dots:false,
                nav: false,
                autoplayTimeout:3000,
                responsive: {
                  0: {
                    items: 2
                  },
                  280: {
                    items: 2
                  },
                  320: {
                    items: 2
                  },
                  640: {
                    items: 4
                  },
                  960: {
                    items: 6
                  },
                  1200: {
                    items: 6
                  }
                }
            });
        }  

        // -------------------------------------------------------------
        // logo slide owl carousel active area
        // -------------------------------------------------------------
        if ($.fn.owlCarousel) {  
            $('.home2-featured-slide').owlCarousel({
                loop: true,
                items: 1,
                autoplay: false,
                margin:30,
                dots:true,
                nav: false,
                autoplayTimeout:3000,
            });
        }      


        // -------------------------------------------------------------
        // Magnific popup 
        // -------------------------------------------------------------
        if ($.fn.magnificPopup) {
        $('.play-btn').magnificPopup({
            type: 'video'

            });
        }


        // -------------------------------------------------------------
        // nice select active
        // -------------------------------------------------------------
        if ($.fn.niceSelect) {
            $('span.hero-nice-select, .home2-single-search.cta, .properties-top-select, .properties-top-select-right, .single-propert-select').niceSelect();
        }

        // -------------------------------------------------------------
        // home 2 counter active
        // -------------------------------------------------------------
        if ($.fn.countTo) {
            $('.home2-counter-area').on('inview', function (event, visible, visiblePartX, visiblePartY) {
                if (visible) {
                    $(this).find('.active_count').each(function () {
                        var $this = $(this);
                        $({
                            Counter: 0
                        }).animate({
                            Counter: $this.text()
                        }, {
                            duration: 5000,
                            easing: 'swing',
                            step: function () {
                                $this.text(Math.ceil(this.Counter));
                            }
                        });
                    });
                    $(this).off('inview');
                }
            });
        }

        // -------------------------------------------------------------
        //  home2 testimonial slider top
        // -------------------------------------------------------------
        if ($.fn.slick) {
            $('.home2-testimonial-slide').slick({
                // centerMode: true,
                centerPadding: '60px',
                autoplay:true,
                cssEase: 'linear',
                speed:400,
                slidesToShow: 1,
                prevArrow:false,
                nextArrow:false,
                asNavFor:'.home2-testimonial-slide-bottom',
            });
        }

        // -------------------------------------------------------------
        //  single properties top slide
        // -------------------------------------------------------------
        if ($.fn.slick) {
            $('.single-properties-v1-slide').slick({
                // centerMode: true,
                centerPadding: '60px',
                autoplay:true,
                cssEase: 'linear',
                speed:400,
                slidesToShow: 1,
                prevArrow:false,
                nextArrow:false,
                asNavFor:'.single-properties-v1-slide-bottom',
            });
        }
        
        // -------------------------------------------------------------
        //  single properties slide bottom
        // -------------------------------------------------------------
        if ($.fn.slick) {
            $('.single-properties-v1-slide-bottom').slick({
                // centerMode: true,
                centerPadding: '60px',
                autoplay:true,
                cssEase: 'linear',
                speed:400,
                asNavFor:'.single-properties-v1-slide',
                slidesToShow: 5,
                prevArrow: '<div class="slick--prev"><i class="zmdi zmdi-chevron-left"></i></div>',
                nextArrow: '<div class="slick--next"><i class="zmdi zmdi-chevron-right"></i></div>',
                responsive: [
                    {
                      breakpoint: 600,
                      settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                      }
                    },
                    {
                      breakpoint: 480,
                      settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                      }
                    }
                  ]
            });
        }   

        // -------------------------------------------------------------
        //  single properties v2 top slide
        // -------------------------------------------------------------
        if ($.fn.slick) {
            $('.single-properties-v2-slide').slick({
                // centerMode: true,
                centerPadding: '60px',
                autoplay:true,
                cssEase: 'linear',
                speed:400,
                slidesToShow: 1,
                prevArrow:false,
                nextArrow:false,
                asNavFor:'.single-properties-v2-slide-bottom',
            });
        }
        
        // -------------------------------------------------------------
        //  single properties v2 slide bottom
        // -------------------------------------------------------------
        if ($.fn.slick) {
            $('.single-properties-v2-slide-bottom').slick({
                // centerMode: true,
                centerPadding: '60px',
                autoplay:true,
                cssEase: 'linear',
                speed:400,
                asNavFor:'.single-properties-v2-slide',
                slidesToShow: 6,
                vertical: true,
                verticalSwiping: true,
                prevArrow: '<div class="slick--prev"><i class="zmdi zmdi-chevron-up"></i></div>',
                nextArrow: '<div class="slick--next"><i class="zmdi zmdi-chevron-down"></i></div>',
                responsive: [
                    {
                      breakpoint: 600,
                      settings: {
                        slidesToShow: 3,
                        vertical: true,
                        verticalSwiping: true,
                        slidesToScroll: 3
                      }
                    },
                    {
                      breakpoint: 480,
                      settings: {
                        slidesToShow: 2,
                        vertical: true,
                        verticalSwiping: true,
                        slidesToScroll: 3
                      }
                    }
                  ]
            });
        }        
        // -------------------------------------------------------------
        //  home2 testimonial slider bottom
        // -------------------------------------------------------------
        if ($.fn.slick) {
            $('.home2-testimonial-slide-bottom').slick({
                // centerMode: true,
                centerPadding: '60px',
                autoplay:true,
                cssEase: 'linear',
                speed:400,
                asNavFor:'.home2-testimonial-slide',
                slidesToShow: 2,
                prevArrow: '<div class="slick--prev"><i class="zmdi zmdi-long-arrow-left"></i></div>',
                nextArrow: '<div class="slick--next"><i class="zmdi zmdi-long-arrow-right"></i></div>',
                responsive: [
                    {
                      breakpoint: 600,
                      settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                      }
                    },
                    {
                      breakpoint: 480,
                      settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                      }
                    }
                  ]
            });
        }
        

        // -------------------------------------------------------------
        //  home3 properties slider top
        // -------------------------------------------------------------
        if ($.fn.slick) {
            $('.home3-properties-slide').slick({
                autoplay:false,
                cssEase: 'linear',
                speed:2000,
                slidesToShow: 2,
                prevArrow: '<div class="slick--prev"><i class="zmdi zmdi-long-arrow-left"></i></div>',
                nextArrow: '<div class="slick--next"><i class="zmdi zmdi-long-arrow-right"></i></div>',
                asNavFor:'.home3-properties-slide-bottom',
                  responsive: [
                    {
                      breakpoint: 600,
                      settings: {
                        slidesToShow: 1,
                        slidesToScroll: 2
                      }
                    },
                    {
                      breakpoint: 480,
                      settings: {
                        slidesToShow: 1,
                        slidesToScroll: 2
                      }
                    }
                  ]
            });
        }
        
        // -------------------------------------------------------------
        //  home3 properties slider bottom
        // -------------------------------------------------------------
        if ($.fn.slick) {
            $('.home3-properties-slide-bottom').slick({
                autoplay:false,
                cssEase: 'linear',
                speed:2000,
                asNavFor:'.home3-properties-slide',
                slidesToShow: 2,
                prevArrow:false,
                nextArrow:false,
                responsive: [
                    {
                      breakpoint: 600,
                      settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                      }
                    },
                    {
                      breakpoint: 480,
                      settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                      }
                    }
                  ]
            });
        }
                
        // -------------------------------------------------------------
        // home 3 featured area owl carousel active area
        // -------------------------------------------------------------
        if ($.fn.owlCarousel) {  
            $('.home3-featured-slide, .home3-latest-news-slide').owlCarousel({
                loop: true,
                items: 3,
                autoplay: false,
                margin:30,
                dots:true,
                nav: true,
                autoplayTimeout:3000,
                navText: ['<i class="zmdi zmdi-long-arrow-left"></i>', '<i class="zmdi zmdi-long-arrow-right"></i>'],
                responsive: {
                  0: {
                    items: 1
                  },
                  280: {
                    items: 1
                  },
                  320: {
                    items: 1
                  },
                  640: {
                    items: 2
                  },
                  768: {
                    items: 2
                  },
                  960: {
                    items: 3
                  },
                  1200: {
                    items: 3
                  }
                }
            });
        }      
             
        // -------------------------------------------------------------
        // home 3 agent area owl carousel active area
        // -------------------------------------------------------------
        if ($.fn.owlCarousel) {  
            $('.home3-agent-slide').owlCarousel({
                loop: true,
                items: 4,
                autoplay: false,
                margin:30,
                dots:true,
                nav: true,
                autoplayTimeout:3000,
                navText: ['<i class="zmdi zmdi-long-arrow-left"></i>', '<i class="zmdi zmdi-long-arrow-right"></i>'],
                responsive: {
                  0: {
                    items: 1
                  },
                  280: {
                    items: 1
                  },
                  320: {
                    items: 1
                  },
                  640: {
                    items: 3
                  },
                  960: {
                    items: 3
                  },
                  1200: {
                    items: 4
                  }
                }
            });
        }      
             
            
        // -------------------------------------------------------------
        // home 3 testimonial area owl carousel active area
        // -------------------------------------------------------------
        if ($.fn.owlCarousel) {  
            $('.home3-testimonial-slide').owlCarousel({
                loop: true,
                items: 2,
                autoplay: false,
                margin:30,
                dots:true,
                nav: true,
                autoplayTimeout:3000,
                navText: ['<i class="zmdi zmdi-long-arrow-left"></i>', '<i class="zmdi zmdi-long-arrow-right"></i>'],
                responsive: {
                  0: {
                    items: 1
                  },
                  280: {
                    items: 1
                  },
                  320: {
                    items: 1
                  },
                  640: {
                    items: 2
                  },
                  960: {
                    items: 2
                  },
                  1200: {
                    items: 2
                  }
                }
            });
        }      
             
                                
        // -------------------------------------------------------------
        // home3 logo slide owl carousel active area
        // -------------------------------------------------------------
        if ($.fn.owlCarousel) {  
            $('.logo-slides').owlCarousel({
                loop: true,
                items: 6,
                autoplay: false,
                margin:30,
                dots:false,
                nav: true,
                autoplayTimeout:3000,
                navText: ['<i class="zmdi zmdi-long-arrow-left"></i>', '<i class="zmdi zmdi-long-arrow-right"></i>'],
                responsive: {
                  0: {
                    items: 2
                  },
                  280: {
                    items: 2
                  },
                  320: {
                    items: 2
                  },
                  640: {
                    items: 4
                  },
                  960: {
                    items: 6
                  },
                  1200: {
                    items: 6
                  }
                }
            });
        }  


        // -------------------------------------------------------------
        // masonry active 
        // -------------------------------------------------------------
        if ($.fn.masonry) {
        $('.blog-masonry-active, .properties-masonry-active').masonry({
                // options...
                itemSelector: '.featured-single-slide.blog-masonry, .home2-single-properties.ctasas',
                columnWidth: '.featured-single-slide.blog-masonry, .home2-single-properties.ctasas',
            });
        }

        // -------------------------------------------------------------
        // masonry active 
        // -------------------------------------------------------------
        if ($.fn.masonry) {
        $('.properties-masonry-active.cta').masonry({
                // options...
                gutter: 30,
                itemSelector: '.home2-single-properties.ctas12.ctasas',
                columnWidth: '.home2-single-properties.ctas12.ctasas'
            });
        }

      });

  
    /*====  Window Load Function =====*/
    jQuery(window).load(function(){

        /*====  preloader js Start =====*/
        $(".home-preloder").fadeOut(3000);
        /*====  animation js Start =====*/
        new WOW().init(); 

        
    });
    
}(jQuery));	