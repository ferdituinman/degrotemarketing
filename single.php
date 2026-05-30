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
$extended   = get_extended(get_post()->post_content);

// Thumb srcset
$thumb_md   = preg_replace('/\.\w+$/', '-768x768.png', basename($thumb_url));
$thumb_md   = $thumb_url === ($up . 'voorgroningers.png')
    ? $up . 'voorgroningers-768x768.png'
    : dirname($thumb_url) . '/' . $thumb_md;
?>

<style>
@media (max-width:767px){
  #post-hero-figure{margin-left:-40px;margin-right:-40px}
  #post-hero-figure img{border-radius:0}
  #post-hero-figure .absolute{display:none}
}
</style>

<article>

<!-- POST HEADER -->
<header class="max-w-screen-xl mx-auto px-10 md:px-12 pb-16 md:pb-24" style="padding-top:39px">
  <nav class="mb-10 hidden md:flex items-center gap-2 flex-wrap" aria-label="Broodkruimels">
    <a href="<?php echo $blog_url; ?>" class="text-sm font-bold uppercase tracking-widest text-primary-container hover:underline underline-offset-4">← Alle blogs</a>
  </nav>

  <div class="flex flex-col md:flex-row md:items-center gap-12 md:gap-16">
    <div style="flex:48;min-width:0">
      <h1 class="blog-h1 font-bold text-on-surface italic mb-8 fade-in-up" style="font-size:60px;line-height:1.20">
        <?php the_title(); ?>
      </h1>
      <p class="text-sm font-semibold uppercase tracking-widest opacity-50 mb-6" style="letter-spacing:0.08em">
        <time datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date('j F Y'); ?></time>
      </p>
      <div class="text-xl md:text-2xl leading-relaxed opacity-90"><?php echo apply_filters('the_content', $extended['main']); ?></div>
    </div>
    <figure id="post-hero-figure" style="flex:52;min-width:0">
      <div class="relative">
        <div class="bg-[#078930]/15 absolute inset-0 -rotate-1 -translate-x-6 translate-y-6 rounded-xl -z-10 scale-[1.44]"></div>
        <img src="<?php echo esc_url($thumb_url); ?>"
             srcset="<?php echo esc_url($thumb_url); ?> 1536w,
                     <?php echo esc_url($thumb_md); ?> 768w"
             sizes="(min-width: 1280px) 615px, (min-width: 768px) 52vw, 100vw"
             alt="<?php echo $thumb_alt; ?>"
             class="w-full rounded-lg"
             width="<?php echo $thumb_w; ?>" height="<?php echo $thumb_h; ?>"
             fetchpriority="high"/>
      </div>
      <figcaption class="opacity-60 italic" style="margin-top:5px;font-size:17px"><?php echo esc_html(get_the_excerpt() ?: 'Kop d\'r veur'); ?></figcaption>
    </figure>
  </div>
</header>

