<?php

// ─── robots.txt: blokkeer AI-trainingscrawlers ─────────────────────────────────
// Geblokkeerd: training (GPTBot, ClaudeBot, Google-Extended, CCBot, Bytespider, cohere-ai)
// Toegestaan:  inferentie/citaties (ChatGPT-User, PerplexityBot, Googlebot)
add_filter('robots_txt', function (string $output): string {
    $output .= "\nUser-agent: GPTBot\nDisallow: /\n";
    $output .= "\nUser-agent: ClaudeBot\nDisallow: /\n";
    $output .= "\nUser-agent: Google-Extended\nDisallow: /\n";
    $output .= "\nUser-agent: CCBot\nDisallow: /\n";
    $output .= "\nUser-agent: Bytespider\nDisallow: /\n";
    $output .= "\nUser-agent: cohere-ai\nDisallow: /\n";
    return $output;
}, 99);

// ─── Theme setup ───────────────────────────────────────────────────────────────
add_action('after_setup_theme', function () {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_image_size('dgm-square-lg', 1024, 1024, true);
    add_image_size('dgm-square-md', 512, 512, true);
});

// Title separator → "Title - Sitenaam"
add_filter('document_title_separator', fn() => '-');

// Em dash verboden. Overal. Altijd.
add_action('template_redirect', function () {
    ob_start(fn($html) => str_replace(['—', '–'], '-', $html));
});
add_filter('the_title',         fn($t) => str_replace(['—', '–'], '-', $t));
add_filter('the_excerpt',       fn($t) => str_replace(['—', '–'], '-', $t));
add_filter('the_content',       fn($t) => str_replace(['—', '–'], '-', $t));
add_filter('wp_title',          fn($t) => str_replace(['—', '–'], '-', $t));
add_filter('document_title_parts', function($p) {
    $p = array_map(fn($v) => str_replace(['—', '–'], '-', $v), $p);
    if (is_front_page()) {
        $p['title'] = 'Online marketing Groningen';
        unset($p['tagline']);
    }
    return $p;
});


// ─── Assets ────────────────────────────────────────────────────────────────────
add_action('wp_enqueue_scripts', function () {
    // Remove unused default WordPress styles
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
    wp_dequeue_style('classic-theme-styles');
    wp_dequeue_style('global-styles');
});

// Inline style.css to eliminate render-blocking request
add_action('wp_head', function () {
    echo '<style>';
    readfile(get_template_directory() . '/style.css');
    echo '</style>';
}, 0);

// ─── Head: verification + font preloads ──────────────────────────────────────
add_action('wp_head', function () {
    ?>
<meta name="google-site-verification" content="yfsgohLvLDdEnLOHycjThYYCaC5mqpuqkScdLOVmaRE" />
<link rel="preload" href="<?php echo get_template_directory_uri(); ?>/fonts/public-sans-normal-latin.woff2" as="font" type="font/woff2" crossorigin>
<link rel="preload" href="<?php echo get_template_directory_uri(); ?>/fonts/public-sans-italic-latin.woff2" as="font" type="font/woff2" crossorigin>
<link rel="alternate" hreflang="nl-NL" href="<?php echo esc_url(is_singular() ? get_permalink() : home_url('/')); ?>"/>
<?php if (is_front_page()) : ?>
<link rel="preload" href="<?php echo content_url('uploads/2026/05/horizontale-strip.png'); ?>" as="image" media="(min-width:768px)">
<?php endif; ?>
    <?php
}, 1);

// ─── Footer: GA4 (uitgesteld, na render) ─────────────────────────────────────
add_action('wp_footer', function () {
    ?>
<script async src="https://www.googletagmanager.com/gtag/js?id=G-SK0CH84LW3"></script>
<script>window.dataLayer=window.dataLayer||[];function gtag(){dataLayer.push(arguments)}gtag('js',new Date());gtag('config','G-SK0CH84LW3');</script>
    <?php
}, 99);

// ─── Social & SEO meta tags ────────────────────────────────────────────────────
add_action('wp_head', 'dgm_social_meta', 2);
function dgm_social_meta() {
    $site_name   = 'De Grote Marketing';
    $default_img = content_url('uploads/2026/05/logo.png');

    if (is_singular('post')) {
        $post_obj = get_queried_object();
        $post_id  = $post_obj->ID;
        $title    = get_the_title($post_id) . ' - ' . $site_name;
        $raw_exc  = $post_obj->post_excerpt ?: wp_trim_words(strip_tags($post_obj->post_content), 30);
        $desc     = $raw_exc;
        $url      = get_permalink($post_id);
        $type     = 'article';
        $dt_pub   = get_post_datetime($post_obj, 'date', 'gmt') ?: get_post_datetime($post_obj, 'date', 'local');
        $date_pub = $dt_pub ? $dt_pub->format('c') : '';
        $dt_mod   = get_post_datetime($post_obj, 'modified', 'gmt') ?: get_post_datetime($post_obj, 'modified', 'local');
        $date_mod = $dt_mod ? $dt_mod->format('c') : '';
        $cats     = get_the_category($post_id);
        $cat      = $cats ? esc_attr($cats[0]->name) : '';
        $img_id   = get_post_thumbnail_id($post_id);
        if ($img_id) {
            $src     = wp_get_attachment_image_src($img_id, 'full');
            $img_url = $src[0]; $img_w = $src[1]; $img_h = $src[2];
            $img_alt = get_post_meta($img_id, '_wp_attachment_image_alt', true) ?: $title;
        } else {
            $img_url = $default_img; $img_w = 1347; $img_h = 444; $img_alt = $site_name;
        }
    } elseif (is_front_page()) {
        $title   = 'De Grote Marketing - Online marketing voor ondernemers in Groningen';
        $desc    = 'De Grote Marketing helpt ondernemers in Groningen met eerlijke, simpele online marketing. Geen bullshit, wel resultaat.';
        $url     = home_url('/');
        $type    = 'website';
        $img_url = $default_img; $img_w = 1347; $img_h = 444; $img_alt = $site_name;
    } else {
        $title   = get_the_title() . ' - ' . $site_name;
        $desc    = 'Online marketing voor ondernemers in Groningen.';
        $url     = get_permalink() ?: home_url('/');
        $type    = 'website';
        $img_url = $default_img; $img_w = 1347; $img_h = 444; $img_alt = $site_name;
    }

    $desc = esc_attr(substr(strip_tags($desc), 0, 155));
    ?>
<meta name="description" content="<?php echo $desc; ?>"/>
<link rel="canonical" href="<?php echo esc_url($url); ?>"/>
<meta property="og:type" content="<?php echo esc_attr($type); ?>"/>
<meta property="og:site_name" content="<?php echo esc_attr($site_name); ?>"/>
<meta property="og:locale" content="nl_NL"/>
<meta property="og:title" content="<?php echo esc_attr($title); ?>"/>
<meta property="og:description" content="<?php echo $desc; ?>"/>
<meta property="og:url" content="<?php echo esc_url($url); ?>"/>
<meta property="og:image" content="<?php echo esc_url($img_url); ?>"/>
<meta property="og:image:width" content="<?php echo (int)$img_w; ?>"/>
<meta property="og:image:height" content="<?php echo (int)$img_h; ?>"/>
<meta property="og:image:alt" content="<?php echo esc_attr($img_alt); ?>"/>
<?php if ($type === 'article') : ?>
<meta property="article:published_time" content="<?php echo esc_attr($date_pub); ?>"/>
<meta property="article:modified_time" content="<?php echo esc_attr($date_mod); ?>"/>
<?php if ($cat) : ?><meta property="article:section" content="<?php echo $cat; ?>"/><?php endif; ?>
<?php endif; ?>
<meta name="twitter:card" content="summary_large_image"/>
<meta name="twitter:title" content="<?php echo esc_attr($title); ?>"/>
<meta name="twitter:description" content="<?php echo $desc; ?>"/>
<meta name="twitter:image" content="<?php echo esc_url($img_url); ?>"/>
<?php
}

