  jQuery(document).ready(function(){
    jQuery('.search-icon').click(function() {
    jQuery('.nav-search-form').toggle("show");
    jQuery('.close-btn').show();
  });

  jQuery('.single-slick-container').slick({
    dots: true,
    arrows: false,
    infinite: false,
    slidesToShow: 1,
    autoplay: true,
    autoPlaySpeed: 2000,
    fade: true,
    cssEase: 'linear'
    // prevArrow: jQuery('.slick-prev'),
    // nextArrow: jQuery('.slick-next')
  });

jQuery('.close-btn').hide();
jQuery('.hamburger-menu').click(function() {
  jQuery('.menu-overlay-container').show();
  jQuery('.close-btn').show();
  jQuery('.mobile-navigation #primary-menu li').show();
  jQuery('.mobile-navigtaion .header-right-menu .login-btn').show();
 });

 jQuery('.close-btn').click(function() {
  jQuery('.menu-overlay-container').hide();
 });
});


