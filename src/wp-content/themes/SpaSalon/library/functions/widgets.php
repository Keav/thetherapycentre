<?php
/********************************************************************
You can add your widgets in this file and it will affected.
This is the theme related widgets functions file where you can add you created widget code.\
The file is included in functions.php  file of theme root.
********************************************************************/


// =============================== Top strip contact======================================
if(!class_exists('templ_top_strip_social'))
{
	class templ_top_strip_social extends WP_Widget {
		function templ_top_strip_social() {
		//Constructor
			$widget_ops = array('classname' => 'widget templ_top_strip_social', 'description' => apply_filters('templ_top_strip_social_desc_filter','Show social media icons on top of the page; recommended in the &lsquo;Top strip&rsquo; section') );		
			$this->WP_Widget('widget_templ_top_strip_social', apply_filters('templ_top_strip_social_widget_title_filter','T &rarr; Top strip social media'), $widget_ops);
		}
		function widget($args, $instance) {
		// prints the widget
			extract($args, EXTR_SKIP);
			$ts_social_twitter = empty($instance['ts_social_twitter']) ? '' : apply_filters('ts_social_twitter', $instance['ts_social_twitter']);
			$ts_social_fb = empty($instance['ts_social_fb']) ? '' : apply_filters('ts_social_fb', $instance['ts_social_fb']);
			$ts_social_linkedin = empty($instance['ts_social_linkedin']) ? '' : apply_filters('ts_social_linkedin', $instance['ts_social_linkedin']);
			$ts_social_rss = empty($instance['ts_social_rss']) ? '' : apply_filters('ts_social_rss', $instance['ts_social_rss']);
			
 			?>						
		   
         	<ul class="top-strip-icons">
            	<?php if($ts_social_twitter){ ?> <li><a class="twitter" href="<?php echo $ts_social_twitter; ?>"></a> </li> <?php } ?>
                <?php if($ts_social_fb){ ?> <li><a class="fb" href="<?php echo $ts_social_fb; ?>"></a> </li> <?php } ?>
                <?php if($ts_social_linkedin){ ?> <li><a class="linkedin" href="<?php echo $ts_social_linkedin; ?>"></a> </li> <?php } ?>
                <?php if($ts_social_rss){ ?> <li><a class="rss" href="<?php echo $ts_social_rss; ?>"></a> </li> <?php } ?>
            </ul>
                
           
                  
		<?php
		}
		function update($new_instance, $old_instance) {
		//save the widget
			$instance = $old_instance;		
			$instance['ts_social_twitter'] = strip_tags($new_instance['ts_social_twitter']);
			$instance['ts_social_fb'] = ($new_instance['ts_social_fb']);
			$instance['ts_social_linkedin'] = ($new_instance['ts_social_linkedin']);
			$instance['ts_social_rss'] = ($new_instance['ts_social_rss']);
 			return $instance;
		}
		function form($instance) {
		//widgetform in backend
			$instance = wp_parse_args( (array) $instance, array( 'ts_social_twitter' => '') );		
			$ts_social_twitter = strip_tags($instance['ts_social_twitter']);			
			$ts_social_fb = ($instance['ts_social_fb']);
			$ts_social_linkedin = ($instance['ts_social_linkedin']);
			$ts_social_rss = ($instance['ts_social_rss']);
 		?>
        
        <p><label for="<?php  echo $this->get_field_id('ts_social_twitter'); ?>"><?php _e('Twitter full URL','templatic');?>: <input class="widefat" id="<?php  echo $this->get_field_id('ts_social_twitter'); ?>" name="<?php echo $this->get_field_name('ts_social_twitter'); ?>" type="text" value="<?php echo attribute_escape($ts_social_twitter); ?>" /></label></p>
        
        <p><label for="<?php  echo $this->get_field_id('ts_social_fb'); ?>"><?php _e('Facebook full URL','templatic');?>: <input class="widefat" id="<?php  echo $this->get_field_id('ts_social_fb'); ?>" name="<?php echo $this->get_field_name('ts_social_fb'); ?>" type="text" value="<?php echo attribute_escape($ts_social_fb); ?>" /></label></p>
        
        <p><label for="<?php  echo $this->get_field_id('ts_social_linkedin'); ?>"><?php _e('Linkedin full URL','templatic');?>: <input class="widefat" id="<?php  echo $this->get_field_id('ts_social_linkedin'); ?>" name="<?php echo $this->get_field_name('ts_social_linkedin'); ?>" type="text" value="<?php echo attribute_escape($ts_social_linkedin); ?>" /></label></p>
        
        <p><label for="<?php  echo $this->get_field_id('ts_social_rss'); ?>"><?php _e('RSS feeds full URL','templatic');?>: <input class="widefat" id="<?php  echo $this->get_field_id('ts_social_rss'); ?>" name="<?php echo $this->get_field_name('ts_social_rss'); ?>" type="text" value="<?php echo attribute_escape($ts_social_rss); ?>" /></label></p>
        
       
		<?php
	}}
	register_widget('templ_top_strip_social');
}

