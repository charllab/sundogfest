<?php get_header(); ?>
    <main>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="text-center">
                            <h1>Upcoming Events</h1>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <?php
                    $args = array(
                        'post_type' => 'tribe_events',
                        'posts_per_page' => 3,
                        'meta_key' => '_EventStartDate',
                        'orderby' => '_EventStartDate',
                        'order' => 'ASC',
                        'eventDisplay' => 'list',
                    );

                    $events_query = new WP_Query($args);

                    if ($events_query->have_posts()) {
                        while ($events_query->have_posts()) {
                            $events_query->the_post();
                            // Display the event title and other details you want here
                            // Get the event link
                            $event_link = get_permalink();
                            echo '<div class="col-md-4 col-xwide-3">';
                            echo '<div class="text-center">';
                            echo '<a href="' . $event_link . '">';
                            // Get the post thumbnail (featured image)
                            $thumbnail = get_the_post_thumbnail(get_the_ID(), 'full', array(
                                'class' => 'event-image img-fluid p-1',
                                'alt' => get_the_title()
                            ));
                            // Get the start date
                            $start_date = get_post_meta(get_the_ID(), '_EventStartDate', true);
                            // Get the end date
                            $end_date = get_post_meta(get_the_ID(), '_EventEndDate', true);

                            echo $thumbnail;
                            echo '<a>';
                            // Display the event title, start date, and end date
                            echo '<p>';
                            echo '<b>' . get_the_title() . '</b><br>';
                            echo '<span class="text-body-tertiary">' . date('F j', strtotime($start_date));
                            echo ' - ';
                            echo date('F j, Y', strtotime($end_date));
                            echo '</span></p>';
                            echo '<a href="' . $event_link . '" class="btn btn-primary">Read More</a>';
                            echo '</div>';
                            echo '</div>';
                        }
                    } else {
                        // no posts found
                        echo '<div class="col text-center">';
                        echo '<p class="lead">';
                        echo 'Sorry, there are currently no events.';
                        echo '</p>';
                        echo '</div>';
                    }
                    // Restore original Post Data
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
        </section>
        <?php get_template_part('partials/body/flexible-content'); ?>
    </main>
<?php get_footer();
