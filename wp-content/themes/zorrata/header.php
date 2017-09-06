<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package TienCongNguyen
 * @subpackage zorrataa
 * @since 1.0
 * @version 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php 
		wp_nav_menu ( array(
      'theme_location' => 'top',
      'menu_id'        => 'top-menu',
      'menu_class' => 'dl-menu', 
      'depth' => 1,
      'container_class' => 'dl-menuwrapper',
      'container_id' 	=> 'dl-menu'
    ) ); ?>
  <!-- /dl-menuwrapper -->
  <div class="page-wrap">
    <header>
      <div class="row headerrow">
        <button class="dl-trigger mobile_hamburg">
          <img class="menu_icn" src="<?php echo get_theme_file_uri('assets/images/menu-icon.svg'); ?>" alt="" />
          <img class="cross_icn" src="<?php echo get_theme_file_uri('assets/images/cross_white.svg'); ?>" alt="" />
        </button> 
        <a class="sticky_logo" href="<?php echo esc_url(home_url('/')); ?>"> <img src="<?php echo get_theme_file_uri('assets/images/sticky_logo.png'); ?>" alt=" <?php bloginfo('name'); ?>" style="border: 0;"/></a>
        <div id="logo" class="desktop-12 tablet-6 mobile-3"> 
          <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo get_theme_file_uri('assets/images/zorrata_logo.svg'); ?>" alt=" <?php bloginfo('name'); ?>" style="border: 0;"/></a> 
        </div>
        <div class="search_form mobile_search">
          <?php get_search_form() ?>
        </div>
      </div>
    </header>
    <div class="clear"></div>
		<?php 
		wp_nav_menu ( array(
      'theme_location' => 'top',
      'menu_id'        => 'main-nav',
      'menu_class' => 'row navigationbar', 
      'depth' => 1,
      'container' => 'nav',
      'container_class' => '',
      'container_id' 	=> 'nav-bar',
      'items_wrap' => '<ul id="main-nav" role="navigation" style="margin-bottom: 0;" class="row navigationbar">' . 
      				'<a class="sticky_logo" href="index.html"><img src="'. get_theme_file_uri('assets/images/sticky_logo.png') . '" alt="'. get_bloginfo('name') .'" style="border: 0;"/></a>%3$s' .
      				'<a id="inline" href="javascript:void(0);" class="open_popup">'. __('Search', 'zorrataa') .'<img src="'.get_theme_file_uri('assets/images/search.svg') .'" alt="" /></a>
        <div class="search_form desktop_search">'. get_search_form(0) .'</div></ul>'
    ) ); ?>
    <div class="clear"></div>
