<?php
/*
 * Template Name: Blog Archief
 */
get_header();
$up = content_url('uploads/2026/05/');

// Posts query early - needed to exclude featured thumb from hero
$all_posts = new WP_Query([
    'post_type'      => 'post',
    'post_status'    => 'publish',
    'posts_per_page' => 12,
    'orderby'        => 'date',
    'order'          => 'DESC',
]);
$posts_arr         = $all_posts->posts;
$featured          = !empty($posts_arr) ? array_shift($posts_arr) : null;
$featured_thumb_id = $featured ? (int) get_post_thumbnail_id($featured) : 0;

// Hero image: one per day, min 400px wide, not the featured post thumbnail
$att_ids  = get_posts([
    'post_type'      => 'attachment',
    'post_mime_type' => 'image',
    'post_status'    => 'inherit',
    'posts_per_page' => -1,
    'post__not_in'   => $featured_thumb_id ? [$featured_thumb_id] : [0],
    'fields'         => 'ids',
]);
$valid_ids = [];
foreach ($att_ids as $id) {
    $meta = wp_get_attachment_metadata($id);
    if (!empty($meta['width']) && $meta['width'] >= 400) {
        $valid_ids[] = $id;
    }
}
if (!empty($valid_ids)) {
    sort($valid_ids);
    $hero_id  = $valid_ids[(int) date('Ymd') % count($valid_ids)];
    $hero_url = wp_get_attachment_image_url($hero_id, 'full');
    $hero_alt = get_post_meta($hero_id, '_wp_attachment_image_alt', true) ?: 'De Grote Marketing';
    $hero_m   = wp_get_attachment_metadata($hero_id);
    $hero_w   = $hero_m['width']  ?? 1024;
    $hero_h   = $hero_m['height'] ?? 1024;
} else {
    $hero_url = $up . 'e14040cb-e85f-4e74-adf8-dd9f9db05a31.png';
    $hero_alt = 'De Grote Marketing aan de keukentafel';
    $hero_w   = 1024;
    $hero_h   = 1024;
}
$rotations_right = ['2deg', '0deg', '0deg'];
$ri = 0;
?>

<!-- BLOG HERO -->
<section class="relative max-w-screen-xl mx-auto px-10 md:px-12 pb-12 md:pb-20 overflow-hidden" style="padding-top:39px">
  <div class="absolute -right-8 md:right-0 -top-2 md:top-8 text-[8rem] md:text-[14rem] font-black text-black/5 select-none leading-none rotate-6 pointer-events-none">BLOG</div>
  <div class="relative z-10 flex flex-col md:flex-row md:items-center gap-12 md:gap-16 fade-in-up">
    <div class="flex-1">
      <p class="text-sm font-bold uppercase tracking-widest text-primary-container mb-4">Lezen. Dan doen.</p>
      <h1 class="blog-h1 font-bold text-on-surface italic mb-8" style="font-size:60px;line-height:1.20">Blogs.<br>Kiek moar.</h1>
      <div class="hidden md:block text-lg md:text-xl leading-relaxed max-w-2xl">
        <p>We bloggen alleen als er wat te zeggen valt. Geen blogs over CTR of CPC. Wel wat werkt voor Groningse ondernemers, en waarom een rapport van 80 pagina's nergens op slaat.</p>
      </div>
      <div class="hidden md:inline-block px-4 py-2 border-2 border-primary-container rounded-full -rotate-2" style="margin:50px 0">
        <p class="text-base font-bold">Kloar.</p>
      </div>
    </div>
    <div class="hidden md:block shrink-0" style="width:400px;max-width:100%">
      <div class="relative">
        <div class="bg-[#078930]/15 absolute inset-0 -rotate-1 -translate-x-5 translate-y-5 rounded-xl -z-10 scale-110"></div>
        <img src="<?php echo esc_url($hero_url); ?>"
             sizes="400px"
             alt="<?php echo esc_attr($hero_alt); ?>"
             class="w-full aspect-square object-cover rounded-lg"
             width="<?php echo $hero_w; ?>" height="<?php echo $hero_h; ?>"/>
      </div>
    </div>
  </div>
</section>

<main class="max-w-screen-xl mx-auto px-10 md:px-12">

<?php if ($featured) : ?>

