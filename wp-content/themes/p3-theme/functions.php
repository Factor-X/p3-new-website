<?php
//
//LOAD SCRIPTS AND STYLESHEETS
//--jQuery
function jQueryScripts(){
    if (!is_admin()) {
        wp_register_script('jqueryjs', 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js', array(), '1.11.3');
        wp_enqueue_script('jqueryjs');
    }
}
add_action('init', 'jQueryScripts');
//--p3-scripts.js
function p3Scripts() {
	wp_register_script('p3Scripts', get_bloginfo('stylesheet_directory').'/js/p3-scripts.js', array(), '');
    wp_enqueue_script('p3Scripts');
}
add_action( 'wp_enqueue_scripts', 'p3Scripts' );

//FONTS
//--roboto font
function roboto_font(){
    wp_register_style('robotoFont', 'https://fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,500,500italic,700italic,700');
    wp_enqueue_style( 'robotoFont');
}
add_action('wp_print_styles', 'roboto_font');
//--volkhov font
function volkhov_font(){
    wp_register_style('volkhovFont', 'https://fonts.googleapis.com/css?family=Volkhov:400italic');
    wp_enqueue_style( 'volkhovFont');
}
add_action('wp_print_styles', 'volkhov_font');

//Show post thumbnails into wp admin
add_theme_support('post-thumbnails');
//Show menu tab into wp admin
register_nav_menu('menu', 'menu P3');
//Resize thumbnails
add_theme_support('post-thumbnails');
add_image_size('imagesRoom400x400', 400, 400, true);
//Add prices tag
function pricesTag() {
  register_post_type('price', array(
  'label'=>__('Prices'),
  'singular_label'=>__('Price'),
  'public'=>true,
  'show_ui'=>true,
  'capability_type'=>'post',
  'hierarchical'=>false,
  'supports'=>array('title', 'editor', 'custom-fields')
  ));
  register_taxonomy('category', 'price', array('hierarchical'=>true, 'label'=>'Catégories', 'query_var'=>true, 'rewrite'=>true));
  // register_taxonomy('bestPrice', 'price', array('hierarchical'=>false, 'label'=>'Best price', 'query_var'=>true, 'rewrite'=>true));
}
add_action('init', 'pricesTag');
//Add questions tag
function questionsTag(){
  register_post_type('questions', array(
    'label'=>__('Questions'),
    'singular_label'=>__('Question'),
    'public'=>true,
    'show_ui'=>true,
    'capability_type'=>'post',
    'hierarchical'=>false,
    'supports'=>array('title', 'editor')
    ));
}
add_action('init', 'questionsTag');

//Transform url for onepage
class mono_walker extends Walker_Nav_Menu{
 function start_el(&$output, $item, $depth, $args){
  global $wp_query;
  $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
  $class_names = $value = '';
  $classes = empty( $item->classes ) ? array() : (array) $item->classes;
  
  $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
  $class_names = ' class="'. esc_attr( $class_names ) . '"';
  
  $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';
  
  $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
  $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
  $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
  
  
  $parsedURL = parse_url( esc_attr( $item->url ));
  $cleanURL = substr_replace($parsedURL['path'],'',-1);//remove last '/';
  
  $pathTab = explode('/',$cleanURL);
  $pathTab[sizeof($pathTab)-1] = '#'.$pathTab[sizeof($pathTab)-1];
  $path = implode('/',$pathTab );
  
  $attributes .= ! empty( $item->url )        ? ' href="'   . $path .'"' : '';
  $attributes .= ! empty( $item->url )        ? ' data-title="'   .   sanitize_title($item->title) .'"' : '';
  $description  = ! empty( $item->description ) ? '<span>'.esc_attr( $item->description ).'</span>' : '';
  
  if($depth != 0) $description = "";
  
  $item_output = $args->before;
  $item_output .= '<a'. $attributes .'>';
  $item_output .= $args->link_before .apply_filters( 'the_title', $item->title, $item->ID );
  $item_output .= $description.$args->link_after;
  $item_output .= '</a>';
  $item_output .= $args->after;
  
  $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
 }
}

?>
