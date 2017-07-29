<?php

/**
 * Sparkling Top Posts Widget
 * Sparkling Theme
 */
class sparkling_popular_posts extends WP_Widget {

    function __construct() {

        $widget_ops = array('classname' => 'sparkling-popular-posts', 'description' => esc_html__("Sparkling Popular Posts Widget", 'sparkling'));
        parent::__construct('sparkling_popular_posts', esc_html__('Sparkling Popular Posts Widget', 'sparkling'), $widget_ops);
    }

    function widget($args, $instance) {
        extract($args);
        $title = isset($instance['title']) ? $instance['title'] : esc_html__('Popular Posts', 'sparkling');
        $limit = isset($instance['limit']) ? $instance['limit'] : 5;

        echo $before_widget;
        echo $before_title;
        echo $title;
        echo $after_title;

        /**
         * Widget Content
         */
        ?>

        <!-- popular posts -->
        <div class="popular-posts-wrapper">

            <?php
            query_posts(array(
                'meta_key' => 'post_views_count',
                'posts_per_page' => $limit,
                'orderby' => 'meta_value_num',
                'order' => 'DESC',
            ));
            if (have_posts()) : while (have_posts()) : the_post();
                    ?>


                    <?php if (get_the_content() != '') : ?>

                        <!-- post -->
                        <div class="post">

                            <!-- image -->
                            <div class="post-image <?php echo get_post_format(); ?>">

                                <a href="<?php echo get_permalink(); ?>"><?php
                        if (get_post_format() != 'quote') {
                            echo get_the_post_thumbnail(get_the_ID(), 'tab-small');
                        }
                        ?></a>

                            </div> <!-- end post image -->

                            <!-- content -->
                            <div class="post-content">

                                <a href="<?php echo get_permalink(); ?>"><?php echo trim(substr(get_the_title(), 0, 40)); ?></a>
                               
                                <div class="posts_style">
                                    <span class="posts-categorie">  <?php echo the_category(); ?> </span>
                                    <span class="posts-date"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo get_the_date('d M , Y'); ?> </span>
                                </div>


                            </div><!-- end content -->
                        </div><!-- end post -->

                    <?php endif; ?>

                    <?php
                endwhile;
            endif;
            wp_reset_query();
            ?>




        </div> <!-- end posts wrapper -->

        <?php
        echo $after_widget;
    }

    function form($instance) {

        if (!isset($instance['title']))
            $instance['title'] = esc_html__('Popular Posts', 'sparkling');
        if (!isset($instance['limit']))
            $instance['limit'] = 5;
        ?>

        <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e('Title', 'sparkling') ?></label>

            <input  type="text" value="<?php echo esc_attr($instance['title']); ?>"
                    name="<?php echo $this->get_field_name('title'); ?>"
                    id="<?php $this->get_field_id('title'); ?>"
                    class="widefat" />
        </p>

        <p><label for="<?php echo $this->get_field_id('limit'); ?>"><?php esc_html_e('Limit Posts Number', 'sparkling') ?></label>

            <input  type="text" value="<?php echo esc_attr($instance['limit']); ?>"
                    name="<?php echo $this->get_field_name('limit'); ?>"
                    id="<?php $this->get_field_id('limit'); ?>"
                    class="widefat" />
        <p>

            <?php
        }

    }
    ?>