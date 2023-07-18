<?php
/**
 *
 * Template Name: Events
 *
 **/
get_header();

//cta data form theme options
$footer_cta = get_field('footer_cta', 'options');
$align = $footer_cta['buttons_set'];
$footer_buttons = $footer_cta['buttons_set']['buttons'];

?>

    <main class="mt-2">
        <div class="container">
            <?php if (is_post_type_archive('tribe_events')) : ?>
            <div class="row justify-content-center">
                <div class="col">
                    <div class="text-center">
                        <h1 class="mb-lg-3">Upcoming Events</h1>
                    </div>
                </div><!-- col -->
            </div><!-- row -->
            <?php endif;?>
            <div class="row justify-content-center">
                <div class="col">
                    <div>
                        <?php if (have_posts()) : ?>
                            <?php while (have_posts()) : the_post(); ?>
                                <?php the_content(); ?>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div><!-- col -->
            </div><!-- row -->
        </div><!-- container -->
        <section class="overflow-hidden">
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
    </main>

<?php get_footer();