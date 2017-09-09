    <?php
    $orig_post = $post;
    global $posts;
    $categories = get_the_category($post->ID);
    if ($categories) :
      $category_ids = array();
      foreach($categories as $individual_category) :
          $category_ids[] = $individual_category->term_id;
      endforeach;
      $args = array(
        'category__in' => $category_ids,
        'post__not_in' => array($post->ID),
        'posts_per_page'=> 10, // Number of related posts that will be shown.
        'caller_get_posts'=>1
      );
      $query = new WP_Query( $args );
      if ( $query->have_posts() ) :
        echo '<div class="section-title lines tablet-6 desktop-12"><h2>'. get_theme_mod('product-related', 'More in this Collection') . '</h2></div>';
        echo '<div class="collection-carousel desktop-12 tablet-6 mobile-3">';
        while ( $query->have_posts() ) : $query->the_post(); ?>
        <?php $pid = get_the_ID(); $price = get_post_meta ($pid, 'price', 1); ?>
        <div class="lazyOwl" id="prod-<?=$pid?>" data-alpha="<?php the_title() ?>" data-price="<?=$price?>">
            <div class="prod-image"> <a href="<?php the_permalink();?>" title="<?php the_title() ?>"> 
            <?php echo zorrataa_get_post_thumbnail (null, array(480,321)); ?> </a>
              <div class="product-info">
                <div class="product-info-inner">
                  <a href="<?php the_permalink();?>">
                    <h3><?php the_title();?></h3> </a>
                  <div class="price">
                    <div class="prod-price"><?=$price?></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php 
        endwhile;
        echo '</div>';
      endif;
    endif;
    $post = $orig_post;
    wp_reset_query(); 
    ?>