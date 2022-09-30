<?php
/**
 * Class Test_Contributors_Custom_Meta_Box
 *
 * @package Wp_Contributors
 */

/**
 * Test Contributors_Custom_Meta_Box class. Main logic is surrounding render_metabox method.
 */
class Test_Contributors_Custom_Meta_Box extends WP_UnitTestCase {
	/**
	 * Checking render metabox method and cross array comparison of contributors user IDs.
	 */
	function test_render_metabox() {
		//Set author id to 1 to run the test.
		$post_id = $this->factory->post->create( [
			'post_status' => 'publish',
			'post_title'  => 'Test 1',
			'post_content' => 'Test Content',
			'post_author' => 1,
			'post_type' => 'post'
		] );
        $post = get_post( $post_id );
		$contributors_arr_sub_lvl = array("0"=>1);
		$list_all_users_for_dropdown = get_users( array( 'role__in' => array( 'author', 'editor', 'administrator', ) ) );
		foreach ( $list_all_users_for_dropdown as $single_user_for_dropdown ) {
			if ( $contributors_arr_sub_lvl != null && in_array( $single_user_for_dropdown->ID, $contributors_arr_sub_lvl ) ) { 
				$checked = true;
			}
		}
		//Checking list of all users from dummy post.
		$this->assertTrue($list_all_users_for_dropdown != null);
		//If one of the current users IDs is present in contributors array meta, checked will return true.
		$this->assertTrue($checked);
	}
}