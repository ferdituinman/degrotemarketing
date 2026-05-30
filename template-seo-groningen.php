<?php
/*
 * Template Name: SEO Groningen
 */
get_header();
$up   = content_url('uploads/2026/05/');
$up04 = content_url('uploads/2026/04/');
$pid  = get_the_ID();
$_s1  = (int) get_post_meta($pid, '_dgm_section_img_1', true);
$_s2  = (int) get_post_meta($pid, '_dgm_section_img_2', true);
$_s3  = (int) get_post_meta($pid, '_dgm_section_img_3', true);
$seo_img1 = $_s1 ? wp_get_attachment_image_url($_s1, 'large') : $up04 . 'seo-groningen.png';
$seo_img2 = $_s2 ? wp_get_attachment_image_url($_s2, 'large') : $up . 'reviews.png';
$seo_img3 = $_s3 ? wp_get_attachment_image_url($_s3, 'large') : $up . 'iedereen-belooft-hetzelfde.png';
$_thumb_id  = get_post_thumbnail_id($pid);
$_hero_full = $_thumb_id ? wp_get_attachment_image_src($_thumb_id, 'full') : null;
$_hero_url  = $_hero_full ? esc_url($_hero_full[0]) : esc_url($up . 'horizontale-strip.png');
$_hero_mob  = $_hero_full ? ['url' => $_hero_full[0], 'width' => (int)$_hero_full[1], 'height' => (int)$_hero_full[2]] : ['url' => $up . 'horizontale-strip-mobiel.webp', 'width' => 700, 'height' => 320];
?>
<style>
@media (min-width:768px){
  #herov2{
    background-image:url('<?php echo $_hero_url; ?>');
    background-position:50%;
    background-size:cover;
    height:660px;
    display:flex;
    align-items:center
  }
  #herov2 section{width:100%;padding-top:0;padding-bottom:0}
  .sect5545{grid-template-columns:55fr 45fr}
  .kaartje-45{width:45%;flex-shrink:0}
}
</style>

<!-- BLOK: hero-mobiel - achtergrondafbeelding zichtbaar op telefoon, verborgen op desktop -->
<img src="<?php echo esc_url($_hero_mob['url']); ?>"
     alt="" class="w-full block md:hidden" style="width:100%;max-width:100%;"
     fetchpriority="high" width="<?php echo (int)$_hero_mob['width']; ?>" height="<?php echo (int)$_hero_mob['height']; ?>" sizes="100vw"/>

<!-- BLOK: hero - intro "Gewoon doen." met service-specifieke CTA-knop -->
<div id="herov2" class="w-full">
<section class="pb-20 md:flex md:items-center max-w-screen-xl mx-auto px-10 md:px-12">
<div class="relative z-10 bg-white/[0.98] pt-5 pr-10 pb-10 pl-10 md:p-8 rounded-lg max-w-2xl fade-in-up w-screen -ml-10 md:w-auto md:ml-0">
  <h1 class="text-sm font-semibold uppercase tracking-widest text-primary-container mb-3">Hoger in Google in Groningen</h1>
  <p class="text-[70px] md:text-[5rem] font-bold text-primary-container mb-6 italic leading-[0.96] md:leading-normal">Groningen zoekt. Ben jij er?</p>
  <div class="space-y-4 text-lg md:text-xl leading-relaxed">
    <p>Je weet dat meer mensen jou moeten kunnen vinden. Maar hoe dat werkt met Google, dat is een ander verhaal.</p>
    <p>Wij maken dat makkelijk. Geen abracadabra. Gewoon gevonden worden. SEO noemen we dat, maar die term mag je gelijk weer vergeten.</p>
    <p>We gaan doen wat werkt.</p>
  </div>
  <div class="mt-12">
    <a href="<?php echo home_url('/contact/'); ?>" class="bg-primary-container text-white px-10 py-4 text-xl font-bold rounded shadow-none drift-on-hover inline-block">
      Hoger in Google?    </a>
  </div>
</div>
</section>
</div>

<main class="max-w-screen-xl mx-auto px-10 md:px-12">

