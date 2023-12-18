<?php 

$game_id = $args['game_id'];

if(!get_field('hide_bl1', $game_id)) { ?>
    <div class="booking-item--main_content">
        <?php if(!empty(get_field('title_bl1', $game_id))) { ?>
            <h1 class="title"><?php the_field('title_bl1', $game_id); ?></h1>
        <?php } ?>
        <?php if(!empty(get_field('subtitle_bl1', $game_id))) { ?>
            <p class="main_text"><?php the_field('subtitle_bl1', $game_id); ?></p>
        <?php } ?>

        <!-- For rework -->
        <?php if(!empty(get_field('mintitle_bl3', $game_id))) { ?>
            <p class="aboutgame_info-title black"><?php the_field('mintitle_bl3', $game_id); ?></p>
        <?php } ?>

        <?php if(!empty(get_field('tegsglobal', $game_id))) { ?>
            <ul class="aboutgame_info-good">
                <?php foreach(get_field('tegsglobal', $game_id) as $key => $value) { ?>
                    <li><?php echo $value; ?></li>
                <?php } ?>
            </ul>
        <?php } ?>
        <!-- For rework -->

        <?php if(!empty(get_field('links_bl1', $game_id))) { ?>
        <div class="main_buttons">
            <?php foreach (get_field('links_bl1', $game_id) as $key => $item) { ?>
                <a href="<?php echo $item['link']['url']; ?>" target="<?php echo $item['link']['target']; ?>" class="link <?php if($key == 1) { echo 'dark'; } ?>"><span><?php echo $item['link']['title']; ?></span></a>
            <?php } ?>
        </div>
        <?php } ?>
    </div>
    <?php 
        $video_height = get_field('video_bl1', $game_id)['height'];
        $video_width = get_field('video_bl1', $game_id)['width'];
        $video_url = get_field('video_bl1', $game_id)['url'];
        $video_size = (100 / $video_width) * $video_height;
        $video_poster = get_field('poster_bl1', $game_id)['sizes']['500-500'];
    ?>
    <div class="booking-item--main_video <?php if ($video_height > $video_width) { echo 'hvideo'; }?>">
        <div class="main_video-poster" style="padding-top: <?php if(!empty(get_field('video_bl1', $game_id))) { echo $video_size; } else { echo '56.25'; } ?>%;">
            <div class="figure1"></div>
            <div class="figure2"></div>
            <div class="figure3"></div>
            <video width="100%" height="100%" preload="none" controls poster="<?php echo $video_poster; ?>">
                <source src="<?php if(!empty(get_field('video_bl1', $game_id))) { echo $video_url; } else { echo get_template_directory_uri() . '/img/hofvideo.mp4'; } ?>" type="video/mp4" />
            </video>
        </div>
    </div>
<?php } ?>

<?php if(!get_field('hide_bl2', $game_id)) { ?>
    <div class="booking-item--gameinfo_area">

        <?php if(!empty(get_field('age_bl2', $game_id))) { ?>
            <div class="gameinfo_item">
                <p class="gameinfo_item-name">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/age_ico.png" alt="For ages">
                    For ages
                </p>
                <p class="gameinfo_item-value"><?php the_field('age_bl2', $game_id); ?></p>
            </div>
        <?php } ?>
        <?php if(!empty(get_field('playersmin_bl2', $game_id))) { ?>
            <div class="gameinfo_item">
                <p class="gameinfo_item-name">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/player_ico.png" alt="Players">
                    Players
                </p>
                <p class="gameinfo_item-value"><?php the_field('playersmin_bl2', $game_id); if(!empty(get_field('playersmax_bl2', $game_id))) { echo ' - '; the_field('playersmax_bl2', $game_id); } ?></p>
            </div>
        <?php } ?>
        <?php if(!empty(get_field('time_bl2', $game_id))) { ?>
            <div class="gameinfo_item">
                <p class="gameinfo_item-name">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/time_ico.png" alt="Game time">
                    Game time
                </p>
                <p class="gameinfo_item-value"><?php the_field('time_bl2', $game_id); ?> min</p>
            </div>
        <?php } ?>
        <?php if(!empty(get_field('style_bl2', $game_id))) { ?>
            <div class="gameinfo_item">
                <p class="gameinfo_item-name">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/style_ico.png" alt="Style">
                    Style
                </p>
                <p class="gameinfo_item-value"><?php the_field('style_bl2', $game_id); ?></p>
            </div>
        <?php } ?>
    </div>
<?php } ?>

<?php if(!get_field('hide_bl3', $game_id)) { ?>
    <div class="booking-item--aboutgame_area scrol">
        <div class="aboutgame_image">
            <?php if(!empty(get_field('title_bl3', $game_id))) { ?>
                <p class="title"><?php the_field('title_bl3', $game_id); ?></p>
            <?php } ?>
            <?php if(!empty(get_field('slider_bl3', $game_id))) { ?>
                <div class="aboutgame_slider">
                    <?php foreach(get_field('slider_bl3', $game_id) as $value) {
                        echo wp_get_attachment_image($value['img']['id'], '660-660');
                    } ?>
                </div>
            <?php } ?>
        </div>
        <div class="aboutgame_info">
            <?php if(!empty(get_field('des_bl3', $game_id))) { ?>
                <p class="aboutgame_info-text">
                    <?php the_field('des_bl3', $game_id); ?>
                </p>
            <?php } ?>
        </div>
        <?php if(!empty(get_field('haslist_bl3', $game_id))) { ?>
            <div class="tagscrol">
                <div class="tagscrol-area">
                    <?php for ($i = 0; $i < 4; $i++){ ?>
                        <?php foreach (get_field('haslist_bl3', $game_id) as $value) { ?>
                            <span>#<?php echo  $value['has']; ?></span>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
    </div>
<?php } ?>