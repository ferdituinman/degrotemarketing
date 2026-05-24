<?php get_header(); ?>
<?php
$up = content_url('uploads/2026/05/');
?>
<style>
#blog-grid{grid-template-columns:1fr;gap:48px}
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
  #blog-grid{grid-template-columns:1.265fr 1.265fr 0.47fr;gap:96px}
}
</style>

<!-- Hero mobile image -->
<img src="<?php echo $up; ?>horizontale-strip-mobiel.webp"
     alt="" class="w-full block md:hidden" style="width:100%;max-width:100%;"
     fetchpriority="high" width="700" height="320" sizes="100vw"/>

<!-- Hero -->
<div id="herov2" class="w-full">
<section class="pb-20 md:flex md:items-center max-w-screen-xl mx-auto px-10 md:px-12">
<div class="relative z-10 bg-white/[0.98] pt-5 pr-10 pb-10 pl-10 md:p-8 rounded-lg max-w-2xl fade-in-up w-screen -ml-10 md:w-auto md:ml-0">
  <h1 class="text-sm font-semibold uppercase tracking-widest text-primary-container mb-3">Online marketing voor Groningen</h1>
  <h2 class="text-[70px] md:text-[5rem] font-bold text-primary-container mb-6 italic leading-[0.96] md:leading-normal">Gewoon doen.</h2>
  <div class="space-y-8 text-lg md:text-xl leading-relaxed">
    <p>Je weet dat er meer in internet zit. Je moet alleen de juiste kant op.</p>
    <p>Wij maken online marketing simpel.</p>
    <p>We bedenken samen wat gaaf is. En dan doen we het gewoon. Kloar.</p>
  </div>
  <div class="mt-12">
    <a href="mailto:ferdi@degrotemarketing.nl" class="bg-primary-container text-white px-10 py-4 text-xl font-bold rounded shadow-none drift-on-hover inline-block">
      Bak pleur?<span class="sr-only"> (opent e-mailprogramma)</span>
    </a>
  </div>
</div>
</section>
</div>

<main class="max-w-screen-xl mx-auto px-10 md:px-12">

<!-- BESLISSEN AAN DE KEUKENTAFEL -->
<section id="aanpak" class="py-16 md:py-[100px] grid grid-cols-1 md:grid-cols-12 gap-12 items-center">
  <div class="md:col-span-5 space-y-6 order-1 md:order-2">
    <h2 class="text-4xl font-black mb-8">BESLISSEN AAN DE KEUKENTAFEL</h2>
    <p class="text-lg md:text-xl leading-relaxed">We doen het samen. Zonder hierarchie, zonder dikke rapporten die in een lade belanden. Wij staan naast jou, niet boven je.</p>
    <p class="text-lg md:text-xl leading-relaxed">We zitten bij jou aan tafel. Dezelfde hoogte, dezelfde taal.</p>
    <div class="h-1 w-24 bg-primary-container"></div>
  </div>
  <div class="md:col-start-2 md:col-span-5 relative order-2 md:order-1 md:-translate-y-12">
    <div class="bg-[#078930]/5 absolute inset-0 -rotate-2 -translate-x-4 translate-y-4 rounded-xl -z-10 scale-110"></div>
    <img class="w-full object-cover rounded scale-90 md:-rotate-1"
         src="<?php echo $up; ?>geen-leverancier.png"
         srcset="<?php echo $up; ?>geen-leverancier.png 1024w,
                 <?php echo $up; ?>geen-leverancier-768x768.png 768w,
                 <?php echo $up; ?>geen-leverancier-300x300.png 300w"
         sizes="(min-width: 768px) 42vw, 100vw"
         alt="Geen Leverancier" width="1024" height="1024" loading="lazy"/>
  </div>
</section>

<!-- VOOR GRONINGEN -->
<section class="py-16 md:pt-[80px] md:pb-[130px] grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
  <div class="space-y-6">
    <h2 class="text-4xl font-black mb-8">Wij komen hier vandaan.</h2>
    <p class="text-lg md:text-xl leading-relaxed">We kennen de grachten, de mensen, Stadjers, studenten.</p>
    <p class="text-lg md:text-xl leading-relaxed">Geen bureau uit Amsterdam met een lulverhaal via beeldbellen. Gewoon iemand die op de fiets bij je langskomt.</p>
    <div class="h-1 w-36 bg-primary-container -rotate-1 translate-x-2"></div>
  </div>
  <div class="relative md:translate-y-12">
    <div class="bg-[#078930]/5 absolute inset-0 rotate-2 translate-x-4 -translate-y-3 rounded-xl -z-10 scale-90"></div>
    <img class="w-full object-cover rounded"
         src="<?php echo $up; ?>voorgroningers.png"
         srcset="<?php echo $up; ?>voorgroningers.png 1536w,
                 <?php echo $up; ?>voorgroningers-1024x1024.png 1024w,
                 <?php echo $up; ?>voorgroningers-768x768.png 768w,
                 <?php echo $up; ?>voorgroningers-300x300.png 300w"
         sizes="(min-width: 768px) 42vw, 100vw"
         alt="Voor Groningen, door Groningen" width="1536" height="1536" loading="lazy"/>
  </div>
