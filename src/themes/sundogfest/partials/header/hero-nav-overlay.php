<header id="header" class="hero-nav-overlay">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <div class="nav-logo">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <img src="<?php bloginfo('template_url'); ?>/images/logo.svg"
                         alt="<?php bloginfo('name'); ?> - Logo"
                         class="img-fluid">
                    <span class="sr-only"><?php bloginfo('name'); ?></span>
                </a>
            </div>

            <button class="navbar-toggler m-0" type="button" data-bs-toggle="collapse" data-bs-target="#mobileNav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <div class="d-lg-flex flex-lg-column d-none">
                <?php wp_nav_menu([
                    'theme_location' => 'primary',
                    'container_class' => 'collapse navbar-collapse',
                    'container_id' => 'mainnav',
                    'menu_class' => 'navbar-nav ml-auto align-items-center',
                    'fallback_cb' => '',
                    'menu_id' => 'main-menu',
                    'walker' => new understrap_WP_Bootstrap_Navwalker(),
                ]); ?>
            </div>
        </div>
    </nav>
    <div class="navbar-placeholder"></div>

    <div class="collapse navbar-collapse bg-white d-lg-none" id="mobileNav">
        <?php wp_nav_menu([
            'theme_location' => 'primary',
            'container_class' => 'container',
            'container_id' => 'mainnav-mobile',
            'menu_class' => 'navbar-nav ml-auto',
            'fallback_cb' => '',
            'menu_id' => 'main-menu',
            'walker' => new understrap_WP_Bootstrap_Navwalker(),
        ]); ?>

        <div class="container d-flex justify-content-start align-items-center mb-150">
            <div class="social-links">
                <?php while( have_rows('social_links', 'options') ): the_row(); ?>
                    <a class="social-link btn btn-link text-dark pt-250 px-250 pb-250 my-0" style="margin-right: 4px" target="_blank" href="<?php the_sub_field('url'); ?>">
                        <i class="<?php the_sub_field('icon_class'); ?>" style="font-size: 28px;">
                            <span class="sr-only"><?php the_sub_field('label'); ?></span>
                        </i>
                    </a>
                <?php endwhile; ?>
            </div>
        </div>
    </div>

    <?php $header = get_field('header'); ?>
    <?php if($header) : ?>
    <section class="header__banner d-flex justify-content-center align-items-center position-relative" style="background-image: url(<?php echo esc_attr($header['banner_image']['url']);?>);background-repeat: no-repeat; background-size: cover; background-position: center;">
        <div class="block__tint-overlay <?php echo esc_attr($header['overlay']);?> position-absolute h-100 z-index-1"></div>
        <div class="container position-relative z-index-10">
            <div class="row justify-content-center text-center">
                <div class="col col-xwide-11 text-white text-decoration-none pt-2">
                    <?php echo $header['content'];?>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>
</header>