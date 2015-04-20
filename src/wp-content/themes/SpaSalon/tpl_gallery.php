<?php
/*
Template Name: Page - Gallery
*/
?>
<?php
add_action('wp_head','templ_header_tpl_gallery');
function templ_header_tpl_gallery()
{
	?>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/js/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/slider.js"></script>
    <script type="text/javascript">
   <!--
   var $n = jQuery.noConflict();
        $n(document).ready(function() {    
            $n("a[rel=example_group]").fancybox({
                'transitionIn'		: 'none',
                'transitionOut'		: 'none',
                'titlePosition' 	: 'over',
                'titleFormat'		: function(title, currentArray, currentIndex, currentOpts) {
                    return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
                }
            }); 

			$n('#slider').nivoSlider({
				effect:'random', //Specify sets like: 'random,fold,fade,sliceDown'
				slices:10,
				animSpeed:700,
				pauseTime:3000,
				startSlide:0, //Set starting Slide (0 index)
				directionNav:true, //Next and Prev
				directionNavHide:false, //Only show on hover
				controlNav:true, //1,2,3...
				controlNavThumbs:false, //Use thumbnails for Control Nav
				controlNavThumbsFromRel:false, //Use image rel for thumbs
				controlNavThumbsSearch: '.jpg', //Replace this with...
				controlNavThumbsReplace: '_thumb.jpg', //...this in thumb Image src
				keyboardNav:true, //Use left and right arrows
				pauseOnHover:true, //Stop animation while hovering
				manualAdvance:false, //Force manual transitions
				captionOpacity:0.8, //Universal caption opacity
				beforeChange: function(){},
				afterChange: function(){},
				slideshowEnd: function(){} //Triggers after all slides have been shown
			});
        });
		//-->
    </script> 
	
    <?php
}
?>
<?php get_header(); ?>

<div  class="<?php templ_content_css();?>" >
<!--  CONTENT AREA START -->

<?php if ( have_posts() ) : ?>
<?php while ( have_posts() ) : the_post(); ?>
<?php
$post_large = bdw_get_images(get_the_ID(),'large');
$post_images = bdw_get_images(get_the_ID(),'thumb'); 
?>

<?php $banner = get_post_meta($post->ID, 'banner', $single = true);	?>
<img src="<?php if($banner=='') { bloginfo('template_directory'); echo '/images/banner8.jpg'; } else { echo $banner; } ?>" alt="" class="banner_img"  />


<div class="entry">
  <div <?php post_class('single clear'); ?> id="post_<?php the_ID(); ?>">
  <?php templ_page_title_above(); //page title above action hook?>
     	 <div class="content-title"> <?php echo templ_page_title_filter(get_the_title()); //page tilte filter?></div>
      <?php templ_page_title_below(); //page title below action hook?>
  
    <div class="post-content">
      <?php the_content(); ?>
      <ul class="page_gallery">
        <?php
		if(count($post_images))
		{
			for($im=0;$im<count($post_images);$im++)
			{
				if($post_images[$im])
				{
				?>
				<li> <a  href="<?php echo $post_large[$im];?>" rel="example_group"  > <img class="left" src="<?php echo $post_images[$im];?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" style="height:150px;"  />  <span class="gallery_zoom"></span> </a></li>
				<?php
				}
			}
		}
			?>
      </ul>
    </div>
  </div>
</div>
<?php endwhile; ?>
<?php endif; ?>


<!--  CONTENT AREA END -->
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>