<!-- FEATURED POST -->
<section style="padding-top:48px;padding-bottom:32px">
  <a href="<?php echo get_permalink($featured); ?>" class="group block">
    <article class="featured-post" style="display:flex;align-items:stretch;min-height:360px">
      <div style="flex:1;background:rgba(7,137,48,0.1);padding:40px 25px;display:flex;flex-direction:column;justify-content:center;gap:20px;transform:rotate(-1deg);transform-origin:center center">
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
      <div class="featured-post-img" style="flex:0 0 60%;position:relative;overflow:hidden">
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
<section style="padding-top:48px;padding-bottom:64px">
  <div class="archief-kolommen">
    <div class="archief-links">
      <?php
      $left_posts  = [];
      $right_posts = [];
      foreach ($posts_arr as $idx => $p) {
          if ($idx % 2 === 0) $left_posts[]  = $p;
          else                $right_posts[] = $p;
      }
      $card_v = ['', 'card-v2', 'card-v1', 'card-v3', 'card-v4'];
      $vi = 0;
      foreach ($left_posts as $lp) :
          $thumb_url = get_the_post_thumbnail_url($lp, 'full') ?: ($up . 'geen-leverancier.png');
          $ri++;
          $cv = $card_v[$vi % 5]; $vi++;
      ?>
      <article class="<?php echo $cv; ?>">
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
          <p class="text-base leading-relaxed opacity-85"><?php echo esc_html(get_the_excerpt($lp)); ?></p>
        </a>
      </article>
      <?php endforeach; ?>
    </div>

    <div class="archief-rechts">
      <?php $rvi = 0; $right_variant_order = [1, 0, 2]; foreach ($right_posts as $rp) :
          $thumb_url = get_the_post_thumbnail_url($rp, 'full') ?: ($up . 'voorgroningers.png');
          $rot       = $rotations_right[$ri % count($rotations_right)];
          $ri++;
          $cv = $card_v[$vi % 5]; $vi++;
          $variant = $right_variant_order[$rvi % 3]; $rvi++;
      ?>

      <?php if ($variant === 0) : // titel → afbeelding 4:3 → excerpt ?>
      <article class="<?php echo $cv; ?>">
        <a href="<?php echo get_permalink($rp); ?>" class="group block">
          <h3 class="text-2xl font-black leading-tight mb-3 group-hover:text-primary-container transition-colors duration-200">
            <?php echo esc_html(get_the_title($rp)); ?>
          </h3>
          <div class="relative mb-4">
            <div class="bg-[#078930]/10 absolute inset-0 rounded" style="transform:rotate(<?php echo $rot; ?>) scale(1.2)"></div>
            <img src="<?php echo esc_url($thumb_url); ?>"
                 alt="<?php echo esc_attr(get_the_title($rp)); ?>"
                 class="w-full object-cover rounded transition-transform duration-500 group-hover:rotate-1"
                 style="aspect-ratio:4/3" width="1024" height="768" loading="lazy"/>
          </div>
          <p class="text-base leading-relaxed opacity-85"><?php echo esc_html(get_the_excerpt($rp)); ?></p>
        </a>
      </article>

      <?php elseif ($variant === 1) : // groen vlak met tilt als achtergrond ?>
      <article class="<?php echo $cv; ?> card-groen-vlak" style="position:relative">
        <div style="position:absolute;inset:-32px;background:#fff;border:2px solid #078930;border-radius:16px;transform:rotate(-3deg);z-index:0"></div>
        <a href="<?php echo get_permalink($rp); ?>" class="group block" style="position:relative;z-index:1">
          <div style="overflow:hidden;border-radius:8px;margin-bottom:16px">
            <img src="<?php echo esc_url($thumb_url); ?>"
                 alt="<?php echo esc_attr(get_the_title($rp)); ?>"
                 class="w-full object-cover transition-transform duration-500 group-hover:scale-105"
                 style="aspect-ratio:4/3" width="1024" height="768" loading="lazy"/>
          </div>
          <h3 class="text-2xl font-black leading-tight mb-3 group-hover:text-primary-container transition-colors duration-200">
            <?php echo esc_html(get_the_title($rp)); ?>
          </h3>
          <p class="text-base leading-relaxed opacity-85"><?php echo esc_html(get_the_excerpt($rp)); ?></p>
        </a>
      </article>

      <?php else : // titel → excerpt → afbeelding 3:2 ?>
      <article class="<?php echo $cv; ?>" style="background:rgba(7,137,48,0.06);border-radius:10px;padding:20px">
        <a href="<?php echo get_permalink($rp); ?>" class="group block">
          <h3 class="text-2xl font-black leading-tight mb-3 group-hover:text-primary-container transition-colors duration-200">
            <?php echo esc_html(get_the_title($rp)); ?>
          </h3>
          <p class="text-base leading-relaxed opacity-85 mb-4"><?php echo esc_html(get_the_excerpt($rp)); ?></p>
          <div class="relative">
            <div class="bg-[#078930]/10 absolute inset-0 rounded" style="transform:rotate(<?php echo $rot; ?>) scale(1.1)"></div>
            <img src="<?php echo esc_url($thumb_url); ?>"
                 alt="<?php echo esc_attr(get_the_title($rp)); ?>"
                 class="w-full object-cover rounded transition-transform duration-500 group-hover:-rotate-1"
                 style="aspect-ratio:3/2" width="1024" height="683" loading="lazy"/>
          </div>
        </a>
      </article>

      <?php endif; ?>
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