// =============================== Top strip Social media icons======================================
if(!class_exists('templ_top_strip_contact'))
{
	class templ_top_strip_contact extends WP_Widget {
		function templ_top_strip_contact() {
		//Constructor
			$widget_ops = array('classname' => 'widget templ_top_strip_contact', 'description' => apply_filters('templ_top_strip_contact_desc_filter','Show phone number on top of the page; recommended in the &lsquo;Top strip&rsquo; section') );		
			$this->WP_Widget('widget_templ_top_strip_contact', apply_filters('templ_top_strip_contact_widget_title_filter','T &rarr; Top strip contact'), $widget_ops);
		}
		function widget($args, $instance) {
		// prints the widget
			extract($args, EXTR_SKIP);
			$ts_contact_text = empty($instance['ts_contact_text']) ? '' : apply_filters('widget_ts_contact_text', $instance['ts_contact_text']);
			$ts_contact_link_URL = empty($instance['ts_contact_link_URL']) ? '' : apply_filters('widget_ts_contact_link_URL', $instance['ts_contact_link_URL']);
			$ts_contact_link_text = empty($instance['ts_contact_link_text']) ? '' : apply_filters('widget_ts_contact_link_text', $instance['ts_contact_link_text']);
			
 			?>						
		   
         	<div class="strip-contact"><p><?php if($ts_contact_text){ echo $ts_contact_text; }  ?></p></div>
                
           
                  
		<?php
		}
		function update($new_instance, $old_instance) {
		//save the widget
			$instance = $old_instance;		
			$instance['ts_contact_text'] = strip_tags($new_instance['ts_contact_text']);
			$instance['ts_contact_link_URL'] = ($new_instance['ts_contact_link_URL']);
			$instance['ts_contact_link_text'] = ($new_instance['ts_contact_link_text']);
 			return $instance;
		}
		function form($instance) {
		//widgetform in backend
			$instance = wp_parse_args( (array) $instance, array( 'ts_contact_text' => '') );		
			$ts_contact_text = strip_tags($instance['ts_contact_text']);			
			$ts_contact_link_URL = ($instance['ts_contact_link_URL']);
			$ts_contact_link_text = ($instance['ts_contact_link_text']);
 		?>
		<p><label for="<?php  echo $this->get_field_id('ts_contact_text'); ?>"><?php _e('Contact text (eg. For reservation, call: XXX-XXX-XXXX)','templatic');?>: <input class="widefat" id="<?php  echo $this->get_field_id('ts_contact_text'); ?>" name="<?php echo $this->get_field_name('ts_contact_text'); ?>" type="text" value="<?php echo attribute_escape($ts_contact_text); ?>" /></label></p>
        
       <?php /*?> <p><label for="<?php  echo $this->get_field_id('ts_contact_link_URL'); ?>"><?php _e('Link URL','templatic');?>: <input class="widefat" id="<?php  echo $this->get_field_id('ts_contact_link_URL'); ?>" name="<?php echo $this->get_field_name('ts_contact_link_URL'); ?>" type="text" value="<?php echo attribute_escape($ts_contact_link_URL); ?>" /></label></p>
        
        <p><label for="<?php  echo $this->get_field_id('ts_contact_link_text'); ?>"><?php _e('Link text','templatic');?>: <input class="widefat" id="<?php  echo $this->get_field_id('ts_contact_link_text'); ?>" name="<?php echo $this->get_field_name('ts_contact_link_text'); ?>" type="text" value="<?php echo attribute_escape($ts_contact_link_text); ?>" /></label></p><?php */?>
        
       
		<?php
	}}
	register_widget('templ_top_strip_contact');
}

