<?php

class Xenice_Widget_Hot_Posts extends Xenice_Widget_Posts {
    
    public $query_args =[
        'meta_key'            => 'xenice_views',
        'orderby'             => 'meta_value_num',
		'no_found_rows'       => true,
		'post_status'         => 'publish',
		'ignore_sticky_posts' => true,
	];
                    
    public function __construct() {
        
        $this->title = __('Hot Posts', 'xenice-posts-widgets');
		parent::__construct( 'xenice-hot-posts', __( 'Xenice Hot Posts', 'xenice-posts-widgets'));
		
	}

}
