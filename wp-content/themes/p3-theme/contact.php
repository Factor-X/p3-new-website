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
			<div class="grid-container content-section">
			    <div class="grid-60 prefix-20 tablet-grid-80 tablet-prefix-10 mobile-grid-100 mobile-prefix-0 text-center explains">
			    	<?php
			    		$readme = get_post_meta($post->ID, "Readme", true);
			    	?>
			        <p><?php echo $readme; ?></p>
			    </div>
				<div class="grid-33 tablet-grid-40">
					<?php dynamic_sidebar('identityCard'); ?>
					<?php dynamic_sidebar('socialNetworks'); ?>
					<img class="img-responsive hide-on-mobile" src="<?php echo get_bloginfo('stylesheet_directory');?>/img/p3-building.jpg" alt="p3 bâtiment">
				</div>
                <div class="grid-66 tablet-grid-60 maps-and-form">
<?php
					the_content();
?>  
                </div>
            </div>
<?php
		}
	}
?>

<?php
	get_footer();
?>