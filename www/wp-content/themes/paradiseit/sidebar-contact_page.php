<?php

/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package paradiseit
 */

if (!is_active_sidebar('contact_page')) {
    return;
}
dynamic_sidebar('contact_page');
