/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

jQuery(document).ready(function($) {

//    var solicitud = jQuery( 'div#form-solicitud' );
//    
//    if ( solicitud.length > 0 ){
//        
//        var pages = jQuery( 'a.page-1, a.page-2, a.page-3' );
//        
//        if ( pages.length > 0 ){
//            var pages_of = jQuery( 'dl' );
//            var name = 'dl.';
//            pages.on( 'click' , function(){
//                var _class = jQuery( this ).attr( 'class' );
//                pages_of.hide();
//                jQuery( name + _class ).show();
//            } );
//        }
//        
//    }


    var root = $("#scrollable").scrollable({
            circular: true,
            items: ".items > li"
             
        }).autoscroll({
            autoplay: true,
            interval: 10000
            
        });



});