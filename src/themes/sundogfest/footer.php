<footer class="bg-dark pt-1 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 text-center text-lg-start">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <img src="<?php bloginfo('template_url'); ?>/images/logo-white-with-color.svg"
                         alt="<?php bloginfo('name'); ?> - Logo"
                         class="img-fluid" style="width: 200px;">
                    <span class="sr-only"><?php bloginfo('name'); ?></span>
                </a>
            </div><!-- col -->
            <div class="col-lg-8 text-center text-lg-end">
                <div class="d-lg-flex flex-lg-column">
                    <?php wp_nav_menu([
                        'theme_location' => 'primary',
                        'container_class' => 'd-none d-lg-flex',
                        'container_id' => '',
                        'menu_class' => 'ms-lg-auto navbar-nav d-flex flex-lg-row',
                        'fallback_cb' => '',
                        'menu_id' => '',
                        'walker' => new understrap_WP_Bootstrap_Navwalker(),
                    ]); ?>
                    <div id="top-buttons"
                         class="d-flex justify-content-center justify-content-lg-end align-items-center my-1 my-lg-0 me-0 me-lg-50">
                        <div class="social-links">
                            <?php while (have_rows('social_links', 'options')): the_row(); ?>
                                <a class="social-link btn btn-link text-white pt-50 px-250 pb-250 mb-0"
                                   style="margin-right: 4px" target="_blank" href="<?php the_sub_field('url'); ?>">
                                    <i class="<?php the_sub_field('icon_class'); ?>" style="font-size: 28px;">
                                        <span class="sr-only"><?php the_sub_field('label'); ?></span>
                                    </i>
                                </a>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div><!-- d-flex -->
            </div><!-- col -->
        </div><!-- row -->
        <div class="row text-white justify-content-center">
            <div class="col-lg-6 text-center">
                <p class="small">&copy; <?php echo Date('Y') . ' ' . get_bloginfo('name'); ?> | Designed, Developed
                    and Hosted by <a href="https://sproing.ca" target="_blank">Sproing&nbsp;Creative</a>
                </p>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

</body>

</html>