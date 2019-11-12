<?php 
function launcher_setup_theme(){
    load_theme_textdomain("launcher");  
    add_theme_support("post-thumbnails");
    add_theme_support("title-tag");
};
add_action('after_setup_theme','launcher_setup_theme');

function launcher_assets(){

    wp_enqueue_style("animate-css",get_theme_file_uri("/markup/css/style.css"));
    wp_enqueue_style("animate-css",get_theme_file_uri("/markup/css/animate.css"));
    wp_enqueue_style("animate-css",get_theme_file_uri("/markup/css/icomoon.css"));
    wp_enqueue_style("bootstrap-css",get_theme_file_uri("/markup/css/bootstrap.css"));
    wp_enqueue_style("style",get_stylesheet_uri(),null,(1.0));

    wp_enqueue_script("jaquery",get_theme_file_uri("/markup/js/jquery.min.js"),array("jquery"),null,true);    
    wp_enqueue_script("easing-js",get_theme_file_uri("/markup/js/jquery.easing.1.3.js"),array("jquery"),null,true);
    wp_enqueue_script("bootstrap-js",get_theme_file_uri("/markup/js/bootstrap.min.js"),array("jquery"),null,true);
    wp_enqueue_script("waypoints-js",get_theme_file_uri("/markup/js/jquery.waypoints.min.js"),array("jquery"),null,true);
    wp_enqueue_script("simplyCountdown-js",get_theme_file_uri("/markup/js/simplyCountdown.js"),array("jquery"),null,true);
    wp_enqueue_script("main-js",get_theme_file_uri("/markup/js/main.js"),array("jquery"),time(),true);
    
    $launcher_year = get_post_meta(get_the_ID(),"year",true);
    $launcher_month = get_post_meta(get_the_ID(),"month",true);
    $launcher_day = get_post_meta(get_the_ID(),"day",true);

    wp_localize_script("main-js","date_data",array(
        "year"=> $launcher_year,
        "month" => $launcher_month,
        "day" => $launcher_day
    ));
};
add_action("wp_enqueue_scripts","launcher_assets");

function fotter_social(){
    register_sidebar(
        array(
            'id'=>'footer_social',
            'name' => 'Footer',
            'description' => 'footer Social Manu',
            'after_widget'=> ' ',
            'before_widget'=> ' ',
            'after_title' => ' ',
            'before_title' => ' ',
        )
        );
};
add_action("widgets_init","fotter_social");

//custom background image
function launcher_style(){
    
    $thumbnail_uri = get_the_post_thumbnail_url(null,"large");
    ?>
    <style>
    #fh5co-aside{
        background-image: url(<?php echo $thumbnail_uri; ?>);
    };  
    </style>
    <?php
}

add_action("wp_head","launcher_style");