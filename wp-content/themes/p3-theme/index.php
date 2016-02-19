<?php
/*
Template Name: Home
*/
?>

<?php get_header(); ?>

    	<section id="home">
            <div class="d-table">
                <div class="d-table-row">
                    <div class="container">
                    	<div class="row">
	                        <div class="col-lg-6 col-lg-offset-6 col-md-8 col-md-offset-4">
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
                </div>

                <div class="d-table-row main-navbar">
                    <a href="#home" class="logo"></a>
					<div class="content-navbar">
						<div id="menu"></div>
                    <?php
                    	//Links
				        wp_nav_menu(array(
							"theme_location" => "menu",
							"menu" => "main-nav",
							"menu_class" => "navbar list-inline clearfix",
							"container" =>"",
							"walker" => new mono_walker()
				        ));
						//Social networks
				        wp_nav_menu(array(
							"menu" => "social-networks",
							"menu_class" => "list-inline social-networks",
							"container" =>""
				        ));
				        
				    ?>
                    </div>	
                </div>
            </div>
        </section>
      
    	<?php
    		$currentlang = get_bloginfo('language');
    		$menuLang = 'main-nav-fr';

			$menu_items = wp_get_nav_menu_items($menuLang);
			if( $menu_items ) {
				foreach ($menu_items as $menu_item ) {
					$args = array('p' => $menu_item->object_id,'post_type' => 'any');
					global $wp_query;
					$wp_query = new WP_Query($args);	
					$templatePart = $menu_item->title;		
		?>
		<section <?php post_class('sep'); ?> id="<?php echo sanitize_title($menu_item->title);?>">
		<?php 
			if ( have_posts() && isset($templatePart))
				get_template_part( strtolower($templatePart) );
		?>
		</section>
		<?php
		}
			};
		?>
    </body>
    <?php wp_footer(); ?>
</html>