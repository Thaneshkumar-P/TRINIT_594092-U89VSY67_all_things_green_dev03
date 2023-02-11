<?php
   $thumbnail = (isset($thumbnail_size) && $thumbnail_size) ? $thumbnail_size : 'large'; 
?>
<div class="post post-block-list">      
   <div class="post-content">
      <div class="post-thumbnail">
         <a class="link-image-content" href="<?php the_permalink(); ?>">
            <?php if ( has_post_thumbnail()) {
               the_post_thumbnail($thumbnail);
            }?>
         </a>
      </div>
      <div class="content-inner">
        <div class="entry-cat">
         <?php
            if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) ){
               echo '<span class="cat-links">' . get_the_category_list( _x( ", ", "Used between list items, there is a space after the comma.", "orgarium" ) ) . '</span>';
            }
         ?>
        </div>
         <h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
         <div class="entry-meta">
            <?php orgarium_posted_on(); ?>
         </div> 
      </div>    
   </div>   
</div>

  