<!-- BLOK: s1 - eerste inhoudssectie: eyebrow + H2 + paragrafen + foto links (12-kol grid) -->
<section class="py-16 md:py-[100px] grid grid-cols-1 md:grid-cols-12 gap-12 items-center">
  <div class="md:col-start-2 md:col-span-5 space-y-6">
    <p class="text-sm font-semibold uppercase tracking-widest text-primary-container mb-3">SEO bureau Groningen</p>
    <h2 class="text-4xl font-black mb-8">GEVONDEN WORDEN OF NIET</h2>
    <p class="text-lg md:text-xl leading-relaxed">Als iemand googelt op jouw dienst in Groningen, wil je erbij zijn. Op de eerste pagina. En in het kaartje.</p>
    <p class="text-lg md:text-xl leading-relaxed">Dat is waar SEO over gaat. Gevonden worden door mensen die al zoeken naar wat jij doet. Niet adverteren. Niet betalen per klik. Gewoon gevonden worden.</p>
    <p class="text-lg md:text-xl leading-relaxed">Kijkers zijn geen kopers. Maar mensen die googelen op "loodgieter Groningen" of "boekhouder Groningen centrum" - die zijn er klaar voor.</p>
    <div class="h-1 w-24 bg-primary-container"></div>
  </div>
  <div class="md:col-span-5 relative" style="transform:translateY(32px)">
    <div class="bg-[#078930]/5 absolute inset-0 rotate-2 translate-x-4 -translate-y-3 rounded-xl -z-10 scale-90"></div>
    <img class="w-full object-cover rounded scale-90 md:rotate-1"
         src="<?php echo esc_url($seo_img1); ?>"
         sizes="(min-width: 768px) 42vw, 100vw"
         alt="SEO in Groningen" width="1024" height="683" loading="lazy"/>
  </div>
</section>

<!-- BLOK: s2 - tweede sectie 55/45: tekst links + foto rechts -->
<section class="py-16 md:pt-[80px] md:pb-[130px] sect5545 grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
  <div class="space-y-6 order-2">
    <h2 class="text-4xl font-black mb-8">Reviews tellen mee. Echt.</h2>
    <p class="text-lg md:text-xl leading-relaxed">Hoe meer reviews, hoe vaker gevonden. Hoe vaker gevonden, hoe meer klanten. Hoe meer klanten, hoe meer reviews.</p>
    <p class="text-lg md:text-xl leading-relaxed">Dat is de flow waar je in wilt zitten. Reviews zijn niet alleen voor je gevoel. Ze zijn onderdeel van hoe Google beslist wie er bovenaan staat in Groningen.</p>
    <p class="text-lg md:text-xl leading-relaxed">En het begint gewoon met vragen. Dus dat gaan we doen.</p>
    <div class="h-1 w-36 bg-primary-container -rotate-1 translate-x-2"></div>
  </div>
  <div class="relative order-1" style="transform:translateY(16px)">
    <div class="bg-[#078930]/5 absolute inset-0 -rotate-3 -translate-x-4 translate-y-2 rounded-xl -z-10 scale-110"></div>
    <img class="w-full object-cover rounded"
         src="<?php echo esc_url($seo_img2); ?>"
         sizes="(min-width: 768px) 42vw, 100vw"
         alt="Reviews helpen bij SEO in Groningen" width="1024" height="725" loading="lazy"/>
  </div>
</section>

<!-- BLOK: s3 - tekst links + stappenkaart rechts (01-04 genummerde stappen) -->
<section class="py-16 md:py-[100px] border-none">
  <div class="max-w-4xl mx-auto flex flex-col md:flex-row items-start gap-12 md:gap-24">
    <div class="flex-1 space-y-8 md:translate-y-6">
      <h2 class="text-4xl font-black italic">WAT WE DOEN</h2>
      <p class="text-xl leading-relaxed">SEO is geen magie. Het is logica. En doorzetten. Duurt even, heb je ook wat.</p>
      <p class="text-xl leading-relaxed">We kijken wat klanten intikken als ze naar jou zoeken. We zorgen dat jouw website dat ook snapt. En dan wachten we tot Google het doorheeft.</p>
      <p class="font-bold text-primary-container">Geen geheimzinnige trucjes. Gewoon werk dat werkt.</p>
    </div>
    <div class="w-full kaartje-45">
      <div class="bg-[#078930]/5 absolute -z-10 rotate-1 translate-x-4 -translate-y-2 rounded-lg scale-110"></div>
      <div class="p-8 bg-surface-container-low border border-black/5 rounded-lg shadow-sm" style="transform: rotate(-1deg)">
        <div class="flex gap-4 items-start mt-2">
          <span class="text-primary-container font-black text-xl w-8 shrink-0">01</span>
          <p class="text-lg leading-relaxed">We zoeken uit op welke woorden klanten jou zoeken in Groningen</p>
        </div>
        <div class="flex gap-4 items-start mt-4">
          <span class="text-primary-container font-black text-xl w-8 shrink-0">02</span>
          <p class="text-lg leading-relaxed">We optimaliseren je pagina's zodat Google ze begrijpt</p>
        </div>
        <div class="flex gap-4 items-start mt-4">
          <span class="text-primary-container font-black text-xl w-8 shrink-0">03</span>
          <p class="text-lg leading-relaxed">We zorgen dat je naam, adres en telefoonnummer overal kloppen</p>
        </div>
        <div class="flex gap-4 items-start mt-4">
          <span class="text-primary-container font-black text-xl w-8 shrink-0">04</span>
          <p class="text-lg leading-relaxed">We helpen je aan meer reviews van tevreden klanten</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- BLOK: s4 - statement 55/45: tekst rechts + foto links + inline CTA-knop -->
