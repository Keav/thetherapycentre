<?php
/*
Template Name: Page - Right Sidebar
*/
?>
<?php get_header(); ?>
<?php if ( have_posts() ) : ?>
<?php while ( have_posts() ) : the_post(); ?>
<!-- Content  2 column - Right Sidebar  -->
<div class="content left">

<?php $banner = get_post_meta($post->ID, 'banner', $single = true);	?>
<img src="<?php if($banner=='') { bloginfo('template_directory'); echo '/images/banner9.jpg'; } else { echo $banner; } ?>" alt="" class="banner_img"  />


  <?php if (function_exists('dynamic_sidebar')){ dynamic_sidebar('page_content_above'); }?>
  <div class="entry">
  <?php templ_page_title_above(); //page title above action hook?>
       <div class="content-title"><?php echo templ_page_title_filter(get_the_title()); //page tilte filter?></div>
      <?php templ_page_title_below(); //page title below action hook?>
  
 
  
    <div <?php post_class('single clear'); ?> id="post_<?php the_ID(); ?>">
      <div class="post-content">
        <?php the_content(); ?>
      </div>
    </div>
  </div>
</div>
<!-- /Content -->
<?php endwhile; ?>
<?php endif; ?>
<div class="sidebar right inner_right" >
  <?php if (function_exists('dynamic_sidebar')){ dynamic_sidebar('sidebar1');}?>
</div>
<!-- sidebar #end -->
<!--Page 2 column - Right Sidebar #end  -->
<?php get_footer(); ?>
