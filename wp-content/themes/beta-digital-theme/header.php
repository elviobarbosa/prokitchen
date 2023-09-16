<!doctype html>
<html>
<head>
	<?php
	if( get_post_type() != 'post_produtos' && !is_page('contato')  ) {
		add_action( 'wpcf7_enqueue_styles', function() { wp_deregister_style( 'contact-form-7' ); } );
		add_action( 'wpcf7_enqueue_scripts', function() { wp_deregister_script( 'jquery-form' ); } );
		add_action( 'wpcf7_enqueue_scripts', function() { wp_deregister_script( 'contact-form-7' ); } );
	}
	?>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name=viewport content="width=device-width">
	<meta charset="UTF-8">
	<title><?php wp_title( '', true, 'right' );?></title>
	<link rel="shortcut icon" href="<?php bloginfo('wpurl');?>/favicon.ico" />

	<?php wp_head() ?>

</head>

<body <?php body_class(); ?>>
	<?php
		get_template_part('template-parts/whatsapp-float');
	?>
	<header class="header" id="menu-header" role="heading" aria-level="1">
		<div class="header__container">
			<div class="header__head">
				<div class="header__logo">
					<a href="<?php echo site_url('/')  ?>" alt="Voltar para o início" tabindex="0">
						<?php the_SVG('logo'); ?>
					</a>
				</div>
				<h2 class="page-title page-title__desktop"><?php echo get_the_archive_title() ?></h2>
			</div>

			<div class="nav__control" tabindex="1">
				<input type="checkbox" name="toogle-menu" class="nav__toggle-menu">
				<div class="nav__h-menu">
					<div class="nav__h-bars">
						<span></span>
						<span></span>
					</div>
					<div>MENU</div>
				</div>

				<?php 
					wp_nav_menu( 
					array( 
						'theme_location' 	=> 'header-menu',
						'menu_class'		=> 'menu',
						'container'			=> 'nav',
						'container_class' 	=> 'nav__menu'
					) ); 
				?>
			</div>
		</div>
	</header>
	
	<h2 class="page-title page-title__mobile"><?php echo get_the_archive_title() ?></h2>