<section class="py-16 md:py-[100px] sect5545 grid grid-cols-1 md:grid-cols-2 gap-16 items-center">
  <div class="space-y-8 text-xl leading-relaxed order-1 md:order-2">
    <h2 class="text-4xl font-black leading-tight mb-4">Iedereen belooft pagina 1.<br/>Wij niet.</h2>
    <p class="text-xl leading-relaxed">Elke SEO-partij belooft je de eerste plek. Dat klinkt mooi. Het is ook onzin. Niemand kan dat garanderen.</p>
    <p class="text-xl leading-relaxed">Wij zeggen wat realistisch is. Wat we verwachten. Wat op een klein budget niet gaat lukken. En als iets niet lukt, verzinnen we iets veel beter.</p>
    <a href="<?php echo home_url('/contact/'); ?>" class="bg-primary-container text-white px-8 py-3 text-lg font-bold rounded drift-on-hover inline-block">
      Gratis website-analyse    </a>
  </div>
  <div class="relative order-2 md:order-1 md:translate-y-4">
    <div class="bg-[#078930]/15 absolute inset-0 -rotate-1 -translate-x-5 translate-y-5 rounded-xl -z-10 scale-110"></div>
    <img src="<?php echo esc_url($seo_img3); ?>"
         sizes="(min-width: 768px) 50vw, 100vw"
         alt="Eerlijk over SEO resultaten"
         class="w-full object-contain scale-90" width="1024" height="683" loading="lazy"/>
  </div>
</section>

<!-- BLOK: s5 - quote-blok met groene border links; lokaal argument -->
<section class="py-16 md:py-[100px] text-left">
  <div class="max-w-4xl border-l-4 border-primary-container pl-6 md:pl-12 py-8 ml-0" style="margin-left:24px">
    <h2 class="text-4xl font-black mb-8">Lokaal SEO bureau. Geen pak.</h2>
    <div class="space-y-6 text-xl leading-relaxed opacity-90">
      <p>We kennen Groningen. We weten hoe Stadjers zoeken. We weten welke buurten er toe doen voor jouw bedrijf.</p>
      <p>Dat is iets wat een bureau uit Amsterdam via een Zoom-call nooit voor je kan doen. Droge humor inbegrepen. Gratis.</p>
    </div>
  </div>
</section>

<!-- BLOK: contact-cta - grote afsluitende uitnodiging met e-mailknop -->
<section id="contact" class="py-16 md:py-[100px] text-center relative overflow-hidden">
  <div class="relative z-10 space-y-12">
    <div class="space-y-4">
      <p class="text-2xl md:text-3xl font-bold opacity-60">Benieuwd hoe jouw site het doet?</p>
      <h2 class="text-5xl md:text-7xl font-black">We kijken het na.</h2>
    </div>
    <a href="<?php echo home_url('/contact/'); ?>"
       class="bg-primary-container text-white px-12 py-6 text-2xl font-bold rounded-lg drift-on-hover shadow-xl shadow-primary-container/20 inline-block md:rotate-1">
      Stuur een berichtje    </a>
    <p class="text-sm italic opacity-80 mt-6">Eerste gesprek, altijd vrijblijvend.</p>
  </div>
  <div class="absolute inset-0 -z-10 pointer-events-none">
    <svg class="w-full h-full opacity-10" viewBox="0 0 1000 500">
      <path d="M100,400 C300,100 700,500 900,100" fill="none" stroke="black" stroke-width="4"/>
      <path d="M50,100 Q450,450 950,50" fill="none" opacity="0.5" stroke="#078930" stroke-width="8"/>
    </svg>
  </div>
</section>


