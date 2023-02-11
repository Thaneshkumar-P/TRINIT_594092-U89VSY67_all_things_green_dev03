<?php
	if (!defined('ABSPATH')) {
		exit; 
	}
	global $orgarium_post;
	if (!$orgarium_post){
		return;
	}
	?>
	
	<div class="post-category">
		<?php 
			if($settings['show_icon']){ 
				echo '<i class="far fa-folder-open"></i>';
			}
			echo '<span>' . get_the_category_list( ", ", '', $orgarium_post->ID ) . '</span>';
		?>
	</div>      

