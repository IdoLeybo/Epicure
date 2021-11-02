<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Epicure</title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

    <header class="site-header">
        <nav class="header-nav">
            <div class="container">
                <div class="left-flex">
                    <div class="main-menu">
                        <div class="mobile-menu">
                            <button data-toggle="modal" data-target="#mobileMenuModal" class="mobile"><i class="fa fa-bars"></i></button>
                        </div>
                    </div>
                    <div class="logo">
                        <a href="<?php echo esc_url(home_url('/')); ?>">
                            <img src="<?php echo get_template_directory_uri() . '/img/logo.png'; ?>" class="logoimage">
                        </a>
                        <a href="<?php echo esc_url(home_url('/')); ?>">
                            <div class="header-title text-primary">EPICURE</div>
                        </a>
                    </div> <!--.logo-->
                    <div class="header-menu">
                            <?php
                            $args = array(
                                'theme_location' => 'header-menu',
                                'container'      => 'nav',
                                'container_class' => 'site-nav text-primary'
                            );
                            wp_nav_menu($args);
                            ?>
                    </div><!--.menu-->
                </div>

                <div class="right-flex">

                    <div class="shape-image-for-mobile">
                        <button onclick="openSearchField()" id="drop-search" class="dropbtn">
                            <img src="<?php echo get_template_directory_uri() . '/img/shape.png' ?>" />
                        </button>
                        <div id="mobile-header-search" class="dropdown-content">
                            <?php get_template_part('templates/filter', 'headersearch'); ?>
                        </div>
                    </div>

                    <div class="search-field">
                        <?php get_template_part('templates/filter', 'headersearch2'); ?>
                    </div>

                    <div class="user-fields-header">
                        <div class="user-menu">
                            <a class="btn btn-secondary" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="<?php echo get_template_directory_uri() . '/img/user-icon.png' ?>" alt="user icon">
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <?php
                                $args = array(
                                    'theme_location' => 'user-menu',
                                    'container'      => 'nav',
                                    'container_class' => 'user-nav'
                                );
                                wp_nav_menu($args);
                                ?>
                            </div>
                        </div>
                        <?php $id = um_profile_id();?>
                            <?php
                                global $wpdb;

                                $table = $wpdb->prefix . 'reservations';

                                $reservations = $wpdb->get_results(
                                        "SELECT * FROM wp_reservations 
                                                     WHERE user_id='$id'", ARRAY_A);
                                $count = sizeof($reservations);
                                if($count > 0) {?>
                            <div class="<?php echo $id ?>" id="bag-div-notification">
                                    <div class="notification"><?php echo strval($count); ?></div>
                                <?php } else {?>
                            <div class="<?php echo $id ?>" id="bag-div">
                                <?php } ?>
                            <a href="<?php echo get_permalink(get_page_by_title('Cart')); ?>" class="delete-user">

                                <img src="<?php echo get_template_directory_uri() . '/img/bag-icon.png' ?>">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

    </header>

    <div class="modal fade" id="mobileMenuModal" tabindex="-1" role="dialog" aria-labelledby="mobileMenuModalLabel" aria-hidden="true">
        <?php get_template_part('templates/mobile', 'menu'); ?>
    </div>



