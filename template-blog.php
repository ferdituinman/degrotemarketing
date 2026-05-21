<?php
/*
 * Template Name: Blog Archief
 */
get_header();
$up = content_url('uploads/2026/05/');
?>

<!-- BLOG HERO -->
<section class="relative max-w-screen-xl mx-auto px-10 md:px-12 pb-12 md:pb-20 overflow-hidden" style="padding-top:39px">
  <div class="absolute -right-8 md:right-0 -top-2 md:top-8 text-[8rem] md:text-[14rem] font-black text-black/5 select-none leading-none rotate-6 pointer-events-none">BLOG</div>
  <div class="relative z-10 flex flex-col md:flex-row md:items-center gap-12 md:gap-16 fade-in-up">
    <div class="flex-1">
      <p class="text-sm font-bold uppercase tracking-widest text-primary-container mb-4">Lezen. Dan doen.</p>
      <h1 class="font-bold text-on-surface italic mb-8" style="font-size:60px;line-height:1.20">Blogs.<br>Kiek moar.</h1>
      <div class="text-lg md:text-xl leading-relaxed max-w-2xl">
        <p>We bloggen alleen als er wat te zeggen valt. Geen blogs over CTR of CPC. Wel wat werkt voor Groningse ondernemers, en waarom een rapport van 80 pagina's nergens op slaat.</p>
      </div>
      <div class="inline-block px-4 py-2 border-2 border-primary-container rounded-full -rotate-2" style="margin:50px 0">
        <p class="text-base font-bold">Kloar.</p>
      </div>
    </div>
    <div class="shrink-0" style="width:400px">
      <div class="relative">
        <div class="bg-[#078930]/15 absolute inset-0 -rotate-1 -translate-x-5 translate-y-5 rounded-xl -z-10 scale-110"></div>
        <img src="<?php echo $up; ?>geen-leverancier.png"
             srcset="<?php echo $up; ?>geen-leverancier.png 1024w,
                     <?php echo $up; ?>geen-leverancier-768x768.png 768w,
                     <?php echo $up; ?>geen-leverancier-300x300.png 300w"
             sizes="400px"
             alt="De Grote Marketing aan de keukentafel"
             class="w-full aspect-square object-cover rounded-lg"
             width="1024" height="1024"/>
      </div>
    </div>
  </div>
</section>

<main class="max-w-screen-xl mx-auto px-10 md:px-12">

<?php
$all_posts = new WP_Query([
    'post_type'      => 'post',
    'post_status'    => 'publish',
    'posts_per_page' => 12,
    'orderby'        => 'date',
    'order'          => 'DESC',
]);

$rotations_right = ['2deg', '-1deg', '1deg'];
$ri = 0;

if ($all_posts->have_posts()) :
    $posts_arr = $all_posts->posts;
    $featured  = array_shift($posts_arr);
?>

<!-- FEATURED POST -->
<section style="padding-top:100px;padding-bottom:32px">
  <a href="<?php echo get_permalink($featured); ?>" class="group block">
    <article style="display:flex;align-items:stretch;min-height:480px">
      <div style="flex:1;background:rgba(7,137,48,0.1);padding:48px 40px;display:flex;flex-direction:column;justify-content:center;gap:20px;transform:rotate(-1deg);transform-origin:center center">
        <p class="text-sm font-bold uppercase tracking-widest text-primary-container">Mooi verhaal. Lekker kort.</p>
        <h2 class="group-hover:text-primary-container transition-colors duration-200" style="font-size:40px;font-weight:700;line-height:1.05">
          <?php echo esc_html(get_the_title($featured)); ?>
        </h2>
        <p class="text-lg leading-relaxed opacity-90"><?php echo esc_html(get_the_excerpt($featured)); ?></p>
        <div class="flex items-center gap-2 text-primary-container font-bold">
          <span class="border-b-2 border-primary-container pb-0.5">Lees het artikel</span>
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor" class="transition-transform duration-300 group-hover:translate-x-1"><path d="M8.59 16.59L13.17 12L8.59 7.41L10 6l6 6-6 6z"/></svg>
        </div>
      </div>
      <div style="flex:0 0 60%;position:relative;overflow:hidden">
        <?php if (has_post_thumbnail($featured)) : ?>
          <?php echo get_the_post_thumbnail($featured, 'full', [
              'class'     => 'w-full h-full object-cover transition-transform duration-500 group-hover:scale-105',
              'style'     => 'display:block',
              'loading'   => 'eager',
              'fetchpriority' => 'high',
          ]); ?>
        <?php else : ?>
          <img src="<?php echo $up; ?>voorgroningers.png" alt="<?php echo esc_attr(get_the_title($featured)); ?>"
               class="w-full h-full object-cover" style="display:block" width="1536" height="1536" fetchpriority="high"/>
        <?php endif; ?>
      </div>
    </article>
  </a>
