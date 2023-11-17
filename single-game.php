<?php 
    $locationid = $_GET['locationid']; 
    if (!empty(get_field('games_bl8', $locationid))) {
        foreach (get_field('games_bl8', $locationid) as $item) {
            if($item['game'] == get_the_ID()) {
                get_header('', array( 'pixel' => $item['pixel'])); 
            }
        }
    } else {
        get_header();
    }
?> 
    <?php if(!get_field('hide_bl1')) { ?>
        <section class="main">
            <div class="container">
                <div class="row">
                    <div class="main_content">
                        <!-- <ul class="main_breadcrumbs">
                            <li>
                                <a href="#">Home</a>
                                <svg xmlns="http://www.w3.org/2000/svg" width="6" height="9" viewBox="0 0 6 9" fill="none">
                                    <path d="M0.823476 0.27L5.18848 4.635L0.823475 9L-0.0001096 8.16612L3.53101 4.635L-0.000108982 1.10388L0.823476 0.27Z" fill="#1C1C3B"/>
                                </svg>
                            </li>
                            <li>
                                <a href="#">Games & Experiences</a>
                                <svg xmlns="http://www.w3.org/2000/svg" width="6" height="9" viewBox="0 0 6 9" fill="none">
                                    <path d="M0.823476 0.27L5.18848 4.635L0.823475 9L-0.0001096 8.16612L3.53101 4.635L-0.000108982 1.10388L0.823476 0.27Z" fill="#1C1C3B"/>
                                </svg>
                            </li>
                            <li>
                                <span>House of Fear: Cursed Souls</span>
                            </li>
                        </ul> -->
                        <?php if(!empty(get_field('title_bl1'))) { ?>
                            <h1 class="title"><?php the_field('title_bl1'); ?></h1>
                        <?php } ?>
                        <?php if(!empty(get_field('subtitle_bl1'))) { ?>
                            <p class="main_text"><?php the_field('subtitle_bl1'); ?></p>
                        <?php } ?>

                        <!-- For rework -->
                        <?php if(!empty(get_field('mintitle_bl3'))) { ?>
                            <p class="aboutgame_info-title black"><?php the_field('mintitle_bl3'); ?></p>
                        <?php } ?>

                        <?php if(!empty(get_field('tegsglobal'))) { ?>
                            <ul class="aboutgame_info-good">
                                <?php foreach(get_field('tegsglobal') as $key => $value) { ?>
                                    <li><?php echo $value; ?></li>
                                <?php } ?>
                            </ul>
                        <?php } ?>
                        <!-- For rework -->

                        <?php if(!empty(get_field('links_bl1'))) { ?>
                        <div class="main_buttons">
                            <?php foreach (get_field('links_bl1') as $key => $item) { ?>
                                <a href="<?php echo $item['link']['url']; ?>" target="<?php echo $item['link']['target']; ?>" class="link <?php if($key == 1) { echo 'dark'; } ?>"><span><?php echo $item['link']['title']; ?></span></a>
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
        <section class="gameinfo">
            <div class="container">
                <div class="gameinfo_area">
    
                    <?php if(!empty(get_field('age_bl2'))) { ?>
                        <div class="gameinfo_item">
                            <p class="gameinfo_item-name">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/age_ico.png" alt="For ages">
                                For ages
                            </p>
                            <p class="gameinfo_item-value"><?php the_field('age_bl2'); ?></p>
                        </div>
                    <?php } ?>
                    <?php if(!empty(get_field('playersmin_bl2'))) { ?>
                        <div class="gameinfo_item">
                            <p class="gameinfo_item-name">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/player_ico.png" alt="Players">
                                Players
                            </p>
                            <p class="gameinfo_item-value"><?php the_field('playersmin_bl2'); if(!empty(get_field('playersmax_bl2'))) { echo ' - '; the_field('playersmax_bl2'); } ?></p>
                        </div>
                    <?php } ?>
                    <?php if(!empty(get_field('time_bl2'))) { ?>
                        <div class="gameinfo_item">
                            <p class="gameinfo_item-name">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/time_ico.png" alt="Game time">
                                Game time
                            </p>
                            <p class="gameinfo_item-value"><?php the_field('time_bl2'); ?> min</p>
                        </div>
                    <?php } ?>
                    <?php if(!empty(get_field('style_bl2'))) { ?>
                        <div class="gameinfo_item">
                            <p class="gameinfo_item-name">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/style_ico.png" alt="Style">
                                Style
                            </p>
                            <p class="gameinfo_item-value"><?php the_field('style_bl2'); ?></p>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>
    <?php } ?>

    <?php if(!get_field('hide_bl3')) { ?>
        <section class="aboutgame" id="aboutgame">
            <div class="container">
                <div class="aboutgame_area scrol">
                    <div class="aboutgame_image">
                        <?php if(!empty(get_field('title_bl3'))) { ?>
                            <p class="title show-lt"><?php the_field('title_bl3'); ?></p>
                        <?php } ?>
                        <?php if(!empty(get_field('slider_bl3'))) { ?>
                            <div class="aboutgame_slider">
                                <?php foreach(get_field('slider_bl3') as $value) {
                                    echo wp_get_attachment_image($value['img']['id'], '660-660');
                                } ?>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="aboutgame_info">
                        <?php if(!empty(get_field('title_bl3'))) { ?>
                            <h2 class="title hide-lt">
                                <?php the_field('title_bl3'); ?>
                                <div class="figure2"></div>
                            </h2>
                        <?php } ?>

                        <?php if(!empty(get_field('des_bl3'))) { ?>
                            <p class="aboutgame_info-text">
                                <?php the_field('des_bl3'); ?>
                            </p>
                        <?php } ?>

                        <!-- <?php if(!empty(get_field('mintitle_bl3'))) { ?>
                            <p class="aboutgame_info-title"><?php the_field('mintitle_bl3'); ?></p>
                        <?php } ?>

                        <?php if(!empty(get_field('tegs_bl3'))) { ?>
                            <ul class="aboutgame_info-good">
                                <?php foreach(get_field('tegs_bl3') as $key => $value) { ?>
                                    <li><?php echo $value['teg']; ?></li>
                                <?php } ?>
                            </ul>
                        <?php } ?> -->
                        <a href="#" class="link dark"><span>Book now</span></a>
                    </div>
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

    <?php
        if (!empty(get_field('games_bl8', $locationid))) {
            echo '<section class="plugin" id="bookblock"><div class="container">';
            foreach (get_field('games_bl8', $locationid) as $item) {
                if($item['game'] == get_the_ID()) {
                    echo $item['bookingscript'];
                }
            }
            echo '</div></section>';
        }
    ?>

    <?php if(!get_field('hide_bl4')) { ?>
        <section class="reviews">
            <div class="container">
                <div class="center">
                    <?php if(!empty(get_field('title_bl4'))) { ?>
                        <h2 class="title"><?php the_field('title_bl4'); ?></h2>
                    <?php } ?>
                </div>
                <div class="reviews_area">
                    <?php if(!empty(get_field('reviews_bl4'))) { ?>
                        <div class="reviews_slider">
                            <?php foreach(get_field('reviews_bl4') as $item) { ?>
                                <div>
                                    <div class="reviews_item">
                                        <div class="reviews_item-image ofc">
                                            <?php echo wp_get_attachment_image($item['img']['id'], '250-250'); ?>
                                        </div>
                                        <div class="reviews_item-content">
                                            <div class="reviews_item-body">
                                                <?php if (get_field('tripadvisor_bl4')) { ?>
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

    <?php if(!get_field('hide_bl5')) { ?>
        <section class="vrinfo" style="background-image: url('<?php the_field('bg_bl5'); ?>');">
            <div class="container">
                <?php if(!empty(get_field('title_bl5'))) { ?>
                    <h2 class="vrinfo_title"><?php the_field('title_bl5'); ?></h2>
                <?php } ?>

                <?php if(!empty(get_field('subtitle_bl5'))) { ?>
                    <p class="vrinfo_text"><?php the_field('subtitle_bl5'); ?></p>
                <?php } ?>
                <?php if(!empty(get_field('link_bl5'))) { ?>
                    <a href="<?php echo get_field('link_bl5')['url']; ?>" target="<?php echo get_field('link_bl5')['target']; ?>" class="link white"><span><?php echo get_field('link_bl5')['title']; ?></span></a>
                <?php } ?>
            </div>
        </section>
    <?php } ?>
<?php get_footer(); ?>