# SEO fixes - degrotemarketing.nl

Audit: 2026-05-26. GMB: https://g.page/r/CWX6WXast_lxEBM/

## Te doen (functions.php tenzij anders vermeld)

### Critical
- [ ] 1. Yoast schema onderdrukken - `wpseo_json_ld_output` + `wpseo_schema_graph` filter toevoegen
- [ ] 2. og:title bug regel 92 - `'De Grote Marketing -Online'` -> `'De Grote Marketing - Online'`

### High
- [ ] 3. #primaryimage @id conflict op posts - regel 348/364/342: `$base_url . '/#primaryimage'` -> `$permalink . '#primaryimage'`
- [ ] 4. BlogPosting datumformat - regels 326-327: `Y-m-d` -> full ISO 8601 via `get_post_datetime()->format('c')`
- [ ] 5. sample-page uit sitemap - Yoast filter `wpseo_exclude_from_sitemap_by_post_ids`
- [ ] 6. Author archive uitschakelen - Yoast filter `wpseo_option_titles` noindex-author

### Medium
- [ ] 9. Telefoonnummer footer.php regel 25 - `06-24602947` -> `+31 6 24 60 29 47`
- [ ] 10. wordCount + articleSection + timeRequired toevoegen aan BlogPosting schema
- [ ] 11. Schema string bugs - regel 338, 367, 397: `' -De Grote Marketing'` -> `' - De Grote Marketing'`
- [ ] 12. BreadcrumbList toevoegen voor blog-archief `/blog/` in else-blok
- [ ] 13. SearchAction toevoegen aan WebSite node (#website)
- [ ] 16. hasMap toevoegen aan LocalBusiness + GMB aan sameAs array
- [ ] 18. Person schema: `url`, `image`, `description` toevoegen
- [ ] 20. Geo-coordinaten naar 5 decimalen - `53.2009, 6.5559` -> `53.20090, 6.55590`
