<div class="container">
	<div class="row">
		<div class="innerContentContainer">
			<div class="contentBannerContainer">
				<?php $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
				<img src="<?php echo $feat_image?>" alt="" class="img-responsive hidden-xs" />
                <img src="<?php echo get_field("mobile_banner", $post->ID); ?>" alt="" class="img-responsive hidden-sm hidden-md hidden-lg" />
                <?php echo get_field("banner_text", $post->ID) ?>
			</div>
			<div class="contentContainer">
            	<h1><?php the_title(); ?></h1>
                
				<div class="leadership_item_container clearfix">
					<?php
						$args = array( 'numberposts' => -1, 'post_type' => 'leadership', 'post_status' => 'publish', 'order' => 'ASC', 'orderby' => 'menu_order', 'suppress_filters' => 0);
						$results = get_posts( $args );
						foreach( $results as $result ) : 
							$alternate_name = get_field('alternate_name_for_landing_page', $result->ID);
							$job_title = get_field('job_title', $result->ID);
							
					?>
						
					<div class="leadership_item">
						<div class="leadership_wrapper">
							<div class="leader_name"><?php echo $alternate_name?></div>
							<div class="leader_title"><?php echo $job_title?></div>
						</div>
						<a href="<?php echo get_permalink($result->ID)?>" class="btn_read_more"></a>
						<span>Read More</span>
					</div>
					
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</div>