<?php
/* Template Name: CEO Message */

get_header();
while (have_posts()) {
	the_post();
?>
<?php }
get_footer();
