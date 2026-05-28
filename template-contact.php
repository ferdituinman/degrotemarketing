<?php
/*
 * Template Name: Contact
 */
get_header();
$up = content_url('uploads/2026/05/');
?>
<style>
#hero-eyebrow{display:none}
#mobile-eyebrow{display:block}
@media (min-width:768px){
  #hero-eyebrow{display:block}
  #mobile-eyebrow{display:none}
  #herov2{
    background-image:url('<?php echo $up; ?>horizontale-strip.png');
    background-position:50%;
    background-size:cover;
    height:500px;
    display:flex;
    align-items:center
  }
  #herov2 section{width:100%;padding-top:0;padding-bottom:0}
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
</style>

<!-- Hero mobile -->
<img src="<?php echo $up; ?>horizontale-strip-mobiel.webp"
     alt="" class="w-full block md:hidden" style="width:100%;max-width:100%;"
     fetchpriority="high" width="700" height="320" sizes="100vw"/>

<!-- Hero -->
<div id="herov2" class="w-full">
<section class="pb-16 md:flex md:items-center max-w-screen-xl mx-auto px-10 md:px-12">
<div class="relative z-10 bg-white/[0.98] pt-5 pr-10 pb-10 pl-10 md:p-8 rounded-lg max-w-2xl fade-in-up w-screen -ml-10 md:w-auto md:ml-0">
  <p id="hero-eyebrow" class="text-sm font-semibold uppercase tracking-widest text-primary-container mb-3">Aan de keukentafel</p>
  <h1 class="text-[70px] md:text-[5rem] font-bold text-primary-container mb-6 italic leading-[0.96] md:leading-normal">Gewoon doen.</h1>
  <p class="text-lg md:text-xl leading-relaxed">Geen offerte-aanvraagformulier van 12 velden. Geen driedaagse reactietijd. Gewoon even contact opnemen en kijken of het klikt.</p>
</div>
</section>
</div>

<main class="max-w-screen-xl mx-auto px-10 md:px-12">

<p id="mobile-eyebrow" class="text-sm font-semibold uppercase tracking-widest text-primary-container mt-10 mb-0">Aan de keukentafel</p>

<!-- HOOFDSECTIE: FORMULIER + CONTACTINFO -->
<section class="py-16 md:py-[100px]" style="display:grid;grid-template-columns:1fr;gap:64px">
  <div style="display:grid;grid-template-columns:1fr;gap:64px" id="contact-grid">
    <style>@media(min-width:768px){#contact-grid{grid-template-columns:55fr 45fr;gap:80px}}</style>

    <!-- Formulier links -->
    <div>
      <h2 class="text-3xl font-black mb-4">Stuur ons een bericht</h2>
      <p class="text-lg leading-relaxed mb-10 opacity-80">Vertel wat je bezighoudt. Wij lezen het, denken er even over na, en sturen je een eerlijk antwoord. Geen salespitch. Geen druk.</p>

      <?php
      if (function_exists('wpcf7_get_tag')) {
          echo do_shortcode('[contact-form-7 id="contact-formulier" title="Contactformulier"]');
      } else {
          echo '<p class="text-base opacity-70">Contact Form 7 is nog niet geactiveerd. Installeer en activeer de plugin, maak daarna een formulier aan met de naam "Contactformulier".</p>';
      }
      ?>
    </div>

    <!-- Contactinfo rechts -->
    <div class="space-y-10">
      <div>
        <p class="text-xs font-bold uppercase tracking-widest text-primary-container mb-4">Liever bellen?</p>
        <p class="text-2xl font-black mb-1"><a href="tel:+31624602947" class="hover:text-primary-container transition-colors">06-24602947</a></p>
        <p class="text-base opacity-70">Beschikbaar op werkdagen.</p>
      </div>

      <div>
        <p class="text-xs font-bold uppercase tracking-widest text-primary-container mb-4">Mailen?</p>
        <p class="text-xl font-bold"><a href="mailto:ferdi@degrotemarketing.nl" class="hover:text-primary-container transition-colors">ferdi@degrotemarketing.nl</a></p>
      </div>

      <div>
        <p class="text-xs font-bold uppercase tracking-widest text-primary-container mb-4">Adres</p>
        <p class="text-lg leading-relaxed">Leonard Springerlaan 35<br>9727 KB Groningen</p>
      </div>

      <div class="border-l-4 border-primary-container pl-6">
        <p class="text-lg italic leading-relaxed">"Wij beslissen aan de keukentafel. Niet in een boardroom, niet achter een presentatie van 40 slides. Gewoon praten over wat jij nodig hebt."</p>
        <p class="text-sm font-bold mt-4 text-primary-container">Ferdi Tuinman - De Grote Marketing</p>
      </div>
    </div>
  </div>
</section>

<!-- WAAROM CONTACT OPNEMEN -->
<section class="py-16 md:py-[80px]">
  <div class="max-w-4xl">
    <h2 class="text-3xl font-black mb-10">Wat je kunt verwachten.</h2>
    <div style="display:grid;grid-template-columns:1fr;gap:32px" id="expect-grid">
      <style>@media(min-width:768px){#expect-grid{grid-template-columns:repeat(3,1fr)}}</style>
      <div class="border-l-4 border-primary-container pl-6">
        <p class="font-black text-xl mb-2">Eerlijk antwoord</p>
        <p class="text-base leading-relaxed opacity-80">Als we denken dat iets niet bij je past, zeggen we dat gewoon. Geen product verkopen dat je niet nodig hebt.</p>
      </div>
      <div class="border-l-4 border-primary-container pl-6">
        <p class="font-black text-xl mb-2">Geen verplichtingen</p>
        <p class="text-base leading-relaxed opacity-80">Een eerste gesprek is altijd vrijblijvend. Geen druk, geen deadlines, geen vervolgmails als je niks hoort.</p>
      </div>
      <div class="border-l-4 border-primary-container pl-6">
        <p class="font-black text-xl mb-2">Snel reactie</p>
        <p class="text-base leading-relaxed opacity-80">We reageren binnen een werkdag. Gewoon. Niet met een automatische bevestiging, maar met een echt antwoord.</p>
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
    <article class="bg-white rounded-xl overflow-hidden border border-gray-100">
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
