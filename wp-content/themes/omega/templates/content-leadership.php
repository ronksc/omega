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
            	<h1><?php the_title(); ?></h1>
                
				<div class="leadership_item_container clearfix">
					<div class="leadership_item">
						<div class="leader_name">JON<br />WHITE</div>
						<div class="leader_title">Managing Director,<br />Hong Kong</div>
						<a href="#" class="btn_read_more">Read More</a>
					</div>
					<div class="leadership_item">
						<div class="leader_name">JON<br />WHITE</div>
						<div class="leader_title">Managing Director, Hong Kong</div>
						<a href="#" class="btn_read_more">Read More</a>
					</div>
					<div class="leadership_item">
						<div class="leader_name">JON<br />WHITE</div>
						<div class="leader_title">Managing Director, Hong Kong</div>
						<a href="#" class="btn_read_more">Read More</a>
					</div>
					<div class="leadership_item">
						<div class="leader_name">Mark<br />Evans</div>
						<div class="leader_title">Director of<br />business services,<br />new york</div>
						<a href="#" class="btn_read_more">Read More</a>
					</div>
					<div class="leadership_item">
						<div class="leader_name">JON<br />WHITE</div>
						<div class="leader_title">Managing Director, Hong Kong</div>
						<a href="#" class="btn_read_more">Read More</a>
					</div>
					<div class="leadership_item">
						<div class="leader_name">JON<br />WHITE</div>
						<div class="leader_title">Managing Director, Hong Kong</div>
						<a href="#" class="btn_read_more">Read More</a>
					</div>
					<div class="leadership_item">
						<div class="leader_name">JON<br />WHITE</div>
						<div class="leader_title">Managing Director, Hong Kong</div>
						<a href="#" class="btn_read_more">Read More</a>
					</div>
					<div class="leadership_item">
						<div class="leader_name">JON<br />WHITE</div>
						<div class="leader_title">Managing Director, Hong Kong</div>
						<a href="#" class="btn_read_more">Read More</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>