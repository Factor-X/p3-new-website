<?php get_header(); ?>

<section id="home" class="d-table">
    <div class="d-table-row">
    	<div class="container">
            <div class="w50 medium-w100 small-w100 tiny-w100 push txtright content-home">
                <span class="logo-white"></span>
<?php
	if(have_posts()):
		the_post();
		$description = get_bloginfo( 'description', 'display' );
?>
    			<h1 class="uppercase"><?php echo $description; ?></h1>
<?php
		the_content(); 
endif;
?>
            </div>
        </div>
    </div>

    <div class="d-table-row main-navbar">
        <a href="#home" class="logo"></a>
		<div class="content-navbar clearfix">
			<div id="menu"></div>
<?php
        	// Links
	        wp_nav_menu(array(
				"theme_location" => "menu",
				"menu" => "main-nav",
				"menu_class" => "navbar list-unstyled clearfix",
				"container" =>"",
				"walker" => new mono_walker()
	        ));

			// Social networks
	        wp_nav_menu(array(
				"menu" => "social-networks",
				"menu_class" => "list-unstyled social-networks",
				"container" =>""
	        ));
?>
        </div>	
    </div>
</section>
      
<?php
    $menuLang = 'main-nav-fr';
	$menu_items = wp_get_nav_menu_items($menuLang);
	if($menu_items):
		foreach ($menu_items as $menu_item ):
			$args = array('p' => $menu_item->object_id,'post_type' => 'any');
			global $wp_query;
			$wp_query = new WP_Query($args);	
			$templatePart = $menu_item->title;
			if($menu_item->title != 'Accueil'):
?>
<section <?php post_class('sep'); ?> id="<?php echo sanitize_title($menu_item->title); ?>">
<?php 
			if (have_posts() && isset($templatePart))
				get_template_part( strtolower($templatePart));
?>
</section>
<?php
			endif;
		endforeach;
	endif;
?>
    </body>
    <?php wp_footer(); ?>
</html>