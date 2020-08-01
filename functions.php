<?php
add_theme_support( 'post-thumbnails' );

function register_menus() {
    register_nav_menus(
        array(
            'header-menu' => 'Header Menu'
        )
    );
}
add_action('init', 'register_menus');

function enqueue_scripts() {
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_style('darkly_fonts', get_template_directory_uri() . "/fonts.css");
}
add_action('wp_enqueue_scripts', 'enqueue_scripts');

function darkly_customize_preview_init() {
    wp_enqueue_script('customizer', get_template_directory_uri() . '/customizer.js', array("jquery", "customize-preview"));
}
add_action('customize_preview_init', 'darkly_customize_preview_init');

function darkly_customize_register( $wp_customize ) {
  $wp_customize->add_setting('main_color', array(
      'type' => 'theme_mod',
      'default' => '#11E38C',
      'transport' => 'postMessage'
  ));
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'main_color', array(
    'label' => 'Accent Color',
    'section' => 'colors'
  )));

  $wp_customize->add_setting('show_attribution', array(
    'type' => 'theme_mod',
    'default' => true,
    'transport' => 'postMessage'
  ));
  $wp_customize->add_control('show_attribution', array(
      'type' => 'checkbox',
      'section' => 'title_tagline',
      'label' => 'Show Attribution'
  ));
}
add_action('customize_register','darkly_customize_register');

function add_custom_styles() {
    ?>
    <style>:root {--main_color: <?php echo get_theme_mod('main_color', '#11E38C'); ?>;} .footer{display: <?php echo get_theme_mod('show_attribution', true) ? "block" : "none"; ?>;}</style>
    <?php
}
add_action('wp_head', 'add_custom_styles');
