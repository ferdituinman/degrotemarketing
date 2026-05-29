# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## No Build Step

This theme has **no build tooling**. No npm, no webpack, no Vite. `style.css` is pre-compiled Tailwind v4 — edit it directly. Deploy the files as-is.

## Theme Structure

Classic WordPress template hierarchy (not a block/FSE theme):

- `functions.php` — all hooks, enqueuing, schema JSON-LD, inline JS, theme-activation content seeding
- `style.css` — compiled Tailwind v4.2.4 + Public Sans fonts + custom classes
- `header.php` / `footer.php` — site chrome
- `front-page.php` — homepage
- `single.php` — blog post
- `template-blog.php` — blog archive (assign via page template dropdown)
- `fonts/` — 4× WOFF2 Public Sans (normal + italic, Latin + Latin-Ext)

## Key Conventions

**CSS**: Tailwind utility-first. Custom classes live at the bottom of `style.css`:
- `.prose-dgm` — blog post typography
- `.archief-*` — blog grid layout
- `.drift-on-hover`, `.fade-in-up` — animations
- `.hand-drawn-line` — SVG decoration

**JavaScript**: All vanilla JS is inlined via `wp_footer` hook in `functions.php`. No external libraries, no jQuery.

**Images**: Hosted in `wp-content/uploads/`. Always include `width`, `height`, `srcset`, and `sizes`. Hero image uses `fetchpriority="high"`. Lazy-load everything below the fold.

**Fonts**: Preloaded in `wp_head`. Never load from Google Fonts or any CDN — all files are local WOFF2.

**Schema**: Comprehensive JSON-LD generated in `functions.php` (`dgm_schema_output()`). Context-aware: homepage outputs Organization + Services, posts output Article + Breadcrumb.

## Performance Rules (non-negotiable)

- No external CDNs, no icon fonts. Inline SVG only.
- No render-blocking external requests.
- WordPress block-library and global-styles stylesheets are deliberately dequeued — do not re-enqueue them.
- Admin bar is intentionally hidden.

## Theme Activation

`dgm_setup_content()` fires once on `after_switch_theme` and seeds the homepage, blog page, two starter posts, and the SEO category. Do not call it manually.

## Branding

- Primary color: `#078930` (green)
- Font: Public Sans (self-hosted)
- Breakpoint: `md` = 48rem (768px)

## Bewust Slordig

Design principle: after the hero, no block may be identical to the same block on another page. Intentionally varied, not random.

Rules:
- Hero is uniform across all pages
- Variations are subtle: direction flip, vertical offset (30-80px range), decorative element rotation
- Blocks are labelled via HTML comments (`<!-- BLOK: s1 -->` etc.)
- Use inline styles for values not in compiled Tailwind

Variation matrix (as of 2026-05-28):

s1 (grid-cols-12 opener): home=beeld links -48px / SEO=tekst links +32px / Google Ads=beeld links +24px / Content=tekst links +16px / Website=beeld links geen offset
s2 (55/45 split): home=tekst links +48px / SEO=beeld links +16px / Google Ads=tekst links -24px / Content=beeld links +32px / Website=tekst links geen offset
s3 (flex tekst + stappenkaart): SEO=tekst links / Google Ads=kaart links / Website=tekst links andere rotatie
s5 (quote border-left): home=max-w-4xl ml-14 / SEO=max-w-4xl ml-24px / Website=max-w-2xl ml-14
