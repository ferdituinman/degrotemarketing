<?php
/*
 * Template Name: Contentmarketing Groningen
 */
get_header();
$up  = content_url('uploads/2026/05/');
$pid = get_the_ID();
$_s1 = (int) get_post_meta($pid, '_dgm_section_img_1', true);
$_s2 = (int) get_post_meta($pid, '_dgm_section_img_2', true);
$_s3 = (int) get_post_meta($pid, '_dgm_section_img_3', true);
$cm_img1 = $_s1 ? wp_get_attachment_image_url($_s1, 'large') : $up . 'als-marketing-voelt-als-werk.png';
$cm_img2 = $_s2 ? wp_get_attachment_image_url($_s2, 'large') : $up . 'bijna-vierkant.png';
$cm_img3 = $_s3 ? wp_get_attachment_image_url($_s3, 'large') : $up . 'voorgroningers.png';
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
}
</style>

<!-- BLOK: hero-mobiel - achtergrondafbeelding zichtbaar op telefoon, verborgen op desktop -->
<img src="<?php echo esc_url($_hero_mob['url']); ?>"
     alt="" class="w-full block md:hidden" style="width:100%;max-width:100%;"
     fetchpriority="high" width="<?php echo (int)$_hero_mob['width']; ?>" height="<?php echo (int)$_hero_mob['height']; ?>" sizes="100vw"/>

<!-- BLOK: hero - intro "Gewoon doen." met service-specifieke CTA-knop -->
<div id="herov2" class="w-full">
<section class="pb-20 md:flex md:items-center max-w-screen-xl mx-auto px-10 md:px-12">
<div class="relative z-10 bg-white/[0.98] pt-5 pr-10 pb-10 pl-10 md:p-8 rounded-lg max-w-2xl fade-in-up w-full md:w-auto">
  <h1 class="text-sm font-semibold uppercase tracking-widest text-primary-container mb-3"><?php the_title(); ?></h1>
  <p class="text-[56px] md:text-[5rem] font-bold text-primary-container mb-6 italic leading-[0.77] md:leading-normal">Jij weet het. Wij schrijven het.</p>
  <div class="space-y-4 text-lg md:text-xl leading-relaxed">
    <p>Jij weet wat je doet. Maar hoe vertel je iets op Facebook op een manier die mensen aanspreekt?</p>
    <p>Wij helpen je om jouw verhaal te vertellen. Niet met mooipraterij. Gewoon eerlijk en herkenbaar.</p>
  </div>
  <div class="mt-12">
    <a href="<?php echo home_url('/contact/'); ?>" class="bg-primary-container text-white px-10 py-4 text-xl font-bold rounded shadow-none drift-on-hover inline-block">
      Mail ons eens wat je doet    </a>
  </div>
</div>
</section>
</div>

<main class="max-w-screen-xl mx-auto px-10 md:px-12">

<!-- BLOK: s1 - eerste inhoudssectie: eyebrow + H2 + paragrafen + foto links (12-kol grid) -->
<section class="py-16 md:py-[100px] grid grid-cols-1 md:grid-cols-12 gap-12 items-center">
  <div class="md:col-start-2 md:col-span-5 space-y-6">
    <h2 class="text-4xl font-black mb-8">ALS MARKETING VOELT ALS WERK</h2>
    <p class="text-lg md:text-xl leading-relaxed">Je hebt al geprobeerd iets te schrijven voor je website. Het voelde als een schooltaak. Dat is het probleem.</p>
    <p class="text-lg md:text-xl leading-relaxed">Teksten die aanvoelen als werk, voelen ook zo voor de lezer. Mensen haken af. Ze klikken weg. Niet omdat ze niet geinteresseerd zijn, maar omdat de tekst ze niet aanspreekt.</p>
    <p class="text-lg md:text-xl leading-relaxed">Wij schrijven zoals jij praat. En dat werkt.</p>
    <div class="h-1 w-24 bg-primary-container"></div>
  </div>
  <div class="md:col-span-5 relative" style="transform:translateY(16px)">
    <div class="bg-[#078930]/5 absolute inset-0 rotate-1 translate-x-3 -translate-y-4 rounded-xl -z-10 scale-90"></div>
    <img class="w-full object-cover rounded scale-90"
         src="<?php echo esc_url($cm_img1); ?>"
         sizes="(min-width: 768px) 42vw, 100vw"
         alt="Content marketing die wel werkt" width="768" height="768" loading="lazy"/>
  </div>
</section>

