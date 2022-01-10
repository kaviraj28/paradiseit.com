<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package paradiseit
 */

get_header();
?>

<div class="error-area">
	<div class="d-table">
		<div class="d-table-cell">
			<div class="container">
				<div class="error-content">
					<div class="notfound-404">
						<h1>Oops!</h1>
					</div>
					<h3>404 - Page not found</h3>
					<p>The page you are looking for might have been removed had its name changed or is temporarily
						unavailable.</p>
					<a href="/" class="btn btn-primary">Go to Homepage</a>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
get_footer();
