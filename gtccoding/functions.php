<?php

function gt_setup()
{
    wp_enqueue_style('goole-font', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css');
    wp_enqueue_style('style', get_stylesheet_uri(), NULL, microtime(), 'all');
    wp_enqueue_script('main', get_theme_file_uri('/js/main.js'), NULL, microtime(), true);
}
add_action('wp_enqueue_scripts', 'gt_setup');

function gt_init()
{
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support(
        'html5',
        array('comment-list', 'comment-from', 'search-from')
    );
}
add_action('after_setup_theme', 'gt_init');

// project post  type

function gt_custom_post_type(){
    register_post_type('project',
    array(
        'rewrite'=>array('slug'=>'projects'),
        'lebels'=>array(
            'name'=>'projects',
            'sigular_name'=>'project',
            'add_new_item'=>'Add new project',
            'edit_item'=>'Edit project'   
        ),
        'menu_icon'=>'dashicon-clipboard',
        'public'=>true,
        'has_archive'=>true,
        'supports'=>array(
            'title','thumbail','editer','excerpt','comments'
        )
        )
        );
}
add_action('init','gt_custom,_post_type');
