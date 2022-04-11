<?php

/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package your_tpl
 */


if (!is_active_sidebar('your_tpl-sidebar')) :
    return;
endif;
?>


<aside id="secondary" class="widget-area" role="complementary">
    <?php
    dynamic_sidebar('your_tpl-sidebar');
    ?>
</aside><!-- #secondary -->