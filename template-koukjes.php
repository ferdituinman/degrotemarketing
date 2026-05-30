<?php
/*
 * Template Name: Koukjes
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
    height:500px;
    display:flex;
    align-items:center
  }
  #herov2 section{width:100%;padding-top:0;padding-bottom:0}
}
</style>

<!-- Hero mobile -->
<img src="<?php echo $up; ?>horizontale-strip-mobiel.webp"
     alt="" class="w-full block md:hidden" style="width:100%;max-width:100%;"
     fetchpriority="high" width="700" height="320" sizes="100vw"/>

<!-- Hero -->
<div id="herov2" class="w-full">
<section class="pb-16 md:flex md:items-center max-w-screen-xl mx-auto px-10 md:px-12">
<div class="relative z-10 bg-white/[0.98] pt-5 pr-10 pb-10 pl-10 md:p-8 rounded-lg max-w-2xl fade-in-up w-screen -ml-10 md:w-auto md:ml-0">
  <p class="text-sm font-semibold uppercase tracking-widest text-primary-container mb-3">Niet de eetbare.</p>
  <h1 class="text-[56px] md:text-[5rem] font-bold text-primary-container mb-6 italic leading-[0.96] md:leading-normal">Koukjes.</h1>
  <p class="text-lg md:text-xl leading-relaxed">Wat er op deze website aan cookies zit. Kort antwoord: weinig. Lang antwoord: hieronder.</p>
</div>
</section>
</div>

<main class="max-w-screen-xl mx-auto px-10 md:px-12 py-16 md:py-[100px]">
  <div class="max-w-3xl prose-dgm">

    <h2>Wat zijn cookies?</h2>
    <p>Cookies zijn kleine tekstbestandjes die een website op je apparaat zet. Ze onthouden dingen, zoals dat je al ingelogd bent. Sommige cookies zijn handig. Andere zijn er puur om je te volgen. Die laatste gebruiken wij niet.</p>

    <h2>Welke cookies gebruikt deze website?</h2>

    <h3>Technisch noodzakelijke cookies</h3>
    <p>WordPress plaatst een sessiecookie als je deze website bezoekt. Dat cookie verdwijnt zodra je je browser sluit. Zonder dit cookie werkt WordPress niet. Er is geen manier om dit uit te zetten zonder de website te breken.</p>
    <ul>
      <li><strong>wordpress_test_cookie</strong> - controleert of cookies werken in je browser</li>
      <li><strong>wp-settings-*</strong> - alleen aanwezig als je bent ingelogd in het WordPress-beheer (niet relevant voor gewone bezoekers)</li>
    </ul>
    <p>Deze cookies zijn strikt noodzakelijk. Ze vallen buiten de toestemmingsverplichting van de AVG.</p>

    <h3>Analytische of tracking cookies</h3>
    <p>Geen. Wij gebruiken geen Google Analytics, geen Facebook Pixel, geen heatmap-tools, geen remarketingpixels. Niks.</p>
    <p>We weten niet wie je bent als je deze website bezoekt. En dat is prima.</p>

    <h3>Social media cookies</h3>
    <p>Geen ingebedde social media content. Geen YouTube-iframes, geen Instagram-widgets, geen Twitter-tijdlijn. De Facebook-link in de footer is een gewone hyperlink, geen ingesloten script.</p>

    <h2>Toestemming</h2>
    <p>Omdat wij alleen technisch noodzakelijke cookies gebruiken, zijn wij niet verplicht om toestemming te vragen. Je ziet dan ook geen cookie-banner. Dat is geen vergissing.</p>

    <h2>Cookies van derden</h2>
    <p>Geen. We laden geen externe scripts, geen CDNs, geen advertentienetwerken. Alles op deze website is zelf gehost.</p>

    <h2>Cookies verwijderen</h2>
    <p>Wil je cookies wissen? Dat doe je via de instellingen van je browser. Hieronder de directe links voor de meest gebruikte browsers:</p>
    <ul>
      <li><a href="https://support.google.com/chrome/answer/95647" target="_blank" rel="noopener">Chrome</a></li>
      <li><a href="https://support.mozilla.org/nl/kb/cookies-verwijderen-gegevens-wissen-websites" target="_blank" rel="noopener">Firefox</a></li>
      <li><a href="https://support.apple.com/nl-nl/guide/safari/sfri11471/mac" target="_blank" rel="noopener">Safari</a></li>
      <li><a href="https://support.microsoft.com/nl-nl/microsoft-edge/cookies-verwijderen-in-microsoft-edge-63947406-40ac-c3b8-57b9-2a946a29ae09" target="_blank" rel="noopener">Edge</a></li>
    </ul>

    <h2>Vragen?</h2>
    <p>Staat er iets niet duidelijk? <a href="/contact/">Neem contact op</a>. We leggen het uit aan de keukentafel.</p>

    <p style="margin-top:64px"><a href="<?php echo home_url('/privacy/'); ?>" class="font-bold text-primary-container border-b-2 border-primary-container pb-0.5">Privacybeleid lezen &rarr;</a></p>

  </div>
</main>
<?php get_footer(); ?>
