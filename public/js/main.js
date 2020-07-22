$(document).ready(function(){
    
    
    $(window).on('load', function() {
        $('.intro-page').fadeOut();
        $('.intro-page').delay(350).fadeOut('slow');
    });
    
    //   Autoslider NEWS
    var check = $('.slider .Active');
    if(check != null) {
          (function autoslider(){
       $('.slider .Active').each(function (){
           if (!$(this).is(':last-child')){
               $(this).delay(2000).slideUp(1000, function (){
                   $(this).removeClass('Active').next().addClass('Active').fadeIn();
                   autoslider();
               });
           }else{
               $(this).delay(2000).fadeOut(1000, function(){
                   $(this).removeClass('Active');
                   $('.slider div').eq(0).addClass('Active').slideDown();
                   autoslider();
               });
           }
       }); 
    }());
    };
    
    
    // plugins
    $("html").niceScroll();
    $(".modal").niceScroll();
    
       $('.owl-carousel').owlCarousel({
            loop:true,
            autoplay:true,
            margin:10,
            nav:true,
            responsive:{
                0:{
                    items:2
                },
                600:{
                    items:3
                },
                1000:{
                    items:6
                }
            }
        });

    
        $(".button").click(function(){
            var value = $(this).attr("data-filter");
          if (value == "all")
            {
                $(".filter").fadeIn("700");
            }
          else
            {
                $(".filter").not("."+value).hide();
                $(".filter").filter("."+value).fadeIn("700");
            }

            $("ul .button").click(function(){
                $(this).addClass('activee').siblings().removeClass('activee');
            })
        });
    
    // SOCIAL MEDIA
       $('.fa-angle-left').on('click', function (){
       
           $(this).parent('.icons').toggleClass('is-visible');       

           if( $(this).parent('.icons').hasClass('is-visible') )
           {
              $(this).parent('.icons').animate({

                  right: '-33px'

              }, 500);

           }else{

              $(this).parent('.icons').animate({

                  right: '0px'

              }, 500);

           }
       });
    
 new WOW().init();
    
});