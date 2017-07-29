<?php
/**
 * @package sparkling
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="blog-item-wrap">
        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
            <?php the_post_thumbnail('sparkling-featured', array('class' => 'single-featured')); ?>
        </a>
        <div class="post-inner-content">
            <header class="entry-header page-header">
                <?php the_tags('');?>
                <h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

                <?php if ('post' == get_post_type()) : ?>
                    <div class="entry-meta">
                        <i class="fa fa-clock-o" aria-hidden="true"></i> <?php the_time('t F,  Y'); ?> 
                        <i class="fa fa-user right" aria-hidden="true"></i> <?php the_author(); ?>  
                        <i class="fa fa-comment-o right" aria-hidden="true"></i> <?php comments_popup_link('one comment', 'more comment', '% comment'); ?>
                        <i class="fa fa-line-chart right" aria-hidden="true"> View: <?php echo getPostViews(get_the_ID()); ?></i>
                        <i class="fa pull-right"  aria-hidden="true"><div class="addthis_inline_share_toolbox_pa26"></div></i>
                        <i class="fa fa-heart pull-right" aria-hidden="true" style="color:red;">11</i>
                        
                    </div><!-- .entry-meta -->
                <?php endif; ?>
            </header><!-- .entry-header -->

            <?php if (is_search()) : // Only display Excerpts for Search ?>
                <div class="entry-summary">
                    <?php the_excerpt(); ?>
                    <p><a class="btn btn-default read-more" href="<?php the_permalink(); ?>"><?php esc_html_e('Read More', 'sparkling'); ?></a></p>
                </div><!-- .entry-summary -->
            <?php else : ?>
                <div class="entry-content">

                    <p><?php read_more(40); ?><a href="<?php the_permalink(); ?>"><br><button class="read_more">Read More</button></a></p>

                    <?php
                    wp_link_pages(array(
                        'before' => '<div class="page-links">' . esc_html__('Pages:', 'sparkling'),
                        'after' => '</div>',
                        'link_before' => '<span>',
                        'link_after' => '</span>',
                        'pagelink' => '%',
                        'echo' => 1
                    ));
                    ?>
                </div><!-- .entry-content -->
            <?php endif; ?>
        </div>
    </div>
</article><!-- #post-## -->
