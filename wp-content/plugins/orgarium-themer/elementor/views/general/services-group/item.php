<?php 
	use Elementor\Icons_Manager;
  	use Elementor\Group_Control_Image_Size;
  	$image_id = $item['image']['id']; 
   $image_url = $item['image']['url'];
   $image_url_thumbnail = $item['image']['url'];
   if($image_id){
      $attach_url = Group_Control_Image_Size::get_attachment_image_src($image_id, 'image', $settings);
      if($attach_url){
         $image_url_thumbnail = $attach_url;
      }
   }
?>

<?php if($settings['style'] == 'style-1'): ?>
   <div class="service-item style-1">
      <div class="service-item-content">
			
			<?php if($item['image']['url']){ ?>
	      	<div class="service-image text-center">
	      		<img <?php echo $this->orgarium_get_image_size($item['image']['url']) ?> src="<?php echo esc_url($image_url_thumbnail) ?>" alt="<?php echo esc_html($item['title']) ?>" />  
	      	</div>
	   	<?php } ?>

	   	<div class="service-content">
	   		<div class="content-inner">
					<?php 
						if($item['title']){ 
							echo '<h3 class="title"><span>' . $item['title']  . '</span></h3>';
						} 
						if($item['desc']){ 
							echo '<div class="desc">' . $item['desc'] . '</div>';
						} 
					?>
				</div>
				<div class="service-link"><?php echo esc_html__('Read More', 'orgarium-themer') ?><i class="fa-regular fa-circle-right"></i></div>	
			</div>

			<?php echo $this->gva_render_link_overlay($item['link']) ?>
			
		</div>
	</div>
<?php endif; ?>	

<?php if($settings['style'] == 'style-2'): ?>
   <div class="service-item style-2">
      
      <?php if($item['image']['url']){ ?>
	      <div class="service-image text-center">
	      	<img <?php echo $this->orgarium_get_image_size($item['image']['url']) ?> src="<?php echo esc_url($image_url_thumbnail) ?>" alt="<?php echo esc_html($item['title']) ?>" />  
	      </div>
	   <?php } ?>

      <div class="service-content">
			<?php if($item['title']){ ?>
				<h3 class="title"><span><?php echo $item['title'] ?></span></h3>
			<?php } ?>
			<div class="arrow"><i class="fa-solid fa-arrow-right-long"></i></div>
		</div>
      <?php echo $this->gva_render_link_overlay($item['link']) ?>
	</div>
<?php endif; ?>	


<?php if($settings['style'] == 'style-3'): ?>
   <div class="service-item style-3">
      <div class="service-item-content">
      	
      	<?php if($item['image']['url']){ ?>
		      <div class="service-image">
	      		<img <?php echo $this->orgarium_get_image_size($item['image']['url']) ?> src="<?php echo esc_url($image_url_thumbnail) ?>" alt="<?php echo esc_html($item['title']) ?>" />  
					<?php echo $this->gva_render_link_overlay($item['link']) ?> 
		      </div>
		   <?php } ?>

		   <div class="service-content">
				<?php if($item['title']){ ?>
					<h3 class="title">
						<?php $this->gva_render_link_html($item['title'], $item['link']) ?>
					</h3>
				<?php } ?>

				<?php if($item['desc']){ ?>
					<div class="desc"><?php echo $item['desc'] ?></div>
				<?php } ?>

				<div class="read-more">
               <?php $this->gva_render_link_html(esc_html__('Read more', 'orgarium'), $item['link'], 'btn-inline btn-read-more'); ?>
               <?php $this->gva_render_link_html('<i class="las la-arrow-right"></i>', $item['link'], 'arrow-read-more'); ?>
            </div>
			</div>

		</div>
	</div>
<?php endif; ?>

<?php if($settings['style'] == 'style-4'): ?>
   <div class="service-item style-4">
      <div class="service-item-content">
		   <div class="service-content">
		   	<?php if($item['image']['url']){ ?>
			      <div class="service-image">
	      			<img <?php echo $this->orgarium_get_image_size($item['image']['url']) ?> src="<?php echo esc_url($image_url_thumbnail) ?>" alt="<?php echo esc_html($item['title']) ?>" />  
						<?php echo $this->gva_render_link_overlay($item['link']) ?> 
			      </div>
			   <?php } ?>

				<?php if($item['title']){ ?>
					<h3 class="title"><span><?php echo $item['title'] ?></span></h3>
				<?php } ?>

				<?php if($item['desc']){ ?>
					<div class="desc"><?php echo $item['desc'] ?></div>
				<?php } ?>

				<?php echo $this->gva_render_link_overlay($item['link']) ?> 
			</div>

		</div>
	</div>
<?php endif; ?>