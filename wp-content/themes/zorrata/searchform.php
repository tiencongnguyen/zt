<?php
/**
 * Template for displaying search forms in Zorrataa
 *
 * @package TienCongNguyen
 * @subpackage zorrataa
 * @since 1.0
 * @version 1.0
 */

?>

<?php $unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>
<form role="search" action="<?php echo esc_url(home_url('/')); ?>" method="get">
            <input type="text" name="s" id="<?php echo $unique_id; ?>" value="<?php echo get_search_query(); ?>" placeholder="<?php _e('Enter your search terms', 'zorrataa'); ?>" /> <span class="close_search_form"></span> </form>