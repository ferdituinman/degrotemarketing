<!DOCTYPE html>
<html class="light" lang="nl">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<link rel="icon" type="image/png" href="<?php echo content_url('uploads/2026/05/favicon.png'); ?>"/>
<style>
<?php $fd = get_template_directory_uri() . '/fonts/'; ?>
@font-face{font-family:'Public Sans';font-style:normal;font-weight:400 900;font-display:swap;src:url('<?php echo $fd; ?>public-sans-normal-latin-ext.woff2') format('woff2');unicode-range:U+0100-02BA,U+02BD-02C5,U+02C7-02CC,U+02CE-02D7,U+02DD-02FF,U+0304,U+0308,U+0329,U+1D00-1DBF,U+1E00-1E9F,U+1EF2-1EFF,U+2020,U+20A0-20AB,U+20AD-20C0,U+2113,U+2C60-2C7F,U+A720-A7FF}
@font-face{font-family:'Public Sans';font-style:normal;font-weight:400 900;font-display:swap;src:url('<?php echo $fd; ?>public-sans-normal-latin.woff2') format('woff2');unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+0304,U+0308,U+0329,U+2000-206F,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD}
@font-face{font-family:'Public Sans';font-style:italic;font-weight:400 900;font-display:swap;src:url('<?php echo $fd; ?>public-sans-italic-latin-ext.woff2') format('woff2');unicode-range:U+0100-02BA,U+02BD-02C5,U+02C7-02CC,U+02CE-02D7,U+02DD-02FF,U+0304,U+0308,U+0329,U+1D00-1DBF,U+1E00-1E9F,U+1EF2-1EFF,U+2020,U+20A0-20AB,U+20AD-20C0,U+2113,U+2C60-2C7F,U+A720-A7FF}
@font-face{font-family:'Public Sans';font-style:italic;font-weight:400 900;font-display:swap;src:url('<?php echo $fd; ?>public-sans-italic-latin.woff2') format('woff2');unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+0304,U+0308,U+0329,U+2000-206F,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD}
html,body{font-family:'Public Sans',ui-sans-serif,system-ui,sans-serif}
</style>
<?php wp_head(); ?>
</head>
<body class="bg-surface text-on-surface font-body selection:bg-primary-container selection:text-white overflow-x-hidden tracking-[-0.8px]">
<?php
$service_slugs = ['seo-groningen', 'google-ads-groningen', 'contentmarketing-groningen', 'website-groningen'];
$current_slug  = get_post_field('post_name', get_queried_object_id());
$is_home_active    = is_front_page();
$is_blog_active    = is_singular('post') || (is_page() && get_query_var('pagename') === 'blog') || is_category() || is_tag() || is_archive();
$is_contact_active = is_page('contact');
$is_service_active = in_array($current_slug, $service_slugs);
$home_url    = home_url('/');
$blog_url    = home_url('/blog/');
$contact_url = home_url('/contact/');
$services = [
  ['label' => 'SEO Groningen',       'url' => home_url('/seo-groningen/')],
  ['label' => 'Google Ads',          'url' => home_url('/google-ads-groningen/')],
  ['label' => 'Contentmarketing',    'url' => home_url('/contentmarketing-groningen/')],
  ['label' => 'Website',             'url' => home_url('/website-groningen/')],
];
$lnk  = "font-['Public_Sans'] text-lg font-bold tracking-tight text-zinc-900 dark:text-zinc-100 opacity-80 hover:translate-y-[-2px] transition-transform duration-200";
$lnka = "font-['Public_Sans'] text-lg font-bold tracking-tight text-[#078930] underline decoration-wavy decoration-2 underline-offset-4 hover:translate-y-[-2px] transition-transform duration-200";
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
  <a class="<?php echo $is_home_active ? $lnka : $lnk; ?>"
     href="<?php echo $home_url; ?>">Aanpak</a>

  <div class="nav-dropdown">
    <button class="<?php echo $is_service_active ? $lnka : $lnk; ?>" style="background:none;border:0;padding:0;cursor:pointer;display:flex;align-items:center;gap:4px;" aria-haspopup="true" aria-expanded="false">
      Dingen
      <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor" style="opacity:.65;flex-shrink:0;margin-top:2px" aria-hidden="true"><path d="M7 10l5 5 5-5z"/></svg>
    </button>
    <div class="nav-dropdown-menu" role="menu">
      <?php foreach ($services as $s):
        $is_active_service = ($current_slug === basename(rtrim($s['url'], '/')));
      ?>
      <a href="<?php echo esc_url($s['url']); ?>"
         role="menuitem"
         <?php if ($is_active_service): ?>style="color:#078930"<?php endif; ?>
      ><?php echo esc_html($s['label']); ?></a>
      <?php endforeach; ?>
    </div>
  </div>

  <a class="<?php echo $is_blog_active ? $lnka : $lnk; ?>"
     href="<?php echo $blog_url; ?>">Blog</a>

  <a class="<?php echo $is_contact_active ? $lnka : $lnk; ?>"
     href="<?php echo $contact_url; ?>">Contact</a>
</div>

<button id="hamburger" class="md:hidden text-primary-container" aria-label="Menu openen" aria-expanded="false">
  <span id="hamburger-icon" style="display:flex;align-items:center;">
    <svg id="icon-menu" xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 24 24" fill="currentColor"><path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z"/></svg>
    <svg id="icon-close" xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 24 24" fill="currentColor" style="display:none"><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/></svg>
  </span>
</button>
</nav>

<div id="mobile-menu" class="hidden md:hidden fixed top-[120px] left-0 right-0 bg-white border-b border-black/5 px-8 py-6 flex flex-col gap-5 z-40" aria-hidden="true">
  <a class="font-['Public_Sans'] text-lg font-bold tracking-tight<?php echo $is_home_active ? ' text-[#078930]' : ' text-zinc-900 opacity-80'; ?>"
     href="<?php echo $home_url; ?>">Aanpak</a>
  <span class="nav-mobile-section">Dingen</span>
  <?php foreach ($services as $s):
    $is_active_service = ($current_slug === basename(rtrim($s['url'], '/')));
  ?>
  <a class="font-['Public_Sans'] text-base font-bold tracking-tight<?php echo $is_active_service ? ' text-[#078930]' : ' text-zinc-900 opacity-80'; ?>"
     href="<?php echo esc_url($s['url']); ?>"
     style="padding-left:1rem"><?php echo esc_html($s['label']); ?></a>
  <?php endforeach; ?>
  <a class="font-['Public_Sans'] text-lg font-bold tracking-tight<?php echo $is_blog_active ? ' text-[#078930]' : ' text-zinc-900 opacity-80'; ?>"
     href="<?php echo $blog_url; ?>">Blog</a>
  <a class="font-['Public_Sans'] text-lg font-bold tracking-tight<?php echo $is_contact_active ? ' text-[#078930]' : ' text-zinc-900 opacity-80'; ?>"
     href="<?php echo $contact_url; ?>">Contact</a>
</div>
</header>
