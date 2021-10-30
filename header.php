<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
                            <a href="#" class="mobile"><i class="fa fa-bars"></i></a>
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
                        <button><img src="<?php echo get_template_directory_uri() . '/img/shape.png' ?>" /></button>
                    </div>
                    <div class="search-field">
                            <input id="mySearch" class="mySearch" type="text" name="search" placeholder="Search for restaurant cuisine, chef">
                            <button><img src="<?php echo get_template_directory_uri() . '/img/shape.png' ?>" /></button>
                    </div>

                    <div class="user-fields-header">
                        <div class="user-menu">
                            <a class="btn btn-secondary" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="<?php echo get_template_directory_uri() . '/img/user-icon.png' ?>">
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
                        <a href="http://bedrock-local.co.il/cart/">
                            <img src="<?php echo get_template_directory_uri() . '/img/bag-icon.png' ?>">
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <div class="navigation-menu" style="display: none">
        <?php
        $args = array(
            'theme_location' => 'header-menu',
            'container'      => 'nav',
            'container_class' => 'site-nav'
        );
        wp_nav_menu($args);
        ?>
    </div>


