<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Mono:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
	

<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header class="header">
    <div class="header__container">
    <!-- Logo cliquable redirigeant vers la page d'accueil -->
    <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
        <?php
        // Chemin du dossier d'uploads
        $upload_dir = wp_upload_dir();
        // Chemin complet de l'image du logo
        $logo_path = $upload_dir['baseurl'] . '/2024/04/logo-nathalie-mota.png';
        ?>
        <img src="<?php echo esc_url($logo_path); ?>" alt="Logo nathalie mota" width="216" height="14">
    </a>

    <div class="burger-menu-toggle">
        <div class="bar"></div>
        <div class="bar"></div>
        <div class="bar"></div>
    </div>

    <?php
    wp_nav_menu(array(
        'menu' => 'menu-header',
        'menu_class' => 'nav__header',
        'container' => 'nav',
        'container_class' => 'nav__header__container',
        'menu_class' => 'nav__header__container__list',
    ));
    ?>
    </div>
</header>


