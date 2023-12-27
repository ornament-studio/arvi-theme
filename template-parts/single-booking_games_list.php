<section class="gamelist booking" id="bookblock">
	<div class="container">
		<?php if(!empty(get_field('title_bl8'))) { ?>
            <h2 class="title"><?php the_field('title_bl8'); ?></h2>
        <?php } ?>
		<div id="overlay">
			<div class="cv-spinner">
				<span class="spinner"></span>
			</div>
		</div>
		<div class="back_btn hidden">
			<a href="/" class="back_btn-link" id="gamelist_back_btn">Back to all games</a>
		</div>
		<div class="booking-wrapper hidden">
			<div class="booking-item">
				
			</div>
			<div class="booking-form">
				<?php gravity_form(1, false, false, false, '', true, 12); ?>
			</div>
		</div>
		<div class="booking-items">
			<?php foreach ($args['test_games_ids'] as $game_id) { ?>
				<a href="?game=<?=$game_id?>" class="gamelist_item" id="gamelist_item" data-game-id="<?=$game_id?>">
					<div class="gamelist_item-bg"></div>
					<?php echo get_the_post_thumbnail($game_id, '300-300', array('class' => 'gamelist_item-img')); ?>
					<div class="gamelist_item-top">
						<img src="<?=get_template_directory_uri()?>/img/player_ico.png" alt="Up to <?php the_field('playersmax_bl2', $game_id); ?> players">
						<p>Up to <?php the_field('playersmax_bl2', $game_id); ?></p>
					</div>
					<div class="gamelist_item-bottom">
						<h2 class="gamelist_item-title"><?php the_field('title_bl1', $game_id); ?></h2>
						<p class="gamelist_item-text"><?=substr(get_field('subtitle_bl1', $game_id), 0, 80)?>...</p>
					</div>
				</a>
			<?php } ?>
		</div>
	</div>
</section>