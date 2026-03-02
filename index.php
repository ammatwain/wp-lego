<?php
get_header();
?>

<div class="main-container">
    <?php get_sidebar('left-1'); ?>

    <main id="primary" class="site-main">
        <?php
        if ( have_posts() ) :
            ?>
            <div class="post-flow">
            <?php
            while ( have_posts() ) :
                the_post();
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
                            <span class="edit-link"> </span>
                            <span class="posted-on"><?php echo get_the_date(); ?></span>
                            <span class="byline"> <?php the_author(); ?></span>
                    </header>

                    <div class="post-content">
                        <?php the_excerpt(); ?>
                    </div>
                </article>
                <?php
            endwhile;

            the_posts_navigation();
            ?>
            </div>
            <?php
        else :
            ?>
            <section class="no-results not-found">
                <header class="page-header">
                    <h1 class="page-title"><?php esc_html_e( 'Nothing Found', '46ba' ); ?></h1>
                </header>
                <div class="page-content">
                    <p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', '46ba' ); ?></p>
                    <?php get_search_form(); ?>
                </div>
            </section>
            <?php
        endif;
        ?>
    </main>

    <?php get_sidebar('right-1'); ?>
    <?php get_sidebar('right-2'); ?>
</div>

<?php
get_footer();
