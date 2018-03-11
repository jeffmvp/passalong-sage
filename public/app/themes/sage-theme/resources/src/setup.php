<?php

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function mvp_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/mvp
	 * If you're building a theme based on MVP, use a find and replace
	 * to change 'mvp' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'mvp' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	// Add Thumbnail Theme Support
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'large', 700, '', true ); // Large Thumbnail


	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'search-form',
		'gallery',
		'caption',
	) );

	/*
	 * Remove unused areas from the admin sidebar
	 */
	// add_action('admin_menu', function() {
	// 	// remove_menu_page( 'edit.php' );
	// 	remove_menu_page( 'edit-comments.php' );
	// });
}

add_action( 'after_setup_theme', 'mvp_setup' );



/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and
 * a 'Continue reading' link.
 *
 * @since Messerli_Kramer 1.0
 *
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
function mvp_excerpt_more( $link ) {
	if ( is_admin() ) {
		return $link;
	}

	$link = sprintf( '<p class="link-more"><a href="%1$s" class="more-link">%2$s</a></p>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		sprintf( __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'mvp' ), get_the_title( get_the_ID() ) )
	);

	return ' &hellip; ' . $link;
}

add_filter( 'excerpt_more', 'mvp_excerpt_more' );



/**
 * Enqueue scripts and styles.
 */

 function add_defer_attribute($tag, $handle) {
	// add script handles to the array below
	$scripts_to_defer = array('app');
	
	foreach($scripts_to_defer as $defer_script) {
	   if ($defer_script === $handle) {
		  return str_replace(' src', ' defer="defer" src', $tag);
	   }
	}
	return $tag;
 }
 add_filter('script_loader_tag', 'add_defer_attribute', 10, 2);


// function mvp_scripts() {
// 	wp_enqueue_style( 'theme', get_template_directory_uri() . '/assets/dist/styles.css', '1.0');

// 	if (!is_admin()) {
// 		// Deregister jQuery
// 		// And load a custom version in the footer
// 		wp_deregister_script('jquery');

// 		wp_enqueue_script('jquery', get_template_directory_uri() . '/assets/dist/slim.js', array(), '3.1.1', TRUE);

// 		// The last parameter set to TRUE states that it should be loaded
// 		// in the footer.
// 		wp_register_script('app', get_template_directory_uri() . '/assets/dist/app.js', FALSE, '1.0', FALSE);
// 		wp_enqueue_script('app');
//     }
// }

// add_action( 'wp_enqueue_scripts', 'mvp_scripts' );



/**
 * Remove everything related to the emoji support
 *
 * @since Shoreview 1.0
*/
function disable_emojicons_tinymce( $plugins ) {
  	if ( is_array( $plugins ) ) {
    	return array_diff( $plugins, array( 'wpemoji' ) );
  	} else {
    	return array();
	}
}

function disable_wp_emojicons() {
	// all actions related to emojis
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

	// filter to remove TinyMCE emojis
	add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
}

add_action( 'init', 'disable_wp_emojicons' );
add_filter( 'emoji_svg_url', '__return_false' );



/**
 * Allow for SVG's in Wordpress
 *
 * @since Shoreview 1.0
*/
function allow_svg($filetype_ext_data, $file, $filename, $mimes) {
	if ( substr($filename, -4) === '.svg' ) {
		$filetype_ext_data['ext'] = 'svg';
		$filetype_ext_data['type'] = 'image/svg+xml';
	}

	return $filetype_ext_data;
}

function cc_mime_types( $mimes = array() ) {
	$mimes['svg'] = 'image/svg+xml';

	return $mimes;
}

add_filter( 'wp_check_filetype_and_ext', 'allow_svg', 100, 4);
add_filter( 'upload_mimes', 'cc_mime_types' );




/**
 * Remove Actions
 *
 * @since Shoreview 1.0
*/

// Remove the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'rsd_link');

// Remove the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'wp_generator');

// Remove the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links_extra', 3);

// Remove the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'feed_links', 2);

// Remove link to index page
remove_action('wp_head', 'index_rel_link');

// Remove the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'wlwmanifest_link');

// remove_action('wp_head', 'rel_canonical');

// Remove random post link
remove_action('wp_head', 'start_post_rel_link', 10, 0);

// Remove parent post link
remove_action('wp_head', 'parent_post_rel_link', 10, 0);

// Remove the next and previous post links
// remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
// remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

/**
 * Remove Filters
 *
*/
// Remove <p> tags from Excerpt altogether
remove_filter('the_excerpt', 'wpautop');


