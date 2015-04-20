<?php get_header(); ?>
<div  class="<?php templ_content_css();?>" >
<!--  CONTENT AREA START -->

<img src="<?php bloginfo('template_directory'); ?>/images/banner2.jpg" alt="" class="banner_img"  />

<?php
global $current_user;
if(isset($_GET['author_name'])) :
	$curauth = get_userdatabylogin($author_name);
else :
	$curauth = get_userdata(intval($author));
endif;
?>
<?php templ_page_title_above(); //page title above action hook?>
<div class="content-title"> 
<?php echo templ_page_title_filter( $curauth->display_name); //page tilte filter?> 
<a href="javascript: void(0);" id="mode"<?php if ($_COOKIE['mode'] == 'grid') echo ' class="flip"'; ?>></a> 
</div>
<?php templ_page_title_below(); //page title below action hook?>

<?php get_template_part('loop'); ?>
<?php get_template_part('pagination'); ?>

<!--  CONTENT AREA END -->
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>