<!-- BLOK: faq - veelgestelde vragen over SEO in Groningen -->
<section class="py-16 md:py-[100px]">
  <div class="max-w-3xl">
    <h2 class="text-3xl font-black mb-10">Veelgestelde vragen over SEO</h2>
    <div>
      <details style="border-bottom:1px solid #e5e7eb;padding-bottom:20px;margin-bottom:20px">
        <summary class="font-black text-lg" style="cursor:pointer">Hoe lang duurt het voordat SEO werkt?</summary>
        <p class="text-base leading-relaxed opacity-80" style="padding-top:14px">Gemiddeld duurt het 3 tot 6 maanden voordat je merkbare resultaten ziet in Google. Lokale SEO in Groningen gaat doorgaans sneller dan landelijke campagnes omdat de concurrentie beperkter is. We zorgen vanaf dag één dat Google de juiste signalen krijgt: een geoptimaliseerde pagina, correcte bedrijfsgegevens en reviews die binnenkomen. Resultaten zie je gradueel, niet ineens. Wie vroeg begint, heeft later de voorsprong.</p>
      </details>
      <details style="border-bottom:1px solid #e5e7eb;padding-bottom:20px;margin-bottom:20px">
        <summary class="font-black text-lg" style="cursor:pointer">Wat kost SEO voor een lokaal bedrijf?</summary>
        <p class="text-base leading-relaxed opacity-80" style="padding-top:14px">Dat hangt af van je situatie. We werken zonder vaste pakketten, omdat elk bedrijf anders is. Een startende ondernemer die lokaal gevonden wil worden heeft andere behoeften dan een gevestigd bedrijf dat zijn positie wil verdedigen. We beginnen altijd met een gratis website-analyse. Daarna maken we samen een plan dat past bij je wensen en je budget. Eerlijk, geen verrassingen achteraf.</p>
      </details>
      <details style="border-bottom:1px solid #e5e7eb;padding-bottom:20px;margin-bottom:20px">
        <summary class="font-black text-lg" style="cursor:pointer">Wat is het verschil tussen SEO en Google Ads?</summary>
        <p class="text-base leading-relaxed opacity-80" style="padding-top:14px">SEO zorgt dat je organisch gevonden wordt in Google, zonder per klik te betalen. Dat kost tijd maar bouwt een duurzame positie op. Google Ads geeft je direct zichtbaarheid bovenaan Google maar stopt zodra je stopt met betalen. De twee vullen elkaar goed aan: Ads voor direct resultaat, SEO voor de lange termijn.</p>
      </details>
      <details>
        <summary class="font-black text-lg" style="cursor:pointer">Welke factoren bepalen mijn positie in Google?</summary>
        <p class="text-base leading-relaxed opacity-80" style="padding-top:14px">Voor lokale bedrijven in Groningen wegen een paar factoren het zwaarst. Je Google Mijn Bedrijf-profiel is cruciaal: completeer het volledig met openingstijden, foto's en een beschrijving. Volgens onderzoek van Moz (2023) is Google Mijn Bedrijf-optimalisatie de zwaarste factor voor lokale zoekresultaten. Reviews tellen ook zwaar mee: BrightLocal (2024) toonde aan dat 98% van de consumenten reviews leest bij lokale bedrijven. En verder: de relevantie en laadsnelheid van je website.</p>
      </details>
    </div>
  </div>
</section>
<script type="application/ld+json">{"@context":"https://schema.org","@type":"FAQPage","mainEntity":[{"@type":"Question","name":"Hoe lang duurt het voordat SEO werkt?","acceptedAnswer":{"@type":"Answer","text":"Gemiddeld duurt het 3 tot 6 maanden voordat je merkbare resultaten ziet in Google. Lokale SEO in Groningen gaat doorgaans sneller dan landelijke campagnes omdat de concurrentie beperkter is."}},{"@type":"Question","name":"Wat kost SEO voor een lokaal bedrijf?","acceptedAnswer":{"@type":"Answer","text":"We werken zonder vaste pakketten. We beginnen altijd met een gratis website-analyse en maken daarna een plan dat past bij je wensen en budget."}},{"@type":"Question","name":"Wat is het verschil tussen SEO en Google Ads?","acceptedAnswer":{"@type":"Answer","text":"SEO zorgt dat je organisch gevonden wordt in Google, zonder per klik te betalen. Google Ads geeft direct zichtbaarheid maar stopt zodra je stopt met betalen. De twee vullen elkaar goed aan."}},{"@type":"Question","name":"Welke factoren bepalen mijn positie in Google?","acceptedAnswer":{"@type":"Answer","text":"Voor lokale bedrijven in Groningen wegen Google Mijn Bedrijf-optimalisatie en reviews het zwaarst. Volgens Moz (2023) is Google Mijn Bedrijf de zwaarste lokale rankingfactor. BrightLocal (2024) toonde aan dat 98% van consumenten reviews leest bij lokale bedrijven."}}]}</script>