</section>

<!-- PLEZIER ALS RICHTING -->
<section id="plezier" class="py-16 md:py-[100px] relative">
  <div class="absolute -left-20 top-0 text-[10rem] font-black text-black/5 select-none -z-10 rotate-12">FUN</div>
  <div class="max-w-2xl mx-auto text-center space-y-8">
    <h2 class="text-4xl font-black">PLEZIER ALS RICHTING</h2>
    <p class="text-xl leading-relaxed">Energie beslist de richting. Als marketing voelt als trekken aan een dood paard, dan doen we het niet. Marketing moet leuk zijn voor jou en voor je klant. We gaan het pas doen als we het leuk vinden.</p>
    <div class="inline-block px-4 py-2 border-2 border-primary-container rounded-full -rotate-3 translate-x-3">
      <p class="text-lg font-bold">Gewoon doen.</p>
    </div>
  </div>
</section>

<!-- VAN DENKEN NAAR DOEN -->
<section class="py-16 md:py-[100px] border-none">
  <div class="max-w-4xl mx-auto flex flex-col md:flex-row items-start gap-12 md:gap-24">
    <div class="flex-1 space-y-8 md:translate-y-6">
      <h2 class="text-4xl font-black italic">VAN DENKEN NAAR DOEN</h2>
      <p class="text-xl leading-relaxed">We gaan niet overleggen over overleggen. We beginnen. Kleine stapjes, grote resultaten. Als het werkt, gaan we door. Als het niet werkt, bedenken we wat beters. Direct.</p>
      <p class="font-bold text-primary-container">Kloar.</p>
    </div>
    <div class="w-full md:w-1/3 relative">
      <div class="bg-[#078930]/5 absolute inset-0 rotate-2 translate-x-4 -translate-y-3 rounded-lg -z-10 scale-110"></div>
      <div id="slider-card" class="relative transition-transform duration-700" style="transform: rotate(2deg); min-height: 260px">
        <div class="p-8 bg-surface-container-low border border-black/5 rounded-lg shadow-sm overflow-hidden">
          <span class="text-primary-container mb-4 block">
            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24" fill="currentColor"><path d="M7 2v11h3v9l7-12h-4l4-8z"/></svg>
          </span>
          <p id="slider-label" class="text-sm font-bold uppercase tracking-widest opacity-80 mb-3">Eerlijkheid</p>
          <div id="slider" class="relative min-h-[120px]" aria-live="polite" aria-atomic="true">
            <p class="slider-slide text-2xl font-black absolute inset-0 transition-opacity duration-700 opacity-100">Zeggen wat het is,<br/>niet wat je wil horen.</p>
            <p class="slider-slide text-2xl font-black absolute inset-0 transition-opacity duration-700 opacity-0">Gewoon iemand van hier. Uit Stad.</p>
            <p class="slider-slide text-2xl font-black absolute inset-0 transition-opacity duration-700 opacity-0">Kort plan, direct actie. Volgende week live.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- NAIT SOEZEN -->
<section class="py-16 md:py-[100px] grid grid-cols-1 md:grid-cols-2 gap-16 items-center">
  <div class="space-y-8 text-xl leading-relaxed order-1 md:order-2">
    <h2 class="text-4xl font-black leading-tight mb-4">Nait soezen.<br/>Deurbroezen.</h2>
    <p class="text-xl leading-relaxed">We verkopen niet jouw dienst of product, we verkopen jouw waarde. We gaan helemaal niet vertellen wat je doet.<br/>We gaan laten zien wat je te bieden hebt.</p>
    <p class="text-xl leading-relaxed">Bullshit vegen we van de tafel. We doen wat werkt.</p>
    <a href="mailto:ferdi@degrotemarketing.nl" class="bg-primary-container text-white px-8 py-3 text-lg font-bold rounded drift-on-hover inline-block">
      Kop d'r veur.<span class="sr-only"> (opent e-mailprogramma)</span>
    </a>
  </div>
  <div class="relative order-2 md:order-1 md:translate-y-4">
    <div class="bg-[#078930]/15 absolute inset-0 -rotate-1 -translate-x-5 translate-y-5 rounded-xl -z-10 scale-110"></div>
    <img src="<?php echo $up; ?>als-marketing-voelt-als-werk.png"
         srcset="<?php echo $up; ?>als-marketing-voelt-als-werk.png 1024w,
                 <?php echo $up; ?>als-marketing-voelt-als-werk-768x768.png 768w,
                 <?php echo $up; ?>als-marketing-voelt-als-werk-300x300.png 300w"
         sizes="(min-width: 768px) 50vw, 100vw"
         alt="Als marketing voelt als werk"
         class="w-full object-contain scale-90" width="1024" height="1024" loading="lazy"/>
  </div>
