<aside id="mainSidebar">
	<h1>School Information</h1>

	<?php
	$page_content =	get_post(43177);
	echo do_shortcode($page_content->post_content);
	?>
</aside>