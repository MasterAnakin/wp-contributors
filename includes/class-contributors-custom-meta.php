<?php

class Contributors_Custom_Meta_Box {

	/**
	 * Constructor.
	 */
	public function __construct() {
		//if ( is_admin() ) {
			add_action( 'load-post.php',     array( $this, 'init_metabox' ) );
			add_action( 'load-post-new.php', array( $this, 'init_metabox' ) );
		//}
	}

	/**
	 * Meta box initialization.
	 */
	public function init_metabox() {
		add_action( 'add_meta_boxes', array( $this, 'add_metabox'  )        );
		add_action( 'save_post',      array( $this, 'save_metabox' ), 10, 2 );
	}

	/**
	 * Adds the meta box.
	 */
	public function add_metabox() {
		add_meta_box(
			'Contributors',
			__( 'Contributors', 'co-author' ),
			array( $this, 'render_metabox' ),
			'post',
			'side',
			'default'
		);

	}

	/**
	 * Renders the meta box.
	 */
	public function render_metabox( $post ) {
		//Check post meta array with list users array and marked checked ones as checked.
		$contributors_arr = get_post_meta( $post->ID, 'contributors-array' );
		$contributors_arr_sub_lvl = $contributors_arr[0] ?? null;
		$list_all_users_for_dropdown = get_users( array( 'role__in' => array( 'author', 'editor', 'administrator', ) ) );
		foreach ( $list_all_users_for_dropdown as $single_user_for_dropdown ) {
			if ( $contributors_arr_sub_lvl != null && in_array( $single_user_for_dropdown->ID, $contributors_arr_sub_lvl ) ) { $checked = 'checked="checked"';} else {$checked = '';}	
		?>
			<input type="checkbox" id="<?php echo esc_html( $single_user_for_dropdown->user_login ); ?>" name="co-author[]" value="<?php echo  $single_user_for_dropdown->ID; ?>" <?php echo $checked;?>>
			<label for="<?php echo esc_html( $single_user_for_dropdown->user_login ); ?>"> <?php echo esc_html( $single_user_for_dropdown->display_name ); ?></label><br>	
		<?php

	}
		wp_nonce_field( 'custom_nonce_action', 'contributors_nonce' );
	}
	/**
	 * Handles saving the meta box.
	 *
	 * @param int     $post_id Post ID.
	 * @param WP_Post $post    Post object.
	 * @return null
	 */
	public function save_metabox( $post_id, $post ) {
		// Add nonce for security and authentication.
		$nonce_name   = isset( $_POST['contributors_nonce'] ) ? $_POST['contributors_nonce'] : '';
		$nonce_action = 'custom_nonce_action';

		// Check if nonce is valid.
		if ( ! wp_verify_nonce( $nonce_name, $nonce_action ) ) {
			return;
		}

		// Check if user has permissions to save data.
		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}

		// Check if not an autosave.
		if ( wp_is_post_autosave( $post_id ) ) {
			return;
		}

		// Check if not a revision.
		if ( wp_is_post_revision( $post_id ) ) {
			return;
		}
		else {
		$contributors_arr = array();
		$cuscontributors_arr = $_POST['co-author'];
		update_post_meta($post->ID, 'contributors-array', $cuscontributors_arr);
		}
	}
}
new Contributors_Custom_Meta_Box();