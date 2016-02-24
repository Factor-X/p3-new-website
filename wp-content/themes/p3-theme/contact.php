<?php
/*
Template Name: Contact
*/
?>

<?php
	if(have_posts()):
?>
<?php
		while(have_posts()):
			the_post();
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
			    <div class="grid-1-2">
					<div>
						<?php dynamic_sidebar('identityCard'); ?>
						<?php dynamic_sidebar('socialNetworks'); ?>
						<img class="img-responsive tiny-hidden small-hidden" src="<?php echo get_bloginfo('stylesheet_directory');?>/img/p3-building.jpg" alt="p3 bâtiment">
					</div>
	                <div class=" maps-and-form">
<?php
						the_content();
?>  
	                </div>
                </div>
            </div>
<?php
		endwhile;
	endif;
?>

<?php
	get_footer();
?>