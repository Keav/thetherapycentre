<!DOCTYPE html>

<html lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, minimal-ui">
  <meta name="apple-mobile-web-app-capable" content="yes">

	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <title><?php wp_title ( '|', true,'right' ); ?></title>
   <?php do_action('templ_head_meta');?>
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>" />
    <?php do_action('templ_head_css');?>
	<?php
    wp_enqueue_script('jquery');
    wp_enqueue_script('cycle', get_template_directory_uri() . '/js/jquery.cycle.all.min.js', 'jquery', false);
    //wp_enqueue_script('cookie', get_template_directory_uri() . '/js/jquery.cookie.js', 'jquery', true);
	 wp_enqueue_script('nivoslider', get_template_directory_uri() . '/js/slider.js', 'jquery', false);

    if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
    if(is_home()){ // donothing
	} else {
	wp_enqueue_script('script', get_template_directory_uri() . '/js/script.js', 'jquery', false);
	}

    do_action('templ_head_js');
	wp_head();
	?>
     <script src="<?php bloginfo('template_directory'); ?>/js/cookie_jquery.js" type="text/javascript" ></script>
</head>
<body <?php body_class(); ?>>
<?php templ_body_start(); // Body Start hooks?>
<?php  templ_get_top_header_navigation_above() ?>

<div class="wrapper">
<?php templ_header_start(); // Header Start hooks?>
<?php templ_header_end(); // Header End hooks?>
<?php templ_content_start(); // content start hooks?>
<!-- Container -->
<div id="container" class="clear">

 <?php
if ( is_home() ) { ?>

    <div class="top-strip  Page 2 column - Left Sidebar">
<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('top_strip')){?><?php } else {?>  <?php }?>
</div>

   <?php } else {
?>
<div class="top-strip  <?php if(get_option('ptthemes_page_layout')) { ?> <?php echo get_option('ptthemes_page_layout'); ?> <?php } ?>">
<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('top_strip')){?><?php } else {?>  <?php }?>
</div>


 <?php }
?>


<?php /*?><?php */?>
