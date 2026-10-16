# Houston's Carbon Footprint

A WordPress site about Houston's carbon emissions, with an interactive carbon-footprint calculator.

## How it fits together

| Part | Location | Role |
| --- | --- | --- |
| Theme | `wp-content/themes/carbon-theme` | Templates, styles, chart and grade JS |
| Calculator plugin | `wp-content/plugins/calc-fetcher-plugin` | Form shortcode and AJAX bridge to the Node server |
| Post types plugin | `wp-content/mu-plugins/carbon-post-types.php` | Registers the `events` and `talks` custom post types |
| Node server | `~/Desktop/calcpaymenttool` | Validates input and calculates the footprint |

```
Browser ──fetch──▶ WordPress admin-ajax (calc-fetcher-plugin)
                        │  verifies nonce, sanitises fields
                        ▼
                   Node server  POST /handle-calc  (zod validation + emission factors)
                        │  returns { footprint }
                        ▼
Browser ◀── JSON ── WordPress
  └─ index.js redraws the donut chart and grade box (no page refresh)
```

The browser never calls the Node server directly. WordPress proxies the request.

## Custom post types

Registered in the must-use plugin `carbon-post-types.php`, so they stay available whatever theme is active:

- **Events** (`events`): supports title, editor and featured image. Has an archive. Detail page is `single-events.php`.
- **Talks** (`talks`): supports title, editor, excerpt and featured image. Has an archive. Detail page is `single-talks.php`.

Both detail pages use the shared `template-parts/cpt-single.php`. The Explore child pages (The Aftermath, Conversations) list these posts as cards.

## Theme

- `front-page.php`: home page (stats, "Why Houston", solution cards, explore tiles). The stat numbers come from ACF fields.
- `page.php`: parent and child pages.
  - **Parent pages** (The Problem, Houston, Solutions, Explore) show an intro plus cards linking to their child pages.
  - **Child pages** are built from editor blocks. A block's CSS class picks its template part: `intro-section`, `card-section`, `text-image`, `connection-section` (the calculator) or `video-section`. See `get_template_order()` in `functions.php`.
  - Every child page ends with `related-sources.php`: a link to the parent and its sibling pages.
- `template-parts/`: reusable sections.
- `src/index.js`: calculator submit, donut chart (0 to 22000 kg CO2e gauge) and grade (Excellent to Horrible).
- `sass/` compiles to `css/main.css`. `_home.scss` and `_pages.scss` load last and override earlier rules.

## Local setup

1. Add to `wp-config.php`: `define('BASE_URL_SERVER', 'http://localhost:8000');`
2. Start the Node server:
   ```bash
   cd ~/Desktop/calcpaymenttool && npm install && npm run dev
   ```
   Its CORS list must include `http://carbon-footprint.local`.
3. Compile styles from the theme folder:
   ```bash
   sass --no-charset --quiet sass/main.scss css/main.css
   ```
4. Optional: `npm run sync` for Browser-Sync live reload on `localhost:3000`.

Page text, child-page blocks and card excerpts are edited in WordPress, not in the theme files.
