<?php
   if (!defined('ABSPATH')) {
      exit; 
   }
   global $orgarium_post;
   if (!$orgarium_post){
      return;
   }
   ?>
   
   <div class="post-date">
         <?php 
            if($settings['show_icon']){ 
               echo '<i class="far fa-calendar"></i>';
            }
            echo get_the_date( get_option('date_format'), $orgarium_post->ID);
         ?>
   </div>      

