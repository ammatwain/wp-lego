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
            <?php
            if (!is_single()) {
            ?>
            <div class="post-flow">
            <?php
            } else {
            ?>
            <div class="post-single">
            <?php
            }
            ?>
            <?php
            while ( have_posts() ) :
                the_post();
                ?>
                <?php
                if (!is_single()) {
                ?>
                    <a id="post-<?php the_ID(); ?>" <?php post_class("lego"); ?> href="<?php the_permalink(); ?>" rel="bookmark">
                <?php
                } else {
                ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> href="<?php the_permalink(); ?>" rel="bookmark">
                <?php
                }
                ?>
                    <header class="entry-header">
                        <?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
                    </header>
                    <div class="posted-on"><?= get_the_date(); ?> <?= get_the_time(); ?></div>
                    <div class="post-content">
                        <?php
                        if (!is_single()) {
                        the_excerpt();
                        } else {
                        the_content();
                        }
                        ?>
                    </div>
               <?php
                if (!is_single()) {
                ?>
                    </a>
                <?php
                } else {
                ?>
                    </article>
                <?php
                }
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
    <footer id="colophon" style='width:100%; display:block'>
        <table border ="0" style='width:100%; height:100%'><tr>
        <td><?= get_next_posts_link('<<<<<<<<') ?></td>
        <td width='100%'>&nbsp;</td>
        <td><?= get_previous_posts_link('>>>>>>>>') ?></td>
        </tr></table>
    </footer>
    </div> <!-- .content-area -->
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
</div> <!-- .main-container -->

<?php
get_footer();