</section>

<?php if (!empty($posts_arr)) : ?>
<!-- POSTS GRID -->
<section style="padding-top:24px;padding-bottom:48px">
  <div class="archief-kolommen">
    <div class="archief-links">
      <?php
      $left_posts  = [];
      $right_posts = [];
      foreach ($posts_arr as $idx => $p) {
          if ($idx % 2 === 0) $left_posts[]  = $p;
          else                $right_posts[] = $p;
      }
      foreach ($left_posts as $lp) :
          $thumb_url = get_the_post_thumbnail_url($lp, 'full') ?: ($up . 'geen-leverancier.png');
          $ri++;
      ?>
      <article>
        <a href="<?php echo get_permalink($lp); ?>" class="group block">
          <div style="background:rgba(7,137,48,0.08);border-radius:2px;margin-bottom:16px">
            <img src="<?php echo esc_url($thumb_url); ?>"
                 alt="<?php echo esc_attr(get_the_title($lp)); ?>"
                 class="w-full object-cover rounded transition-transform duration-500 group-hover:-rotate-1"
                 style="aspect-ratio:4/3;display:block" width="1024" height="768" loading="lazy"/>
            <div style="padding:16px 20px 20px">
              <h3 class="text-2xl font-black leading-tight group-hover:text-primary-container transition-colors duration-200">
                <?php echo esc_html(get_the_title($lp)); ?>
              </h3>
            </div>
          </div>
          <div class="flex items-center gap-3 mb-3">
            <span class="text-xs opacity-60"><?php echo get_the_date('j F Y', $lp); ?></span>
          </div>
          <p class="text-base leading-relaxed opacity-85"><?php echo esc_html(get_the_excerpt($lp)); ?></p>
        </a>
      </article>
      <?php endforeach; ?>
    </div>

    <div class="archief-rechts">
      <?php foreach ($right_posts as $rp) :
          $thumb_url = get_the_post_thumbnail_url($rp, 'full') ?: ($up . 'voorgroningers.png');
          $rot       = $rotations_right[$ri % count($rotations_right)];
          $ri++;
      ?>
      <article>
        <a href="<?php echo get_permalink($rp); ?>" class="group block">
          <div class="relative mb-6">
            <div class="bg-[#078930]/10 absolute inset-0 rounded -z-10" style="transform:rotate(<?php echo $rot; ?>)"></div>
            <img src="<?php echo esc_url($thumb_url); ?>"
                 alt="<?php echo esc_attr(get_the_title($rp)); ?>"
                 class="w-full object-cover rounded transition-transform duration-500 group-hover:rotate-1"
                 style="aspect-ratio:4/3" width="1024" height="768" loading="lazy"/>
          </div>
          <div class="flex items-center gap-3 mb-3">
            <span class="text-xs opacity-60"><?php echo get_the_date('j F Y', $rp); ?></span>
          </div>
          <h3 class="text-2xl font-black leading-tight mb-3 group-hover:text-primary-container transition-colors duration-200">
            <?php echo esc_html(get_the_title($rp)); ?>
          </h3>
          <p class="text-base leading-relaxed opacity-85"><?php echo esc_html(get_the_excerpt($rp)); ?></p>
        </a>
      </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<?php else : ?>
<p class="py-32 text-xl text-center opacity-60">Binnenkort meer te lezen. Kloar.</p>
<?php endif; ?>

<!-- CTA STRIP -->
<section class="py-16 md:py-[100px] text-center relative overflow-hidden" style="margin-top:25px">
  <div class="relative z-10 space-y-12">
    <div class="space-y-4">
      <p class="text-2xl md:text-3xl font-bold opacity-60">Zullen we gewoon beginnen?</p>
      <h2 class="text-5xl md:text-7xl font-black">We komen jouw koffie proeven.</h2>
    </div>
    <a href="mailto:ferdi@degrotemarketing.nl"
       class="bg-primary-container text-white px-12 py-6 text-2xl font-bold rounded-lg drift-on-hover shadow-xl shadow-primary-container/20 inline-block md:rotate-1">
      Nodig ons uit<span class="sr-only"> (opent e-mailprogramma)</span>
    </a>
    <p class="text-sm italic opacity-80 mt-6">Eerste gesprek, altijd vrijblijvend.</p>
  </div>
</section>

</main>
<?php get_footer(); ?>