// =============================== Homepage Slider ======================================
if(!class_exists('templ_home_slider'))
{
	class templ_home_slider extends WP_Widget {
		function templ_home_slider() {
		//Constructor
			$widget_ops = array('classname' => 'widget templ_home_slider', 'description' => apply_filters('templ_home_slider_desc_filter','Show images in a beautiful slider on homepage; Recommendation: Put this widget in the &lsquo;Homepage: Content&rsquo; section') );		
			$this->WP_Widget('widget_templ_home_slider', apply_filters('templ_home_slider_widget_title_filter','T &rarr; Homepage: Slider'), $widget_ops);
		}
		function widget($args, $instance) {
		// prints the widget
			extract($args, EXTR_SKIP);
			$slider_img_1 = empty($instance['slider_img_1']) ? '' : apply_filters('widget_slider_img_1', $instance['slider_img_1']);
			$slider_img_2 = empty($instance['slider_img_2']) ? '' : apply_filters('widget_slider_img_2', $instance['slider_img_2']);
			$slider_img_3 = empty($instance['slider_img_3']) ? '' : apply_filters('widget_slider_img_3', $instance['slider_img_3']);
			$slider_img_4 = empty($instance['slider_img_4']) ? '' : apply_filters('widget_slider_img_4', $instance['slider_img_4']);
			$slider_img_5 = empty($instance['slider_img_5']) ? '' : apply_filters('widget_slider_img_5', $instance['slider_img_5']);
			
			$slider_cap_1 = empty($instance['slider_cap_1']) ? '' : apply_filters('widget_slider_cap_1', $instance['slider_cap_1']);
			$slider_cap_2 = empty($instance['slider_cap_2']) ? '' : apply_filters('widget_slider_cap_2', $instance['slider_cap_2']);
			$slider_cap_3 = empty($instance['slider_cap_3']) ? '' : apply_filters('widget_slider_cap_3', $instance['slider_cap_3']);
			$slider_cap_4 = empty($instance['slider_cap_4']) ? '' : apply_filters('widget_slider_cap_4', $instance['slider_cap_4']);
			$slider_cap_5 = empty($instance['slider_cap_5']) ? '' : apply_filters('widget_slider_cap_5', $instance['slider_cap_5']);
			
			$slider_anim_speed = empty($instance['slider_anim_speed']) ? '' : apply_filters('widget_slider_anim_speed', $instance['slider_anim_speed']);
			$slider_change_speed = empty($instance['slider_change_speed']) ? '' : apply_filters('widget_slider_change_speed', $instance['slider_change_speed']);


			
 			?>	
            
            <script type="text/javascript">
			   <!--
			   var $n = jQuery.noConflict();
					jQuery(document).ready(function() {    
						$n('#slider').nivoSlider({
							effect:'random', //Specify sets like: 'random,fold,fade,sliceDown'
							slices:10,
							animSpeed:<?php if($slider_anim_speed){ echo $slider_anim_speed*1000; } else { echo 700; } ?>,
							pauseTime:<?php if($slider_change_speed){ echo $slider_change_speed*1000; } else { echo 5000; } ?>,
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
							captionOpacity:0.7, //Universal caption opacity
							beforeChange: function(){},
							afterChange: function(){},
							slideshowEnd: function(){} //Triggers after all slides have been shown
						});
					});
					//-->
			</script> 					
		   
 			<div id="slider">
           	<?php if($slider_img_1){?><img src="<?php echo $slider_img_1; ?>" alt="<?php echo $slider_cap_1; ?>" title="<?php echo $slider_cap_1; ?>"/><?php }  ?>
            <?php if($slider_img_2){?><img src="<?php echo $slider_img_2; ?>" alt="<?php echo $slider_cap_2; ?>" title="<?php echo $slider_cap_2; ?>"/><?php }  ?>
            <?php if($slider_img_3){?><img src="<?php echo $slider_img_3; ?>" alt="<?php echo $slider_cap_3; ?>" title="<?php echo $slider_cap_3; ?>"/><?php }  ?>
            <?php if($slider_img_4){?><img src="<?php echo $slider_img_4; ?>" alt="<?php echo $slider_cap_4; ?>" title="<?php echo $slider_cap_4; ?>"/><?php }  ?>
            <?php if($slider_img_5){?><img src="<?php echo $slider_img_5; ?>" alt="<?php echo $slider_cap_5; ?>" title="<?php echo $slider_cap_5; ?>"/><?php }  ?>
			</div>
            
           
           
                  
		<?php
		}
		function update($new_instance, $old_instance) {
		//save the widget
			$instance = $old_instance;		
			$instance['slider_img_1'] = strip_tags($new_instance['slider_img_1']);
			$instance['slider_img_2'] = ($new_instance['slider_img_2']);
			$instance['slider_img_3'] = ($new_instance['slider_img_3']);
			$instance['slider_img_4'] = ($new_instance['slider_img_4']);
			$instance['slider_img_5'] = ($new_instance['slider_img_5']);
			
			$instance['slider_cap_1'] = ($new_instance['slider_cap_1']);
			$instance['slider_cap_2'] = ($new_instance['slider_cap_2']);
			$instance['slider_cap_3'] = ($new_instance['slider_cap_3']);
			$instance['slider_cap_4'] = ($new_instance['slider_cap_4']);
			$instance['slider_cap_5'] = ($new_instance['slider_cap_5']);
			
			$instance['slider_anim_speed'] = ($new_instance['slider_anim_speed']);
			$instance['slider_change_speed'] = ($new_instance['slider_change_speed']);
			
 			return $instance;
		}
		function form($instance) {
		//widgetform in backend
			$instance = wp_parse_args( (array) $instance, array( 'slider_img_1' => '') );		
			$slider_img_1 = strip_tags($instance['slider_img_1']);
			$slider_img_2 = ($instance['slider_img_2']);
			$slider_img_3 = ($instance['slider_img_3']);
			$slider_img_4 = ($instance['slider_img_4']);
			$slider_img_5 = ($instance['slider_img_5']);
			
			$slider_cap_1 = ($instance['slider_cap_1']);
			$slider_cap_2 = ($instance['slider_cap_2']);
			$slider_cap_3 = ($instance['slider_cap_3']);
			$slider_cap_4 = ($instance['slider_cap_4']);
			$slider_cap_5 = ($instance['slider_cap_5']);
			
			$slider_anim_speed = ($instance['slider_anim_speed']);
			$slider_change_speed = ($instance['slider_change_speed']);
 		?>
        
        <p>Note: Please provide full path to images</p>
        
		<p><label for="<?php  echo $this->get_field_id('slider_img_1'); ?>"><?php _e('Image #1 URL','templatic');?>: <input class="widefat" id="<?php  echo $this->get_field_id('slider_img_1'); ?>" name="<?php echo $this->get_field_name('slider_img_1'); ?>" type="text" value="<?php echo attribute_escape($slider_img_1); ?>" /></label></p>
        
        	<p><label for="<?php  echo $this->get_field_id('slider_cap_1'); ?>"><?php _e('Image #1 caption','templatic');?>: <input class="widefat" id="<?php  echo $this->get_field_id('slider_cap_1'); ?>" name="<?php echo $this->get_field_name('slider_cap_1'); ?>" type="text" value="<?php echo attribute_escape($slider_cap_1); ?>" /></label></p>
            
        <br /><br />
            
        <p><label for="<?php  echo $this->get_field_id('slider_img_2'); ?>"><?php _e('Image #2 URL','templatic');?>: <input class="widefat" id="<?php  echo $this->get_field_id('slider_img_2'); ?>" name="<?php echo $this->get_field_name('slider_img_2'); ?>" type="text" value="<?php echo attribute_escape($slider_img_2); ?>" /></label></p>
        
        	<p><label for="<?php  echo $this->get_field_id('slider_cap_2'); ?>"><?php _e('Image #2 caption','templatic');?>: <input class="widefat" id="<?php  echo $this->get_field_id('slider_cap_2'); ?>" name="<?php echo $this->get_field_name('slider_cap_2'); ?>" type="text" value="<?php echo attribute_escape($slider_cap_2); ?>" /></label></p>
            
        <br /><br />
            
        <p><label for="<?php  echo $this->get_field_id('slider_img_3'); ?>"><?php _e('Image #3 URL','templatic');?>: <input class="widefat" id="<?php  echo $this->get_field_id('slider_img_3'); ?>" name="<?php echo $this->get_field_name('slider_img_3'); ?>" type="text" value="<?php echo attribute_escape($slider_img_3); ?>" /></label></p>
        
        	<p><label for="<?php  echo $this->get_field_id('slider_cap_3'); ?>"><?php _e('Image #3 caption','templatic');?>: <input class="widefat" id="<?php  echo $this->get_field_id('slider_cap_3'); ?>" name="<?php echo $this->get_field_name('slider_cap_3'); ?>" type="text" value="<?php echo attribute_escape($slider_cap_3); ?>" /></label></p>
            
        <br /><br />
            
        <p><label for="<?php  echo $this->get_field_id('slider_img_4'); ?>"><?php _e('Image #4 URL','templatic');?>: <input class="widefat" id="<?php  echo $this->get_field_id('slider_img_4'); ?>" name="<?php echo $this->get_field_name('slider_img_4'); ?>" type="text" value="<?php echo attribute_escape($slider_img_4); ?>" /></label></p>
        
        	<p><label for="<?php  echo $this->get_field_id('slider_cap_4'); ?>"><?php _e('Image #4 caption','templatic');?>: <input class="widefat" id="<?php  echo $this->get_field_id('slider_cap_4'); ?>" name="<?php echo $this->get_field_name('slider_cap_4'); ?>" type="text" value="<?php echo attribute_escape($slider_cap_4); ?>" /></label></p>
            
        <br /><br />
            
        <p><label for="<?php  echo $this->get_field_id('slider_img_5'); ?>"><?php _e('Image #5 caption','templatic');?>: <input class="widefat" id="<?php  echo $this->get_field_id('slider_img_5'); ?>" name="<?php echo $this->get_field_name('slider_img_5'); ?>" type="text" value="<?php echo attribute_escape($slider_img_5); ?>" /></label></p>
        
        	<p><label for="<?php  echo $this->get_field_id('slider_cap_5'); ?>"><?php _e('Image #5 caption','templatic');?>: <input class="widefat" id="<?php  echo $this->get_field_id('slider_cap_5'); ?>" name="<?php echo $this->get_field_name('slider_cap_5'); ?>" type="text" value="<?php echo attribute_escape($slider_cap_5); ?>" /></label></p>
        
        <br /><br />
        
        <p><label for="<?php  echo $this->get_field_id('slider_anim_speed'); ?>"><?php _e('Set animation transition speed in seconds (default: 0.7)','templatic');?>: <input class="widefat" id="<?php  echo $this->get_field_id('slider_anim_speed'); ?>" name="<?php echo $this->get_field_name('slider_anim_speed'); ?>" type="text" value="<?php echo attribute_escape($slider_anim_speed); ?>" /></label></p>
        
        <p><label for="<?php  echo $this->get_field_id('slider_change_speed'); ?>"><?php _e('Change picture every X seconds (default: 5)','templatic');?>: <input class="widefat" id="<?php  echo $this->get_field_id('slider_change_speed'); ?>" name="<?php echo $this->get_field_name('slider_change_speed'); ?>" type="text" value="<?php echo attribute_escape($slider_change_speed); ?>" /></label></p>
		
		<?php
	}}
	register_widget('templ_home_slider');
}


