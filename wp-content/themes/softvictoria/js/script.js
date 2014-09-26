$(document).ready(function(){
  var introHeight = $('.main-intro').outerHeight();
	function parallax(){
	    var scrolled = $(window).scrollTop();
	    $('.storefront-bg').css('height', (introHeight-scrolled) + 'px');
	}

  scrollParalax();

  function scrollParalax(){
    parallax();

    if ($(this).scrollTop() > 100) {
      $("#store-header").addClass("not-transparent");
      $("#store-name").removeClass("hidden");
      $("#header-account").addClass("header-white");
      $("#header-info-caret").addClass("header-white-caret");
      $("#shopping_cart_list").addClass("header-cart-bg");
    }
    else {
      $("#store-header").removeClass("not-transparent");
      $("#store-name").addClass("hidden");
      $("#header-account").removeClass("header-white");
      $("#header-info-caret").removeClass("header-white-caret");
      $("#shopping_cart_list").removeClass("header-cart-bg");
    }
  }


	$(window).scroll(function(e){
	    scrollParalax();
	});
  
  //Playing with the Main Index Menu
  $(function(){
    $(window).scroll(function(){
      var scrollTop = 22;
      if($(window).scrollTop() >= scrollTop){
        $(".title-area").removeClass("hidden");
        $("#main-menu").removeClass("transparent-h");
        $("#main-menu").addClass("non-transparent-h");
        $(".top-bar").addClass("p-menu-fixed");
        $(".the-menu-top").removeClass("bordered-menu");
        $(".the-menu-top").addClass("menu-color");
        $(".the-submenu-top").addClass("p-submenu-fixed");
        $(".the-submenu-item").addClass("submenu-colored");
        $(".the-submenu-item").removeClass("bordered-menu");
        $(".the-submenu-item").addClass("bordered-submenu");
        $(".the-search").addClass("search-blk");
        $(".the-search").removeClass("search-w");
        $(".social-btn").removeClass("social-sprite-w");
        $(".social-btn").addClass("social-sprite-blk");
        $(".top-social-btns").removeClass("justify-social");
      }else{
        $(".title-area").addClass("hidden");
        $("#main-menu").addClass("transparent-h");
        $("#main-menu").removeClass("non-transparent-h");
        $(".top-bar").removeClass("p-menu-fixed");
        $(".the-menu-top").addClass("bordered-menu");
        $(".the-menu-top").removeClass("menu-color");
        $(".the-submenu-top").removeClass("p-submenu-fixed");
        $(".the-submenu-item").removeClass("submenu-colored");
        $(".the-submenu-item").addClass("bordered-menu");
        $(".the-submenu-item").removeClass("bordered-submenu");
        $(".the-search").addClass("search-w");
        $(".the-search").removeClass("search-blk");
        $(".social-btn").removeClass("social-sprite-blk");
        $(".social-btn").addClass("social-sprite-w");
        $(".top-social-btns").addClass("justify-social");
      }
    });
  });


  $(function() {
      $('a[href*=#]:not([href=#])').click(function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {

          var target = $(this.hash);
          target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
          if (target.length) {
            $('html,body').animate({
              scrollTop: target.offset().top
            }, 500);
            return false;
          }
        }
      });
    });

});