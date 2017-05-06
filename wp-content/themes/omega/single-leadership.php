<?php
	$job_title = get_field('job_title', $post->ID);
?>

<div class="container">
	<div class="row">
		<div class="innerContentContainer">
			<div class="contentBannerContainer">
				<? $feat_image = wp_get_attachment_url( get_post_thumbnail_id(525) ); ?>
				<img src="<?=$feat_image?>" alt="" class="img-responsive hidden-xs" />
                <img src="<?=get_field("mobile_banner", 525); ?>" alt="" class="img-responsive hidden-sm hidden-md hidden-lg" />
                <?=get_field("banner_text", 525) ?>
			</div>
			<div class="contentContainer leadership_single">
				<?php
					$post_title = get_the_title();
				?>
				<h1><?=get_the_title(525);?></h1>
               	<h2><?=strip_tags($post_title); ?></h2>
				<h3><?=strip_tags($job_title)?></h3>
				                
				<?=apply_filters('the_content', get_post_field('post_content', $id)); ?>
			</div>
		</div>
	</div>
</div>