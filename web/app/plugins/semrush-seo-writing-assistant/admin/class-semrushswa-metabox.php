<?php
/**
 * The metabox functionality of the plugin
 *
 * @link       https://www.semrush.com/
 * @since      1.0.0
 *
 * @package    SemrushSwa
 * @subpackage SemrushSwa/metabox
 */

/**
 * The metabox functionality of the plugin.
 *
 * Adds metabox area with div.
 *
 * @package    SemrushSwa
 * @subpackage SemrushSwa/metabox
 * @author     SEMrush <swa-feedback@semrush.com>
 */
class SemrushSwa_MetaBox {

	/**
	 * Meta box initialization.
	 */
	public function __construct() {
		add_action( 'add_meta_boxes', array( $this, 'add_metabox' ) );
	}

	/**
	 * Return post types array where to display this metabox.
	 *
	 * @return array
	 * @since  1.0.4
	 */
	private function get_metabox_post_types() {
		$default_post_types  = array( 'post', 'page', 'product' );
		$filtered_post_types = apply_filters( 'semrush_seo_writing_assistant_post_types', $default_post_types );

		return empty( $filtered_post_types )
			? $default_post_types
			: $filtered_post_types;
	}

	/**
	 * Adds the meta box.
	 */
	public function add_metabox() {
		$swa_docid_src = get_home_url( null, '/' ) . get_the_ID() . wp_salt();
		$swa_docid     = md5( $swa_docid_src );
		$swa_docurl    = get_edit_post_link( 0, 'raw' );

		if ( $swa_docid && $swa_docurl ) {
			add_thickbox();

			$custom_script_url = getenv( 'SEMRUSH_SWA_PLUGIN_SCRIPT_URL' );

			wp_enqueue_script(
				'swa_wordpress_js',
				$custom_script_url ? $custom_script_url : '//www.semrush.com/swa/addon/nocache/js/wordpress.js',
				array(),
				SEMRUSH_SEO_WRITING_ASSISTANT_VERSION,
				true
			);
			add_meta_box(
				'swa-meta-box',
				__( 'SEMrush SEO Writing Assistant' ),
				array( $this, 'render_metabox' ),
				$this->get_metabox_post_types(),
				'advanced',
				'default',
				array(
					'swa_docid'  => $swa_docid,
					'swa_docurl' => $swa_docurl,
				)
			);
		}
	}

	/**
	 * Renders the meta box.
	 *
	 * @param WP_Post $post The current post.
	 * @param array   $metabox With metabox id, title, callback, and args elements.
	 */
	public function render_metabox( $post, $metabox ) {
		$swa_docid  = $metabox['args']['swa_docid'];
		$swa_docurl = $metabox['args']['swa_docurl'];

		echo '<div id="swa-container" data-swa-docurl="' . esc_attr( $swa_docurl ) . '" data-swa-docid="' . esc_attr( $swa_docid ) . '"></div>';
	}

}
