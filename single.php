<?php 
    if(!empty(get_field('pixel_id'))) {
        get_header('', array( 'pixel' => get_field('pixel_id'))); 
    } else {
        get_header();
    }
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

                            <?php if(!empty(get_field('mintitle_bl1'))) { ?>
                                <p class="aboutgame_info-title black"><?php the_field('mintitle_bl1'); ?></p>
                            <?php } ?>

                            <?php if (have_rows('location-tags-list')): ?>
                                <ul class="aboutgame_info-good">
                                <?php while (have_rows('location-tags-list')): the_row(); 
                                    $tag = get_sub_field('location-tags-tag-name');
                                    $link = get_sub_field('location-tags-tag-link');
                                    ?>
                                    <?php if ($link): ?>
                                        <li class="clickable"><a href="<?=$link['url'] ?>"><?=get_term($tag)->name?></a></li>
                                    <?php else: ?>
                                        <li><p><?=get_term($tag)->name?></p></li>
                                    <?php endif; ?>
                                <?php endwhile; ?>
                                </ul>
                            <?php endif; ?>

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
                                <video width="100%" height="100%" controls autoplay="autoplay" loop="loop" muted defaultMuted playsinline  oncontextmenu="return false;"  preload="auto" poster="<?php echo $video_poster; ?>">
                                    <source src="<?php if(!empty(get_field('video_bl1'))) { echo $video_url; } else { echo get_template_directory_uri() . '/img/hofvideo.mp4'; } ?>" type="video/mp4" />
                                </video>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php } ?>


        <?php if(!get_field('hide_bl2')) { ?>
            <section class="gameinfo info">
                <div class="container">
                    <div class="gameinfo_area inform">
                        <div class="gameinfo_head">
                            <?php if(!empty(get_field('title_bl2'))) { ?>
                                <h2 class="title white"><?php the_field('title_bl2'); ?></h2>
                            <?php } ?>
                        </div>
                        <?php 
                            if(!empty(get_field('info_bl2'))) {
                            foreach(get_field('info_bl2') as $item) {
                        ?>
                            <div class="gameinfo_item">
                                <?php if(!empty($item['title'])) { ?>
                                    <h3 class="gameinfo_item-title"><?php echo $item['title']; ?></h3>
                                <?php } ?>
                                <?php if(!empty($item['text'])) { ?>
                                    <p class="gameinfo_item-text"><?php echo $item['text']; ?></p>
                                <?php } ?>
                                <?php if(!empty($item['link'])) { ?>
                                    <a href="<?php echo $item['link']['url']; ?>" target="<?php echo $item['link']['target']; ?>">
                                        <?php echo $item['link']['title']; ?>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M6 0C2.68629 0 0 2.68629 0 6V16C0 19.3137 2.68629 22 6 22H16C19.3137 22 22 19.3137 22 16V6C22 2.68629 19.3137 0 16 0H6ZM7.00008 14.0555L7.94511 15L13.6513 9.29709V15H15V7H7V8.35261H12.7063L7.00008 14.0555Z" fill="white"/>
                                        </svg>
                                    </a>
                                <?php } ?>
                            </div>
                        <?php }} ?>
                    </div>
                </div>
            </section>
        <?php } ?>

        <?php if(!get_field('hide_bl5')) { ?>
            <section class="galery">
                <div class="container">
                    <?php if(!empty(get_field('slider_bl5'))) { ?>
                        <div class="galery_area">
                            <?php foreach(get_field('slider_bl5') as $item) {
                                echo wp_get_attachment_image($item['img']['id'], '300'); 
                            } ?>
                        </div>
                    <?php } ?>
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
                                        <?php echo wp_get_attachment_image($item['img']['id'], '125-125'); ?>
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

        <?php if(!get_field('hide_bl8')) { ?>
            <section class="gamelist">
                <div class="container">
                    <?php if(!empty(get_field('title_bl8'))) { ?>
                        <h2 class="title"><?php the_field('title_bl8'); ?></h2>
                    <?php } ?>
                    <div class="gamelist_items">
                        <?php 
                            if (!empty(get_field('games_bl8'))) {
                                $games_id = array();
                                foreach (get_field('games_bl8') as $item) {
                                    array_push($games_id, $item['game']);
                                }
                            } else {
                                $games_id = false;
                            }
                            $page_id = get_the_ID();
                            if ($games_id) {
                                $args = array(
                                    'post_type' => 'game',
                                    'post_status' => 'publish',
                                    'posts_per_page' => -1, 
                                    'orderby' => 'title', 
                                    'post__in' => $games_id,
                                    'order' => 'ASC', 
                                );
                                $loop_key = 0;
                                $loop = new WP_Query($args);
                                while ( $loop->have_posts() ) { $loop->the_post(); 
                        ?>
                            <a href="<?php the_permalink(); ?>?locationid=<?php echo $page_id; ?>" class="gamelist_item">
                                <div class="gamelist_item-bg"></div>
                                <?php echo get_the_post_thumbnail(get_the_ID(), '300-300', array( 'class' => 'gamelist_item-img' )); ?>
                                <div class="gamelist_item-top">
                                    <img src="<?php echo get_template_directory_uri(); ?>/img/player_ico.png" alt="Up to <?php the_field('playersmax_bl2'); ?> players">
                                    <p>Up to <?php the_field('playersmax_bl2'); ?></p>
                                </div>
                                <div class="gamelist_item-bottom">
                                    <h2 class="gamelist_item-title"><?php the_field('title_bl1'); ?></h2>
                                    <p   class="gamelist_item-text"><?php echo substr(get_field('subtitle_bl1'), 0, 80);  ?></p>
                                </div>
                            </a>
                        <?php $loop_key++; } wp_reset_postdata(); } ?>
                    </div>
                </div>
            </section>
        <?php } ?>

        <?php if(!get_field('hide_bl6')) { ?>
            <section class="reviews">
                <div class="container">
                    <div class="center">
                        <?php if(!empty(get_field('title_bl6'))) { ?>
                            <h2 class="title"><?php the_field('title_bl6'); ?></h2>
                        <?php } ?>
                    </div>
                    <div class="reviews_area">
                        <?php if(!empty(get_field('reviews_bl6'))) { ?>
                            <div class="reviews_slider">
                                <?php foreach(get_field('reviews_bl6') as $item) { ?>
                                    <div>
                                        <div class="reviews_item">
                                            <div class="reviews_item-image ofc">
                                                <?php echo wp_get_attachment_image($item['img']['id'], '250-250'); ?>
                                            </div>
                                            <div class="reviews_item-content">
                                                <div class="reviews_item-body">
                                                    <?php if (get_field('tripadvisor_bl6')) { ?>
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

        <?php if(!get_field('hide_bl4')) { ?>
            <section class="plugin" id="bookblock">
                <div class="container">
                    <?php the_field('bookingscript'); ?>
                </div>
            </section>
        <?php } ?>

        <?php if(!get_field('hide_bl9')) { ?>
            <section class="contacts">
                <div class="container">
                    <?php if(!empty(get_field('title_bl9'))) { ?>
                        <h2 class="title"><?php the_field('title_bl9'); ?></h2>
                    <?php } ?>
                    <div class="contacts_area">
                        <div class="contacts_col contacts_col-map">
                            <?php the_field('map_bl9'); ?>
                        </div>
                        <div class="contacts_col contacts_col-info">
                            <?php if(!empty(get_field('contactinfo_bl9'))) { ?>
                                <?php foreach(get_field('contactinfo_bl9') as $item) { ?>
                                    <div class="contacts_info">
                                        <p class="contacts_info-title"><?php echo $item['name']; ?></p>
                                        <?php foreach($item['kons'] as $value) { ?>
                                            <p class="contacts_info-link"><?php echo $value['kon']; ?></p>
                                        <?php } ?>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                            <?php if(!empty(get_field('socialo_bl9'))) { ?>
                                <ul class="contacts_social">
                                    <?php foreach(get_field('socialo_bl9') as $item) { ?>
                                        <li>
                                            <a href="<?php echo $item['link']; ?>" target="_blank">
                                                <?php print_svg($item['ico']); ?>
                                            </a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php } ?>

        <?php if(!get_field('hide_bl7')) { ?>
            <section class="vrinfo" style="background-image: url('<?php the_field('bg_bl7'); ?>');">
                <div class="container">
                    <?php if(!empty(get_field('title_bl7'))) { ?>
                        <h2 class="vrinfo_title"><?php the_field('title_bl7'); ?></h2>
                    <?php } ?>

                    <?php if(!empty(get_field('subtitle_bl7'))) { ?>
                        <p class="vrinfo_text"><?php the_field('subtitle_bl7'); ?></p>
                    <?php } ?>
                    <?php if(!empty(get_field('link_bl7'))) { ?>
                        <a href="<?php echo get_field('link_bl7')['url']; ?>" target="<?php echo get_field('link_bl7')['target']; ?>" class="link white"><span><?php echo get_field('link_bl7')['title']; ?></span></a>
                    <?php } ?>
                </div>
            </section>
        <?php } ?>
    <?php endwhile; ?>     
<?php get_footer(); ?>