// =============================== Homepage Intro content ======================================
if(!class_exists('templ_home_intro_content'))
{
	class templ_home_intro_content extends WP_Widget {
		function templ_home_intro_content() {
		//Constructor
			$widget_ops = array('classname' => 'widget templ_home_intro_content', 'description' => apply_filters('templ_home_intro_content_desc_filter','Intro paragraph on the homepage; recommended in the &lsquo;Homepage: Content&rsquo; section') );		
			$this->WP_Widget('widget_templ_home_intro_content', apply_filters('templ_home_intro_content_widget_title_filter','T &rarr; Homepage: Intro content'), $widget_ops);
		}
		function widget($args, $instance) {
		// prints the widget
			extract($args, EXTR_SKIP);
			$intro_title = empty($instance['intro_title']) ? '' : apply_filters('widget_intro_title', $instance['intro_title']);		
			$intro_desc = empty($instance['intro_desc']) ? '' : apply_filters('widget_intro_desc', $instance['intro_desc']);
			
 			?>						
		   
         	<div class="welcome-msg">
           	<?php if($intro_title){?><h3 class="intro-title"><?php echo $intro_title; ?></h3><?php }  ?>
            <?php if($intro_desc){?><p><?php echo $intro_desc; ?></p><?php }  ?>
            </div>      
           
                  
		<?php
		}
		function update($new_instance, $old_instance) {
		//save the widget
			$instance = $old_instance;		
			$instance['intro_title'] = strip_tags($new_instance['intro_title']);
			$instance['intro_desc'] = ($new_instance['intro_desc']);
 			return $instance;
		}
		function form($instance) {
		//widgetform in backend
			$instance = wp_parse_args( (array) $instance, array( 'intro_title' => '') );		
			$intro_title = strip_tags($instance['intro_title']);			
			$intro_desc = ($instance['intro_desc']);
 		?>
		<p><label for="<?php  echo $this->get_field_id('intro_title'); ?>"><?php _e('Intro title','templatic');?>: <input class="widefat" id="<?php  echo $this->get_field_id('intro_title'); ?>" name="<?php echo $this->get_field_name('intro_title'); ?>" type="text" value="<?php echo attribute_escape($intro_title); ?>" /></label></p>
        
        <p><label for="<?php echo $this->get_field_id('intro_desc'); ?>"><?php _e('Intro description','templatic');?> : <textarea class="widefat" rows="6" cols="20" id="<?php echo $this->get_field_id('intro_desc'); ?>" name="<?php echo $this->get_field_name('intro_desc'); ?>"><?php echo attribute_escape($intro_desc); ?></textarea></label></p>
        
       
		<?php
	}}
	register_widget('templ_home_intro_content');
}


