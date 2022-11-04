<?php

class Xenice_Widget_Sticky_Posts extends Xenice_Widget_Posts {
    
    public $query_args =[
        'orderby'             => 'modified',
        'post__in' => '',
		'no_found_rows'       => true,
		'post_status'         => 'publish',
		'ignore_sticky_posts' => true,
	];
                    
    public function __construct() {
        
        $this->title = __('Sticky Posts', 'xenice-posts-widgets');
        $this->query_args['post__in'] = get_option('sticky_posts');
		parent::__construct( 'xenice-sticky-posts', __( 'Xenice Sticky Posts', 'xenice-posts-widgets'));
		
	}

}
