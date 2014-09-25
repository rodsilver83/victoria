$(document).ready(function(){
  var jumboHeight = $('.jumbotron').outerHeight();
	function parallax(){
	    var scrolled = $(window).scrollTop();
	    $('.storefront-bg').css('height', (jumboHeight-scrolled) + 'px');
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
});