<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package TienCongNguyen
 * @subpackage zorrataa
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div id="content" class="">
  <div class="row">
    <div id="breadcrumb" class="desktop-12 mobile-3 tablet-6">
      <?php get_template_part ('template-parts/navigation/breadscrumb'); ?>
	  </div>
	</div> 
	<div class="clear"></div>

	<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post(); ?>
			<?php
				$pid = get_the_ID(); $price = get_post_meta ($pid, 'price', 1);
			?>
	<div itemscope itemtype="http://schema.org/Product" id="product-<?=$pid?>">
  <meta itemprop="url" content="<?php the_permalink(); ?>">
  <meta itemprop="image" content="<?php echo zorrataa_get_post_thumbnail (null, array(480,321)); ?>">

  <?php 
  // get list feature image
  $featureImages = $dynamic_featured_image->get_featured_images();
  ?>
  <!-- For Mobile -->
  <div id="mobile-product" class="mobile-3">
    <div class="mobile-gallery">
      <ul class="slides">
      	<li data-thumb="<?php the_post_thumbnail_url(null, 'zorrataa-thumbnail-image') ?>" data-image-id="<?=get_post_thumbnail_id()?>"><img data-image-id="<?=get_post_thumbnail_id()?>" src="<?php the_post_thumbnail_url(null, 'full') ?>" alt="<?php the_title() ?>"></li>
        <?php 
        foreach ($featureImages as $img) :
        ?>
      	<li data-thumb="<?=$img['thumb']?>" data-image-id="<?=$img['attachment_id']?>"><img data-image-id="<?=$img['attachment_id']?>" src="<?=$img['full']?>" alt="<?php the_title() ?>"></li>
      	<?php
        endforeach;
        ?>        
      </ul>
    </div>  
  </div>

  <!-- For Desktop -->
  <div class="row">
    <div id="product-photos" class="desktop-8 tablet-3 mobile-3">
      <div class="bigimage desktop-10 tablet-5">
        <span class="zoom_icn"><img src="<?php echo get_theme_file_uri('assets/images/fullsize.svg')?>" alt="" /></span>
        <img id="<?=$pid?>" src="<?php the_post_thumbnail_url(null, 'zorrataa-single-image') ?>" data-image-id="" data-zoom-image="<?php the_post_thumbnail_url(null, 'full') ?>" alt='' title="<?php the_title() ?>"/>
      </div> 

      <div id="<?=$pid?>-gallery" class="desktop-2 tablet-1">	
        <div class="thumbnail-slider">
          <div class="slide">
            <a href="#" data-image="<?php the_post_thumbnail_url(null, 'full')?>" data-image-id="" data-zoom-image="<?php the_post_thumbnail_url(null, 'full')?>">
              <img class="thumbnail" src="<?php the_post_thumbnail_url(null, 'zorrataa-thumbnail-image')?>" data-image-id="<?=get_post_thumbnail_id()?>" alt="<?php the_title() ?>" data-image-id="<?=get_post_thumbnail_id()?>" />
            </a>
          </div>
          <?php 
	        foreach ($featureImages as $img) :
	        ?>
          <div class="slide">
            <a href="#" data-image="<?=$img['full']?>" data-image-id="" data-zoom-image="<?=$img['full']?>">
              <img class="thumbnail" src="<?=$img['thumb']?>" data-image-id="<?=$img['attachment_id']?>" alt="<?php the_title() ?>" data-image-id="<?=$img['attachment_id']?>" />
            </a>
          </div>
        <?php endforeach;?>
           
        </div>
      </div>
    </div>
    <script type="text/javascript">
      $(document).ready(function () {
        //initiate the plugin and pass the id of the div containing gallery images
        $("#<?=$pid?>").elevateZoom({
          gallery:'<?=$pid?>-gallery',
          cursor: 'pointer', 
          galleryActiveClass: 'active', 
          borderColour: '#eee', 
          borderSize: '1',
          zoomWindowWidth:"430",
          zoomWindowHeight:"465",
          zoomWindowFadeIn: 500,
          zoomWindowFadeOut: 750
          }); 

        //pass the images to Fancybox
        $("#<?=$pid?>").bind("click", function(e) {  
          var ez =   $('#<?=$pid?>').data('elevateZoom');	
          $.fancybox(ez.getGalleryList());
        return false;
      });	  

      }); 
    </script>
    <div id="product-right" class="desktop-4 tablet-3 mobile-3">
      <div id="product-description">
        <h1 itemprop="name"><?php the_title(); ?></h1>
        <div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
          <p id="product-price">
            <span class="product-price prod-price" itemprop="price"><?=$price?></span>
          </p>
          <form action="https://www.zorrata.com/cart/add" method="post" data-money-format="${{amount}}" id="product-form-<?=$pid?>">
  					<div class="product-variants"></div><!-- product variants -->
					  <div class="product-add ">
					    <h5>Số lượng:</h5>
					    <div class="product-add-quantity clearfix"><a href="javascript:void(0);" class="down" field="quantity"><i class="icon-minus"></i></a>
					      <input min="1" type="text" name="quantity" class="quantity" value="1" />
					      <a href="javascript:void(0);" class="up" field="quantity"><i class="icon-plus"></i></a>
					    </div>
					      
					    <div class="product-add-cart"><input type="submit" name="button" class="add" value="Mua ngay" /></div>
					  </div>
					  <p class="add-to-cart-msg"></p> 
					  
					</form>    


					<script>
					  // Shopify Product form requirement
					</script>
					<script>$(window).load(function() { $('.selector-wrapper:eq()').hide(); });</script>   
        </div>

        <div class="pdp_details rrt">
        <?php the_content();?>
        </div>
        <div class="desc">
          <div class="share-icons">
					  <a title="Chia sẻ trên Facebook" href="https://www.facebook.com/sharer.php?u=<?php the_permalink()?>" class="facebook" target="_blank"><i class="icon-facebook icon-2x"></i></a>
					  <a title="Chia sẻ trên Instagram" href="https://instagram.com/" target="_blank"><i class="icon-instagram icon-2x"></i></a>
					  
					  <a title="Chia sẻ trên Twitter"  href="https://twitter.com/home?status=<?php the_permalink()?>" target="_blank" class="twitter"><i class="icon-twitter icon-2x"></i></a>
					</div>
        </div>
      </div>
    </div>
  </div>
  <?php
  endwhile;
  ?>
  <div class="clear"></div>
    <!-- product pair -->
