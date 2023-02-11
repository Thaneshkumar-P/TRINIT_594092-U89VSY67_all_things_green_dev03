<?php
   if (!defined('ABSPATH')) {
      exit; 
   }
   global $orgarium_post;
   if (!$orgarium_post){
      return;
   }
   ?>
   
   <div class="post-content">
         <?php 
            echo $orgarium_post->post_content;
         ?>
   </div>      

