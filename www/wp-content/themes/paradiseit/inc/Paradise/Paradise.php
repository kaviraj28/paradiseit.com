<?php

include_once __DIR__ . '/ContactDetailsWidget.php';
include_once __DIR__ . '/ShareLinksWidget.php';
include_once __DIR__ . '/CustomPostTypeAndTaxonomy.php';

/*Initialize Custom Post Type*/
new CustomPostTypeAndTaxonomy();

/*Initialize widgets*/
add_action('widgets_init',  function ($register_contact_details_widget) {
    $register_contact_details_widget = register_widget("ContactDetailsWidget");
    return $register_contact_details_widget;
});

add_action('widgets_init',  function ($register_contact_details_widget) {
    $register_contact_details_widget = register_widget("ShareLinksWidget");
    return $register_contact_details_widget;
});
