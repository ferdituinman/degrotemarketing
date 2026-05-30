<?php
/*
 * Template Name: Website Groningen
 */
get_header();
$up  = content_url('uploads/2026/05/');
$pid = get_the_ID();
$_s1 = (int) get_post_meta($pid, '_dgm_section_img_1', true);
$_s2 = (int) get_post_meta($pid, '_dgm_section_img_2', true);
$_s3 = (int) get_post_meta($pid, '_dgm_section_img_3', true);
$web_img1 = $_s1 ? wp_get_attachment_image_url($_s1, 'large') : $up . 'nieuwe-website.png';
$web_img2 = $_s2 ? wp_get_attachment_image_url($_s2, 'large') : $up . 'geen-dure-website.png';
$web_img3 = $_s3 ? wp_get_attachment_image_url($_s3, 'large') : $up . 'simone.png';
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
  <h1 class="text-sm font-semibold uppercase tracking-widest text-primary-container mb-3">Website laten maken</h1>
  <p class="text-[70px] md:text-[5rem] font-bold text-primary-container mb-6 italic leading-[0.96] md:leading-normal">Gewoon doen.</p>
  <div class="space-y-4 text-lg md:text-xl leading-relaxed">
    <p>Geen jaar wachten. Niet onnodig duur. Een website die doet wat hij moet doen.</p>
    <p>Wij bouwen websites voor Groningse ondernemers. Snel te vinden, makkelijk te begrijpen, klaar voor klanten.</p>
  </div>
  <div class="mt-12">
    <a href="mailto:ferdi@degrotemarketing.nl" class="bg-primary-container text-white px-10 py-4 text-xl font-bold rounded shadow-none drift-on-hover inline-block">
      Daag ons uit. Graag.<span class="sr-only"> (opent e-mailprogramma)</span>
    </a>
  </div>
</div>
</section>
</div>

<main class="max-w-screen-xl mx-auto px-10 md:px-12">

<!-- BLOK: s1 - eerste inhoudssectie: eyebrow + H2 + paragrafen + foto links (12-kol grid) -->
<section class="py-16 md:py-[100px] grid grid-cols-1 md:grid-cols-12 gap-12 items-center">
  <div class="md:col-span-5 space-y-6 order-1 md:order-2">
    <p class="text-sm font-semibold uppercase tracking-widest text-primary-container mb-3">Website laten maken Groningen</p>
    <h2 class="text-4xl font-black mb-8">EEN WEBSITE DIE WERKT</h2>
    <p class="text-lg md:text-xl leading-relaxed">De meeste websites zijn digitale brochures. Ze zien er mooi uit, maar ze doen niets. Niemand leest ze. Niemand belt.</p>
    <p class="text-lg md:text-xl leading-relaxed">Wij bouwen websites die werken. Die klanten aanspreken. Die snel laden. Die gevonden worden in Google. En die mensen overtuigen om contact op te nemen.</p>
    <p class="text-lg md:text-xl leading-relaxed">Niet de duurste. Wel de beste.</p>
    <div class="h-1 w-24 bg-primary-container"></div>
  </div>
  <div class="md:col-start-2 md:col-span-5 relative order-2 md:order-1">
    <div class="bg-[#078930]/5 absolute inset-0 rotate-2 translate-x-3 translate-y-6 rounded-xl -z-10 scale-90"></div>
    <img class="w-full object-cover rounded scale-90" style="transform:rotate(2deg)"
         src="<?php echo esc_url($web_img1); ?>"
         sizes="(min-width: 768px) 42vw, 100vw"
         alt="Nieuwe website laten maken in Groningen" width="1024" height="768" loading="lazy"/>
  </div>
</section>

