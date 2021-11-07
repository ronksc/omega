<?php
	if( isset($_GET['y']) ){
		$blog_year = $_GET['y'];
	}else{
		$blog_year = '';
	}
	
	if( isset($_GET['category']) ){
		$blog_cat = $_GET['category'];
	}else{
		$blog_cat = '';
	}
	
	if( isset($_GET['posts_amount'])){
		$posts_per_page = $_GET['posts_amount'];
	}else{
		$posts_per_page = 10;
	}
	
	$full_uri = get_permalink();
	
	$args = array(
		'orderby' => 'name',
		'parent' => 0
	);
	$categories = get_categories( $args );
?>
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
				<?php _e('Sorry, no results were found.', 'roots'); ?>
			  </div>
			  <?php get_search_form(); ?>
			<?php endif; ?>
			
			<?php 
				$postCount = 1;
				while (have_posts()) : the_post(); 
				if($postCount == 1){?>
					<div class="mainPost">
		                <div class="col-sm-8 feature-img-container">
							<img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($sticky_result->ID) );?>" class="img-responsive" />
							<?php
							if(get_field("feature_image_caption")!=""){
							?>						
							<div class="feature-img-caption"><?php echo get_field("feature_image_caption"); ?></div>
							<?php
							}
							?>
						</div>
						<div class="col-sm-4 feature-content-container">
							<div class="feature-content-inner">
								<p class="post-date"><?php echo get_the_date(); ?></p>
								<a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a
								><?php the_excerpt(); ?>
								<a href="<?php the_permalink(); ?>" class="readmore_link">READ MORE ></a>
							</div>
						</div>
					</div>
			<?php	}else{ 
				if($postCount == 2){
					echo '<div class="container subPost-container">';
				} ?>
				
					<div class="col-sm-4 subPostItem">
						<img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($sticky_result->ID) );?>" class="img-responsive" />
						<p class="img-caption"><?php echo get_field("feature_image_caption", $sticky_result->ID); ?></p>
						<p class="post-date"><?php echo get_the_date(); ?></p>
						<a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
						<?php the_excerpt(); ?>
						<a href="<?php the_permalink(); ?>" class="readmore_link">READ MORE ></a>
					</div>
				
			<?php	if($postCount == 4){
					echo '</div>';
				}
			?>
				
			<?php } ?>
			<?php $postCount++;
				endwhile; 
				
				wp_reset_query();
			?>
		
			<div class="container post-listing">
				<div class="listing-control clearfix">
					<div class="col-xs-12 col-sm-6 noPadding">
						<div class="col-xs-4 col-sm-4 noPadding">
							<select class="post_sort_select">
								<option value="">Date</option>
								<option <?php if($blog_year == '') { echo 'selected="selected"'; } ?> value="<?php echo $full_uri.'?category='.$blog_cat.'&posts_amount='.$posts_per_page?>">All Years</option>
                                <?php
                                	global $wpdb;
									$years = $wpdb->get_col("SELECT DISTINCT YEAR(post_date) FROM $wpdb->posts WHERE post_status = 'publish' AND post_type = 'post' ORDER BY post_date DESC");
									print_r($years);
									foreach($years as $year){
										if($blog_year == $year){
											$selected = 'selected="selected"';	
										}else{
											$selected = '';
										}
										echo '<option value="'.$full_uri.'?category='.$blog_cat.'&y='.$year.'&posts_amount='.$posts_per_page.'" '.$selected.'>'.$year.'</option>';
									}
								?>
							</select>
						</div>
						<div class="col-xs-8 col-sm-8 noPadding">
							<select class="post_sort_select">
								<option value="">Subject</option>
								<option <?php if($blog_cat == '') { echo 'selected="selected"'; } ?> value="<?php echo $full_uri.'?category=&y='.$blog_year?>">All Subjects</option>
								<?php
									foreach ( $categories as $category ) {?>
										<option <?php if($category->cat_ID == $blog_cat) { echo 'selected="selected"'; } ?> value="<?php echo $full_uri.'?category='.$category->cat_ID.'&y='.$blog_year.'&posts_amount='.$posts_per_page?>"><?php echo $category->name?></option>
									<?php }
								?>
							</select>
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 noPadding post-search-container"><?php get_search_form(); ?></div>
				</div>
				
				<?php 
					//$sticky = get_option( 'sticky_posts' );
					$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
					query_posts( 'post_type=post&post_status=publish&posts_per_page='.$posts_per_page.'&paged='. get_query_var('paged').'&ignore_sticky_posts=1&cat='.$blog_cat.'&year='.$blog_year );
				?>
				
				<?php if (!have_posts()) : ?>
				  <div class="alert alert-warning">
					<?php _e('Sorry, no results were found.', 'roots'); ?>
				  </div>
				  <?php get_search_form(); ?>
				<?php endif; ?>
				<div class="table-responsive hidden-xs visible-sm visible-md visible-lg">
                    <table class="table">
                        <col width="60%">
                        <col width="20%">
                        <col width="20%">
                        <tr class="headline">
                            <th>Title</th>
                            <th>Date</th>
                            <th>Subject</th>
                        </tr>
                        
                        <?php while (have_posts()) : the_post(); ?>
                            <tr>
                                <td><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></td>
                                <td><?php echo get_the_date(); ?></td>
                                <td>
                                    <?php
                                        $post_categories = wp_get_post_categories( $post->ID );
                                        //print_r($post_categories);
                                        echo get_category( $post_categories[0] )->name;
                                    ?>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </table>
				</div>
				<div class="visible-xs hidden-sm hidden-md hidden-lg">
				<?php while (have_posts()) : the_post(); ?>
					<div class="news_item">
						<p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
						<p><span>Date:</span> <?php echo get_the_date(); ?></p>
						<p><span>Subject:</span> <?
								$post_categories = wp_get_post_categories( $post->ID );
								//print_r($post_categories);
								echo get_category( $post_categories[0] )->name;
							?></p>
					</div>
				<?php endwhile; ?>
				</div>
				
				<?php if ($wp_query->max_num_pages > 1){?>
				  <div class="post-pagination clearfix">
				  	<div class="pagination_bar_container">
					  	<?php pagination_bar(); ?>
					</div>
					<!--<div class="previous">
						<?php 	
							if ($next_url = next_posts($wp_query->max_num_pages, false)){
								?><a href="<?php echo  $next_url ?>"><i class="fa fa-angle-left"></i> <?php echo _e('Previous');?></a><?php
							} else {
								?><a href="#" class="disabled"><i class="fa fa-angle-left"></i> <?php echo _e('Previous');?></a><?php
							}
						?>
					</div>-->
					<div class="post-per-page">
						Items per page
						<select class="post_sort_select">
							<option <?php if($posts_per_page == '' || $posts_per_page == 10) { echo 'selected="selected"'; } ?> value="<?php echo $full_uri.'?category='.$blog_cat.'&y='.$blog_year.'&posts_amount=10'?>">10</option>
							<option <?php if($posts_per_page == 20) { echo 'selected="selected"'; } ?> value="<?php echo $full_uri.'?category='.$blog_cat.'&y='.$blog_year.'&posts_amount=20'?>">20</option>
							<option <?php if($posts_per_page == 30) { echo 'selected="selected"'; } ?> value="<?php echo $full_uri.'?category='.$blog_cat.'&y='.$blog_year.'&posts_amount=30'?>">30</option>
							<option <?php if($posts_per_page == 40) { echo 'selected="selected"'; } ?> value="<?php echo $full_uri.'?category='.$blog_cat.'&y='.$blog_year.'&posts_amount=40'?>">40</option>
							<option <?php if($posts_per_page == 50) { echo 'selected="selected"'; } ?> value="<?php echo $full_uri.'?category='.$blog_cat.'&y='.$blog_year.'posts_amount=50'?>">50</option>
						</select>
					</div>
					<!--<div class="next">
						<?php 	
							$paged = (get_query_var('paged')) ? get_query_var('paged') : 1; 
							
							if($paged == 1){
								?><a href="#" class="disabled"><?php echo _e('Next');?> <i class="fa fa-angle-right"></i></a><?php
							}else{
								$prev_url = previous_posts(false);
								?><a href="<?php echo  $prev_url ?>"><?php echo _e('Next');?> <i class="fa fa-angle-right"></i></a><?php
							}  
						?>
					</div>-->
				  </div>
				  
				<?php }else{?>
					<div class="post-pagination clearfix">
						<div class="previous">&nbsp;</div>
						<div class="post-per-page">
							Items per page
							<select class="post_sort_select">
								<option <?php if($posts_per_page == '' || $posts_per_page == 10) { echo 'selected="selected"'; } ?> value="<?php echo $full_uri.'?category='.$blog_cat.'&y='.$blog_year.'&posts_amount='.$posts_per_page?>">10</option>
								<option <?php if($posts_per_page == 20) { echo 'selected="selected"'; } ?> value="<?php echo $full_uri.'?category='.$blog_cat.'&y='.$blog_year.'&posts_amount=20'?>">20</option>
								<option <?php if($posts_per_page == 30) { echo 'selected="selected"'; } ?> value="<?php echo $full_uri.'?category='.$blog_cat.'&y='.$blog_year.'&posts_amount=30'?>">30</option>
								<option <?php if($posts_per_page == 40) { echo 'selected="selected"'; } ?> value="<?php echo $full_uri.'?category='.$blog_cat.'&y='.$blog_year.'&posts_amount=40'?>">40</option>
								<option <?php if($posts_per_page == 50) { echo 'selected="selected"'; } ?> value="<?php echo $full_uri.'?category='.$blog_cat.'&y='.$blog_year.'posts_amount=50'?>">50</option>
							</select>
						</div>
						<div class="next">&nbsp;</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>