<?php
/*==========================================================================================
Add stylesheets/javascripts to enqueue
============================================================================================*/
function my_theme_enqueue_styles() {
    wp_enqueue_style('parent-theme', get_template_directory_uri() .'/style.css');
    wp_enqueue_script( 'child_scripts', get_theme_file_uri().'/assets/js/child-scripts.js', '', '1.0.02', true);
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', '' , '1.0.1', false);
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles',20 );
/*==========================================================================================
// Favicon
============================================================================================*/
function pcsd_add_favicon(){ ?>
	<!-- Custom Favicons -->
	<link rel="shortcut icon" href="<?php echo get_theme_file_uri(); ?>/assets/images/favicon.png"/>
	<link rel="apple-touch-icon" href="<?php echo get_theme_file_uri(); ?>/assets/images/favicon.png">
	<?php }
//add the favicon link to the live site head
add_action('wp_head','pcsd_add_favicon');
//add the favicon to the login page
add_action('login_head','pcsd_add_favicon');
/*==========================================================================================
Custom Excerpt
============================================================================================*/
function get_excerpt(){
	$excerpt = get_the_content();
	//$excerpt = preg_replace(" ([.*?])",'',$excerpt);
	$excerpt = strip_shortcodes($excerpt);
	$excerpt = strip_tags($excerpt);
	$excerpt = substr($excerpt, 0, 200);
	$excerpt = substr($excerpt, 0, strripos($excerpt, " "));
	$excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
	$excerpt = '<p>'.$excerpt.'...'.'</p>';
	return $excerpt;
}
/*==========================================================================================
// custom Login Page
============================================================================================*/
function my_custom_login() {
echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('stylesheet_directory') . '/login/custom-login-styles.css" />';
}
add_action('login_head', 'my_custom_login');

function my_login_logo_url() {
return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
return 'Timpview High School | Provo City School District';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );
/*==========================================================================================
// ShortCodes
============================================================================================*/
/*==========================================================================================
// Add link to stats for a user
============================================================================================*/
//this will add a stats link under the dashboard menu.
if ( !function_exists( 'single_submenu_dropdown_link_example' ) || current_user_can('svo_page_stats', $post->ID) ) {
function single_submenu_dropdown_link_example() {
	global $submenu;
	$link_to_add = 'admin.php?page=stats&view=post&post=46446';
	// change edit.php to the top level menu you want to add it to
	$submenu['index.php'][] = array('Stats', 'svo_page_stats', $link_to_add);
}
add_action('admin_menu', 'single_submenu_dropdown_link_example');
}
/*==========================================================================================
// ShortCodes
============================================================================================*/
//Display Modified Date [modified-date]
function modifiedDate_func(){
	if(!is_page(array(43440,43437,43399,42984,43435, 42742,42740,42744,42746))) {
		?>
		 <p class="lastmodified"><em>Last modified: <?php the_modified_date(); ?></em></p>
		<?php
	}
}
add_shortcode( 'modified-date', 'modifiedDate_func' );
//sidebar controll [sidebar-control]
function sidebar_func(){
		//global $post;
		if(in_array( 43177, get_post_ancestors($post))) {
			   get_sidebar( 'about-timpview' );
		   } elseif(in_array( 42312, get_post_ancestors($post))) {
			   get_sidebar( 'counseling' );
		   } elseif(in_array( 43352, get_post_ancestors($post))) {
			   get_sidebar( 'extracurricular' );
		   } elseif(in_array( 43027, get_post_ancestors($post))) {
			   get_sidebar( 'policies-forms' );
		   } elseif(in_array( 42310, get_post_ancestors($post))) {
			   get_sidebar( 'faculty-staff' );
		   } else {
			   get_sidebar( $sidebar );
		   }
}
add_shortcode( 'sidebar-control', 'sidebar_func' );
