<?php
/*
Template Name: Faq
*/
?>

<?php
	if(have_posts()){
		wp_reset_postdata();
		query_posts('posts_per_page=20&post_type=questions&orderby=title&order=ASC');
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
	    	<div class="grid-60 prefix-20 tablet-grid-80 tablet-prefix-10 mobile-grid-100 mobile-prefix-0">
	    		<ul class="faq-accordion">
<?php
		while(have_posts()){
			the_post();
?>
					<li class="toggleSubMenu">
						<span><?php the_title(); ?></span>
			            <div class="subMenu">
			                <?php the_content(); ?>
			        	</div>
			        </li>
<?php
		}
?>
				</ul>
			</div>
		</div>
<?php
	}
?>