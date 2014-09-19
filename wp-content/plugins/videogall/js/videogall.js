/* VideoGall JS */

jQuery(document).ready(function($) {
    /* Pagination */
    $('.videogall-page').click(function() {
/*		var Cpage = $('#videogall-current_page').val();
		var Npage = Cpage.substr(15);
	*/	
        var pageid = $(this).attr("id");
	
        var showitem = pageid.replace('page-','page-item-');
        $('.videogall-item').hide();
        $('.' + showitem).show();
        $('.' + showitem).css({display: "-moz-inline-stack", display: "inline-block"});
        $('.videogall-page').removeClass('current_page');
        $(this).addClass('current_page');
    });
	
	$('.videogall-prev, .videogall-next').click(function() {
		var Cpage 	= $('#videogall-current-page').val();
		var Cur 	= Cpage.substr(15);
		var opc		= $(this).attr('class');
		
		switch (opc){
			case 'videogall-prev': N = parseInt(Cur)-1; break;
			case 'videogall-next': N = parseInt(Cur)+1; break;
		};
		
		var Npage 	= 'videogall-page-' + N;
		var showitem = Npage.replace('page-','page-item-');

		if ($('.'+showitem).length) {
			$('.videogall-item').hide();
			$('.' + showitem).show();
			$('.' + showitem).css({display: "-moz-inline-stack", display: "inline-block"});
			$('#videogall-current-page').val(Npage);			
		}
	});

    $(".videogall-item").hover(function() {
        $currid = $(this).attr("id");
        $(".videogall-item[id!=" + $currid + "] .videogall-thumb").stop().fadeTo(300,0.7);
        $(this).children(".videogall-meta").fadeIn(300);
    }, function() {
        $(this).children(".videogall-meta").fadeOut(300);
        $(".videogall-thumb").stop().fadeTo(300,1.0);
    });

    $(".videogall-like").click(function() {
        var videoid = $(this).parent().attr("id").replace('videogall-meta-','');
        var url = $(this).attr("href");
        $curr_obj = $(this);
        var data = {
            action: 'update_likes',
            id: videoid
        };
        jQuery.post(url, data, function(response) {
            $curr_obj.html(response);
        });
        return false;
    });
});