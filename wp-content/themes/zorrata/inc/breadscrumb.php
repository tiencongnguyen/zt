<?php
if (!function_exists('tcn_the_breadcrumb')) {
    function tcn_the_breadcrumb() {
        $seperator = '<span class="seperator"> / </span>';
        echo '<span><i class="fa fa-home"></i></span> <span typeof="v:Breadcrumb" class="root"><a rel="v:url" property="v:title" href="';
        echo home_url();
        echo '">'.sprintf( __( "Trang chủ", "zorrataa"));
        echo '</a></span>' . $seperator;

        if (is_category()) {
            $categories = get_the_category();
            $output = '';
            if($categories){
                foreach($categories as $category) {
                    if ($category->parent == 0) {
                        echo '<span class="page-title">' . $category->cat_name . '</span>';
                    } else {
                        echo '<div typeof="v:Breadcrumb"><a href="'.get_category_link( $category->term_id ).'" rel="v:url" property="v:title">'.$category->cat_name.'</a></div><div>' . $seperator . '</div>';
                    }
                }
            }
        } elseif (is_single()) {
            $categories = get_the_category();
            $output = '';
            if($categories){
                foreach($categories as $category) {
                    echo '<span typeof="v:Breadcrumb"><a href="'.get_category_link( $category->term_id ).'" rel="v:url" property="v:title">'.$category->cat_name.'</a></span>' . $seperator;
                }
            }
            echo '<span class="page-title">';
            the_title();
            echo "</span>";
        } elseif (is_page()) {
            echo '<span class="page-title">';
            the_title();
            echo "</span>";
        } else {
            echo '<span class="hidden"></<span>';
        }
    }
}