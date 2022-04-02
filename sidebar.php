<?php

/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package realone
 */


if (!is_active_sidebar('realone-sidebar')) :
    return;
endif;
?>


<aside id="secondary" class="widget-area" role="complementary">
    <?php
    dynamic_sidebar('realone-sidebar');
    ?>
</aside><!-- #secondary -->