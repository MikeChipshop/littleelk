<?php

//add_action( 'after_setup_theme', 'twentyten_setup' );

/***************************************************
/ Add Featured Thumbs
/***************************************************/
if ( function_exists( 'add_image_size' ) ) add_theme_support( 'post-thumbnails' );


/***************************************************
/ Image Sizes
/***************************************************/

if ( function_exists( 'add_image_size' ) ) {
    add_image_size( 'regular-square', 500, 500, array( 'center', 'center' ));
	add_image_size( 'home-square', 380, 380, array( 'center', 'center' ));
	add_image_size( 'slide-d', 1400, 486);
	add_image_size( 'slide-m', 700, 840);
}

/****************************************************
ENQUEUES
*****************************************************/
function les_load_scripts() {

	wp_register_script( 'site-common', get_template_directory_uri() . '/js/site-common.js', array('jquery'),'null',true  );	
	wp_register_script( 'sliderjs', get_template_directory_uri() . '/js/lightslider.min.js', array('jquery'),'',true  );
    wp_register_style( 'main-css', get_template_directory_uri() . '/style.css','',time(), 'screen' );
    wp_register_style( 'slidercss', get_template_directory_uri() . '/css/lightslider.min.css','','', 'screen' );

    wp_enqueue_script( 'site-common' );
	wp_enqueue_script( 'sliderjs' );
    wp_enqueue_style( 'main-css' );
    wp_enqueue_style( 'slidercss' );

}

add_action('wp_enqueue_scripts', 'les_load_scripts');


/****************************************************
EXCERPTS
*****************************************************/

function cust_excerpt_length($length) {
	return 50;
}
add_filter('excerpt_length', 'cust_excerpt_length');

function twentyeleven_continue_reading_link() {
	return ' <a class="read-more" href="'. esc_url( get_permalink() ) . '">' . __( 'read more &raquo;', 'twentyeleven' ) . '</a>';
}

function twentyeleven_auto_excerpt_more( $more ) {
	return '&hellip;' . twentyeleven_continue_reading_link();
}
add_filter( 'excerpt_more', 'twentyeleven_auto_excerpt_more' );


/****************************************************
GALLERIES
*****************************************************/

/* Remove inline styles printed when the gallery shortcode is used. */
function twentyten_remove_gallery_css( $css ) {
	return preg_replace( "#<style type='text/css'>(.*?)</style>#s", '', $css );
}
add_filter( 'gallery_style', 'twentyten_remove_gallery_css' );

/****************************************************
COMMENTS
*****************************************************/

if ( ! function_exists( 'twentyten_comment' ) ) :

	function twentyten_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' : ?>
			<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
				<div id="comment-<?php comment_ID(); ?>">
					<div class="comment-author vcard">
						<?php echo get_avatar( $comment, 40 ); ?>
						<?php printf( __( '%s <span class="says">says:</span>', 'twentyten' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
					</div>
					<?php if ( $comment->comment_approved == '0' ) : ?>
						<em><?php _e( 'Your comment is awaiting moderation.', 'twentyten' ); ?></em><br />
					<?php endif; ?>
					<div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
						<?php printf( __( '%1$s at %2$s', 'twentyten' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)', 'twentyten' ), ' ' ); ?>
					</div>
					<div class="comment-body"><?php comment_text(); ?></div>
					<div class="reply">
						<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
					</div>
				</div>
		<?php break;
			case 'pingback'  :
			case 'trackback' :
		?>
		<li class="post pingback">
			<p>
				<?php _e( 'Pingback:', 'twentyten' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __('(Edit)', 'twentyten'), ' ' ); ?>
			</p>
		<?php break;
			endswitch;
		?>
		<?php
	}
endif;


/****************************************************
Remove Pre-packaged 'Recent Comment' Widget Styles
*****************************************************/
function twentyten_remove_recent_comments_style() {
	global $wp_widget_factory;
	remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
}
add_action( 'widgets_init', 'twentyten_remove_recent_comments_style' );

if ( ! function_exists( 'twentyten_posted_on' ) ) :

function twentyten_posted_on() {
	printf( __( '<span class="%1$s">Posted on</span> %2$s <span class="meta-sep">by</span> %3$s', 'twentyten' ),
		'meta-prep meta-prep-author',
		sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
			get_permalink(),
			esc_attr( get_the_time() ),
			get_the_date()
		),
		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
			get_author_posts_url( get_the_author_meta( 'ID' ) ),
			sprintf( esc_attr__( 'View all posts by %s', 'twentyten' ), get_the_author() ),
			get_the_author()
		)
	);
}
endif;

