<?php 
use Elementor\Icons_Manager;
	
$has_icon = ! empty( $item['selected_icon']['value']); 
$style = $settings['style'];
$avatar = (isset($item['testimonial_image']['url']) && $item['testimonial_image']['url']) ? $item['testimonial_image']['url'] : '';
?>
<div class="testimonial-item <?php echo esc_attr($style) ?> elementor-repeater-item-<?php echo $item['_id'] ?>">
	
		<?php if( $style == 'style-1'){ ?>

         <div class="testimonial-content">
            <div class="testimonial-image">
               <img <?php echo $this->orgarium_get_image_size($avatar) ?> src="<?php echo esc_url($avatar) ?>" alt="<?php echo $item['testimonial_name']; ?>" />
            </div>
            <div class="testimonial-content-inner">
               <div class="testimonial-quote"><span>“</span><?php echo $item['testimonial_content']; ?></div>
               <div class="testimonial-info">
                  <span class="icon-quote"><i class="fa-solid fa-quote-right"></i></span>
                  <span class="testimonial-name"><?php echo $item['testimonial_name']; ?></span>
                  <span class="testimonial-job"><?php echo $item['testimonial_job']; ?></span>
               </div>
            </div>
         </div>   

		<?php } ?>	

		<?php if( $style == 'style-2'){ ?>
			<div class="testimonial-item-content">
				<div class="testimonial-image">
               <img <?php echo $this->orgarium_get_image_size($avatar) ?> src="<?php echo esc_url($avatar) ?>" alt="<?php echo $item['testimonial_name']; ?>" />
            </div>
	        	<div class="testimonial-content">
	            <div class="testimonial-quote">
	            	<span>“</span>
		            <?php echo $item['testimonial_content']; ?>
		         </div>
		         <div class="testimonial-icon"><span><i class="fa-solid fa-quote-right"></i></span></div>
	            <div class="testimonial-information">
	               <span class="testimonial-name"><?php echo $item['testimonial_name']; ?></span>
	               <span class="testimonial-job"><?php echo $item['testimonial_job']; ?></span>
	            </div>
	         </div>
	      </div>   	
		<?php } ?>	

		<?php if( $style == 'style-3'){ ?>
			<div class="testimonial-item-content">
	         <div class="testimonial-content">
	            <?php echo $item['testimonial_content']; ?>
	            <div class="testimonial-information">
	            	<span class="icon-quote fa-solid fa-quote-right"></span>
	               <span class="testimonial-name"><?php echo $item['testimonial_name']; ?></span>
	               <span class="testimonial-job"><?php echo $item['testimonial_job']; ?></span>
	            </div>
	         </div>
	         <div class="testimonial-image">
               <img <?php echo $this->orgarium_get_image_size($avatar) ?> src="<?php echo esc_url($avatar) ?>" alt="<?php echo $item['testimonial_name']; ?>" />
            </div>
	         
	      </div>   
		<?php } ?>

		<?php if( $style == 'style-4'){ 
			$rating = $item['testimonial_rating'];
		?>
			<div class="testimonial-item-content">
				<div class="testimonial-top">
					<div class="testimonial-image">
	               <img <?php echo $this->orgarium_get_image_size($avatar) ?> src="<?php echo esc_url($avatar) ?>" alt="<?php echo $item['testimonial_name']; ?>" />
	            </div>
	            <div class="testimonial-stars">
	            	<span class="label"><?php echo esc_html__('Quality', 'orgarium-themer') ?></span>
	            	<span class="stars">
	            		<?php for ($i=0; $i < 5; $i++) { 
		         			echo '<i class="fas fa-star' . ($rating > $i ? ' active' : '') . '"></i>';
		         		} ?>
		         	</span>
	            </div>
	         </div>   
	         <div class="testimonial-content">
	            <?php echo $item['testimonial_content']; ?>
	            <div class="testimonial-information">
	            	<span class="icon-quote fa-solid fa-quote-right"></span>
	               <span class="testimonial-name"><?php echo $item['testimonial_name']; ?></span>
	               <span class="testimonial-job"><?php echo $item['testimonial_job']; ?></span>
	            </div>
	         </div>
	      </div>   
		<?php } ?>

</div>

