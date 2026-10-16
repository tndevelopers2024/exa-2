<?php
if (!defined('ABSPATH')) { exit; }
get_header(); ?>
<main class="exa-content">
  <a href="<?php echo esc_url(home_url('/')); ?>">← <?php bloginfo('name'); ?></a>
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <article <?php post_class(); ?>>
      <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
      <?php the_content(); wp_link_pages(); ?>
    </article>
  <?php endwhile; the_posts_pagination(); else : ?>
    <h1><?php esc_html_e('Nothing found', 'exa-home-services'); ?></h1>
    <?php get_search_form(); ?>
  <?php endif; ?>
</main>
<?php get_footer(); ?>
