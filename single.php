<?php get_header(); ?>
<?php
if (!have_posts()) { get_footer(); exit; }
the_post();
$up = content_url('uploads/2026/05/');
$thumb_url  = get_the_post_thumbnail_url(null, 'full') ?: ($up . 'voorgroningers.png');
$thumb_w    = 1536;
$thumb_h    = 1536;
$thumb_alt  = esc_attr(get_the_title());
$permalink  = get_permalink();
$blog_url   = home_url('/blog/');

// Thumb srcset
$thumb_md   = preg_replace('/\.\w+$/', '-768x768.png', basename($thumb_url));
$thumb_md   = $thumb_url === ($up . 'voorgroningers.png')
    ? $up . 'voorgroningers-768x768.png'
    : dirname($thumb_url) . '/' . $thumb_md;
?>

<article>

<!-- POST HEADER -->
<header class="max-w-screen-xl mx-auto px-10 md:px-12 pb-16 md:pb-24" style="padding-top:39px">
  <nav class="mb-10 flex items-center gap-2 flex-wrap" aria-label="Broodkruimels">
    <a href="<?php echo $blog_url; ?>" class="text-sm font-bold uppercase tracking-widest text-primary-container hover:underline underline-offset-4">← Alle blogs</a>
  </nav>

  <div class="flex flex-col md:flex-row md:items-center gap-12 md:gap-16">
    <div class="flex-1">
      <h1 class="font-bold text-on-surface italic mb-8 fade-in-up" style="font-size:60px;line-height:1.20">
        <?php the_title(); ?>
      </h1>
      <p class="text-xl md:text-2xl leading-relaxed opacity-90"><?php echo esc_html(get_the_excerpt()); ?></p>
    </div>
    <figure class="shrink-0" style="width:440px">
      <div class="relative">
        <div class="bg-[#078930]/15 absolute inset-0 -rotate-1 -translate-x-6 translate-y-6 rounded-xl -z-10 scale-[1.2]"></div>
        <img src="<?php echo esc_url($thumb_url); ?>"
             srcset="<?php echo esc_url($thumb_url); ?> 1536w,
                     <?php echo esc_url($thumb_md); ?> 768w"
             sizes="(min-width: 768px) 400px, 100vw"
             alt="<?php echo $thumb_alt; ?>"
             class="w-full aspect-square object-cover rounded-lg"
             width="<?php echo $thumb_w; ?>" height="<?php echo $thumb_h; ?>"
             fetchpriority="high"/>
      </div>
      <figcaption class="text-sm opacity-60 italic"><?php echo esc_html(get_the_excerpt()); ?></figcaption>
    </figure>
  </div>
</header>

<!-- POST BODY -->
<div class="prose-dgm mx-auto px-10 md:px-12 pb-16 md:pb-24" style="max-width:52rem;padding-top:50px">
  <?php the_content(); ?>

  <div class="pt-10 border-t border-black/10 flex items-center gap-4" style="margin-top:50px">
    <div class="w-24 h-24 bg-primary-container text-white font-black flex items-center justify-center text-2xl shrink-0" style="border-radius:50%">FT</div>
    <div>
      <p class="font-bold text-base" style="margin:0">Ferdi Tuinman</p>
      <p class="text-sm opacity-70" style="margin:0">Schreef dit aan de keukentafel.</p>
    </div>
  </div>
</div>

</article>

<!-- RELATED POSTS -->
<?php
$related = new WP_Query([
    'post_type'      => 'post',
    'post_status'    => 'publish',
    'posts_per_page' => 3,
    'orderby'        => 'date',
    'order'          => 'DESC',
    'post__not_in'   => [get_the_ID()],
]);
$rotations_rel = ['-rotate-2 translate-x-3 translate-y-2', 'rotate-2 -translate-x-2 translate-y-3', '-rotate-1 translate-x-3 -translate-y-2'];
$hover_rel     = ['group-hover:rotate-1', 'group-hover:-rotate-1', 'group-hover:rotate-1'];
if ($related->have_posts()) :
?>
<section class="max-w-screen-xl mx-auto px-10 md:px-12 pb-20" style="padding-top:50px">
  <div class="flex items-end justify-between gap-6 border-b border-black/10 pb-12 md:pb-20 mb-12">
    <div>
      <p class="text-4xl font-black text-primary-container mb-2" style="margin-top:25px">Verder lezen</p>
      <h2 class="text-3xl md:text-4xl font-black italic" style="margin:25px 0">Misschien ook wat.</h2>
    </div>
    <a href="<?php echo $blog_url; ?>" class="hidden md:inline-flex items-center gap-2 font-bold text-primary-container hover:underline underline-offset-4">
      Alle artikelen
      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M8.59 16.59L13.17 12L8.59 7.41L10 6l6 6-6 6z"/></svg>
    </a>
  </div>
  <div class="grid grid-cols-1 md:grid-cols-3 gap-y-12" style="column-gap:25px">
  <?php $ri = 0; while ($related->have_posts()) : $related->the_post(); ?>
    <?php
    $rel_thumb = get_the_post_thumbnail_url(null, 'full') ?: ($up . 'geen-leverancier.png');
    $rot_cls   = $rotations_rel[$ri % 3];
    $hov_cls   = $hover_rel[$ri % 3];
    $ri++;
    ?>
    <article>
      <a href="<?php the_permalink(); ?>" class="group block">
        <div class="relative mb-6">
          <div class="bg-[#078930]/10 absolute inset-0 <?php echo $rot_cls; ?> rounded -z-10"></div>
          <img src="<?php echo esc_url($rel_thumb); ?>"
               alt="<?php echo esc_attr(get_the_title()); ?>"
               class="w-full object-cover rounded transition-transform duration-500 <?php echo $hov_cls; ?>"
               style="aspect-ratio:4/3" width="1024" height="768" loading="lazy"/>
        </div>
        <div class="flex items-center gap-3 mb-2">
          <span class="text-xs opacity-60"><?php echo get_the_date('j F Y'); ?></span>
        </div>
        <h3 class="text-2xl font-black leading-tight group-hover:text-primary-container transition-colors duration-200">
          <?php the_title(); ?>
        </h3>
      </a>
    </article>
  <?php endwhile; wp_reset_postdata(); ?>
  </div>
</section>
<?php endif; ?>

<!-- BIG CTA -->
<section class="max-w-screen-xl mx-auto px-10 md:px-12 py-16 md:py-24 text-center relative overflow-hidden">
  <div class="absolute -left-12 top-0 text-[10rem] font-black text-black/5 select-none -z-10 rotate-6 leading-none">DOEN</div>
  <div class="relative z-10 space-y-8 max-w-3xl mx-auto">
    <p class="text-2xl md:text-3xl font-bold opacity-60">Genoeg gelezen?</p>
    <h2 class="text-4xl md:text-6xl font-black italic">Dan beginnen we gewoon.</h2>
    <a href="mailto:ferdi@degrotemarketing.nl"
       class="inline-block px-4 py-2 border-2 border-primary-container -rotate-3 translate-x-3 text-lg font-bold"
       style="border-radius:9999px">
      Bak pleur?<span class="sr-only"> (opent e-mailprogramma)</span>
    </a>
    <p class="text-sm italic opacity-80">Eerste gesprek, altijd vrijblijvend.</p>
  </div>
</section>

<?php get_footer(); ?>
