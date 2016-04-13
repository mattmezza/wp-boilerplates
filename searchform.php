<form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <input type="text" value="" name="s" placeholder="Search keyword" value="<?php echo get_search_query(); ?>">
  <button type="submit">Search</button>
</form>
