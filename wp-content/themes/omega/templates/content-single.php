<div class="container single-post-container">
	<div class="row">
		<?php while (have_posts()) : the_post(); ?>
			<div class="page-control clearfix">
				<div class="col-xs-12 col-sm-4">
					<a href="/blog/" class="allNews-link"><i class="fa fa-angle-left"></i> ALL NEWS</a>
				</div>
				<div class="hidden-xs col-sm-8">
					<div class="col-xs-6 prev-post">
						<? $prev_post = get_adjacent_post(false, '', true);
						  if(!empty($prev_post)) {?>
							<a href="<?=get_permalink($prev_post->ID); ?>" class="article-link">
							<span><i class="fa fa-angle-left"></i> PREVIOUS ARTICLE</span>
							<?=$prev_post->post_title?>
						</a>
						<? } ?>
					</div>
					<div class="col-xs-6 next-post">
						<? $next_post = get_adjacent_post(false, '', false); 
						  if(!empty($next_post)) { ?>
							<a href="<?=get_permalink($next_post->ID)?>" class="article-link">
							<span>NEXT ARTICLE <i class="fa fa-angle-right"></i></span>
							<?=$next_post->post_title?>
						</a>
						<? } ?>
					</div>
				</div>
			</div>
			<div class="post-content">
				<div class="post-info-container clearfix">
					<? if(has_post_thumbnail( $post->ID)){ ?>
					<div class="post-img-container">
						<img src="<?=wp_get_attachment_url( get_post_thumbnail_id($sticky_result->ID) );?>" class="img-responsive" />
						<?
						if(get_field("feature_image_caption")){
						?>						
						<div class="feature-img-caption"><?=get_field("feature_image_caption"); ?></div>
						<?
						}
						?>
					</div>
					<? } ?>
					<div class="post-info-content">
						<p class="post-date"><?=get_the_date(); ?></p>
						<h2><?php the_title(); ?></h2>
                        <div class="addthis_toolbox addthis_default_style" addthis:url="<?=get_permalink()?>" addthis:title="<?php the_title(); ?>" style="display:inline-block; margin-bottom:10px;">
                            <a class="addthis_button_facebook"></a>
                            <a class="addthis_button_linkedin"></a>
							<a class="addthis_button_email"></a>
                        </div>
                        <script type="text/javascript">var addthis_config = {"data_track_addressbar":false};</script>
						<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-55d131230118ed49"></script>
						<?php the_excerpt(); ?>
					</div>
				</div>
				<div class="post-main-content clearfix">
					<div class="col-sm-10 col-sm-push-2 post-main-content-body">
						<?php the_content(); ?>
					</div>
					<div class="col-sm-2 related_topics_conatiner col-sm-pull-10">
						<p>RELATED TOPICS</p>
						<?
							$post_categories = wp_get_post_categories( $post->ID );
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
							}
							//print_r($cats);
						?>
					</div>
				</div>
			</div>
			<div class="page-control clearfix visible-xs hidden-sm hidden-md hidden-lg">
				<div class="col-xs-6 prev-post">
					<? $prev_post = get_adjacent_post(false, '', true);
					  if(!empty($prev_post)) {?>
						<a href="<?=get_permalink($prev_post->ID); ?>" class="article-link">
						<span><i class="fa fa-angle-left"></i> PREVIOUS ARTICLE</span>
						<?=$prev_post->post_title?>
					</a>
					<? } ?>
				</div>
				<div class="col-xs-6 next-post">
					<? $next_post = get_adjacent_post(false, '', false); 
					  if(!empty($next_post)) { ?>
						<a href="<?=get_permalink($next_post->ID)?>" class="article-link">
						<span>NEXT ARTICLE <i class="fa fa-angle-right"></i></span>
						<?=$next_post->post_title?>
					</a>
					<? } ?>
				</div>
			</div>
		<?php endwhile; ?>
	</div>
</div>