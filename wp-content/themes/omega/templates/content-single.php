<div class="container single-post-container">
	<div class="row">
		<?php while (have_posts()) : the_post(); ?>
			<div class="page-control clearfix">
				<!--<div class="col-xs-12 col-sm-4">
					<a href="/blog/" class="allNews-link"><i class="fa fa-angle-left"></i> ALL NEWS</a>
				</div>-->
				<div class="hidden-xs col-sm-12">
					<div class="col-xs-6 prev-post">
						<?php $prev_post = get_adjacent_post(false, '', true);
						  if(!empty($prev_post)) {?>
							<a href="<?php echo get_permalink($prev_post->ID); ?>" class="article-link">
							<span><i class="fa fa-angle-left"></i> PREVIOUS ARTICLE</span>
							<?php echo $prev_post->post_title?>
						</a>
						<?php } ?>
					</div>
					<div class="col-xs-6 next-post">
						<?php $next_post = get_adjacent_post(false, '', false); 
						  if(!empty($next_post)) { ?>
							<a href="<?php echo get_permalink($next_post->ID)?>" class="article-link">
							<span>NEXT ARTICLE <i class="fa fa-angle-right"></i></span>
							<?php echo $next_post->post_title?>
						</a>
						<?php } ?>
					</div>
				</div>
			</div>
			<div class="post-content">
				<div class="post-info-container clearfix">
					<?php if(has_post_thumbnail( $post->ID)){ ?>
					<div class="post-img-container">
						<img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($sticky_result->ID) );?>" class="img-responsive" />
						<?
						if(get_field("feature_image_caption")){
						?>						
						<div class="feature-img-caption"><?php echo get_field("feature_image_caption"); ?></div>
						<?
						}
						?>
					</div>
					<?php } ?>
					<div class="post-info-content">
						<p class="post-date"><?php echo get_the_date(); ?></p>
						<h2><?php the_title(); ?></h2>
                        <div class="addthis_toolbox addthis_default_style" addthis:url="<?php echo get_permalink()?>" addthis:title="<?php the_title(); ?>" style="display:inline-block; margin-bottom:10px;">
                            <a class="addthis_button_facebook"></a>
                            <a class="addthis_button_linkedin"></a>
							<a class="addthis_button_email"></a>
                        </div>
                        <script type="text/javascript">var addthis_config = {"data_track_addressbar":false};</script>
						<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-55d131230118ed49"></script>
						<?
							if( $post->post_excerpt ){
						?>
								<div class="post-excerpt"><?php echo $post->post_excerpt;?></div>
						<?
							}
						?>
						<?php //the_excerpt(); ?>
					</div>
				</div>
				<div class="post-main-content clearfix">
					
					<div class="col-sm-10 col-sm-push-2 post-main-content-body">
						<?php the_content(); ?>
					</div>
					<div class="col-sm-2 related_topics_conatiner col-sm-pull-10">
                    	<p><a href="/insights/" class="allNews-link">VIEW ALL NEWS</a></p>
						<?
							$related_topics = get_field('related_topics');
							if(sizeof($related_topics) > 0 && $related_topics != ''){
								echo '<p>RELATED TOPICS</p>';
								echo '<ul class="related_topics">';
								foreach ( $related_topics as $related_topic ) {
									echo '<li><a href="'.get_permalink($related_topic->ID).'">'.get_the_title($related_topic->ID).'</a></li>';
								}
								echo '</ul>';
							}
							/*$post_categories = wp_get_post_categories( $post->ID );
							$size_post_categories = count($post_categories);
							$cats = array();
							
							if($size_post_categories > 0){
								echo '<ul class="related_topics">';
								foreach($post_categories as $c){
									$cat = get_category( $c );
									//$cats[] = array( 'name' => $cat->name, 'slug' => $cat->slug );
									echo "<li><a href='/blog/?category=".$c."'>". $cat->name ."</a></li>";
								}
								echo '</ul>';
							}*/
							//print_r($cats);
						?>
					</div>
				</div>
			</div>
			<div class="page-control clearfix visible-xs hidden-sm hidden-md hidden-lg">
				<div class="col-xs-6 prev-post">
					<?php $prev_post = get_adjacent_post(false, '', true);
					  if(!empty($prev_post)) {?>
						<a href="<?php echo get_permalink($prev_post->ID); ?>" class="article-link">
						<span><i class="fa fa-angle-left"></i> PREVIOUS ARTICLE</span>
						<?php echo $prev_post->post_title?>
					</a>
					<?php } ?>
				</div>
				<div class="col-xs-6 next-post">
					<?php $next_post = get_adjacent_post(false, '', false); 
					  if(!empty($next_post)) { ?>
						<a href="<?php echo get_permalink($next_post->ID)?>" class="article-link">
						<span>NEXT ARTICLE <i class="fa fa-angle-right"></i></span>
						<?php echo $next_post->post_title?>
					</a>
					<?php } ?>
				</div>
			</div>
		<?php endwhile; ?>
	</div>
</div>