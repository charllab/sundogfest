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
                // Query for featured events first
                $args_featured = array(
                    'post_type' => 'tribe_events',
                    'posts_per_page' => 3,
                    'meta_key' => '_EventStartDate',
                    'orderby' => '_EventStartDate',
                    'order' => 'ASC',
                    'eventDisplay' => 'list',
                    'meta_query' => array(
                        array(
                            'key' => '_tribe_featured',
                            'value' => '1'
                        )
                    )
                );

                $events_query_featured = new WP_Query($args_featured);
                $featured_count = $events_query_featured->post_count;

                // If less than 3 featured events, get the remaining as non-featured
                $remaining_count = 3 - $featured_count;

                $args_non_featured = array(
                    'post_type' => 'tribe_events',
                    'posts_per_page' => $remaining_count,
                    'meta_key' => '_EventStartDate',
                    'orderby' => '_EventStartDate',
                    'order' => 'ASC',
                    'eventDisplay' => 'list',
                    'meta_query' => array(
                        array(
                            'key' => '_tribe_featured',
                            'value' => '0'
                        )
                    )
                );

                $events_query_non_featured = new WP_Query($args_non_featured);

                // Combine both queries
                $all_events = array_merge($events_query_featured->posts, $events_query_non_featured->posts);

                if (!empty($all_events)) {
                    foreach ($all_events as $post) {
                        setup_postdata($post);

                        // Your existing display code here
                        $event_link = get_permalink();
                        echo '<div class="col-md-4 col-xwide-3">';
                        echo '<div class="text-center">';
                        echo '<a href="' . $event_link . '">';

                        $thumbnail = get_the_post_thumbnail(get_the_ID(), 'full', array(
                            'class' => 'event-image img-fluid p-1',
                            'alt' => get_the_title()
                        ));

                        $start_date = get_post_meta(get_the_ID(), '_EventStartDate', true);
                        $end_date = get_post_meta(get_the_ID(), '_EventEndDate', true);

                        echo $thumbnail;
                        echo '</a>';  // Fixed the closing anchor tag
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
                    wp_reset_postdata();
                } else {
                    // No events found
                    echo '<div class="col text-center">';
                    echo '<p class="lead">';
                    echo 'Sorry, there are currently no events.';
                    echo '</p>';
                    echo '</div>';
                }
                ?>
            </div>
        </div>
    </section>
    <?php get_template_part('partials/body/flexible-content'); ?>
</main>
<?php get_footer(); ?>