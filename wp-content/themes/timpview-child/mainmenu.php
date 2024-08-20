<?php include_once(dirname(__FILE__).'/../../../wp-load.php'); ?>
<h1 class="hidden">Main Navigation</h1>
	<ul class="desktop-menu">
		<li><a href="<?php echo get_home_url(); ?>">News</a></li>
		<li class="droppable"><a href="<?php echo get_home_url(); ?>/school-information/">School Information</a>
			<div class="mega-menu">
				<h2>School Information</h2>
				<?php
			// get_template_part('template-parts/mega-menu-dropdowns', 'schoolInfo'); 
			$schoolinfo_menu = get_post(43177);
			echo do_shortcode($schoolinfo_menu->post_content);
			?>
			</div>
		</li>
		<li class="droppable"><a href="<?php echo get_home_url(); ?>/counseling-registration/" aria-haspopup="true">Counseling &amp; Registration</a>
			<div class="mega-menu" aria-label="submenu">
				<h2>Counseling &amp; Registration</h2>
				<?= get_post(42312)->post_content; ?>
					
			</div>
		</li>
		<li class="droppable"><a href="<?php echo get_home_url(); ?>/extracurricular/" aria-haspopup="true">Extracurricular</a>
			<div class="mega-menu" aria-label="submenu">
				<h2>Extracurricular</h2>
				<?= get_post(43352)->post_content; ?>
				
			</div>
		</li>
		<li class="droppable"><a href="<?php echo get_home_url(); ?>/policies-forms/" aria-haspopup="true">Policies &amp; Forms</a>
			<div class="mega-menu" aria-label="submenu">
				<h2>Policies &amp; Forms</h2>
				<?= get_post(43027)->post_content; ?>
			</div>
		</li>
		<li class="droppable"><a href="<?php echo get_home_url(); ?>/faculty-staff/" aria-haspopup="true">Teachers &amp; Staff</a>
			<div class="mega-menu" aria-label="submenu">
				<h2>Teachers &amp; Staff</h2>
				<?= get_post(42310)->post_content; ?>
			</div>
		</li>
	</ul>
<div  class="mobile-menu">
	<ul>
	   <li><a href="<?php echo get_home_url(); ?>">News</a></li>
	   <li><a href="<?php echo get_home_url(); ?>/school-information/">School Information</a></li>
	   <li><a href="<?php echo get_home_url(); ?>/counseling-registration/">Counseling &amp; Registration</a></li>
	   <li><a href="<?php echo get_home_url(); ?>/extracurricular/">Extracurricular</a></li>
	   <li><a href="<?php echo get_home_url(); ?>/policies-forms/">Policies & Forms</a></li>
	   <li><a href="<?php echo get_home_url(); ?>/faculty-staff/">Teachers &amp; Staff</a></li>
	</ul>
</div>