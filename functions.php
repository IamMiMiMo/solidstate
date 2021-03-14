<?php

require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/comment-helper.php';
require get_template_directory() . '/inc/search-helper.php';

function solidstate_theme_support(){
    //auto title tag
    add_theme_support("title-tag");
    add_theme_support("custom-logo");
    add_theme_support("post-thumbnails");
}

add_action("after_setup_theme", "solidstate_theme_support");

function solidstate_menus(){

    $locations = array(
        "header-menu" => "Header Menu",
    );

    register_nav_menus( $locations );
}

add_action( "init", "solidstate_menus" );

function solidstate_register_styles(){

    $version = wp_get_theme()->get("Version");
    wp_enqueue_style("solidstate-style",get_template_directory_uri() . "/style.css" , array(), $version, "all");
    wp_enqueue_style("solidstate-main",get_template_directory_uri() . "/assets/css/main.css" , array(), $version, "all");
    wp_enqueue_style("solidstate-fontawesome","https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css");

}

add_action("wp_enqueue_scripts", "solidstate_register_styles");

function solidstate_register_scripts(){

    $version = wp_get_theme()->get("Version");
    wp_enqueue_script("solidstate-jquery", get_template_directory_uri() . "/assets/js/jquery.min.js", array(), $version , true );
    wp_enqueue_script("solidstate-jquery-scrollex", get_template_directory_uri() . "/assets/js/jquery.scrollex.min.js", array(), $version , true );
    wp_enqueue_script("solidstate-browser", get_template_directory_uri() . "/assets/js/browser.min.js", array(), $version , true );
    wp_enqueue_script("solidstate-breakpoints", get_template_directory_uri() . "/assets/js/breakpoints.min.js", array(), $version , true );
    wp_enqueue_script("solidstate-util", get_template_directory_uri() . "/assets/js/util.js", array(), $version , true );
    wp_enqueue_script("solidstate-main", get_template_directory_uri() . "/assets/js/main.js", array(), $version , true );
}

add_action("wp_enqueue_scripts", "solidstate_register_scripts");

function solidstate_widget_areas(){

    register_sidebar(
        array(
            "before_title" => "<h3>",
            "after_title" => "</h3>",
            "before_widget" => '',
            "after_widget" => '',
            "name" => "Footer Column 1",
            "id" => "footer-1",
            "description" => "Only works if Pre-defined columns option enabled and at least 1 column is displayed.",
        )
    );

    register_sidebar(
        array(
            "before_title" => "<h3>",
            "after_title" => "</h3>",
            "before_widget" => '',
            "after_widget" => '',
            "name" => "Footer Column 2",
            "id" => "footer-2",
            "description" => "Only works if Pre-defined columns option enabled and 2 or more columns are displayed.",
        )
    );

    register_sidebar(
        array(
            "before_title" => "<h3>",
            "after_title" => "</h3>",
            "before_widget" => '',
            "after_widget" => '',
            "name" => "Footer Column 3",
            "id" => "footer-3",
            "description" => "Only works if Pre-defined columns option enabled and 3 or more columns are displayed.",
        )
    );

    register_sidebar(
        array(
            "before_title" => "<h3>",
            "after_title" => "</h3>",
            "before_widget" => '',
            "after_widget" => '',
            "name" => "Footer Column 4",
            "id" => "footer-4",
            "description" => "Only works if Pre-defined columns option enabled and 4 columns are displayed.",
        )
    );

}

add_action("widgets_init", "solidstate_widget_areas");

?>