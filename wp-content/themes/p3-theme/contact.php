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
			    <div class="grid-60 prefix-20 text-center explains">
			    	<?php
			    		$readme = get_post_meta($post->ID, "Readme", true);
			    	?>
			        <p><?php echo $readme; ?></p>
			    </div>
				<div class="grid-33">
                    <div class="identity-card">
                        <div class="logo-p3"></div>
                        <p>Avenue de la paix 3<br>
                        1420 Braine l'Alleud<br>
                        Belgique<br>
                        p3@factorx.eu<br>
                        T : +32 2 529 59 12
                        </p>
                        <div class="social-networks">
                            <a href="#" target="_blank"><span class="icon-facebook"></span></a>
                            <a href="#" target="_blank"><span class="icon-twitter"></span></a>
                            <a href="#" target="_blank"><span class="icon-linkedin"></span></a>
                        </div>
                    </div>
                    <img class="img-responsive" src="http://lorempixel.com/400/300/" alt="">
                </div>
                <div class="grid-66">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1503.1469883509212!2d4.388250290910754!3d50.68316230950842!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c3d1fedcb67d21%3A0x1b20dea7100a2e0a!2sP3!5e0!3m2!1sfr!2sus!4v1441964594608" width="750" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
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