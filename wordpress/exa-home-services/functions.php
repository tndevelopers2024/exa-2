<?php
if (!defined('ABSPATH')) { exit; }

add_action('after_setup_theme', function () {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('html5', array('search-form', 'gallery', 'caption', 'style', 'script'));
});

function exa_phone() {
    return preg_replace('/[^0-9]/', '', get_option('exa_phone', '919876543210'));
}

function exa_default_pricing() {
    return json_decode(file_get_contents(get_theme_file_path('assets/pricing.json')), true);
}

function exa_pricing() {
    $saved = get_option('exa_pricing', array());
    $groups = exa_default_pricing();
    foreach ($groups as &$group) {
        foreach ($group['services'] as $i => &$service) {
            foreach ($service['prices'] as $j => &$price) {
                if (isset($saved[$group['id']][$i]) && array_key_exists($j, $saved[$group['id']][$i])) {
                    $price = $saved[$group['id']][$i][$j];
                }
            }
            unset($price);
        }
        unset($service);
    }
    unset($group);
    return $groups;
}

add_action('wp_enqueue_scripts', function () {
    $version = (string) max(filemtime(get_theme_file_path('style.css')), filemtime(get_theme_file_path('assets/app.js')), filemtime(get_theme_file_path('functions.php')));
    wp_enqueue_style('exa-swiper', get_theme_file_uri('assets/vendor/swiper.css'), array(), $version);
    wp_enqueue_style('exa-fonts', get_theme_file_uri('assets/vendor/inter.css'), array(), $version);
    wp_enqueue_style('exa-theme', get_stylesheet_uri(), array('exa-swiper', 'exa-fonts'), $version);
    wp_enqueue_script('exa-tailwind', get_theme_file_uri('assets/vendor/tailwind.js'), array(), $version, false);
    wp_add_inline_script('exa-tailwind', 'tailwind.config = {theme:{extend:{fontFamily:{sans:["Inter","sans-serif"],serif:["Inter","sans-serif"]}}}};');
    if (is_front_page()) {
        wp_enqueue_script('exa-swiper', get_theme_file_uri('assets/vendor/swiper.js'), array(), $version, true);
        wp_enqueue_script('exa-app', get_theme_file_uri('assets/app.js'), array('exa-swiper'), $version, true);
        $settings = array(
            'assets' => trailingslashit(get_theme_file_uri('assets')),
            'phone' => exa_phone(),
            'currency' => 'S$',
            'pricing' => exa_pricing(),
        );
        wp_add_inline_script('exa-app', 'const exaSettings = ' . wp_json_encode($settings, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) . ';', 'before');
    }
});

function exa_sanitize_phone($value) {
    $phone = preg_replace('/[^0-9]/', '', $value);
    if (strlen($phone) < 7 || strlen($phone) > 15) {
        add_settings_error('exa_phone', 'invalid_phone', 'Enter a phone number with country code (7–15 digits).');
        return get_option('exa_phone', '919876543210');
    }
    return $phone;
}

function exa_sanitize_prices($input) {
    $result = array();
    $previous = exa_pricing();
    foreach ($previous as $group) {
        foreach ($group['services'] as $i => $service) {
            foreach ($service['prices'] as $j => $current) {
                $value = isset($input[$group['id']][$i][$j]) ? trim((string) $input[$group['id']][$i][$j]) : '';
                if ($value === '') {
                    $result[$group['id']][$i][$j] = null;
                } elseif (is_numeric($value) && is_finite((float) $value) && (float) $value >= 0) {
                    $result[$group['id']][$i][$j] = (float) $value;
                } else {
                    $result[$group['id']][$i][$j] = $current;
                    add_settings_error('exa_pricing', 'invalid_price', 'Invalid price retained its previous value. Use a nonnegative number or leave blank for a quote.');
                }
            }
        }
    }
    return $result;
}

add_action('admin_init', function () {
    register_setting('exa_settings', 'exa_phone', array('sanitize_callback' => 'exa_sanitize_phone'));
    register_setting('exa_settings', 'exa_currency', array('sanitize_callback' => 'sanitize_text_field'));
    register_setting('exa_settings', 'exa_pricing', array('sanitize_callback' => 'exa_sanitize_prices'));
});

add_action('admin_menu', function () {
    add_theme_page('Exa Services & Pricing', 'Exa Services & Pricing', 'manage_options', 'exa-settings', 'exa_settings_page');
});

function exa_settings_page() {
    if (!current_user_can('manage_options')) { return; }
    ?>
    <div class="wrap">
      <h1>Exa Services &amp; Pricing</h1>
      <p>Manage your booking number and the 49 services imported from the spreadsheet. Blank prices display “Request quote”.</p>
      <?php settings_errors(); ?>
      <form action="options.php" method="post">
        <?php settings_fields('exa_settings'); ?>
        <table class="form-table" role="presentation">
          <tr><th><label for="exa-phone">WhatsApp / contact number</label></th><td><input id="exa-phone" name="exa_phone" type="text" value="<?php echo esc_attr(exa_phone()); ?>" required><p class="description">Include the country code. This updates booking links and contact details throughout the homepage.</p></td></tr>
          <tr><th><label for="exa-currency">Currency label</label></th><td><span id="exa-currency">Singapore dollars (SGD)</span></td></tr>
        </table>
        <?php foreach (exa_pricing() as $group) : ?>
          <h2><?php echo esc_html($group['name']); ?></h2>
          <div style="overflow-x:auto">
          <table class="widefat striped" style="max-width:1100px">
            <thead><tr><th scope="col">Service</th>
              <?php $columns = $group['id'] === 'aircon' ? 5 : 1;
              for ($j = 0; $j < $columns; $j++) : ?>
                <th scope="col"><?php echo esc_html($columns === 5 ? ($j + 1) . ' unit(s)' : 'Price'); ?></th>
              <?php endfor; ?>
            </tr></thead>
            <tbody>
            <?php foreach ($group['services'] as $i => $service) : ?>
              <tr><th scope="row"><?php echo esc_html($service['name']); ?><?php if ($service['section']) : ?><br><small><?php echo esc_html($service['section']); ?></small><?php endif; ?></th>
              <?php foreach ($service['prices'] as $j => $price) : ?>
                <td><input type="number" min="0" step="any" style="width:110px" name="exa_pricing[<?php echo esc_attr($group['id']); ?>][<?php echo esc_attr($i); ?>][<?php echo esc_attr($j); ?>]" value="<?php echo esc_attr($price === null ? '' : $price); ?>" aria-label="<?php echo esc_attr($service['name'] . ' — ' . ($j + 1) . ' unit(s)'); ?>" placeholder="Quote"></td>
              <?php endforeach; ?>
              </tr>
            <?php endforeach; ?>
            </tbody>
          </table>
          </div>
        <?php endforeach; ?>
        <?php submit_button('Save services and pricing'); ?>
      </form>
    </div>
    <?php
}
