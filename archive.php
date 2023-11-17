<?php get_header(); ?> 
<style>
	.locations {
		margin-bottom: 100px;
	}
</style>
<section class="locations">
	<div class="container">
		<h1 class="title">
		<?php single_cat_title(); ?>
			<div class="figure"></div>
		</h1>
		<div class="locations_area">
			<div class="locations_items">
				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
					<div class="locations_item">
						<a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
					</div>
				<?php endwhile; ?>  
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>