<?php
/* Template Name: What We Do */

get_header();
while (have_posts()) {
	the_post();
?>
<?php }
get_footer();
