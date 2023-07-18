<?php
/**
 *
 * Template Name: Contact Us
 *
 **/
get_header();
$contact_content = get_field('body');
?>

    <main>
        <section>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-4">
                                <?php
                                //acf fields data
                                $content_area = $contact_content['content_area'];
                                $align = $content_area['buttons_set'];
                                $buttons = $content_area['buttons_set']['buttons'];
                                ?>
                                <div class="pe-md-3 pe-lg-5 contact__content">
                                    <?php echo $content_area['content']; ?>
                                    <?php if ($buttons): ?>
                                        <div class="<?php echo esc_attr($align['alignment']) ?>">
                                            <?php foreach ($buttons as $button): ?>
                                                <a href="<?php echo $button['link']['url']; ?>"
                                                   class="btn <?php echo esc_attr($button['style']); ?>">
                                                    <?php echo $button['link']['title']; ?>
                                                </a>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php wp_reset_postdata(); ?>
                    </div><!-- col -->
                    <div class="col-md-6 col-lg-6">
                        <div>
                            <?php echo do_shortcode('[gravityform id="1" title="false" description="false" ajax="true"]') ?>
                        </div>
                    </div><!-- col -->
                </div><!-- row -->
            </div><!-- container -->
        </section>
    </main>

<?php get_footer();