<?php
/*
Template Name: Page - Contact Us
*/
?>
<?php
if($_POST)
{
	if($_POST['your-email'])
	{
		$toEmailName = get_option('blogname');
		$toEmail = get_site_emailId();
		
		$subject = $_POST['your-subject'];
		$message = '';
		$message .= '<p>Dear '.$toEmailName.',</p>';
		$message .= '<p>Name : '.$_POST['your-name'].',</p>';
		$message .= '<p>Email : '.$_POST['your-email'].',</p>';
		$message .= '<p>Message : '.nl2br($_POST['your-message']).'</p>';
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
		// Additional headers
		$headers .= 'To: '.$toEmailName.' <'.$toEmail.'>' . "\r\n";
		$headers .= 'From: '.$_POST['your-name'].' <'.$_POST['your-email'].'>' . "\r\n";
		
		// Mail it
		wp_mail($toEmail, $subject, $message, $headers);
		if(strstr($_REQUEST['request_url'],'?'))
		{
			$url =  $_REQUEST['request_url'].'&msg=success'	;	
		}else
		{
			$url =  $_REQUEST['request_url'].'?msg=success'	;
		}
		echo "<script type='text/javascript'>location.href='".$url."';</script>";
	}
}
?>

<?php get_header(); ?>

<div  class="<?php templ_content_css();?>" >
<!--  CONTENT AREA START -->

<?php if (function_exists('dynamic_sidebar')){ dynamic_sidebar('page_content_above'); }?>
<!-- contact -->
<?php global $is_home; ?>
<?php if ( have_posts() ) : ?>
<?php while ( have_posts() ) : the_post(); ?>
<?php $banner = get_post_meta($post->ID, 'banner', $single = true);	?>
<img src="<?php if($banner=='') { bloginfo('template_directory'); echo '/images/banner7.jpg'; } else { echo $banner; } ?>" alt="" class="banner_img"  />


<div class="entry">
  <div <?php post_class('single clear'); ?> id="post_<?php the_ID(); ?>">
  <?php templ_page_title_above(); //page title above action hook?>
      <div class="content-title"> <?php echo templ_page_title_filter(get_the_title()); //page tilte filter?></div>
      <?php templ_page_title_below(); //page title below action hook?>
    <div class="post-meta">
      
     
    </div>
    <div class="post-content">
      <?php the_content(); ?>
    </div>
    
  </div>

<?php endwhile; ?>
<?php endif; ?>
<?php
if($_REQUEST['msg'] == 'success')
{
?>
	<p class="success_msg">
	  <?php _e('Your message is sent successfully.','templatic');?>
	</p>
	<?php
}
?>
<form action="<?php echo get_permalink($post->ID);?>" method="post" id="contact_frm" name="contact_frm" class="wpcf7-form">
  <input type="hidden" name="request_url" value="<?php echo $_SERVER['REQUEST_URI'];?>" />
  <div class="form_row ">
    <label>
      <?php _e('Name','templatic');?>
      <span class="indicates">*</span></label>
    <input type="text" name="your-name" id="your-name" value="" class="textfield" size="40" />
    <span id="your_name_Info" class="error"></span> </div>
  <div class="form_row ">
    <label>
      <?php _e('Email','templatic');?>
      <span class="indicates">*</span></label>
    <input type="text" name="your-email" id="your-email" value="" class="textfield" size="40" />
    <span id="your_emailInfo"  class="error"></span> </div>
  <div class="form_row ">
    <label>
      <?php _e('Subject','templatic');?>
      <span class="indicates">*</span></label>
    <input type="text" name="your-subject" id="your-subject" value="" size="40" class="textfield" />
    <span id="your_subjectInfo"></span> </div>
  <div class="form_row">
    <label>
      <?php _e('Message','templatic');?>
      <span class="indicates">*</span></label>
    <textarea name="your-message" id="your-message" cols="40" class="textarea textarea2" rows="10"></textarea>
    <span id="your_messageInfo"  class="error"></span> </div>
  <input type="submit" value="Send" class="b_submit" />
</form>

<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/contact_us_validation.js"></script>



<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('contact_form_bottom')){?><?php } else {?>  <?php }?>



</div>
<!--  CONTENT AREA END -->
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>