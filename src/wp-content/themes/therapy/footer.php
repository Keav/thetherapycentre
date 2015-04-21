</div>
<!-- /Container #end -->
<?php templ_content_end(); // content end hooks?>
<?php get_template_part( 'footer_bottom' ); // footer bottom. ?>

 <?php templ_before_footer(); // content end hooks?>
 <div class="footer">


 <?php
if ( is_home() ) { ?>

    	<div class="footer_in Page 2 column - Left Sidebar">
    <p class="copyright ">&copy; <?php echo date("Y");?> <?php bloginfo('name'); ?>. All Rights Reserved. </p>
    <p class="credits">Designed by <a href="http://bstech.co.uk" title="BSTECH" alt="wordpress themes">Wordpress themes</a></p>
  </div>

   <?php } else {
?>

 <div class="footer_in <?php if(get_option('ptthemes_page_layout')) { ?> <?php echo get_option('ptthemes_page_layout'); ?> <?php } ?>">
    <p class="copyright ">Copyright &copy; 2013-<?php echo date("Y");?> <?php bloginfo('name'); ?>. All Rights Reserved. </p>
<!--     <p class="credits">Designed by <a href="http://bstech.co.uk" title="Wordpress themes" alt="wordpress themes">Wordpress themes</a></p> -->
  </div>

 <?php }
?>



</div> <!-- footer #end -->
<?php templ_after_footer(); // content end hooks?>

</div>
<?php wp_footer(); ?>
<?php echo (get_option('ga')) ? get_option('ga') : '' ?>
<?php templ_body_end(); // Body end hooks?>
	</body>
</html>