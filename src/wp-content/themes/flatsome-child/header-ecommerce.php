<header id="header" class="header header-ecommerce-web <?php flatsome_header_classes(); ?>">
    <div class="header-wrapper">
        <div id="masthead" class="header-main <?php header_inner_class('main'); ?>">
            <div class="header-inner flex-row container <?php flatsome_logo_position(); ?>" role="navigation">

                <!-- Logo -->
                <div id="logo-ecommerce" class="flex-col logo">
                    <a href="<?php echo esc_url(home_url('/')); ?>">
                        <img width="250" height="72" src="https://www.epos.com.sg/wp-content/uploads/2026/03/EPOS_Zippy_International_RGB_Horizontal_Full-Colour.webp" class="header_logo header-logo" alt="logo-epos-ecommerce-web">
                    </a>
                </div>

                <!-- Mobile Left Elements -->
                <div class="flex-col show-for-medium flex-left">
                    <ul class="mobile-nav nav nav-left <?php flatsome_nav_classes('main-mobile'); ?>">
                        <?php flatsome_header_elements('header_mobile_elements_left', 'mobile'); ?>
                    </ul>
                </div>

                <!-- Left Elements -->
                <div class="flex-col hide-for-medium flex-left
            <?php if (get_theme_mod('logo_position', 'left') == 'left') echo 'flex-grow'; ?>">
                    <ul class="header-nav header-nav-main nav nav-left <?php flatsome_nav_classes('main'); ?>">
                        <?php flatsome_header_elements('header_elements_left'); ?>
                    </ul>
                </div>

                <!-- Right Elements -->
                <div class="flex-col hide-for-medium flex-right">
                    <ul class="header-nav header-nav-main nav nav-right <?php flatsome_nav_classes('main'); ?>">
                        <?php flatsome_header_elements('header_elements_right'); ?>
                    </ul>
                </div>

                <!-- Mobile Right Elements -->
                <div class="flex-col show-for-medium flex-right">
                    <ul class="mobile-nav nav nav-right <?php flatsome_nav_classes('main-mobile'); ?>">
                        <?php flatsome_header_elements('header_mobile_elements_right', 'mobile'); ?>
                    </ul>
                </div>

            </div>

            <?php if (get_theme_mod('header_divider', 1)) { ?>
                <div class="container">
                    <div class="top-divider full-width"></div>
                </div>
            <?php } ?>
        </div>
    </div>
</header>