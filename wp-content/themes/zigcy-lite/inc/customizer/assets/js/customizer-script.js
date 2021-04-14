jQuery(document).ready(function ($) {

/**
*
* Script for image selected from radio option
* 
**/
$('.controls#store-mart-lite-sidebar-img-container li img').click(function(){
  $('.controls#store-mart-lite-sidebar-img-container li').each(function(){
    $(this).find('img').removeClass ('store-mart-lite-sidebar-radio-img-selected') ;
  });
  $(this).addClass ('store-mart-lite-sidebar-radio-img-selected') ;
});

$('.layout-thmub-section #store-mart-lite-sidebar-img-container li img').click(function(){
  $('.layout-thmub-section #store-mart-lite-sidebar-img-container li').each(function(){
    $(this).find('img').removeClass ('store-mart-lite-sidebar-radio-img-selected') ;
  });
  $(this).addClass ('store-mart-lite-sidebar-radio-img-selected') ;
});

$('#tm-img-container-meta li img').click(function(){
  $('#tm-img-container-meta li').each(function(){
    $(this).find('img').removeClass ('store-mart-lite-sidebar-radio-img-selected') ;
  });
  $(this).addClass ('store-mart-lite-sidebar-radio-img-selected') ;
});

  /**
* scroll home page sections on clicking related customizer sections
*/
$('body').on('click', '#sub-accordion-panel-zigcy_lite_home_setting .control-subsection .accordion-section-title', function(event) {
 var section_id = $(this).parent('.control-subsection').attr('id');
 scrollToSection( section_id );
});


function scrollToSection( section_id ){
 var preview_section_id = "plx_slider_promo_section";

 var $contents = jQuery('#customize-preview iframe').contents();

 switch ( section_id ) {

   case 'accordion-section-zigcy_lite_slider_promo_setting':
   preview_section_id = "plx_slider_promo_section";
   break;

   case 'accordion-section-zigcy_lite_pro_cat_setting':
   preview_section_id = "plx_prod_cat_section";
   break;

   case 'accordion-section-zigcy_lite_feat_prod_cat_setting':
   preview_section_id = "plx_feat_prod_cat_section";
   break;

   case 'accordion-section-zigcy_lite_cta_setting':
   preview_section_id = "plx_cta_section";
   break;

   case 'accordion-section-zigcy_lite_prod_cat_slider_setting':
   preview_section_id = "plx_pro_cat_slider_section";
   break;    

   case 'accordion-section-zigcy_lite_blog_setting':
   preview_section_id = "plx_blog_section";
   break;  

   case 'accordion-section-zigcy_lite_client_setting':
   preview_section_id = "plx_client_section";
   break;  

   case 'accordion-section-zigcy_lite_lat_prod_cat_setting':
   preview_section_id = "plx_lat_prod_cat_section";
   break;

   case 'accordion-section-zigcy_lite_prod_tab_cat_setting':
   preview_section_id = "plx_prod_tab_cat_section";
   break;     
 }

 if( $contents.find('#'+preview_section_id).length > 0 ){
   $contents.find("html, body").animate({
     scrollTop: $contents.find( "#" + preview_section_id ).offset().top - 82
   }, 500);
 }
}



function zigcy_lite_sections_order( container ){

  var sections = $('#sub-accordion-panel-zigcy_lite_home_setting').sortable('toArray');
  var s_ordered = [];
  $.each(sections, function( index, s_id ) {
    s_id = s_id.replace( "accordion-section-", "");
    s_ordered.push(s_id);
  });

  $.ajax({
    url: ZigcyLiteLoc.ajax_url,
    type: 'post',
    dataType: 'html',
    data: {
      'action': 'zigcy_lite_order_sections',
      'sections': s_ordered,
    }
  })
  .done( function( data ) {
    wp.customize.previewer.refresh();
  });

}

$('#sub-accordion-panel-zigcy_lite_home_setting').sortable({
  helper: 'clone',
  items: '> li.control-section:not(#accordion-section-zigcy_lite_slider_promo_setting)',
  cancel: 'li.ui-sortable-handle.open',
  delay: 150,
  update: function( event, ui ) {

    zigcy_lite_sections_order( $('#sub-accordion-panel-zigcy_lite_home_setting') );

  },

});

/** Select Multiple Categories **/
jQuery(document).ready(function($){
 $('.ex-cat-wrap input:checkbox').on('change', function (e) {
   e.preventDefault();
         var chkbox = $(this).parents('.ex-cat-wrap').find('input:checkbox');//$('#ex-cat-wrap input:checkbox');
         var id = '';
         
         $.each( chkbox, function () {
           var oid = $(this).val(); 

           if($(this).prop('checked')) {
             id += oid;
             id += ','; 
           }
         });
         
         $(this).parents('.ex-cat-wrap').next('input:hidden').val(id).change();
       });

});

/** Section background color picker **/
$(".customizer-bg-color-picker").spectrum({
    showAlpha: true,
    allowEmpty: true,
    showInput: true,
    preferredFormat: "rgb",
});


});