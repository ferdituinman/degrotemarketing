<?php
/*
 * Template Name: Contact
 */
get_header();
$up = content_url('uploads/2026/05/');
?>
<style>
@media (min-width:768px){
  #herov2{
    background-image:url('<?php echo $up; ?>horizontale-strip.png');
    background-position:50%;
    background-size:cover;
    height:660px;
    display:flex;
    align-items:center
  }
  #herov2 section{width:100%;padding-top:0;padding-bottom:0}
  #contact-grid{grid-template-columns:55fr 45fr;gap:80px}
  #contact-info-col{margin-top:40px}
}
.wpcf7-form input[type="text"],
.wpcf7-form input[type="email"],
.wpcf7-form input[type="tel"],
.wpcf7-form textarea{
  width:100%;
  padding:14px 16px;
  border:2px solid #e5e7eb;
  border-radius:8px;
  font-size:17px;
  font-family:inherit;
  background:#fff;
  color:#111;
  transition:border-color .2s;
  box-sizing:border-box;
}
.wpcf7-form input[type="text"]:focus,
.wpcf7-form input[type="email"]:focus,
.wpcf7-form input[type="tel"]:focus,
.wpcf7-form textarea:focus{
  outline:none;
  border-color:#078930;
}
.wpcf7-form textarea{min-height:160px;resize:vertical}
.wpcf7-form input[type="submit"]{
  background:#078930;
  color:#fff;
  padding:14px 36px;
  font-size:18px;
  font-weight:700;
  border:none;
  border-radius:8px;
  cursor:pointer;
  font-family:inherit;
  transition:opacity .2s;
}
.wpcf7-form input[type="submit"]:hover{opacity:.88}
.wpcf7-form label{display:block;font-weight:600;margin-bottom:6px;font-size:16px}
.wpcf7-form .form-field{margin-bottom:20px}
.wpcf7-not-valid-tip{color:#dc2626;font-size:14px;margin-top:4px}
.wpcf7-response-output{margin-top:16px;padding:12px 16px;border-radius:6px;font-size:15px}

.cinfo-item{padding-bottom:24px;margin-bottom:24px;border-bottom:1px solid #e5e7eb}
.cinfo-item:last-child{padding-bottom:0;margin-bottom:0;border-bottom:0}

.expect-item{padding-bottom:36px;margin-bottom:36px;border-bottom:2px solid #f3f4f6}
.expect-item:last-child{padding-bottom:0;margin-bottom:0;border-bottom:0}
@media(min-width:768px){
  #expect-grid{grid-template-columns:repeat(3,1fr)}
  .expect-item{padding:0 40px;margin-bottom:0;border-bottom:0;border-right:2px solid #f3f4f6}
  .expect-item:first-child{padding-left:0}
  .expect-item:last-child{padding-right:0;border-right:0}
}
</style>

<!-- Hero mobile -->
<img src="<?php echo $up; ?>horizontale-strip-mobiel.webp"
     alt="" class="w-full block md:hidden" style="width:100%;max-width:100%;"
     fetchpriority="high" width="700" height="320" sizes="100vw"/>

<!-- Hero -->
<div id="herov2" class="w-full">
<section class="pb-20 md:flex md:items-center max-w-screen-xl mx-auto px-10 md:px-12">
<div class="relative z-10 bg-white/[0.98] pt-5 pr-10 pb-10 pl-10 md:p-8 rounded-lg max-w-2xl fade-in-up w-screen -ml-10 md:w-auto md:ml-0">
  <h1 class="text-sm font-semibold uppercase tracking-widest text-primary-container mb-3">Aan de keukentafel</h1>
  <p class="text-[70px] md:text-[5rem] font-bold text-primary-container mb-6 italic leading-[0.96] md:leading-normal">Gewoon doen.</p>
  <div class="space-y-4 text-lg md:text-xl leading-relaxed">
    <p>Geen offerte-aanvraagformulier van 12 velden. Geen driedaagse reactietijd.</p>
    <p>Gewoon even contact opnemen en kijken of het klikt.</p>
  </div>
</div>
</section>
</div>

<main class="max-w-screen-xl mx-auto px-10 md:px-12">

<!-- BLOK: contact-grid - form links, info rechts +40px offset -->
<section class="py-16 md:py-[100px]">
  <div style="display:grid;gap:64px" id="contact-grid">

    <!-- Formulier links -->
    <div>
      <h2 class="text-3xl font-black mb-2">Stuur ons een bericht</h2>
      <div class="h-1 w-16 bg-primary-container mb-6" style="margin-top:12px"></div>
      <p class="text-lg leading-relaxed mb-10 opacity-80">Vertel wat je bezighoudt. Wij lezen het, denken er even over na, en sturen je een eerlijk antwoord. Geen salespitch. Geen druk.</p>
      <?php echo do_shortcode('[contact-form-7 id="22395c1" title="Contact form 1"]'); ?>
    </div>

    <!-- Contactinfo rechts -->
    <div id="contact-info-col">

      <!-- Bellen -->
      <div class="cinfo-item">
        <p class="text-xs font-bold uppercase tracking-widest text-primary-container" style="margin-bottom:10px">Liever bellen?</p>
        <a href="tel:+31624602947" class="hover:text-primary-container transition-colors font-black" style="font-size:2.2rem;line-height:1.1;display:block">06-24602947</a>
        <p style="font-size:15px;margin-top:6px;opacity:.6">Bereikbaar op werkdagen</p>
      </div>

      <!-- Mailen -->
      <div class="cinfo-item">
        <p class="text-xs font-bold uppercase tracking-widest text-primary-container" style="margin-bottom:10px">Mailen?</p>
        <a href="mailto:ferdi@degrotemarketing.nl" class="font-bold hover:text-primary-container transition-colors" style="font-size:1.15rem;display:block">ferdi@degrotemarketing.nl</a>
      </div>

      <!-- Adres + kaart -->
      <div class="cinfo-item">
        <p class="text-xs font-bold uppercase tracking-widest text-primary-container" style="margin-bottom:10px">Adres</p>
        <p class="font-bold" style="font-size:1.1rem">Leonard Springerlaan 35</p>
        <p style="opacity:.65;margin-bottom:16px">9727 KB Groningen</p>
        <div style="border-radius:10px;overflow:hidden;height:200px">
          <iframe
            title="De Grote Marketing op de kaart"
            src="https://maps.google.com/maps?q=Leonard+Springerlaan+35,+9727+KB+Groningen&hl=nl&output=embed"
            width="100%" height="200"
            style="border:0;display:block"
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
            aria-label="Kaart met locatie van De Grote Marketing"></iframe>
        </div>
      </div>

      <!-- Quote -->
      <div style="background:rgba(7,137,48,0.06);border-radius:12px;padding:28px 28px 24px;position:relative;overflow:hidden">
        <span style="position:absolute;top:-20px;right:-10px;font-size:7rem;font-weight:900;line-height:1;opacity:.07;pointer-events:none;select:none">"</span>
        <p class="text-lg italic leading-relaxed" style="position:relative;z-index:1">Wij beslissen aan de keukentafel. Niet in een boardroom, niet achter een presentatie van 40 slides. Gewoon praten over wat jij nodig hebt.</p>
        <p class="text-sm font-bold text-primary-container" style="margin-top:16px;position:relative;z-index:1">Ferdi Tuinman - De Grote Marketing</p>
      </div>

    </div>
  </div>
</section>

<!-- BLOK: verwachten - "OK" deco linksonder, gedraaid -->
<section class="py-16 md:py-[80px] relative overflow-hidden">
  <span style="position:absolute;bottom:-20px;left:-30px;font-size:10rem;font-weight:900;line-height:1;color:rgba(0,0,0,0.04);pointer-events:none;select:none;z-index:0;transform:rotate(-8deg)">OK</span>
  <div style="position:relative;z-index:1">
    <h2 class="text-3xl font-black" style="margin-bottom:48px">Wat je kunt verwachten.</h2>
    <div style="display:grid" id="expect-grid">

      <div class="expect-item">
        <span class="text-primary-container font-black" style="font-size:2.8rem;line-height:1;display:block;margin-bottom:16px">01</span>
        <p class="font-black" style="font-size:20px;margin-bottom:10px">Eerlijk antwoord</p>
        <p class="text-base leading-relaxed opacity-80">Als we denken dat iets niet bij je past, zeggen we dat gewoon. Geen product verkopen dat je niet nodig hebt.</p>
      </div>

      <div class="expect-item">
        <span class="text-primary-container font-black" style="font-size:2.8rem;line-height:1;display:block;margin-bottom:16px">02</span>
        <p class="font-black" style="font-size:20px;margin-bottom:10px">Geen verplichtingen</p>
        <p class="text-base leading-relaxed opacity-80">Een eerste gesprek is altijd vrijblijvend. Geen druk, geen deadlines, geen vervolgmails als je niks hoort.</p>
      </div>

      <div class="expect-item">
        <span class="text-primary-container font-black" style="font-size:2.8rem;line-height:1;display:block;margin-bottom:16px">03</span>
        <p class="font-black" style="font-size:20px;margin-bottom:10px">Snel reactie</p>
        <p class="text-base leading-relaxed opacity-80">We reageren binnen een werkdag. Niet met een automatische bevestiging, maar met een echt antwoord.</p>
      </div>

    </div>
  </div>
</section>

<!-- RECENT BLOGS -->
<?php
$dgm_posts = get_posts(['post_type'=>'post','post_status'=>'publish','posts_per_page'=>3,'orderby'=>'date','order'=>'DESC']);
if (!empty($dgm_posts)) :
?>
<section class="py-16 md:py-[100px]">
  <div class="flex items-end justify-between gap-8 flex-wrap mb-12">
    <div>
      <p class="text-sm font-bold uppercase tracking-widest text-primary-container mb-3">Proatjes.</p>
      <h2 class="text-3xl font-black">Blogs. Zelf geschreven.</h2>
    </div>
    <a href="<?php echo home_url('/blog/'); ?>" class="hidden md:block text-base font-bold text-primary-container border-b-2 border-primary-container pb-0.5 shrink-0">Alle blogs &rarr;</a>
  </div>
  <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
    <?php foreach ($dgm_posts as $dgm_post) :
      $dgm_thumb   = get_the_post_thumbnail_url($dgm_post, 'dgm-square-md') ?: ($up . 'voorgroningers-768x768.png');
      $dgm_title   = esc_html(get_the_title($dgm_post));
      $dgm_excerpt = get_the_excerpt($dgm_post);
      $dgm_link    = get_permalink($dgm_post);
    ?>
    <article class="bg-white rounded-xl overflow-hidden" style="border:1px solid #f3f4f6">
      <a href="<?php echo esc_url($dgm_link); ?>" class="group block">
        <div style="overflow:hidden">
          <img src="<?php echo esc_url($dgm_thumb); ?>" alt="<?php echo $dgm_title; ?>"
               class="w-full transition-transform duration-500 group-hover:scale-105"
               width="512" height="512" loading="lazy"/>
        </div>
        <div class="p-6">
          <h3 class="font-black leading-tight mb-3 group-hover:text-primary-container transition-colors" style="font-size:20px;line-height:1.2"><?php echo $dgm_title; ?></h3>
          <p class="text-base leading-relaxed opacity-70"><?php echo $dgm_excerpt; ?></p>
        </div>
      </a>
    </article>
    <?php endforeach; ?>
  </div>
</section>
<?php endif; ?>

</main>
<?php get_footer(); ?>
