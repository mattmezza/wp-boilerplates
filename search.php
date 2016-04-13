<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<article>
		<?php if (has_post_thumbnail( $post->ID ) ): ?>
			<time datetime="<?php the_time(); ?>">
				<strong><?php the_time('d'); ?></strong>
				<?php the_time('M'); ?>
			</time>
			<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
			<a title="" href="<?php echo the_permalink(); ?>"><img src="<?php echo $image[0]; ?>" alt=""></a>
		<?php else: ?>
			no thumbnail
		<?php endif; ?>
		<a href="<?php echo the_permalink(); ?>" rel="bookmark"><?php echo the_title(); ?></a>
		<p><?php echo the_excerpt(); ?></p>
		<a rel="category" href="<?php echo the_permalink(); ?>"><?php _e( 'Read more...' ); ?></a>
	</article>
<?php endwhile; else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>
<?php get_footer(); ?>