<!-- BLOK: blogs-recent - 3 meest recente posts; verborgen als er geen zijn -->
<?php
$dgm_posts = get_posts(['post_type'=>'post','post_status'=>'publish','posts_per_page'=>3,'orderby'=>'date','order'=>'DESC']);
if (!empty($dgm_posts)) :
?>
<style>.seo-blog-duo{display:grid;grid-template-columns:1fr 1fr;gap:24px}@media(max-width:767px){.seo-blog-duo{grid-template-columns:1fr}}</style>
<section class="py-16 md:py-[100px]">
  <div class="flex items-end justify-between gap-8 flex-wrap" style="margin-bottom:50px">
    <div>
      <p class="text-sm font-bold uppercase tracking-widest text-primary-container mb-3">Proatjes.</p>
      <h2 class="text-3xl font-black">Blogs. Zelf geschreven.</h2>
      <div style="width:40px;height:3px;background:#078930;margin-top:10px;transform:rotate(-1.5deg)"></div>
    </div>
    <a href="<?php echo home_url('/blog/'); ?>" class="hidden md:block text-base font-bold text-primary-container border-b-2 border-primary-container pb-0.5 shrink-0">Alle blogs &rarr;</a>
  </div>
  <?php
  $dgm_items = [];
  foreach ($dgm_posts as $dgm_post) {
    $dgm_items[] = [
      'thumb_lg' => get_the_post_thumbnail_url($dgm_post, 'large') ?: ($up . 'voorgroningers-768x768.png'),
      'thumb'    => get_the_post_thumbnail_url($dgm_post, 'medium_large') ?: ($up . 'voorgroningers-768x768.png'),
      'title'    => esc_html(get_the_title($dgm_post)),
      'excerpt'  => get_the_excerpt($dgm_post),
      'link'     => esc_url(get_permalink($dgm_post)),
    ];
  }
  if (!empty($dgm_items[0])) : $p = $dgm_items[0]; ?>
  <article style="background:white;border-radius:12px;overflow:hidden;border-top:4px solid #078930;border-right:1px solid #e5e7eb;border-bottom:1px solid #e5e7eb;border-left:1px solid #e5e7eb;margin-bottom:24px">
    <a href="<?php echo $p['link']; ?>" class="group block">
      <img src="<?php echo esc_url($p['thumb_lg']); ?>" alt="<?php echo $p['title']; ?>" class="w-full" width="1024" height="748" loading="lazy"/>
      <div style="padding:32px 36px">
        <h3 class="font-black group-hover:text-primary-container transition-colors" style="font-size:28px;line-height:1.15;margin-bottom:14px"><?php echo $p['title']; ?></h3>
        <p class="text-base leading-relaxed opacity-70"><?php echo $p['excerpt']; ?></p>
      </div>
    </a>
  </article>
  <?php endif; ?>
  <?php if (!empty($dgm_items[1]) || !empty($dgm_items[2])) : ?>
  <div class="seo-blog-duo">
    <?php if (!empty($dgm_items[1])) : $p = $dgm_items[1]; ?>
    <article style="background:white;border-radius:12px;overflow:hidden;border:1px solid #e5e7eb">
      <a href="<?php echo $p['link']; ?>" class="group block">
        <img src="<?php echo esc_url($p['thumb']); ?>" alt="<?php echo $p['title']; ?>" class="w-full" width="768" height="560" loading="lazy"/>
        <div class="p-5">
          <h3 class="font-black leading-tight mb-2 group-hover:text-primary-container transition-colors" style="font-size:18px;line-height:1.2"><?php echo $p['title']; ?></h3>
          <p class="text-sm leading-relaxed opacity-70"><?php echo $p['excerpt']; ?></p>
        </div>
      </a>
    </article>
    <?php endif; ?>
    <?php if (!empty($dgm_items[2])) : $p = $dgm_items[2]; ?>
    <article style="background:#f9fafb;border-radius:12px;overflow:hidden;border:1px solid #e5e7eb">
      <a href="<?php echo $p['link']; ?>" class="group block">
        <img src="<?php echo esc_url($p['thumb']); ?>" alt="<?php echo $p['title']; ?>" class="w-full" width="768" height="560" loading="lazy"/>
        <div class="p-5">
          <h3 class="font-black leading-tight mb-2 group-hover:text-primary-container transition-colors" style="font-size:18px;line-height:1.2"><?php echo $p['title']; ?></h3>
          <p class="text-sm leading-relaxed opacity-70"><?php echo $p['excerpt']; ?></p>
        </div>
      </a>
    </article>
    <?php endif; ?>
  </div>
  <?php endif; ?>
</section>
<?php endif; ?>

</main>
<?php get_footer(); ?>
