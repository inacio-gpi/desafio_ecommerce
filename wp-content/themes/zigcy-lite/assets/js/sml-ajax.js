jQuery(function ($) {
    "use strict";

	$('.store-mart-lite-prod-tab-cat-wrap').each(function () {
	        $(this).find('.pwtb-catname-wrapper').children('a:first').addClass('pwtb-active');
	});
	
     $('.pwtb-catname-wrapper .pwtb-catname').on('click', function (e) {
        e.preventDefault();
        var ajaxURL = ajax_object.ajax_url;
        
        $.dis = $(this);
        var attrID              = $.dis.attr('data-id');
        var attrDataSlug        = $.dis.attr('data-slug');
        var attrCol             = $.dis.attr('data-col');


        $.dis.addClass('pwtb-active').siblings().removeClass('pwtb-active');

        if($.dis.parents('.pwtb-catname-wrapper').siblings('.pwtb-catposts-wrapper').find('.'+attrDataSlug).length > 0){
            $.dis.parents('.pwtb-catname-wrapper').siblings('.pwtb-catposts-wrapper').find('.sm-woo-tab-cat-wrapper').hide();
            $.dis.parents('.pwtb-catname-wrapper').siblings('.pwtb-catposts-wrapper').find('.'+attrDataSlug).show();

        } else {
          $.dis.parents('.pwtb-catname-wrapper').siblings('.pwtb-catposts-wrapper').find('.ajax-loader').addClass('enabled');
          $.ajax({
                url : ajaxURL,
                type: 'post',
                data:{
                      action : 'zigcy_woo_tab_ajax',
                      category_id:  attrID,
                      category_slug: attrDataSlug,
                  },
               
               success: function(res){ 
                    
                      $.dis.parents('.pwtb-catname-wrapper').siblings('.pwtb-catposts-wrapper').append(res);
                      $.dis.parents('.pwtb-catname-wrapper').siblings('.pwtb-catposts-wrapper').find('.sm-woo-tab-cat-wrapper').hide();
                      $.dis.parents('.pwtb-catname-wrapper').siblings('.pwtb-catposts-wrapper').find('.'+attrDataSlug).show();
                      $('.ajax-loader').removeClass('enabled');
                    
                },
          });
      }
       
    });

});