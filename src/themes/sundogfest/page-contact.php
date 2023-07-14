<?php
/**
 *
 * Template Name: Contact Us
 *
 **/
get_header(); ?>

    <main>
        <section>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col">
                        <div class="text-center">
                            <h1>Contact Us & Get Involved </h1>
                        </div>
                    </div><!-- col -->
                </div><!-- row -->
            </div><!-- container -->
        </section>
        <section>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-5">
                        <div class="pe-md-3 pe-lg-5 contact__content">
                            <img src="https://unsplash.it/1200/600" alt="" class="img-fluid">
                            <p>The Arts Council of the North Okanagan is located at the Vernon Community Arts Centre, in
                                the heart of Polson Park</p>
                            <p><b>Address</b><br>
                                2704a Highway 6, Vernon, BC  V1T 5G5</p>
                            <p><b>Phone Number</b><br>
                                250-542-6243</p>
                            <p><b>Website</b><br>
                                www.acno.ca</p>
                        </div>
                    </div><!-- col -->
                    <div class="col-md-6 col-lg-6">
                        <div>
                            <?php echo do_shortcode('[gravityform id="1" title="false" description="false" ajax="true"]')?>
                        </div>
                    </div><!-- col -->
                </div><!-- row -->
            </div><!-- container -->
        </section>
    </main>

<?php get_footer();