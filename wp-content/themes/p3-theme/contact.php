<?php
/*
Template Name: Contact
*/
?>

<?php
	if(have_posts()){
		while(have_posts()){
			the_post();
			?>
			<div class="call-to-show">
				<h1 class="title-section text-center uppercase"><?php the_title(); ?></h1>
			</div>
			<?php
		}
	}
?>

<?php
	get_footer();
?>