<!-- BLOK: s2 - tweede sectie 55/45: tekst links + foto rechts -->
<section class="py-16 md:pt-[80px] md:pb-[130px] sect5545 grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
  <div class="space-y-6 order-2">
    <h2 class="text-4xl font-black mb-8">Jouw verhaal is sterker dan alles wat wij kunnen bedenken.</h2>
    <p class="text-lg md:text-xl leading-relaxed">Je hebt bestaande klanten die blij zijn. Concrete resultaten die je geleverd hebt. Dingen die echt zijn.</p>
    <p class="text-lg md:text-xl leading-relaxed">Een goed idee voelt te simpel omdat je er zelf al jaren middenin zit. Maar een buitenstaander ziet het meteen.</p>
    <p class="text-lg md:text-xl leading-relaxed">Dat is precies wat wij doen. Wij kijken naar buiten. Wij zien wat jij al hebt. En wij schrijven dat op een manier die mensen herkennen.</p>
    <div class="h-1 w-36 bg-primary-container -rotate-1 translate-x-2"></div>
  </div>
  <div class="relative order-1" style="transform:translateY(32px)">
    <div class="bg-[#078930]/5 absolute inset-0 rotate-3 -translate-x-3 translate-y-3 rounded-xl -z-10 scale-90"></div>
    <img class="w-full object-cover rounded"
         src="<?php echo esc_url($cm_img2); ?>"
         sizes="(min-width: 768px) 42vw, 100vw"
         alt="Content marketing voor Groningse ondernemers" width="768" height="768" loading="lazy"/>
  </div>
</section>

<!-- BLOK: s3 - gecentreerd statement-blok met achtergrondtekst en "Gewoon doen." badge -->
<section class="py-16 md:py-[100px] relative overflow-hidden">
  <div class="absolute -left-20 top-0 text-[10rem] font-black text-black/5 select-none -z-10 rotate-12">TEKST</div>
  <div class="max-w-2xl mx-auto text-center space-y-8">
    <h2 class="text-4xl font-black">TEKST DIE KLINKT ALS JIJ</h2>
    <p class="text-xl leading-relaxed">Hoe herkenbaarder de tekst, hoe langer mensen lezen. Hoe langer mensen lezen, hoe eerder ze iets doen. Hoe eerder ze iets doen, hoe sneller je resultaat hebt.</p>
    <p class="text-xl leading-relaxed">Groningse tekst snijdt ergens doorheen. Direct. Eerlijk. Zonder gedoe. Geen vijf alinea's voor het antwoord. Geen wollige taal om het groter te laten lijken dan het is.</p>
    <div class="inline-block px-4 py-2 border-2 border-primary-container rounded-full -rotate-3 translate-x-3">
      <p class="text-lg font-bold">Gewoon doen.</p>
    </div>
  </div>
</section>

<!-- BLOK: s4 - statement 55/45: tekst rechts + stappenkaart links + inline CTA-knop -->
<section class="py-16 md:py-[100px] sect5545 grid grid-cols-1 md:grid-cols-2 gap-16 items-center">
  <div class="space-y-8 text-xl leading-relaxed order-1 md:order-2">
    <h2 class="text-4xl font-black leading-tight mb-4">Content die werkt.<br/>Niet schrijven om het schrijven.</h2>
    <p class="text-xl leading-relaxed">We schrijven teksten die gevonden worden in Google. En teksten die mensen ook echt lezen als ze er eenmaal zijn.</p>
    <p class="text-xl leading-relaxed">Dat is niet hetzelfde. De meeste websites doen maar een van de twee. Wij doen allebei.</p>
    <a href="<?php echo home_url('/contact/'); ?>" class="bg-primary-container text-white px-8 py-3 text-lg font-bold rounded drift-on-hover inline-block">
      Kop d'r veur.    </a>
  </div>
  <div class="order-2 md:order-1">
    <div class="p-8 bg-surface-container-low border border-black/5 rounded-lg shadow-sm" style="transform: rotate(-1deg)">
      <div class="flex gap-4 items-start mt-2">
        <span class="text-primary-container font-black text-xl w-8 shrink-0">01</span>
        <p class="text-lg leading-relaxed">Websiteteksten die gevonden worden en mensen overtuigen</p>
      </div>
      <div class="flex gap-4 items-start mt-4">
        <span class="text-primary-container font-black text-xl w-8 shrink-0">02</span>
        <p class="text-lg leading-relaxed">Blogs die mensen verder helpen en jou als expert neerzetten</p>
      </div>
      <div class="flex gap-4 items-start mt-4">
        <span class="text-primary-container font-black text-xl w-8 shrink-0">03</span>
        <p class="text-lg leading-relaxed">Social media teksten die klinken als jij, niet als een bureau</p>
      </div>
      <div class="flex gap-4 items-start mt-4">
        <span class="text-primary-container font-black text-xl w-8 shrink-0">04</span>
        <p class="text-lg leading-relaxed">Gewoon teksten die mensen echt lezen</p>
      </div>
    </div>
  </div>
