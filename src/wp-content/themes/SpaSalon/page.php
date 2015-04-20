<?php get_header(); ?>
<div  class="<?php templ_content_css();?> " >
<!--  CONTENT AREA START -->

<?php if ( have_posts() ) : ?>
<?php while ( have_posts() ) : the_post(); ?>
<?php $banner = get_post_meta($post->ID, 'banner', $single = true);	?>

 
    	<img src="<?php if($banner=='') { bloginfo('template_directory'); echo '/images/banner1.jpg'; } else { echo $banner; } ?>" alt="" class="banner_img"  />
     

<div class="entry">
  <div <?php post_class('single clear'); ?> id="post_<?php the_ID(); ?>">
  <?php templ_page_title_above(); //page title above action hook?>
       <div class="content-title"><?php echo templ_page_title_filter(get_the_title()); //page tilte filter?></div>
      <?php templ_page_title_below(); //page title below action hook?>
    
    <div class="post-content">
      <?php the_content(); ?>
    </div>
   </div>
</div>
<?php endwhile; ?>
<?php endif; ?>


<!--  CONTENT AREA END -->
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>