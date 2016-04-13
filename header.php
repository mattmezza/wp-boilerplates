<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <title><?php echo get_bloginfo( 'name' ); ?></title>
    <meta charset="utf-8">
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <![endif]-->
    <meta name="description" content="<?php echo get_bloginfo( 'description' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="stylesheet" href="<?php bloginfo('template_directory');?>/css/bootstrap.min.css"> -->

    <!--[if lt IE 9]>
        <script src="<?php bloginfo('template_directory');?>/js/vendor/html5shiv.min.js"></script>
        <script src="<?php bloginfo('template_directory');?>/js/vendor/respond.min.js"></script>
    <![endif]-->
<?php wp_head();?>
</head>
<body>
    <!--[if lt IE 9]>
        <div class="bg-danger text-center">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/" class="highlight">upgrade your browser</a> to improve your experience.</div>
    <![endif]-->

<?php get_search_form(); ?>

<?php
$opt = array(
    'container'       => 'nav',
    'container_class' => '',
    'menu_class'      => '',
    'echo'            => true,
    'fallback_cb'     => '',
    'depth'           => 0
);
wp_nav_menu( $opt );
 ?>
