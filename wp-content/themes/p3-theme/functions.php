<?php
//
//LOAD SCRIPTS AND STYLESHEETS
//--jQuery
function jQueryScripts(){
    wp_register_script('jqueryjs',  'https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js', array(), '1.11.3');
    wp_enqueue_script('jqueryjs');
}
add_action('init', 'jQueryScripts');
//--p3-scripts.js
function p3Scripts() {
    wp_register_script('p3Scripts', get_bloginfo('stylesheet_directory').'/js/p3.min.js', array(), '');
    wp_enqueue_script('p3Scripts');
}
add_action( 'wp_enqueue_scripts', 'p3Scripts' );

//
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

//
//ADMIN WORDPRESS
//--post thumbnails
add_theme_support('post-thumbnails');
//--menu tab
register_nav_menu('menu', 'menu P3');
//--widgets tab 
if (function_exists('register_sidebar'))
register_sidebar(array(
  'name' => 'identityCard',
  'before_widget' => '<div class="identity-card clearfix"><div class="logo-p3"></div>',
  'after_widget'  => ''
));
register_sidebar(array(
  'name' => 'socialNetworks',
  'before_widget' => '',
  'after_widget'  => '</div>'
));
register_sidebar(array(
  'name' => 'sentenceFr',
  'before_widget' => '',
  'after_widget'  => ''
));
register_sidebar(array(
  'name' => 'sentenceEn',
  'before_widget' => '',
  'after_widget'  => ''
));
register_sidebar(array(
  'name' => 'sentenceNl',
  'before_widget' => '',
  'after_widget'  => ''
));

//--resize thumbnails
add_theme_support('post-thumbnails');
add_image_size('imagesRoom400x400', 400, 400, true);
add_image_size('gallery300x300', 300, 300, true);
//--add prices menu
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
//--add questions menu
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

//
//TRANSFORM gallery
add_filter('post_gallery', 'my_post_gallery', 10, 2);
function my_post_gallery($output, $attr) {
    global $post;
    if (isset($attr['orderby'])) {
        $attr['orderby'] = sanitize_sql_orderby($attr['orderby']);
        if (!$attr['orderby'])
            unset($attr['orderby']);
    }
    extract(shortcode_atts(array(
        'order' => 'ASC',
        'orderby' => 'menu_order ID',
        'id' => $post->ID,
        'itemtag' => 'dl',
        'icontag' => 'dt',
        'captiontag' => 'dd',
        'columns' => 7,
        'size' => 'gallery300x300',
        'include' => '',
        'exclude' => ''
    ), $attr));

    $id = intval($id);
    if ('RAND' == $order) $orderby = 'none';

    if (!empty($include)) {
        $include = preg_replace('/[^0-9,]+/', '', $include);
        $_attachments = get_posts(array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));

        $attachments = array();
        foreach ($_attachments as $key => $val) {
            $attachments[$val->ID] = $_attachments[$key];
        }
    }

    if (empty($attachments)) return '';

    $output = "<ul class=\"gallery clearfix list-unstyled\">\n";
    // Now you loop through each attachment
    foreach ($attachments as $id => $attachment) {
        // Fetch the thumbnail (or full image, it's up to you)
        $img = wp_get_attachment_image_src($id, 'gallery300x300');
        $url = wp_get_attachment_url( $id );

        $output .= "<li>\n";
        $output .= "<div class=\"losange\">\n";
        $output .= "<div class=\"los1\">\n";
        $output .= "<a href=\"$url\" class=\"fancybox image\" rel=\"gallery-0\" tabindex=\"0\">\n";
        $output .= "<img src=\"{$img[0]}\" width=\"{$img[1]}\" height=\"{$img[2]}\" alt=\"\" />\n";
        $output .= "</a>\n";
        $output .= "</div>\n";
        $output .= "</div>\n";
        $output .= "</li>\n";
    }

    $output .= "</ul>\n";
    return $output;
}

//
//TRANSFORM URL FOR ONEPAGE
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