<?php
/*
 * Template Name: Google Ads Groningen
 */
get_header();
$up  = content_url('uploads/2026/05/');
$pid = get_the_ID();
$_s1 = (int) get_post_meta($pid, '_dgm_section_img_1', true);
$_s2 = (int) get_post_meta($pid, '_dgm_section_img_2', true);
$_s3 = (int) get_post_meta($pid, '_dgm_section_img_3', true);
$ads_img1 = $_s1 ? wp_get_attachment_image_url($_s1, 'large') : $up . 'rapport-80-paginas.png';
$ads_img2 = $_s2 ? wp_get_attachment_image_url($_s2, 'large') : $up . 'sidney.png';
$ads_img3 = $_s3 ? wp_get_attachment_image_url($_s3, 'large') : $up . 'geen-leverancier.png';
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
  <h1 class="text-sm font-semibold uppercase tracking-widest text-primary-container mb-3"><?php the_title(); ?></h1>
  <p class="text-[70px] md:text-[5rem] font-bold text-primary-container mb-6 italic leading-[0.96] md:leading-normal">Gewoon doen.</p>
  <div class="space-y-4 text-lg md:text-xl leading-relaxed">
    <p>SEO kost tijd. Google Ads niet. Morgen bovenaan in Google. Vandaag nog beginnen.</p>
    <p>Je betaalt alleen als iemand klikt. En wij zorgen dat de juiste mensen klikken.</p>
  </div>
  <div class="mt-12">
    <a href="mailto:ferdi@degrotemarketing.nl" class="bg-primary-container text-white px-10 py-4 text-xl font-bold rounded shadow-none drift-on-hover inline-block">
      Vraag ons om een proefberekening<span class="sr-only"> (opent e-mailprogramma)</span>
    </a>
  </div>
</div>
</section>
</div>

<main class="max-w-screen-xl mx-auto px-10 md:px-12">

<!-- BLOK: s1 - eerste inhoudssectie: eyebrow + H2 + paragrafen + foto links (12-kol grid) -->
<section class="py-16 md:py-[100px] grid grid-cols-1 md:grid-cols-12 gap-12 items-center">
  <div class="md:col-span-5 space-y-6 order-1 md:order-2">
    <p class="text-sm font-semibold uppercase tracking-widest text-primary-container mb-3">Google Ads bureau Groningen</p>
    <h2 class="text-4xl font-black mb-8">MORGEN BOVENAAN IN GOOGLE</h2>
    <p class="text-lg md:text-xl leading-relaxed">Met Google Ads sta je morgen bovenaan. Niet over drie maanden. Morgen.</p>
    <p class="text-lg md:text-xl leading-relaxed">Je betaalt per klik. Niet per vertoning, niet per maand. Alleen als iemand daadwerkelijk naar jouw website gaat.</p>
    <p class="text-lg md:text-xl leading-relaxed">Dat is precies waarom het werkt. Je bereikt mensen die nu al zoeken naar wat jij levert in Groningen.</p>
    <div class="h-1 w-24 bg-primary-container"></div>
  </div>
  <div class="md:col-start-2 md:col-span-5 relative order-2 md:order-1" style="transform:translateY(24px)">
    <div class="bg-[#078930]/5 absolute inset-0 -rotate-1 -translate-x-5 translate-y-6 rounded-xl -z-10 scale-110"></div>
    <img class="w-full object-cover rounded scale-90 md:rotate-1"
         src="<?php echo esc_url($ads_img1); ?>"
         sizes="(min-width: 768px) 42vw, 100vw"
         alt="Geen dikke rapporten, gewoon resultaten" width="1024" height="768" loading="lazy"/>
  </div>
</section>

