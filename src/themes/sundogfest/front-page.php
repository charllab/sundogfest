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
                $current_date = date('Y-m-d H:i:s');

                $args = array(
                    'post_type' => 'tribe_events',
                    'posts_per_page' => 3,
                    'meta_key' => '_EventStartDate',
                    'orderby' => '_EventStartDate',
                    'order' => 'ASC',
                    'eventDisplay' => 'list',
                    'meta_query' => array(
                        array(
                            'key' => '_EventStartDate',
                            'value' => $current_date,
                            'compare' => '>=',
                            'type' => 'DATETIME'
                        )
                    )
                );

                $events_query = new WP_Query($args);

                if ($events_query->have_posts()) {
                    while ($events_query->have_posts()) {
                        $events_query->the_post();

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
                        echo '</a>';
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
