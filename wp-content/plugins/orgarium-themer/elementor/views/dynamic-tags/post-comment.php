<?php
   if (!defined('ABSPATH')){ exit; }

   global $orgarium_post, $post;

   if(!$orgarium_post){ return; }
   $post = $orgarium_post;
?>
   
<div class="post-comment">
   <?php
      if(comments_open($orgarium_post->ID)){
         comments_template();
      }else{
         if(\Elementor\Plugin::$instance->editor->is_edit_mode()){
            echo '<div class="alert alert-info">' . esc_html__('This Post Disabled Comment', 'orgarium-themer') . '</div>';
         }
      }
   ?>
</div>      

