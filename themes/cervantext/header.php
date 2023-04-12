<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cervantext
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<!-- Google fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&family=Varela&display=swap" rel="stylesheet">
	<!-- Font awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div class="bg-light-pink-500">
		<div class="container mx-auto px-4">
			<div class="py-5">
				<div class="grid grid-cols-12 gap-4 items-center relative">
					<div class="col-span-9 md:col-span-6">
						<a href="<?php echo home_url(); ?>">
							<div class="relative w-60">
								<img src="<?php echo get_template_directory_uri(); ?>/images/bg-logo.png" alt="bg logo" class="absolute z-0 top-4 bg-logo" />
								<img src="<?php echo get_template_directory_uri(); ?>/images/logo.svg" alt="cervantext logo" class="w-60 z-10 relative" />
							</div>
						</a>
					</div>
					<div class="col-span-3 md:col-span-6 mx-auto md:mr-0">
						<div class="md:hidden w-min rounded bg-black text-white py-2 px-5 hover:bg-yellow-500 hover:text-black hover:shadow-xl" id="btn-menu-mobile">
							<i class="fa-solid fa-bars"></i>
						</div>
						<div class="absolute md:relative hidden md:block bg-light-pink-500 left-[4%] md:left-0 w-[90%] md:w-auto shadow-xl md:shadow-none rounded py-4 md:py-0 px-5 md:px-0" id="menu-mobile">
							<?php
							wp_nav_menu(
								array(
									'theme_location' => 'menu-1',
									'menu_id'        => 'primary-menu',
								)
							);
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>