if ( ! function_exists( 'twentyten_posted_in' ) ) :
function twentyten_posted_in() {
	$tag_list = get_the_tag_list( '', ', ' );
	if ( $tag_list ) {
		$posted_in = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'twentyten' );
	} elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {
		$posted_in = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'twentyten' );
	} else {
		$posted_in = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'twentyten' );
	}
	printf(
		$posted_in,
		get_the_category_list( ', ' ),
		$tag_list,
		get_permalink(),
		the_title_attribute( 'echo=0' )
	);
}
endif;

/***************************************************
/ Sidebars
/***************************************************/
add_action( 'widgets_init', 'lesp_widgets_init' );
function lesp_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Shop', 'lesp' ),
        'id' => 'shop',
        'description' => __( 'Widgets in this area will be shown on shop pages.', 'lesp' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
	    'after_widget'  => '</li>',
	    'before_title'  => '<h2 class="widgettitle">',
	    'after_title'   => '</h2>',
    ) );
}

/***************************************************
/ HTML5 Placeholders for Comments Form
/***************************************************/

function my_update_fields($fields) {

	$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );

	$fields['author'] =
		'<p class="comment-form-author">
			<input required minlength="3" maxlength="30" placeholder="Your Name*" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
    '" size="30"' . $aria_req . ' />
    	</p>';

    $fields['email'] =
    	'<p class="comment-form-email">
    		<input required placeholder="Your Email*" id="email" name="email" type="email" value="' . esc_attr(  $commenter['comment_author_email'] ) .
    '" size="30"' . $aria_req . ' />
    	</p>';

	$fields['url'] =
		'<p class="comment-form-url">
			<input placeholder="Your URL" id="url" name="url" type="url" value="' . esc_attr( $commenter['comment_author_url'] ) .
    '" size="30" />
    	</p>';

	return $fields;
}
add_filter('comment_form_default_fields','my_update_fields');

function my_update_comment_field($comment_field) {

	$comment_field =
		'<p class="comment-form-comment">
			<textarea required placeholder="Enter Your Comment…" id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>
		</p>';

	return $comment_field;
}
add_filter('comment_form_field_comment','my_update_comment_field');


/***************************************************
/ Remove Auto <p>
/***************************************************/

function filter_ptags_on_images($content){
   return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}

add_filter('the_content', 'filter_ptags_on_images');

/***************************************************
/ Comment Form
/***************************************************/

add_filter( 'get_comment_author_link', 'pb18_remove_comment_author_link', 10, 3 );
function pb18_remove_comment_author_link( $return, $author, $comment_ID ) {
	return $author;
}

add_filter( 'comment_form_defaults', 'rich_text_comment_form' );
function rich_text_comment_form( $args ) {
	ob_start();
	wp_editor( '', 'comment', array(
		'media_buttons' => true, // show insert/upload button(s) to users with permission
		'textarea_rows' => '10', // re-size text area
		'dfw' => false, // replace the default full screen with DFW (WordPress 3.4+)
		'tinymce' => array(
        	'theme_advanced_buttons1' => 'bold,italic,underline,strikethrough,bullist,numlist,code,blockquote,link,unlink,outdent,indent,|,undo,redo,fullscreen',
	        'theme_advanced_buttons2' => '', // 2nd row, if needed
        	'theme_advanced_buttons3' => '', // 3rd row, if needed
        	'theme_advanced_buttons4' => '' // 4th row, if needed
  	  	),
		'quicktags' => array(
 	       'buttons' => 'strong,em,link,block,del,ins,img,ul,ol,li,code,close'
	    )
	) );
	$args['comment_field'] = ob_get_clean();
	return $args;
}

