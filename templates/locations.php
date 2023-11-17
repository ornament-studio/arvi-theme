<?php
/*
Template Name: Сторінка локацій
*/
get_header(); 
?>
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

        <section class="locations">
            <div class="container">
                <h1 class="title">
                    Locations
                    <div class="figure"></div>
                </h1>
                <form method="get" class="gamesearch" id="locationsearch" action="" >
                    <input class="gamesearch_input locationinput" type="text" value="" placeholder="Search..." name="sr" id="s" />
                    <input class="gamesearch_send" type="submit" value="" />
                </form>
                <?php 
                    $categories = get_categories( array(
                        'taxonomy'   => 'locations',
                        'orderby'    => 'name',
                        'parent'     => 0,
                        'hide_empty' => 0,
                    ));

                    foreach ( $categories as $category )  { 
                    
                ?>
                    <div class="locations_area">
                        <h2 class="locations_title"><?php echo $category->cat_name; ?></h2>
                        <div class="locations_items">
                            <?php 
                                $cat_child_first = get_categories( array(
                                    'taxonomy'   => 'locations',
                                    'orderby'    => 'name',
                                    'parent'     => $category->cat_ID,
                                ));
                                // echo '<pre>';
                                // print_r($cat_child_first);
                                // echo '</pre>';
                                foreach ( $cat_child_first as $category )  { 
                            ?>  
                                <?php if ($category->count === 0 && $category->category_count !== 0) { ?>
                                    <div class="locations_item-line">
                                        <p class="locations_item-title"><?php echo $category->cat_name; ?></p>
                                    </div>
                                <?php } ?>
                                <div class="locations_item">
                                    <?php if ($category->count === 0) { ?>
                                        <?php 
                                            $cat_child_second = get_categories( array(
                                                'taxonomy'   => 'locations',
                                                'orderby'    => 'name',
                                                'parent'     => $category->cat_ID,
                                            ));
                                            foreach ( $cat_child_second as $category )  {
                                        ?>
                                            <p class="locations_item-title min"><?php echo $category->cat_name; ?></p>
                                            <?php 
                                                $args = array(
                                                    'post_type' => 'location',
                                                    'post_status' => 'publish',
                                                    'posts_per_page' => -1, 
                                                    'orderby' => 'title', 
                                                    'order' => 'ASC', 
                                                    'tax_query' => array(
                                                        array(
                                                            'taxonomy' => 'locations', 
                                                            'field'    => 'term_id',         
                                                            'terms'    => $category->term_id,      
                                                        ),
                                                    ),
                                                );
                                                $loop = new WP_Query($args);
                                                while ( $loop->have_posts() ) { $loop->the_post(); 
                                                if(!get_field('directintegration')) {
                                                    $link = get_field('location_link');
                                                } else {
                                                    $link = get_permalink();
                                                }
                                            ?>
                                                <a href="<?php echo $link; ?>" <?php if(get_field('location_target')) { echo ' target="_blank"';} ?>>
                                                    <?php the_title(); ?><br>
                                                    <?php the_field('location_addresses'); ?>
                                                </a>
                                            <?php wp_reset_postdata(); } ?>
                                        <?php } ?>
                                    <?php } else { $cat_id ===  $category->term_id; ?>
                                            <p class="locations_item-title min"><?php echo $category->cat_name; ?></p>
                                            <?php 
                                                $args = array(
                                                    'post_type' => 'location',
                                                    'post_status' => 'publish',
                                                    'posts_per_page' => -1, 
                                                    'orderby' => 'title', 
                                                    'order' => 'ASC',
                                                    'tax_query' => array(
                                                        array(
                                                            'taxonomy' => 'locations', 
                                                            'field'    => 'term_id',         
                                                            'terms'    => $category->term_id,      
                                                        ),
                                                    ),
                                                );
                                                $loop = new WP_Query($args);
                                                while ( $loop->have_posts() ) { $loop->the_post(); 
                                                if(!get_field('directintegration')) {
                                                    $link = get_field('location_link');
                                                } else {
                                                    $link = get_permalink();
                                                }
                                            ?>
                                            <a href="<?php echo $link; ?>" <?php if(get_field('location_target')) { echo ' target="_blank"';} ?>>
                                                <?php the_title(); ?><br>
                                                <?php the_field('location_addresses'); ?>
                                            </a>
                                            <?php wp_reset_postdata(); } ?>
                                    <?php } ?>
                                    
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </section>

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