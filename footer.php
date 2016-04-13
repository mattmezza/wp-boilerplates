<footer>
    the footer
</footer>
<section>
  <?php
  $opt_name =
  $footer = get_option("footer_text".$lang);
  ?>
  <?php if(strlen($footer)>0): ?>
    <p><?php echo str_replace("__year__", date("Y"), $footer); ?></p>
  <?php else: ?>
    <p>&copy; the copyright</p>
  <?php endif; ?>
</section>
<!-- <script src="<?php bloginfo('template_directory');?>/js/compressed.js"></script> -->
<?php if (is_front_page()): ?>
  <script>

  </script>
<?php endif; ?>
<?php wp_footer(); ?>
</body>
</html>