</section>

<!-- LOKAAL > GEEN PAK -->
<section class="py-16 md:py-[100px] text-left">
  <div class="max-w-4xl border-l-4 border-primary-container pl-6 md:pl-12 py-8 ml-0 md:ml-14">
    <h2 class="text-4xl font-black mb-8">LOKAAL > Geen pak</h2>
    <div class="space-y-6 text-xl leading-relaxed opacity-90">
      <p>Je krijgt een sparringspartner die weet hoe het werkt. Nuchter. Eerlijk. Als je verwacht dat we in een strak pak aankomen, dan moet je iemand anders bellen.</p>
      <p>Droge humor inbegrepen. Gratis.</p>
    </div>
  </div>
</section>

<!-- ECHTE DINGEN -->
<section class="py-16 md:py-[100px]">
  <div class="grid grid-cols-1 md:grid-cols-2 gap-0 items-stretch md:gap-0">
    <div class="bg-surface-container-low p-6 md:p-12 flex flex-col justify-center md:rounded-r rounded relative overflow-hidden order-1 md:order-2">
      <span class="absolute -top-8 -right-4 text-[10rem] font-black text-black/5 select-none leading-none">Echt</span>
      <h2 class="text-4xl font-black mb-6 relative z-10">ECHTE DINGEN</h2>
      <div class="flex gap-4 items-start relative z-10 mt-2">
        <span class="text-primary-container font-black text-xl w-8 shrink-0">01</span>
        <p class="text-xl leading-relaxed">Eerlijk. Direct. Zonder trucjes.</p>
      </div>
      <div class="flex gap-4 items-start relative z-10 mt-4">
        <span class="text-primary-container font-black text-xl w-8 shrink-0">02</span>
        <p class="text-xl leading-relaxed">We vertellen jouw verhaal. Dat is de enige manier die echt werkt.</p>
      </div>
      <div class="flex gap-4 items-start relative z-10 mt-4">
        <span class="text-primary-container font-black text-xl w-8 shrink-0">03</span>
        <p class="text-xl leading-relaxed">Zodat mensen denken: ja, dat klopt.</p>
      </div>
    </div>
    <img src="<?php echo $up; ?>simone.png"
         srcset="<?php echo $up; ?>simone.png 1275w,
                 <?php echo $up; ?>simone-1024x1024.png 1024w,
                 <?php echo $up; ?>simone-768x768.png 768w,
                 <?php echo $up; ?>simone-300x300.png 300w"
         sizes="(min-width: 768px) 50vw, 100vw"
         alt="Simone"
         class="w-full h-full object-cover md:rounded-r rounded min-h-[400px] order-2 md:order-1 scale-90 md:-translate-x-3"
         width="1275" height="1536" loading="lazy"/>
  </div>
</section>

<!-- CONTACT CTA -->
<section id="contact" class="py-16 md:py-[100px] text-center relative overflow-hidden">
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
  <div class="absolute inset-0 -z-10 pointer-events-none">
    <svg class="w-full h-full opacity-10" viewBox="0 0 1000 500">
      <path d="M100,400 C300,100 700,500 900,100" fill="none" stroke="black" stroke-width="4"/>
      <path d="M50,100 Q450,450 950,50" fill="none" opacity="0.5" stroke="#078930" stroke-width="8"/>
    </svg>
  </div>
</section>

