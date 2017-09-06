<?php
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package TienCongNguyen
 * @subpackage zorrataa
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<section class="homepage-section animate fadeIn rt">
  <div class="flexslider">
    <ul class="slides">
      <li> <a href="<?php echo get_theme_mod ('top-popular-products-link', '#') ?>"> 
        <img class="desktop_banner_img" src="<?php echo get_theme_mod ('top-popular-products-desktop-image', get_theme_file_uri ('assets/images/slide1.jpg')); ?>" alt="" /> 
        <img class="mobile_banner_img" src="<?php echo get_theme_mod ('top-popular-products-mobile-image', get_theme_file_uri ('assets/images/slide1-mobile.jpg')); ?>" alt="" /> </a>
        <div class="flex-caption slide1"> </div>
      </li>
    </ul>
  </div>
  <div class="clear"></div>
</section>
<section class="homepage-section animate fadeIn no-fouc _hpfp">
  <div class="row">
    <div class="section-title lines desktop-12 tablet-6 mobile-3">
      <h2><?php echo get_theme_mod ('popular-products-title', 'Featured Products'); ?></h2></div>
    <div class="collection-carousel desktop-12 tablet-6 mobile-3">
    <!-- start -->
    <?php 
    	$cat = get_theme_mod ('popular-products-category', 0);
    	$num = get_theme_mod ('popular-products-number', 6);
      $args = array(
        'category__in' => $cat,
        'posts_per_page'=> $num, // Number of related posts that will be shown.
      );
      $query = new WP_Query( $args );
      if ( $query->have_posts() ) :
        while ( $query->have_posts() ) : $query->the_post(); 
      	$pid = get_the_ID();
      	?>
        <div class="lazyOwl" id="product-<?=$pid?>" data-alpha="<?php the_title() ?>" data-price="<?php echo get_post_meta($pid, 'price', 1) ?>">
	        <div class="product-index-inner"> </div>
	        <div class="prod-image"> 
	        	<?php the_post_thumbnail (null, array(480, 321)); ?>
	          <div class="product-info">
	            <div class="product-info-inner">
	              <a href="<?php the_permalink(); ?>">
	                <h3><?php the_title() ?></h3> </a>
	              <div class="price">
	                <div class="prod-price"><?php echo get_post_meta($pid, 'price', 1) ?>VND</div>
	              </div>
	            </div>
	          </div>
	          <form method="post" action="#">
	            <input type="hidden" name="id" value="<?=$pid?>" /> <a class="product-modal add" href="javascript:void(0);">Mua ngay</a> </form>
	        </div>
	      </div>
        <?php 
        endwhile;
	    wp_reset_query();
      endif;
	  ?>
      
      <!-- end -->
    </div>
  </div>
</section>
<section class="homepage-section animate wow fadeIn _hpcl rt">
  <div class="_hpcl_container" style="background: url(<?php echo get_theme_file_uri ('assets/images/hpclimg.jpg');?>)  no-repeat center center  ">
  	<a href="<?php echo get_theme_mod ('bottom-popular-products-link', '#') ?>"> 
  		<img class="desktop_image" src="<?php echo get_theme_mod ('bottom-popular-products-destop-image', get_theme_file_uri ('assets/images/hpclimg.jpg'));?>" alt="Collection Image Alt Text" /> 
  		<img class="mobile_image" src="<?php echo get_theme_mod ('bottom-popular-products-mobile-image', get_theme_file_uri ('assets/images/hpclimg-mobile.jpg'));?>" alt="Collection Image Alt Text" /> </a>
    <div class="_hpcl-caption"> </div>
  </div>
  <div class="clear"></div>
</section>
<div class="load-wait"> <i class="icon-spinner icon-spin icon-large"></i> </div>

<?php get_footer();
