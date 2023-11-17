<?php
/*
Template Name: Головна сторінка
*/
get_header(); 
?>
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

        <?php if(!get_field('hide_bl1')) { ?>
            <section class="main">
                <div class="container">
                    <div class="row">
                        <div class="main_content">
                            <?php if(!empty(get_field('title_bl1'))) { ?>
                                <h1 class="title"><?php the_field('title_bl1'); ?></h1>
                            <?php } ?>
                            <?php if(!empty(get_field('subtitle_bl1'))) { ?>
                                <p class="main_text"><?php the_field('subtitle_bl1'); ?></p>
                            <?php } ?>
                            <?php if(!empty(get_field('links_bl1'))) { ?>
                                <div class="main_buttons">
                                    <?php foreach (get_field('links_bl1') as $key => $item) { ?>
                                        <a href="<?php echo $item['link']['url']; ?>" target="<?php echo $item['link']['target']; ?>" class="link <?php if($key == 1) { echo 'dark'; } ?>"><span><?php echo $item['link']['title']; ?></span></a>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                            <?php if(!empty(get_field('games_bl1'))) { ?>
                                <div class="main_info">
                                    <?php foreach(get_field('games_bl1') as $item) { ?>
                                        <div class="main_info-item">
                                            <p class="main_info-number"><?php echo $item['value']; ?></p>
                                            <p class="main_info-text"><?php echo $item['text']; ?></p>
                                        </div>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                        </div>
                        <?php 
                            $video_height = get_field('video_bl1')['height'];
                            $video_width = get_field('video_bl1')['width'];
                            $video_url = get_field('video_bl1')['url'];
                            $video_size = (100 / $video_width) * $video_height;
                            $video_poster = get_field('poster_bl1')['sizes']['500-500'];
                        ?>
                        <div class="main_video <?php if ($video_height > $video_width) { echo 'hvideo'; }?>">
                            <div class="main_video-poster" style="padding-top: <?php if(!empty(get_field('video_bl1'))) { echo $video_size; } else { echo '56.25'; } ?>%;">
                                <div class="figure1"></div>
                                <div class="figure2"></div>
                                <div class="figure3"></div>
                                <video width="100%" height="100%" preload="none" controls poster="<?php echo $video_poster; ?>">
                                    <source src="<?php if(!empty(get_field('video_bl1'))) { echo $video_url; } else { echo get_template_directory_uri() . '/img/hofvideo.mp4'; } ?>" type="video/mp4" />
                                </video>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php } ?>

        <?php if(!get_field('hide_bl2')) { ?>
            <section class="reviews">
                <div class="container">
                    <div class="center">
                        <?php if(!empty(get_field('title_bl2'))) { ?>
                            <h2 class="title"><?php the_field('title_bl2'); ?></h2>
                        <?php } ?>
                    </div>
                    <div class="reviews_area">
                        <?php if(!empty(get_field('reviews_bl2'))) { ?>
                            <div class="reviews_slider">
                                <?php foreach(get_field('reviews_bl2') as $item) { ?>
                                    <div>
                                        <div class="reviews_item">
                                            <div class="reviews_item-image ofc">
                                                <?php echo wp_get_attachment_image($item['img']['id'], '250-250'); ?>
                                            </div>
                                            <div class="reviews_item-content">
                                                <div class="reviews_item-body">
                                                    <?php if (get_field('tripadvisor_bl2')) { ?>
                                                        <img class="reviews_item-trip" src="<?php echo get_template_directory_uri(); ?>/img/tripadvisor.png" alt="Tripadvisor">
                                                    <?php } ?>
                                                    <ul class="reviews_item-stars">
                                                        <?php for ($i = 0; $i < $item['stars']; $i++) { 
                                                            echo '<li></li>';
                                                        } ?>
                                                    </ul>
                                                    <?php if(!empty($item['text'])) { ?>
                                                        <p class="reviews_item-text">"<?php echo $item['text']; ?></p>
                                                    <?php } ?>
                                                </div>
                                                <div class="reviews_item-minimage ofc">
                                                    <?php echo wp_get_attachment_image($item['img']['id'], '50-50'); ?>
                                                </div>
                                                <div class="reviews_item-info">
                                                    <?php if(!empty($item['name'])) { ?>
                                                        <p><?php echo $item['name']; ?></p>
                                                    <?php } ?>
                                                    <?php if(!empty($item['info'])) { ?>
                                                        <span><?php echo $item['info']; ?></span>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </section>
        <?php } ?>

        <?php if(!get_field('hide_bl3')) { ?>
            <section class="forall">
                <div class="container">
                    <div class="forall_area">
                        <div class="figure1"></div>
                        <div class="figure2"></div>
                        <?php if(!empty(get_field('title_bl3'))) { ?>
                            <h2 class="title"><?php the_field('title_bl3'); ?></h2>
                        <?php } ?>
                        <?php if(!empty(get_field('list_bl3'))) { ?>
                            <div class="forall_list">
                                <?php foreach(get_field('list_bl3') as $item) { ?>
                                    <div class="forall_item">
                                        <?php echo wp_get_attachment_image($item['img']['id'], '125-125', '', ["class" => "forall_item-image"]); ?>
                                        <div class="forall_item-info">
                                            <?php if(!empty($item['title'])) { ?>
                                                <h3 class="forall_item-title"><?php echo $item['title']; ?></h3>
                                            <?php } ?>
                                            <?php if(!empty($item['text'])) { ?>
                                                <p class="forall_item-text"><?php echo $item['text']; ?></p>
                                            <?php } ?>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        <?php } ?>
                        <?php if(!empty(get_field('haslist_bl3'))) { ?>
                            <div class="tagscrol">
                                <div class="tagscrol-area">
                                    <?php for ($i = 0; $i < 4; $i++){ ?>
                                        <?php foreach (get_field('haslist_bl3') as $value) { ?>
                                            <span>#<?php echo  $value['has']; ?></span>
                                        <?php } ?>
                                    <?php } ?>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </section>
        <?php } ?>

        <?php if(!get_field('hide_bl4')) { ?>
            <section class="aboutgame">
                <div class="container">
                    <div class="aboutgame_area">
                        <div class="aboutgame_info">
                            <?php if(!empty(get_field('title_bl4'))) { ?>
                                <h2 class="title white hide-lt">
                                    <?php the_field('title_bl4'); ?>
                                    <div class="figure1"></div>
                                </h2>
                            <?php } ?>
                            <?php if(!empty(get_field('des_bl4'))) { ?>
                                <p class="aboutgame_info-text"><?php the_field('des_bl4'); ?></p>
                            <?php } ?>
                            <?php if(!empty(get_field('mintitle_bl4'))) { ?>
                                <p class="aboutgame_info-title"><?php the_field('mintitle_bl4'); ?></p>
                            <?php } ?>
                            <?php if(!empty(get_field('tegs_bl4'))) { ?>
                                <ul class="aboutgame_info-good">
                                    <?php foreach(get_field('tegs_bl4') as $item) { ?>
                                        <li><?php echo $item['teg']; ?></li>
                                    <?php } ?>
                                </ul>
                            <?php } ?>
                            <?php if(!empty(get_field('link_bl4'))) { ?>
                                <a href="<?php echo get_field('link_bl4')['url']; ?>" target="<?php echo get_field('link_bl4')['target']; ?>" class="link green"><span><?php echo get_field('link_bl4')['title']; ?></span></a>
                            <?php } ?>
                        </div>
                        <div class="aboutgame_image">
                            <?php if(!empty(get_field('title_bl4'))) { ?>
                                <p class="title white show-lt"><?php the_field('title_bl4'); ?></p>
                            <?php } ?>
                            <?php if(!empty(get_field('slider_bl4'))) { ?>
                                <div class="aboutgame_slider">
                                    <?php foreach(get_field('slider_bl4') as $item) {
                                        echo wp_get_attachment_image($item['img']['id'], '660-660');
                                    } ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php } ?>

        <?php if(!get_field('hide_bl5')) { ?>
            <section class="questions">
                <div class="container">
                    <div class="questions_area row">
                        <div class="questions_info">
                            <?php if(!empty(get_field('title_bl5'))) { ?>
                                <h2 class="title hide-lt">
                                    <?php the_field('title_bl5'); ?>
                                    <div class="figure1"></div>
                                    <div class="figure2"></div>
                                </h2>
                            <?php } ?>
                            <div class="questions_info-content">
                                <?php if(!empty(get_field('avatar_bl5'))) {
                                    echo wp_get_attachment_image(get_field('avatar_bl5')['id'], '125-125', '', ["class" => "questions_info-avatar"]); 
                                } ?>
                                <?php if(!empty(get_field('text_bl5'))) { ?>
                                    <p class="questions_info-text"><?php the_field('text_bl5'); ?></p>
                                <?php } ?>

                                <?php if(!empty(get_field('links_bl5'))) { ?>
                                    <div class="questions_info-bottoms">
                                        <?php foreach (get_field('links_bl5') as $key => $item) { ?>
                                            <a href="<?php echo $item['link']['url']; ?>" target="<?php echo $item['link']['target']; ?>" class="link <?php if($key == 0) { echo 'dark'; } else { echo 'white'; } ?>"><span><?php echo $item['link']['title']; ?></span></a>
                                        <?php } ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="questions_content">
                            <?php if(!empty(get_field('title_bl5'))) { ?>
                                <p class="title show-lt"><?php the_field('title_bl5'); ?></p>
                            <?php } ?>
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