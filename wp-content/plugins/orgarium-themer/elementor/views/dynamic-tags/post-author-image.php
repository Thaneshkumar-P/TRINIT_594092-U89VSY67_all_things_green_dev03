<?php
   if (!defined('ABSPATH')) {
      exit; 
   }
   global $orgarium_post;
   if (!$orgarium_post){
      return;
   }

   $author_id = get_post_field('post_author', $orgarium_post->ID);

   ?>
   <a href="<?php echo get_author_posts_url($author_id) ?>">
      <?php echo get_avatar( $author_id, 64); ?>
   </a>
 