<!-- POST BODY -->
<div class="prose-dgm mx-auto px-10 md:px-12 pb-16 md:pb-24" style="max-width:52rem;padding-top:50px">
  <?php echo apply_filters('the_content', $extended['extended'] ?: $extended['main']); ?>

  <hr style="border:none;border-top:1px solid rgba(0,0,0,0.1);margin-top:50px;transform:rotate(-1deg);transform-origin:left center"/>
  <div class="flex items-center gap-4" style="padding-top:10px;margin-top:10px">
    <?php
    $authors = [
      ['name' => 'Ferdi Tuinman',      'initials' => 'FT'],
      ['name' => 'De Grote Marketing', 'initials' => 'DGM'],
    ];
    $pinned = get_post_meta(get_the_ID(), 'dgm_author', true);
    $author = $authors[($pinned !== '') ? (int)$pinned : 0];
    ?>
    <div class="w-24 h-24 bg-primary-container text-white font-black flex items-center justify-center text-2xl shrink-0" style="border-radius:50%"><?php echo esc_html($author['initials']); ?></div>
    <div>
      <p class="font-bold text-base" style="margin:0"><?php echo esc_html($author['name']); ?></p>
      <?php if ($author['name'] === 'Ferdi Tuinman') : ?>
      <p class="text-xs opacity-50 mt-1 mb-1" style="margin:2px 0 4px">Online marketeer &middot; GA4-gecertificeerd &middot; Moz-gecertificeerd</p>
      <?php endif; ?>
      <?php
      $taglines = [
        'Schreef dit tussen twee koffies in.',
        'Bedacht dit op de fiets, uitgeschreven thuis.',
        'Schreef dit op een doordeweekse ochtend.',
        'Dit is gewoon eerlijk opgeschreven.',
        'Bedacht, getwijfeld, toch gepost.',
        'Schreef dit met te veel koffie op.',
        'Uitgetypt op een moment dat het klopte.',
        'Schreef dit zonder het drie keer te checken.',
        'Schreef dit in één keer, niks herschreven.',
        'Schreef dit gewoon op.',
        'Schreef dit op de mooiste dinsdag van de week.',
        'Had geen GPT nodig om dit te bedenken.',
        'Drinkt koffie zwart.',
        'Altijd op de fiets.',
        'Spreekt vloeiend html.',
      ];
      $tagline = $taglines[array_rand($taglines)];
      ?>
      <p class="text-sm opacity-70" style="margin:0"><?php echo esc_html($tagline); ?></p>
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
  <div class="grid grid-cols-1 md:grid-cols-3 gap-y-12" style="column-gap:25px;align-items:start">
  <?php $ri = 0; while ($related->have_posts()) : $related->the_post(); ?>
    <?php
    $rel_thumb = get_the_post_thumbnail_url(null, 'dgm-square-md') ?: ($up . 'geen-leverancier.png');
    $rot_cls   = $rotations_rel[$ri % 3];
    $hov_cls   = $hover_rel[$ri % 3];
    ?>

    <?php if ($ri === 0) : // afbeelding eerst, 4:3 ?>
    <article>
      <a href="<?php the_permalink(); ?>" class="group block">
        <div class="relative mb-4">
          <div class="bg-[#078930]/10 absolute inset-0 <?php echo $rot_cls; ?> rounded -z-10"></div>
          <img src="<?php echo esc_url($rel_thumb); ?>"
               alt="<?php echo esc_attr(get_the_title()); ?>"
               class="w-full rounded transition-transform duration-500 <?php echo $hov_cls; ?>"
               width="512" height="384" loading="lazy"/>
        </div>
        <h3 class="text-2xl font-black leading-tight group-hover:text-primary-container transition-colors duration-200">
          <?php the_title(); ?>
        </h3>
      </a>
    </article>

    <?php elseif ($ri === 1) : // titel eerst, afbeelding onder, naar beneden geduwd ?>
    <article style="margin-top:40px;background:rgba(7,137,48,0.07);border-radius:10px;padding:24px">
      <a href="<?php the_permalink(); ?>" class="group block">
        <h3 class="text-2xl font-black leading-tight mb-4 group-hover:text-primary-container transition-colors duration-200">
          <?php the_title(); ?>
        </h3>
        <div style="overflow:hidden;border-radius:6px">
          <img src="<?php echo esc_url($rel_thumb); ?>"
               alt="<?php echo esc_attr(get_the_title()); ?>"
               class="w-full transition-transform duration-500 group-hover:scale-105"
               style="display:block" width="512" height="341" loading="lazy"/>
        </div>
      </a>
    </article>

    <?php else : // afbeelding eerst, vierkant ?>
    <article>
      <a href="<?php the_permalink(); ?>" class="group block">
        <div class="relative mb-4">
          <div class="bg-[#078930]/10 absolute inset-0 <?php echo $rot_cls; ?> rounded -z-10"></div>
          <img src="<?php echo esc_url($rel_thumb); ?>"
               alt="<?php echo esc_attr(get_the_title()); ?>"
               class="w-full rounded transition-transform duration-500 <?php echo $hov_cls; ?>"
               width="512" height="512" loading="lazy"/>
        </div>
        <h3 class="text-2xl font-black leading-tight group-hover:text-primary-container transition-colors duration-200">
          <?php the_title(); ?>
        </h3>
      </a>
    </article>

    <?php endif; ?>
    <?php $ri++; endwhile; wp_reset_postdata(); ?>
  </div>
</section>
<?php endif; ?>

<!-- BIG CTA -->
<section class="max-w-screen-xl mx-auto px-10 md:px-12 py-16 md:py-24 text-center relative overflow-hidden">
  <div class="absolute -left-12 top-0 text-[10rem] font-black text-black/5 select-none -z-10 rotate-6 leading-none">DOEN</div>
  <div class="relative z-10 space-y-8 max-w-3xl mx-auto">
    <p class="text-2xl md:text-3xl font-bold opacity-60">Genoeg gelezen?</p>
    <h2 class="text-4xl md:text-6xl font-black italic">Dan beginnen we gewoon.</h2>
    <a href="<?php echo home_url('/contact/'); ?>"
       class="inline-block px-4 py-2 border-2 border-primary-container -rotate-3 translate-x-3 text-lg font-bold"
       style="border-radius:9999px">
      Bak pleur?    </a>
    <p class="text-sm italic opacity-80">Eerste gesprek, altijd vrijblijvend.</p>
  </div>
</section>

<?php get_footer(); ?>
