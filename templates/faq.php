<?php
/*
Template Name: Часті питання
*/
get_header(); 
?>
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
        <?php if(!get_field('hide_bl5')) { ?>
            <section class="questions ">
                <div class="container">
                    <div class="questions_area row faqpage">
                        <div class="questions_info">
                            <?php if(!empty(get_field('title_bl5'))) { ?>
                                <h2 class="title">
                                    <?php the_field('title_bl5'); ?>
                                    <div class="figure3"></div>
                                </h2>
                            <?php } ?>
                        </div>
                        <div class="questions_content">
                            <?php 
                                if(!empty(get_field('link_bl5'))) {
                                foreach (get_field('link_bl5') as $item) {
                            ?>
                                <div class="questions_item">
                                    <div class="questions_title">
                                        <p><?php echo $item['qw']; ?></p>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="52" height="52" viewBox="0 0 52 52" fill="none">
                                            <circle cx="26" cy="25.9999" r="26" fill="white"/>
                                            <path d="M35 28.1528H28.3294V34.9999H23.6706V28.1528H17V23.847H23.6706V16.9999H28.3294V23.847H35V28.1528Z" fill="#1C1C3B"/>
                                        </svg>
                                    </div>
                                    <div class="questions_body">
                                        <p><?php echo $item['an']; ?></p>
                                    </div>
                                </div>
                            <?php }} ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php } ?>

        <?php if(!get_field('hide_bl6')) { ?>
            <section class="vrinfo" style="background-image: url('<?php the_field('bg_bl6'); ?>');">
                <div class="container">
                    <?php if(!empty(get_field('title_bl6'))) { ?>
                        <h2 class="vrinfo_title"><?php the_field('title_bl6'); ?></h2>
                    <?php } ?>

                    <?php if(!empty(get_field('subtitle_bl6'))) { ?>
                        <p class="vrinfo_text"><?php the_field('subtitle_bl6'); ?></p>
                    <?php } ?>
                    <?php if(!empty(get_field('link_bl6'))) { ?>
                        <a href="<?php echo get_field('link_bl6')['url']; ?>" target="<?php echo get_field('link_bl6')['target']; ?>" class="link white"><span><?php echo get_field('link_bl6')['title']; ?></span></a>
                    <?php } ?>
                </div>
            </section>
        <?php } ?>

    <?php endwhile; ?>     
<?php get_footer(); ?>