<!DOCTYPE html>
<html>
<head>
<?php wp_head(); ?>
<title><?php bloginfo('name'); ?></title>
</head>
<body>

<div class="header">
    <a href="<?php echo esc_url(home_url('/')); ?>"><h1 class="site-title"><?php bloginfo('name'); ?></h1></a>
    <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
</div>