//Comments
function my_comment_template( $comment, $args, $depth ) {
	
		$name = get_field('name', $comment);
		$startedDate = get_field('started_date', $comment);
		$email = get_field('email', $comment);
		$myWishForThisGift = get_field('my_wish_for_this_gift', $comment);
		?>
		
		<div class="TrackedGift-extra">
			<div class="TrackedGift-name">
			
				Passed Along to: <?php echo $name; ?>, Email: <?php echo $email ?>
			</div>
			<div class="TrackedGift-date">
				On: <?php echo $startedDate; ?>
			</div>
			<?php if ($myWishForThisGift != '') : ?>
			<div class="TrackedGift-message">
				
				<strong>My Wish for this Gift</strong><br/>
				<?php echo $myWishForThisGift; ?>
				

			</div>
			<?php endif; ?>

			<?php 
			if ($comment->user_id == get_current_user_id()) {
				echo 'FORMHERE';
					$settings = array(

					/* (string) Unique identifier for the form. Defaults to 'acf-form' */
					'id' => 'acf-form',
					
					/* (int|string) The post ID to load data from and save data to. Defaults to the current post ID. 
					Can also be set to 'new_post' to create a new post on submit */
					'post_id' => 'comment_{' . $comment->comment_ID . '}',
					
					/* (array) An array of post data used to create a post. See wp_insert_post for available parameters.
					The above 'post_id' setting must contain a value of 'new_post' */
					'new_post' => false,
					
					/* (array) An array of field group IDs/keys to override the fields displayed in this form */
					'field_groups' => false,
					
					/* (array) An array of field IDs/keys to override the fields displayed in this form */
					'fields' => false,
					
					/* (boolean) Whether or not to show the post title text field. Defaults to false */
					'post_title' => false,
					
					/* (boolean) Whether or not to show the post content editor field. Defaults to false */
					'post_content' => false,
					
					/* (boolean) Whether or not to create a form element. Useful when a adding to an existing form. Defaults to true */
					'form' => true,
					
					/* (array) An array or HTML attributes for the form element */
					'form_attributes' => array(),
					
					/* (string) The URL to be redirected to after the form is submit. Defaults to the current URL with a GET parameter '?updated=true'.
					A special placeholder '%post_url%' will be converted to post's permalink (handy if creating a new post)
					A special placeholder '%post_id%' will be converted to post's ID (handy if creating a new post) */
					'return' => '',
					
					/* (string) Extra HTML to add before the fields */
					'html_before_fields' => '',
					
					/* (string) Extra HTML to add after the fields */
					'html_after_fields' => '',
					
					/* (string) The text displayed on the submit button */
					'submit_value' => __("Update", 'acf'),
					
					/* (string) A message displayed above the form after being redirected. Can also be set to false for no message */
					'updated_message' => __("Post updated", 'acf'),
					
					/* (string) Determines where field labels are places in relation to fields. Defaults to 'top'. 
					Choices of 'top' (Above fields) or 'left' (Beside fields) */
					'label_placement' => 'top',
					
					/* (string) Determines where field instructions are places in relation to fields. Defaults to 'label'. 
					Choices of 'label' (Below labels) or 'field' (Below fields) */
					'instruction_placement' => 'label',
					
					/* (string) Determines element used to wrap a field. Defaults to 'div' 
					Choices of 'div', 'tr', 'td', 'ul', 'ol', 'dl' */
					'field_el' => 'div',
					
					/* (string) Whether to use the WP uploader or a basic input for image and file fields. Defaults to 'wp' 
					Choices of 'wp' or 'basic'. Added in v5.2.4 */
					'uploader' => 'wp',
					
					/* (boolean) Whether to include a hidden input field to capture non human form submission. Defaults to true. Added in v5.3.4 */
					'honeypot' => true,
					
					/* (string) HTML used to render the updated message. Added in v5.5.10 */
					'html_updated_message'	=> '<div id="message" class="updated"><p>%s</p></div>',
					
					/* (string) HTML used to render the submit button. Added in v5.5.10 */
					'html_submit_button'	=> '<input type="submit" class="acf-button button button-primary button-large" value="%s" />',
					
					/* (string) HTML used to render the submit button loading spinner. Added in v5.5.10 */
					'html_submit_spinner'	=> '<span class="acf-spinner"></span>',
					
					/* (boolean) Whether or not to sanitize all $_POST data with the wp_kses_post() function. Defaults to true. Added in v5.6.5 */
					'kses'	=> true
							
				);
				acf_form( $settings );
				
			}?>
		</div>
	
	<?php
}

$customer= get_role('customer');
$customer->add_cap('edit_comment');
$customer->add_cap('edit_posts');




