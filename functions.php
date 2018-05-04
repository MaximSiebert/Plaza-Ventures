<?php

add_action('after_setup_theme', 'blankslate_setup');
function blankslate_setup()
{
    load_theme_textdomain('blankslate', get_template_directory() . '/languages');
    add_theme_support('title-tag');
    add_theme_support('automatic-feed-links');
    add_theme_support('post-thumbnails');
    global $content_width;
    if (!isset($content_width)) {
        $content_width = 640;
    }

    register_nav_menus(
        array('main-menu' => __('Main Menu', 'blankslate'))
    );
}
add_action('wp_enqueue_scripts', 'blankslate_load_scripts');
function blankslate_load_scripts()
{
    wp_enqueue_script('jquery');
}
add_action('comment_form_before', 'blankslate_enqueue_comment_reply_script');
function blankslate_enqueue_comment_reply_script()
{
    if (get_option('thread_comments')) {wp_enqueue_script('comment-reply');}
}
add_filter('the_title', 'blankslate_title');
function blankslate_title($title)
{
    if ($title == '') {
        return '&rarr;';
    } else {
        return $title;
    }
}
add_filter('wp_title', 'blankslate_filter_wp_title');
function blankslate_filter_wp_title($title)
{
    return $title . esc_attr(get_bloginfo('name'));
}
add_action('widgets_init', 'blankslate_widgets_init');
function blankslate_widgets_init()
{
    register_sidebar(array(
        'name' => __('Sidebar Widget Area', 'blankslate'),
        'id' => 'primary-widget-area',
        'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
        'after_widget' => "</li>",
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
}
function blankslate_custom_pings($comment)
{
    $GLOBALS['comment'] = $comment;
    ?>
    <li <?php comment_class();?> id="li-comment-
        <?php comment_ID();?>">
        <?php echo comment_author_link(); ?>
    </li>
    <?php
}
add_filter('get_comments_number', 'blankslate_comments_number');
function blankslate_comments_number($count)
{
    if (!is_admin()) {
        global $id;
        $comments_by_type = &separate_comments(get_comments('status=approve&post_id=' . $id));
        return count($comments_by_type['comment']);
    } else {
        return $count;
    }
}

function themeslug_theme_customizer($wp_customize)
{
    $wp_customize->add_section('themeslug_logo_section', array(
        'title' => __('Logo', 'themeslug'),
        'priority' => 30,
        'description' => 'Upload a logo to replace the default site name in the header',
    ));
    $wp_customize->add_setting('themeslug_logo');
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'themeslug_logo', array(
        'label' => __('Logo', 'themeslug'),
        'section' => 'themeslug_logo_section',
        'settings' => 'themeslug_logo',
    )));
    $wp_customize->add_setting('themeslug_logo_small');
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'themeslug_logo_small', array(
        'label' => __('Logo Small', 'themeslug'),
        'section' => 'themeslug_logo_section',
        'settings' => 'themeslug_logo_small',
    )));
}
add_action('customize_register', 'themeslug_theme_customizer');

function my_mce4_options($init) {

    $custom_colours = '
        "F70F26", "Red",
        "3E96F1", "Blue",
    ';

    // build colour grid default+custom colors
    $init['textcolor_map'] = '['.$custom_colours.']';

    // change the number of rows in the grid if the number of colors changes
    // 8 swatches per row
    $init['textcolor_rows'] = 1;

    return $init;
}
add_filter('tiny_mce_before_init', 'my_mce4_options');

if (function_exists('acf_add_options_page')) {
    acf_add_options_page();
}

function my_acf_init() {
	
	acf_update_setting('google_api_key', 'AIzaSyBjMI2ks8YnOOjyNBYjYfxpLV0QXCABB5g');
}

add_action('acf/init', 'my_acf_init');

function register_my_menu()
{
    register_nav_menu('secondary-menu', __('Secondary Menu'));
    register_nav_menu('archive-menu', __('Archive Menu'));
}
add_action('init', 'register_my_menu');

add_action('init', 'cptt_custom_post_types');
function cptt_custom_post_types()
{
    register_post_type('portfolio',
        array(
            'labels' => array(
                'name' => __('Portfolio'),
                'singular_name' => __('Portfolio Company'),
            ),
            'public' => true,
            'has_archive' => true,
            'taxonomies'  => array( 'category' ),
            'supports' => array('title', 'editor', 'thumbnail'),
            'menu_icon' => 'dashicons-laptop',
            'rewrite' => array('slug' => 'portfolio', 'with_front' => false),
        )
    );

    flush_rewrite_rules(false);

}

add_action('init', 'init_remove_support', 100);
function init_remove_support()
{
    $post_type = 'post';
    remove_post_type_support($post_type, 'editor');
}


function doctype_opengraph($output) {
    return $output . '
    xmlns:og="http://opengraphprotocol.org/schema/"
    xmlns:fb="http://www.facebook.com/2008/fbml"';
}
add_filter('language_attributes', 'doctype_opengraph');


function fb_opengraph()
{
    global $post;

    if (is_single()) {
        if (has_post_thumbnail($post->ID)) {
            $img_src = get_the_post_thumbnail_url($post->ID,'full');
        } else {
            $img_src = get_stylesheet_directory_uri() . '/images/placeholder.png';
        }
        if ($excerpt = $post->post_excerpt) {
            $excerpt = strip_tags($post->post_excerpt);
            $excerpt = str_replace("", "'", $excerpt);
        } else {
            $excerpt = get_bloginfo('description');
        }
        ?>
    
    <script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js#property=5ace676415e550001323fb28&product=custom-share-buttons"></script>
    <meta property="og:title" content="<?php echo the_title(); ?>"/>
    <meta property="og:description" content="<?php echo $excerpt; ?>"/>
    <meta property="og:type" content="article"/>
    <meta property="og:url" content="<?php echo the_permalink(); ?>"/>
    <meta property="og:site_name" content="<?php echo get_bloginfo(); ?>"/>
    <meta property="og:image" content="<?php echo $img_src; ?>"/>
    <link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo('stylesheet_directory'); ?>/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php bloginfo('stylesheet_directory'); ?>/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php bloginfo('stylesheet_directory'); ?>/favicons/favicon-16x16.png">
    <link rel="manifest" href="<?php bloginfo('stylesheet_directory'); ?>/site.webmanifest">
    <meta name="msapplication-TileColor" content="#f70f26">
    <meta name="theme-color" content="#f70f26">

<?php
} else { ?>
        <meta property="og:image" content="<?php echo $img_src; ?>"/>
        <link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo('stylesheet_directory'); ?>/favicons/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php bloginfo('stylesheet_directory'); ?>/favicons/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="<?php bloginfo('stylesheet_directory'); ?>/favicons/favicon-16x16.png">
        <link rel="manifest" href="<?php bloginfo('stylesheet_directory'); ?>/site.webmanifest">
        <meta name="msapplication-TileColor" content="#f70f26">
        <meta name="theme-color" content="#f70f26">
   <?php }
}
add_action('wp_head', 'fb_opengraph', 5);



