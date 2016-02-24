<?php
/*
Template Name: Salles
*/
?>

<?php
	if(have_posts()):
		wp_reset_postdata();
		query_posts('posts_per_page=10');
?>
		<div class="call-to-show txtcenter">
			<h1 class="title-section"><?php the_title(); ?></h1>
		</div>
		<div class="container content-section">
		    <div class="w66 small-w80 tiny-w100 txtcenter center explains">
		    	<?php
		    		$readme = get_post_meta($post->ID, "Readme", true);
		    	?>
		        <p><?php echo $readme; ?></p>
		    </div>
		</div>
		<div class="slider slider-nav">
<?php
		while(have_posts()):
			the_post();
?>
			<div class="item">
                <div class="img-holder">
                	<?php the_post_thumbnail('imagesRoom400x400'); ?>
                </div>
            </div>
<?php
    	endwhile;
?>
		</div>
		<div class="slider slider-for">
<?php
    	while (have_posts()):
    		the_post();
?>
	        <div class="copy txtcenter">
	            <div class="container">
	                <div class="w100">
	                    <h3><?php the_title(); ?></h2>
	                    <?php the_content(); ?>
	                </div>
	            </div>
	        </div>
<?php
		endwhile;
?>
		</div>
<?php
	endif;
?>
<div class="container call-to-action">
	<div class="w100 clearfix">
		<?php dynamic_sidebar('sentenceFr'); ?>
	</div>
</div>