// ─── Schema JSON-LD (sitebreed) ────────────────────────────────────────────────
add_action('wp_head', 'dgm_schema', 5);
function dgm_schema() {
    $base_url = 'https://www.degrotemarketing.nl';

    $org_nodes = [
        [
            '@type'       => ['LocalBusiness', 'ProfessionalService'],
            '@id'         => $base_url . '/#organization',
            'name'        => 'De Grote Marketing',
            'description' => 'Online marketing voor ondernemers in Groningen.',
            'slogan'      => 'Gewoon doen.',
            'url'         => $base_url . '/',
            'sameAs'      => [
                'https://www.facebook.com/profile.php?id=61589915847593',
                'https://www.linkedin.com/in/ferdituinman/',
            ],
            'logo'          => ['@id' => $base_url . '/#logo'],
            'image'         => ['@id' => $base_url . '/#orgimage'],
            'hasMap'        => 'https://www.google.com/maps?q=Leonard+Springerlaan+35,+9727+KB+Groningen,+NL',
            'email'         => 'ferdi@degrotemarketing.nl',
            'telephone'     => '+31624602947',
            'priceRange'    => '€€-€€€',
            'foundingDate'  => '2026-05-01',
            'address'       => [
                '@type'           => 'PostalAddress',
                'streetAddress'   => 'Leonard Springerlaan 35',
                'postalCode'      => '9727 KB',
                'addressLocality' => 'Groningen',
                'addressRegion'   => 'Groningen',
                'addressCountry'  => 'NL',
            ],
            'geo' => [
                '@type'     => 'GeoCoordinates',
                'latitude'  => 53.2009,
                'longitude' => 6.5559,
            ],
            'openingHoursSpecification' => [
                [
                    '@type'      => 'OpeningHoursSpecification',
                    'dayOfWeek'  => [
                        'https://schema.org/Monday',
                        'https://schema.org/Tuesday',
                        'https://schema.org/Wednesday',
                        'https://schema.org/Thursday',
                    ],
                    'opens'  => '08:30',
                    'closes' => '17:30',
                ],
                [
                    '@type'     => 'OpeningHoursSpecification',
                    'dayOfWeek' => 'https://schema.org/Friday',
                    'opens'     => '08:30',
                    'closes'    => '16:00',
                ],
            ],
            'areaServed' => [
                ['@type' => 'City', 'name' => 'Groningen'],
                ['@type' => 'AdministrativeArea', 'name' => 'Provincie Groningen'],
            ],
            'availableLanguage' => [
                ['@type' => 'Language', 'name' => 'Nederlands', 'alternateName' => 'nl-NL'],
            ],
            'identifier' => [
                ['@type' => 'PropertyValue', 'propertyID' => 'KVK', 'value' => '93155042'],
            ],
            'vatID'              => 'NL005003057B57',
            'parentOrganization' => ['@type' => 'Organization', 'name' => 'ferdituinman.nl', 'url' => 'https://www.ferdituinman.nl'],
            'founder'            => ['@id' => $base_url . '/#person-ferdi-tuinman'],
            'employee'           => ['@id' => $base_url . '/#person-ferdi-tuinman'],
            'aggregateRating'    => [
                '@type'       => 'AggregateRating',
                'ratingValue' => '5.0',
                'reviewCount' => 4,
                'bestRating'  => '5',
                'worstRating' => '1',
            ],
            'contactPoint'       => ['@id' => $base_url . '/#contact'],
            'hasCredential'      => [
                ['@id' => $base_url . '/#credential-ga4'],
                ['@id' => $base_url . '/#credential-moz'],
                ['@id' => $base_url . '/#credential-google-mijn-bedrijf'],
            ],
            'knowsAbout' => [
                'SEO','Contentmarketing','SEA','Google Ads','Social media','Campagnes',
                'Websites','WordPress websites','Webshops','WooCommerce','Website optimalisatie',
                'Technische optimalisatie','Zoekwoordenonderzoek','Linkbuilding','SEO-copywriting',
                'Webteksten','Blogartikelen','Contentstrategie','Online marketing advies',
                'Marketingstrategie','Positionering','Branding','Conversie-optimalisatie',
                'Rapportage','Sparringsessies','Powersessies','GA4','Moz','Google Mijn Bedrijf',
            ],
            'hasOfferCatalog' => ['@id' => $base_url . '/#offer-catalog'],
            'makesOffer'      => [
                [
                    '@type'       => 'Offer',
                    'name'        => 'Eerste gesprek vrijblijvend',
                    'itemOffered' => ['@type' => 'Service', 'name' => 'Online marketing advies'],
                    'availability'=> 'https://schema.org/InStock',
                    'url'         => $base_url . '/#contact',
                ],
                [
                    '@type'       => 'Offer',
                    'name'        => 'Contact via e-mail',
                    'itemOffered' => ['@type' => 'Service', 'name' => 'Marketing sparringsessie'],
                    'availability'=> 'https://schema.org/InStock',
                    'url'         => $base_url . '/#contact',
                ],
            ],
        ],
        [
            '@type'     => 'Person',
            '@id'       => $base_url . '/#person-ferdi-tuinman',
            'name'      => 'Ferdi Tuinman',
            'url'       => 'https://www.ferdituinman.nl',
            'image'     => 'https://www.ferdituinman.nl/wp-content/uploads/2024/03/ferdi-tuinman-online-marketing-profiel-300x300.jpg.webp',
            'jobTitle'  => 'Online marketeer',
            'email'     => 'ferdi@degrotemarketing.nl',
            'telephone' => '+31624602947',
            'worksFor'  => ['@id' => $base_url . '/#organization'],
            'affiliation'    => ['@id' => $base_url . '/#organization'],
            'hasCredential'  => [
                ['@id' => $base_url . '/#credential-ga4'],
                ['@id' => $base_url . '/#credential-moz'],
                ['@id' => $base_url . '/#credential-google-mijn-bedrijf'],
            ],
            'knowsAbout' => [
                'SEO','Contentmarketing','SEA','Google Ads','Social media','Campagnes',
                'Websites','WordPress websites','Webshops','WooCommerce',
            ],
            'knowsLanguage' => ['@type' => 'Language', 'name' => 'Nederlands', 'alternateName' => 'nl-NL'],
            'sameAs' => [
                'https://www.linkedin.com/in/ferdituinman/',
                'https://www.facebook.com/profile.php?id=61589915847593',
            ],
        ],
        [
            '@type'       => 'ContactPoint',
            '@id'         => $base_url . '/#contact',
            'contactType' => 'customer service',
            'email'       => 'ferdi@degrotemarketing.nl',
            'telephone'   => '+31624602947',
            'availableLanguage' => ['nl-NL'],
            'areaServed' => ['@type' => 'City', 'name' => 'Groningen'],
        ],
        [
            '@type'       => 'WebSite',
            '@id'         => $base_url . '/#website',
            'name'        => 'De Grote Marketing',
            'url'         => $base_url . '/',
            'description' => 'De Grote Marketing helpt ondernemers in Groningen met eerlijke, simpele online marketing.',
            'inLanguage'  => 'nl-NL',
            'publisher'   => ['@id' => $base_url . '/#organization'],
            'about'           => ['@id' => $base_url . '/#organization'],
            'potentialAction' => [
                '@type'       => 'SearchAction',
                'target'      => [
                    '@type'       => 'EntryPoint',
                    'urlTemplate' => $base_url . '/?s={search_term_string}',
                ],
                'query-input' => 'required name=search_term_string',
            ],
        ],
        [
            '@type'      => 'ImageObject',
            '@id'        => $base_url . '/#orgimage',
            'url'        => content_url('uploads/2026/05/horizontale-strip.png'),
            'contentUrl' => content_url('uploads/2026/05/horizontale-strip.png'),
            'caption'    => 'De Grote Marketing - online marketing Groningen',
        ],
        [
            '@type'        => 'ImageObject',
            '@id'          => $base_url . '/#logo',
            'url'          => content_url('uploads/2026/05/logo.png'),
            'contentUrl'   => content_url('uploads/2026/05/logo.png'),
            'caption'      => 'De Grote Marketing',
            'representativeOfPage' => false,
            'width'  => 1347,
            'height' => 444,
        ],
        [
            '@type'      => 'OfferCatalog',
            '@id'        => $base_url . '/#offer-catalog',
            'name'       => 'Online marketing diensten',
            'itemListElement' => dgm_offer_catalog_items($base_url),
        ],
        [
            '@type' => 'EducationalOccupationalCredential',
            '@id'   => $base_url . '/#credential-ga4',
            'name'  => 'GA4-certificaat',
            'credentialCategory' => 'certificate',
            'recognizedBy' => ['@type' => 'Organization', 'name' => 'Google'],
        ],
        [
            '@type' => 'EducationalOccupationalCredential',
            '@id'   => $base_url . '/#credential-moz',
            'name'  => 'Moz-certificaat',
            'credentialCategory' => 'certificate',
            'recognizedBy' => ['@type' => 'Organization', 'name' => 'Moz'],
        ],
        [
            '@type' => 'EducationalOccupationalCredential',
            '@id'   => $base_url . '/#credential-google-mijn-bedrijf',
            'name'  => 'Google Mijn Bedrijf-certificaat',
            'credentialCategory' => 'certificate',
            'recognizedBy' => ['@type' => 'Organization', 'name' => 'Google'],
        ],
        [
            '@type'     => 'CommunicateAction',
            '@id'       => $base_url . '/#mail-action',
            'name'      => 'Mail De Grote Marketing',
            'target'    => 'mailto:ferdi@degrotemarketing.nl',
            'agent'     => ['@id' => $base_url . '/#organization'],
            'recipient' => ['@id' => $base_url . '/#organization'],
        ],
    ];

    // Page-specific nodes
    if (is_singular('post')) {
        global $post;
        $permalink     = get_permalink();
        $date_pub      = get_the_date('Y-m-d', $post);
        $date_mod      = get_the_modified_date('Y-m-d', $post);
        $img_id        = get_post_thumbnail_id($post);
        $img_src       = $img_id ? wp_get_attachment_image_src($img_id, 'full') : null;
        $img_url       = $img_src ? $img_src[0] : content_url('uploads/2026/05/voorgroningers.png');
        $img_w         = $img_src ? (int) $img_src[1] : 1200;
        $img_h         = $img_src ? (int) $img_src[2] : 630;
        $excerpt       = get_the_excerpt($post);
        $categories    = get_the_category($post->ID);
        $cat_name      = $categories ? $categories[0]->name : 'Blog';
        $tags          = get_the_tags($post->ID);

        $org_nodes[] = [
            '@type'             => 'WebPage',
            '@id'               => $permalink . '#webpage',
            'url'               => $permalink,
            'name'              => get_the_title($post) . ' - De Grote Marketing',
            'description'       => $excerpt,
            'isPartOf'          => ['@id' => $base_url . '/#website'],
            'about'             => ['@id' => $base_url . '/#organization'],
            'primaryImageOfPage'=> ['@id' => $permalink . '#primaryimage'],
            'inLanguage'        => 'nl-NL',
            'breadcrumb'        => ['@id' => $permalink . '#breadcrumb'],
        ];
        $org_nodes[] = [
            '@type'               => 'ImageObject',
            '@id'                 => $permalink . '#primaryimage',
            'url'                 => $img_url,
            'contentUrl'          => $img_url,
            'caption'             => get_the_title($post),
            'representativeOfPage'=> true,
            'width'               => $img_w,
            'height'              => $img_h,
        ];
        $word_count    = str_word_count(strip_tags(get_the_content()));
        $read_min      = max(1, (int) ceil($word_count / 200));
        $org_nodes[] = [
            '@type'           => 'BlogPosting',
            '@id'             => $permalink . '#article',
            'headline'        => get_the_title($post),
            'description'     => $excerpt,
            'datePublished'   => $date_pub,
            'dateModified'    => $date_mod,
            'inLanguage'      => 'nl-NL',
            'url'             => $permalink,
            'mainEntityOfPage'=> ['@id' => $permalink . '#webpage'],
            'image'           => ['@id' => $permalink . '#primaryimage'],
            'author'          => ['@id' => $base_url . '/#person-ferdi-tuinman'],
            'publisher'       => ['@id' => $base_url . '/#organization'],
            'isPartOf'        => ['@type' => 'Blog', 'name' => 'Blog - De Grote Marketing', 'url' => $base_url . '/blog/'],
            'about'           => array_map(fn($t) => ['@type' => 'Thing', 'name' => $t->name], $tags ?: []),
            'keywords'        => $tags ? array_map(fn($t) => $t->name, $tags) : [],
            'wordCount'       => $word_count,
            'articleSection'  => $cat_name,
            'timeRequired'    => 'PT' . $read_min . 'M',
        ];
        $org_nodes[] = [
            '@type' => 'BreadcrumbList',
            '@id'   => $permalink . '#breadcrumb',
            'itemListElement' => [
                ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => $base_url . '/'],
                ['@type' => 'ListItem', 'position' => 2, 'name' => 'Blog', 'item' => $base_url . '/blog/'],
                ['@type' => 'ListItem', 'position' => 3, 'name' => get_the_title($post)],
            ],
        ];
    } elseif (is_page_template([
        'template-seo-groningen.php',
        'template-google-ads-groningen.php',
        'template-contentmarketing-groningen.php',
        'template-website-groningen.php',
    ])) {
        $tpl         = get_page_template_slug();
        $permalink   = get_permalink();
        $page_title  = get_the_title();
        $page_desc   = get_the_excerpt();

        $service_map = [
            'template-seo-groningen.php'             => ['slug' => 'seo',              'name' => 'SEO Groningen',                  'type' => 'SEO'],
            'template-google-ads-groningen.php'      => ['slug' => 'google-ads',       'name' => 'Google Ads Groningen',           'type' => 'Google Ads'],
            'template-contentmarketing-groningen.php'=> ['slug' => 'contentmarketing', 'name' => 'Contentmarketing Groningen',     'type' => 'Contentmarketing'],
            'template-website-groningen.php'         => ['slug' => 'websites',         'name' => 'Website laten maken Groningen',  'type' => 'Webdesign'],
        ];
        $svc = $service_map[$tpl];

        $org_nodes[] = [
            '@type'              => 'WebPage',
            '@id'                => $permalink . '#webpage',
            'url'                => $permalink,
            'name'               => $page_title . ' - De Grote Marketing',
            'description'        => $page_desc ?: 'Online marketing voor ondernemers in Groningen.',
            'isPartOf'           => ['@id' => $base_url . '/#website'],
            'about'              => ['@id' => $base_url . '/#service-' . $svc['slug']],
            'primaryImageOfPage' => ['@id' => $base_url . '/#orgimage'],
            'inLanguage'         => 'nl-NL',
            'breadcrumb'         => ['@id' => $permalink . '#breadcrumb'],
        ];
        $org_nodes[] = [
            '@type'       => 'Service',
            '@id'         => $permalink . '#service',
            'name'        => $svc['name'],
            'serviceType' => $svc['type'],
            'url'         => $permalink,
            'provider'    => ['@id' => $base_url . '/#organization'],
            'areaServed'  => [
                ['@type' => 'City', 'name' => 'Groningen'],
                ['@type' => 'AdministrativeArea', 'name' => 'Provincie Groningen'],
            ],
            'availableLanguage' => [['@type' => 'Language', 'name' => 'Nederlands', 'alternateName' => 'nl-NL']],
            'audience'    => ['@type' => 'Audience', 'audienceType' => 'MKB-ondernemers in Groningen'],
        ];
        $org_nodes[] = [
            '@type' => 'BreadcrumbList',
            '@id'   => $permalink . '#breadcrumb',
            'itemListElement' => [
                ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home',      'item' => $base_url . '/'],
                ['@type' => 'ListItem', 'position' => 2, 'name' => $svc['name'],'item' => $permalink],
            ],
        ];
    } elseif (is_page_template('template-contact.php')) {
        $contact_url = $base_url . '/contact/';
        $org_nodes[] = [
            '@type'              => 'ContactPage',
            '@id'                => $contact_url . '#webpage',
            'url'                => $contact_url,
            'name'               => 'Contact - De Grote Marketing',
            'description'        => 'Neem contact op met De Grote Marketing. Eerlijk gesprek, geen verplichtingen.',
            'isPartOf'           => ['@id' => $base_url . '/#website'],
            'about'              => ['@id' => $base_url . '/#organization'],
            'inLanguage'         => 'nl-NL',
            'breadcrumb'         => ['@id' => $contact_url . '#breadcrumb'],
        ];
        $org_nodes[] = [
            '@type' => 'BreadcrumbList',
            '@id'   => $contact_url . '#breadcrumb',
            'itemListElement' => [
                ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home',    'item' => $base_url . '/'],
                ['@type' => 'ListItem', 'position' => 2, 'name' => 'Contact', 'item' => $contact_url],
            ],
        ];
    } else {
        $current_url = home_url(add_query_arg(null, null));
        $is_home     = is_front_page();
        $img_url     = content_url('uploads/2026/05/horizontale-strip.png');

        $org_nodes[] = [
            '@type'              => 'ImageObject',
            '@id'                => $base_url . '/#primaryimage',
            'url'                => $img_url,
            'contentUrl'         => $img_url,
            'caption'            => 'De Grote Marketing',
            'representativeOfPage' => true,
        ];
        $org_nodes[] = [
            '@type'              => 'WebPage',
            '@id'                => $base_url . ($is_home ? '/' : '/blog/') . '#webpage',
            'url'                => $base_url . ($is_home ? '/' : '/blog/'),
            'name'               => $is_home ? 'Online marketing voor ondernemers in Groningen' : 'Blog - De Grote Marketing',
            'description'        => $is_home
                ? 'De Grote Marketing helpt ondernemers in Groningen met eerlijke, simpele online marketing.'
                : 'Lezen of doen? Schrijven doen we alleen als er wat te zeggen is.',
            'isPartOf'           => ['@id' => $base_url . '/#website'],
            'about'              => ['@id' => $base_url . '/#organization'],
            'mainEntity'         => ['@id' => $base_url . '/#organization'],
            'primaryImageOfPage' => ['@id' => $base_url . '/#primaryimage'],
            'inLanguage'         => 'nl-NL',
        ] + ($is_home ? [] : ['breadcrumb' => ['@id' => $base_url . '/blog/#breadcrumb']]);
        if (!$is_home) {
            $org_nodes[] = [
                '@type' => 'BreadcrumbList',
                '@id'   => $base_url . '/blog/#breadcrumb',
                'itemListElement' => [
                    ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => $base_url . '/'],
                    ['@type' => 'ListItem', 'position' => 2, 'name' => 'Blog'],
                ],
            ];
        }
    }

    echo '<script type="application/ld+json">' . wp_json_encode([
        '@context' => 'https://schema.org',
        '@graph'   => $org_nodes,
    ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . '</script>' . "\n";
}

function dgm_offer_catalog_items(string $base_url): array {
    $service_pages = [
        'seo'              => '/seo-groningen/',
        'google-ads'       => '/google-ads-groningen/',
        'contentmarketing' => '/contentmarketing-groningen/',
        'websites'         => '/website-groningen/',
    ];

    $services = [
        'seo'                    => 'SEO',
        'contentmarketing'       => 'Contentmarketing',
        'sea'                    => 'SEA',
        'google-ads'             => 'Google Ads',
        'social-media'           => 'Social media',
        'campagnes'              => 'Campagnes',
        'websites'               => 'Websites',
        'wordpress-websites'     => 'WordPress websites',
        'webshops'               => 'Webshops',
        'woocommerce'            => 'WooCommerce',
        'website-optimalisatie'  => 'Website optimalisatie',
        'technische-optimalisatie'=> 'Technische optimalisatie',
        'zoekwoordenonderzoek'   => 'Zoekwoordenonderzoek',
        'linkbuilding'           => 'Linkbuilding',
        'seo-copywriting'        => 'SEO-copywriting',
        'webteksten'             => 'Webteksten',
        'blogartikelen'          => 'Blogartikelen',
        'contentstrategie'       => 'Contentstrategie',
        'online-marketing-advies'=> 'Online marketing advies',
        'marketingstrategie'     => 'Marketingstrategie',
        'positionering'          => 'Positionering',
        'branding'               => 'Branding',
        'conversie-optimalisatie'=> 'Conversie-optimalisatie',
        'rapportage'             => 'Rapportage',
        'sparringsessies'        => 'Sparringsessies',
        'powersessies'           => 'Powersessies',
    ];

    return array_map(function ($slug, $name) use ($base_url, $service_pages) {
        $item = [
            '@type'       => 'Service',
            '@id'         => $base_url . '/#service-' . $slug,
            'name'        => $name,
            'serviceType' => $name,
            'provider'    => ['@id' => $base_url . '/#organization'],
            'areaServed'  => ['@type' => 'City', 'name' => 'Groningen'],
        ];
        if (isset($service_pages[$slug])) {
            $item['url'] = $base_url . $service_pages[$slug];
        }
        return ['@type' => 'Offer', 'itemOffered' => $item];
    }, array_keys($services), array_values($services));
}

// ─── Footer JS: mobile menu + scroll-spy ──────────────────────────────────────
add_action('wp_footer', function () {
    ?>
<script>
(function(){
var hamburger=document.getElementById('hamburger');
var iconMenu=document.getElementById('icon-menu');
var iconClose=document.getElementById('icon-close');
var mobileMenu=document.getElementById('mobile-menu');
if(!hamburger||!mobileMenu)return;
function mmOpen(){
  mobileMenu.style.transform='translateX(0)';
  mobileMenu.setAttribute('aria-hidden','false');
  hamburger.setAttribute('aria-expanded','true');
  iconMenu.style.display='none';
  iconClose.style.display='';
  document.body.style.overflow='hidden';
  mobileMenu.querySelectorAll('.mm-item').forEach(function(el,i){
    el.style.transitionDelay=(80+i*80)+'ms';
    el.style.opacity='1';
    el.style.transform='translateX(0)';
  });
}
function mmClose(){
  mobileMenu.querySelectorAll('.mm-item').forEach(function(el){
    el.style.transitionDelay='0ms';
    el.style.opacity='0';
    el.style.transform='translateX(40px)';
  });
  mobileMenu.style.transform='translateX(100%)';
  mobileMenu.setAttribute('aria-hidden','true');
  hamburger.setAttribute('aria-expanded','false');
  iconMenu.style.display='';
  iconClose.style.display='none';
  document.body.style.overflow='';
}
hamburger.addEventListener('click',function(){
  mobileMenu.getAttribute('aria-hidden')==='false'?mmClose():mmOpen();
});
mobileMenu.querySelectorAll('a').forEach(function(link){
  link.addEventListener('click',mmClose);
});
})();
</script>
    <?php
});

// ─── Sectie-afbeeldingen meta box (native WP, geen plugin) ────────────────────
add_action('add_meta_boxes', function () {
    $service_templates = [
        'template-seo-groningen.php',
        'template-google-ads-groningen.php',
        'template-contentmarketing-groningen.php',
        'template-website-groningen.php',
    ];
    add_meta_box(
        'dgm_section_images',
        'Sectie-afbeeldingen',
        function ($post) use ($service_templates) {
            $tpl = get_page_template_slug($post->ID);
            if (!in_array($tpl, $service_templates, true)) {
                echo '<p style="color:#888">Alleen beschikbaar op servicepaginas.</p>';
                return;
            }
            wp_nonce_field('dgm_section_images_save', 'dgm_section_images_nonce');
            $labels = ['Sectie-afbeelding 1', 'Sectie-afbeelding 2', 'Sectie-afbeelding 3'];
            for ($i = 1; $i <= 3; $i++) :
                $val = (int) get_post_meta($post->ID, '_dgm_section_img_' . $i, true);
                $preview = $val ? wp_get_attachment_image_url($val, 'thumbnail') : '';
                ?>
                <div style="margin-bottom:16px">
                  <label style="display:block;font-weight:600;margin-bottom:6px"><?php echo esc_html($labels[$i-1]); ?></label>
                  <input type="hidden" name="dgm_section_img_<?php echo $i; ?>" id="dgm_section_img_<?php echo $i; ?>" value="<?php echo esc_attr($val ?: ''); ?>"/>
                  <?php if ($preview) : ?>
                  <img id="dgm_section_img_<?php echo $i; ?>_preview" src="<?php echo esc_url($preview); ?>" style="display:block;max-width:120px;height:auto;margin-bottom:6px;border-radius:4px"/>
                  <?php else : ?>
                  <img id="dgm_section_img_<?php echo $i; ?>_preview" src="" style="display:none;max-width:120px;height:auto;margin-bottom:6px;border-radius:4px"/>
                  <?php endif; ?>
                  <button type="button" class="button dgm-img-select" data-field="dgm_section_img_<?php echo $i; ?>">Afbeelding kiezen</button>
                  <button type="button" class="button dgm-img-remove" data-field="dgm_section_img_<?php echo $i; ?>" style="margin-left:4px<?php echo $val ? '' : ';display:none'; ?>">Verwijderen</button>
                </div>
                <?php
            endfor;
        },
        'page',
        'side',
        'default'
    );
});

add_action('admin_enqueue_scripts', function ($hook) {
    if (!in_array($hook, ['post.php', 'post-new.php'], true)) return;
    wp_enqueue_media();
    wp_add_inline_script('media-upload', "
jQuery(function($){
  $('.dgm-img-select').on('click', function(){
    var field = $(this).data('field');
    var frame = wp.media({ title: 'Kies afbeelding', button: { text: 'Selecteren' }, multiple: false });
    frame.on('select', function(){
      var att = frame.state().get('selection').first().toJSON();
      $('#'+field).val(att.id);
      var thumb = att.sizes && att.sizes.thumbnail ? att.sizes.thumbnail.url : att.url;
      $('#'+field+'_preview').attr('src', thumb).show();
      $('[data-field=\"'+field+'\"].dgm-img-remove').show();
    });
    frame.open();
  });
  $('.dgm-img-remove').on('click', function(){
    var field = $(this).data('field');
    $('#'+field).val('');
    $('#'+field+'_preview').attr('src','').hide();
    $(this).hide();
  });
});
");
});

add_action('save_post_page', function ($post_id) {
    if (!isset($_POST['dgm_section_images_nonce'])) return;
    if (!wp_verify_nonce($_POST['dgm_section_images_nonce'], 'dgm_section_images_save')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_page', $post_id)) return;
    for ($i = 1; $i <= 3; $i++) {
        $key = 'dgm_section_img_' . $i;
        if (isset($_POST[$key])) {
            $val = absint($_POST[$key]);
            if ($val) {
                update_post_meta($post_id, '_' . $key, $val);
            } else {
                delete_post_meta($post_id, '_' . $key);
            }
        }
    }
});

// ─── Content setup on theme activation ────────────────────────────────────────
add_action('after_switch_theme', 'dgm_setup_content');
function dgm_setup_content() {
    // Home page
    $home = get_page_by_path('home');
    if (!$home) {
        $home_id = wp_insert_post([
            'post_title'   => 'Online marketing voor ondernemers in Groningen',
            'post_name'    => 'home',
            'post_status'  => 'publish',
            'post_type'    => 'page',
            'post_content' => '',
        ]);
        update_option('page_on_front', $home_id);
        update_option('show_on_front', 'page');
    }

    // Blog page
    $blog = get_page_by_path('blog');
    if (!$blog) {
        $blog_id = wp_insert_post([
            'post_title'  => 'Blog',
            'post_name'   => 'blog',
            'post_status' => 'publish',
            'post_type'   => 'page',
            'post_content'=> '',
        ]);
        if ($blog_id && !is_wp_error($blog_id)) {
            update_post_meta($blog_id, '_wp_page_template', 'template-blog.php');
        }
    }

    // Ensure category "SEO" exists
    $seo_cat_id = get_cat_ID('SEO');
    if (!$seo_cat_id) {
        $result     = wp_insert_term('SEO', 'category');
        $seo_cat_id = is_wp_error($result) ? 0 : $result['term_id'];
    }

    // Blog post 1
    $existing1 = get_posts(['name' => 'seo-voor-groningse-ondernemers', 'post_type' => 'post', 'numberposts' => 1]);
    if (!$existing1) {
        $post1_id = wp_insert_post([
            'post_title'    => 'SEO voor Groningse ondernemers: begin hier.',
            'post_name'     => 'seo-voor-groningse-ondernemers',
            'post_status'   => 'publish',
            'post_type'     => 'post',
            'post_date'     => '2026-04-28 09:00:00',
            'post_category' => [$seo_cat_id],
            'tags_input'    => ['SEO', 'Groningen', 'lokale SEO'],
            'post_excerpt'  => 'Vergeet de 80 tips. Drie dingen op orde, en je staat al ergens. Praktische SEO voor Groningse ondernemers.',
            'post_content'  => dgm_post1_content(),
        ]);
        $thumb1 = dgm_get_attachment_id('voorgroningers.png');
        if ($thumb1 && $post1_id && !is_wp_error($post1_id)) {
            set_post_thumbnail($post1_id, $thumb1);
        }
    }

    // Blog post 2
    $existing2 = get_posts(['name' => 'waarom-je-geen-dure-website-nodig-hebt', 'post_type' => 'post', 'numberposts' => 1]);
    if (!$existing2) {
        $post2_id = wp_insert_post([
            'post_title'   => 'Waarom je geen dure website nodig hebt.',
            'post_name'    => 'waarom-je-geen-dure-website-nodig-hebt',
            'post_status'  => 'publish',
            'post_type'    => 'post',
            'post_date'    => '2026-05-16 09:00:00',
            'post_excerpt' => 'Misschien heb je een nieuwe site nodig. Maar laten we eerst even koffie drinken, want het echte probleem is vaker het verhaal dan de techniek.',
            'post_content' => dgm_post2_content(),
        ]);
        $thumb2 = dgm_get_attachment_id('geen-leverancier.png');
        if ($thumb2 && $post2_id && !is_wp_error($post2_id)) {
            set_post_thumbnail($post2_id, $thumb2);
        }
    }

    // Flush rewrite rules
    flush_rewrite_rules();
}

function dgm_get_attachment_id(string $filename): int {
    global $wpdb;
    $id = $wpdb->get_var($wpdb->prepare(
        "SELECT post_id FROM {$wpdb->postmeta} WHERE meta_key='_wp_attached_file' AND meta_value LIKE %s LIMIT 1",
        '%' . $filename
    ));
    return (int) $id;
}

function dgm_post1_content(): string {
    return '<p><strong>Ondernemers vragen me elke week: "Hoe kom ik hoger in Google?" Dan zucht ik even, schenk koffie in, en vertel het simpele verhaal. Want SEO is niet ingewikkeld. SEO is <em>geduldig</em>.</strong></p>

<p>Hier is wat eerst moet. In deze volgorde. Niks meer, niks minder.</p>

<h2>1. Zorg dat Google snapt wie je bent en waar je zit.</h2>

<p>Klinkt gek, maar 8 op de 10 sites die ik open weet Google niet eens wat ze precies doen. Geen duidelijke titels, geen plaatsnaam, geen schema. Begin hier:</p>

<ul>
<li>Eén pagina, één onderwerp. Niet "Wij doen alles" -wel "Loodgieter in Helpman".</li>
<li>Plaatsnaam in titel, h1, en in de eerste alinea. Gewoon zeggen waar je zit.</li>
<li>Google Mijn Bedrijf compleet invullen. Openingstijden, foto\'s, recente reviews.</li>
</ul>

<p>Dat eerste punt is goud. De helft van de Groningse zzp\'ers timmert pagina\'s vol met "wij zijn een ervaren team" -terwijl Google gewoon wil weten <strong>wat</strong> je doet en <strong>waar</strong>.</p>

<aside class="my-12 border-l-4 border-primary-container pl-6 py-4 bg-[#078930]/5 rounded-r-lg">
<p class="text-xs font-bold uppercase tracking-widest text-primary-container mb-2">Kloar-tip</p>
<p class="text-lg leading-relaxed">Open je eigen homepage. Lees de eerste zin hardop. Snapt een vreemde binnen 5 seconden wat je doet en waar? Nee? Daar begin je.</p>
</aside>

<h2>2. Schrijf één pagina per zoekvraag.</h2>

<p>Niet één pagina "Diensten" met tien dingen eronder. Wel: tien aparte pagina\'s, elk voor één concrete zoekvraag. "WordPress website laten maken Groningen." "SEO check zzp." "Webshop hulp Stad."</p>

<p>Per pagina: wat het probleem is, hoe jij het oplost, wat het kost (of in welke richting), en een knop. Geen lulverhaal. Niemand leest "Bij ons staat de klant centraal." We weten dat al.</p>

<h3>Hoe lang moet zo\'n pagina zijn?</h3>

<p>Zo lang als nodig. 400 woorden kan prima. 1.200 ook. Niet langer dan je verhaal toelaat. Vulwoorden ruikt Google inmiddels van een kilometer.</p>

<h2>3. Eén goede backlink per maand. Meer niet.</h2>

<p>Vergeet linkbuilding-tools, vergeet "Tier 2 outreach", vergeet Fiverr. Eén echte vermelding per maand op een plek die er toe doet -lokale krant, brancheorganisatie, een klant die je noemt -is meer waard dan 100 obscure forum-links.</p>

<p>Bel een paar mensen die je kent. Vraag of ze je noemen in een blog, een lijstje, of op hun "partners"-pagina. Klaar. Volgende maand weer iemand.</p>

<h2>Dat was \'m.</h2>

<p>Echt. Verder hoeft het niet ingewikkeld. Doe deze drie dingen consequent een half jaar lang en je staat verder dan 80% van de Groningse ondernemers in jouw vak.</p>

<p>Heb je hulp nodig? <a href="/contact/">Neem contact op</a>. Eerste gesprek altijd vrijblijvend. Aan de keukentafel.</p>

<p class="font-bold text-primary-container text-xl mt-12">Kloar.</p>';
}

// ─── Sitemap ──────────────────────────────────────────────────────────────────
add_filter('wp_sitemaps_enabled', '__return_false');

add_filter('robots_txt', function (string $output): string {
    return $output . "\nSitemap: " . home_url('/sitemap_index.xml') . "\n";
});

add_action('template_redirect', 'dgm_sitemap_handler');
function dgm_sitemap_handler(): void {
    $path = rtrim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
    $map  = [
        '/sitemap_index' => 'index',
        '/sitemap-pages' => 'pages',
        '/sitemap-posts' => 'posts',
    ];
    $key = preg_replace('/\.xml$/', '', $path);
    if (!isset($map[$key])) return;
    dgm_sitemap_output($map[$key]);
}

function dgm_sitemap_output(string $type): void {
    header('Content-Type: application/xml; charset=UTF-8');
    header('X-Robots-Tag: noindex');

    if ($type === 'index') {
        $last = dgm_sitemap_last_mod();
        echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        echo '<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
        echo '  <sitemap><loc>' . esc_url(home_url('/sitemap-pages.xml')) . '</loc><lastmod>' . date('Y-m-d') . '</lastmod></sitemap>' . "\n";
        echo '  <sitemap><loc>' . esc_url(home_url('/sitemap-posts.xml')) . '</loc><lastmod>' . esc_html($last) . '</lastmod></sitemap>' . "\n";
        echo '</sitemapindex>' . "\n";
        exit;
    }

    if ($type === 'pages') {
        $urls = dgm_sitemap_page_urls();
        echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
        foreach ($urls as $u) {
            echo '  <url><loc>' . esc_url($u['url']) . '</loc><lastmod>' . esc_html($u['mod']) . '</lastmod></url>' . "\n";
        }
        echo '</urlset>' . "\n";
        exit;
    }

    if ($type === 'posts') {
        $posts = get_posts(['numberposts' => -1, 'post_status' => 'publish', 'orderby' => 'modified', 'order' => 'DESC']);
        echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
        foreach ($posts as $post) {
            echo '  <url><loc>' . esc_url(get_permalink($post)) . '</loc><lastmod>' . esc_html(mysql2date('Y-m-d', $post->post_modified_gmt)) . '</lastmod></url>' . "\n";
        }
        echo '</urlset>' . "\n";
        exit;
    }
}

function dgm_sitemap_page_urls(): array {
    $urls = [['url' => home_url('/'), 'mod' => date('Y-m-d')]];

    $templates = [
        'template-seo-groningen.php',
        'template-google-ads-groningen.php',
        'template-contentmarketing-groningen.php',
        'template-website-groningen.php',
        'template-contact.php',
    ];
    foreach ($templates as $tpl) {
        $pages = get_pages(['meta_key' => '_wp_page_template', 'meta_value' => $tpl, 'post_status' => 'publish']);
        foreach ($pages as $page) {
            $urls[] = [
                'url' => get_permalink($page->ID),
                'mod' => mysql2date('Y-m-d', $page->post_modified_gmt ?: $page->post_date_gmt),
            ];
        }
    }

    $blog_id = (int) get_option('page_for_posts');
    if ($blog_id) {
        $urls[] = ['url' => get_permalink($blog_id), 'mod' => dgm_sitemap_last_mod()];
    }

    return $urls;
}

function dgm_sitemap_last_mod(): string {
    $posts = get_posts(['numberposts' => 1, 'post_status' => 'publish', 'orderby' => 'modified', 'order' => 'DESC']);
    return $posts ? mysql2date('Y-m-d', $posts[0]->post_modified_gmt) : date('Y-m-d');
}

function dgm_post2_content(): string {
    return '<p><strong>"Ik heb vast een nieuwe website nodig."</strong></p>

<p>Misschien. Maar laten we eerst even koffie drinken.</p>

<p>Want wat we vaker tegenkomen: een ondernemer met een goed verhaal, tevreden klanten, en een website die dat verhaal gewoon niet vertelt. Niet omdat de site zo oud is. Maar omdat er nooit goed over is nagedacht wat er eigenlijk op moest staan.</p>

<p>En dat is iets heel anders dan een nieuwe website nodig hebben.</p>

<h2>Wat maakt jou nu eigenlijk bijzonder?</h2>

<p>Dat is de vraag die we stellen als iemand bij ons aanklopt. Niet "wat doe je?". Dat weten we wel. Maar wat maakt jou de logische keuze voor iemand in Groningen die precies jouw dienst zoekt?</p>

<p>Soms duurt het antwoord tien minuten. Soms een uur. Maar als het er eenmaal is, wordt alles makkelijker. De tekst op de homepage. De manier waarop je jezelf voorstelt. De reden waarom mensen niet weggaan zonder te bellen.</p>

<p>Dat noemen wij een makeover. Zelfde techniek, nieuwe boodschap. Geen nieuw platform, geen nieuw systeem, geen maandenlang traject. Gewoon: eindelijk zeggen wat je te zeggen hebt.</p>

<aside class="my-12 border-l-4 border-primary-container pl-6 py-4 bg-[#078930]/5 rounded-r-lg not-prose">
<p class="text-xs font-bold uppercase tracking-widest text-primary-container mb-2">Kloar-tip</p>
<p class="text-lg leading-relaxed">Vraag drie klanten waarom ze voor jou kozen. Niet wat je doet, maar waarom jij. Dat antwoord hoort op je homepage. Staat het er? Dan is er werk aan de winkel.</p>
</aside>

<p>Een stoffenwinkel nam contact op. De site zag eruit als een webshop: artikelnummers, categorieën, filters. Terwijl de winkel zelf precies het tegenovergestelde was: een plek waar je binnenloopt, je verhaal doet, en met het juiste advies naar huis gaat.</p>

<p>We hebben de site laten staan. Maar er een nieuwe homepage overheen getrokken. Persoonlijk contact voorop, advies op maat, de mens achter de toonbank. Geen nieuwe techniek. Wel een heel ander eerste gevoel.</p>

<p>Dat is soms alles wat nodig is.</p>

<p>Benieuwd wat er bij jou op tafel komt? <a href="/contact/">Neem contact op</a>. Eerste gesprek altijd vrijblijvend.</p>

<p class="font-bold text-primary-container text-xl mt-12">Kloar.</p>';
}

