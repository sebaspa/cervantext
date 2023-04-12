<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cervantext
 */

?>

<footer class="pt-20 pb-10 bg-light-pink-500">
    <div class="container max-w-6xl mx-auto px-4">
        <p class="text-center text-gray-500/75 text-2xl mb-4">"<strong class="font-bold">La pluma es la lengua de la mente</strong>"</p>
        <p class="text-center text-xl text-gray-500/75 font-varela mb-10">Miguel de Cervantes Saavedra</p>
        <div class="border-t border-b border-gray-400 py-10 grid grid-cols-12 gap-4 items-center">
            <div class="col-span-12 sm:col-span-6">
                <a href="<?php echo home_url(); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/logo.svg" alt="cervantext logo" class="w-60 mx-auto sm:ml-0" />
                </a>
            </div>
            <div class="col-span-12 sm:col-span-6">
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'menu-1',
                        'menu_id'        => 'primary-menu-footer',
                    )
                );
                ?>

            </div>
        </div>
        <div class="grid grid-cols-12 gap-4 mt-10 items-center">
            <div class="col-span-12 md:col-span-6">
                <p class="text-sm md:text-lg text-center md:text-left text-gray-500/75">Cervantext© 2022. Todos los derechos reservados</p>
            </div>
            <div class="col-span-12 md:col-span-6">
            <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'menu-2',
                        'menu_id'        => 'footer-menu',
                    )
                );
                ?>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

</body>

</html>