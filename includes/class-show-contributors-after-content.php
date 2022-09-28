<?php

class Show_Contributors_After_Content {
    public function __construct() {
		add_filter('the_content', [$this, 'show_contributors']);
	}
    function show_contributors( $content ) {
        global $post;
        $contributors_arr = get_post_meta( $post->ID, 'contributors-array', true );
        if ( $contributors_arr != null ){
            $content .= '<h3 class="h3-contributors">' . __( "Contributors", "contributors" ) .'</h3>';
            foreach ( $contributors_arr as $single_con ){
                $single_contributor = get_user_by( 'id', $single_con );
                $gravatar = get_avatar( $single_con );
                $content .= '<div class="wp-contributors">' . $gravatar . '<br /><a href="' . get_author_posts_url( $single_con ) . '">' . $single_contributor->user_login  . '</a></div>';
            }
        }

        return $content;
    }
}

$show_contributors_after_content = new Show_Contributors_After_Content();