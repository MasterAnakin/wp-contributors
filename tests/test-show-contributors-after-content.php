<?php
/**
 * Class Show_Contributors_After_Content
 *
 * @package Wp_Contributors
 */

/**
 * Test Show_Contributors_After_Content class. Main logic is surrounding show_contributors method.
 */
class Test_Show_Contributors_After_Content extends WP_UnitTestCase {
	/**
	 * Create a dummy post with the author. Testing foreach loop and getting the single contributor. 
	 */
	function test_show_contributors() {
		$post_id = $this->factory->post->create( [
			'post_status' => 'publish',
			'post_title'  => 'Test 1',
			'post_content' => 'Test Content',
			'post_author' => 1,
			'post_type' => 'post',
		] );
        $post = get_post( $post_id );

        $contributors_arr = array("0"=>1);
        foreach ( $contributors_arr as $single_con ){
            $single_contributor = get_user_by( 'id', $single_con );
        }
		$this->assertTrue( $contributors_arr != null );
        $this->assertTrue( $single_contributor != null );
	}
}
