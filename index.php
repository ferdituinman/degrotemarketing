<?php get_header(); ?>
<main class="max-w-screen-xl mx-auto px-10 md:px-12 py-16">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <article class="mb-12">
    <h2 class="text-4xl font-black mb-4"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <p class="text-lg leading-relaxed"><?php the_excerpt(); ?></p>
  </article>
<?php endwhile; endif; ?>
</main>
<?php get_footer(); ?>