<!-- RECENT BLOGS -->
<?php
$recent_posts = get_posts([
    'post_type'      => 'post',
    'post_status'    => 'publish',
    'posts_per_page' => 2,
    'orderby'        => 'date',
    'order'          => 'DESC',
]);
if (!empty($recent_posts)) :
?>
<section class="py-16 md:py-[140px]">
  <div class="flex items-end justify-between gap-8 flex-wrap" style="margin-bottom:64px">
    <div>
      <p class="text-sm font-bold uppercase tracking-widest text-primary-container mb-3">Proatjes.</p>
      <h2 class="text-4xl font-black" style="margin-bottom:50px">Blogs. Zelf geschreven.</h2>
    </div>
    <a href="<?php echo home_url('/blog/'); ?>" class="text-base font-bold text-primary-container border-b-2 border-primary-container pb-0.5 shrink-0">
      Alle blogs →
    </a>
  </div>

  <div id="blog-grid" style="display:grid;align-items:start">
    <?php foreach ($recent_posts as $i => $rpost) :
      $rthumb   = get_the_post_thumbnail_url($rpost, 'dgm-square-md') ?: ($up . 'voorgroningers-768x768.png');
      $rtitle   = esc_html(get_the_title($rpost));
      $rexcerpt = wp_trim_words(get_the_excerpt($rpost), 18);
      $rlink    = get_permalink($rpost);
    ?>

    <?php if ($i === 0) : ?>
    <article style="margin-top:0;background:rgba(7,137,48,0.07);border-radius:12px;padding:24px 20px 20px">
      <a href="<?php echo esc_url($rlink); ?>" class="group block">
        <h3 class="font-black leading-tight group-hover:text-primary-container transition-colors duration-200" style="font-size:22px;line-height:1.15;margin-bottom:25px"><?php echo $rtitle; ?></h3>
        <div style="overflow:hidden;border-radius:10px;margin-bottom:24px">
          <img src="<?php echo esc_url($rthumb); ?>"
               alt="<?php echo $rtitle; ?>"
               class="w-full object-cover transition-transform duration-500 group-hover:scale-105"
               style="aspect-ratio:1/1;display:block"
               width="512" height="512" loading="lazy"/>
        </div>
        <p class="text-base leading-relaxed opacity-70"><?php echo $rexcerpt; ?></p>
      </a>
    </article>

    <?php elseif ($i === 1) : ?>
    <article>
      <a href="<?php echo esc_url($rlink); ?>" class="group block">
        <div style="overflow:hidden;border-radius:10px;margin-bottom:24px">
          <img src="<?php echo esc_url($rthumb); ?>"
               alt="<?php echo $rtitle; ?>"
               class="w-full object-cover transition-transform duration-500 group-hover:scale-105"
               style="aspect-ratio:3/2;display:block"
               width="512" height="341" loading="lazy"/>
        </div>
        <h3 class="font-black leading-tight mb-3 group-hover:text-primary-container transition-colors duration-200" style="font-size:22px;line-height:1.15"><?php echo $rtitle; ?></h3>
        <p class="text-base leading-relaxed opacity-70"><?php echo $rexcerpt; ?></p>
      </a>
    </article>

    <?php else : ?>
    <article style="margin-top:32px">
      <a href="<?php echo esc_url($rlink); ?>" class="group block">
        <div style="overflow:hidden;border-radius:10px;margin-bottom:24px">
          <img src="<?php echo esc_url($rthumb); ?>"
               alt="<?php echo $rtitle; ?>"
               class="w-full object-cover transition-transform duration-500 group-hover:scale-105"
               style="aspect-ratio:4/3;display:block"
               width="512" height="384" loading="lazy"/>
        </div>
        <h3 class="font-black leading-tight mb-3 group-hover:text-primary-container transition-colors duration-200" style="font-size:22px;line-height:1.15"><?php echo $rtitle; ?></h3>
        <p class="text-base leading-relaxed opacity-70"><?php echo $rexcerpt; ?></p>
      </a>
    </article>

    <?php endif; ?>
    <?php endforeach; ?>
  </div>
</section>
<?php endif; ?>

</main>

<script>
document.addEventListener('DOMContentLoaded',function(){
  var slides=document.querySelectorAll('.slider-slide');
  var label=document.getElementById('slider-label');
  var card=document.getElementById('slider-card');
  if(!slides.length||!label||!card)return;
  var labels=['Eerlijkheid','Lokaal','Ondernemend'];
  var rotations=[2,-3,1];
  var current=0;
  var touchStartX=0;
  function nextSlide(){
    slides[current].classList.replace('opacity-100','opacity-0');
    current=(current+1)%slides.length;
    slides[current].classList.replace('opacity-0','opacity-100');
    label.textContent=labels[current];
    card.style.transform='rotate('+rotations[current]+'deg)';
  }
  var interval=setInterval(nextSlide,3000);
  card.addEventListener('touchstart',function(e){touchStartX=e.touches[0].clientX;});
  card.addEventListener('touchend',function(e){
    var touchEndX=e.changedTouches[0].clientX;
    if(touchStartX-touchEndX>50){clearInterval(interval);nextSlide();interval=setInterval(nextSlide,3000);}
  });
});
</script>

<?php get_footer(); ?>
