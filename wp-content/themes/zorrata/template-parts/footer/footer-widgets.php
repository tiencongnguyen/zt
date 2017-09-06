<?php
/**
 * Displays footer widgets if assigned
 *
 * @package TienCongNguyen
 * @subpackage zorrataa
 * @since 1.0
 * @version 1.0
 */

?>
<div id="footer" class="row">
      <div id="logo" class="desktop-3 tablet-half mobile-half _footer_column_1"> 
      	<?php $logo_footer = get_theme_mod('footer-logo', get_theme_file_uri('assets/images/logo_fotter.png'));?>
      	<img src="<?=$logo_footer?>" alt="<?php bloginfo ('name')?>" style="border: 0;" /> 
      </div>
      <?php
      if (is_active_sidebar ('footer-sidebar')) {
      	dynamic_sidebar ('footer-sidebar');
      } else {
      ?>
      <div class="desktop-3 tablet-half mobile-half _footer_column_2">
        <h4>About Zorrata</h4>
        <ul>
          <li><a href="https://www.zorrata.com/search" title="">Search</a></li>
          <li><a href="https://www.zorrata.com/pages/about-us" title="">About Us</a></li>
          <li><a href="https://www.zorrata.com/pages/contact-us-new" title="">Contact US</a></li>
          <li><a href="https://www.zorrata.com/pages/shipping-returns-new" title="">Shipping / Returns</a></li>
          <li><a href="https://www.zorrata.com/pages/faqs-new" title="">FAQ</a></li>
        </ul>
      </div>
      <div class="desktop-3 tablet-half mobile-half _footer_column_3">
        <h4>Help</h4>
        <ul>
          <li><a href="https://www.zorrata.com/collections/anchor-collection" title="">Anchor Collection</a></li>
          <li><a href="https://www.zorrata.com/collections/royal-collection" title="">Royal Collection</a></li>
          <li><a href="https://www.zorrata.com/collections/lion-collection" title="">Lion Collection</a></li>
          <li><a href="https://www.zorrata.com/collections/bangles" title="">Bangles</a></li>
          <li><a href="https://www.zorrata.com/collections/rings" title="">Rings</a></li>
          <li><a href="https://www.zorrata.com/collections/leather-collection" title="">Leather Collection</a></li>
          <li><a href="https://www.zorrata.com/collections/necklaces" title="">Necklaces</a></li>
          <li><a href="https://www.zorrata.com/collections/womens" title="">Women's</a></li>
        </ul>
      </div>
      <div class="desktop-3 tablet-half mobile-half _footer_column_4">
        <h4>Shop</h4>
        <ul>
          <li><a href="https://www.zorrata.com/collections/anchor-collection" title="">Anchor Collection</a></li>
          <li><a href="https://www.zorrata.com/collections/royal-collection" title="">Royal Collection</a></li>
          <li><a href="https://www.zorrata.com/collections/lion-collection" title="">Lion Collection</a></li>
          <li><a href="https://www.zorrata.com/collections/bangles" title="">Bangles</a></li>
          <li><a href="https://www.zorrata.com/collections/rings" title="">Rings</a></li>
          <li><a href="https://www.zorrata.com/collections/leather-collection" title="">Leather Collection</a></li>
          <li><a href="https://www.zorrata.com/collections/necklaces" title="">Necklaces</a></li>
          <li><a href="https://www.zorrata.com/collections/womens" title="">Women's</a></li>
        </ul>
      </div>
      <?php } ?>
      <div class="clear"></div>
    </div>