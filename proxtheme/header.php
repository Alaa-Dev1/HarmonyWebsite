<!DOCTYPE HTML>
<html <?php language_attributes(); ?> dir="ltr">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="icon" href="<?php echo get_template_directory_uri() . '/images/favicon.png'; ?>" type="image/png" />

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<header>
		<div style="background-color:#016D47">
			<div class="container c16 py-3">
				<div class="row align-items-center">
					<div class="col-md-3">
						<?php $logo = get_field('logo', 'options');
						if ($logo) { ?>
							<a class="d-block" href="<?php echo get_option('home'); ?>">
								<img alt="<?php echo $logo['alt']; ?>" class="d-block mx-auto imgc" src="<?php echo $logo['url']; ?>" />
							</a>
						<?php } ?>
					</div>
					<div class="col-md-6">
						<nav id="HeaderNav">
							<div id="MobNavBtn"><span></span><span></span><span></span></div>
							<?php wp_nav_menu(array('theme_location' => 'header-menu', 'depth' => '2', 'container_class' => 'main_menu')); ?>
						</nav>
					</div>
					<div class="col-md-3">
						<nav id="HeaderNav2">
							<?php wp_nav_menu(array('theme_location' => 'header-menu2', 'depth' => '2', 'container_class' => 'main_menu')); ?>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</header>