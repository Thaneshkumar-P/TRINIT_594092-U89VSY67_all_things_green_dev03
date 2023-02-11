<?php
   if (!defined('ABSPATH')){ exit; }

   global $orgarium_post;
   if( !$orgarium_post || $orgarium_post->post_type != 'product' ||  !$orgarium_post->post_excerpt ){ return; }
   
   $post_id = $orgarium_post->ID;
   $this->add_render_attribute('block', 'class', [ 'cf-item-social-share' ]);
?>

<div <?php echo $this->get_render_attribute_string( 'block' ) ?>>
   <?php wpcf_function()->template('include/social-share'); ?>
</div>