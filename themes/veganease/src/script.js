  jQuery(document).ready(function(){
    jQuery('.search-icon').click(function() {
    jQuery('.nav-search-form').toggle("show");
    jQuery('.close-btn').show();
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

jQuery('.click-more-details').click(function() {
  jQuery('.enhance-wellness-journey__vegan-meal-container').css('opacity', '1');
  jQuery('.click-more-details').hide();
});

jQuery('.more-info').click(function() {
  jQuery('.coaching-services__products').css('opacity', '1');
  jQuery('.more-info').hide();
});

jQuery('.newsletter-popup .close-btn').click(function() {
  jQuery('.newsletter-popup').hide();
});

jQuery('.emaillist').prepend('<h1 class="join-newsletter-title">Subscribe to stay updated!</h1>');

jQuery(window).load(function() {
  setTimeout(function() {
    jQuery('.overlay-newsletter').addClass('active');
  }, 4000);
});

jQuery('.join-newsletter-title').click(function() {
  jQuery('#email-subscribers-form-1').fadeOut();
})
