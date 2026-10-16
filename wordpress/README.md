# Exa WordPress theme

Upload `exa-home-services.zip` through **Appearance → Themes → Add New → Upload Theme**, then activate **Exa Home Services**.

The theme renders the existing Exa homepage automatically on the site front page. It does not replace existing posts, pages, or database content. It includes the mobile and desktop layouts, banners, service cards, all 49 spreadsheet services, Aircon unit pricing, and WhatsApp booking links.

Open **Appearance → Exa Services & Pricing** to edit all prices, the currency label, and the contact / WhatsApp phone number. Blank prices request a quote; zero remains a valid price. The initial phone number is the placeholder from the static site and must be replaced before launch. Currency starts empty because the source workbook does not specify it.

Change the site title under **Settings → General**. Normal WordPress pages and posts use the fallback content template. Homepage text, banner images, and navigation are in `front-page.php`; this version uses a custom classic theme, not Elementor or Gutenberg page layouts.

## Development

The original static preview remains at the repository root. `scripts/build-wordpress.py` generated the initial theme templates; rerunning it overwrites generated template/assets changes. Maintain the theme directly after conversion. `functions.php` is maintained separately.

To package: zip the `exa-home-services` folder with that folder at the root of the archive. Keep PHP and WordPress updated on your hosting.

Styling and Swiper libraries are bundled locally. The existing Tailwind browser runtime is retained for design parity; the font files and testimonial photographs still use external URLs. The theme does not add payments or a booking database: bookings continue through WhatsApp.

Activation on the destination WordPress installation and plugin compatibility must be checked before publishing. No live site has been modified by creating this package.