// =============================== Booking Online ======================================
if(!class_exists('templ_booking_form'))
{
	class templ_booking_form extends WP_Widget {
		function templ_booking_form() {
		//Constructor
			$widget_ops = array('classname' => 'widget templ_booking_form', 'description' => apply_filters('templ_booking_form_desc_filter','Booking Online') );		
			$this->WP_Widget('widget_templ_booking_form', apply_filters('templ_booking_form_widget_title_filter','T &rarr; Booking Online'), $widget_ops);
		}
		function widget($args, $instance) {
		// prints the widget
			extract($args, EXTR_SKIP);
			$title = empty($instance['title']) ? '' : apply_filters('widget_title', $instance['title']);
			$desc = empty($instance['desc']) ? '' : apply_filters('widget_desc', $instance['desc']);
 			?>						
		   
         
           <div class="online-booking">
        		<?php if($title){?><h3><?php echo $title; ?></h3><?php }  ?>
                 <?php echo $desc; ?>
        
       
			<?php include_once('admin_appointment_add.php'); ?>
</div>
           
           
                  
		<?php
		}
		function update($new_instance, $old_instance) {
		//save the widget
			$instance = $old_instance;		
			$instance['title'] = strip_tags($new_instance['title']);
			$instance['desc'] = ($new_instance['desc']);
 			return $instance;
		}
		function form($instance) {
		//widgetform in backend
			$instance = wp_parse_args( (array) $instance, array( 'title' => '') );		
			$title = strip_tags($instance['title']);
			$desc = ($instance['desc']);
 		?>
		<p><label for="<?php  echo $this->get_field_id('title'); ?>"><?php _e('Title','templatic');?>: <input class="widefat" id="<?php  echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" /></label></p>
		
		<p><label for="<?php echo $this->get_field_id('desc'); ?>"><?php _e('Description','templatic');?> : <textarea class="widefat" rows="6" cols="20" id="<?php echo $this->get_field_id('desc'); ?>" name="<?php echo $this->get_field_name('desc'); ?>"><?php echo attribute_escape($desc); ?></textarea></label></p>
		<?php
	}}
	register_widget('templ_booking_form');
}

