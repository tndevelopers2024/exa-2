"""Build the initial classic WordPress theme from the approved static site."""
from pathlib import Path
import re
import json
import shutil

root = Path(__file__).resolve().parents[1]
theme = root / 'wordpress' / 'exa-home-services'
theme.mkdir(parents=True, exist_ok=True)
shutil.copytree(root / 'assets', theme / 'assets', dirs_exist_ok=True)
html = (root / 'index.html').read_text()
css = re.search(r'<style>(.*?)</style>', html, re.S).group(1)
(theme / 'style.css').write_text('''/*
Theme Name: Exa Home Services
Description: Responsive Exa service catalogue with editable pricing and WhatsApp booking.
Version: 1.0.0
Requires at least: 6.0
Requires PHP: 7.4
Text Domain: exa-home-services
*/
''' + css + '\n.exa-content { max-width:1000px; margin:48px auto; padding:24px; }\n.exa-content p { margin-block:16px; }\n')
scripts = re.findall(r'<script>(.*?)</script>', html, re.S)
app = scripts[-1]
app = app.replace("const PHONE = '919876543210';", "const PHONE = exaSettings.phone;")
app = re.sub(r"(['\"])assets/", r"\1__EXA_ASSETS__/", app)
app = app.replace('__EXA_ASSETS__/', '${exaSettings.assets}')
# Asset paths in ordinary JS string literals need template literals.
app = re.sub(r"'([^'\n]*\$\{exaSettings.assets\}[^'\n]*)'", r'`\1`', app)
app = app.replace('price.toLocaleString(\'en\')', "formatPrice(price)")
app = "const servicePricing = exaSettings.pricing;\nconst formatPrice = price => [exaSettings.currency, price.toLocaleString('en')].filter(Boolean).join(' ');\n" + app
(theme / 'assets' / 'app.js').write_text(app)
data = (root / 'assets' / 'service-pricing.js').read_text().split('const servicePricing = ', 1)[1].strip().rstrip(';')
(theme / 'assets' / 'pricing.json').write_text(json.dumps(json.loads(data), indent=2))
# The WordPress catalogue is injected from the saved settings rather than the static JS file.
(theme / 'assets' / 'service-pricing.js').unlink()
body = re.search(r'<body>(.*?)<script src="assets/service-pricing.js">', html, re.S).group(1)
body = re.sub(r'<!--.*?-->', '', body, flags=re.S)
body = re.sub(r'src="assets/([^"]+)"', lambda m: 'src="<?php echo esc_url(get_theme_file_uri(\'assets/' + m.group(1) + '\')); ?>"', body)
body = body.replace('https://wa.me/919876543210', "<?php echo esc_url('https://wa.me/' . exa_phone()); ?>")
body = body.replace('tel:+919876543210', "<?php echo esc_url('tel:+' . exa_phone()); ?>")
body = re.sub(r'\+91 98765\s+43210', '<?php echo esc_html(\'+\' . exa_phone()); ?>', body)
body = body.replace('Currency is to be confirmed.', '<?php if (!get_option(\'exa_currency\')) : ?>Currency is to be confirmed.<?php endif; ?>')
(theme / 'front-page.php').write_text("<?php\nif (!defined('ABSPATH')) { exit; }\nget_header();\n?>\n" + body + "\n<?php get_footer(); ?>\n")
(theme / 'header.php').write_text('''<?php if (!defined('ABSPATH')) { exit; } ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
''')
(theme / 'footer.php').write_text('''<?php if (!defined('ABSPATH')) { exit; } ?>
<?php wp_footer(); ?>
</body>
</html>
''')
(theme / 'index.php').write_text('''<?php
if (!defined('ABSPATH')) { exit; }
get_header(); ?>
<main class="exa-content">
  <a href="<?php echo esc_url(home_url('/')); ?>">← <?php bloginfo('name'); ?></a>
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <article <?php post_class(); ?>>
      <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
      <?php the_content(); wp_link_pages(); ?>
    </article>
  <?php endwhile; the_posts_pagination(); else : ?>
    <h1><?php esc_html_e('Nothing found', 'exa-home-services'); ?></h1>
    <?php get_search_form(); ?>
  <?php endif; ?>
</main>
<?php get_footer(); ?>
''')
print(f'Created theme in {theme}')
