<?php get_header(); ?>
<h1><?php echo get_the_title(); ?></h1>
<article>
  <?php if (has_post_thumbnail( $post->ID ) ): ?>
    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
    <img src="<?php echo $image[0]; ?>" alt="">
  <?php endif; ?>
  <a href="<?php echo get_page_link(); ?>"><?php echo get_the_title(); ?></a>
  <?php while ( have_posts() ) : the_post(); ?>
    <?php get_template_part( 'content', 'page' ); ?>
  <?php endwhile; // end of the loop. ?>
  <?php the_content(); ?>
</article>
<?php get_footer(); ?>
