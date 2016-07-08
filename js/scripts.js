// Can also be used with $(document).ready()
// $(window).load(function() {
//   $('.flexslider').flexslider({
//     animation: "slide",
//     directionNav: false,
//     slideshow: true,
//   });
// });
$(window).load(function() {
$('#slider').nivoSlider();
});

var slideIndex = 0;
carousel();

// Slider testimonios footer
function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > x.length) {slideIndex = 1}
    x[slideIndex-1].style.display = "block";
    setTimeout(carousel, 2000);
}

// slick slider
$(document).ready(function() {
    $('.center').on('init', function(e, slick) {
        var $firstAnimatingElements = $('.jumbo').find('[data-animation]');
        doAnimations($firstAnimatingElements);
    });
    $('.center').on('beforeChange', function(e, slick, currentSlide, nextSlide) {
        var $animatingElements = $('div.image-content[data-slick-index="' + nextSlide + '"]').find('[data-animation]');
        doAnimations($animatingElements);
    });
    $('.center').slick({
       autoplay: true,
       autoplaySpeed: 5000,
       dots: true,
       fade: true
    });
    function doAnimations(elements) {
        var animationEndEvents = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
        elements.each(function() {
            var $this = $(this);
            var $animationDelay = $this.data('delay');
            var $animationType = 'animated ' + $this.data('animation');
            $this.css({
                'animation-delay': $animationDelay,
                '-webkit-animation-delay': $animationDelay
            });
            $this.addClass($animationType).one(animationEndEvents, function() {
                $this.removeClass($animationType);
            });
        });
    }
});

/*
* Fixed menu
*/

 jQuery("document").ready(function($){

     var nav = $('.site-header');
     var content = $('.site-branding');

     $(window).scroll(function (){
         if ($(this).scrollTop() > 1) {
             nav.addClass("active");
             content.addClass("offset");

         } else {
             nav.removeClass("active");
             content.removeClass("offset");
         }
         if ($(this).scrollTop() > 300){
             nav.addClass("active_more");
         } else {
             nav.removeClass("active_more");
         }

     });
 });
