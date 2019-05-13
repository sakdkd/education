$(function($) {

  "use strict";


/*=========================== scroll background ===========================*/

  $(window).scroll(function(){

    var wScroll = $(this).scrollTop();

    // Activate menu
    if (wScroll >50) {
      $('.navbar').addClass('active_sc');
    }
    else {
      $('.navbar').removeClass('active_sc');
    };
        
  });

  /*=========================== close scroll background ===========================*/

 $('.navbar-nav li.dropdown').hover(function() {
  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
}, function() {
  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
});



  /*=========================== preloader ===========================*/
  // Wait for window load
  $(window).on('load', function() {
     $(".se-pre-con").fadeOut("slow");;
  });

  /*=========================== preloader ===========================*/



   /*=========================== popup video ===========================*/
  // Gets the video src from the data-src on each button

    var $videoSrc;  
    $('.video-btn').on('click',function() {
        $videoSrc = $(this).data( "src" );
    });
    console.log($videoSrc);

      
      
    // when the modal is opened autoplay it  
    $('#myModal').on('shown.bs.modal', function (e) {
        
    // set the video src to autoplay and not to show related video. Youtube related video is like a box of chocolates... you never know what you're gonna get
    $("#video").attr('src',$videoSrc + "?rel=0&amp;showinfo=0&amp;modestbranding=1&amp;autoplay=1" ); 
    })
      
      
    // stop playing the youtube video when I close the modal
    $('#myModal').on('hide.bs.modal', function (e) {
        // a poor man's stop video
        $("#video").attr('src',$videoSrc); 
    }) 
  /*===========================close popup video ===========================*/


  /*=========================== case slider ===========================*/
   var owls = $(".schoools");
    owls.owlCarousel({

        autoplay: true,
        autoplayTimeout:5000,
        autoplayHoverPause:true,
        items: 8,
        loop: true,
        margin: 15,
        stagePadding: 0,
        dots:true,
        nav:false,


        merge: false,
        mergeFit: true,
        autoWidth: false,
        animateOut:'fadeOutRight',
        animateIn:'fadeInLeft',
    });

  /*=========================== case slider ===========================*/


   /*=========================== blog slider ===========================*/
   var owls = $("#blog_slider_owl");
    owls.owlCarousel({

        autoplay: false,
        autoplayTimeout:5000,
        autoplayHoverPause:true,
        items: 3,
        loop: true,
        center: false,
        margin: 0,
        stagePadding: 0,
        dots:true,
        nav:false,


        merge: false,
        mergeFit: true,
        autoWidth: false,
        animateOut:'fadeOutRight',
        animateIn:'fadeInLeft',
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
     
            },
            580: {
                items: 1,
     
            },
            768: {
                items: 2,
               
            },
            992: {
                items: 3,
                
                loop: true
            }
        },
    });

  /*=========================== blog slider ===========================*/


 /*=========================== popup image ===========================*/

//popup gallery
  $('.popup-gallery').magnificPopup({
      delegate: 'a',
      type: 'image',
      tLoading: 'Loading image #%curr%...',
      mainClass: 'mfp-img-mobile',
      gallery: {
          enabled: true,
          navigateByImgClick: true,
          preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
      }
  });
/*=========================== popup image ===========================*/


/*=========================== Pricing tabs===========================*/


// Price Table
  var monthly_price_table = $('#price_tables').find('.monthly');
  var yearly_price_table = $('#price_tables').find('.yearly');


  $('.switch-toggles').find('.monthly').addClass('active');
  $('#price_tables').find('.monthly').addClass('active');

  $('.switch-toggles').find('.monthly').on('click', function(){
    $(this).addClass('active');
    $(this).closest('.switch-toggles').removeClass('active');
    $(this).siblings().removeClass('active');
    monthly_price_table.addClass('active');
    yearly_price_table.removeClass('active');
  });

  $('.switch-toggles').find('.yearly').on('click', function(){
    $(this).addClass('active');
    $(this).closest('.switch-toggles').addClass('active');
    $(this).siblings().removeClass('active');
    yearly_price_table.addClass('active');
    monthly_price_table.removeClass('active');     
  });

