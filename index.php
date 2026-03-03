<?php
get_header();
?>

<div class="main-container">
    <?php
        if(is_active_sidebar('sidebar-left-1')) {
            echo '<div class="sidebar sidebar-left-1">';
            dynamic_sidebar('sidebar-left-1');
            echo '</div>';
        }
    ?>

    <main id="primary" class="site-main">
        <?php
        if ( have_posts() ) :
            ?>
            <div class="post-flow">
            <?php
            while ( have_posts() ) :
                the_post();
                ?>
                <a id="post-<?php the_ID(); ?>" <?php post_class(); ?> href="<?php the_permalink(); ?>" rel="bookmark">
                    <header class="entry-header">
                        <?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
                    </header>
                    <div class="posted-on"><?= get_the_date(); ?> <?= get_the_time(); ?></div>
                    <div class="post-content">
                        <?php the_excerpt(); ?>
                    </div>
                </a>
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
<?php 
    if(is_active_sidebar('sidebar-right-1')) {
        echo '<div class="sidebar sidebar-right-1">';
        dynamic_sidebar('sidebar-right-1');
        echo '</div>';
    }
    if(is_active_sidebar('sidebar-right-2')) {
        echo '<div class="sidebar sidebar-right-2">';
        dynamic_sidebar('sidebar-right-2');
        echo '</div>';
    }
?>
</div>

<?php
get_footer();
