<?php
$body = get_field('body');
$layouts = $body['layout'];
//echo '<pre>';
//var_dump($body);
//echo '</pre>';
if ($layouts) : ?>
    <?php foreach ($layouts as $layout) : $counter = 0; ?>
        <?php if ($layout['acf_fc_layout'] == 'wide'): ?>
            <?php
            //acf fields data
            $content_area = $layout['content_area'];
            $align = $content_area['buttons_set'];
            $buttons = $content_area['buttons_set']['buttons'];
            $margins = $content_area['margins'];
            ?>
            <section class="<?php echo esc_attr($margins);?>">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="">
                                <?php echo $content_area['content']; ?>
                                <?php if ($buttons):?>
                                    <div class="<?php echo esc_attr($align['alignment'])?>">
                                        <?php foreach ($buttons as $button):?>
                                            <a href="<?php echo $button['link']['url']; ?>"
                                               class="btn <?php echo esc_attr($button['style']);?>">
                                                <?php echo $button['link']['title']; ?>
                                            </a>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div><!-- col -->
                    </div><!-- row -->
                </div><!-- container -->
            </section>
        <?php elseif ($layout['acf_fc_layout'] == 'column'): ?>
            <?php
            //acf fields data
            $content_area = $layout['content_area'];
            $align = $content_area['buttons_set'];
            $buttons = $content_area['buttons_set']['buttons'];
            $image = $layout['column_options']['image'];
            $bg_colour = $layout['column_options']['background_colour'];
            $image_order = $layout['column_options']['image_positions'];
            $bg_position = $layout['column_options']['image_focus_point'];
            $margins = $content_area['margins'];
            ?>
            <section class="column--min-height <?php echo esc_attr($bg_colour);?> background-img-container <?php echo ($image_order == 'order-md-last') ? 'image--right' : ''; ?> section-column-stack <?php echo esc_attr($margins);?>">
                <div class="foreground-img-container"
                     style="background-image: url(<?php echo esc_attr($image['url']); ?>); background-repeat: no-repeat; background-size: cover; background-position: <?php echo esc_attr($bg_position); ?>;"></div>
                <div class="container-md">
                    <div class="row <?php echo ($image_order == 'order-md-last') ? '' : 'justify-content-md-end'; ?> align-items-center">
                        <div class="col-md-6 d-md-none p-0 <?php echo esc_attr($image_order);?>">
                            <img src="<?php echo esc_attr($image['url']); ?>"
                                 alt="<?php echo esc_attr($image['alt']); ?>" class="img-fluid">
                        </div>
                        <div class="col-md-6 column--min-height d-flex align-items-center">
                            <div class="column-content px-md-150">
                                <?php echo $content_area['content']; ?>
                                <?php if ($buttons):?>
                                <div class="<?php echo esc_attr($align['alignment'])?>">
                                    <?php foreach ($buttons as $button):?>
                                        <a href="<?php echo $button['link']['url']; ?>"
                                           class="btn <?php echo esc_attr($button['style']);?>">
                                            <?php echo $button['link']['title']; ?>
                                        </a>
                                    <?php endforeach; ?>
                                </div>
                                <?php endif; ?>
                            </div><!-- column-content -->
                        </div><!-- col -->
                    </div><!-- row -->
                </div><!-- container -->
            </section>
        <?php endif; ?>
        <?php $counter++;
    endforeach;
    wp_reset_postdata();
    ?>
<?php endif; ?>