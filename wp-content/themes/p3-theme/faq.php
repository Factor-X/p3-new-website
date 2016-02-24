<?php
/*
Template Name: Faq
*/
?>

<?php
	if(have_posts()):
		wp_reset_postdata();
		query_posts('posts_per_page=20&post_type=questions&orderby=title&order=ASC');
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
	    	<div class="w66 medium-w80 small-w100 tiny-w100 center">
	    		<ul class="faq-accordion list-unstyled">
<?php
		while(have_posts()):
			the_post();
?>
					<li class="toggleSubMenu">
						<span><?php the_title(); ?></span>
			            <div class="subMenu">
			                <?php the_content(); ?>
			        	</div>
			        </li>
<?php
		endwhile;
?>
				</ul>
			</div>
		</div>
<?php
	endif;
?>