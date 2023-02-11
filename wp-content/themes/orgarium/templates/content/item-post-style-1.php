<?php 
   global $post;

   $thumbnail = (isset($thumbnail_size) && $thumbnail_size) ? $thumbnail_size : 'post-thumbnail';
   $excerpt_words = (isset($excerpt_words) && $excerpt_words) ? $excerpt_words : '0';

   $desc = orgarium_limit_words($excerpt_words, get_the_excerpt(), '');

   $meta_classes = 'entry-meta';
   if(empty(get_the_date())){
      $meta_classes = 'entry-meta schedule-date';
   }
   $content_classes = 'entry-content';
   $content_classes .= has_post_thumbnail() ? ' has-thumbnail' : ' has-no-thumbnail';
?>

   <article id="post-<?php echo esc_attr(get_the_ID()); ?>" <?php post_class('post post-style-1'); ?>>
      
      <?php if(has_post_thumbnail()){ ?>
         <div class="post-thumbnail">
            <a href="<?php echo esc_url( get_permalink() ) ?>">
               <?php the_post_thumbnail( $thumbnail, array( 'alt' => get_the_title() ) ); ?>
            </a>
            <?php if( get_the_date() ){ ?>
               <div class="entry-date">
                  <span class="date"><?php echo esc_html( get_the_date('d')) ?></span>
                  <span class="month"><?php echo esc_html( get_the_date('M')) ?></span>
               </div>
            <?php } ?>
         </div>   
      <?php } ?>   

      <div class="<?php echo esc_attr($content_classes) ?>">
         <div class="content-inner">
            <?php
               if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) ){
                  echo '<span class="cat-links">' . get_the_category_list( _x( ", ", "Used between list items, there is a space after the comma.", "orgarium" ) ) . '</span>';
               }
            ?>
            <h3 class="entry-title"><a href="<?php echo esc_url( get_permalink() ) ?>" rel="bookmark"><?php the_title() ?></a></h3>
            <div class="<?php echo esc_attr($meta_classes) ?>">
               <?php orgarium_posted_on(); ?>
            </div> 
         </div>
         <div class="read-more">
            <a class="btn-read-more" href="<?php echo esc_url( get_permalink() ) ?>"><?php echo esc_html__('Read more', 'orgarium'); ?><i class="fa-regular fa-circle-right"></i></a>
         </div>
      </div>
   </article>   

  