<div class="container">
	<div class="row">
		<div class="innerContentContainer">
			<?php
			/* Get all Sticky Posts */
			$sticky = get_option( 'sticky_posts' );
			
			/* Sort Sticky Posts, newest at the top */
			rsort( $sticky );
			
			/* Get top 4 Sticky Posts */
			$sticky = array_slice( $sticky, 0, 4 );
			
			/* Query Sticky Posts */
			query_posts( array( 'post__in' => $sticky, 'ignore_sticky_posts' => 1 ) );
			
			//print_r($sticky_results);
			
			if (!have_posts()) : ?>
			  <div class="alert alert-warning">
				<? _e('Sorry, no results were found.', 'roots'); ?>
			  </div>
			  <? get_search_form(); ?>
			<? endif; ?>
			
			<? 
				$postCount = 1;
				while (have_posts()) : the_post(); 
				if($postCount == 1){?>
					<div class="mainPost">
		                <div class="col-sm-8 feature-img-container">
							<img src="<?=wp_get_attachment_url( get_post_thumbnail_id($sticky_result->ID) );?>" class="img-responsive" />
							<div class="feature-img-caption"><?=get_field("feature_image_caption", $sticky_result->ID); ?></div>
						</div>
						<div class="col-sm-4 feature-content-container">
							<div class="feature-content-inner">
								<p class="post-date"><?  echo get_the_date(); ?></p>
								<h2><?php the_title(); ?></h2>
								<?php the_excerpt(); ?>
								<a href="<?php the_permalink(); ?>" class="readmore_link">READ MORE ></a>
							</div>
						</div>
					</div>
			<?	}else{ 
				if($postCount == 2){
					echo '<div class="container subPost-container">';
				} ?>
				
					<div class="col-sm-4 subPostItem">
						<img src="<?=wp_get_attachment_url( get_post_thumbnail_id($sticky_result->ID) );?>" class="img-responsive" />
						<p class="img-caption"><?=get_field("feature_image_caption", $sticky_result->ID); ?></p>
						<p class="post-date"><?  echo get_the_date(); ?></p>
						<h2><?php the_title(); ?></h2>
						<?php the_excerpt(); ?>
						<a href="<?php the_permalink(); ?>" class="readmore_link">READ MORE ></a>
					</div>
				
			<?	if($postCount == 4){
					echo '</div>';
				}
			?>
				
			<? } ?>
			<? $postCount++;
				endwhile; 
				
				wp_reset_query();
			?>
		
			<div class="container post-listing">
				<div class="listing-control clearfix">
					<div class="col-xs-12 col-sm-6 noPadding">
						<div class="col-xs-4 col-sm-4 noPadding">
							<select>
								<option>Date</option>
								<option>All Year</option>
								<option>2015</option>
								<option>2014</option>
								<option>2013</option>
							</select>
						</div>
						<div class="col-xs-8 col-sm-8 noPadding">
							<select>
								<option>Subject</option>
								<option>All Subject</option>
								<option>Training</option>
								<option>Event</option>
								<option>Certification</option>
							</select>
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 noPadding post-search-container"><?php get_search_form(); ?></div>
				</div>
				<table class="table">
					<col width="60%">
					<col width="20%">
					<col width="20%">
					<tr class="headline">
						<th>Title</th>
						<th>Date</th>
						<th>Subject</th>
					</tr>
					<tr>
						<td>Myanmar Factroy Workers Demand Higher Pay</td>
						<td>June 12, 2015</td>
						<td>Training</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>