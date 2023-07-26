<?php
/**
 *
 * Template Name: Gutenberg
 *
 **/
get_header();
$contact_content = get_field('body');
?>

    <main>
        <?php get_template_part('partials/body/flexible-content'); ?>
        <section>
            <div class="container">
                <?php if (have_posts()) : ?>

                    <?php /* Start the Loop */ ?>

                    <?php while (have_posts()) : the_post(); ?>

                        <?php the_content(); ?>

                    <?php endwhile; ?>

                <?php endif; ?>
            </div><!-- container -->
        </section>
    </main>

<?php get_footer();