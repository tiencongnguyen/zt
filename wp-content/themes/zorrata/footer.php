<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package TienCongNguyen
 * @subpackage zorrataa
 * @since 1.0
 * @version 1.0
 */

?>
	</div>
	<!-- /page-wrap -->
  <div class="_hp_newsletter">
    <div class="row">
      <div class="desktop-12 tablet-half mobile-3">        
        <div id="footer_signup">
          <h2 class="text-center"><?php get_theme_mod ('subscribe_form_title', _e('Join our Mailing List', 'zorrataa'));?></h2>
          <p><?php get_theme_mod ('subscribe_form_description', _e('Sign up to our newsletter and receive exclusive offers, invitations and latest product news.', 'zorrataa'));?></p>
          <form action="<?php get_theme_mod ('subscribe_form_action');?>" method="post" id="footer-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank">
            <input value="" name="EMAIL" class="email" id="footer-EMAIL" placeholder="<?php _e('Nhập địa chỉ email', 'zorrataa') ?>" required="" type="email">
            <input value="Submit" name="subscribe" id="footer-subscribe" class="button" type="submit">
          </form>
        </div> 
      </div> 
      <div class="clear"></div>
      <ul id="footer-icons" class="desktop-12 tablet-6 mobile-3">
        <li><a href="<?php get_theme_mod ('fanpage-url', 'https://fb.com');?>" target="_blank"><i class="icon-facebook icon-2x"></i></a></li>
        <li><a href="<?php get_theme_mod ('instagram-url', 'https://instagram.com');?>" target="_blank"><i class="icon-instagram icon-2x"></i></a></li>
        <li><a href="<?php get_theme_mod ('twitter-url', 'https://twitter.com');?>" target="_blank"><i class="icon-twitter icon-2x"></i></a></li>
       </ul> 
    </div>
  </div>
  <div id="footer-wrapper">
  <?php get_template_part( 'template-parts/footer/footer', 'widgets' ); ?>
  <?php get_template_part( 'template-parts/footer/site', 'info' ); ?>
  </div>
  <style>
  #newsletter_subscribe_popup {
    display: none;
  }
  </style>
  <div id="newsletter_subscribe_popup" class=""> <a id="close_newletter_pop" href="javascript:void(0);"><img src="<?php echo get_theme_file_uri('assets/images/cross.svg'); ?>" class="icon-remove" alt="" /></a>
    <div class="row">
      <div class="desktop-12 tablet-half mobile-3">
        <div id="subscribe_popup">
          <h2 class="text-center"><?php get_theme_mod ('subscribe_form_title', 'Join our Mailing List');?></h2>
          <p><?php get_theme_mod ('subscribe_form_description', 'Sign up to our newsletter and receive exclusive offers, invitations and latest product news.');?></p>
          <div id="subs-container" class="clearfix">
            <div id="mc_embed_signup">
              <form action="<?php get_theme_mod ('subscribe_form_action');?>" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank">
                <input value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="<?php _e('Enter your email here'); ?>" required="" type="email">
                <input value="Submit" name="subscribe" id="mc-embedded-subscribe" class="button" type="submit"> </form>
            </div>
          </div>
          <div class="clear"></div>
        </div>
      </div>
    </div>
  </div>
<?php wp_footer(); ?>

</body>
</html>
