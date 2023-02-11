<?php
   if (!defined('ABSPATH')) {
      exit; 
   }
   global $orgarium_post;
   if (!$orgarium_post){
      return;
   }
?>

<?php 
   $thumbnail_size = $settings['orgarium_image_size'];

   if(has_post_thumbnail($orgarium_post)){
      echo get_the_post_thumbnail($orgarium_post, $thumbnail_size);
   }
?>

