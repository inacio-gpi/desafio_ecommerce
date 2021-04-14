<?php
if(class_exists('WP_Customize_Control')):

/**
*
*/
//Sidebar options
class zigcy_lite_Customize_Radioimage_Control extends WP_Customize_Control {
	public function render_content() {
   if ( empty( $this->choices ) )
     return;
   $name = '_customize-radio-' . $this->id; ?>

   <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
   <span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
   <ul class="controls" id ="store-mart-lite-sidebar-img-container">
     <?php foreach ( $this->choices as $value => $label ) : ?>
       <?php
       $class = ($this->value() == $value)?'store-mart-lite-sidebar-radio-img-selected store-mart-lite-sidebar-radio-img-img':'store-mart-lite-sidebar-radio-img-img';
       ?>
       <li>
         <label>
           <input <?php $this->link(); ?>style = 'display:none' type="radio" value="<?php echo esc_attr( $value ); ?>" name="<?php echo esc_attr( $name ); ?>" <?php $this->link(); checked( $this->value(), $value ); ?> />
           <img src = '<?php echo esc_url( $label ); ?>' class = '<?php echo esc_attr($class); ?>'  />
         </label>
       </li>
     <?php endforeach; ?>
   </ul>
   <?php } }

   /** Coustomizer general Information text **/
   class Zigcy_lite_Customize_Info extends WP_Customize_Control {
    public function render_content() { ?>
    <div class="map-info-wrapper">
      <?php 
      if( $this->label ){ ?>
      <h4><?php echo esc_html( $this->label ); ?></h4>
      <?php }
      if( $this->description ){ ?>
      <div class="info-message">
        <?php echo wp_kses_post($this->description); ?>
      </div>
      <?php } ?>
    </div>    
    
    
    <?php        
  }
}

/** Section background color picker field **/
class Zigcy_lite_Bg_Color_Picker extends WP_Customize_Control {
  public function render_content() { ?>
  <span class="customize-control-title">
    <?php echo esc_html( $this->label ); ?>
  </span>
  <span class="desc clearfix">
    <?php echo esc_html( $this->description ); ?>
  </span>
  <input type='text' class="customizer-bg-color-picker" value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); ?> />
  <?php
}
}



/** Exclude Multiple Category Control **/
class zigcy_lite_Select_Mul_Cat_Control extends WP_Customize_Control {
 public function render_content() {
   $cats = $this->zigcy_lite_product_cats();
   $values = $this->value();
   
   if ( empty( $cats ) )
     return;
   ?>
   <label>
     <?php if ( ! empty( $this->label ) ) : ?>
       <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
     <?php endif;
     if ( ! empty( $this->description ) ) : ?>
     <span class="description customize-control-description"><?php echo esc_html($this->description); ?></span>
   <?php endif; ?>
   
   <?php if ( ! empty( $this->label ) ) : ?>
     <div class="ex-cat-wrap">
       <?php $cat_arr = explode(',', $values); array_pop($cat_arr); $count = 1; ?>
       
       <?php foreach($cats as $id => $label) : ?>
         <div class="chk-group <?php if($count++%2 == 0){echo "right";}else{echo "left";} ?>">
           <input id="ex-cat-<?php echo absint($id); ?>" type="checkbox" value="<?php echo absint($id); ?>" <?php if(in_array($id,$cat_arr)){ echo "checked"; }; ?> />
           <label for="ex-cat-<?php echo absint($id); ?>"><?php echo esc_html($label); ?></label>
         </div>
       <?php endforeach; ?>
     </div>
     <input type="hidden" <?php $this->input_attrs(); ?> value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); ?> />
   <?php endif; ?>    
 </label>
 <?php
}


/*---------------------------------------------------------------------------------------------------*/
/**
* function to retrieve default categories from posts
*/

public function zigcy_lite_product_cats() {
  $categories = get_categories(
    array(
      'hide_empty' => 0,
      'exclude' => 1,
      'taxonomy'=> 'product_cat'
    )
  );
  $category_list = array();
  foreach ($categories as $category) :
    $category_list[$category->term_id] = $category->name;
  endforeach;
  return $category_list;
}

}


endif;