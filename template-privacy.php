<?php
/*
 * Template Name: Privacy
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
  <p class="text-sm font-semibold uppercase tracking-widest text-primary-container mb-3">Gewoon duidelijk.</p>
  <h1 class="text-[56px] md:text-[5rem] font-bold text-primary-container mb-6 italic leading-[0.96] md:leading-normal">Privacybeleid.</h1>
  <p class="text-lg md:text-xl leading-relaxed">Wat doen wij met jouw gegevens? Gewoon verteld, zonder juridisch gebabbel.</p>
</div>
</section>
</div>

<main class="max-w-screen-xl mx-auto px-10 md:px-12 py-16 md:py-[100px]">
  <div class="max-w-3xl prose-dgm">

    <h2>Wie zijn wij?</h2>
    <p>De Grote Marketing is een handelsnaam van Ferdi Tuinman, eenmanszaak ingeschreven bij de Kamer van Koophandel onder nummer 93155042.</p>
    <ul>
      <li>Adres: Leonard Springerlaan 35, 9727 KB Groningen</li>
      <li>E-mail: <a href="mailto:ferdi@degrotemarketing.nl">ferdi@degrotemarketing.nl</a></li>
      <li>Telefoon: <a href="tel:+31624602947">06-24602947</a></li>
    </ul>

    <h2>Welke gegevens verzamelen wij?</h2>
    <p>Wij verzamelen alleen gegevens die jij zelf invult via het contactformulier op deze website. Dat zijn:</p>
    <ul>
      <li>Naam</li>
      <li>E-mailadres</li>
      <li>Telefoonnummer (optioneel)</li>
      <li>Je bericht</li>
    </ul>
    <p>Wij vragen niet meer dan nodig. Geen verborgen tracking, geen profielen.</p>

    <h2>Waarom bewaren wij die gegevens?</h2>
    <p>Alleen om contact met je op te nemen naar aanleiding van jouw vraag. Niet voor nieuwsbrieven, niet voor remarketing, niet voor lijstjes.</p>
    <p>Juridische grondslag: gerechtvaardigd belang (contact afhandelen op jouw eigen verzoek).</p>

    <h2>Hoe lang bewaren wij jouw gegevens?</h2>
    <p>Zolang als nodig om jouw vraag te beantwoorden. Daarna verwijderen wij de gegevens, tenzij we een lopende samenwerking hebben. Dan bewaren wij alleen wat nodig is voor de administratie, en niet langer dan 7 jaar (wettelijke bewaarplicht).</p>

    <h2>Delen wij jouw gegevens?</h2>
    <p>Nee, nooit. Wij verkopen geen gegevens en geven ze niet door aan derden, tenzij wij daartoe wettelijk verplicht zijn.</p>
    <p>Het contactformulier is gebouwd met Contact Form 7. Berichten worden opgeslagen in WordPress en per e-mail doorgestuurd naar ons. Er zijn geen externe koppelingen aan dit formulier.</p>

    <h2>Cookies</h2>
    <p>Deze website gebruikt een technisch cookie van WordPress (sessiecookie) en Google Analytics om anoniem bij te houden hoeveel bezoekers er zijn en welke pagina's goed worden bekeken. Wij gebruiken geen Facebook Pixel of andere advertentie-trackers. Meer lees je op de <a href="<?php echo home_url('/koukjes/'); ?>">cookiepagina</a>.</p>

    <h2>Jouw rechten</h2>
    <p>Je hebt het recht om te weten welke gegevens wij van jou bewaren, om die te laten corrigeren of verwijderen. Neem daarvoor contact op via ons <a href="/contact/">contactformulier</a>. Wij reageren in een paar dagen of sneller.</p>
    <p>Ben je het niet eens met hoe wij omgaan met jouw gegevens? Dan kun je een klacht indienen bij de Autoriteit Persoonsgegevens via <a href="https://www.autoriteitpersoonsgegevens.nl" target="_blank" rel="noopener">autoriteitpersoonsgegevens.nl</a>.</p>

    <h2>Beveiliging</h2>
    <p>De website draait op HTTPS. Toegang tot de WordPress-omgeving is beveiligd met een wachtwoord. Wij doen er alles aan om jouw gegevens veilig te bewaren.</p>

    <h2>Wijzigingen</h2>
    <p>Wij kunnen dit privacybeleid aanpassen als de situatie verandert. De meest actuele versie staat altijd op deze pagina. Laatste update: mei 2026.</p>

    <p style="margin-top:64px"><a href="<?php echo home_url('/contact/'); ?>" class="font-bold text-primary-container border-b-2 border-primary-container pb-0.5">Neem contact op &rarr;</a></p>

  </div>
</main>
<?php get_footer(); ?>