// =============================== Homepage Pre-footer Offers ======================================
if(!class_exists('templ_home_pre_footer_offers'))
{
	class templ_home_pre_footer_offers extends WP_Widget {
		function templ_home_pre_footer_offers() {
		//Constructor
			$widget_ops = array('classname' => 'widget templ_home_pre_footer_offers', 'description' => apply_filters('templ_home_pre_footer_offers_desc_filter','Show special offers on the homepage; recommended in the &lsquo;Homepage: Pre-footer Left&rsquo; section') );		
			$this->WP_Widget('widget_templ_home_pre_footer_offers', apply_filters('templ_home_pre_footer_offers_widget_title_filter','T &rarr; Homepage: Special offers'), $widget_ops);
		}
		function widget($args, $instance) {
		// prints the widget
			extract($args, EXTR_SKIP);
			$offer_title = empty($instance['offer_title']) ? '' : apply_filters('widget_offer_title', $instance['offer_title']);
			$offer_image = empty($instance['offer_image']) ? '' : apply_filters('widget_offer_image', $instance['offer_image']);
			$offer_subtitle = empty($instance['offer_subtitle']) ? '' : apply_filters('widget_offer_subtitle', $instance['offer_subtitle']);
			$offer_desc = empty($instance['offer_desc']) ? '' : apply_filters('widget_offer_desc', $instance['offer_desc']);
			$offer_readmore_link_url = empty($instance['offer_readmore_link_url']) ? '' : apply_filters('widget_offer_readmore_link_url', $instance['offer_readmore_link_url']);
			$offer_readmore_link_text = empty($instance['offer_readmore_link_text']) ? '' : apply_filters('widget_offer_readmore_link_text', $instance['offer_readmore_link_text']);
 			?>						
		   
			<div class="offers">
           	<?php if($offer_title){?><h3><?php echo $offer_title; ?></h3><?php }  ?>
            <?php if($offer_image){?><img alt="<?php echo $offer_title; ?>" src="<?php echo $offer_image; ?>" /><?php }  ?>
            <?php if($offer_subtitle){?><h5><?php echo $offer_subtitle; ?></h5><?php }  ?>
            <?php if($offer_desc){?><p><?php echo $offer_desc; ?></p><?php }  ?>
            <?php if($offer_readmore_link_url && $offer_readmore_link_text){?><a class="more-link" href="<?php echo $offer_readmore_link_url; ?>"><?php echo $offer_readmore_link_text; ?></a><?php }  ?>
			</div>
           
           
                  
		<?php
		}
		function update($new_instance, $old_instance) {
		//save the widget
			$instance = $old_instance;		
			$instance['offer_title'] = strip_tags($new_instance['offer_title']);
			$instance['offer_image'] = ($new_instance['offer_image']);
			$instance['offer_subtitle'] = ($new_instance['offer_subtitle']);
			$instance['offer_desc'] = ($new_instance['offer_desc']);
			$instance['offer_readmore_link_url'] = ($new_instance['offer_readmore_link_url']);
			$instance['offer_readmore_link_text'] = ($new_instance['offer_readmore_link_text']);
 			return $instance;
		}
		function form($instance) {
		//widgetform in backend
			$instance = wp_parse_args( (array) $instance, array( 'offer_title' => '') );		
			$offer_title = strip_tags($instance['offer_title']);
			$offer_image = ($instance['offer_image']);
			$offer_subtitle = ($instance['offer_subtitle']);
			$offer_desc = ($instance['offer_desc']);
			$offer_readmore_link_url = ($instance['offer_readmore_link_url']);
			$offer_readmore_link_text = ($instance['offer_readmore_link_text']);
 		?>
		<p><label for="<?php  echo $this->get_field_id('offer_title'); ?>"><?php _e('Spl. offer title','templatic');?>: <input class="widefat" id="<?php  echo $this->get_field_id('offer_title'); ?>" name="<?php echo $this->get_field_name('offer_title'); ?>" type="text" value="<?php echo attribute_escape($offer_title); ?>" /></label></p>
		
		<p><label for="<?php  echo $this->get_field_id('offer_image'); ?>"><?php _e('Spl. offer image URL','templatic');?>: <input class="widefat" id="<?php  echo $this->get_field_id('offer_image'); ?>" name="<?php echo $this->get_field_name('offer_image'); ?>" type="text" value="<?php echo attribute_escape($offer_image); ?>" /></label></p>
        
        <p><label for="<?php  echo $this->get_field_id('offer_subtitle'); ?>"><?php _e('Spl. offer subtitle','templatic');?>: <input class="widefat" id="<?php  echo $this->get_field_id('offer_subtitle'); ?>" name="<?php echo $this->get_field_name('offer_subtitle'); ?>" type="text" value="<?php echo attribute_escape($offer_subtitle); ?>" /></label></p>
        
        <p><label for="<?php echo $this->get_field_id('offer_desc'); ?>"><?php _e('Spl. offer description','templatic');?> : <textarea class="widefat" rows="6" cols="20" id="<?php echo $this->get_field_id('offer_desc'); ?>" name="<?php echo $this->get_field_name('offer_desc'); ?>"><?php echo attribute_escape($offer_desc); ?></textarea></label></p>
        
        <p><label for="<?php  echo $this->get_field_id('offer_readmore_link_url'); ?>"><?php _e('Spl. offer read more link URL','templatic');?>: <input class="widefat" id="<?php  echo $this->get_field_id('offer_readmore_link_url'); ?>" name="<?php echo $this->get_field_name('offer_readmore_link_url'); ?>" type="text" value="<?php echo attribute_escape($offer_readmore_link_url); ?>" /></label></p>
        
        <p><label for="<?php  echo $this->get_field_id('offer_readmore_link_text'); ?>"><?php _e('Spl. offer read more link text','templatic');?>: <input class="widefat" id="<?php  echo $this->get_field_id('offer_readmore_link_text'); ?>" name="<?php echo $this->get_field_name('offer_readmore_link_text'); ?>" type="text" value="<?php echo attribute_escape($offer_readmore_link_text); ?>" /></label></p>
		<?php
	}}
	register_widget('templ_home_pre_footer_offers');
}

