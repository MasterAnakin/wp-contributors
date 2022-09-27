<?php

if (!defined('WP_UNINSTALL_PLUGIN')) exit;

$list_posts_args = array( 'posts_per_page' => -1, 'post_type'=> 'post' );
$all_posts = get_posts( $list_posts_args );
foreach ( $all_posts as $post ) {
	delete_post_meta($post->ID, 'contributors-array');
}