</section>

<!-- BLOK: s5 - foto links + tekst rechts; lokaal argument (Voor Groningers, door Groningers) -->
<section class="py-16 md:py-[100px] sect5545 grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
  <div class="relative">
    <div class="bg-[#078930]/5 absolute inset-0 -rotate-1 -translate-x-4 translate-y-4 rounded-xl -z-10 scale-110"></div>
    <img class="w-full object-cover rounded scale-90"
         src="<?php echo esc_url($cm_img3); ?>"
         sizes="(min-width: 768px) 42vw, 100vw"
         alt="Content marketing voor Groningse ondernemers" width="1536" height="1536" loading="lazy"/>
  </div>
  <div class="space-y-6">
    <h2 class="text-4xl font-black mb-8">Voor Groningers, door Groningers.</h2>
    <p class="text-lg md:text-xl leading-relaxed">We kennen de stad. We kennen de mensen. We weten hoe Stadjers communiceren.</p>
    <p class="text-lg md:text-xl leading-relaxed">Dat is niet niks. Een bureau uit Rotterdam schrijft anders dan wij. Niet beter of slechter. Maar minder herkenbaar voor jouw klant om de hoek.</p>
    <div class="h-1 w-24 bg-primary-container"></div>
  </div>
</section>

<!-- BLOK: contact-cta - grote afsluitende uitnodiging met e-mailknop -->
<section id="contact" class="py-16 md:py-[100px] text-center relative overflow-hidden">
  <div class="relative z-10 space-y-12">
    <div class="space-y-4">
      <p class="text-2xl md:text-3xl font-bold opacity-60">Stuur ons een zin over wat je doet.</p>
      <h2 class="text-5xl md:text-7xl font-black">We schrijven terug.</h2>
    </div>
    <a href="<?php echo home_url('/contact/'); ?>"
       class="bg-primary-container text-white px-12 py-6 text-2xl font-bold rounded-lg drift-on-hover shadow-xl shadow-primary-container/20 inline-block md:rotate-1">
      Nodig ons uit    </a>
    <p class="text-sm italic opacity-80 mt-6">Eerste gesprek, altijd vrijblijvend.</p>
  </div>
  <div class="absolute inset-0 -z-10 pointer-events-none">
    <svg class="w-full h-full opacity-10" viewBox="0 0 1000 500">
      <path d="M100,400 C300,100 700,500 900,100" fill="none" stroke="black" stroke-width="4"/>
      <path d="M50,100 Q450,450 950,50" fill="none" opacity="0.5" stroke="#078930" stroke-width="8"/>
    </svg>
  </div>
</section>


<!-- BLOK: faq - veelgestelde vragen over contentmarketing -->
<section class="py-16 md:py-[100px]">
  <div class="max-w-3xl mx-auto">
    <h2 class="text-3xl font-black mb-10">Veelgestelde vragen over contentmarketing</h2>
    <div>
      <details style="border-bottom:1px solid #e5e7eb;padding-bottom:20px;margin-bottom:20px">
        <summary class="font-black text-lg" style="cursor:pointer">Wat is contentmarketing?</summary>
        <p class="text-lg leading-relaxed opacity-80" style="padding-top:14px">Contentmarketing is het structureel publiceren van waardevolle inhoud - zoals blogs, teksten en social-mediaberichten - om mensen te informeren, te overtuigen en uiteindelijk klant te maken. In plaats van reclame te maken, help je mensen met antwoorden op hun vragen. Wie de beste antwoorden geeft, wordt als expert gezien. En experts krijgen klanten. Contentmarketing werkt het best in combinatie met SEO: content die gevonden wordt in Google trekt bezoekers die al geïnteresseerd zijn in wat jij doet.</p>
      </details>
      <details style="border-bottom:1px solid #e5e7eb;padding-bottom:20px;margin-bottom:20px">
        <summary class="font-black text-lg" style="cursor:pointer">Hoe vaak moet je nieuwe content publiceren?</summary>
        <p class="text-lg leading-relaxed opacity-80" style="padding-top:14px">Kwaliteit gaat boven kwantiteit. Een blog per maand die mensen echt verder helpt, doet meer voor je zichtbaarheid dan vier dunne artikelen per week. Volgens onderzoek van HubSpot (2023) zien bedrijven die meer dan 11 blogs per maand publiceren vier keer zoveel verkeer als bedrijven die minder dan één blog per maand publiceren. Voor de meeste Groningse ondernemers is consistentie het belangrijkst: liever elke twee weken iets goeds dan elke dag iets halfslachtigs.</p>
      </details>
      <details style="border-bottom:1px solid #e5e7eb;padding-bottom:20px;margin-bottom:20px">
        <summary class="font-black text-lg" style="cursor:pointer">Hoe helpt contentmarketing mijn positie in Google?</summary>
        <p class="text-lg leading-relaxed opacity-80" style="padding-top:14px">Google waardeert websites die regelmatig relevante, inhoudelijke content publiceren. Elke nieuwe blogpost is een extra kans om gevonden te worden op specifieke zoekwoorden. Langere en gedetailleerdere content rankt doorgaans beter: de gemiddelde pagina op positie 1 in Google heeft ruim 1.400 woorden (SEMrush, 2023). Contentmarketing versterkt ook je autoriteit: wie consistent schrijft over een onderwerp wordt als expert herkend en krijgt betere posities voor gerelateerde zoekopdrachten.</p>
      </details>
      <details>
        <summary class="font-black text-lg" style="cursor:pointer">Wat kost contentmarketing?</summary>
        <p class="text-lg leading-relaxed opacity-80" style="padding-top:14px">Contentmarketing is een van de meest kostenefficiënte vormen van marketing op de lange termijn. Content die eenmaal goed scoort in Google blijft bezoekers trekken zonder dat je er verder in investeert. We werken zonder vaste abonnementen. Sommige klanten vragen ons om één blog per maand te schrijven, anderen willen een volledige contentstrategie. We bespreken vooraf wat je nodig hebt en wat dat kost. Geen verrassingen.</p>
      </details>
    </div>
  </div>
