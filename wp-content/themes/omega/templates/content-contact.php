<section class="home-content container">
	<div class="row">
    	<div class="col-sm-12">
        	<? the_post_thumbnail( 'full', array( 'class' => 'img-responsive' ) );?>
        </div>
    </div>
    <div class="row">
    	<div class="col-sm-8 col-sm-push-2">
			<?=apply_filters('the_content', $post->post_content); ?>
        </div>
    </div>
</section>