/*=========================== Pricing tabs===========================*/

  

 /*=========================== isotop active ===========================*/


  // init Isotope
var $grid = $('.grid').isotope({
  itemSelector: '.grid-item',
  percentPosition: true,
  masonry: {
    // use outer width of grid-sizer for columnWidth
    columnWidth: 1
  }
});


  //// ISOTOPE TRIGGER
// filter items on button click
$('.filter-button-group').on( 'click', 'button', function() {
  var filterValue = $(this).attr('data-filter');
  $grid.isotope({ filter: filterValue });
});

// change is-checked class on buttons
$('.filter-button-group').each(function(i, buttonGroup) {
    var $buttonGroup = $(buttonGroup);
    $buttonGroup.on('click', 'button', function() {
        $buttonGroup.find('.is-checked').removeClass('is-checked');
        $(this).addClass('is-checked');
    });
});

          
/*=========================== isotop active ===========================*/


 /*=========================== pricing table home2 slider ===========================*/
   
   var swiper = new Swiper('.swiper-container.price', {
        pagination: {
          el: '.swiper-pagination',
          type: 'bullets',
          clickable: true,
        },
        // autoplay: {
        //     delay: 3000,
        // },
        speed: 1000,
        effect: 'coverflow',
        loop: true,
        centeredSlides: true,
        slidesPerView: 'auto',
        coverflowEffect: {
            rotate: 0,
            stretch: 100,
            depth: 180,
            modifier: 2,
            slideShadows : false,
        }
    });

  /*=========================== pricing table home2 slider ===========================*/

   /*=========================== testimonial slider home2 ===========================*/
   var owls = $("#testimonials_home2_owl");
    owls.owlCarousel({

        autoplay: false,
        autoplayTimeout:5000,
        autoplayHoverPause:true,
        items: 1,
        loop: true,
        center: false,
        margin: 0,
        stagePadding: 0,
        dots:true,
        nav:true,


        merge: false,
        mergeFit: true,
        autoWidth: false,
    });


  /*=========================== testimonial slider home2 ===========================*/


   /*=========================== blog tw0 slider ===========================*/
   var owls = $("#blog_slider_owl_2");
    owls.owlCarousel({

        autoplay: false,
        autoplayTimeout:5000,
        autoplayHoverPause:true,
        items: 3,
        loop: true,
        center: false,
        margin: 0,
        stagePadding: 0,
        dots:true,
        nav:false,


        merge: false,
        mergeFit: true,
        autoWidth: false,
        animateOut:'fadeOutRight',
        animateIn:'fadeInLeft',
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
     
            },
            580: {
                items: 1,
     
            },
            768: {
                items: 1,
               
            },
            992: {
                items: 2,
                
                loop: true
            }
        },
    });

  /*=========================== blog twp slider ===========================*/


  /*=========================== post slider single===========================*/
   var owls = $(".blog_single_owl");
    owls.owlCarousel({

        autoplay: false,
        autoplayTimeout:5000,
        autoplayHoverPause:true,
        items: 1,
        loop: true,
        center: false,
        margin: 30,
        stagePadding: 0,
        dots:false,
        nav:true,


        merge: false,
        mergeFit: true,
        autoWidth: false,

    });

  /*=========================== post slider single===========================*/

//  $(".mp3_players").musicPlayer({
//            elements: ['artwork', 'information', 'controls', 'progress', 'time', 'volume'], // ==> This will display in  the order it is inserted
//            //elements: [ 'controls' , 'information', 'artwork', 'progress', 'time', 'volume' ],
//            //controlElements: ['backward', 'play', 'forward', 'stop'],
//            //timeElements: ['current', 'duration'],
//            //timeSeparator: " : ", // ==> Only used if two elements in timeElements option
//            //infoElements: [  'title', 'artist' ],
//
//            //volume: 10,
//            //autoPlay: true,
//            //loop: true,
//
//        });

 // ------------------------------- AOS Animation 
        AOS.init({
          duration: 1000,
          mirror: true
        });

});

