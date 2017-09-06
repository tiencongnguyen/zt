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

  <!-- For Mobile -->
  <div id="mobile-product" class="mobile-3">
    <div class="mobile-gallery">
      <ul class="slides">    
        
        <li data-thumb="http://cdn.shopify.com/s/files/1/1004/8438/products/160502_114755_7974_small.jpg?v=1483464399" data-image-id="11618379590"><img data-image-id="11618379590" src="https://cdn.shopify.com/s/files/1/1004/8438/products/160502_114755_7974_grande.jpg?v=1483464399" alt="Gold lion stack"></li>
        
        <li data-thumb="http://cdn.shopify.com/s/files/1/1004/8438/products/gold_lion_stack_small.jpg?v=1483464399" data-image-id="17513593094"><img data-image-id="17513593094" src="https://cdn.shopify.com/s/files/1/1004/8438/products/gold_lion_stack_grande.jpg?v=1483464399" alt="Gold lion stack"></li>
        
        <li data-thumb="http://cdn.shopify.com/s/files/1/1004/8438/products/BOX_77173a4a-ef6d-4dda-ac0a-2f63c2be7460_small.jpg?v=1483464405" data-image-id="21200797708"><img data-image-id="21200797708" src="https://cdn.shopify.com/s/files/1/1004/8438/products/BOX_77173a4a-ef6d-4dda-ac0a-2f63c2be7460_grande.jpg?v=1483464405" alt="Gold lion stack"></li>
        
      </ul>
    </div>  
  </div>

  <!-- For Desktop -->
  <div class="row">
    <div id="product-photos" class="desktop-8 tablet-3 mobile-3">
      <div class="bigimage desktop-10 tablet-5">
        <span class="zoom_icn"><img src="https://cdn.shopify.com/s/files/1/1004/8438/t/11/assets/fullsize.svg" alt="" /></span>
        <img id="<?=$pid?>" src="https://cdn.shopify.com/s/files/1/1004/8438/products/160502_114755_7974_1024x1024.jpg?v=1483464399" data-image-id="" data-zoom-image="http://cdn.shopify.com/s/files/1/1004/8438/products/160502_114755_7974.jpg?v=1483464399" alt='' title="Gold lion stack"/>
      </div> 

      <div id="<?=$pid?>-gallery" class="desktop-2 tablet-1">	
        <div class="thumbnail-slider">
          
          <div class="slide">
            <a href="single.html#" data-image="http://cdn.shopify.com/s/files/1/1004/8438/products/160502_114755_7974_1024x1024.jpg?v=1483464399" data-image-id="11618379590" data-zoom-image="http://cdn.shopify.com/s/files/1/1004/8438/products/160502_114755_7974.jpg?v=1483464399">
              <img class="thumbnail" src="https://cdn.shopify.com/s/files/1/1004/8438/products/160502_114755_7974_compact.jpg?v=1483464399" data-image-id="11618379590" alt="Gold lion stack" data-image-id="11618379590" />
            </a>
          </div>
          
          <div class="slide">
            <a href="single.html#" data-image="http://cdn.shopify.com/s/files/1/1004/8438/products/gold_lion_stack_1024x1024.jpg?v=1483464399" data-image-id="17513593094" data-zoom-image="http://cdn.shopify.com/s/files/1/1004/8438/products/gold_lion_stack.jpg?v=1483464399">
              <img class="thumbnail" src="https://cdn.shopify.com/s/files/1/1004/8438/products/gold_lion_stack_compact.jpg?v=1483464399" data-image-id="17513593094" alt="Gold lion stack" data-image-id="17513593094" />
            </a>
          </div>
          
          <div class="slide">
            <a href="single.html#" data-image="http://cdn.shopify.com/s/files/1/1004/8438/products/BOX_77173a4a-ef6d-4dda-ac0a-2f63c2be7460_1024x1024.jpg?v=1483464405" data-image-id="21200797708" data-zoom-image="http://cdn.shopify.com/s/files/1/1004/8438/products/BOX_77173a4a-ef6d-4dda-ac0a-2f63c2be7460.jpg?v=1483464405">
              <img class="thumbnail" src="https://cdn.shopify.com/s/files/1/1004/8438/products/BOX_77173a4a-ef6d-4dda-ac0a-2f63c2be7460_compact.jpg?v=1483464405" data-image-id="21200797708" alt="Gold lion stack" data-image-id="21200797708" />
            </a>
          </div>
           
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
            <span class="product-price" itemprop="price"><?=$price?> VND</span>
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
					  selectCallback = function(variant, selector) {
					    var $product = $('#product-' + selector.product.id);    
					    
					    
					    // BEGIN SWATCHES
					    if (variant) {
					      for (i=0;i<variant.options.length;i++) {
					        jQuery('.swatch[data-option-index="' + i + '"] :radio[value="' + variant.options[i] +'"]').prop('checked', true);
					      }      
					    }
					    // END SWATCHES
					    
					    
					    
					    if (variant && variant.available == true) {
					      if(variant.compare_at_price > variant.price){
					        $('.was', $product).html(Shopify.formatMoney(variant.compare_at_price, $('form', $product).data('money-format')))        
					      } else {
					        $('.was', $product).text('')
					      } 
					      $('.product-price', $product).html(Shopify.formatMoney(variant.price, $('form', $product).data('money-format'))) 
					      $('.add', $product).removeClass('disabled').removeAttr('disabled').val('Add to Cart');
					    } else {
					      var message = variant ? "Sold Out" : "Sold Out";
					      $('.was', $product).text('')
					      $('.product-price', $product).text(message);
					      $('.add', $product).addClass('disabled').attr('disabled', 'disabled').val(message); 
					    } 
					    
					    
					    
					    if (variant && variant.featured_image) {
					      var original_image = $("#<?=$pid?>"), new_image = variant.featured_image;

					                             
					                             var $slider = $('.mobile-gallery');
					      var original_image = $(".flex-active-slide img"), new_image = variant.featured_image;    
					                               

					      Shopify.Image.switchImage(new_image, original_image[0], function (new_image_src, original_image, element) {

					        $(element).parents('a').attr('href', new_image_src);
					        $(element).attr('src', new_image_src);   
					        $(element).attr('data-image', new_image_src);   
					        $(element).attr('data-zoom-image',new_image_src);

					        $('.thumbnail[data-image-id="' + variant.featured_image.id + '"]').trigger('click');

					                
					        $slider.each(function() { $(this).flexslider($('[data-image-id="' + variant.featured_image.id + '"]').data('index')); });
 								});
					    }
					  }; 
					</script>
					<script>$(window).load(function() { $('.selector-wrapper:eq()').hide(); });</script>   
        </div>

        <div class="pdp_details rrt">
        <?php the_content();?>
        </div>
        <div class="desc">
          <div class="share-icons">
					  <a title="Share on Facebook" href="https://www.facebook.com/sharer.php?u=<?php the_permalink()?>" class="facebook" target="_blank"><i class="icon-facebook icon-2x"></i></a>
					  <a href="https://instagram.com/zorrata" target="_blank"><i class="icon-instagram icon-2x"></i></a>
					  
					  <a title="Share on Twitter"  href="https://twitter.com/home?status=<?php the_permalink()?>" title="Share on Twitter" target="_blank" class="twitter"><i class="icon-twitter icon-2x"></i></a>
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
                  <div class="prod-price"><?=$price?> VND</div>
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