<!-- BLOK: s2 - tweede sectie 55/45: tekst links + foto rechts -->
<section class="py-16 md:pt-[80px] md:pb-[130px] sect5545 grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
  <div class="space-y-6">
    <h2 class="text-4xl font-black mb-8">Jouw budget gaat naar klanten. Niet naar lucht.</h2>
    <p class="text-lg md:text-xl leading-relaxed">Hoe meer je weet wat je uitgeeft, hoe beter je kunt bijsturen. Hoe beter je bijstuurt, hoe verder je budget komt. Hoe verder je budget komt, hoe meer klanten je binnenkrijgt.</p>
    <p class="text-lg md:text-xl leading-relaxed">We kijken maandelijks wat werkt en wat niet. Zoekwoorden die niets opleveren, stoppen we. Zoekwoorden die werken, schalen we op.</p>
    <p class="text-lg md:text-xl leading-relaxed">Einde van de maand een rapportage op 1 A4, zodat je weet wat werkt en wat niet. En tussendoor komen we langs, om te vragen hoe het gaat. <strong>Kloar.</strong></p>
    <div class="h-1 w-36 bg-primary-container -rotate-1 translate-x-2"></div>
  </div>
  <div class="relative" style="transform:translateY(-24px)">
    <div class="bg-[#078930]/5 absolute inset-0 -rotate-1 translate-x-2 translate-y-5 rounded-xl -z-10 scale-110"></div>
    <img class="w-full object-cover rounded"
         src="<?php echo esc_url($ads_img2); ?>"
         sizes="(min-width: 768px) 42vw, 100vw"
         alt="Google Ads campagne beheer Groningen" width="1024" height="683" loading="lazy"/>
  </div>
</section>

<!-- BLOK: s3 - tekst links + stappenkaart rechts (01-04 genummerde stappen) -->
<section class="py-16 md:py-[100px] relative">
  <div class="absolute -left-20 top-0 text-[10rem] font-black text-black/5 select-none -z-10 rotate-12">ADS</div>
  <div class="max-w-4xl mx-auto flex flex-col md:flex-row items-start gap-12 md:gap-24">
    <div class="flex-1 space-y-8 md:translate-y-6 order-2">
      <h2 class="text-4xl font-black italic">WAT WE DOEN</h2>
      <p class="text-xl leading-relaxed">Google Ads is niet ingewikkeld. Maar het kost wel aandacht. Verkeerde instellingen En je steekt geld in de brand.</p>
      <p class="text-xl leading-relaxed">Wij zitten er bovenop. Van het begin af aan.</p>
      <p class="font-bold text-primary-container">Kloar.</p>
    </div>
    <div class="w-full kaartje-45 order-1">
      <div class="p-8 bg-surface-container-low border border-black/5 rounded-lg shadow-sm" style="transform: rotate(1deg)">
        <div class="flex gap-4 items-start mt-2">
          <span class="text-primary-container font-black text-xl w-8 shrink-0">01</span>
          <p class="text-lg leading-relaxed">Uitzoeken op welke zoekwoorden jouw klanten in Groningen actief zijn</p>
        </div>
        <div class="flex gap-4 items-start mt-4">
          <span class="text-primary-container font-black text-xl w-8 shrink-0">02</span>
          <p class="text-lg leading-relaxed">Advertentieteksten schrijven die aanzetten tot klikken</p>
        </div>
        <div class="flex gap-4 items-start mt-4">
          <span class="text-primary-container font-black text-xl w-8 shrink-0">03</span>
          <p class="text-lg leading-relaxed">Campagnes instellen zodat we meer geld verdienen dan we uitgeven</p>
        </div>
        <div class="flex gap-4 items-start mt-4">
          <span class="text-primary-container font-black text-xl w-8 shrink-0">04</span>
          <p class="text-lg leading-relaxed">Maandelijks bijsturen en rapporteren wat het heeft opgeleverd</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- BLOK: s4 - foto-split: gekleurde tekst links + foto rechts; geen s5 op deze pagina -->
