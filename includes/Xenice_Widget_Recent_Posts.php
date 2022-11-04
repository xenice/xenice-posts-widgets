<?php

class Xenice_Widget_Recent_Posts extends Xenice_Widget_Posts {
    
    public $query_args =[
		'no_found_rows'       => true,
		'post_status'         => 'publish',
		'ignore_sticky_posts' => true,
	];
	
    public function __construct() {
        
        $this->title = __('Recent Posts', 'xenice-posts-widgets');
		parent::__construct( 'xenice-recent-posts', __( 'Xenice Recent Posts', 'xenice-posts-widgets'));
		
	}

}