<!-- BLOK: s2 - tweede sectie 55/45: tekst links + foto rechts -->
<section class="py-16 md:pt-[80px] md:pb-[130px] sect5545 grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
  <div class="space-y-6">
    <h2 class="text-4xl font-black mb-8">Geen dure website nodig. Echt niet.</h2>
    <p class="text-lg md:text-xl leading-relaxed">Je hebt geen website van tienduizend euro nodig. Zo'n bedrag is prima te doen voor de Primark. Maar jij bent de Primark niet.</p>
    <p class="text-lg md:text-xl leading-relaxed">De meeste Groningse ondernemers hebben een website nodig die snel laadt, makkelijk te vinden is en goed vertelt wat je doet. Punt.</p>
    <p class="text-lg md:text-xl leading-relaxed">Hoe simpeler de uitleg, hoe meer mensen je bellen. Hoe meer mensen je bellen, hoe minder je hoeft te adverteren. Hoe minder je adverteert, hoe meer je overhoudt.</p>
    <div class="h-1 w-36 bg-primary-container -rotate-1 translate-x-2"></div>
  </div>
  <div class="relative">
    <div class="bg-[#078930]/5 absolute inset-0 -rotate-2 -translate-x-3 translate-y-5 rounded-xl -z-10 scale-110"></div>
    <img class="w-full object-cover rounded"
         src="<?php echo esc_url($web_img2); ?>"
         sizes="(min-width: 768px) 42vw, 100vw"
         alt="Betaalbare website Groningen" width="1024" height="683" loading="lazy"/>
  </div>
</section>

<!-- BLOK: s3 - tekst links + stappenkaart rechts (01-04 genummerde stappen) -->
<section class="py-16 md:py-[100px] border-none">
  <div class="max-w-4xl mx-auto flex flex-col md:flex-row items-start gap-12 md:gap-24">
    <div class="flex-1 space-y-8 md:translate-y-6">
      <h2 class="text-4xl font-black italic">VAN IDEE NAAR LIVE</h2>
      <p class="text-xl leading-relaxed">We gaan niet overleggen over overleggen. We achterhalen wat je nodig hebt. We bouwen het. En we zorgen dat Google je vindt.</p>
      <p class="text-xl leading-relaxed">In korte sprints naar resultaat. Geen halfjaarsproject. Gewoon een website die klaarstaat als jij dat wil.</p>
      <p class="font-bold text-primary-container">Kloar.</p>
    </div>
    <div class="w-full kaartje-45">
      <div class="p-8 bg-surface-container-low border border-black/5 rounded-lg shadow-sm" style="transform: rotate(2deg)">
        <div class="flex gap-4 items-start mt-2">
          <span class="text-primary-container font-black text-xl w-8 shrink-0">01</span>
          <p class="text-lg leading-relaxed">We praten af wat je nodig hebt. Niet meer, niet minder.</p>
        </div>
        <div class="flex gap-4 items-start mt-4">
          <span class="text-primary-container font-black text-xl w-8 shrink-0">02</span>
          <p class="text-lg leading-relaxed">We schrijven teksten die gevonden worden en mensen overtuigen</p>
        </div>
        <div class="flex gap-4 items-start mt-4">
          <span class="text-primary-container font-black text-xl w-8 shrink-0">03</span>
          <p class="text-lg leading-relaxed">We bouwen snel, testen goed en zetten live als het klopt</p>
        </div>
        <div class="flex gap-4 items-start mt-4">
          <span class="text-primary-container font-black text-xl w-8 shrink-0">04</span>
          <p class="text-lg leading-relaxed">We houden het bij. Als er iets moet, kom je bij ons.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- BLOK: s4 - foto-split: gekleurde tekst + foto naast elkaar; doorlopende samenwerking -->