<section class="py-16 md:py-[100px] grid grid-cols-1 md:grid-cols-2 gap-0 items-stretch md:gap-0">
  <div class="bg-surface-container-low p-6 md:p-12 flex flex-col justify-center md:rounded-l rounded relative overflow-hidden order-1 md:order-1">
    <span class="absolute -top-8 -right-4 text-[10rem] font-black text-black/5 select-none leading-none">Ads</span>
    <h2 class="text-4xl font-black mb-6 relative z-10">GEEN ADS BURO</h2>
    <div class="space-y-4 relative z-10">
      <p class="text-xl leading-relaxed">Wij zijn geen advertising-agency die je maandelijks een dik rapport stuurt over hoeveel je nu weer hebt uitgegeven.</p>
      <p class="text-xl leading-relaxed">En we vragen je hoe je zelf vindt dat het gaat.</p>
      <p class="text-xl font-bold text-primary-container">Dezelfde taal. Dezelfde hoogte.</p>
    </div>
  </div>
  <img src="<?php echo esc_url($ads_img3); ?>"
       sizes="(min-width: 768px) 50vw, 100vw"
       alt="Samenwerking Google Ads Groningen"
       class="w-full h-full object-cover md:rounded-r rounded min-h-[360px] order-2 md:order-2"
       width="1024" height="1024" loading="lazy"/>
</section>

<!-- BLOK: contact-cta - grote afsluitende uitnodiging met e-mailknop -->
<section id="contact" class="py-16 md:py-[100px] text-center relative overflow-hidden">
  <div class="relative z-10 space-y-12">
    <div class="space-y-4">
      <p class="text-2xl md:text-3xl font-bold opacity-60">Benieuwd hoeveel Stadjers nu al zoeken op jouw dienst?</p>
      <h2 class="text-5xl md:text-7xl font-black">We rekenen het uit.</h2>
    </div>
    <a href="mailto:ferdi@degrotemarketing.nl"
       class="bg-primary-container text-white px-12 py-6 text-2xl font-bold rounded-lg drift-on-hover shadow-xl shadow-primary-container/20 inline-block md:rotate-1">
      Nodig ons uit<span class="sr-only"> (opent e-mailprogramma)</span>
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


<!-- BLOK: blogs-recent - 3 meest recente posts; verborgen als er geen zijn -->
<?php
$dgm_posts = get_posts(['post_type'=>'post','post_status'=>'publish','posts_per_page'=>3,'orderby'=>'date','order'=>'DESC']);
if (!empty($dgm_posts)) :
?>
<section class="py-16 md:py-[100px]">
  <div class="flex items-end justify-between gap-8 flex-wrap mb-12">
    <div>
      <h2 class="text-4xl font-black italic">Blogs. Zelf geschreven.</h2>
    </div>
    <a href="<?php echo home_url('/blog/'); ?>" class="hidden md:block text-base font-bold text-primary-container border-b-2 border-primary-container pb-0.5 shrink-0">Alle blogs &rarr;</a>
  </div>
  <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
    <?php foreach ($dgm_posts as $dgm_i => $dgm_post) :
      $dgm_thumb   = get_the_post_thumbnail_url($dgm_post, 'dgm-square-md') ?: ($up . 'voorgroningers-768x768.png');
      $dgm_title   = esc_html(get_the_title($dgm_post));
      $dgm_excerpt = get_the_excerpt($dgm_post);
      $dgm_link    = get_permalink($dgm_post);
      if ($dgm_i === 0)     { $dgm_card = 'background:white;border-radius:12px;overflow:hidden;box-shadow:0 4px 16px rgba(0,0,0,0.08);transform:translateY(-8px)'; }
      elseif ($dgm_i === 2) { $dgm_card = 'background:white;border-radius:12px;overflow:hidden;border:1px solid #e5e7eb;transform:translateY(12px)'; }
      else                  { $dgm_card = 'background:white;border-radius:12px;overflow:hidden;border:1px solid #e5e7eb'; }
    ?>
    <article style="<?php echo $dgm_card; ?>">
      <a href="<?php echo esc_url($dgm_link); ?>" class="group block">
        <img src="<?php echo esc_url($dgm_thumb); ?>" alt="<?php echo $dgm_title; ?>"
             class="w-full"
             width="512" height="512" loading="lazy"/>
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
