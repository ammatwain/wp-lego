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
    <div class="content-area">
    <header id="master-head" class="site-header">
        <span class="motto"><?php bloginfo('description'); ?></span>
    </header>
    <main id="primary" class="site-main">
        <?php
        if (is_search()) {
            query_posts($query_string);
        } else {
            query_posts($query_string . '&cat=76');
        }
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
    <footer id="colophon">
        <div class="site-info">
            <a href="<?php echo esc_url(__('https://wordpress.org/', '46ba')); ?>">
                <?php
    /* translators: %s: CMS name, i.e. WordPress. */
    printf(esc_html__('Proudly powered by %s', 'WP-Lego'), 'WordPress');
    ?>
            </a>
            <span class="sep"> | </span>
            <?php
    /* translators: 1: Theme name, 2: Theme author. */
    printf(esc_html__('Theme: %1$s by %2$s.', 'WP-Lego'), 'WP-Lego', '46BA - CIS');
    ?>
        </div>
    </footer>
    </div>
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
