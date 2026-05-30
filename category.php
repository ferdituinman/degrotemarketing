<?php get_header(); ?>

<main class="max-w-screen-xl mx-auto px-10 md:px-12 py-16">

  <header style="margin-bottom:48px">
    <p class="text-sm font-bold uppercase tracking-widest text-primary-container mb-3">Categorie</p>
    <h1 class="font-bold" style="font-size:48px;line-height:1.1"><?php single_cat_title(); ?></h1>
    <?php if (category_description()) : ?>
      <p class="text-lg leading-relaxed opacity-75 mt-4 max-w-2xl"><?php echo category_description(); ?></p>
    <?php endif; ?>
  </header>

  <?php if (have_posts()) : ?>
  <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(320px,1fr));gap:40px">
    <?php while (have_posts()) : the_post(); ?>
    <article>
      <a href="<?php the_permalink(); ?>" class="group block">
        <?php if (has_post_thumbnail()) : ?>
          <div style="border-radius:8px;overflow:hidden;margin-bottom:16px">
            <?php the_post_thumbnail('full', [
              'class'   => 'w-full h-auto rounded transition-transform duration-500 group-hover:scale-105',
              'style'   => 'display:block',
              'loading' => 'lazy',
            ]); ?>
          </div>
        <?php endif; ?>
        <h2 class="text-2xl font-black leading-tight mb-2 group-hover:text-primary-container transition-colors duration-200">
          <?php the_title(); ?>
        </h2>
        <p class="text-base leading-relaxed opacity-80"><?php the_excerpt(); ?></p>
      </a>
    </article>
    <?php endwhile; ?>
  </div>

  <div style="margin-top:64px">
    <?php the_posts_pagination(['mid_size' => 2]); ?>
  </div>

  <?php else : ?>
  <p class="py-32 text-xl text-center opacity-60">Geen artikelen in deze categorie. Kloar.</p>
  <?php endif; ?>

</main>

<?php get_footer(); ?>