<section class="py-16 md:py-[100px]">
  <div class="grid grid-cols-1 md:grid-cols-2 gap-0 items-stretch md:gap-0">
    <div class="bg-surface-container-low p-6 md:p-12 flex flex-col justify-center md:rounded-l rounded relative overflow-hidden order-1 md:order-2">
      <span class="absolute -top-8 -right-4 text-[10rem] font-black text-black/5 select-none leading-none">Web</span>
      <h2 class="text-4xl font-black mb-6 relative z-10">JOUW VERHAAL IS BELANGRIJKER DAN DE TECHNIEK.</h2>
      <div class="space-y-4 relative z-10">
        <p class="text-xl leading-relaxed">Techniek is een trucje. HTML? Dat kun je een aap nog leren. Bij ons is de techniek gewoon een manier om te doen wat we moeten doen. Jouw verhaal vertellen.</p>
        <p class="text-xl leading-relaxed">Daarom draait een nieuwe site niet om abracadabra en onzichtbare code. Die doen we wel, maar dat is niet de kern. De kern is wat jij doet en wat je klant daaraan heeft.</p>
        <p class="text-xl font-bold text-primary-container">Geen bullshit. We doen wat werkt.</p>
      </div>
    </div>
    <img src="<?php echo esc_url($web_img3); ?>"
         sizes="(min-width: 768px) 50vw, 100vw"
         alt="Webdesign Groningen - De Grote Marketing"
         class="w-full h-full object-cover md:rounded-r rounded min-h-[400px] order-2 md:order-1 scale-90 md:-translate-x-3"
         width="1275" height="1536" loading="lazy"/>
  </div>
</section>

<!-- BLOK: s5 - quote-blok met groene border links; lokaal argument -->
<section class="py-16 md:py-[100px] text-left">
  <div class="max-w-2xl border-l-4 border-primary-container pl-6 md:pl-12 py-8 ml-0 md:ml-14">
    <h2 class="text-4xl font-black mb-8">Gronings webdesign. Geen pak.</h2>
    <div class="space-y-6 text-xl leading-relaxed opacity-90">
      <p>We komen gewoon bij je langs. We praten met je over je klanten. We kijken naar wat je nu hebt. En dan bouwen we iets beters.</p>
      <p>Geen bureau uit Utrecht dat je website via een formulier afneemt. Gewoon iemand die weet hoe het voelt om als ondernemer in Groningen te werken.</p>
    </div>
  </div>
</section>

<!-- BLOK: contact-cta - grote afsluitende uitnodiging met e-mailknop -->
<section id="contact" class="py-16 md:py-[100px] text-center relative overflow-hidden">
  <div class="relative z-10 space-y-12">
    <div class="space-y-4">
      <p class="text-2xl md:text-3xl font-bold opacity-60">Morgen beginnen</p>
      <h2 class="text-5xl md:text-7xl font-black">We komen je zaak bekijken en sturen je een ontwerp</h2>
    </div>
    <a href="mailto:ferdi@degrotemarketing.nl"
       class="bg-primary-container text-white px-12 py-6 text-2xl font-bold rounded-lg drift-on-hover shadow-xl shadow-primary-container/20 inline-block md:rotate-1">
      Doe maar<span class="sr-only"> (opent e-mailprogramma)</span>
    </a>
    <p class="text-sm italic opacity-80 mt-6">Eerste gesprek, altijd vrijblijvend.</p>
  </div>
  <div class="absolute inset-0 -z-10 pointer-events-none">
    <svg class="w-full h-full opacity-10" viewBox="0 0 1000 500">
      <path d="M100,400 C300,100 700,500 900,100" fill="none" stroke="black" stroke-width="4"/>
      <path d="M50,100 Q450,450 950,50" fill="none" opacity="0.5" stroke="#078930" stroke-width="8"/>
    </svg>
  </div>
</section>