</section>
<script type="application/ld+json">{"@context":"https://schema.org","@type":"FAQPage","mainEntity":[{"@type":"Question","name":"Wat is contentmarketing?","acceptedAnswer":{"@type":"Answer","text":"Contentmarketing is het structureel publiceren van waardevolle inhoud om mensen te informeren, overtuigen en klant te maken. In plaats van reclame maak je, help je mensen met antwoorden op hun vragen."}},{"@type":"Question","name":"Hoe vaak moet je nieuwe content publiceren?","acceptedAnswer":{"@type":"Answer","text":"Kwaliteit gaat boven kwantiteit. Volgens HubSpot (2023) zien bedrijven die meer dan 11 blogs per maand publiceren vier keer zoveel verkeer. Voor de meeste ondernemers is consistentie het belangrijkst."}},{"@type":"Question","name":"Hoe helpt contentmarketing mijn positie in Google?","acceptedAnswer":{"@type":"Answer","text":"Google waardeert regelmatig gepubliceerde relevante content. De gemiddelde pagina op positie 1 in Google heeft ruim 1.400 woorden (SEMrush, 2023). Elke blogpost is een extra kans om gevonden te worden."}},{"@type":"Question","name":"Wat kost contentmarketing?","acceptedAnswer":{"@type":"Answer","text":"We werken zonder vaste abonnementen. Sommige klanten vragen om één blog per maand, anderen willen een volledige contentstrategie. We bespreken vooraf wat je nodig hebt en wat dat kost."}}]}</script>

<!-- BLOK: blogs-recent - 3 meest recente posts; verborgen als er geen zijn -->
<?php
$dgm_posts = get_posts(['post_type'=>'post','post_status'=>'publish','posts_per_page'=>3,'orderby'=>'date','order'=>'DESC']);
if (!empty($dgm_posts)) :
?>
<section class="py-16 md:py-[100px]">
  <div class="flex items-end justify-between gap-8 flex-wrap" style="margin-bottom:50px">
    <div>
      <p class="text-sm font-bold uppercase tracking-widest text-primary-container mb-3">Leesvoer.</p>
      <h2 class="text-3xl font-black">Blogs. Zelf geschreven.</h2>
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
  <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
    <?php foreach ($dgm_items as $dgm_i => $p) : ?>
    <?php if ($dgm_i === 0) : ?>
    <article style="background:#078930;border-radius:12px;overflow:hidden">
      <a href="<?php echo $p['link']; ?>" class="group block">
        <img src="<?php echo esc_url($p['thumb']); ?>" alt="<?php echo $p['title']; ?>" class="w-full" style="opacity:0.8" width="512" height="512" loading="lazy"/>
        <div style="padding:24px">
          <h3 class="font-black leading-tight mb-3 transition-colors" style="font-size:20px;line-height:1.2;color:white"><?php echo $p['title']; ?></h3>
          <p class="text-base leading-relaxed" style="color:rgba(255,255,255,0.8)"><?php echo $p['excerpt']; ?></p>
        </div>
      </a>
    </article>
    <?php else : ?>
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
    <?php endforeach; ?>
  </div>
</section>
<?php endif; ?>

</main>
<?php get_footer(); ?>
