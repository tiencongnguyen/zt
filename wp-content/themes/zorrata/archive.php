<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package TienCongNguyen
 * @subpackage zorrataa
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div id="content" class="row">
  <div class="collection-banner"> 
    <?php if( ( $category_image = category_image_src( array('size' =>  'full' )  , false ) ) != null ): ?>
        <img src="<?php echo $category_image; ?>" alt="" class="img-responsive">
    <?php endif; ?> </div>
  <div class="row">
    <div id="breadcrumb" class="desktop-12 mobile-3 tablet-6">
      <?php get_template_part ('template-parts/navigation/breadscrumb'); ?>
    </div>
    <div class="clear"></div>
    <div id="collection-description" class="desktop-12 tablet-6 mobile-3">
    <?php the_archive_title( '<h1 class="_collection_title">', '</h1>' ); ?>
      <div class="rte"></div>
    </div>
    <div class="clear"></div>
    <div class="desktop-12 tablet-6 mobile-3">
			<?php if ( have_posts() ) : ?>
      <div id="product-loop">
      <?php
      $count = 1; $prd_class = '';
			while ( have_posts() ) : the_post();?>
				<?php $pid = get_the_ID(); $title = get_the_title(); $price = get_post_meta ($pid, 'price', 1); 
					if ($count % 3 == 0) {
						$prd_class = 'last';
					} elseif ($count % 3 == 2) {
						$prd_class = '';
					} else {
						$prd_class = 'first';
					}
				?>
				<div id="product-<?=$pid?>" class="product-index desktop-4 <?=$prd_class?> tablet-half mobile-half" data-alpha="<?=$title?>" data-price="<?=$price?>">
          <div class="product-index-inner"> </div>
          <div class="prod-image"> 
          	<a href="<?php the_permalink() ?>" title="<?=$title?>"> 
          	<?php echo zorrataa_get_post_thumbnail(null, array (480, 321)); ?> </a>
            <div class="product-info">
              <div class="product-info-inner">
                <a href="<?php the_permalink() ?>">
                  <h3><?=$title?></h3> </a>
                <div class="price">
                  <div class="prod-price"><?=$price?> VND</div>
                </div>
              </div>
            </div>
            <form method="post" action="https://www.zorrata.com/cart/add">
              <input type="hidden" name="id" value="<?=$pid?>" /> <a class="product-modal add" href="javascript:void(0);">Mua ngay</a> </form>
          </div>
        </div>
			<?php
			$count ++;
			endwhile; ?>
			</div>
			<!-- page pagination -->
			<?php else :
			?>
			<!-- comming soon -->
			<?php endif;
			?>
      </div>
      <!-- <div id="pagination" class="desktop-12 tablet-6 mobile-3"> <span class="count">Showing items 1-22 of 22.</span>
        <div class="clear"></div>
      </div> -->
    </div>
  </div>

<?php get_footer();
