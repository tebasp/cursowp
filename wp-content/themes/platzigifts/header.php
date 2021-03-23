<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Platzi Gifts</title>
	<?php wp_head(); ?>
</head>
<body>
<header>
    <div class="container">
        <div class="row bg-info align-items-center">
            <div class="col-4">
                <img src="<?php echo get_template_directory_uri().'/assets/img/logo.png' ?>" alt="logo" >
            </div>

            <div class="col-8 ">
                <nav>
                    <?php
                        wp_nav_menu(
                                array(
                                        'theme_location' => 'top_menu',
                                        'menu_class' => 'menu-principal',
                                        'container_class' => 'container-menu'
                                )
                        );
                    ?>
                </nav>
            </div>
        </div>
    </div>
</header>