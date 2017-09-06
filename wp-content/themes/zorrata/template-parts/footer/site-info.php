<?php
/**
 * Displays footer site info
 *
 * @package TienCongNguyen
 * @subpackage zorrataa
 * @since 1.0
 * @version 1.0
 */

?>
<div class="credit desktop-12 tablet-6 mobile-3">
	<?php
	if (is_active_sidebar ('site-info')) {
		dynamic_sidebar ('site-info');
	} else {
	?>
  <p> Copyright &copy; 2017 <a href="index.html" title="">Zorrata</a>. </p>
  <?php } ?>
</div><!-- .site-info -->
