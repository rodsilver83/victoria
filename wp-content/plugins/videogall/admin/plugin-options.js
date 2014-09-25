/* == Theme Options JQuery == */

jQuery(document).ready(function($) {
    $(".font-sample").each(function() {
        $(this).css("font-family",$("#" + $(this).attr("id").replace("_sample","")).val());
    });
    $(".image-sample").each(function() {
        if($("#" + $(this).attr("id").replace("_sample","")).val() != "")
            $(this).html('<img src="' + $("#" + $(this).attr("id").replace("_sample","")).val() + '"/>');
    });

    if(getCookie("currtab") != "" && getCookie("currtab") != null) {
	$('.tab').removeClass('current-tab');
	var currtab = getCookie("currtab");
	$('#' + currtab).addClass('current-tab');
	var currsection = currtab.replace('tab','section');
	$('.section').hide();
	$('#' + currsection).show();
    }

    $('.tab').click(function() {
        var tabid = $(this).attr("id");
        var currtabid = $(".current-tab").attr("id");
        if(tabid != currtabid) {
            $(".settings-error").hide();
            $(".tab").removeClass("current-tab");
            $(this).addClass("current-tab");
            $(".section").hide();
            $('#' + tabid.replace("tab","section")).fadeIn(400);
        }
    });

    $('#settings-regenerate-form').submit(function() {
	$('#regen-loading').fadeIn(400);
	var url = $(this).attr("action");
	var data = {
	    action: 'regen_thumb'
	};
	jQuery.post(url, data, function() {
	    $('#regen-loading').fadeOut(200);
	});
	return false;
    });

    var formfieldID;
    $('.image_upload').click(function() {
        var btnId = $(this).attr("id");
        formfieldID = btnId.replace("_upload","");
        tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
        return false;
    });
    window.send_to_editor = function(html) {
        imgurl = $('img',html).attr('src');
        $('#' + formfieldID).val(imgurl);
        tb_remove();
    }

    $('.multi-select').change(function() {
        $id = $(this).attr("id");
        var elem = document.getElementById($id);
        var list = "";
        var i;
        for(i=0;i<elem.length;i++) {
            if(elem[i].selected) {
                if(elem[i].value == "0") {
                    list = "0";
                    break;
                } else {
                    list = list + elem[i].value + ",";
                }
            }
        }
        $("#" + $id.replace("_select","")).val(list);
    });

    $(".image-select").click(function() {
        $id = $(this).attr("id");
        $classes = $(this).attr("class").split(" ");
        $elem = $classes[1].replace("select","value");
        if(!$(this).hasClass("selected")) {
            $("." + $classes[1] + ".selected").removeClass("selected");
            $(this).addClass("selected");
            $("#" + $elem).val($id);
        }
    });

    $(".font-picker").change(function() {
        $id = $(this).attr("id");
        $("#" + $id + "_sample").css("font-family",$(this).val());
    });

    $('input[type="submit"]').click(function() {
        var currentTabId = $('.current-tab').attr("id");
        setCookie("currtab",currentTabId,3);
    });

    $('.edit-video-submit').click(function() {
	var classes = $(this).attr('class').split(' ');
	var id = classes[3].replace('edit-video-submit-','');
	if($.trim($('#edit-video-url-' + id).val()) == "") {
	    $('#edit-video-url-' + id).addClass("form-error");
	    $('#edit-id').val('');
	    return false;
	} else {
	    $('#edit-video-url-' + id).removeClass("form-error");
	    $('#edit-video-url-' + id).addClass("noerror");
	    $('#edit-id').val(id);
	    return true;
	}
    });

    $("#update-category-submit").submit(function() {
	var catname = $.trim($("#update-category-name").val());
	if(catname == "") {
	    $("#update-category-name").addClass("form-error");
	    return false;
	} else {
	    $("#update-category-name").removeClass("form-error");
	    $("#update-category-name").addClass("noerror");
	    return true;
	}
    });

    $("#update-video-category").change(function() {
	if($(this).val() != "0") {
	    $("#update-cat-section").show();
	} else {
	    $("#update-cat-section").hide();
	}
	$("#update-category-name").val("");
    });

    $(".edit-video").hover(function() {
	$(this).children(".edit-links").fadeIn(300);
    }, function() {
	$(this).children(".edit-links").fadeOut(300);
    });

    $(".edit-links a").click(function() {
	var id, editid;
	if($(this).hasClass("edit")) {
	    id = $(this).attr("id").replace("edit-","");
	    editid = $(this).attr("id").replace("edit-","edit-video-form-");
	    $("#" + editid).fadeIn(300);
	    $('#edit-id').val(id);
	    $('#delete-id').val("");
	}
	return false;
    });

    $(".delete").click(function() {
	var deleteid = $(this).attr("id").replace("delete-","");
	$('#edit-id').val("");
	$('#delete-id').val(deleteid);
    });

    $('.edit-close').click(function() {
	$('#edit-id').val('');
	$('.edit-video-form').fadeOut(300);
    });
});

function setCookie(name,value,secs) {
    if(secs) {
        var date = new Date();
        date.setTime(date.getTime()+(secs*1000));
        var expires = "; expires="+date.toGMTString();
    }
    else var expires = "";
    document.cookie = name+"="+value+expires+"; path=/";
}

function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}