<?php

/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package paradiseit
 */

if (!is_active_sidebar('footer_info')) {
    return;
}
dynamic_sidebar('footer_info');
