<?php
/*
Template Name: Home
*/
?>

<?php get_header(); ?>

    	<section id="home">
            <div class="d-table">
                <div class="d-table-row">
                    <div class="grid-container">
                        <div class="grid-50 tablet-grid-50 mobile-grid-100 prefix-50">
                            <div class="clearfix">
                                 <div class="logo-white"></div>
                            </div>
                            <?php
	                            if(have_posts()){
	                            		the_post();
                    		?>
                        				<div class="content-home">
                            				<?php $description = get_bloginfo( 'description', 'display' ); ?>
                                			<h1 class="uppercase"><?php echo $description; ?></h1>
                                			<?php the_content(); ?>
                            			</div>
                            		<?php
                        		}
                        	?>
                        </div>
                    </div>  
                </div>

                <div class="d-table-row main-navbar">
                    <a href="#home" class="logo"></a>
	                    <!-- <div class="content-navbar">  
	                        <ul class="navbar list-inline list-unstyled clearfix">
	                            <li class="link-nav text-center"><a href="#home">Home</a></li>
	                            <li class="link-nav text-center"><a href="#spaces">Spaces</a></li>
	                            <li class="link-nav text-center"><a href="#prices">Prices</a></li>
	                            <li class="link-nav text-center"><a href="#faq">Faq</a></li>
	                            <li class="link-nav text-center"><a href="#contact">Contact</a></li>
	                        </ul>
	                        <ul class="list-inline list-unstyled social-networks">
	                            <li><a href="#"><span class="icon-facebook"></span></a></li>
	                            <li><a href="#"><span class="icon-twitter"></span></a></li>
	                            <li><a href="#"><span class="icon-linkedin"></span></a></li>
	                        </ul>
	                        <ul class="list-inline list-unstyled languages">
	                            <li><a href="#" class="uppercase">fr</a></li>
	                            <li><a href="#" class="uppercase">nl</a></li>
	                            <li><a href="#" class="uppercase">en</a></li>
	                        </ul>
	                    </div> -->

                    <?php
				        wp_nav_menu(array(
				          "menu" => "menu",
				          "menu_class" => "navbar list-inline list-unstyled clearfix",
				          "container" =>"div",
				          "container_class" => "content-navbar",
				          "walker" => new mono_walker()
				        ));
			    	?>
                    
                </div>
            </div>
        </section>
      
    	<?php
			$menu_items = wp_get_nav_menu_items('main-nav');
			if( $menu_items ) {
				foreach ($menu_items as $menu_item ) {
					$args = array('p' => $menu_item->object_id,'post_type' => 'any');
					global $wp_query;
					$wp_query = new WP_Query($args);
					// $templatePart = ($menu_item->title == 'Prices') ? 'price' : $menu_item->object;
					$templatePart = $menu_item->title;
		?>
		<section <?php post_class('sep'); ?> id="<?php echo sanitize_title($menu_item->title);?>">
		<?php 
			if ( have_posts() ){
   				include(locate_template($templatePart.'.php'));
			}
		?>
		</section>
		<?php
				}
			};
		?>

		
       
        <?php wp_footer(); ?>
    </body>
</html>