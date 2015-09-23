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
                        <div class="grid-50 prefix-50 tablet-grid-60 tablet-prefix-40">
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
				        //Languages
				        ?>
				        <ul class="list-inline languages">
			        	<?php
					        pll_the_languages(array(
					        	"display_names_as" => "slug"
				        	));
			    		?>
				        </ul>
                    </div>	
                </div>
            </div>
        </section>
      
    	<?php
    		$currentlang = get_bloginfo('language');
    		if($currentlang == 'fr-FR'){
    			$menuLang = 'main-nav-fr';
    		} elseif($currentlang == 'en-GB'){
				$menuLang = 'main-nav-en';
    		}else{
    			$menuLang = 'main-nav-nl';
    		}

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
			if ( have_posts() && isset($templatePart)){
   				include(locate_template($templatePart.'.php'));
			}
		?>
		</section>
		<?php
		}
				
			};
		?>
    </body>
    <?php wp_footer(); ?>
</html>