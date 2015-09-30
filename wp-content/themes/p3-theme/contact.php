<?php
/*
Template Name: Contact
*/
?>

<?php
	if(have_posts()){
?>
<?php
		while(have_posts()){
			the_post();
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
					<div class="col-lg-4 col-md-5">
						<?php dynamic_sidebar('identityCard'); ?>
						<?php dynamic_sidebar('socialNetworks'); ?>
						<img class="img-responsive hidden-xs hidden-sm" src="<?php echo get_bloginfo('stylesheet_directory');?>/img/p3-building.jpg" alt="p3 bâtiment">
					</div>
	                <div class="col-lg-8 col-md-7 maps-and-form">
	<?php
						the_content();
	?>  
	                </div>
                </div>
            </div>
<?php
		}
	}
?>

<?php
	get_footer();
?>