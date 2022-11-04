<?php

/**
 * Plugin Name: Xenice Posts Widgets
 * Description: Show recent posts, hot posts and sticky posts
 * Version: 1.1.7
 * Author: Xenice
 * Author URI: https://www.xenice.com
 * Text Domain: xenice-posts-widgets
 * Domain Path: /languages
 */

function xenice_posts_widgets_styles(){
    echo '<style>
        .widget_recent_entries .thumbnail li{
            display:flex;
        }
        
        .widget_recent_entries .thumbnail li img {
            width: 122px;
            height: 86px;
            border-radius: 5px;
        }
    </style>';
}
    
add_action( 'plugins_loaded', function(){

    load_plugin_textdomain( 'xenice-posts-widgets', false , basename(__DIR__) . '/languages/' );

    add_action('widgets_init', function(){
        require __DIR__ . '/includes/Xenice_Widget_Posts.php';
        require __DIR__ . '/includes/Xenice_Widget_Recent_Posts.php';
        require __DIR__ . '/includes/Xenice_Widget_Hot_Posts.php';
        require __DIR__ . '/includes/Xenice_Widget_Sticky_Posts.php';
        register_widget('Xenice_Widget_Recent_Posts');
        register_widget('Xenice_Widget_Hot_Posts');
        register_widget('Xenice_Widget_Sticky_Posts');
    });
    
    // Add posts views
    add_filter('the_content', function($content){
        if(is_single()){
            global $post;
            $views = get_post_meta($post->ID, 'xenice_views', true);
            if($views && is_numeric($views)){
                $views ++;
            }
            else{
                $views = 1;
            }
            update_post_meta($post->ID, 'xenice_views', $views);
        }
        return $content;
    });
    
    
    add_action('wp_head', 'xenice_posts_widgets_styles');
});