add_filter( 'comment_reply_link', '__THEME_PREFIX__comment_reply_link' );
function __THEME_PREFIX__comment_reply_link($link) {
    return str_replace( 'onclick=', 'data-onclick=', $link );
}

add_action( 'wp_head', '__THEME_PREFIX__wp_head' );
function __THEME_PREFIX__wp_head() {
?>
<script type="text/javascript">
    jQuery(function($){
        $('.comment-reply-link').click(function(e){
            e.preventDefault();
            var args = $(this).data('onclick');
            args = args.replace(/.*\(|\)/gi, '').replace(/\"|\s+/g, '');
            args = args.split(',');
            tinymce.EditorManager.execCommand('mceRemoveControl', true, 'comment');
            addComment.moveForm.apply( addComment, args );
            tinymce.EditorManager.execCommand('mceAddControl', true, 'comment');
        });
    });
</script>
<?php
}

/****************************************************
Shop Functions
*****************************************************/

// Declare Support
function lesp_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'lesp_add_woocommerce_support' );

// Remove Downloads
function lesp_woocommerce_account_menu_items_callback($items) {
    unset( $items['downloads'] );
    return $items;
}
add_filter('woocommerce_account_menu_items', 'lesp_woocommerce_account_menu_items_callback', 10, 1);

// Remove sidebar from single product pages
function lesp_remove_sidebar_product_pages() {
    if ( is_product() ) {
    remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
    }
}
add_action( 'wp', 'lesp_remove_sidebar_product_pages' );

/**
 * Hide category product count in product archives
 */
add_filter( 'woocommerce_subcategory_count_html', '__return_false' );

// -------------
// 1. Show Buttons

add_action( 'woocommerce_before_add_to_cart_quantity', 'bbloomer_display_quantity_plus' );

function bbloomer_display_quantity_plus() {
   echo '<button type="button" class="plus" >+</button>';
}

add_action( 'woocommerce_after_add_to_cart_quantity', 'bbloomer_display_quantity_minus' );

function bbloomer_display_quantity_minus() {
   echo '<button type="button" class="minus" >-</button>';
}

// Note: to place minus @ left and plus @ right replace above add_actions with:
// add_action( 'woocommerce_before_add_to_cart_quantity', 'bbloomer_display_quantity_minus' );
// add_action( 'woocommerce_after_add_to_cart_quantity', 'bbloomer_display_quantity_plus' );

// -------------
// 2. Trigger jQuery script

add_action( 'wp_footer', 'bbloomer_add_cart_quantity_plus_minus' );

function bbloomer_add_cart_quantity_plus_minus() {
   // Only run this on the single product page
   if ( ! is_product() ) return;
   ?>
      <script type="text/javascript">

      jQuery(document).ready(function($){

         $('form.cart').on( 'click', 'button.plus, button.minus', function() {

            // Get current quantity values
            var qty = $( this ).closest( 'form.cart' ).find( '.qty' );
            var val   = parseFloat(qty.val());
            var max = parseFloat(qty.attr( 'max' ));
            var min = parseFloat(qty.attr( 'min' ));
            var step = parseFloat(qty.attr( 'step' ));

            // Change the value if plus or minus
            if ( $( this ).is( '.plus' ) ) {
               if ( max && ( max <= val ) ) {
                  qty.val( max );
               } else {
                  qty.val( val + step );
               }
            } else {
               if ( min && ( min >= val ) ) {
                  qty.val( min );
               } else if ( val > 1 ) {
                  qty.val( val - step );
               }
            }

         });

      });

      </script>
   <?php
}
