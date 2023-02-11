<?php 
	use Elementor\Icons_Manager;
		
	$has_icon =! empty($item['selected_icon']['value']);
	$has_icon_image =! empty($item['selected_icon_image']['url']);
	$style = $settings['style'];
?>

<div class="icon-box-item elementor-repeater-item-<?php echo $item['_id'] ?><?php echo ($item['active']=='yes' ? ' active' : '') ?>">
	<div class="icon-box-content">

		<?php if( $style == 'style-1' || $style == 'style-2' || $style == 'style-3' || $style == 'style-4' || $style == 'style-5' || $style == 'style-6'){ ?>
			
			<?php 
				if($has_icon || $has_icon_image){ 
					echo '<div class="box-icon">';
							if($has_icon_image){
								echo '<img src="' . $item['selected_icon_image']['url'] . '" alt="' . esc_attr($item['title']) . '" />';
							}elseif($has_icon){
								Icons_Manager::render_icon($item['selected_icon'], [ 'aria-hidden' => 'true' ]); 
							}
							if($style == 'style-3' || $style == 'style-4'){
								echo '<div class="number">0' . $inumber . '</div>';
							}
					echo '</div>';
				} 
			?>

			<div class="content-inner">
				<?php 
					if($item['title']){ 
						echo '<h3 class="title">' . $item['title'] . '</h3>';
					}
					if( $item['desc'] && ($style == 'style-3' || $style == 'style-6') ){ 
						echo '<div class="desc">' .$item['desc'] . '</div>';
					} 
				?>
			</div>
			
			<?php 
				if($style == 'style-6'){
					echo '<span class="icon-overlay">';
						Icons_Manager::render_icon($item['selected_icon'], [ 'aria-hidden' => 'true' ]); 
					echo '</span>';
				} 
			?>

		<?php } ?>

	</div>  	
	<?php $this->gva_render_link_html('', $item['link'], 'link-overlay'); ?>
</div>