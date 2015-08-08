<section class="home-banner container">
  <div class="row">
    <div class="col-md-12 col-lg-12 noPadding" id="main-banner-container" >
      <div id="main-banner">
        <?
                $args = array( 'numberposts' => -1, 'post_type' => 'career_banner', 'post_status' => 'publish', 'order' => 'ASC', 'orderby' => 'menu_order', 'suppress_filters' => 0);
              $results = get_posts( $args );
              foreach( $results as $result ) :
                $url = wp_get_attachment_image_src( get_post_thumbnail_id($result->ID), 'full');
                $page_url = get_field("page_link",$result->ID);
            ?>
        <div class="main-banner-item"> <img class="img-responsive" src="<?=$url[0]?>" />
          <div class="main-banner-text-container"> <span class="hero-txt">
            <?=apply_filters('the_content', $result->post_content);?>
            </span> 
          </div>
        </div>
        <? endforeach;?>
      </div>
    </div>
  </div>
</section>
<section class="home-content container">
	<div class="row">
    	<div class="col-sm-8 col-sm-push-2">
        	<!--<div class="logo_container"><img src="<?=get_field("logo", $post->ID);?>" alt="brooklyn" /></div>-->
			<?=apply_filters('the_content', $post->post_content); ?>
        </div>
    </div>
</section>