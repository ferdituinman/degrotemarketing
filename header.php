<!DOCTYPE html>
<html class="light" lang="nl">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<link rel="icon" type="image/png" href="<?php echo content_url('uploads/2026/05/favicon.png'); ?>"/>
<?php wp_head(); ?>
</head>
<body class="bg-surface text-on-surface font-body selection:bg-primary-container selection:text-white overflow-x-hidden tracking-[-0.8px]">
<?php
$is_blog_active = is_singular('post') || (is_page() && get_query_var('pagename') === 'blog') || is_category() || is_tag() || is_archive();
$home_url = home_url('/');
$blog_url = home_url('/blog/');
?>
<header class="bg-white/90 dark:bg-zinc-900/90 backdrop-blur-sm docked full-width top-0 sticky z-50 no-border">
<nav class="flex justify-between items-center w-full px-8 py-4 md:py-3 max-w-full">
<a href="<?php echo $home_url; ?>" class="ml-0 mr-auto">
<img src="<?php echo content_url('uploads/2026/05/logo.png'); ?>"
     srcset="<?php echo content_url('uploads/2026/05/logo.png'); ?> 1347w,
             <?php echo content_url('uploads/2026/05/logo-1024x338.png'); ?> 1024w,
             <?php echo content_url('uploads/2026/05/logo-768x253.png'); ?> 768w,
             <?php echo content_url('uploads/2026/05/logo-300x99.png'); ?> 300w"
     sizes="249px"
     alt="De Grote Marketing"
     class="h-[82px] w-auto"
     width="1347" height="444"
     fetchpriority="high"/>
</a>
<div class="hidden md:flex items-center space-x-12">
  <a data-spy-link="aanpak" class="font-['Public_Sans'] text-lg font-bold tracking-tight text-zinc-900 dark:text-zinc-100 opacity-80 hover:translate-y-[-2px] transition-transform duration-200"
     href="<?php echo $home_url; ?>#aanpak">Aanpak</a>
  <a data-spy-link="plezier" class="font-['Public_Sans'] text-lg font-bold tracking-tight text-zinc-900 dark:text-zinc-100 opacity-80 hover:translate-y-[-2px] transition-transform duration-200"
     href="<?php echo $home_url; ?>#plezier">Plezier</a>
  <a data-spy-link="contact" class="font-['Public_Sans'] text-lg font-bold tracking-tight text-zinc-900 dark:text-zinc-100 opacity-80 hover:translate-y-[-2px] transition-transform duration-200"
     href="<?php echo $home_url; ?>#contact">Contact</a>
  <a class="font-['Public_Sans'] text-lg font-bold tracking-tight<?php echo $is_blog_active ? ' text-[#078930] underline decoration-wavy decoration-2 underline-offset-4' : ' text-zinc-900 dark:text-zinc-100 opacity-80'; ?> hover:translate-y-[-2px] transition-transform duration-200"
     href="<?php echo $blog_url; ?>">Blog</a>
  <a href="mailto:ferdi@degrotemarketing.nl"
     class="bg-primary-container text-on-primary-container px-6 py-2 rounded-lg font-bold drift-on-hover transition-all active:scale-95">
    Koffie<span class="sr-only"> (opent e-mailprogramma)</span>
  </a>
</div>
<button id="hamburger" class="md:hidden text-primary-container" aria-label="Menu openen" aria-expanded="false">
  <span id="hamburger-icon" style="display:flex;align-items:center;">
    <svg id="icon-menu" xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 24 24" fill="currentColor"><path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z"/></svg>
    <svg id="icon-close" xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 24 24" fill="currentColor" style="display:none"><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/></svg>
  </span>
</button>
</nav>
<div id="mobile-menu" class="hidden md:hidden fixed top-[120px] left-0 right-0 bg-white border-b border-black/5 px-8 py-6 flex flex-col gap-5 z-40" aria-hidden="true">
  <a class="font-['Public_Sans'] text-lg font-bold tracking-tight<?php echo $is_blog_active ? ' text-[#078930]' : ' text-zinc-900 opacity-80'; ?>"
     href="<?php echo $blog_url; ?>">Blog</a>
  <a class="font-['Public_Sans'] text-lg font-bold tracking-tight text-zinc-900 opacity-80"
     href="<?php echo $home_url; ?>#aanpak">Aanpak</a>
  <a class="font-['Public_Sans'] text-lg font-bold tracking-tight text-zinc-900 opacity-80"
     href="<?php echo $home_url; ?>#plezier">Plezier</a>
  <a class="font-['Public_Sans'] text-lg font-bold tracking-tight text-zinc-900 opacity-80"
     href="<?php echo $home_url; ?>#contact">Contact</a>
  <a href="mailto:ferdi@degrotemarketing.nl"
     class="bg-primary-container text-on-primary-container px-6 py-2 rounded-lg font-bold w-fit">
    Koffie<span class="sr-only"> (opent e-mailprogramma)</span>
  </a>
</div>
</header>
