<?php
include_once 'includes/headerLogo.php';
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class('antialiased relative'); ?>>

	<?php do_action('reichman_site_before'); ?>

	<div id="page" class="min-h-screen flex flex-col">

		<?php do_action('reichman_header'); ?>

		<header>
			<div class="header-wrapper flex justify-center md:justify-start items-center bg-white">
				<?php if (wp_is_mobile()) : ?>
					<figure class="aligncenter size-full"><img loading="lazy" width="457" height="131" src="<?= get_template_directory_uri() ?>/images/logos/logos_top_mobile.png" alt="" class="wp-image-25" srcset="<?= get_template_directory_uri() ?>/images/logos/logos_top_mobile.png 457w, <?= get_template_directory_uri() ?>/images/logos/logos_top_mobile-300x86.png 300w" sizes="(max-width: 457px) 100vw, 457px">
					</figure>
				<?php else : ?>
					<figure class="aligncenter size-full"><img loading="lazy" width="867" height="68" src="<?= get_template_directory_uri() ?>/images/logos/logos_top.png" alt="UMI - שורת לוגו" class="wp-image-17" srcset="<?= get_template_directory_uri() ?>/images/logos/logos_top.png 867w, <?= get_template_directory_uri() ?>/images/logos/logos_top-300x24.png 300w, <?= get_template_directory_uri() ?>/images/logos/logos_top-768x60.png 768w" sizes="(max-width: 867px) 100vw, 867px">
					</figure>
				<?php endif ?>
			</div>
		</header>

		<div id="content" class="site-content flex-grow">



			<?php do_action('reichman_content_start'); ?>

			<main>