// =============================== Homepage Pre-footer contact ======================================
if(!class_exists('templ_home_pre_footer_contact'))
{
	class templ_home_pre_footer_contact extends WP_Widget {
		function templ_home_pre_footer_contact() {
		//Constructor
			$widget_ops = array('classname' => 'widget templ_home_pre_footer_contact', 'description' => apply_filters('templ_home_pre_footer_contact_desc_filter','Show contact & timings on the homepage; recommended in the &lsquo;Homepage: Pre-footer Right&rsquo; section') );		
			$this->WP_Widget('widget_templ_home_pre_footer_contact', apply_filters('templ_home_pre_footer_contact_widget_title_filter','T &rarr; Homepage: Contact & Timings'), $widget_ops);
		}
		function widget($args, $instance) {
		// prints the widget
			extract($args, EXTR_SKIP);
			$contact_title = empty($instance['contact_title']) ? '' : apply_filters('widget_contact_title', $instance['contact_title']);			
			$contact_phoneno_one = empty($instance['contact_phoneno_one']) ? '' : apply_filters('widget_contact_phoneno_one', $instance['contact_phoneno_one']);
			$contact_phoneno_two = empty($instance['contact_phoneno_two']) ? '' : apply_filters('widget_contact_phoneno_two', $instance['contact_phoneno_two']);
			$contact_time_one = empty($instance['contact_time_one']) ? '' : apply_filters('widget_contact_time_one', $instance['contact_time_one']);
			$contact_time_two = empty($instance['contact_time_two']) ? '' : apply_filters('widget_contact_time_two', $instance['contact_time_two']);
 			?>						
		   
			<div class="contact">
           	<?php if($contact_title){?><h3><?php echo $contact_title; ?></h3><?php }  ?> 
            <?php if($contact_phoneno_one && $contact_phoneno_two){?><div class="phone"><p><?php echo $contact_phoneno_one; ?></p><p><?php echo $contact_phoneno_two; ?></p></div>
			<?php } else if($contact_phoneno_one && !$contact_phoneno_two){?><div class="phone"><p><?php echo $contact_phoneno_one; ?></p></div>
			<?php } else if(!$contact_phoneno_one && $contact_phoneno_two){?><div class="phone"><p><?php echo $contact_phoneno_two; ?></p></div><?php }  ?>
            <?php if($contact_time_one){?><p><?php echo $contact_time_one; ?></p><?php }  ?>
            <?php if($contact_time_two){?><p><?php echo $contact_time_two; ?></p><?php }  ?>
			</div>
            
           
           
                  
		<?php
		}
		function update($new_instance, $old_instance) {
		//save the widget
			$instance = $old_instance;		
			$instance['contact_title'] = strip_tags($new_instance['contact_title']);			
			$instance['contact_phoneno_one'] = ($new_instance['contact_phoneno_one']);
			$instance['contact_phoneno_two'] = ($new_instance['contact_phoneno_two']);
			$instance['contact_time_one'] = ($new_instance['contact_time_one']);
			$instance['contact_time_two'] = ($new_instance['contact_time_two']);
 			return $instance;
		}
		function form($instance) {
		//widgetform in backend
			$instance = wp_parse_args( (array) $instance, array( 'contact_title' => '') );		
			$contact_title = strip_tags($instance['contact_title']);			
			$contact_phoneno_one = ($instance['contact_phoneno_one']);
			$contact_phoneno_two = ($instance['contact_phoneno_two']);
			$contact_time_one = ($instance['contact_time_one']);
			$contact_time_two = ($instance['contact_time_two']);
			
 		?>
		<p><label for="<?php  echo $this->get_field_id('contact_title'); ?>"><?php _e('Contact title','templatic');?>: <input class="widefat" id="<?php  echo $this->get_field_id('contact_title'); ?>" name="<?php echo $this->get_field_name('contact_title'); ?>" type="text" value="<?php echo attribute_escape($contact_title); ?>" /></label></p>
		
		<p><label for="<?php  echo $this->get_field_id('contact_phoneno_one'); ?>"><?php _e('Contact number #1','templatic');?>: <input class="widefat" id="<?php  echo $this->get_field_id('contact_phoneno_one'); ?>" name="<?php echo $this->get_field_name('contact_phoneno_one'); ?>" type="text" value="<?php echo attribute_escape($contact_phoneno_one); ?>" /></label></p>
        
        <p><label for="<?php  echo $this->get_field_id('contact_phoneno_two'); ?>"><?php _e('Contact number #2','templatic');?>: <input class="widefat" id="<?php  echo $this->get_field_id('contact_phoneno_two'); ?>" name="<?php echo $this->get_field_name('contact_phoneno_two'); ?>" type="text" value="<?php echo attribute_escape($contact_phoneno_two); ?>" /></label></p>
        
        <p><label for="<?php  echo $this->get_field_id('contact_time_one'); ?>"><?php _e('Timings line #1','templatic');?>: <input class="widefat" id="<?php  echo $this->get_field_id('contact_time_one'); ?>" name="<?php echo $this->get_field_name('contact_time_one'); ?>" type="text" value="<?php echo attribute_escape($contact_time_one); ?>" /></label></p>
        
        <p><label for="<?php  echo $this->get_field_id('contact_time_two'); ?>"><?php _e('Timings line #2','templatic');?>: <input class="widefat" id="<?php  echo $this->get_field_id('contact_time_two'); ?>" name="<?php echo $this->get_field_name('contact_time_two'); ?>" type="text" value="<?php echo attribute_escape($contact_time_two); ?>" /></label></p>
		<?php
	}}
	register_widget('templ_home_pre_footer_contact');
}


