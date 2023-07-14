<?php
/**
 *
 * Template Name: Events
 *
 **/
get_header(); ?>

    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col">
                    <div class="text-center">
                        <h1 class="mb-lg-3">Upcoming Events</h1>
                    </div>
                </div><!-- col -->
            </div><!-- row -->
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
                            <h1>Become A Volunteer</h1>
                            <p>We are looking for people who are available to help with a variety of activities. Send us
                                a note and share with us what skills you have to offer.</p>
                            <a href="#" class="btn btn-primary">Get Involved</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

<?php get_footer();