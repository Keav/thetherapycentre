<?php get_header(); ?>

<div  class="<?php templ_content_css();?>" >
<!--  CONTENT AREA START -->
	<?php templ_before_single_entry(); // before single entry  hooks?>
    <?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : the_post(); ?>
    
    
<img src="<?php bloginfo('template_directory'); ?>/images/banner4.jpg" alt="" class="banner_img"  />

    
    <div class="entry">
      <div <?php post_class('single clear'); ?> id="post_<?php the_ID(); ?>">
		<?php templ_page_title_above(); //page title above action hook?>
          <?php // echo templ_page_title_filter(get_the_title()); //page tilte filter?>
		  
            
            <?php  echo templ_page_title_filter(get_the_title()); //page tilte filter?>
        <div class="post-meta">
          
            
          <?php templ_page_title_below(); //page title below action hook?>
          <?php if(templ_is_show_post_author()){?>
          by <span class="post-author"> <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" title="Posts by <?php the_author(); ?>">
          <?php the_author(); ?>
          </a> </span>
          <?php } ?>
          <?php if(templ_is_show_post_date()){?>
          on <span class="post-date">
          <?php the_time(templ_get_date_format()) ?>
          </span>
          <?php } ?>
          <?php if(templ_is_show_post_comment()){?>
          <em>&bull; </em>
          <?php comments_popup_link(__('No Comments','templatic'), __('1 Comment','templatic'), __('% Comments','templatic'), '', __('Comments Closed','templatic')); ?>
          <?php } ?>
            
		<?php if(get_post_format( $post->ID )){
        $format = get_post_format( $post->ID );
        ?>
        <em>&bull; </em>
        <a href="<?php echo get_post_format_link($format); ?>" title="<?php esc_attr_e( 'View '. $format, 'templatic' ); ?>"><?php _e( 'More '. $format, 'templatic' ); ?></a>
        <?php } ?>
          <?php if(templ_is_show_post_tags()){?>
          <em>&bull; </em>
          <?php the_tags('<span class="post-tags">', ', ', '</span>'); ?>
          <?php } ?>
          <?php if(templ_is_show_post_category()){?>
          <?php the_category(' <span>/</span> '); ?>
          <?php } ?>
        </div>
        <?php templ_before_single_post_content(); // BEFORE  single post content  hooks?>
        
        <!--  Post Content Condition for Post Format-->
        <?php if ( has_post_format( 'chat' )){?>
        
        <div class="post-content">
        <?php the_content(); ?>
        </div>
        
        <?php }elseif(has_post_format( 'gallery' )){?>
        
        <div class="post-content">
        <?php the_content(); ?>
        </div>
        
        <?php }elseif(has_post_format( 'image' )){?>
        
        <div class="post-content">
        
        <?php the_content(); ?>
        </div>
        
        <?php }elseif(has_post_format( 'link' )){?>
        
        <div class="post-content">
        <?php the_content(); ?>
        </div>
        
        <?php }elseif(has_post_format( 'video' )){?>
        
        <div class="post-content">
        <?php the_content(); ?>
        </div>
        
        <?php }elseif(has_post_format( 'audio' )){?>
        
        <div class="post-content">
        <?php the_content(); ?>
        </div>
        
        <?php }elseif(has_post_format( 'quote' )){?> 
        
        <div class="post-content">
        <?php the_content(); ?>
        </div>
        
        <?php }elseif(has_post_format( 'status' )){?> 
        
        <div class="post-content">
        <?php the_content(); ?>
        </div>
        
        <?php }else{?>
        
        <div class="post-content">
        <?php the_content(); ?>
        </div>
        
        <?php }?>  
        <!--  Post Content Condition for Post Format-->
        
        <?php templ_after_single_post_content(); // after single post content hooks?>
       <!-- twitter & facebook likethis option-->
        <?php 
            templ_show_twitter_button();
            templ_show_facebook_button();
        ?>  <!--#end -->
      </div>
      <div class="post-navigation clear">
        <?php
            $prev_post = get_adjacent_post(false, '', true);
            $next_post = get_adjacent_post(false, '', false); ?>
        <?php if ($prev_post) : $prev_post_url = get_permalink($prev_post->ID); $prev_post_title = $prev_post->post_title; ?>
        <a class="post-prev" href="<?php echo $prev_post_url; ?>"><em>Previous post</em><span><?php echo $prev_post_title; ?></span></a>
        <?php endif; ?>
        <?php if ($next_post) : $next_post_url = get_permalink($next_post->ID); $next_post_title = $next_post->post_title; ?>
        <a class="post-next" href="<?php echo $next_post_url; ?>"><em>Next post</em><span><?php echo $next_post_title; ?></span></a>
        <?php endif; ?>
      </div>
      
      <?php endwhile; ?>
    <?php endif; ?>
     <?php templ_after_single_entry(); // after single entry  hooks?>
    <?php if (function_exists('dynamic_sidebar')){ dynamic_sidebar('single_post_below'); }?>
    <?php comments_template(); ?>
      
    </div>
    

<!--  CONTENT AREA END -->    
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>