<!-- BLOK: faq - veelgestelde vragen over website laten maken -->
<section class="py-16 md:py-[100px]">
  <div class="max-w-2xl">
    <h2 class="text-3xl font-black mb-10">Veelgestelde vragen over een website laten maken</h2>
    <div>
      <details style="border-bottom:1px solid #e5e7eb;padding-bottom:20px;margin-bottom:20px">
        <summary class="font-black text-lg" style="cursor:pointer">Wat kost een website laten maken in Groningen?</summary>
        <p class="text-base leading-relaxed opacity-80" style="padding-top:14px">Een website laten maken kost afhankelijk van je wensen tussen de 1.000 en 10.000 euro. Een eenvoudige presentatiesite voor een zzp'er zit aan de onderkant. Een uitgebreide website met webshop en maatwerk functionaliteiten aan de bovenkant. Wij werken met WordPress, zodat jij na oplevering zelf content kunt toevoegen zonder technische kennis. We starten altijd met een gesprek over wat je echt nodig hebt, zodat je niet betaalt voor features die je nooit gebruikt.</p>
      </details>
      <details style="border-bottom:1px solid #e5e7eb;padding-bottom:20px;margin-bottom:20px">
        <summary class="font-black text-lg" style="cursor:pointer">Hoe lang duurt het bouwen van een website?</summary>
        <p class="text-base leading-relaxed opacity-80" style="padding-top:14px">Een standaard website bouwen we in twee tot vier weken. We beginnen met een intakegesprek om te begrijpen wat je wil bereiken. Daarna werken we in korte sprints: jij ziet snel een werkende versie waarop je kunt reageren. Zo hoef je niet te wachten totdat alles klaar is voor je feedback kunt geven. Voor complexere projecten met webshop of maatwerkfuncties plannen we langer in. We zijn eerlijk over de planning en houden ons eraan.</p>
      </details>
      <details style="border-bottom:1px solid #e5e7eb;padding-bottom:20px;margin-bottom:20px">
        <summary class="font-black text-lg" style="cursor:pointer">Moet mijn website mobielvriendelijk zijn?</summary>
        <p class="text-base leading-relaxed opacity-80" style="padding-top:14px">Ja, en dat is geen optie maar een vereiste. Meer dan 60% van het webverkeer in Nederland komt van smartphones (Statista, 2024). Google gebruikt mobiele laadsnelheid als rankingfactor. Een website die slecht werkt op telefoon verliest bezoekers en Google-posities. Alle websites die wij bouwen zijn standaard mobielvriendelijk, snel en goed te gebruiken op elk schermformaat.</p>
      </details>
      <details>
        <summary class="font-black text-lg" style="cursor:pointer">Kan ik mijn eigen website bijhouden na oplevering?</summary>
        <p class="text-base leading-relaxed opacity-80" style="padding-top:14px">Ja. Wij bouwen op WordPress, het meestgebruikte CMS ter wereld. Na oplevering kun je zelf pagina's aanpassen, blogs plaatsen en afbeeldingen wisselen zonder technische kennis. We geven altijd een korte instructie zodat je weet hoe het werkt. Wil je dat wij de website bijhouden? Dat kan ook. We spreken dan af wat er maandelijks nodig is en wat dat kost. Geen dure onderhoudscontracten, gewoon wat je nodig hebt.</p>
      </details>
    </div>
  </div>
</section>
<script type="application/ld+json">{"@context":"https://schema.org","@type":"FAQPage","mainEntity":[{"@type":"Question","name":"Wat kost een website laten maken in Groningen?","acceptedAnswer":{"@type":"Answer","text":"Een website laten maken kost afhankelijk van je wensen tussen de 1.000 en 10.000 euro. We werken met WordPress zodat je na oplevering zelf content kunt aanpassen zonder technische kennis."}},{"@type":"Question","name":"Hoe lang duurt het bouwen van een website?","acceptedAnswer":{"@type":"Answer","text":"Een standaard website bouwen we in twee tot vier weken. We werken in korte sprints zodat jij snel een werkende versie ziet."}},{"@type":"Question","name":"Moet mijn website mobielvriendelijk zijn?","acceptedAnswer":{"@type":"Answer","text":"Ja, dat is een vereiste. Meer dan 60% van het webverkeer in Nederland komt van smartphones (Statista, 2024). Google gebruikt mobiele laadsnelheid als rankingfactor."}},{"@type":"Question","name":"Kan ik mijn eigen website bijhouden na oplevering?","acceptedAnswer":{"@type":"Answer","text":"Ja. We bouwen op WordPress. Na oplevering kun je zelf pagina's aanpassen en blogs plaatsen zonder technische kennis. We geven altijd een korte instructie."}}]}</script>

