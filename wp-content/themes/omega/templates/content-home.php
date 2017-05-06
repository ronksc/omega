<div class="container">
	<div class="row">
        <div class="homeBannerContainer">
            <div class="homeBannerItemContainer clearfix" id="homeBannerItemContainer">
                <div class="homeBannerItem" style="z-index:999;"><img src="<?=the_post_thumbnail_url( 'full' )?>" alt="" class="img-responsive" /></div>
                <a href="javascript:;" class="homeBannerBtnPrev"></a>
                <a href="javascript:;" class="homeBannerBtnNext"></a>
                <div class="homeThreeColumnContainer clearfix container">
                	<div class="row">
                    	<?php
						
							if( have_rows('three_column') ):
								 // loop through the rows of data
								while ( have_rows('three_column') ) : the_row();
									if( get_row_layout() == 'column_block' ):?>
                                        <div class="homeThreeColumnItem col-sm-4">
                                            <div class="homeThreeColumnItemInnerDiv">
                                                <div class="threeColumnHeader"><?php the_sub_field('title'); ?></div>
                                                <div class="threeColumnContent <?php the_sub_field('icon'); ?>">
                                                    <?php the_sub_field('content'); 
													 
													 $learn_more_link = get_sub_field('learn_more_link');
													 //print_r($learn_more_link);
												?>
                                                    <div class="learnMoreContainer"><a href="<?=get_permalink($learn_more_link[0]);?>">LEARN MORE &gt;</a></div>
                                                </div>
                                            </div>
                                        </div>
								<?	endif;
								endwhile;
							endif;
						?>
                	</div>
                </div>
            </div>
        </div>
	</div>
</div>