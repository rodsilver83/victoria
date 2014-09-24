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
      var scrollTop = 23;
      if($(window).scrollTop() >= scrollTop){
        $(".title-area").removeClass("hidden");
      }else{
        $(".title-area").addClass("hidden"); 
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