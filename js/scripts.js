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

// scroll reveal
//sr.reveal('.hentry');
/*
* Fixed menu
*/

// jQuery("document").ready(function($){

//     var nav = $('.site-header-main');
//     var content = $('#content');

//     $(window).scroll(function (){
//         if ($(this).scrollTop() > 1) {
//             nav.addClass("active");
//             content.addClass("offset");

//         } else {
//             nav.removeClass("active");
//             content.removeClass("offset");
//         }
//         if ($(this).scrollTop() > 300){
//             nav.addClass("active_more");
//         } else {
//             nav.removeClass("active_more");
//         }

//     });
// });