<div id="pdp_pair">
  <div class="row">
    <div class="desktop-12 tablet-6 mobile-3 pdp_pair_section">
      <div class="section-title lines tablet-6 desktop-12">
        <h2><?php echo get_theme_mod('product-pair', 'Perfect Pairings'); ?></h2> </div>
      <div class="pair_container desktop-12 tablet-6 mobile-3">
        <div class="current_product">
          <div class="product-index-inner"> </div>
          <div class="prod-image"> 
          	<a href="<?php the_permalink(); ?>" title="<?php the_title()?>"> 
          		<?php echo zorrataa_get_post_thumbnail (null, array (480, 321)); ?>
           	</a>
            <div class="product-info">
              <div class="product-info-inner">
                <a href="<?php the_permalink (); ?>">
                  <h3><?php the_title()?></h3> </a>
                <div class="price">
                  <div class="prod-price"><?=$price?></div>
                </div>
              </div>
            </div>
          </div> <span class="pair_match_icn"></span> 
        </div>
        <?php get_template_part ('template-parts/post/pair', 'product');?>
      </div>
    </div>
  </div>
</div>
<div class="clear"></div>
<!-- end product pair -->
<!-- related product -->
	<div class="row">
	  <div class="desktop-12 tablet-6 mobile-3" id="related">
	    <div class="row">
	      <?php get_template_part ('template-parts/post/related', 'posts')?>
	    </div>
	  </div>
	</div>
	<div class="clear"></div>
</div>

<?php get_footer();
