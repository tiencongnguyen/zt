    <!-- pair product list-->
    <?php
    $orig_post = $post;
    global $posts;
    $tags = wp_get_post_tags($post->ID);
    if ($tags) :
      $first_tag = $tags[0]->term_id;
      $args=array(
        'tag__in' => array($first_tag),
        'post__not_in' => array($post->ID),
        'posts_per_page'=>5,
        'caller_get_posts'=>1
      );
      $query = new WP_Query( $args );
      if ( $query->have_posts() ) :
        echo '<div class="pair_product_list">
          <div class="collection-carousel desktop-12 tablet-6 mobile-3">';
        while ( $query->have_posts() ) : $query->the_post(); ?>
        <?php $pid = get_the_ID(); $price = get_post_meta ($pid, 'price', 1); ?>
        <div class="lazyOwl" id="product-<?=$pid?>" data-alpha="<?php the_title() ?>" data-price="<?=$price?>">
          <div class="product-index-inner"> </div>
          <div class="prod-image"> <a href="<?php the_permalink();?>" title="<?php the_title()?>"> 
          <?php echo zorrataa_get_post_thumbnail (null, array(480,321)); ?> </a>
            <div class="product-info">
              <div class="product-info-inner">
                <a href="<?php the_permalink();?>">
                  <h3><?php the_title() ?></h3> </a>
                <div class="price">
                  <div class="prod-price"><?=$price?></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php 
        endwhile;
        echo '</div></div>';
      endif;
    endif;
    $post = $orig_post;
    wp_reset_query(); 
    ?><!-- end pair product list-->