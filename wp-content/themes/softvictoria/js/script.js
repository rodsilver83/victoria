/*! 
  Script by http://jcgaal.com 
*/
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
  
  //Main Index Menu
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
        $("#search_submit").addClass("search-lg");
        $("#search_submit").removeClass("search-sm");
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
        $("#search_submit").removeClass("search-lg");
        $("#search_submit").addClass("search-sm");
      }
    });
  });
  
  //The Search Bar
  var s;
  ShowHideWidget = {
      
    settings : {
     clickHere : document.getElementById('search'),
     searchbar : document.getElementById('searchbar')
    },
    
    init : function() {
      //kick things off
      s = this.settings;
      this.bindUIActions();
    },
    
    bindUIActions : function() {
      //Attach handler to the onclick
      /*
      s.clickHere.onclick = function() {
          ShowHideWidget.toggleVisibility(s.searchbar);
          return false;
      };
      */
      ShowHideWidget.addEvent(s.clickHere, 'click', function() {    
          ShowHideWidget.toggleVisibility(s.searchbar);
      });
    },
    
    addEvent : function(element, evnt, funct) {
      //addEventListener is not supported in <= IE8
      if (element.attachEvent) {
          return element.attachEvent('on'+evnt, funct);
      } else {
        return element.addEventListener(evnt, funct, false);
      }
    },
        
    toggleVisibility : function(id) {
      if(id.style.display == 'block') {
        id.style.display = 'none';
      } else {
        id.style.display = 'block';
     };
    }
      
  };
  (function() {
      ShowHideWidget.init();
  })();


  //Scroll To #
  // $(function() {
  //     $('a[href*=#]:not([href=#])').click(function() {
  //       if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
  //         var target = $(this.hash);
  //         target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
  //         if (target.length) {
  //           $('html,body').animate({
  //             scrollTop: target.offset().top - 90
  //           }, 500);
  //           return false;
  //         }
  //       }
  //     });
  //   });
  
  //Scroller Sections
  function scrolling(id){
    var bodyRect = document.body.getBoundingClientRect(),
      elemRect = document.getElementById(id).getBoundingClientRect(),
      offset   = elemRect.top - bodyRect.top - 65;

    $("html, body").animate({
      scrollTop:offset}, 
      '500', 'swing', function() {});
  };

  $('#go_to_sections').on("click", function(){ scrolling("the_sections"); });
  $('#go_to_staff').on("click", function(){ scrolling("the-staff"); });
  $('#go_historia').on("click", function(){ scrolling("historia"); });
  $('#go_mision').on("click", function(){ scrolling("mision"); });
  $('#go_wedo').on("click", function(){ scrolling("what-do-we-do"); });
  $('#go_staff').on("click", function(){ scrolling("the-staff"); });
  $('#go_contact').on("click", function(){ scrolling("contact-section"); });


  //The Team Parallax
  
  //We define the ratio and offset for each team member
  var stellar_ratio   = [0.8];
  var stellar_offset  = [-100, -100, -100, -100, -100, -100];

  //We Count the number of members in the team and assign it to numItems
  var numItems = $('.grid-member').length;

  //We run our little for to insert the ratio and offsets
  for (numItems = 0; numItems < 10; numItems++) {
    //We provide a random value to the stellar_ratio and the stellar_offset
    the_ratio   = stellar_ratio[Math.floor(Math.random() * stellar_ratio.length)];
    the_offset  = stellar_offset[Math.floor(Math.random() * stellar_offset.length)];

    //We assign the random stellar_ratio to the grid-member class
    $('.grid-member').attr('data-stellar-ratio', the_ratio);
    $('.grid-member').attr('data-stellar-vertical-offset', the_offset);
    $('.grid-member').attr('data-stellar-offset-parent', 'true');
    //console.log("The members are " + numItems);
    //console.log("The ratio is " + the_ratio);
    numItems++;
  }
  //We initialize stellar.js after we assigned the ratios and offsets to the elements so errything works neato
  $(window).stellar();

});
