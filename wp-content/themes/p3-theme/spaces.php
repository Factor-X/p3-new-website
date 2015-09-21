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
		<div class="grid-container content-section">
		    <div class="grid-60 prefix-20 tablet-grid-80 tablet-prefix-10 mobile-grid-80 mobile-prefix-10 text-center explains">
		    	<?php
		    		$readme = get_post_meta($post->ID, "Readme", true);
		    	?>
		        <p><?php echo $readme; ?></p>
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
	            <div class="grid-container">
	                <div class="grid-80 prefix-10">
	                    <h3><?php the_title(); ?></h2>
	                    <?php the_content(); ?>
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

<div class="grid-container call-to-action">
	<div class="grid-100">
		<p class="uppercase">Un conseil ? Une question ? Un devis ?</p>

		<a href="#contact" class="btn btn-lg btn-primary f-right">Prendre contact avec nous</a>
	</div>
</div>