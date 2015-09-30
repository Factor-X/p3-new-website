<?php
/*
Template Name: Spaces
*/
?>

<?php
	if(have_posts()){
		wp_reset_postdata();
		query_posts('posts_per_page=10');
?>
		<div class="call-to-show">
			<h1 class="title-section text-center uppercase"><?php the_title(); ?></h1>
		</div>
		<div class="container content-section">
			<div class="row">
			    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12 text-center explains">
			    	<?php
			    		$readme = get_post_meta($post->ID, "Readme", true);
			    	?>
			        <p><?php echo $readme; ?></p>
			    </div>
		    </div>
		</div>
		<div class="slider slider-nav">
<?php
		while(have_posts()) {
			the_post();
?>
			<div class="item">
                <div class="img-holder">
                	<?php the_post_thumbnail('imagesRoom400x400'); ?>
                </div>
            </div>
<?php
    	}
?>
		</div>
		<div class="slider slider-for">
<?php
    	while (have_posts()) {
    		the_post();
?>
	        <div class="copy text-center">
	            <div class="container">
	            	<div class="row">
		                <div class="col-lg-12">
		                    <h3><?php the_title(); ?></h2>
		                    <?php the_content(); ?>
		                </div>
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
 <div class="container call-to-action">
 	<div class="row">
		<div class="col-lg-12">
			<?php
				dynamic_sidebar("sentenceEn");
			?>
		</div>
	</div>
</div>