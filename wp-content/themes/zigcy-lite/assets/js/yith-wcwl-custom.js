jQuery( document ).ready( function($){
    "use strict";

var zigcy_lite_update_wishlist_count = function() {
    $.ajax({
        beforeSend: function () {

        },
        complete  : function () {

        },
        data      : {
            action: 'zigcy_lite_update_wishlist_count'
        },
        success   : function (data) {
            //do something
            $('.sm-wishlist-wrap .wishlist-counter').html(data);
        },

        url: yith_wcwl_l10n.ajax_url
    });
};

$('body').on( 'added_to_wishlist removed_from_wishlist', zigcy_lite_update_wishlist_count );

var zigcy_lite_update_wishlist_products = function() {
        $.ajax({
            beforeSend: function () {
                $('#sm-wishlist-loader').slideDown('slow');
            },
            complete  : function () {
                
            },
            data      : {
                action: 'zigcy_lite_update_wishlist_products'
            },
            success   : function (data) {
                //console.log( data );
                //do something
                $('#sm-wishlist-loader').slideUp('slow');
                $('.sm-wishlist-wrap .wishlist-dropdown.product_list_widget').replaceWith(data);

            },

            url: yith_wcwl_l10n.ajax_url
        });
    };

    $('body').on( 'added_to_wishlist removed_from_wishlist', zigcy_lite_update_wishlist_products );



} );