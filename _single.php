<?php
/**
 * The template for displaying all single posts
 */

get_header();
?>

<div class="main-container">
    <?php get_sidebar('left-1'); ?>

    <main id="primary" class="site-main">
        <?php
        while ( have_posts() ) :
            the_post();
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                    
                    <div class="post-meta">
                        <span class="posted-on"><?php echo get_the_date(); ?></span>
                        <span class="byline"> <?php the_author(); ?></span>
                        <?php if ( has_category() ) : ?>
                            <span class="cat-links"> | <?php the_category( ', ' ); ?></span>
                        <?php endif; ?>
                    </div>
                </header>

                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="post-thumbnail">
                        <?php the_post_thumbnail( 'large' ); ?>
                    </div>
                <?php endif; ?>

                <div class="post-content">
                    <?php
                    the_content();

                    wp_link_pages( array(
                        'before' => '<div class="page-links">' . esc_html__( 'Pages:', '46ba' ),
                        'after'  => '</div>',
                    ) );
                    ?>
                </div>

                <footer class="entry-footer">
                    <?php
                    if ( has_tag() ) :
                        echo '<span class="tags-links">' . esc_html__( 'Tags: ', '46ba' ) . get_the_tag_list( '', ', ' ) . '</span>';
                    endif;
                    ?>
                </footer>
            </article>

            <?php
            // Post navigation
            the_post_navigation( array(
                'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', '46ba' ) . '</span> <span class="nav-title">%title</span>',
                'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', '46ba' ) . '</span> <span class="nav-title">%title</span>',
            ) );

            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;

        endwhile; // End of the loop.
        ?>
    </main>

    <?php get_sidebar('right-1'); ?>
    <?php get_sidebar('right-2'); ?>
</div>

<?php
get_footer();
