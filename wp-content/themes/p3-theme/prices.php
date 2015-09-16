<?php
/*
Template Name: Prices
*/
?>

<?php
	if(have_posts()){
		wp_reset_postdata();
		query_posts('posts_per_page=20&post_type=price&orderby=custom-fields&order=ASC');
?>
		<div class="call-to-show">
			<h1 class="title-section text-center uppercase"><?php the_title(); ?></h1>
		</div>
		<div class="grid-container content-section">
		    <div class="grid-60 prefix-20 text-center explains">
		    	<?php
		    		$readme = get_post_meta($post->ID, "Readme", true);
		    	?>
		        <p><?php echo $readme; ?></p>
		    </div>
		
<?php
		while(have_posts()){
			the_post();
			?>
			
            <div class="grid-33">
                <div class="pricing-table text-center">
                    <div class="header">
                        <span><?php the_title(); ?></span>
                    </div>
                    <div class="content-pricing-table">
                        <div class="price">
                        	<?php
                        		$packPrice = get_post_meta($post->ID, 'Price', true);
                        	?>
                            <span><?php echo $packPrice; ?></span>
                        </div>
                        <?php the_content(); ?>
                   
                    </div>
                    <div class="reserve">
                        <a href="#" class="btn btn-lg btn-primary">Je réserve !</a>
                    </div>
                    
                </div>
            </div>
			<?php
		}
?>
		</div>
<?php
	}
?>