<!-- BLOK: blogs-recent - 3 meest recente posts; verborgen als er geen zijn -->
<?php
$dgm_posts = get_posts(['post_type'=>'post','post_status'=>'publish','posts_per_page'=>3,'orderby'=>'date','order'=>'DESC']);
if (!empty($dgm_posts)) :
?>
<style>.web-blog-duo{display:grid;grid-template-columns:1fr 1fr;gap:24px;margin-bottom:24px}.web-hcard{display:flex}.web-hcard-img{width:40%;flex-shrink:0}@media(max-width:767px){.web-blog-duo{grid-template-columns:1fr}.web-hcard{flex-direction:column}.web-hcard-img{width:100%}}</style>
<section class="py-16 md:py-[100px]">
  <div class="flex items-end justify-between gap-8 flex-wrap" style="margin-bottom:50px">
    <div>
      <h2 class="text-4xl font-black">Blogs. Zelf geschreven.</h2>
    </div>
    <a href="<?php echo home_url('/blog/'); ?>" class="hidden md:block text-base font-bold text-primary-container border-b-2 border-primary-container pb-0.5 shrink-0">Alle blogs &rarr;</a>
  </div>
  <?php
  $dgm_items = [];
  foreach ($dgm_posts as $dgm_post) {
    $dgm_items[] = [
      'thumb'   => get_the_post_thumbnail_url($dgm_post, 'medium_large') ?: ($up . 'voorgroningers-768x768.png'),
      'title'   => esc_html(get_the_title($dgm_post)),
      'excerpt' => get_the_excerpt($dgm_post),
      'link'    => esc_url(get_permalink($dgm_post)),
    ];
  }
  ?>
  <?php if (!empty($dgm_items[0]) || !empty($dgm_items[1])) : ?>
  <div class="web-blog-duo">
    <?php if (!empty($dgm_items[0])) : $p = $dgm_items[0]; ?>
    <article style="background:white;border-radius:12px;overflow:hidden;border:1px solid #e5e7eb">
      <a href="<?php echo $p['link']; ?>" class="group block">
        <img src="<?php echo esc_url($p['thumb']); ?>" alt="<?php echo $p['title']; ?>" class="w-full" width="768" height="560" loading="lazy"/>
        <div class="p-6">
          <h3 class="font-black leading-tight mb-3 group-hover:text-primary-container transition-colors" style="font-size:20px;line-height:1.2"><?php echo $p['title']; ?></h3>
          <p class="text-base leading-relaxed opacity-70"><?php echo $p['excerpt']; ?></p>
        </div>
      </a>
    </article>
    <?php endif; ?>
    <?php if (!empty($dgm_items[1])) : $p = $dgm_items[1]; ?>
    <article style="background:white;border-radius:12px;overflow:hidden;border-left:3px solid #078930">
      <a href="<?php echo $p['link']; ?>" class="group block">
        <img src="<?php echo esc_url($p['thumb']); ?>" alt="<?php echo $p['title']; ?>" class="w-full" width="768" height="560" loading="lazy"/>
        <div class="p-6">
          <h3 class="font-black leading-tight mb-3 group-hover:text-primary-container transition-colors" style="font-size:20px;line-height:1.2"><?php echo $p['title']; ?></h3>
          <p class="text-base leading-relaxed opacity-70"><?php echo $p['excerpt']; ?></p>
        </div>
      </a>
    </article>
    <?php endif; ?>
  </div>
  <?php endif; ?>
  <?php if (!empty($dgm_items[2])) : $p = $dgm_items[2]; ?>
  <article style="background:#f9fafb;border-radius:12px;overflow:hidden;border:1px solid #e5e7eb">
    <a href="<?php echo $p['link']; ?>" class="group web-hcard">
      <div class="web-hcard-img">
        <img src="<?php echo esc_url($p['thumb']); ?>" alt="<?php echo $p['title']; ?>" style="width:100%;display:block" width="768" height="560" loading="lazy"/>
      </div>
      <div style="flex:1;padding:36px;display:flex;flex-direction:column;justify-content:center">
        <h3 class="font-black leading-tight mb-3 group-hover:text-primary-container transition-colors" style="font-size:22px;line-height:1.2"><?php echo $p['title']; ?></h3>
        <p class="text-base leading-relaxed opacity-70"><?php echo $p['excerpt']; ?></p>
      </div>
    </a>
  </article>
  <?php endif; ?>
</section>
<?php endif; ?>

</main>
<?php get_footer(); ?>
