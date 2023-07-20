<?php if ( !is_page_template('page-contact.php') ) :
//partners page choices
$footer = get_field('footer');
$page_options = $footer['partners'];
$cta_options = $footer['call_to_action'];
//partners data form theme options
$gold_partners = get_field('gold_partners', 'options');
$gold_partner = $gold_partners['partner'];
$gold_align = $gold_partners['buttons_set'];
$gold_buttons = $gold_partners['buttons_set']['buttons'];
$silver_partners = get_field('silver_partners', 'options');
$silver_partner = $silver_partners['partner'];
$silver_align = $silver_partners['buttons_set'];
$silver_buttons = $silver_partners['buttons_set']['buttons'];
//cta data form theme options
$footer_cta = get_field('footer_cta', 'options');
$align = $footer_cta['buttons_set'];
$footer_buttons = $footer_cta['buttons_set']['buttons'];
?>
<section class="<?php echo ($page_options != 'partners-gold' && $page_options != 'partners-all') ? 'd-none' : ''; ?>">
    <div class="container">
        <div class="row parent">
            <div class="col text-center">
                <div class="child">
                    <?php echo $gold_partners['content'];?>
                </div>
            </div><!-- col -->
        </div><!-- row -->
        <div class="row parent justify-content-center align-items-center">
            <?php foreach ($gold_partner as $partner):?>
            <div class="col-6 col-md-4">
                <div class="child">
                    <?php if($partner['website']):?>
                    <a href="<?php echo esc_attr($partner['website']);?>" title="Visit website">
                    <?php endif; ?>
                        <img src="<?php echo $partner['logo']['url'];?>" alt="<?php echo $partner['logo']['alt'];?>" class="img-fluid">
                    <?php if($partner['website']):?>
                    </a>
                    <?php endif; ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div><!-- row -->
        <?php if ($gold_buttons):?>
        <div class="row">
            <div class="div <?php echo esc_attr($gold_align['alignment'])?>">
                <?php foreach ($gold_buttons as $button):?>
                    <a href="<?php echo $button['link']['url']; ?>"
                       class="btn <?php echo esc_attr($button['style']);?>">
                        <?php echo $button['link']['title']; ?>
                    </a>
                <?php endforeach; ?>
            </div><!-- col -->
        </div><!-- row -->
        <?php endif; ?>
    </div><!-- container -->
</section>
<section class="<?php echo ($page_options != 'partners-silver' && $page_options != 'partners-all') ? 'd-none' : ''; ?>">
    <div class="container">
        <div class="row parent text-center">
            <div class="col">
                <div class="child">
                    <?php echo $silver_partners['content'];?>
                </div>
            </div><!-- col -->
        </div><!-- row -->
        <div class="row parent justify-content-center align-items-center">
            <?php foreach ($silver_partner as $partner):?>
                <div class="col-4 col-md-2">
                    <div class="child">
                        <?php if($partner['website']):?>
                        <a href="<?php echo esc_attr($partner['website']);?>" title="Visit website">
                            <?php endif; ?>
                            <img src="<?php echo $partner['logo']['url'];?>" alt="<?php echo $partner['logo']['alt'];?>" class="img-fluid">
                            <?php if($partner['website']):?>
                        </a>
                    <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div><!-- row -->
        <?php if ($silver_buttons):?>
            <div class="row">
                <div class="div <?php echo esc_attr($silver_align['alignment'])?>">
                    <?php foreach ($silver_buttons as $button):?>
                        <a href="<?php echo $button['link']['url']; ?>"
                           class="btn <?php echo esc_attr($button['style']);?>">
                            <?php echo $button['link']['title']; ?>
                        </a>
                    <?php endforeach; ?>
                </div><!-- col -->
            </div><!-- row -->
        <?php endif; ?>
    </div><!-- container -->
</section>
<section class="overflow-hidden <?php echo ($cta_options == 'd-block') ? '' : 'd-none'; ?>">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10 col-lg-6">
                <div class="position-relative sundogs--left sundogs--right text-center px-1">
                    <?php echo $footer_cta['content'];?>
                    <?php if ($footer_buttons):?>
                        <div class="<?php echo esc_attr($align['alignment'])?>">
                            <?php foreach ($footer_buttons as $button):?>
                                <a href="<?php echo $button['link']['url']; ?>"
                                   class="btn <?php echo esc_attr($button['style']);?>">
                                    <?php echo $button['link']['title']; ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
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
                <p class="small">&copy; <?php echo Date('Y') . ' ' . get_bloginfo('name'); ?> | <a href="<?php echo esc_url(home_url('/terms-of-use-and-privacy-policy')); ?>" class="text-white text-decoration-none">T&C's</a> | Designed, Developed
                    and Hosted by <a href="https://sproing.ca" target="_blank">Sproing&nbsp;Creative</a>
                </p>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

</body>

</html>