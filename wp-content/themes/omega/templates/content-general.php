<div class="container">
	<div class="row">
		<div class="innerContentContainer">
			<div class="contentBannerContainer">
				<? $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
				<img src="<?=$feat_image?>" alt="" class="img-responsive hidden-xs" />
                <img src="<?=get_field("mobile_banner", $post->ID); ?>" alt="" class="img-responsive hidden-sm hidden-md hidden-lg" />
                <?=get_field("banner_text", $post->ID) ?>
			</div>
			<div class="contentContainer">
				<?=apply_filters('the_content', get_post_field('post_content', $id)); ?>
			</div>
		</div>
	</div>
</div>