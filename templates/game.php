<?php
/*
Template Name: Всі ігри
*/
get_header(); 
?>
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
        <section class="gamelist">
            <div class="container">
                <h1 class="title"><?php the_title(); ?></h1>
                <form method="get" class="gamesearch" action="" >
                 <?php if(!empty($_GET['sr'])) { $plsearch =  'Search result for: ' . $_GET['sr']; } else { $plsearch = 'Search by name'; } ?>
                    <input class="gamesearch_input" type="text" value="" placeholder="<?php echo $plsearch; ?>" name="sr" id="s" />
                    <input class="gamesearch_send" type="submit" value="" />
                </form>
                <form class="gamefilter" action="" id="gamefilter">
                    <?php
                        if(!empty($_GET['style'])) {
                            $filter_style = $_GET['style'];
                            function style_checked($valuefield, $filter_style) {
                                if(in_array($valuefield, $filter_style)) {
                                    echo 'checked';
                                }
                            };
                        } else {
                            $filter_style = false;
                            function style_checked() {
                                return;
                            };
                        }
                    ?>
                    <div class="gamefilter_checkbox">
                        <input type="checkbox" id="adventure" name="style[]" <?php style_checked('adventure', $filter_style); ?> value="adventure"/>
                        <label for="adventure">Adventure 🧭</label>

                        <input type="checkbox" id="horror" name="style[]" <?php style_checked('horror', $filter_style); ?> value="horror"/>
                        <label for="horror">Horror 👻</label>

                        <input type="checkbox" id="Friendly" name="style[]" <?php style_checked('fun', $filter_style); ?> value="fun"/>
                        <label for="Friendly">Fun 😄</label>

                        <input type="checkbox" id="Shooter" name="style[]" <?php style_checked('friendlyshooter', $filter_style); ?> value="friendlyshooter"/>
                        <label for="Shooter">Friendly - shooter 🎯</label>

                        <input type="checkbox" id="Competitive" name="style[]" <?php style_checked('futuristic', $filter_style); ?> value="futuristic"/>
                        <label for="Competitive">Futuristic 🤖</label>

                        <input type="checkbox" id="Challenging" name="style[]" <?php style_checked('challenging', $filter_style); ?> value="challenging"/>
                        <label for="Challenging">Challenging 🧠</label>

                        <input type="checkbox" id="Cooperational" name="style[]" <?php style_checked('competitive', $filter_style); ?> value="competitive"/>
                        <label for="Cooperational">Competitive🥇</label>

                        <input type="checkbox" id="Adventure" name="style[]" <?php style_checked('cooperational', $filter_style); ?> value="cooperational"/>
                        <label for="Adventure">Cooperational 🤝</label>

                        <input type="checkbox" id="Futuristic" name="style[]" <?php style_checked('shooter', $filter_style); ?> value="shooter"/>
                        <label for="Futuristic">Shooter 🔫</label>
                    </div>
                    <div class="gamefilter_ranger">
                        <p>Persons</p>
                        <input type="text" id="personsgame" />
                        <input type="hidden" id="pn" name="pn" value="<?php if(!empty($_GET['pn'])) { echo $_GET['pn']; } ?>" />
                        <input type="hidden" id="px" name="px" value="<?php if(!empty($_GET['px'])) { echo $_GET['px']; } ?>" />
                    </div>
                    <div class="gamefilter_ranger">
                        <p>Time</p>
                        <input type="text" id="timegame"  />
                        <input type="hidden" id="tn" name="tn" value="<?php if(!empty($_GET['tn'])) { echo $_GET['tn']; } ?>" />
                        <input type="hidden" id="tx" name="tx" value="<?php if(!empty($_GET['tx'])) { echo $_GET['tx']; } ?>" />
                    </div>
                        
                    <div class="gamefilter_select tag">
                        <p><?php if (!empty($_GET['tegs'])) { echo get_field('tegssetting', 'option')[preg_replace('/[^\d]/', '', $_GET['tegs'])]['teg']; } else { echo 'Perfect for...'; } ?></p>
                       
                        <ul> <?php foreach(get_field('tegssetting', 'option') as $key => $item) { ?>
                            <li data-value="key<?php echo $key; ?>"><?php echo $item['teg']; ?></li>
                        <?php } ?>
                            
                        </ul>
                        <input name="tegs" type="hidden" value="<?php if (!empty($_GET['tegs'])) { echo $_GET['tegs']; }?>">
                    </div>

                    <div class="gamefilter_select for">
                        <p><?php if (!empty($_GET['diff'])) { echo $_GET['diff']; } else { echo 'Difficulty...'; } ?></p>
                        <ul>
                            <li data-value="easy">Easy</li>
                            <li data-value="medium">Medium</li>
                            <li data-value="hard">Hard</li>
                        </ul>
                        <input name="diff" type="hidden" value="<?php if (!empty($_GET['diff'])) { echo $_GET['diff']; }?>">
                    </div>
   
                    <a href="<?php echo get_page_link(); ?>" class="filter_reset link green"><span>Reset</span></a>
                </form>
                <div class="gamelist_items">
                    <?php
                        if(!empty($_GET['sr'])) {
                            $search_term = $_GET['sr'];
                        } else {
                            $search_term = '';
                        }
                        $meta_query = [];
                        $meta_query['relation'] = 'AND';
                        $meta_query[1]['relation'] = 'OR';
                        if(!empty($filter_style)) {
                            foreach ($filter_style as $item) {
                                $meta_query[1][] = [
                                    'key'	 	=> 'style_bl2',
                                    'value'	  	=> $item,
                                    'compare' => 'LIKE'
                                ];	
                            }
                        }
                        $timearray = [15, 30, 45, 60, 75, 90, 105, 120];
                        if(!empty($_GET['tn'])) {
                            $mint = $_GET['tn'];
                        } else {
                            $mint = 15;
                        }
                        if(empty($_GET['tx']) || $_GET['tx'] == 60) {
                            $maxt = 120;
                        } else {
                            $maxt = $_GET['tx'];
                        }
                        $meta_query[2]['relation'] = 'OR';
                        foreach ($timearray as $item) {
                            if ($item >= $mint && $item <= $maxt) {
                                $meta_query[2][] = [
                                    'key'	 	=> 'time_bl2',
                                    'value'	  	=> $item,
                                    'compare' => 'LIKE'
                                ];
                            }
                        }
                        if(!empty($_GET['pn'])) {
                            $minp = $_GET['pn'];
                        } else {
                            $minp = 0;
                        }
                        if(empty($_GET['px']) || $_GET['px'] == 8) {
                            $maxp = 100;
                        } else {
                            $maxp = $_GET['px'];
                        }
                        $meta_query[3]['relation'] = 'AND';
                        $meta_query[3][] = [
                            'key'     => 'playersmin_bl2',
                            'value'   => intval($minp),
                            'compare' => '>=',
                            'type'    => 'numeric',
                        ];
                        $meta_query[3][] = [
                            'key'     => 'playersmax_bl2',
                            'value'   => intval($maxp),
                            'compare' => '<=',
                            'type'    => 'numeric',
                        ];
                        if($_GET['diff']) {
                            $meta_query[4]['relation'] = 'AND';
                            $meta_query[4][] = [
                                'key'     => 'difficult_bl3',
                                'value'   => $_GET['diff'],
                                'compare' => 'LIKE'
                            ];
                        }

                        if($_GET['tegs']) {
                            $meta_query[4]['relation'] = 'AND';
                            $meta_query[4][] = [
                                'key'     => 'tegsglobal',
                                'value'   => $_GET['tegs'],
                                'compare' => 'LIKE'
                            ];
                        }
                        

                        $args = array(
                            'post_type' => 'game', 
                            'posts_per_page' => -1,
                            's' => $search_term,
                            'meta_query'     => $meta_query
                        );
                        $loop = new WP_Query($args);
                        while ( $loop->have_posts() ) { $loop->the_post(); 
                    ?>
                        <a href="<?php the_permalink(); ?>" class="gamelist_item">
                            <div class="gamelist_item-bg"></div>
                            <?php echo get_the_post_thumbnail(get_the_ID(), '300-300', array( 'class' => 'gamelist_item-img' )); ?>
                            <div class="gamelist_item-top">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/player_ico.png" alt="Up to <?php the_field('playersmax_bl2'); ?> players">
                                <p>Up to <?php the_field('playersmax_bl2'); ?></p>
                            </div>
                            <div class="gamelist_item-bottom">
                                <h2 class="gamelist_item-title"><?php the_field('title_bl1'); ?></h2>
                                <p class="gamelist_item-text"><?php echo substr(get_field('subtitle_bl1'), 0, 80);  ?></p>
                            </div>
                        </a>
                    <?php } wp_reset_postdata(); ?>
                </div>
            </div>
        </section>

        <?php if(!get_field('hide_bl5')) { ?>
            <section class="questions mb">
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

    <?php endwhile; ?>     
<?php get_footer(); ?>