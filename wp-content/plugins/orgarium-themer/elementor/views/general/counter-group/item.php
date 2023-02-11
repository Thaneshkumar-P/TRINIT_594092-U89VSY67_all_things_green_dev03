<?php 
	use Elementor\Icons_Manager;
		
	$has_icon =! empty($item['selected_icon']['value']);
	$style = $settings['style'];
?>

<div class="counter-item milestone-block elementor-repeater-item-<?php echo $item['_id'] ?><?php echo ($item['active']=='yes' ? ' active' : '') ?>">
	<div class="counter-content">

		<?php 
			if($style == 'style-1'){ 
	
				if($has_icon){ 
					echo '<div class="milestone-icon">';
						Icons_Manager::render_icon($item['selected_icon'], [ 'aria-hidden' => 'true' ]);
					echo '</div>';
				}
			
				echo '<div class="milestone-content">';
					echo '<div class="milestone-number-inner">';
                  echo !empty($item['prefix']) ? '<span class="symbol before">' . $item['prefix'] . '</span>' : ''; 
                  	echo '<span class="milestone-number">' . esc_attr($item['number']) . '</span>';
                  echo !empty($item['suffix']) ? '<span class="symbol after">' . $item['suffix'] . '</span>' : '';
               echo '</div>';

					if($item['title']){ 
						echo '<h3 class="title">' . $item['title'] . '</h3>';
					}
				echo '</div>';
			}
		?>

	</div>  	
	<?php
		if($has_icon){ 
			echo '<span class="overlay-icon">';
				Icons_Manager::render_icon($item['selected_icon'], [ 'aria-hidden' => 'true' ]);
			echo '</span>';
		}
	?>
</div>