// =============================== Top strip contact======================================
if(!class_exists('templ_side_logo'))
{
	class templ_side_logo extends WP_Widget {
		function templ_side_logo() {
		//Constructor
			$widget_ops = array('classname' => 'widget templ_side_logo', 'description' => apply_filters('templ_side_logo_desc_filter','Company Logo') );		
			$this->WP_Widget('widget_templ_side_logo', apply_filters('templ_side_logo_widget_title_filter','T &rarr; Company Logo'), $widget_ops);
		}
		function widget($args, $instance) {
		// prints the widget
			extract($args, EXTR_SKIP);
			$ts_social_twitter = empty($instance['ts_social_twitter']) ? '' : apply_filters('ts_social_twitter', $instance['ts_social_twitter']);
 			?>						
		   
         	 <div class="logo">
			  <?php  templ_site_logo(); ?>
            </div>
           
                  
		<?php
		}
		function update($new_instance, $old_instance) {
		//save the widget
			$instance = $old_instance;		
			$instance['ts_social_twitter'] = strip_tags($new_instance['ts_social_twitter']);
 			return $instance;
		}
		function form($instance) {
		//widgetform in backend
			$instance = wp_parse_args( (array) $instance, array( 'ts_social_twitter' => '') );		
			$ts_social_twitter = strip_tags($instance['ts_social_twitter']);			
 		?>
       
		<?php
	}}
	register_widget('templ_side_logo');
}
?>