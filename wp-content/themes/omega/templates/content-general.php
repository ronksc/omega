<div class="container">
	<div class="row">
		<div class="innerContentContainer">
			<div class="contentBannerContainer">
				<?php $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
				<img src="<?php echo $feat_image?>" alt="" class="img-responsive hidden-xs" />
                <img src="<?php echo get_field("mobile_banner", $post->ID); ?>" alt="" class="img-responsive hidden-sm hidden-md hidden-lg" />
                <?php echo get_field("banner_text", $post->ID) ?>
			</div>
			<div class="contentContainer">
            	
            	<?php
				// check if the flexible content field has rows of data
				if( have_rows('partnership') ):
					echo '<div class="ethicsLogoContainer">';
					 // loop through the rows of data
					while ( have_rows('partnership') ) : the_row();
				
						if( get_row_layout() == 'block_text' ): 
							the_sub_field('partnership_text');
						elseif( get_row_layout() == 'block_logo' ): 
							$logo_image = get_sub_field('logo_image');
							$logo_link = get_sub_field('logo_link'); ?>
                                                        
                            <a href="<?php echo $logo_link?>" target="_blank"><img src="<?php echo $logo_image?>" class="img-responsive" /></a>                            
                            
                        <?php
						endif;				
					endwhile;
					echo '</div>';		
				endif; 
				
				$alternate_page_title = get_field('alternate_page_title', $post->ID);
	            if($alternate_page_title !== ''){ ?>
		        	<h1><?php echo $alternate_page_title?></h1>    	
                <?php
				}else{
				?>
                	<h1><?php the_title(); ?></h1>
                <?php } ?>
                
                <?php if( have_rows('highlight_text') ): ?>
                	<div class="highlight">
					<?php while( have_rows('highlight_text') ): the_row(); 						
						the_sub_field('content');
                    ?>
                    <?php endwhile; ?>
                    </div>
                <?php endif; ?>
                
				<?php echo apply_filters('the_content', get_post_field('post_content', $id)); ?>
                
				<div class="clearfix contact_content">
                <?php
				// check if the flexible content field has rows of data
				if( have_rows('hk_company_detail') ): ?>
				
					<div class="col-sm-6 contact_item"> 	 
					<?php while ( have_rows('hk_company_detail') ) : the_row(); 
						
						if( get_row_layout() == 'company_name' ): 
							$name = get_sub_field('name'); ?>
						
                        	<div class="companyName"><?php echo $name?></div>
                        	
                        <?php	
						elseif( get_row_layout() == 'company_address' ): 
							$address = get_sub_field('address');
							$contact_info = get_sub_field('contact_info'); ?>
                            
                            <div class="companyAddress extra_padding"><?php echo $address?></div>
                            
                            <div class="companyAddress"><?php echo $contact_info?></div>
                        <?php
						endif;
					endwhile; ?>
					</div>
				<?php endif; ?>
				
				<?php
				// check if the flexible content field has rows of data
				if( have_rows('usa_company_detail') ): ?>
				
					<div class="col-sm-6 contact_item"> 
					<?php while ( have_rows('usa_company_detail') ) : the_row(); 
						
						if( get_row_layout() == 'company_name' ): 
							$name = get_sub_field('name'); 
							$sub_line = get_sub_field('sub_line');  ?>
						
                        	<div class="companyName with_subline"><?php echo $name?></div>
                        	<div class="companyName_subline"><?php echo $sub_line?></div>
                        <?php	
						elseif( get_row_layout() == 'company_address' ): 
							$address = get_sub_field('address');
							$contact_info = get_sub_field('contact_info'); ?>
                            
                            <div class="companyAddress extra_padding"><?php echo $address?></div>
                            
                            <div class="companyAddress"><?php echo $contact_info?></div>
                        <?php
						endif;
					endwhile; ?>
					</div>
				<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>